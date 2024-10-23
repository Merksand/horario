<?php
$servername = "localhost";
$username = "root";
$password = "Miguelangelomy1";
$dbname = "Instituto";
// $dbname = "InstitutoPrueba";

$conexion = new mysqli($servername, $username, $password, $dbname);



if  ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}
$conexion->set_charset("utf8mb4");