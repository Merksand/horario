<?php
if (isset($_GET['carrera']) && isset($_GET['fecha']) || isset($_GET['nivel']) || isset($_GET['turno'])) {
    $carrera = $_GET['carrera'];
    $fecha = $_GET['fecha'];
    $nivel = $_GET['nivel'];
    $turno = $_GET['turno'];

    include 'database.php';

    $consulta = "
        SELECT
            Docentes.Nombre AS NombreDocente,
            Docentes.Apellido AS ApellidoDocente,
            Materias.Nombre AS NombreMateria,
            Materias.SubNivel AS SubNivelMateria,
            Carreras.Nombre AS NombreCarrera,
            Materias.Nivel AS NivelMateria,
            Horarios.Dia AS Dia,
            DATE_FORMAT(HoraInicio, '%H:%i') AS HoraInicio,
            DATE_FORMAT(HoraFin, '%H:%i') AS HoraFin,
            Aulas.Nombre AS NombreAula
        FROM
            DocenteMateria
            INNER JOIN Docentes ON DocenteMateria.DocenteID = Docentes.DocenteID
            INNER JOIN Materias ON DocenteMateria.MateriaID = Materias.MateriaID
            INNER JOIN Carreras ON Materias.CarreraID = Carreras.CarreraID
            INNER JOIN Horarios ON DocenteMateria.HorarioID = Horarios.HorarioID
            INNER JOIN Aulas ON DocenteMateria.AulaID = Aulas.AulaID
        WHERE
            CASE DAYOFWEEK('$fecha')
                WHEN 1 THEN 'Domingo'
                WHEN 2 THEN 'Lunes'
                WHEN 3 THEN 'Martes'
                WHEN 4 THEN 'Miércoles'
                WHEN 5 THEN 'Jueves'
                WHEN 6 THEN 'Viernes'
                WHEN 7 THEN 'Sábado'
            END = Horarios.Dia ";

    if ($nivel !== 'Todas') {
        $consulta .= " AND Materias.Nivel ='$nivel' ";
    }
    if ($carrera !== "Todas") {
        $consulta .= " AND Carreras.Nombre = '$carrera'";
    }
    if($turno !== "Todas"){
        $consulta .= " AND Horarios.Turno = '$turno'";
    }
    // $consulta .= " ORDER BY Horarios.Dia, Horarios.HoraInicio "; 
    // $consulta .= " ORDER BY Horarios.Dia,Horarios.HoraFin, NombreDocente "; 
    $consulta .= " ORDER BY NombreDocente;"; 
    $resultado = $conexion->query($consulta);
    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<div class='fila-profesor'>";
            echo "<span class='spanDatos textCenter'>" . $fila['Dia'] . "</span>";
            echo "<span class='spanDatos textCenter'>" . $fila['HoraInicio'] . " - " . $fila['HoraFin'] . "</span>";
            echo "<span class='spanDatos '>" . $fila['NombreDocente'] . " " . $fila['ApellidoDocente'] . "</span>";
            echo "<span class='spanDatos '>" . $fila['NombreMateria'] . "</span>";
            echo "<span class='spanDatos textCenter'>" . $fila['NivelMateria'] . " " . $fila['SubNivelMateria'] . "</span>";
            echo "<span class='spanDatos '>" . $fila['NombreAula'] . "</span>";
            echo "<span class='spanDatos '>" . $fila['NombreCarrera'] . "</span>";
            echo "</div>";
        }

        // Imprimir la salida HTML
        // echo $output;
    } else {
        // echo "No se encontraron docentes para la carrera seleccionada en la fecha especificada.";
        echo "<div class='datosIncorrectos'>No se encontraron los datos que requiere</div>";
    }
} else {
    echo "No se proporcionaron datos de filtro.";
}
