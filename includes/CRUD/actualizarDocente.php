<?php
include '../database.php';

// Asegúrate de que la conexión esté establecida
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$docenteMateriaID = $_POST['docenteMateriaID'];
$nombre = !empty($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : null;
$apellido = !empty($_POST['apellido']) ? mysqli_real_escape_string($conexion, $_POST['apellido']) : null;
$dia = !empty($_POST['dia']) ? mysqli_real_escape_string($conexion, $_POST['dia']) : null;
$periodoInicio = !empty($_POST['periodoInicio']) ? intval($_POST['periodoInicio']) : null;
$materia = !empty($_POST['materia']) ? mysqli_real_escape_string($conexion, $_POST['materia']) : null;
$carrera = !empty($_POST['carrera']) ? mysqli_real_escape_string($conexion, $_POST['carrera']) : null;
$nivel = !empty($_POST['nivel']) ? mysqli_real_escape_string($conexion, $_POST['nivel']) : null;
$aula = !empty($_POST['aula']) ? mysqli_real_escape_string($conexion, $_POST['aula']) : null;

// Obtener el ID del aula a partir del nombre
if ($aula) {
    $aulaQuery = "SELECT AulaID FROM Aulas WHERE Nombre = '$aula'";
    $aulaResult = $conexion->query($aulaQuery);
    
    if ($aulaResult->num_rows > 0) {
        $aulaRow = $aulaResult->fetch_assoc();
        $aulaID = $aulaRow['AulaID'];
    } else {
        // Manejar el caso en que el aula no se encuentra
        echo "El aula especificada no existe.";
        $conexion->close();
        exit;
    }
} else {
    $aulaID = null;
}

// Construir la consulta SQL
$sql = "UPDATE DocenteMateria dm
        JOIN Docentes d ON dm.DocenteID = d.DocenteID
        JOIN Materias m ON dm.MateriaID = m.MateriaID
        JOIN Aulas a ON dm.AulaID = a.AulaID
        JOIN Horarios h ON dm.HorarioID = h.HorarioID
        SET ";

$setClauses = []; // Para almacenar las cláusulas SET

if ($nombre !== null) $setClauses[] = "d.Nombre = '$nombre'";
if ($apellido !== null) $setClauses[] = "d.Apellido = '$apellido'";
if ($dia !== null) $setClauses[] = "h.Dia = '$dia'";
if ($periodoInicio !== null) $setClauses[] = "h.Periodo = '$periodoInicio'";
if ($materia !== null) $setClauses[] = "m.Nombre = '$materia'";
if ($carrera !== null) $setClauses[] = "m.CarreraID = '$carrera'";
if ($nivel !== null) $setClauses[] = "m.Nivel = '$nivel'";
if ($aulaID !== null) $setClauses[] = "dm.AulaID = '$aulaID'";

// Verificar si hay cláusulas SET para evitar una consulta inválida
if (count($setClauses) > 0) {
    $sql .= implode(', ', $setClauses);
    $sql .= " WHERE dm.DocenteMateriaID = $docenteMateriaID";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($sql);
    
    if ($resultado) {
        echo "Datos actualizados correctamente";
    } else {
        echo "Error al actualizar los datos: " . $conexion->error;
    }
} else {
    echo "No se han proporcionado datos para actualizar.";
}

// Cerrar la conexión
$conexion->close();

