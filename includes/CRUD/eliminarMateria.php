<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = json_decode(file_get_contents('php://input'), true);

        if (isset($input['id'])) {
            $id = $input['id'];

            include '../database.php';

            $sql = "DELETE FROM Materias WHERE MateriaID = ?";
            $stmt = $conexion->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                if ($stmt->affected_rows > 0) {
                    echo json_encode(['status' => 'success', 'message' => 'Materia eliminada correctamente']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'No se pudo eliminar la materia. Verifica si está asociada a otros registros.']);
                }
                $stmt->close();
            } else {
                throw new Exception("Error al preparar la consulta para eliminar la materia");
            }

            $conexion->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'ID de materia no proporcionado']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Error en el servidor: ' . $e->getMessage()]);
}
