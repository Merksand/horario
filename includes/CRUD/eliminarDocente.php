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

            include('../database.php');

            if (!isset($_SESSION['usuario_id'])) {
                echo json_encode(['status' => 'error', 'message' => 'Usuario no autenticado']);
                exit();
            }
            $usuarioID = $_SESSION['usuario_id'];



            $nombreDocenteQuery = "SELECT d.Nombre, d.Apellido FROM DocenteMateria dm
                 JOIN Docentes d ON dm.DocenteID = d.DocenteID
                 JOIN Materias m ON dm.MateriaID = m.MateriaID
                 JOIN Carreras c ON m.CarreraID = c.CarreraID
                 JOIN Aulas a ON dm.AulaID = a.AulaID
                 JOIN Horarios h ON dm.HorarioID = h.HorarioID
                 WHERE dm.DocenteMateriaID = $id";
            $result = $conexion->query($nombreDocenteQuery);
            $nombreDocente = $result->fetch_assoc();
            $nombreCompleto = $nombreDocente['Nombre'] . " " . $nombreDocente['Apellido'];



            $sql = "DELETE FROM DocenteMateria WHERE DocenteMateriaID = ?";
            $stmt = $conexion->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("i", $id);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $accion = "Eliminación de Registro en el módulo Configuración";
                    $detalles = "Registro de horario del Docente  $nombreCompleto eliminado";
                    $accionEscapada = mysqli_real_escape_string($conexion, $accion);
                    $detallesEscapados = mysqli_real_escape_string($conexion, $detalles);

                    $sqlLog = "INSERT INTO logs (UsuarioID, Accion, Detalles) VALUES ('$usuarioID', '$accionEscapada', '$detallesEscapados')";
                    $conexion->query($sqlLog);

                    echo json_encode(['status' => 'success', 'message' => 'Registro eliminado correctamente']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'No se puede eliminar este registro porque está vinculado a otras tablas']);
                }

                $stmt->close();
            } else {
                throw new Exception("Error al preparar la consulta para eliminar el horario");
            }

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
