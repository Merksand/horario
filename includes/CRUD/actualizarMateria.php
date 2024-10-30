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

$data = json_decode(file_get_contents('php://input'), true);

if ($data === null) {
    echo json_encode(['status' => 'error', 'message' => 'No se han recibido datos. Verifique la solicitud JSON.']);
    exit();
}

$materiaID = isset($data['materiaID']) ? intval($data['materiaID']) : null;
$nombre = !empty($data['nombre']) ? mysqli_real_escape_string($conexion, $data['nombre']) : null;
$codigo = isset($data['codigo']) && $data['codigo'] !== '' ? mysqli_real_escape_string($conexion, $data['codigo']) : null;
$nivel = isset($data['nivel']) && $data['nivel'] !== '' ? mysqli_real_escape_string($conexion, $data['nivel']) : null;

if ($materiaID === null) {
    echo json_encode(['status' => 'error', 'message' => 'No se ha proporcionado MateriaID.']);
    exit();
}

$sql = "UPDATE Materias SET ";
$setClauses = [];
$detalles = "";

if ($nombre !== null) {
    $setClauses[] = "Nombre = '$nombre'";
    $detalles .= "Nombre cambiado a '$nombre'. ";
}
if ($codigo !== null) {
    $setClauses[] = "Codigo = '$codigo'";
    $detalles .= "Código cambiado a '$codigo'. ";
}
if ($nivel !== null) {
    $setClauses[] = "Nivel = '$nivel'";
    $detalles .= "Nivel cambiado a '$nivel'. ";
}

if (count($setClauses) > 0) {
    $sql .= implode(', ', $setClauses);
    $sql .= " WHERE MateriaID = $materiaID";

    $sqlNombre = "SELECT Nombre FROM Materias WHERE MateriaID = $materiaID";
    $result = $conexion->query($sqlNombre);
    $materia = $result->fetch_assoc();
    $nombreMateria = $materia['Nombre'];

    if ($conexion->query($sql)) {
        $logMessage = mysqli_real_escape_string($conexion, "Materia que se actualizó: $nombreMateria");
        $detallesLog = mysqli_real_escape_string($conexion, $detalles);

        // Registro en la tabla logs
        $sqlLog = "INSERT INTO logs (UsuarioID, Accion, Detalles) VALUES ($usuarioID, '$logMessage', '$detallesLog')";
        $conexion->query($sqlLog);

        echo json_encode(['status' => 'success', 'message' => 'Materia actualizada correctamente.', 'consulta' => $sqlLog]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al actualizar la materia: ' . $conexion->error]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No se han proporcionado datos para actualizar.']);
}

$conexion->close();
