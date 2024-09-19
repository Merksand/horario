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
                    INNER JOIN GestionSemestre ON DocenteMateria.GestionSemestreID = GestionSemestre.GestionSemestreID";
    /* WHERE Carreras.Nombre = '$carrera'"; */


    if ($carrera !== "Todas" && $nivel !== "Todas") {
        $consulta .= " WHERE Carreras.Nombre = '$carrera' AND Materias.Nivel = $nivel AND GestionSemestre.GestionSemestreID = (SELECT GestionSemestreID FROM GestionSemestre ORDER BY GestionSemestreID DESC LIMIT 1)";
    } else if ($carrera !== "Todas" && $nivel == "Todas") {
        $consulta .= " WHERE Carreras.Nombre = '$carrera' AND GestionSemestre.GestionSemestreID = (SELECT GestionSemestreID FROM GestionSemestre ORDER BY GestionSemestreID DESC LIMIT 1)";
    } elseif ($carrera == "Todas" && $nivel !== "Todas") {
        $consulta .= " WHERE Materias.Nivel = '$nivel' AND GestionSemestre.GestionSemestreID = (SELECT GestionSemestreID FROM GestionSemestre ORDER BY GestionSemestreID DESC LIMIT 1)";
    } else if (empty($carrera)) {
        echo "No seleccionó ninguna carrera";
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
