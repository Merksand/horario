<?php
include('bd.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $apellido = $conexion->real_escape_string($_POST['apellido']);
    $periodoInicio = $conexion->real_escape_string($_POST['periodoInicio']);
    $dia = $conexion->real_escape_string($_POST['dia']);
    $materia = $conexion->real_escape_string($_POST['materia']);
    $nivel = $conexion->real_escape_string($_POST['nivel']);
    $carrera = $conexion->real_escape_string($_POST['carrera']);
    $aula = $conexion->real_escape_string($_POST['aula']);

    // Primero, agregar el docente
    $insertDocente = "INSERT INTO Docentes (Nombre, Apellido) VALUES ('$nombre', '$apellido')";
    if ($conexion->query($insertDocente)) {
        $docenteID = $conexion->insert_id;

        // Consulta para obtener el ID de la carrera
        $queryCarrera = "SELECT CarreraID FROM Carreras WHERE Nombre = '$carrera'";
        $resultCarrera = $conexion->query($queryCarrera);
        if ($resultCarrera->num_rows > 0) {
            $carreraID = $resultCarrera->fetch_assoc()['CarreraID'];

            // Consulta para obtener el ID de la materia
            $queryMateria = "SELECT MateriaID FROM Materias WHERE Nombre = '$materia' AND Nivel = '$nivel'";
            $resultMateria = $conexion->query($queryMateria);
            if ($resultMateria->num_rows > 0) {
                $materiaID = $resultMateria->fetch_assoc()['MateriaID'];

                // Consulta para obtener el ID del horario
                $queryHorario = "SELECT HorarioID FROM Horarios WHERE Dia = '$dia' AND Periodo = '$periodoInicio'";
                $resultHorario = $conexion->query($queryHorario);
                if ($resultHorario->num_rows > 0) {
                    $horarioID = $resultHorario->fetch_assoc()['HorarioID'];

                    // Consulta para obtener el ID del aula
                    $queryAula = "SELECT AulaID FROM Aulas WHERE Nombre = '$aula'";
                    $resultAula = $conexion->query($queryAula);
                    if ($resultAula->num_rows > 0) {
                        $aulaID = $resultAula->fetch_assoc()['AulaID'];

                        // Insertar en la tabla intermedia
                        $insertDocenteMateria = "INSERT INTO DocenteMateria (DocenteID, MateriaID, AulaID, HorarioID) VALUES ('$docenteID', '$materiaID', '$aulaID', '$horarioID')";
                        if ($conexion->query($insertDocenteMateria)) {
                            echo json_encode(['success' => 'Docente agregado con éxito']);
                        } else {
                            echo json_encode(['error' => 'Error al insertar en DocenteMateria: ' . $conexion->error]);
                        }
                    } else {
                        echo json_encode(['error' => 'Aula no encontrada']);
                    }
                } else {
                    echo json_encode(['error' => 'Horario no encontrado']);
                }
            } else {
                echo json_encode(['error' => 'Materia no encontrada']);
            }
        } else {
            echo json_encode(['error' => 'Carrera no encontrada']);
        }
    } else {
        echo json_encode(['error' => 'Error al insertar docente: ' . $conexion->error]);
    }
} else {
    echo json_encode(['error' => 'Método no permitido']);
}

$conexion->close();
?>
