<?php
// Conexión a la base de datos
include '../includes/database.php';

// Verifica si se ha enviado el parámetro de la carrera seleccionada
if(isset($_GET['filtrar-carrera'])) {
    $carrera = $_GET['carrera'];

    echo '<div class="alert alert-danger">LOS CAMPOS ESTAN VACIOS</div>';
} else{
    // echo '<div class="alert alert-danger">asdgasdg</div>';
}
// else {
//     // Si no se ha enviado el parámetro de la carrera seleccionada
//     echo json_encode(array('error' => 'No se ha especificado la carrera.'));
// }  
// Cerrar la conexión a la base de datos
// $conn->close();
?>

