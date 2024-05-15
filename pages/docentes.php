<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="sidebar-filters">
        <h3>Buscar Profesor</h3>

        <div class="filtro">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" placeholder="Nombre del docente" style="width: 150px;" name="nombre">
            <input type="text" id="apellido" placeholder="Apellido del docente" style="width: 150px;" name="apellido">
            <!-- <button id="btn-filtrar-profesores">Filtrar</button> -->
            <input type="submit" value="Filtrar" id="btn-filtrar" name="btn-filtrar" class="btna">
        </div>
    </div>
    <div id="tabla-profesores">
        
    </div>
    <script>
        
    </script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/docentes.js"></script>
</body>
</html>