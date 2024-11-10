<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Document</title>
</head>

<body>
    <style>

    </style>
    <div class="sidebar-filters">
        <h3>Buscar Docente</h3>

        <div class="filtro">
            <form>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" placeholder="Nombre del docente" style="width: 150px;" name="nombre">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" placeholder="Apellido del docente" style="width: 150px;" name="apellido">

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" class="fechaDocente" style="width: 150px;" name="fecha">
                <!-- <input type="submit" value="Filtrar" id="btn-filtrar" name="btn-filtrar" class="btna" style="visibility: hidden;"> -->
                <input type="submit" value="Filtrar" id="btn-filtrar" name="btn-filtrar" class="btna">
            </form>
            <input type="submit" value="Semana completa" id="filtrar-semana" name="filtrar-horario">
            <button class="iconoPdf pdfDocente" target="_blank"><i class="fa-solid fa-file-pdf fa-lg" style="color: #14e16d;" title="PDF Del Dia"></i></button>
            <button class="iconoPdf pdfDocenteSemana" target="_blank"><i class="fa-solid fa-file-pdf fa-lg" style="color: #14e16d;" title="PDF Semanal"></i></button>
        </div>
    </div>
    <div class="seccionFiltrosDocentes pilares">
        <!-- <h3>Docente </ion-icon><ion-icon name="caret-down"></ion-icon></h3> -->
        <h3>Dia</h3>
        <h3>Horas</h3>
        <h3>Docente</h3>
        <h3>Materia</h3>
        <h3>Carrera</h3>
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