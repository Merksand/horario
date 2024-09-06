<?php
include '../database.php';

if (isset($_GET['carrera']) && isset($_GET['nivel'])) {
    $carrera = $_GET['carrera'];
    $nivel = $_GET['nivel'];

    // Consulta para obtener las materias relacionadas con la carrera y el nivel seleccionados
    $query = $conexion->prepare("
        SELECT m.MateriaID, m.Nombre, m.Nivel, m.Paralelo 
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

    if (empty($materias)) {
        // Si no hay materias, enviar un mensaje
        echo json_encode(['mensaje' => 'El nivel seleccionado no existe en la carrera.']);
    } else {
        // Devolvemos las materias en formato JSON
        echo json_encode($materias);
    }
}
