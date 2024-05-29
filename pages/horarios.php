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
            <!-- <select id="filtrar-carrera filtrar-carrera-horario" id="materia" style="width: 150px;" name=""> -->
                <option value="Todas">Todas</option>
                <option value="Mecánica Industrial">Mecánica Industrial</option>
                <option value="Mecánica Automotriz">Mecánica Automotriz</option>
                <option value="Electrónica">Electrónica</option>
                <option value="Electricidad Industrial">Electricidad Industrial</option>
                <option value="Construcción Civil">Construcción Civil</option>
                <option value="Química">Química Industrial</option>
                <option value="Contaduría General">Contaduría General</option>
                <option value="Sistemas Informáticos">Sistemas Informáticos</option>
            </select>
        </div>
        <div class="filtro">
            <label for="filtrar-nivel">Nivel:</label>
            <select id="filtrar-nivel" name="nivel" style="width: 150px;" name="nivel">
                <option value="Todas">Todas</option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="300">300</option>
            </select>
        </div>
        <div class="filtro">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" style="width: 150px;" name="fecha">   
            <input type="submit" value="Filtrar" id="filtrar-horario" name="filtrar-horario">
        </div>
    </div>
    <div class="seccionFiltrosCarreras">
        <h3>Dia <span class="filo"><ion-icon name="caret-up"></ion-icon></span></h3>
        <h3>Horas</h3>
        <h3>Docente</h3>
        <h3>Materia</h3>
        <h3>Nivel</h3>
        <h3>Aula</h3>
    </div>
    <div id="tabla-profesores">


    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>