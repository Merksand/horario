<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="sidebar-filters">
        <h3>Buscar Docente</h3>

        <div class="filtro">
            <form>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" placeholder="Nombre del docente" style="width: 150px;" name="nombre">
                <input type="text" id="apellido" placeholder="Apellido del docente" style="width: 150px;" name="apellido">
                <input type="submit" value="Filtrar" id="btn-filtrar" name="btn-filtrar" class="btna">
        </div>

        </form>
        <div class="filtro">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" class="fechaDocente" style="width: 150px;" name="fecha">
            <!-- <input type="submit" value="Filtrar" id="filtrar-horarieo" name="filtrar-horario"> -->
            <input type="submit" value="Filtrar" id="filtrar-horario" name="filtrar-horario">
        </div>
    </div>
    <div class="seccionFiltrosDocentes">
        <!-- <h3>Docente </ion-icon><ion-icon name="caret-down"></ion-icon></h3> -->
        <h3>Horas</h3>
        <h3>Docente <span class="filo"><ion-icon name="caret-down"></ion-icon></span></h3>
        <h3>Materia</h3>
        <h3>Carrera</h3>
        <h3>Dia</h3>
        <h3>Aula</h3>
        <h3>Nivel</h3>
    </div>
    <div id="tabla-profesores">

    </div>
    <script>

    </script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/docentes.js"></script>
</body>

</html>