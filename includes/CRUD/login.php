<?php
session_start();

if (!empty($_POST["btnIngresar"])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        echo '<div class="alert alert-danger text-center mt-4 aviso">LOS CAMPOS ESTAN VACIOS</div>';
    } else {
        include('database.php');
        $usuario = $_POST['username'];
        $clave = $_POST['password'];

        $sql = "SELECT * FROM Usuarios WHERE usuario = ? AND clave = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss", $usuario, $clave);
        $stmt->execute();
        $resultado = $stmt->get_result();
         
        if ($resultado->num_rows == 1) {
            if ($fila = $resultado->fetch_assoc()) {
                $_SESSION['usuario'] = $fila['usuario'];
                $_SESSION['password'] = $fila['password'];
                header("location:../index.php");
                exit();
            } else {
                echo "<div class='alert alert-danger text-center mt-4 aviso'>Contraseña incorrecta</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center mt-4 aviso'>Usuario no registrado</div>";
        }
    }
}
