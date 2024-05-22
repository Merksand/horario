<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- <link rel="stylesheet" href="css\home.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/pepe.css">  -->
</head>

<body>

    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-user-tie"></i>
            </div>

            <div class="stat-info" id="total-docentes">
                <h3>Docentes</h3>
                <span id="docentes-count"></span>
            </div>

            <!-- <div id="total-docentes">Total de Docentes: <span id="docentes-count"></span></div> -->

        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-book"></i>
            </div>
            <div class="stat-info" id="total-materias">
                <h3>Materias</h3>
                <span id="materias-count"></span>
            </div>
        </div>

        <!-- <div id="total-materias">Total de Materias: <span id="materias-count"></span></div> -->

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="stat-info" id="total-carreras">
                <h3>Carreras</h3>
                <!-- <p>15</p> -->
                <span id="carreras-count"></span>
            </div>
        </div>

        <!-- <div id="total-carreras">Total de Carreras: <span id="carreras-count"></span></div> -->

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-door-open"></i>
            </div>
            <div class="stat-info" id="total-aulas">
                <h3>Aulas</h3>
                <span id="aulas-count"></span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="stat-info" id="total-horarios">
                <h3>Horarios</h3>
                <span id="horarios-count"></span>
            </div>
        </div>
    </div>







    <div id="totales">
        <h3>Totales:</h3>
        <div id="total-docentes">Total de Docentes: <span id="docentes-count"></span></div>
        <div id="total-materias">Total de Materias: <span id="materias-count"></span></div>
        <div id="total-carreras">Total de Carreras: <span id="carreras-count"></span></div>
        <!-- Agregar más totales según sea necesario -->
    </div>









    <div class="daily-teachers">
        <h2>Docentes del día</h2>
        <div class="teachers-list">
            <div class="career-section">
                <h3>Ingeniería de Sistemas</h3>
                <div class="teacher-card">
                    <div class="teacher-info">
                        <h4>Juan Pérez</h4>
                        <ul class="classes">
                            <li>
                                <span class="class-name">Programación I</span>
                                <span class="class-room">Aula 201</span>
                                <span class="class-time">8:00 - 10:00</span>
                            </li>
                            <li>
                                <span class="class-name">Bases de Datos I</span>
                                <span class="class-room">Aula 305</span>
                                <span class="class-time">10:00 - 12:00</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="teacher-card">
                    <div class="teacher-info">
                        <h4>María Rodríguez</h4>
                        <ul class="classes">
                            <li>
                                <span class="class-name">Cálculo I</span>
                                <span class="class-room">Aula 102</span>
                                <span class="class-time">8:00 - 10:00</span>
                            </li>
                            <li>
                                <span class="class-name">Álgebra Lineal</span>
                                <span class="class-room">Aula 107</span>
                                <span class="class-time">10:00 - 12:00</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="career-section">
                <h3>Administración de Empresas</h3>
                <div class="teacher-card">
                    <div class="teacher-info">
                        <h4>Carlos López</h4>
                        <ul class="classes">
                            <li>
                                <span class="class-name">Marketing Digital</span>
                                <span class="class-room">Aula 401</span>
                                <span class="class-time">14:00 - 16:00</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="teacher-card">
                    <div class="teacher-info">
                        <h4>Ana Torres</h4>
                        <ul class="classes">
                            <li>
                                <span class="class-name">Finanzas Corporativas</span>
                                <span class="class-room">Aula 202</span>
                                <span class="class-time">16:00 - 18:00</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>

</html>