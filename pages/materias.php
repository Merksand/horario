<!DOCTYPE html>
<html lang="esx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias</title>
</head>

<body>
    <?php
    include "../includes/database.php";
    $query = "SELECT Nombre,Nivel,Paralelo FROM materias";
    $result = $conexion->query($query);
    $materias = [];
    while ($row = $result->fetch_assoc()) {
        $materias[] = $row;
    }
    ?>
    <div class="sidebar-filters">
        <h3>Buscar por Materia</h3>

        <div class="filtro">
            <form id="form-materia"> <!-- Cambiado a id para fácil referencia en JS -->
                <label for="materia">Nombre:</label>
                <input list="lista-materias" type="text" id="materia" name="materia" placeholder="Nombre de la materia" style="width: 250px;">
                <datalist id="lista-materias">
                    <?php
                    foreach ($materias as $materia) {
                        // echo "<option value='" . $materia['Nombre'] . "'>";

                        // echo "<option value='{$materia['Nombre']}'>{$materia['Nombre']}</option>";

                        // echo '<option value="' . $materia['Nombre'] . '">';



                        echo "<option value='$materia[Nombre]'>$materia[Nivel] $materia[Paralelo]</option>";
                    }
                    ?>
                </datalist>

                <!-- <input type="text" id="materia" placeholder="Nombre de la materia" style="width: 150px;" name="materia"> -->
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" class="fechaDocente" style="width: 150px;" name="fecha">
                <input type="submit" value="Filtrar" id="btn-materia" name="btn-filtrar" class="btna">
            </form>
            <input type="submit" value="Semana completa" id="filtrar-horario" name="filtrar-horario">
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
    <!-- <script src="assets/js/script.js"></script> -->
    <!-- <script src="assets/js/docentes.js"></script> -->
</body>

</html>