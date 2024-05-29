<?php
// includes/buscar_docentes.php
include('database.php');

$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$apellido = isset($_GET['apellido']) ? $_GET['apellido'] : '';

$consulta = "SELECT * FROM Docentes WHERE 1=1";

if (!empty($nombre)) {
    $consulta .= " AND Nombre LIKE '%" . $conexion->real_escape_string($nombre) . "%'";
}

if (!empty($apellido)) {
    $consulta .= " AND Apellido LIKE '%" . $conexion->real_escape_string($apellido) . "%'";
}

$resultado = $conexion->query($consulta);

$docentes = array();
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $docentes[] = $fila;
    }
}

echo json_encode($docentes);

$conexion->close();
