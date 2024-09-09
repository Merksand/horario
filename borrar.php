<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Valores para la tabla DocenteMateria
    foreach ($_POST as $campo => $valor) {
        echo "<p><strong>$campo</strong>: $valor</p>". "\n";
    }
}



// * BIEN

<?php
// Conexión a la base de datos
require_once '../database.php';

// Verificación de si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitización de entradas
    $docenteID1 = filter_input(INPUT_POST, 'docenteID1', FILTER_SANITIZE_NUMBER_INT);
    $periodoInicioID = filter_input(INPUT_POST, 'periodoInicioID', FILTER_SANITIZE_NUMBER_INT);
    $periodoFinID = filter_input(INPUT_POST, 'periodoFinID', FILTER_SANITIZE_NUMBER_INT);
    $materiaID = filter_input(INPUT_POST, 'materiaID', FILTER_SANITIZE_NUMBER_INT);
    $aulaID = filter_input(INPUT_POST, 'aulaID', FILTER_SANITIZE_NUMBER_INT);
    $observacionID = filter_input(INPUT_POST, 'observacionID', FILTER_SANITIZE_NUMBER_INT);
    $carreraID = filter_input(INPUT_POST, 'carreraID', FILTER_SANITIZE_NUMBER_INT); // Captura de CarreraID

    // Validación de campos obligatorios para la tabla DocenteMateria
    if ($docenteID1 && $periodoInicioID && $periodoFinID && $materiaID && $aulaID) {
        // Obtener el HorarioID (usando periodoInicioID y periodoFinID)
        $sqlHorario = "SELECT HorarioID FROM Horarios WHERE HorarioID = ?";
        $stmtHorario = $conexion->prepare($sqlHorario);
        $stmtHorario->bind_param("i", $periodoInicioID); // Asumiendo que el periodoInicioID coincide con el HorarioID
        $stmtHorario->execute();
        $resultadoHorario = $stmtHorario->get_result();
        $horario = $resultadoHorario->fetch_assoc();

        if ($horario) {
            $horarioID = $horario['HorarioID'];

            // Insertar en la tabla DocenteMateria
            $sqlDocenteMateria = "INSERT INTO DocenteMateria (DocenteID, MateriaID, AulaID, HorarioID, GestionSemestreID) 
                                  VALUES (?, ?, ?, ?, (SELECT GestionSemestreID FROM GestionSemestre ORDER BY GestionSemestreID DESC LIMIT 1))";
            $stmtDocenteMateria = $conexion->prepare($sqlDocenteMateria);
            $stmtDocenteMateria->bind_param("iiii", $docenteID1, $materiaID, $aulaID, $horarioID);

            if ($stmtDocenteMateria->execute()) {
                echo "Datos insertados correctamente en DocenteMateria.";
            } else {
                echo "Error al insertar en DocenteMateria: " . $conexion->error;
            }
        } else {
            echo "No se encontró un horario válido.";
        }
    } else {
        echo "Por favor, completa todos los campos obligatorios para la tabla DocenteMateria.";
    }

    // Verificación de si hay datos para insertar en DocenteCarreraObservacion
    if ($docenteID1 && $observacionID && $carreraID) {  // Verificación de CarreraID
        // Verificar si ya existe una observación para este docente y carrera
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
        echo "Faltan datos para insertar en la tabla DocenteCarreraObservacion. OBser: $observacionID Carrera: $carreraID docen: $docenteID1";
    }
}
?>
