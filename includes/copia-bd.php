<?php
include 'database.php';


$backup_file = $dbname . "_" . date("Y-m-d_H-i-s") . ".sql";

$temp_file = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $backup_file;

$command = "mysqldump --user=$username --password=$password --host=$servername $dbname > $temp_file";

system($command);

if (file_exists($temp_file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($backup_file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($temp_file));

    readfile($temp_file);

    unlink($temp_file);

    exit;
} else {
    echo "Error al crear la copia de seguridad.";
}
?>