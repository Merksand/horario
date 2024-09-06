<?php
// Conexión a la base de datos
include_once "../database.php";

// Verificar que se recibieron los datos
if (!empty($_POST['docenteID1'] && !empty($_POST['turno']) && !empty($_POST['dia']) && !empty($_POST['periodoInicio']) && !empty($_POST['periodoFin']) && !empty($_POST['carrera']) && !empty($_POST['nivel']) && !empty($_POST['materia']) && !empty($_POST['aula']))) {

    // Valores para la tabla DocenteMateria
    echo $docenteID1 = $_POST['docenteID1'];
    echo $turno = $_POST['turno'];
    echo $dia = $_POST['dia'];
    echo $periodoInicio = $_POST['periodoInicio'];
    echo $periodoFin = $_POST['periodoFin'];
    echo $carrera = $_POST['carrera'];
    echo $nivel = $_POST['nivel'];
    echo $materia = $_POST['materia'];
    echo $aula = $_POST['aula'];

    // echo $aula = $_POST['docenteID2'];
    // echo $aula = $_POST['nombre2'];
    // echo $aula = $_POST['carreraID'];
    // echo $aula = $_POST['observacionID'];

    // Consulta para insertar en DocenteMateria
    $sqlDocenteMateria = "INSERT INTO DocenteMateria (docenteID, turno, dia, periodoInicio, periodoFin, carrera, nivel, materia, aula) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sqlDocenteMateria);
    $stmt->bind_param("issssssss", $docenteID1, $turno, $dia, $periodoInicio, $periodoFin, $carrera, $nivel, $materia, $aula);

    if ($stmt->execute()) {
        echo "Datos insertados correctamente en DocenteMateria";
    } else {
        echo "Error al insertar en DocenteMateria: " . $conexion->error;
    }

    // Valores para la tabla DocenteCarreraObservacion
    $docenteID2 = $_POST['docenteID2'];
    $carreraID = $_POST['carreraID'];

    // Consulta para insertar en DocenteCarreraObservacion
    $sqlDocenteCarreraObservacion = "INSERT INTO DocenteCarreraObservacion (docenteID, carreraID) 
                                     VALUES (?, ?)";
    $stmt2 = $conexion->prepare($sqlDocenteCarreraObservacion);
    $stmt2->bind_param("ii", $docenteID2, $carreraID);

    if ($stmt2->execute()) {
        echo "Datos insertados correctamente en DocenteCarreraObservacion";
    } else {
        echo "Error al insertar en DocenteCarreraObservacion: " . $conexion->error;
    }

    // Cerrar las declaraciones
    $stmt->close();
    $stmt2->close();
} else {
    echo "Faltan datos requeridos.";
}

// Cerrar la conexión
$conexion->close();










/* 
<?php
// Conexión a la base de datos
include_once "../database.php";

// Verificar que se recibieron los datos
if (!empty($_POST['docenteID1'] && !empty($_POST['turno']) && !empty($_POST['dia']) && !empty($_POST['periodoInicio']) && !empty($_POST['periodoFin']) && !empty($_POST['carrera']) && !empty($_POST['nivel']) && !empty($_POST['materia']) && !empty($_POST['aula']))) {

    // Valores para la tabla DocenteMateria
    echo $docenteID1 = $_POST['docenteID1'];
    echo $turno = $_POST['turno'];
    echo $dia = $_POST['dia'];
    echo $periodoInicio = $_POST['periodoInicio'];
    echo $periodoFin = $_POST['periodoFin'];
    echo $carrera = $_POST['carrera'];
    echo $nivel = $_POST['nivel'];
    echo $materia = $_POST['materia'];
    echo $aula = $_POST['aula'];



    // Consulta para insertar en DocenteMateria
    $sqlDocenteMateria = "INSERT INTO DocenteMateria (docenteID, turno, dia, periodoInicio, periodoFin, carrera, nivel, materia, aula) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sqlDocenteMateria);
    $stmt->bind_param("issssssss", $docenteID1, $turno, $dia, $periodoInicio, $periodoFin, $carrera, $nivel, $materia, $aula);

    if ($stmt->execute()) {
        echo "Datos insertados correctamente en DocenteMateria";
    } else {
        echo "Error al insertar en DocenteMateria: " . $conexion->error;
    }

    // Valores para la tabla DocenteCarreraObservacion
    $docenteID2 = $_POST['docenteID2'];
    $carreraID = $_POST['carreraID'];

    // Consulta para insertar en DocenteCarreraObservacion
    $sqlDocenteCarreraObservacion = "INSERT INTO DocenteCarreraObservacion (docenteID, carreraID) 
                                     VALUES (?, ?)";
    $stmt2 = $conexion->prepare($sqlDocenteCarreraObservacion);
    $stmt2->bind_param("ii", $docenteID2, $carreraID);

    if ($stmt2->execute()) {
        echo "Datos insertados correctamente en DocenteCarreraObservacion";
    } else {
        echo "Error al insertar en DocenteCarreraObservacion: " . $conexion->error;
    }

    // Cerrar las declaraciones
    $stmt->close();
    $stmt2->close();
} else if (!empty($_POST['docenteID2'] && !empty($_POST['carreraID']) && !empty($_POST['observacionID']))) {
    echo $docente = $_POST['docenteID2'];
    echo $carrera = $_POST['carreraID'];
    echo $observacion = $_POST['observacionID'];

    // Consulta para insertar en DocenteCarreraObservacion
    $consultaCarreraID = "SELECT carreraID FROM Carrera WHERE nombre = '$carrera'";
    $consultaObservacion = "SELECT observacionID FROM Observacion WHERE descripcion = '$observacion'";

    $resCarreraID = $conexion->query($consultaCarreraID);
    $resObservacion = $conexion->query($consultaObservacion);

    $sqlDocenteCarreraObservacion = "INSERT INTO DocenteCarreraObservacion (docenteID, carreraID, observacionID) 
                                     VALUES (?, ?, ?)";
    $stmt2 = $conexion->prepare($sqlDocenteCarreraObservacion);
    $stmt2->bind_param("iii", $docente, $resCarreraID, $resObservacion);
    if ($stmt2->execute()) {
        echo "Datos insertados correctamente en DocenteCarreraObservacion";
    } else {
        echo "Error al insertar en DocenteCarreraObservacion: " . $conexion->error;
    }

} else {
    echo "Faltan datos requeridos.";
}

// Cerrar la conexión
$conexion->close();





*/