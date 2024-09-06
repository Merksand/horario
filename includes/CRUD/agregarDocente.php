

<?php
// Conexión a la base de datos
include_once "../database.php";

// Verificar que se recibieron los datos
if (!empty($_POST['docenteID1'] && !empty($_POST['turno']) && !empty($_POST['dia']) && !empty($_POST['periodoInicio']) && !empty($_POST['periodoFin']) && !empty($_POST['carrera']) && !empty($_POST['nivel']) && !empty($_POST['materia']) && !empty($_POST['aula']) && !empty($_POST['observacion']))) {

    // Valores para la tabla DocenteMateria
    echo "docenteID1: ". $docenteID1 = $_POST['docenteID1'] . "\n";
    echo "turno: ". $turno = $_POST['turno'] . "\n";
    echo "dia: ". $dia = $_POST['dia'] . "\n";
    echo "periodoInicio: ". $periodoInicio = $_POST['periodoInicio'] . "\n";
    echo "periodoFin: ". $periodoFin = $_POST['periodoFin'] . "\n";
    echo "carrera: ". $carrera = $_POST['carrera'] . "\n";
    echo "nivel: ". $nivel = $_POST['nivel'] . "\n";
    echo "materia: ". $materia = $_POST['materia'] . "\n";
    echo "aula: ". $aula = $_POST['aula'] . "\n";
    echo "observacion: ". $observacion = $_POST['observacion'] . "\n";

}else{
    echo "Faltan datos perro ";
}

// Cerrar la conexión
$conexion->close();
