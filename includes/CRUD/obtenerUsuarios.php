<?php
include '../database.php';

// Consulta para obtener solo usuarios activos
$sqlUsuarios = "SELECT UsuarioID, CONCAT(Nombre, ' ', Apellido) AS NombreCompleto FROM usuarios WHERE is_active = 1";
$resultUsuarios = $conexion->query($sqlUsuarios);

$usuarios = [];

if ($resultUsuarios->num_rows > 0) {
    while ($row = $resultUsuarios->fetch_assoc()) {
        $usuarios[] = [
            "UsuarioID" => $row["UsuarioID"],
            "NombreCompleto" => $row["NombreCompleto"]
        ];
    }
}

// Retorna los usuarios activos como JSON
header('Content-Type: application/json');
echo json_encode($usuarios);

$conexion->close();
?>
