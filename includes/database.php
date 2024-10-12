<?php
$servername = "sql110.infinityfree.com";
$username = "if0_37126865";
$password = "zTDoAVVMfrTdh";
$dbname = "if0_37126865_instituto";
// $dbname = "InstitutoPrueba";

$conexion = new mysqli($servername, $username, $password, $dbname);




if  ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}
$conexion->set_charset("utf8mb4");