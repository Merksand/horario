<?php
require('../../pages/assets/fpdf/fpdf.php');

// Verificar que los datos están presentes en $_GET
if (!isset($_GET['docenteID1']) || !isset($_GET['gestion']) || !isset($_GET['semestre'])) {
    die('Faltan datos requeridos.');
    
}
include '../database.php';

$docenteID = $_GET['docenteID1'];
$gestion = $_GET['gestion'];
$semestre = $_GET['semestre'];
$carreraID = isset($_GET['carreraID']) ? $_GET['carreraID'] : null;

// Obtener el ID de GestionSemestre
$queryGestionSemestreID = "SELECT GestionSemestreID FROM GestionSemestre WHERE Gestion = ? AND Semestre = ?";
$stmt = $conexion->prepare($queryGestionSemestreID);

if ($stmt === false) {
    die('Error al preparar la consulta: ' . $conexion->error);
}

$stmt->bind_param("ss", $gestion, $semestre);
$stmt->execute();
$stmt->bind_result($gestionSemestreID);
$stmt->fetch();
$stmt->close();

if (!$gestionSemestreID) {
    die('No se encontró el ID de Gestión/Semestre.');
}

// Crear el objeto FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

if ($carreraID) {
    // Reporte por Docente, Gestión, Semestre y Carrera
    $pdf->Cell(0, 10, 'Horario del Docente por Carrera', 0, 1, 'C');

    // Consultar el horario del docente en la carrera
    $queryHorario = "SELECT C.Nombre AS Curso, M.Nombre AS Materia, CONCAT('Hora: ', A.HoraInicio, ' - ', A.HoraFin) AS Horario
    FROM Clases AS C
    JOIN Materias AS M ON C.MateriaID = M.MateriaID
    JOIN Asistencias AS A ON C.ClaseID = A.ClaseID
    JOIN Paralelos AS P ON C.ParaleloID = P.ParaleloID
    WHERE A.DocenteID = ? AND A.GestionSemestreID = ? AND P.CarreraID = ?";
    $stmt = $conexion->prepare($queryHorario);

    if ($stmt === false) {
        die('Error al preparar la consulta: ' . $conexion->error);
    }

    $stmt->bind_param("iii", $docenteID, $gestionSemestreID, $carreraID);
} else {
    // Reporte por Docente y Gestión/Semestre
    $pdf->Cell(0, 10, 'Horario del Docente', 0, 1, 'C');

    // Consultar el horario del docente
    $queryHorario = "SELECT C.Nombre AS Curso, M.Nombre AS Materia, CONCAT('Hora: ', A.HoraInicio, ' - ', A.HoraFin) AS Horario 
    FROM Clases AS C 
    JOIN Materias AS M ON C.MateriaID = M.MateriaID
    JOIN Asistencias AS A ON C.ClaseID = A.ClaseID
    WHERE A.DocenteID = ? AND A.GestionSemestreID = ?";
    $stmt = $conexion->prepare($queryHorario);

    if ($stmt === false) {
        die('Error al preparar la consulta: ' . $conexion->error);
    }

    $stmt->bind_param("ii", $docenteID, $gestionSemestreID);
}

$stmt->execute();
$result = $stmt->get_result();

// Imprimir los datos en el PDF
$pdf->SetFont('Arial', '', 12);
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(0, 10, 'Curso: ' . $row['Curso'] . ' | Materia: ' . $row['Materia'] . ' | ' . $row['Horario'], 0, 1);
}

$stmt->close();
$conexion->close();

$pdf->Output();
?>
