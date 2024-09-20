<?php
include '../database.php';

// Asegúrate de que la conexión esté establecida
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$data = json_decode(file_get_contents('php://input'), true);

// Verificar si $data es null o no se ha enviado correctamente
if ($data === null) {
    echo json_encode(['status' => 'error', 'message' => 'No se han recibido datos. Verifique la solicitud JSON.']);
    exit();
}

$materiaID = isset($data['materiaID']) ? intval($data['materiaID']) : null;
$nombre = !empty($data['nombre']) ? mysqli_real_escape_string($conexion, $data['nombre']) : null;
$codigo = isset($data['codigo']) && $data['codigo'] !== '' ? mysqli_real_escape_string($conexion, $data['codigo']) : null;
$nivel = isset($data['nivel']) && $data['nivel'] !== '' ? mysqli_real_escape_string($conexion, $data['nivel']) : null;

// Verificar que el MateriaID esté presente
if ($materiaID === null) {
    echo json_encode(['status' => 'error', 'message' => 'No se ha proporcionado MateriaID.']);
    exit();
}

// Construir la consulta SQL
$sql = "UPDATE Materias SET ";
$setClauses = [];

if ($nombre !== null) $setClauses[] = "Nombre = '$nombre'";
if ($codigo !== null) $setClauses[] = "Codigo = '$codigo'";
// Si 'nivel' se puede actualizar incluso si está vacío, pero no es NULL
if ($nivel !== null) $setClauses[] = "Nivel = '$nivel'";

// Verificar si hay cláusulas SET para evitar una consulta inválida
if (count($setClauses) > 0) {
    $sql .= implode(', ', $setClauses);
    $sql .= " WHERE MateriaID = $materiaID";

    // Ejecutar la consulta
    if ($conexion->query($sql)) {
        echo json_encode(['status' => 'success', 'message' => 'Materia actualizada correctamente.', 'consulta' => $sql]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al actualizar la materia: ' . $conexion->error]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No se han proporcionado datos para actualizar.']);
}

// Cerrar la conexión
$conexion->close();
?>
