<?php

include 'database.php';

$valor = $_REQUEST["valorPadre"];



if (isset($valor)) {
    if ($valor == "card__Docentes") {
        // $query = "SELECT * FROM docentes order by Nombre";        
        $query = "    SELECT 
    Docentes.Nombre AS nombre,
    Docentes.Apellido AS apellido,
    GROUP_CONCAT(DISTINCT Carreras.Nombre ORDER BY Carreras.Nombre SEPARATOR ' , ') AS CarrerasAsociadas 
FROM
    DocenteMateria
    INNER JOIN Docentes ON DocenteMateria.DocenteID = Docentes.DocenteID
    INNER JOIN Materias ON DocenteMateria.MateriaID = Materias.MateriaID
    INNER JOIN Carreras ON Materias.CarreraID = Carreras.CarreraID 
GROUP BY 
    Docentes.Nombre, Docentes.Apellido
ORDER BY 
    Docentes.Nombre;
";
        $result = $conexion->query($query);
        while ($fila = $result->fetch_assoc()) {
            echo "<li class='lista__Docentes data-item '>" .  $fila["nombre"] . " " . $fila["apellido"] . '<span class="idHomeCarrera">' . $fila["CarrerasAsociadas"] . '</span>' . "</li>";
        }
    }

    if ($valor == "card__Aulas") {
        // $query = "SELECT Nombre FROM Aulas ORDER BY SUBSTRING_INDEX(Nombre, '-', 1),CAST(SUBSTRING_INDEX(Nombre, '-', -1) AS UNSIGNED)";
        $query = "SELECT 
    Aulas.Nombre AS aula,
    GROUP_CONCAT(DISTINCT Carreras.Nombre ORDER BY Carreras.Nombre SEPARATOR ' , ') AS carrerasAsociadas
FROM
    Aulas
    LEFT JOIN DocenteMateria ON Aulas.AulaID = DocenteMateria.AulaID
    LEFT JOIN Materias ON DocenteMateria.MateriaID = Materias.MateriaID
    LEFT JOIN Carreras ON Materias.CarreraID = Carreras.CarreraID
GROUP BY Aulas.AulaID, Aulas.Nombre
ORDER BY SUBSTRING_INDEX(aula, '-', 1),CAST(SUBSTRING_INDEX(aula, '-', -1) AS UNSIGNED)";
        $result = $conexion->query($query);
        while ($fila = $result->fetch_assoc()) {
            echo "<li class='data-item lista__Aulas'>" . $fila["aula"] . "<span class='idHomeCarrera'>" . $fila["carrerasAsociadas"] . "</span>" . "</li>";
        }
    }
    if ($valor == "card__Materias") {
        // $query = "SELECT Distinct Nombre FROM Materias order by Nombre";
        $query = "SELECT 
    Materias.Nombre AS Materia,
    GROUP_CONCAT(DISTINCT Carreras.Nombre ORDER BY Carreras.Nombre SEPARATOR ' , ') AS CarrerasAsociadas
FROM
    Materias
    INNER JOIN Carreras ON Materias.CarreraID = Carreras.CarreraID
GROUP BY Materias.Nombre
ORDER BY Materias.Nombre";
        $result = $conexion->query($query);
        while ($fila = $result->fetch_assoc()) {
            echo "<li class='data-item lista__Materias'>" . $fila["Materia"] . "<span class='idHomeCarrera'>" . $fila["CarrerasAsociadas"] . "</span>" . "</li>";
        }
    }
    if ($valor == "card__Carreras") {
        $query = "SELECT Nombre FROM Carreras order by Nombre";
        $result = $conexion->query($query);
        while ($fila = $result->fetch_assoc()) {
            echo "<li class='data-item lista__Carreras' >" . $fila["Nombre"] . "</li>";
        }
    }
}
