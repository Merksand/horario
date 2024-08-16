<?php
include '../database.php';

// $docenteMateriaID = $_POST['docenteMateriaID'];
// $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : null;
// $apellido = !empty($_POST['apellido']) ? $_POST['apellido'] : null;
// $dia = !empty($_POST['dia']) ? $_POST['dia'] : null;
// $periodoInicio = !empty($_POST['periodoInicio']) ? $_POST['periodoInicio'] : null;
// $materia = !empty($_POST['materia']) ? $_POST['materia'] : null;
// $carrera = !empty($_POST['carrera']) ? $_POST['carrera'] : null;
// $nivel = !empty($_POST['nivel']) ? $_POST['nivel'] : null;
// $aula = !empty($_POST['aula']) ? $_POST['aula'] : null;

$sql = "UPDATE DocenteMateria dm
        JOIN Docentes d ON dm.DocenteID = d.DocenteID
        JOIN Materias m ON dm.MateriaID = m.MateriaID
        JOIN Aulas a ON dm.AulaID = a.AulaID
        JOIN Horarios h ON dm.HorarioID = h.HorarioID
        SET ";


$nombre = 'Ivar';

if ($nombre) $sql .= "d.Nombre = '$nombre'";
$id = 3;
// $sql = "Select * from Docentes";
$sql .= " WHERE d.DocenteID = 4";
// $sql .= " WHERE dm.DocenteMateriaID = $docenteMateriaID";
$resultado = $conexion->query($sql);


$sel = $conexion->query("SELECT * FROM Docentes");


if (mysqli_query($conexion, $sql)) {
    echo "Datos actualizados correctamente";
}

while ($fila = $sel->fetch_assoc()) {
    // echo "Resultado: " . $fila['Nombre'];
    echo "ID: {$fila['DocenteID']}, Nombre: {$fila['Nombre']}, Apellido: {$fila['Apellido']}\n"."<br>";
}
