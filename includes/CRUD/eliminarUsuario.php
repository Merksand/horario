<?php
include '../database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioID = $_POST['usuarioEliminar'];

    $sql = "UPDATE Usuarios SET is_active = 0 WHERE UsuarioID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $usuarioID);

    if ($stmt->execute()) {
        echo "Usuario eliminado con éxito";
    } else {
        echo "Error al eliminar el usuario";
    }

    $stmt->close();
    $conexion->close();
}
?>
