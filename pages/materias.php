<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>
</head>
<body>
    <div class="sidebar-filters">
        <h3>Buscar por Materia</h3>

        <div class="filtro">
            <form action="">
            <label for="materia">Nombre:</label>
            <input type="text" id="materia" placeholder="Nombre de la materia" style="width: 150px;" name="materia">
            <input type="submit" value="Filtrar" id="btn-materia" name="btn-filtrar" class="btna">
            </form>
        </div>
    </div>
    <div class="seccionFiltrosDocentes">
        <!-- <h3>Docente </ion-icon><ion-icon name="caret-down"></ion-icon></h3> -->
        <h3>Horas</h3>
        <h3>Docente <span class="filo"><ion-icon name="caret-down" ></ion-icon></span></h3>
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
    <!-- <script src="assets/js/script.js"></script> -->
    <!-- <script src="assets/js/docentes.js"></script> -->
</body>
</html>