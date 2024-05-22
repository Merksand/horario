<?php

if (!empty($_POST["btnIngresar"])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        echo '<div class="alert alert-danger text-center mt-4 aviso">LOS CAMPOS ESTAN VACIOS</div>';
    } else {
        include('database.php');
        $usuario = $_POST['username'];
        $clave = $_POST['password'];
        
        // Preparar la consulta SQL utilizando sentencias preparadas
        $sql = "SELECT * FROM Usuarios WHERE usuario LIKE '%$usuario%' LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        if ($resultado->num_rows == 1) {
            $fila = $resultado->fetch_assoc();
            // Verificar la contraseña utilizando password_verify()
            if (password_verify($clave, $fila['Clave'])) {
                header("location:../index.php");
                exit(); // Importante: detener la ejecución del script después de redirigir al usuario
            } else {
                echo "<div class='alert alert-danger text-center mt-4 aviso'>Contraseña incorrecta</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center mt-4 aviso'>Usuario no registrado</div>";
        }
    }
}


