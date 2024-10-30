<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

session_name('login');
session_start();

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = json_decode(file_get_contents('php://input'), true);

        if (isset($input['aulaID']) && isset($input['nombre'])) {
            $aulaID = $input['aulaID'];
            $nombre = $input['nombre'];

            include '../database.php';

            if (!isset($_SESSION['usuario_id'])) {
                echo json_encode(['status' => 'error', 'message' => 'Usuario no autenticado']);
                exit();
            }
            $usuarioID = $_SESSION['usuario_id'];

            $sqlNombre = "SELECT * FROM Aulas WHERE AulaID = $aulaID";
            $result = $conexion->query($sqlNombre);
            $aula = $result->fetch_assoc();
            $aulaNombre = $aula['Nombre'];

            $sql = "UPDATE Aulas SET Nombre = ? WHERE AulaID = ?";
            $stmt = $conexion->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("si", $nombre, $aulaID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    echo json_encode(['status' => 'success', 'message' => 'Aula actualizada correctamente']);

                    $accion = "Actualización del aula: $aulaNombre";
                    $detalles = "AulaID $aulaID actualizado a nombre '$nombre'";
                    $accionEscapada = mysqli_real_escape_string($conexion, $accion);
                    $detallesEscapados = mysqli_real_escape_string($conexion, $detalles);

                    $sqlLog = "INSERT INTO logs (UsuarioID, Accion, Detalles) VALUES ('$usuarioID', '$accionEscapada', '$detallesEscapados')";
                    $conexion->query($sqlLog);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'No se encontraron cambios']);
                }
                
                $stmt->close();
            } else {
                throw new Exception("Error al preparar la consulta para actualizar el aula");
            }

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
