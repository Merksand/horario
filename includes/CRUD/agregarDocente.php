<?php
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
                $sqlDocenteMateria = "INSERT INTO DocenteMateria (DocenteID, MateriaID, AulaID, HorarioID, GestionSemestreID) 
                                      VALUES (?, ?, ?, ?, (SELECT GestionSemestreID FROM GestionSemestre ORDER BY GestionSemestreID DESC LIMIT 1))";
                $stmtDocenteMateria = $conexion->prepare($sqlDocenteMateria);
                $stmtDocenteMateria->bind_param("iiii", $docenteID1, $materiaID, $aulaID, $horarioID);

                if (!$stmtDocenteMateria->execute()) {
                    $insercionExitosa = false;  // Si falla, marcar como falso
                    $mensajeError .= "Error al insertar en DocenteMateria para HorarioID: $horarioID. " . $conexion->error . "\n";
                }
            }

            if ($insercionExitosa) {
                echo "Datos insertados correctamente.";
            } else {
                echo $mensajeError;
            }
        } else {
            echo "El rango de periodos es inválido.";
        }
    } else {
        echo "Por favor, completa todos los campos obligatorios.";
    }

    if ($docenteID1 && $observacionID && $carreraID) {
        $sqlVerificar = "SELECT * FROM DocenteCarreraObservacion WHERE DocenteID = ? AND ObservacionID = ? AND CarreraID = ?";
        $stmtVerificar = $conexion->prepare($sqlVerificar);
        $stmtVerificar->bind_param("iii", $docenteID1, $observacionID, $carreraID);
        $stmtVerificar->execute();
        $resultadoVerificar = $stmtVerificar->get_result();

        if ($resultadoVerificar->num_rows > 0) {
            echo "Ya existe una observación para este docente.";
        } else {
            // Insertar en la tabla DocenteCarreraObservacion
            $sqlObservacion = "INSERT INTO DocenteCarreraObservacion (DocenteID, ObservacionID, CarreraID) 
                               VALUES (?, ?, ?)";
            $stmtObservacion = $conexion->prepare($sqlObservacion);
            $stmtObservacion->bind_param("iii", $docenteID1, $observacionID, $carreraID);

            if ($stmtObservacion->execute()) {
                echo "Datos insertados correctamente en DocenteCarreraObservacion.";
            } else {
                echo "Error al insertar en DocenteCarreraObservacion: " . $conexion->error;
            }
        }
    } else {
        // echo "Faltan datos para insertar en la tabla DocenteCarreraObservacion.";
    }
}
