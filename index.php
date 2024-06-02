<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduTime</title>
    <link rel="stylesheet" type="text/css" href="pages/assets/css/style.css">
    <link rel="icon" href="img/logo-tran.png" type="image/png">

</head>

<body>
    <div class="menu">
        <ion-icon name="menu-outline"></ion-icon>
        <ion-icon name="close-outline"></ion-icon>
    </div>

    <div class="barra-lateral">
        <div>
            <div class="nombre-pagina">
                <!-- <ion-icon id="cloud" name="cloud-outline"></ion-icon> -->
                <img src="img/logo-tran.png" alt="logo-tecnologico" width="55px" id="cloud">
                <span>I.T.S.C.</span>
            </div>
            <!-- <button class="boton">
                <ion-icon name="add-outline"></ion-icon>
                <span>Create new</span>
            </button> -->
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
                <li>
                    <a class="inbox" href="#">
                        <ion-icon name="document-text-outline"></ion-icon>
                        <span>Reportes</span>
                    </a>
                </li>
                <li onclick="cargarContenido('pages/configuracion.php')">
                    <a class="inbox" href="#">
                        <ion-icon name="settings-outline"></ion-icon>
                        <span>Configuración</span>
                    </a>
                </li>
                <li>
                    <a class="inbox" href="borrar.html">
                        <ion-icon name="trash-outline"></ion-icon>
                        <span>Cerrrar Sesión</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div>
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
                    <div class="nombre-email">
                        <span class="nombre">-------</span>
                        <span class="email">xxxxxxx@gmail.com</span>
                    </div>
                    <ion-icon name="ellipsis-vertical-outline"></ion-icon>
                </div>
            </div>
        </div>
    </div>
    <main>
        <div class="content" id="contenido">
            <!-- Aquí se cargarán los contenidos -->
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            cargarContenido('pages/configuracion.php');

           
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="pages/assets/js/script.js"></script>
    <!-- <script src="pages/assets/js/docentes.js"></script> -->
</body>

</html>