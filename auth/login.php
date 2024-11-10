<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../pages/assets/css/bootstrap.css"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../pages/assets/css/login.css" media="screen">
</head>

<body>
    <style>

        /* Ajustes generales para pantallas pequeñas */
        @media (max-width: 768px) {
            body {
                box-sizing: border-box;
            }

            /* Formulario de login */
            form {
                width: 90%;
                padding: 20px;
                margin: auto;
                box-sizing: border-box;
            }

            h3 {
                font-size: 1.5rem;
                text-align: center;
            }

            /* Inputs y botones */
            .inputText,
            .btnIngresar {
                font-size: 1rem;
                padding: 10px;
                width: 100%;
            }

            /* Mensajes de error */
            .aviso {
                font-size: 0.9rem;
                padding: 8px;
                margin-top: 15px;
                width: 100%;
                text-align: center;
            }
        }

        /* Ajustes adicionales para pantallas muy pequeñas */
        @media (max-width: 480px) {
            h3 {
                font-size: 1.3rem;
            }

            /* Ajuste de padding para mejorar la lectura en dispositivos pequeños */
            form {
                padding: 15px;
                background: #000;
            }

            .inputText,
            .btnIngresar {
                font-size: 0.9rem;
                padding: 8px;
            }

            .alert {
                font-size: 0.85rem;
            }
        }
    </style>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post" action="../includes/login.php">
        <h3>Inicio de Sesión</h3>

        <label for="username">Nombre de Usuario</label>
        <input type="text" placeholder="Ingrese su usuario" class="inputText" id="username" name="username" autocomplete="off">

        <label for="password">Contraseña</label>
        <input type="password" placeholder="Ingrese su contraseña" class="inputText" id="password" name="password" autocomplete="off">

        <input type="submit" value="Iniciar Sesion" name="btnIngresar" class="btnIngresar">

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger text-center mt-4 aviso"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const aviso = document.querySelector(".aviso");
            if (aviso) {
                aviso.style.opacity = "1";
                setTimeout(() => {
                    aviso.style.opacity = "0";
                }, 4000);
            }
        });
    </script>
</body>

</html>