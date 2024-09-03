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
        echo "El aula especificada no existe.";
        $conexion->close();
        exit;
    }
} else {
    $aulaID = null;
}

if ($nivel) {
    $materiasQuery = "SELECT MateriaID FROM Materias WHERE Nivel = '$nivel'";
    $materiasResult = $conexion->query($materiasQuery);
    
    if ($materiasResult->num_rows > 0) {
        $materias = [];
        while ($materiaRow = $materiasResult->fetch_assoc()) {
            $materias[] = $materiaRow['MateriaID'];
        }
    } else {
        echo "No existen materias para el nivel especificado.";
        $conexion->close();
        exit;
    }
}

if($carrera){
    $carreraQuery = "SELECT CarreraID FROM Carreras WHERE Nombre = '$carrera'";
    $carreraResult = $conexion->query($carreraQuery);
    
    if ($carreraResult->num_rows > 0) {
        $carreraRow = $carreraResult->fetch_assoc();
        $carreraID = $carreraRow['CarreraID'];
    } else {
        // Manejar el caso en que la carrera no se encuentra
        echo "La carrera especificada no existe.";
        $conexion->close();
        exit;
    }
}

if($materia){
    $materiaQuery = "SELECT MateriaID FROM Materias WHERE Nombre = '$materia' AND CarreraID = '$carreraID' AND Nivel = '$nivel'";
    $materiaResult = $conexion->query($materiaQuery);
    
    if ($materiaResult->num_rows > 0) {
        $materiaRow = $materiaResult->fetch_assoc();
        $materiaID = $materiaRow['MateriaID'];
    } else {
        // Manejar el caso en que la materia no se encuentra
        echo "La materia especificada no existe.";
        $conexion->close();
        exit;
    }
}

// Construir la consulta SQL
$sql = "UPDATE DocenteMateria dm
        JOIN Docentes d ON dm.DocenteID = d.DocenteID
        JOIN Materias m ON dm.MateriaID = m.MateriaID
        JOIN Carreras c ON m.CarreraID = c.CarreraID
        JOIN Aulas a ON dm.AulaID = a.AulaID
        JOIN Horarios h ON dm.HorarioID = h.HorarioID
        SET ";

$setClauses = []; // Para almacenar las cláusulas SET

if ($nombre !== null) $setClauses[] = "d.Nombre = '$nombre'";
if ($apellido !== null) $setClauses[] = "d.Apellido = '$apellido'";
// if ($dia !== null) $setClauses[] = "dm.Dia = '$dia'";
if ($periodoInicio !== null) $setClauses[] = "h.Periodo = '$periodoInicio'";
if ($materia !== null) $setClauses[] = "dm.MateriaID = '$materiaID'";
// if ($carrera !== null) $setClauses[] = "dm.CarreraID = '$carreraID'";
// if ($nivel !== null) $setClauses[] = "dm.Nivel = '$nivel'";
if ($aulaID !== null) $setClauses[] = "dm.AulaID = '$aulaID'";

// Verificar si hay cláusulas SET para evitar una consulta inválida
if (count($setClauses) > 0) {
    $sql .= implode(', ', $setClauses);
    $sql .= " WHERE dm.DocenteMateriaID = $docenteMateriaID";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($sql);
    
    if ($resultado) {
        echo "Datos actualizados correctamente ".$sql;
    } else {
        echo "Error al actualizar los datos: " . $conexion->error;
    }
} else {
    echo "No se han proporcionado datos para actualizar.";
}

// Cerrar la conexión
$conexion->close();

