<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas</title>
</head>

<body>
    <?php
    include '../includes/database.php';
    // $query = "SELECT * FROM aulas order by Nombre asc";
    // $query = "SELECT Nombre FROM Aulas ORDER BY SUBSTRING(Nombre, 1, 2),CAST(SUBSTRING(Nombre, 3) AS UNSIGNED);";
    $query = "SELECT Nombre FROM Aulas ORDER BY SUBSTRING_INDEX(Nombre, '-', 1),CAST(SUBSTRING_INDEX(Nombre, '-', -1) AS UNSIGNED)";
    $result = $conexion->query($query);
    $filtrar_carrera = "";
    while ($row = $result->fetch_assoc()) {
        $filtrar_carrera .= "<option value='{$row['Nombre']}'>{$row['Nombre']}</option>";
    }
    ?>
    <div class="sidebar-filters">
        <h3>Buscar por Aula</h3>
        <div class="filtro">
            <span class="bloquesFiltro">
                <label for="filtrar-aula">Aula:</label>
                <select class="filtrarAula" style="width: 250px;" name="filtrar-aula">
                    <option value="">Seleccione un aula</option>
                    <!-- <option value="Todas">Todas</option> -->
                    <?php echo $filtrar_carrera; ?>
                </select>
            </span>
            <span class="bloquesFiltro">
                <label for="filtrar-turno-evento" class="labelEspacio">Turno:</label>
                <select id="filtrar-turno-evento" name="turno" style="width: 150px;">
                    <option value="Noche">Noche</option>
                    <option value="Mañana">Mañana</option>
                    <option value="Todas">Todas</option>
                </select>
            </span>
            <span class="bloquesFiltro">
                <label for="fecha" class="labelEspacio">Fecha:</label>
                <input type="date" id="fecha" style="width: 150px;" name="fecha">
            </span>
            <input type="submit" value="Semana completa" id="filtrar-aula" name="filtrar-aula">

            <button class="iconoPdf pdfAula" target="_blank"><i class="fa-solid fa-file-pdf fa-lg" style="color: #14e16d;"></i></button>
            <button class="iconoPdf pdfAulaSemana" target="_blank"><i class="fa-solid fa-file-pdf fa-lg" style="color: #14e16d;"></i></button>


            <!-- <select id="filtrar-aula" class="filtrarAula" style="width: 250px;" name="filtrar-carrera">
                <option name="" value=""></option>
                <option name="Todas" value="Todas">Todas</option>
                <option name="Multisala" value="Multisala">Multisala</option>
                <option name="MB5" value="MB5">MB5</option>
                <option name="MF5" value="MF5">MF5</option>
            </select> -->
        </div>
    </div>
    <div class="seccionFiltrosCarreras pilares">
        <h3>Dia</h3>
        <h3>Horas</h3>
        <h3>Docente</h3>
        <h3>Materia</h3>
        <h3>Nivel</h3>
        <h3>Carrera</h3>
    </div>
    <div id="tabla-profesores">
    </div>
</body>

</html>