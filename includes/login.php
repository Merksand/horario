<?php
session_name('login');
session_start();

if (!empty($_POST["btnIngresar"])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        header("Location: ../auth/login.php?error=" . urlencode("LOS CAMPOS ESTAN VACIOS"));
        exit();
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
                if ($fila['Clave'] == $clave) {  // Considera usar password_verify() en el futuro
                                        
                    // Contraseña correcta
                    $_SESSION['usuario_id'] = $fila['UsuarioID']; // Asumiendo que hay una columna 'id'
                    $_SESSION['usuario'] = $fila['Usuario'];
                    $_SESSION['nombre'] = $fila['Nombre'];
                    $_SESSION['apellido'] = $fila['Apellido'];
                    $_SESSION["rol"] = $fila["RolID"];
                    header("Location: ../index.php");
                    exit();
                } else {
                    header("Location: ../auth/login.php?error=" . urlencode("Contraseña incorrecta"));
                    exit();
                }
            }
        } else {
            header("Location: ../auth/login.php?error=" . urlencode("Usuario no registrado"));
            exit();
        }
    }
}

// * CON HASH INCLUIDO 


/* 
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
                if (password_verify($clave, $fila['Clave'])) {
                    // Contraseña correcta, almacenar información segura en la sesión
                    $_SESSION['usuario_id'] = $fila['UsuarioID'];
                    $_SESSION['usuario'] = $fila['usuario'];

                    // Redirigir al usuario
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

*/