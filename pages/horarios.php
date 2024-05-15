<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario</title>
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
</head>

<body>
    <div class="sidebar-filters">
        <h3 id="desaparecer">Filtros</h3>
        <div class="filtro">
            <label for="materia">Carrera:</label>
            <select id="materia" style="width: 150px;">
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
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" style="width: 150px;">
            <!-- <button id="btn-filtrar" class="btn" name="btn-filtrar">Filtrar</button> -->
            <input type="submit" value="Filtrar" id="btn-filtrar" name="btn-filtrar">
        </div>

    </div>
    <div class="seccionFiltros">
        <h3>Docente</h3>
        <h3>Carrera</h3>
        <h3>Aula</h3>
        <h3>Horario</h3>
    </div>
    <div id="tabla-profesores">


    </div>
    
    <script src="assets/js/script.js"></script>
</body>

</html>