<?php
include '../database.php';

$data = json_decode(file_get_contents('php://input'), true);
$turno = $data['turno'];
$dia = $data['dia'];

// $query = "SELECT HoraInicio, HoraFin,Periodo FROM Horarios WHERE Turno = ? AND Dia = ?";
$query = "SELECT HorarioID,DATE_FORMAT(HoraInicio, '%H:%i') AS HoraInicio,DATE_FORMAT(HoraFin, '%H:%i') AS HoraFin,Periodo FROM Horarios WHERE Turno = ? AND Dia = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param('ss', $turno, $dia);
$stmt->execute();
$result = $stmt->get_result();

$horarios = [];
while ($row = $result->fetch_assoc()) {
    $horarios[] = $row;
}

echo json_encode(['horarios' => $horarios]);




