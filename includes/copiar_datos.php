<?php
include 'database.php';

if (isset($_POST["carrera_copiar"]) && isset($_POST["gestion_copiar"]) && isset($_POST["nueva_gestion"])) {
    $carreraID = $_POST["carrera_copiar"];
    $gestionSemestreIDActual = $_POST["gestion_copiar"];
    $nuevaGestionSemestreID = $_POST["nueva_gestion"];

    if (!empty($carreraID) && !empty($gestionSemestreIDActual) && !empty($nuevaGestionSemestreID)) {
        
        $conexion->begin_transaction();
        
        try {
            // Consulta para copiar los registros de DocenteMateria a la nueva Gestión
            $queryCopiar = "INSERT INTO DocenteMateria (DocenteID, MateriaID, AulaID, HorarioID, GestionSemestreID)
                            SELECT DM.DocenteID, DM.MateriaID, DM.AulaID, DM.HorarioID, ?
                            FROM DocenteMateria DM
                            JOIN Materias M ON DM.MateriaID = M.MateriaID
                            WHERE DM.GestionSemestreID = ? AND M.CarreraID = ?";

            if ($stmtCopiar = $conexion->prepare($queryCopiar)) {
                $stmtCopiar->bind_param('iii', $nuevaGestionSemestreID, $gestionSemestreIDActual, $carreraID);

                if ($stmtCopiar->execute()) {
                    $conexion->commit();
                    echo "Datos copiados correctamente.";
                } else {
                    throw new Exception("Error al copiar los datos: " . $stmtCopiar->error);
                }
            } else {
                // Si falla la preparación de la consulta, mostrar el error
                throw new Exception("Error al preparar la consulta: " . $conexion->error);
            }

        } catch (Exception $e) {
            // En caso de error, revertir la transacción
            $conexion->rollback();
            echo $e->getMessage();
        }

        if ($stmtCopiar) {
            $stmtCopiar->close();
        }
        
    } else {
        echo "Por favor, complete todos los campos.";
    }
} else {
    echo "Solicitud no válida.";
}
