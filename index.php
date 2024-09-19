<?php
session_name('login');
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduTime</title>
    <link rel="stylesheet" type="text/css" href="pages/assets/css/style.css">
    <link rel="icon" href="img/logo-tran.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <img src="img/logo-tran.png" alt="logo-tecnologico" width="55px" id="cloud">
                <span>I.T.S.C.</span>
            </div>
        </div>
        <nav class="navegacion">
            <ul>
                <li class="puto" onclick="cargarContenido('pages/home.php')">
                    <a class="inbox" href="#">
                        <ion-icon name="home-outline"></ion-icon>
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="puto" onclick="cargarContenido('pages/horarios.php')">
                    <a class="inbox" href="#">
                        <ion-icon name="time-outline"></ion-icon>
                        <span>Horario</span>
                    </a>
                </li>
                <li onclick="cargarContenido('pages/docentes.php')">
                    <a class="inbox" href="#">
                        <ion-icon name="people-outline"></ion-icon>
                        <span>Docente</span>
                    </a>
                </li>
                <li onclick="cargarContenido('pages/materias.php')">
                    <a class="inbox" href="#">
                        <ion-icon name="library-outline"></ion-icon>
                        <span>Materia</span>
                    </a>
                </li>
                <li onclick="cargarContenido('pages/aulas.php')">
                    <a class="inbox" href="#">
                        <ion-icon name="easel-outline"></ion-icon>
                        <span>Aula</span>
                    </a>
                </li>
                <li onclick="cargarContenido('pages/carreras.php')">
                    <a class="inbox" href="#">
                        <ion-icon name="business-outline"></ion-icon>
                        <span>Carrera</span>
                    </a>
                </li>
                <!-- <li onclick="cargarContenido('pages/reportes.php')">
                    <a class="inbox" href="#">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Reportes</span>
                    </a>
                </li> -->
                <li onclick="cargarContenido('pages/generarReportes.php')">
                    <a class="inbox" href="#">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Generar Reportes</span>
                    </a>
                </li>
                <li onclick="cargarContenido('pages/configuracion.php')">
                    <a class="inbox" href="#">
                        <ion-icon name="settings-outline"></ion-icon>
                        <span>Configuración</span>
                    </a>
                </li>
                <li onclick="cargarContenido('pages/agregarDatos.php')">
                    <a class="inbox" href="#">
                        <ion-icon name="add-circle-outline"></ion-icon>
                        <span>Agregar nuevos datos</span>
                    </a>
                </li>
                <li onclick="cargarContenido('pages/copiarDatos.php')">
                    <a class="inbox" href="#">
                        <!-- <ion-icon name="add-circle-outline"></ion-icon> -->
                        <ion-icon name="copy-outline"></ion-icon>
                        <span>Copiar Datos De Carrera</span>
                    </a>
                </li>
                <li>
                    <a class="inbox" href="../includes/logout.php">
                        <ion-icon name="trash-outline"></ion-icon>
                        <span>Cerrrar Sesión</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="lateral-inferior">
            <div class="linea"></div>

            <div class="modo-oscuro">
                <div class="info">
                    <ion-icon name="moon-outline"></ion-icon>
                    <span>Oscuro</span>
                </div>
                <div class="switch">
                    <div class="base">
                        <div class="circulo">

                        </div>
                    </div>
                </div>
            </div>
            <div class="usuario">
                <img src="img/logo-tran.png" alt="">
                <div class="info-usuario">
                    <div class="nombre-apellido">
                        <span class="nombre">
                            <?php echo $_SESSION['nombre']; ?>

                        </span>
                        <span class="apellido">
                            <?php echo $_SESSION['apellido']; ?>
                        </span>
                    </div>
                    <!-- <ion-icon name="ellipsis-vertical-outline"></ion-icon> -->
                </div>
            </div>
        </div>
    </div>
    <main class="menuContent">
        <div class="content" id="contenido">
            <!-- Aquí se cargarán los contenidos -->
        </div>
    </main>
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="pages/assets/js/script.js"></script>
    <!-- <script src="pages/assets/js/docentes.js"></script> -->
</body>

</html>