
<!DOCTYPE html>
<html>

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../pages/assets/css/bootstrap.css">
    <link rel="stylesheet" href="../pages/assets/css/login.css" media="screen">
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post">
        <h3>Inicio de Sesión</h3>
        <?php
        include('../includes/database.php');
        ?>
        <label for="username">Nombre de Usuario</label>
        <input type="text" placeholder="Ingrese su usuario" class="inputText" id="username" name="username" autocomplete="off">

        <label for="password">Contraseña</label>
        <input type="password" placeholder="Ingrese su contraseña" class="inputText" id="password" name="password" autocomplete="off">

        <input type="submit" value="Iniciar Sesion" name="btnIngresar" class="btnIngresar">
        <?php
        include("../includes/login.php");
        ?>

    </form>
    <?php
    if (!empty($_POST["btnIngresar"])) {
        echo '<script>
        const aviso = document.querySelector(".aviso");
        aviso.style.opacity = "1";
        setTimeout(() => {
            aviso.style.opacity = "0";
            
        }, 3000);
        </script>';
    }
    ?>
</body>

</html>