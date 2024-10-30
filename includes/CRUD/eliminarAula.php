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

        if (isset($input['id'])) {
            $id = $input['id'];

            include '../database.php';

            if (!isset($_SESSION['usuario_id'])) {
                echo json_encode(['status' => 'error', 'message' => 'Usuario no autenticado']);
                exit();
            }
            $usuarioID = $_SESSION['usuario_id'];

            $sqlNombre = "SELECT * FROM Aulas WHERE AulaID = $id";
            $result = $conexion->query($sqlNombre);
            $aula = $result->fetch_assoc();
            $aulaNombre = $aula['Nombre'];

            $sql = "DELETE FROM Aulas WHERE AulaID = ?";
            $stmt = $conexion->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("i", $id);

                try {
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        echo json_encode(['status' => 'success', 'message' => 'Aula eliminada correctamente']);

                        $accion = "Eliminación de aula";
                        $detalles = "AulaID $id con el nombre  de '$aulaNombre' eliminada";
                        $accionEscapada = mysqli_real_escape_string($conexion, $accion);
                        $detallesEscapados = mysqli_real_escape_string($conexion, $detalles);

                        $sqlLog = "INSERT INTO logs (UsuarioID, Accion, Detalles) VALUES ('$usuarioID', '$accionEscapada', '$detallesEscapados')";
                        $conexion->query($sqlLog);

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
