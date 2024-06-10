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
        <div class="filtro">
            <label for="filtrar-carrera">Carrera:</label>
            <select id="filtrar-carrera" class="filtrarCarrera" style="width: 250px;" name="carrera">
                <!-- <option name="" value=""></option> -->
                <option name="Todas" value="Todas">Todas</option>
                <option name="Mecanica Industrial" value="Mecanica Industrial">Mecánica Industrial</option>
                <option name="Mecanica Automotriz" value="Mecanica Automotriz">Mecánica Automotriz</option>
                <option name="Electronica" value="Electronica">Electrónica</option>
                <option name="Electricidad Industrial" value="Electricidad Industrial">Electricidad Industrial</option>
                <option name="Construccion Civil" value="Construccion Civil">Construcción Civil</option>
                <option name="Quimica" value="Quimica">Química Industrial</option>
                <option name="Contaduria General" value="Contaduria General">Contaduría General</option>
                <option name="Sistemas Informaticos" value="Sistemas Informaticos">Sistemas Informáticos</option>
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
            <input type="submit" value="Filtrar" id="filtrar-nivel-carrera" name="filtrar-nivel-carrera" class="brt">
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
</body>

</html>