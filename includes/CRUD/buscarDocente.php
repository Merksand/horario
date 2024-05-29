<?php
// Mostrar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir la conexión a la base de datos
include('../database.php');

// Verificar si se proporcionaron los parámetros necesarios
if (isset($_GET['nombre']) || isset($_GET['apellido'])) {
    // Obtener los parámetros de búsqueda
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
    $apellido = isset($_GET['apellido']) ? $_GET['apellido'] : '';

    // Construir la consulta SQL
    $consulta = "SELECT
                    Docentes.DocenteID AS id,
                    Docentes.Nombre AS nombre,
                    Docentes.Apellido AS apellido,
                    Materias.Nombre AS materia,
                    Materias.Nivel AS nivel,
                    Aulas.Nombre AS aula
                FROM
                    DocenteMateria
                    INNER JOIN Docentes ON DocenteMateria.DocenteID = Docentes.DocenteID
                    INNER JOIN Materias ON DocenteMateria.MateriaID = Materias.MateriaID
                    INNER JOIN Aulas ON DocenteMateria.AulaID = Aulas.AulaID";

    // Agregar filtros a la consulta si se proporcionaron
    $filtros = [];
    if (!empty($nombre)) {
        $filtros[] = "Docentes.Nombre LIKE '%" . $conexion->real_escape_string($nombre) . "%'";
    }
    if (!empty($apellido)) {
        $filtros[] = "Docentes.Apellido LIKE '%" . $conexion->real_escape_string($apellido) . "%'";
    }

    if (!empty($filtros)) {
        $consulta .= ' WHERE ' . implode(' AND ', $filtros);
    }

    // Ejecutar la consulta
    $resultado = $conexion->query($consulta);

    if ($resultado) {
        // Verificar si se encontraron resultados
        if ($resultado->num_rows > 0) {
            $docentes = [];
            while ($fila = $resultado->fetch_assoc()) {
                $docentes[] = $fila;
            }
            // Devolver los resultados en formato JSON
            header('Content-Type: application/json');
            echo json_encode($docentes);
        } else {
            // No se encontraron resultados
            header('Content-Type: application/json');
            echo json_encode([]);
        }
    } else {
        // Error en la consulta
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Error en la consulta: ' . $conexion->error]);
    }
} else {
    // No se proporcionaron los parámetros necesarios
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Parámetros de búsqueda no proporcionados']);
}

// Cerrar conexión a la base de datos
$conexion->close();