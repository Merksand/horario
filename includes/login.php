<?php
session_start();

if (!empty($_POST["btnIngresar"])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        echo '<div class="alert alert-danger text-center mt-4 aviso">LOS CAMPOS ESTAN VACIOS</div>';
    } else {
        include('database.php');
        $usuario = $_POST['username'];
        $clave = $_POST['password'];

        // Consulta para verificar si el usuario existe
        $sql = "SELECT * FROM Usuarios WHERE usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        if ($resultado->num_rows == 1) {
            // Usuario existe, ahora verificar la contraseña
            if ($fila = $resultado->fetch_assoc()) {
                if ($fila['Clave'] == $clave) {
                    // Contraseña correcta
                    $_SESSION['usuario'] = $fila['usuario'];
                    $_SESSION['password'] = $fila['Clave']; 
                    header("location:../index.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger text-center mt-4 aviso'>Contraseña incorrecta</div>";
                }
            }
        } else {
            echo "<div class='alert alert-danger text-center mt-4 aviso'>Usuario no registrado</div>";
        }
    }
}
