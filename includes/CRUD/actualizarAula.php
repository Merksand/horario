<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = json_decode(file_get_contents('php://input'), true);

        if (isset($input['aulaID']) && isset($input['nombre'])) {
            $aulaID = $input['aulaID'];
            $nombre = $input['nombre'];

            include '../database.php';

            $sql = "UPDATE Aulas SET Nombre = ? WHERE AulaID = ?";
            $stmt = $conexion->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("si", $nombre, $aulaID);
                $stmt->execute();
                
                if ($stmt->affected_rows > 0) {
                    echo json_encode(['status' => 'success', 'message' => 'Aula actualizada correctamente']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'No se encontraron cambios']);
                }
                
                $stmt->close();
            } else {
                throw new Exception("Error al preparar la consulta para actualizar el aula");
            }

            // Cierra la conexión
            $conexion->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Datos incompletos']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
    }
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Error en el servidor: ' . $e->getMessage()]);
}
