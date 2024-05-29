<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas</title>
</head>

<body>
    <div class="sidebar-filters">
        <h3>Buscar por Aula</h3>
        <div class="filtro">
            <label for="filtrar-aula">Aula:</label>
            <select id="filtrar-aula" class="filtrarAula" style="width: 250px;" name="filtrar-carrera">
                <option name="" value=""></option>
                <option name="Todas" value="Todas">Todas</option>
                <option name="Multisala" value="Multisala">Multisala</option>
                <option name="MB5" value="MB5">MB5</option>
                <option name="MF5" value="MF5">MF5</option>
            </select>
        </div>
    </div>
    <div class="seccionFiltrosCarreras">
        <h3>Dia <span class="filo"><ion-icon name="caret-up"></ion-icon></span></h3>
        <h3>Horas</h3>
        <h3>Docente</h3>
        <h3>Materia</h3>
        <h3>Nivel</h3>
        <h3>Carrera1</h3>
    </div>
    <div id="tabla-profesores">
    </div>
</body>

</html>