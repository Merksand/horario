<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materia</title>
</head>
<body>
    <div class="sidebar-filters">
        <h3>Buscar por carrera</h3>
        <?php 
            include ('../includes/database.php');
        ?>
        <div class="filtro">
            <label for="carrera">Carrera:</label>
            <select id="filtrar-carrera" style="width: 250px;" name="filtrar-carrera">
                <option name="" value=""></option>
                <option name="Todas" value="Todas">Todas</option>
                <option name="Mecanica Industrial" value="Mecanica Industrial">Mecánica Industrial</option>
                <option name="Mecanica Automotriz" value="Mecanica Automotriz">Mecánica Automotriz</option>
                <option name="Electronica">Electrónica value="Electronica">Electrónica</option>
                <option name="Electricidad Industrial" value="Electricidad Industrial">Electricidad Industrial</option>
                <option name="Construccion Civil" value="Construccion Civil">Construcción Civil</option>
                <option name="Quimica" value="Quimica">Química Industrial</option>
                <option name="Contaduria General" value="Contaduria General">Contaduría General</option>
                <option name="Sistemas Informaticos" value="Sistemas Informaticos">Sistemas Informáticos</option>
            </select>
        </div>
    </div>
    <div class="seccionFiltros">
        <h3>Docente</h3>
        <h3>Carrera</h3>
        <h3>Aula</h3>
        <h3>Horario</h3>
    </div>
    <div id="tabla-profesores">
        <?php 
            include ('../includes/carreras.php');
        ?>
    </div>
</body>
</html>