<?php
include '../database.php';

// Asegúrate de que la conexión esté establecida
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$data = json_decode(file_get_contents('php://input'), true);

$materiaID = isset($data['materiaID']) ? intval($data['materiaID']) : null;
$nombre = !empty($data['nombre']) ? mysqli_real_escape_string($conexion, $data['nombre']) : null;
$codigo = isset($data['codigo']) && $data['codigo'] !== '' ? mysqli_real_escape_string($conexion, $data['codigo']) : null;
$nivel = !empty($data['nivel']) ? mysqli_real_escape_string($conexion, $data['nivel']) : null;

// Construir la consulta SQL
$sql = "UPDATE Materias SET ";
$setClauses = [];

if ($nombre !== null) $setClauses[] = "Nombre = '$nombre'";
if ($codigo !== null) $setClauses[] = "Codigo = '$codigo'";
if ($nivel !== null) $setClauses[] = "nivel = '$nivel'";

// Verificar si hay cláusulas SET para evitar una consulta inválida
if (count($setClauses) > 0) {
    $sql .= implode(', ', $setClauses);
    $sql .= " WHERE MateriaID = $materiaID";
    
    // Ejecutar la consulta
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo json_encode(['status' => 'success', 'message' => 'Materia actualizada correctamente.', 'consulta' => $sql]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al actualizar la materia: ' . $conexion->error]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No se han proporcionado datos para actualizar.'. $sql]);
}

// Cerrar la conexión
$conexion->close();
