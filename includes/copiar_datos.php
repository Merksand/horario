<?php 
include 'database.php';

if (isset($_POST["carrera_copiar"]) && isset($_POST["gestion_copiar"]) && isset($_POST["nueva_gestion"])) {
    $carreraID = $_POST["carrera_copiar"];
    $gestionSemestreIDActual = $_POST["gestion_copiar"];
    $nuevaGestionSemestreID = $_POST["nueva_gestion"];

    // Validación de que los campos no estén vacíos
    if (!empty($carreraID) && !empty($gestionSemestreIDActual) && !empty($nuevaGestionSemestreID)) {
        // Consulta para obtener los registros de DocenteMateria que coinciden con la carrera y gestion seleccionada
        $queryCopiar = "SELECT DM.DocenteID, DM.MateriaID, DM.AulaID, DM.HorarioID 
                        FROM DocenteMateria DM
                        JOIN Materias M ON DM.MateriaID = M.MateriaID
                        WHERE DM.GestionSemestreID = ? AND M.CarreraID = ?";

        $stmtCopiar = $conexion->prepare($queryCopiar);
        $stmtCopiar->bind_param('ii', $gestionSemestreIDActual, $carreraID);
        $stmtCopiar->execute();
        $result = $stmtCopiar->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $docenteID = $row['DocenteID'];
                $materiaID = $row['MateriaID'];
                $aulaID = $row['AulaID'];
                $horarioID = $row['HorarioID'];

                // Insertar los registros en la nueva gestión
                $queryInsertar = "INSERT INTO DocenteMateria (DocenteID, MateriaID, AulaID, HorarioID, GestionSemestreID) 
                                  VALUES (?, ?, ?, ?, ?)";
                $stmtInsertar = $conexion->prepare($queryInsertar);
                $stmtInsertar->bind_param('iiiii', $docenteID, $materiaID, $aulaID, $horarioID, $nuevaGestionSemestreID);

                if (!$stmtInsertar->execute()) {
                    echo "Error al copiar los datos: " . $stmtInsertar->error;
                }
            }
            echo "Datos copiados exitosamente.";
        } else {
            echo "No se encontraron datos para copiar.";
        }
        $stmtCopiar->close();
    } else {
        echo "Por favor, complete todos los campos.";
    }
} else {
    echo "Solicitud no válida.";
}
