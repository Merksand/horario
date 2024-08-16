<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../database.php';
if (isset($_GET['nombre']) || isset($_GET['apellido'])) {
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
    $apellido = isset($_GET['apellido']) ? $_GET['apellido'] : '';
    $consulta = "SELECT
                    DocenteMateria.DocenteMateriaID as DocenteMateriaID,    
                    Docentes.DocenteID AS id,
                    Docentes.Nombre AS nombre,
                    Docentes.Apellido AS apellido,
                    Materias.Nombre AS materia,
                    Materias.Nivel AS nivel,
                    Aulas.Nombre AS aula,
                    Carreras.Nombre AS nombreCarrera,
                    DATE_FORMAT(HoraInicio, '%H:%i') AS horaInicio,
                    DATE_FORMAT(HoraFin, '%H:%i') AS horaFin,
                    Horarios.Dia AS dia
                FROM
                    DocenteMateria
                    INNER JOIN Docentes ON DocenteMateria.DocenteID = Docentes.DocenteID
                    INNER JOIN Materias ON DocenteMateria.MateriaID = Materias.MateriaID
                    INNER JOIN Carreras ON Materias.CarreraID = Carreras.CarreraID
                    INNER JOIN Aulas ON DocenteMateria.AulaID = Aulas.AulaID
                    INNER JOIN Horarios ON Horarios.HorarioID = docenteMateria.HorarioID";

    $filtros = [];
    if (!empty($nombre)) {
        $filtros[] = "Docentes.Nombre LIKE '%" . $conexion->real_escape_string($nombre) . "%' ORDER BY Horarios.HorarioID";
    }
    if (!empty($apellido)) {
        $filtros[] = "Docentes.Apellido LIKE '%" . $conexion->real_escape_string($apellido) . "%'";
    }

    if (!empty($filtros)) {
        $consulta .= ' WHERE ' . implode(' AND ', $filtros);
    }
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        if ($resultado->num_rows > 0) {
            $docentes = [];
            while ($fila = $resultado->fetch_assoc()) {
                $docentes[] = $fila;
            }
            header('Content-Type: application/json');
            echo json_encode($docentes);
        } else {
            header('Content-Type: application/json');
            echo json_encode([]);
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Error en la consulta: ' . $conexion->error]);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Parámetros de búsqueda no proporcionados']);
}
$conexion->close();