<?php
if (isset($_GET['carrera']) && isset($_GET["nivel"])) {

    $carrera = $_GET['carrera'];
    $nivel = $_GET['nivel'];

    include('database.php');

    $consulta = "SELECT
                    Docentes.Nombre AS NombreDocente,
                    Docentes.Apellido AS ApellidoDocente,
                    Materias.Nombre AS NombreMateria,
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
                    INNER JOIN Aulas ON DocenteMateria.AulaID = Aulas.AulaID";
    /* WHERE Carreras.Nombre = '$carrera'"; */


    if ($carrera !== "Todas" && $nivel !== "Todas") {
        $consulta .= " WHERE Carreras.Nombre = '$carrera' AND Materias.Nivel = $nivel";
    } elseif ($carrera !== "Todas" && $nivel === "Todas") {
        $consulta .= " WHERE Carreras.Nombre = '$carrera'";
    } elseif ($carrera === "Todas" && $nivel !== "Todas") {
        $consulta .= " WHERE Materias.Nivel = '$nivel'";
    } elseif ($carrera === "Todas" && $nivel === "Todas") {
        // No se necesita añadir ninguna condición WHERE si ambas son "Todas"
    }


    if (!empty($carrera) && $carrera !== "Todas" && $nivel !== "Todas") {
        $consulta .= " WHERE Carreras.Nombre = '$carrera' AND Materias.Nivel = $nivel";
    } elseif (!empty($carrera) && $carrera !== "Todas" && $nivel === "Todas") {
        $consulta .= " WHERE Carreras.Nombre = '$carrera'";
    } elseif ($carrera === "Todas" && $nivel !== "Todas") {
        $consulta .= " WHERE Materias.Nivel = '$nivel'";
    } elseif (empty($carrera)) {
        echo "No seleccionó ninguna carrera";
    } elseif ($carrera === "Todas" && $nivel === "Todas") {
        // No se necesita añadir ninguna condición WHERE si ambas son "Todas"
    }




    // if ($carrera !== 'Todas') {
    //     $consulta .=  " WHERE Carreras.Nombre = '$carrera' ";       
    // }
    // else if($nivel !== 'Todas' && $carrera !== 'Todas') {
    //     $consulta .= " WHERE Materias.Nivel = '$nivel' AND Carreras.Nombre = '$carrera'";
    // }else if($nivel == "Todas" && $carrera == "Todas") {
    //     $consulta .= " WHERE Materias.Nivel = '$nivel'";
    // }

    $resultado = $conexion->query($consulta);
    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<div class='fila-profesor'>";
            echo "<span class='spanDatos'>" . $fila['Dia'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['HoraInicio'] . " - " . $fila['HoraFin'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreDocente'] . " " . $fila['ApellidoDocente'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreMateria'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NivelMateria'] . "</span>";
            echo "<span class='spanDatos'>" . $fila['NombreAula'] . "</span>";
            echo "</div>";
        }
    } else {
        echo "No se encontraron docentes para la carrera seleccionada.";
    }
    // $conexion->close();
} else {
    echo "No se proporcionó la carrera.";
};
