<?php
include('database.php');

// Total de docentes
$resultDocentes = $conexion->query("SELECT COUNT(*) AS total_docentes FROM Docentes");
$totalDocentes = $resultDocentes->fetch_assoc()['total_docentes'];

// Total de materias
$resultMaterias = $conexion->query("SELECT COUNT(*) AS total_materias FROM Materias");
$totalMaterias = $resultMaterias->fetch_assoc()['total_materias'];

// Total de carreras
$resultCarreras = $conexion->query("SELECT COUNT(*) AS total_carreras FROM Carreras");
$totalCarreras = $resultCarreras->fetch_assoc()['total_carreras'];

// Total de aulas
$resultAulas = $conexion->query("SELECT COUNT(*) AS total_aulas FROM Aulas");
$totalAulas = $resultAulas->fetch_assoc()['total_aulas'];

// Total de horarios
$resultHorarios = $conexion->query("SELECT COUNT(*) AS total_horarios FROM Horarios");
$totalHorarios = $resultHorarios->fetch_assoc()['total_horarios'];

// Crear respuesta JSON
$response = array(
    'total_docentes' => $totalDocentes,
    'total_materias' => $totalMaterias,
    'total_carreras' => $totalCarreras,
    'total_aulas' => $totalAulas,
    'total_horarios' => $totalHorarios
);

header('Content-Type: application/json');
echo json_encode($response);
?>
