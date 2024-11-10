<?php
include '../database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    // $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT); 
    $clave = $_POST["clave"]; 
    $rol = $_POST['rol'];
    $carreras = isset($_POST['carreraID']) ? $_POST['carreraID'] : [];

    $query = "INSERT INTO Usuarios (Nombre, Apellido, Usuario, Clave, RolID) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param('ssssi', $nombre, $apellido, $usuario, $clave, $rol);
    $stmt->execute();

    $usuarioID = $stmt->insert_id;

    if (!empty($carreras)) {
        $queryCarrera = "INSERT INTO jefecarrera (JefeCarreraID, CarreraID) VALUES (?, ?)";
        $stmtCarrera = $conexion->prepare($queryCarrera);
        
        foreach ($carreras as $carreraID) {
            $stmtCarrera->bind_param('ii', $usuarioID, $carreraID);
            $stmtCarrera->execute();
        }
        
        $stmtCarrera->close();
    }

    $stmt->close();
    $conexion->close();

    echo "Usuario agregado exitosamente" ;
}
