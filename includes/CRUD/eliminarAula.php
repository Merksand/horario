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

            $sql = "DELETE FROM Aulas WHERE AulaID = ?";
            $stmt = $conexion->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("i", $id);

                try {
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        echo json_encode(['status' => 'success', 'message' => 'Aula eliminada correctamente']);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'No se puede eliminar esta aula porque está vinculada a otras tablas']);
                    }
                } catch (Exception $ex) {
                    echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el aula: ' . $ex->getMessage()]);
                }

                $stmt->close();
            } else {
                throw new Exception("Error al preparar la consulta para eliminar el aula");
            }

            $conexion->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'ID de aula no proporcionado']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Error en el servidor: ' . $e->getMessage()]);
}
