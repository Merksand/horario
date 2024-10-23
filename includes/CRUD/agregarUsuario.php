<?php
include '../database.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$usuario = $_POST['usuario'];
// $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT); 
$clave = $_POST['clave'];
$rolID = $_POST['rol'];

$sql = "INSERT INTO Usuarios (Nombre, Apellido, Usuario, Clave, RolID) VALUES ('$nombre', '$apellido', '$usuario', '$clave', $rolID)";
if ($conexion->query($sql) === TRUE) {
    echo json_encode(['message' => 'Usuario agregado correctamente.']);
} else {
    echo json_encode(['message' => 'Error al agregar usuario: ' . $conexion->error]);
}
?>
