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

            // Incluye la base de datos con la ruta correcta
            include('../database.php');

            // Elimina el registro en DocenteMateria
            $sql = "DELETE FROM DocenteMateria WHERE DocenteMateriaID = ?";
            $stmt = $conexion->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->close();

                echo json_encode(['status' => 'success', 'message' => 'Registro eliminado correctamente']);
            } else {
                throw new Exception("Error al preparar la consulta para eliminar el horario");
            }

            // Cierra la conexión
            $conexion->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'ID de horario no proporcionado']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Error en el servidor: ' . $e->getMessage()]);
}
