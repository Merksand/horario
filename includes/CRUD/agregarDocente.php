<?php
session_name('login');
session_start();
require_once '../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $docenteID1 = filter_input(INPUT_POST, 'docenteID1', FILTER_SANITIZE_NUMBER_INT);
    $periodoInicioID = filter_input(INPUT_POST, 'periodoInicioID', FILTER_SANITIZE_NUMBER_INT);
    $periodoFinID = filter_input(INPUT_POST, 'periodoFinID', FILTER_SANITIZE_NUMBER_INT);
    $materiaID = filter_input(INPUT_POST, 'materiaID', FILTER_SANITIZE_NUMBER_INT);
    $aulaID = filter_input(INPUT_POST, 'aulaID', FILTER_SANITIZE_NUMBER_INT);
    $observacionID = filter_input(INPUT_POST, 'observacionID', FILTER_SANITIZE_NUMBER_INT);
    $carreraID = filter_input(INPUT_POST, 'carreraID', FILTER_SANITIZE_NUMBER_INT);

    $insercionExitosa = true;
    $mensajeError = '';

    if ($docenteID1 && $periodoInicioID && $periodoFinID && $materiaID && $aulaID) {
        if ($periodoInicioID <= $periodoFinID) {
            for ($horarioID = $periodoInicioID; $horarioID <= $periodoFinID; $horarioID++) {

                // Verificación de conflicto de horario
                $sqlConflicto = "SELECT * FROM DocenteMateria WHERE DocenteID = ? AND HorarioID = ? OR AulaID = ? AND HorarioID = ?";
                $stmtConflicto = $conexion->prepare($sqlConflicto);
                $stmtConflicto->bind_param("iiii", $docenteID1, $horarioID, $aulaID, $horarioID);
                $stmtConflicto->execute();
                $resultadoConflicto = $stmtConflicto->get_result();

                if ($resultadoConflicto->num_rows > 0) {
                    // Si se encuentra un conflicto, muestra un mensaje y termina el proceso
                    echo "El horario que está intentando asignar ya está ocupado por otro docente o aula";
                    exit;
                }

                // Consulta para obtener valores en lugar de IDs
                $docenteNombre = $conexion->query("SELECT CONCAT(Nombre, ' ', Apellido) AS NombreCompleto FROM Docentes WHERE DocenteID = $docenteID1")->fetch_assoc()['NombreCompleto'];
                $materiaNombre = $conexion->query("SELECT Nombre FROM Materias WHERE MateriaID = $materiaID")->fetch_assoc()['Nombre'];
                $aulaNombre = $conexion->query("SELECT Nombre FROM Aulas WHERE AulaID = $aulaID")->fetch_assoc()['Nombre'];

                // Consulta para obtener detalles del horario (día y periodos)
                $horarioDetalles = $conexion->query("SELECT Dia, HoraInicio, HoraFin FROM Horarios WHERE HorarioID = $horarioID")->fetch_assoc();
                $horarioDia = $horarioDetalles['Dia'];
                $horarioPeriodo = "De {$horarioDetalles['HoraInicio']} a {$horarioDetalles['HoraFin']}";

                // Inserción en DocenteMateria
                $sqlDocenteMateria = "INSERT INTO DocenteMateria (DocenteID, MateriaID, AulaID, HorarioID, GestionSemestreID) 
                                      VALUES (?, ?, ?, ?, (SELECT GestionSemestreID FROM GestionSemestre ORDER BY GestionSemestreID DESC LIMIT 1))";
                $stmtDocenteMateria = $conexion->prepare($sqlDocenteMateria);
                $stmtDocenteMateria->bind_param("iiii", $docenteID1, $materiaID, $aulaID, $horarioID);

                if ($stmtDocenteMateria->execute()) {
                    // Inserción en logs con los valores obtenidos
                    $detalle = "Horario insertado : Docente=$docenteNombre, Materia=$materiaNombre, Aula=$aulaNombre, Horario=($horarioDia, $horarioPeriodo)";
                    $sqlLog = "INSERT INTO logs (UsuarioID, Accion, Detalles) VALUES ('{$_SESSION['usuario_id']}', 'Insertar nuevo horario', '$detalle')";
                    if (!$conexion->query($sqlLog)) {
                        $insercionExitosa = false;
                        $mensajeError .= "Error al insertar en logs para DocenteMateria. " . $conexion->error . "\n";
                    }
                } else {
                    $insercionExitosa = false;
                    $mensajeError .= "Error al insertar en DocenteMateria para HorarioID: $horarioID. " . $conexion->error . "\n";
                }
            }
            echo $insercionExitosa ? "Datos insertados correctamente." : $mensajeError;
        } else {
            echo "El rango de periodos es inválido.";
        }
    }

    // Verificación de observación de carrera para el docente seleccionado
    if ($docenteID1 && $observacionID && $carreraID) {
        // Obtén el nombre del docente si existe
        $resultadoDocente = $conexion->query("SELECT CONCAT(Nombre, ' ', Apellido) AS NombreCompleto FROM Docentes WHERE DocenteID = $docenteID1");
        $docenteNombre = ($resultadoDocente->num_rows > 0) ? $resultadoDocente->fetch_assoc()['NombreCompleto'] : null;

        // Obtén el nombre de la carrera y la observación si existen
        $carreraNombre = $conexion->query("SELECT Nombre FROM Carreras WHERE CarreraID = $carreraID")->fetch_assoc()['Nombre'];
        $observacionNombre = $conexion->query("SELECT Descripcion FROM ObservacionesDocente WHERE ObservacionID = $observacionID")->fetch_assoc()['Descripcion'];

        // Verifica si ya existe la observación para el docente y la carrera
        $sqlVerificar = "SELECT * FROM DocenteCarreraObservacion WHERE DocenteID = $docenteID1 AND ObservacionID = $observacionID AND CarreraID = $carreraID";
        $resultadoVerificar = $conexion->query($sqlVerificar);

        if ($resultadoVerificar->num_rows > 0) {
            echo "Ya existe una observación para este docente.";
        } else {
            // Inserta el registro en la tabla DocenteCarreraObservacion
            $sqlObservacion = "INSERT INTO DocenteCarreraObservacion (DocenteID, ObservacionID, CarreraID) VALUES ($docenteID1, $observacionID, $carreraID)";
            if ($conexion->query($sqlObservacion)) {
                echo "Datos insertados correctamente.";

                // Inserción en logs solo si $docenteNombre no es null
                if ($docenteNombre) {
                    $detalle = "Insertado en Observacion: Docente=$docenteNombre, Observacion=$observacionNombre, Carrera=$carreraNombre";
                    $sqlLog = "INSERT INTO logs (UsuarioID, Accion, Detalles) VALUES ('{$_SESSION['usuario_id']}', 'Insertar nueva observación', '$detalle')";
                    if (!$conexion->query($sqlLog)) {
                        $mensajeError .= "Error al insertar en logs para DocenteCarreraObservacion. " . $conexion->error . "\n";
                    }
                } else {
                    echo "Error: No se encontró el nombre del docente para el log.";
                }
            } else {
                echo "La observacion ya existe";
            }
        }
    }
}
