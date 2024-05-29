<?php
// includes/eliminar_docente.php
include('../database.php');

if (isset($_POST['docenteID'])) {
    $docenteID = $_POST['docenteID'];

    $consulta = "DELETE FROM Docentes WHERE DocenteID = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("i", $docenteID);

    if ($stmt->execute()) {
        echo "Docente eliminado exitosamente.";
    } else {
        echo "Error al eliminar el docente: " . $conexion->error;
    }

    $stmt->close();
    $conexion->close();
} else {
    echo "Datos incompletos.";
}
