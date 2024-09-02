<?php
include '../database.php';

if (isset($_GET['carrera']) && isset($_GET['nivel'])) {
    $carrera = $_GET['carrera'];
    $nivel = $_GET['nivel'];

    // $nivel2 = 300;

    // Consulta para obtener las materias relacionadas con la carrera y el nivel seleccionados
    $query = $conexion->prepare("
        SELECT m.Nombre, m.Nivel, m.SubNivel 
        FROM materias m
        JOIN carreras c ON m.CarreraID = c.CarreraID
        WHERE c.Nombre = ? AND m.Nivel = ?
    ");
    $query->bind_param("si", $carrera, $nivel); // "si" -> string and integer
    $query->execute();
    $result = $query->get_result();

    $materias = [];

    while ($row = $result->fetch_assoc()) {
        $materias[] = $row;
    }
    
    // Devolvemos las materias en formato JSON
    echo json_encode($materias);
}
