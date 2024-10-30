<?php

session_start(); // Asegúrate de iniciar la sesión aquí también

// Ahora puedes acceder a $_SESSION['usuario_id']
if (isset($_SESSION['usuario_id'])) {
    $usuarioID = $_SESSION['usuario_id'];
} else {
    echo "El ID de usuario no está definido.";
}

include 'includes/database.php';

$nombreDocente = "SELECT d.Nombre, d.Apellido FROM DocenteMateria dm
JOIN Docentes d ON dm.DocenteID = d.DocenteID
JOIN Materias m ON dm.MateriaID = m.MateriaID
JOIN Carreras c ON m.CarreraID = c.CarreraID
JOIN Aulas a ON dm.AulaID = a.AulaID
JOIN Horarios h ON dm.HorarioID = h.HorarioID
WHERE dm.DocenteMateriaID = 1";

$docenteResult = $conexion->query($nombreDocente);
$docenteRow = $docenteResult->fetch_assoc();
// $docenteID = $docenteRow['DocenteID'];
print_r($docenteRow);
$nombreDocente = $docenteRow['Nombre'] . " " . $docenteRow['Apellido'];


echo $nombreDocente;
echo $docenteID;

Nombre cambiado a 'Puta'. Código cambiado a 'PT100'. Nivel cambiado a '200'.