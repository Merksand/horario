<?php
if (isset($_GET['carrera']) && isset($_GET["nivel"])) {

    $carrera = $_GET['carrera'];
    $nivel = $_GET['nivel'];

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
                    Aulas.Nombre AS NombreAula,
                    Materias.Paralelo AS Paralelo,
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

    // Condiciones basadas en 'carrera' y 'nivel'
    if ($carrera !== 'Todas' && $nivel !== 'Todas') {
        $consulta .= " AND Carreras.Nombre = '$carrera' AND Materias.Nivel = $nivel";
    } else if ($carrera !== 'Todas') {
        $consulta .= " AND Carreras.Nombre = '$carrera'";
    } else if ($nivel !== 'Todas') {
        $consulta .= " AND Materias.Nivel = $nivel";
    }




    $consulta .= " ORDER BY Horarios.HorarioID, Horarios.HoraInicio ";
    $resultado = $conexion->query($consulta);
    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<div class='fila-profesor'>";
            echo "<span class='spanDatos'>" . $fila['Dia'] . "</span>";
            echo "<span class='spanDatos'>"  . "P" . $fila['Periodo'] . " : " . $fila['HoraInicio'] . " - " . $fila['HoraFin'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreDocente'] . " " . $fila['ApellidoDocente'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreMateria'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NivelMateria'] . " " . $fila['Paralelo'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreAula'] . "</span>";
            echo "</div>";
        }
    } else {
        echo "<div class='datosIncorrectos'>No existe el nivel en la carrera</div>";
    }
    // $conexion->close();
} else {
    echo "No se proporcionó la carrera.";
};
