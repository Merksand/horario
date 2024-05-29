<?php
if (isset($_GET['materia'])) {

    $materia = $_GET['materia'];

    include('database.php');
   
    $consulta = "SELECT
                    Docentes.Nombre AS NombreDocente,
                    Docentes.Apellido AS ApellidoDocente,
                    Materias.Nombre AS NombreMateria,
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

    // if (!empty($nombre) && !empty($apellido)) {
    //     $consulta .= " Docentes.Nombre LIKE '%$nombre%' AND Docentes.Apellido LIKE '%$apellido%'";
    // } elseif (!empty($apellido)) {
    //     $consulta .= " Docentes.Apellido LIKE '%$apellido%'";
    // } elseif (!empty($nombre)) {
    //     $consulta .= " Docentes.Nombre LIKE '%$nombre%'";
    // } else {
    //     echo "No se proporcionaron nombre y/o apellido.";
    //     exit;
    // }
    // $consulta .= " ORDER BY Horarios.HorarioID";

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
            echo "<span class='spanDatos'>" . $fila['Nivel'] . "</span>";
            echo "</div>";
        }
    } else {
        echo "No se encontraron docentes con ese nombre y/o apellido.";
    }
    $conexion->close();
} else {
    echo "No se proporcionaron nombre y/o apellido.";
}
