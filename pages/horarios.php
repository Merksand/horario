<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Horario</title>
</head>

<body>
    <div class="sidebar-filters">
        <h3 id="desaparecer">Filtros de horario</h3>
        <div class="filtro">
            <label for="filtrar-carrera">Carrera:</label>
            <select id="filtrar-carrera" id="materia" style="width: 150px;" name="filtrar-carrera">
                <option value="Todas">Todas</option>
                <option value="Sistemas Informáticos">Sistemas Informáticos</option>
                <option value="Construcción Civil">Construcción Civil</option>
                <option value="Contaduría General">Contaduría General</option>
                <option value="Mecánica Automotriz">Mecánica Automotriz</option>
                <option value="Mecánica Industrial">Mecánica Industrial</option>
                <option value="Electrónica">Electrónica</option>
                <option value="Química Industrial">Química Industrial</option>
                <option value="Electricidad Industrial">Electricidad Industrial</option>
            </select>
        </div>
        <div class="filtro">
            <label for="filtrar-nivel">Nivel:</label>
            <select id="filtrar-nivel" name="nivel" style="width: 150px;">
                <option value="Todas">Todas</option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="300">300</option>
                <option value="400">400</option>
                <option value="500">500</option>
                <option value="600">600</option>
            </select>
        </div>
        <div class="filtro">
            <label for="filtrar-turno">Turno:</label>
            <select id="filtrar-turno" name="turno" style="width: 150px;">
                <option value="Todas">Todas</option>
                <option value="Mañana">Mañana</option>
                <option value="Tarde">Tarde</option>
                <option value="Noche">Noche</option>
            </select>
        </div>
        <div class="filtro">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" style="width: 150px;" name="fecha">
            <input type="submit" value="Filtrar" id="filtrar-horarios" name="filtrar-horario">
        </div>
        <button class="iconoPdf" target="_blank"><i class="fa-solid fa-file-pdf fa-lg" style="color: #14e16d;"></i></button>

    </div>

    <div class="seccionFiltrosHorarios pilares">
        <h3>Dia  </h3>
        <h3>Horas</h3>
        <h3>Docente</h3>
        <h3>Materia</h3>
        <h3>Nivel</h3>
        <h3>Aula</h3>
        <h3>Carrera</h3>
    </div>
    <div id="tabla-profesores">


    </div>
    <script src="assets/js/script.js"></script>
</body>

</html>