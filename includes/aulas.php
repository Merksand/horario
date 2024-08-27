<?php
if (isset($_GET['aula'])) {
    $aula = $_GET['aula'] ?? '';
    $fecha = $_GET['fecha'] ?? '';
    $turno = $_GET['turno'] ?? '';

    include 'database.php';

    $consulta = "SELECT
                    Docentes.Nombre AS NombreDocente,
                    Docentes.Apellido AS ApellidoDocente,
                    Materias.Nombre AS NombreMateria,
                    Carreras.Nombre AS NombreCarrera,
                    Materias.Nivel AS NivelMateria,
                    Horarios.Dia AS Dia,
                    DATE_FORMAT(HoraInicio, '%H:%i') AS HoraInicio,
                    DATE_FORMAT(HoraFin, '%H:%i') AS HoraFin,
                    Carreras.Nombre AS NombreCarrera
                FROM
                    DocenteMateria
                    INNER JOIN Docentes ON DocenteMateria.DocenteID = Docentes.DocenteID
                    INNER JOIN Materias ON DocenteMateria.MateriaID = Materias.MateriaID
                    INNER JOIN Carreras ON Materias.CarreraID = Carreras.CarreraID
                    INNER JOIN Horarios ON DocenteMateria.HorarioID = Horarios.HorarioID
                    INNER JOIN Aulas ON DocenteMateria.AulaID = Aulas.AulaID";

    if ($aula !== 'Todas') {
        $consulta .= " WHERE Aulas.Nombre ='$aula'";

        if (!empty($turno) && $turno !== 'Todas') {
            $consulta .= " AND Horarios.Turno = '$turno'" ;
        }
        
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
    }



    $resultado = $conexion->query($consulta);
    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<div class='fila-profesor'>";
            echo "<span class='spanDatos'>" . $fila['Dia'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['HoraInicio'] . " - " . $fila['HoraFin'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreDocente'] . " " . $fila['ApellidoDocente'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreMateria'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NivelMateria'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreCarrera'] . "</span>";
            echo "</div>";
        }
    } else {
        // echo "No se encontraron docentes para la carrera seleccionada.";
        // echo "<div class='datosIncorrectos'>No se encontraron datos del aula</div>";
        echo "<div class='datosIncorrectos'>Aula no ocupada en turno $turno </div>";
    }
    $conexion->close();
} else {
    echo "No se proporcionó la carrera.";
};
