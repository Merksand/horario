<?php
// exportar_bd.php

// Configuración de la base de datos
$host = "localhost"; 
$username = "root"; 
$password = "Miguelangelomy1"; 
$database_name = "Instituto2";


// Nombre del archivo de respaldo
$backup_file = $database_name . "_" . date("Y-m-d_H-i-s") . ".sql";

// Ruta completa para almacenar temporalmente el archivo
$temp_file = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $backup_file;

// Comando mysqldump para exportar la base de datos
$command = "mysqldump --user=$username --password=$password --host=$host $database_name > $temp_file";

// Ejecuta el comando
system($command);

// Verifica si se creó el archivo de respaldo
if (file_exists($temp_file)) {
    // Establece las cabeceras para forzar la descarga
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($backup_file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($temp_file));

    // Lee el archivo y envíalo al usuario
    readfile($temp_file);

    // Elimina el archivo temporal
    unlink($temp_file);

    exit;
} else {
    echo "Error al crear la copia de seguridad.";
}
