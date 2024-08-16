<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materia</title>
</head>

<body>
    <?php
    include '../includes/database.php';


    $sql = "SELECT Nombre FROM Carreras";
    $result = $conexion->query($sql);

    $options = "";
    while ($row = $result->fetch_assoc()) {
        $options .= "<option name='{$row['Nombre']}' value='{$row['Nombre']}'>{$row['Nombre']}</option>";
    }

    $conexion->close();
    ?>
    <div class="sidebar-filters">
        <h3>Buscar por carrera</h3>
        <div class="filtro">
            <label for="filtrar-carrera">Carrera:</label>
            <select id="filtrar-carrera" class="filtrarCarrera" style="width: 250px;" name="carrera">
                <option name="Todas" value="Todas">Todas</option>
                <?php echo $options;?>
            </select>
        </div>
        <div class="filtro">
            <label for="filtrar-nivel">Nivel:</label>
            <select id="filtrar-nivel" name="nivel" style="width: 150px;" name="nivel">
                <option value="Todas">Todas</option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="300">300</option>
                <option value="400">400</option>
                <option value="500">500</option>
                <option value="600">600</option>
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