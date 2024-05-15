<?php

if (!empty($_POST["btnIngresar"])) {
    if (empty($_POST['username']) && empty($_POST['password'])) {
        echo '<div class="alert alert-danger text-center mt-4 aviso">LOS CAMPOS ESTAN VACIOS</div>';
    } else {
        $usuario = $_POST['username'];
        $clave = $_POST['password'];
        $sql = "SELECT * FROM Usuarios WHERE usuario = '$usuario' AND Clave = '$clave'";
        $resultado = $conn->query($sql);
        if ($resultado && $resultado -> num_rows>0) {
            header("location:../index.php");
        }else{
            echo "<div class='alert alert-danger text-center mt-4 aviso'>Usuario no registrado</div>";
        }
    }
}

