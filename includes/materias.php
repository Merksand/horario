<?php
if (isset($_GET['materia'])) {

    $materia = $_GET['materia'];
    $fecha = $_GET['fecha'] ?? '';

    include 'database.php';

    $consulta = "SELECT
                    Docentes.Nombre AS NombreDocente,
                    Docentes.Apellido AS ApellidoDocente,
                    Materias.Nombre AS NombreMateria,
                    Materias.SubNivel AS SubNivelMateria,
                    Carreras.Nombre AS NombreCarrera,
                    Horarios.Dia,
                    DATE_FORMAT(HoraInicio, '%H:%i') AS HoraInicio,
                    DATE_FORMAT(HoraFin, '%H:%i') AS HoraFin,
                    Aulas.Nombre AS NombreAula,
                    Materias.Nivel As Nivel
                FROM
                    DocenteMateria
                    INNER JOIN Docentes ON DocenteMateria.DocenteID = Docentes.DocenteID
                    INNER JOIN Materias ON DocenteMateria.MateriaID = Materias.MateriaID
                    INNER JOIN Carreras ON Materias.CarreraID = Carreras.CarreraID
                    INNER JOIN Horarios ON DocenteMateria.HorarioID = Horarios.HorarioID
                    INNER JOIN Aulas ON DocenteMateria.AulaID = Aulas.AulaID
                WHERE Materias.Nombre LIKE '%$materia%'";

    if (!empty($_GET['fecha'])) {
        $consulta .= " AND  CASE DAYOFWEEK('$fecha')
        WHEN 1 THEN 'Domingo'
        WHEN 2 THEN 'Lunes'
        WHEN 3 THEN 'Martes'
        WHEN 4 THEN 'Miércoles'
        WHEN 5 THEN 'Jueves'
        WHEN 6 THEN 'Viernes'
        WHEN 7 THEN 'Sábado'
        END = Horarios.Dia ";
    }
    $consulta .= " ORDER BY Horarios.Dia, Horarios.HoraInicio ";

    $consultaMateria = "SELECT * FROM Materias WHERE Nombre LIKE '%$materia%'";
    $resultadoMateria = $conexion->query($consultaMateria);
    $resultado = $conexion->query($consulta);

    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<div class='fila-profesor'>";
            echo "<span class='spanDatos'>" . $fila['HoraInicio'] . " - " . $fila['HoraFin'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreDocente'] . " " . $fila['ApellidoDocente'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreMateria'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreCarrera'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['Dia'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreAula'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['Nivel'] . $fila['SubNivelMateria'] . "</span>";
            echo "</div>";
        }
    } else if ($resultadoMateria && $resultadoMateria->num_rows == 0) {
        echo "<div class='datosIncorrectos'>No existe la Materia ingresada</div>";
        
    } else {
        echo "<div class='datosIncorrectos'>Hoy no enseñan esta materia</div>";

    }
    $conexion->close();
} else {
    echo "No se proporcionaron datos necesario.";
}
