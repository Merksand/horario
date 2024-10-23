<?php
include 'database.php';


$usuarioID = $_POST['usuarioExistente'];
// $nuevaClave = password_hash($_POST['nuevaClave'], PASSWORD_DEFAULT); 
$nuevaClave = $_POST['nuevaClave'];

$sql = "UPDATE Usuarios SET Clave = '$nuevaClave' WHERE UsuarioID = $usuarioID";
if ($conexion->query($sql) === TRUE) {
    echo json_encode(['message' => 'Contraseña actualizada correctamente.']);
} else {
    echo json_encode(['message' => 'Error al actualizar la contraseña: ' . $conexion->error]);
}
?>
