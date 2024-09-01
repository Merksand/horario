<?php
include '../database.php';

$docenteMateriaID = $_POST['docenteMateriaID'];
$nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : null;
$apellido = !empty($_POST['apellido']) ? $_POST['apellido'] : null;
$dia = !empty($_POST['dia']) ? $_POST['dia'] : null;
$periodoInicio = !empty($_POST['periodoInicio']) ? $_POST['periodoInicio'] : null;
$materia = !empty($_POST['materia']) ? $_POST['materia'] : null;
$carrera = !empty($_POST['carrera']) ? $_POST['carrera'] : null;
$nivel = !empty($_POST['nivel']) ? $_POST['nivel'] : null;
$aula = !empty($_POST['aula']) ? $_POST['aula'] : null;

$sql = "UPDATE DocenteMateria dm
        JOIN Docentes d ON dm.DocenteID = d.DocenteID
        JOIN Materias m ON dm.MateriaID = m.MateriaID
        JOIN Aulas a ON dm.AulaID = a.AulaID
        JOIN Horarios h ON dm.HorarioID = h.HorarioID
        SET ";

$setClauses = [];

if ($nombre) $setClauses[] = "d.Nombre = '$nombre'";
if ($apellido) $setClauses[] = "d.Apellido = '$apellido'";
if ($dia) $setClauses[] = "h.Dia = '$dia'";
if ($periodoInicio) $setClauses[] = "h.PeriodoInicio = '$periodoInicio'";
if ($materia) $setClauses[] = "m.NombreMateria = '$materia'";
if ($carrera) $setClauses[] = "m.Carrera = '$carrera'";
if ($nivel) $setClauses[] = "m.Nivel = '$nivel'";
if ($aula) $setClauses[] = "a.NombreAula = '$aula'";

$sql .= implode(', ', $setClauses);
$sql .= " WHERE dm.DocenteMateriaID = $docenteMateriaID";

$resultado = $conexion->query($sql);

if ($resultado) {
    echo "Datos actualizados correctamente";
} else {
    echo "Error al actualizar los datos: " . $conexion->error;
}
