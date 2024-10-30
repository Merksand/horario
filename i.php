<?php
include "../database.php";

function sanitizar($dato) {
    return htmlspecialchars(trim($dato));
}

function agregarError(&$errores, $clave, $mensaje) {
    $errores[$clave] = $mensaje;
}

// Variables de errores
$errores = [];

// Verificar y sanitizar datos
$nombre_aula = isset($_POST['nombre_aula']) ? sanitizar($_POST['nombre_aula']) : null;
$nombre_docente = isset($_POST['nombre_docente']) ? sanitizar($_POST['nombre_docente']) : null;
$apellido_docente = isset($_POST['apellido_docente']) ? sanitizar($_POST['apellido_docente']) : null;
$nombre_materia = isset($_POST['nombre_materia']) ? sanitizar($_POST['nombre_materia']) : null;
$codigo_materia = isset($_POST['codigo_materia']) ? sanitizar($_POST['codigo_materia']) : null;
$nivel_materia = isset($_POST['nivel_materia']) ? sanitizar($_POST['nivel_materia']) : null;
$carrera_materia = isset($_POST['carrera_materia']) ? sanitizar($_POST['carrera_materia']) : null;
$paralelo_materia = isset($_POST['paralelo_materia']) ? sanitizar($_POST['paralelo_materia']) : null;
$gestion = isset($_POST["gestion"]) ? sanitizar($_POST["gestion"]) : null;
$semestre = isset($_POST["semestre"]) ? sanitizar($_POST["semestre"]) : null;
$fecha_inicio = isset($_POST["fecha_inicio"]) ? sanitizar($_POST["fecha_inicio"]) : null;
$fecha_fin = isset($_POST["fecha_fin"]) ? sanitizar($_POST["fecha_fin"]) : null;

// Verificar si el aula existe y agregar si no existe
if (!empty($nombre_aula)) {
    $query = "SELECT AulaID FROM Aulas WHERE Nombre = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param('s', $nombre_aula);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        agregarError($errores, 'aula', 'El aula ya existe.');
    } else {
        $query = "INSERT INTO Aulas (Nombre) VALUES (?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param('s', $nombre_aula);
        $stmt->execute() ? $errores[] = 'Aula agregada con éxito' : agregarError($errores, 'aula', "Error al agregar aula: {$stmt->error}");
    }
    $stmt->close();
}

// Verificar y agregar docente
if (!empty($nombre_docente) && !empty($apellido_docente)) {
    $query = "SELECT DocenteID FROM Docentes WHERE Nombre = ? AND Apellido = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param('ss', $nombre_docente, $apellido_docente);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        agregarError($errores, 'docente', 'El docente ya existe.');
    } else {
        $query = "INSERT INTO Docentes (Nombre, Apellido) VALUES (?, ?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param('ss', $nombre_docente, $apellido_docente);
        $stmt->execute() ? $errores[] = 'Docente agregado con éxito' : agregarError($errores, 'docente', "Error al agregar docente: {$stmt->error}");
    }
    $stmt->close();
}

// Obtener carrera ID
function obtenerCarreraID($conexion, $carrera_nombre) {
    $stmt = $conexion->prepare("SELECT CarreraID FROM Carreras WHERE Nombre = ?");
    $stmt->bind_param('s', $carrera_nombre);
    $stmt->execute();
    $stmt->bind_result($carrera_id);
    $stmt->fetch();
    $stmt->close();
    return $carrera_id ?: false;
}

// Verificar y agregar materia
if (!empty($nombre_materia) && !empty($codigo_materia) && !empty($nivel_materia) && !empty($carrera_materia)) {
    $query = "SELECT MateriaID FROM Materias WHERE Nombre = ? AND Codigo = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param('ss', $nombre_materia, $codigo_materia);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        agregarError($errores, 'materia', 'La materia ya existe.');
    } else {
        $carrera_id = obtenerCarreraID($conexion, $carrera_materia);
        if ($carrera_id) {
            $query = "INSERT INTO Materias (Nombre, Codigo, Nivel, CarreraID, Paralelo) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param('ssiis', $nombre_materia, $codigo_materia, $nivel_materia, $carrera_id, $paralelo_materia);
            $stmt->execute() ? $errores[] = 'Materia agregada con éxito' : agregarError($errores, 'materia', "Error al agregar materia: {$stmt->error}");
        } else {
            agregarError($errores, 'carrera', 'Error: Carrera no encontrada');
        }
    }
    $stmt->close();
}

// Verificar y agregar gestión y semestre
if (!empty($gestion) && !empty($semestre) && !empty($fecha_inicio) && !empty($fecha_fin)) {
    $year_gestion = (int)$gestion;
    $year_inicio = (int)date('Y', strtotime($fecha_inicio));
    $year_fin = (int)date('Y', strtotime($fecha_fin));

    if ($year_gestion === $year_inicio && $year_gestion === $year_fin) {
        $query = "INSERT INTO GestionSemestre (Gestion, Semestre, FechaInicio, FechaFin) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param('ssss', $gestion, $semestre, $fecha_inicio, $fecha_fin);
        $stmt->execute() ? $errores[] = 'Gestión agregada correctamente' : agregarError($errores, 'gestion', "Error al agregar Gestión: {$stmt->error}");
    } else {
        agregarError($errores, 'gestion_fecha', 'El año de gestión debe coincidir con las fechas de inicio y fin.');
    }
    $stmt->close();
}

// Enviar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode(['status' => empty($errores) ? 'success' : 'error', 'messages' => $errores]);

$conexion->close();
