<?php
session_name('login');
session_start();

if (isset($_SESSION['usuario_id'])) {
    $usuarioID = $_SESSION['usuario_id'];
}

include '../database.php';

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Recibir datos del formulario
$docenteMateriaID = $_POST['docenteMateriaID'];
$nombre = !empty($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : null;
$apellido = !empty($_POST['apellido']) ? mysqli_real_escape_string($conexion, $_POST['apellido']) : null;
$periodoInicio = !empty($_POST['periodoInicio']) ? intval($_POST['periodoInicio']) : null;
$materia = !empty($_POST['materia']) ? mysqli_real_escape_string($conexion, $_POST['materia']) : null;
$carrera = !empty($_POST['carrera']) ? mysqli_real_escape_string($conexion, $_POST['carrera']) : null;
$nivel = !empty($_POST['nivel']) ? mysqli_real_escape_string($conexion, $_POST['nivel']) : null;
$aula = !empty($_POST['aula']) ? mysqli_real_escape_string($conexion, $_POST['aula']) : null;
$observacionID = !empty($_POST['observacionID']) ? intval($_POST['observacionID']) : null;

// Validar Aula
$aulaID = null;
if ($aula) {
    $aulaQuery = "SELECT AulaID FROM Aulas WHERE Nombre = '$aula'";
    $aulaResult = $conexion->query($aulaQuery);

    if ($aulaResult->num_rows > 0) {
        $aulaRow = $aulaResult->fetch_assoc();
        $aulaID = $aulaRow['AulaID'];
    } else {
        die("El aula especificada no existe.");
    }
}

// Validar Carrera
$carreraID = null;
if ($carrera) {
    $carreraQuery = "SELECT CarreraID FROM Carreras WHERE Nombre = '$carrera'";
    $carreraResult = $conexion->query($carreraQuery);

    if ($carreraResult->num_rows > 0) {
        $carreraRow = $carreraResult->fetch_assoc();
        $carreraID = $carreraRow['CarreraID'];
    } else {
        die("La carrera especificada no existe.");
    }
}

// Validar Materia
$materiaID = null;
if ($materia) {
    $materiaQuery = "SELECT MateriaID FROM Materias WHERE Nombre = '$materia' AND CarreraID = '$carreraID' AND Nivel = '$nivel'";
    $materiaResult = $conexion->query($materiaQuery);

    if ($materiaResult->num_rows > 0) {
        $materiaRow = $materiaResult->fetch_assoc();
        $materiaID = $materiaRow['MateriaID'];
    } else {
        die("La materia especificada no existe.");
    }
}

// Construir consulta de actualización
$sql = "UPDATE Docentes d
        JOIN DocenteMateria dm ON d.DocenteID = dm.DocenteID
        JOIN Materias m ON dm.MateriaID = m.MateriaID
        JOIN Carreras c ON m.CarreraID = c.CarreraID
        LEFT JOIN Horarios h ON dm.HorarioID = h.HorarioID
        LEFT JOIN DocenteCarreraObservacion dco ON d.DocenteID = dco.DocenteID AND c.CarreraID = dco.CarreraID
        SET ";

$setClauses = [];
if ($nombre !== null) $setClauses[] = "d.Nombre = '$nombre'";
if ($apellido !== null) $setClauses[] = "d.Apellido = '$apellido'";
if ($periodoInicio !== null) $setClauses[] = "h.Periodo = '$periodoInicio'";
if ($materiaID !== null) $setClauses[] = "dm.MateriaID = '$materiaID'";
if ($aulaID !== null) $setClauses[] = "dm.AulaID = '$aulaID'";
if ($observacionID !== null) $setClauses[] = "dco.ObservacionID = '$observacionID'";

if (!empty($setClauses)) {
    $sql .= implode(', ', $setClauses);
    $sql .= " WHERE dm.DocenteMateriaID = $docenteMateriaID";

    if ($conexion->query($sql)) {
        // Registrar en logs
        $logSql = "INSERT INTO logs (UsuarioID, Accion, Detalles) 
                   VALUES ('$usuarioID', 
                           'Actualización del horario del docente', 
                           '" . json_encode($_POST) . "')";
        $conexion->query($logSql);

        echo "Datos actualizados correctamente.";
    } else {
        die("Error al actualizar los datos: " . $conexion->error);
    }
} else {
    echo "No se han proporcionado datos para actualizar.";
}

$conexion->close();
