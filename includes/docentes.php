<?php
if (isset($_GET['nombre']) || isset($_GET['apellido']) || isset($_GET['fecha'])) {
    $nombre = $_GET['nombre'] ?? '';
    $apellido = $_GET['apellido'] ?? '';
    $fecha = $_GET['fecha'] ?? '';
    $turno = $_GET['turno'];
    // $fecha = isset($_GET['fecha']) ?? '';
    include 'database.php';
    // if ($conexion->connect_error) {
    //     die("Error de conexión: " . $conexion->connect_error);
    // }
    $consulta = "SELECT
                    Docentes.Nombre AS NombreDocente,
                    Docentes.Apellido AS ApellidoDocente,
                    Materias.Nombre AS NombreMateria,
                    Carreras.Nombre AS NombreCarrera,
                    Horarios.Dia,
                    DATE_FORMAT(HoraInicio, '%H:%i') AS HoraInicio,
                    DATE_FORMAT(HoraFin, '%H:%i') AS HoraFin,
                    Aulas.Nombre AS NombreAula,
                    Materias.Nivel As Nivel,
                    Horarios.Periodo AS Periodo
                FROM
                    DocenteMateria
                    INNER JOIN Docentes ON DocenteMateria.DocenteID = Docentes.DocenteID
                    INNER JOIN Materias ON DocenteMateria.MateriaID = Materias.MateriaID
                    INNER JOIN Carreras ON Materias.CarreraID = Carreras.CarreraID
                    INNER JOIN Horarios ON DocenteMateria.HorarioID = Horarios.HorarioID
                    INNER JOIN Aulas ON DocenteMateria.AulaID = Aulas.AulaID
                    INNER JOIN GestionSemestre ON DocenteMateria.GestionSemestreID = GestionSemestre.GestionSemestreID
                WHERE GestionSemestre.GestionSemestreID = (SELECT GestionSemestreID FROM GestionSemestre ORDER BY GestionSemestreID DESC LIMIT 1)";

    if ($turno !== "Todas") {
        $consulta .= " AND Horarios.Turno = '$turno'";
    }

    if (!empty($nombre) && !empty($apellido)) {
        $consulta .= " AND Docentes.Nombre LIKE '%$nombre%' AND Docentes.Apellido LIKE '%$apellido%'";
        if (!empty($fecha)) {
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
    } elseif (!empty($apellido)) {
        $consulta .= " AND Docentes.Apellido LIKE '%$apellido%'";
        if (!empty($fecha)) {
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
    } elseif (!empty($nombre)) {
        $consulta .= " AND Docentes.Nombre LIKE '%$nombre%'";
        if (!empty($fecha)) {
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
    } else {
        echo "<div class='datosIncorrectos'>No se proporcionaron nombre y/o apellido.</div>";
        exit;
    }
    $consulta .= " ORDER BY Horarios.HorarioID";

    $resultado = $conexion->query($consulta);

    $docente = "SELECT * FROM Docentes WHERE Nombre LIKE '%$nombre%' AND Apellido LIKE '%$apellido%'";
    $resultado2 = $conexion->query($docente);

    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<div class='fila-profesor'>";
            echo "<span class='spanDatos'>" . $fila['Dia'] . "</span>";
            echo "<span class='spanDatos textCenter'>" . "P" . $fila['Periodo'] . " : " . $fila['HoraInicio'] . " - " . $fila['HoraFin'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreDocente'] . " " . $fila['ApellidoDocente'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreMateria'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreCarrera'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreAula'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['Nivel'] . "</span>";
            echo "</div>";
        }
    } else if ($resultado2->num_rows > 0) {
        echo "<div class='datosIncorrectos'>El docente no trabaja hoy</div>";
        exit();
    } else {
        // echo "No se encontraron docentes con ese nombre y/o apellido.";
        echo "<div class='datosIncorrectos'>No se encontró al Docente</div>";
    }
    $conexion->close();
} else {
    // echo "No se proporcionaron nombre y/o apellido.";
    // echo "<div class='datosIncorrectos'>No se encontró al Docente</div>";

}
