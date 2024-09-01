<?php

include "../database.php";

// Sanitizar y validar datos
function sanitizar($dato)
{
    return htmlspecialchars(trim($dato));
}
if (!empty($_POST['nombre_docente']) || !empty($_POST['apellido_docente']) || !empty($_POST['nombre_aula']) || !empty($_POST['nombre_materia']) || !empty($_POST['codigo_materia'])) {
    $errores = [];

    // Validar y agregar Aula
    if (isset($_POST['nombre_aula'])) {
        $nombre_aula = sanitizar($_POST['nombre_aula']);

        if (!empty($nombre_aula)) {
            // Verificar si el aula ya existe
            $stmt = $conexion->prepare("SELECT AulaID FROM Aulas WHERE Nombre = ?");
            $stmt->bind_param('s', $nombre_aula);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $errores['aula'] = "El aula ya existe.";
            } else {
                // Agregar el aula si no existe
                $stmt = $conexion->prepare("INSERT INTO Aulas (Nombre) VALUES (?)");
                $stmt->bind_param('s', $nombre_aula);

                if ($stmt->execute()) {
                    echo "Aula agregada con éxito";
                } else {
                    $errores['aula'] = "Error al agregar aula: " . $stmt->error;
                }
            }
            $stmt->close();
        }
    }

    // Validar y agregar Docente
    if (isset($_POST['nombre_docente']) && isset($_POST['apellido_docente'])) {
        $nombre_docente = sanitizar($_POST['nombre_docente']);
        $apellido_docente = sanitizar($_POST['apellido_docente']);

        if (!empty($nombre_docente) && !empty($apellido_docente)) {
            // Verificar si el docente ya existe
            $stmt = $conexion->prepare("SELECT DocenteID FROM Docentes WHERE Nombre = ? AND Apellido = ?");
            $stmt->bind_param('ss', $nombre_docente, $apellido_docente);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $errores['docente'] = "El docente ya existe.";
            } else {
                // Agregar el docente si no existe
                $stmt = $conexion->prepare("INSERT INTO Docentes (Nombre, Apellido) VALUES (?, ?)");
                $stmt->bind_param('ss', $nombre_docente, $apellido_docente);

                if ($stmt->execute()) {
                    echo "Docente agregado con éxito";
                } else {
                    $errores['docente'] = "Error al agregar docente: " . $stmt->error;
                }
            }
            $stmt->close();
        }
    }
    // Función para obtener CarreraID basado en el nombre de la carrera
    function obtenerCarreraID($conexion, $carrera_nombre)
    {
        $carrera_id = null;
        $stmt = $conexion->prepare("SELECT CarreraID FROM Carreras WHERE Nombre = ?");
        if ($stmt === false) {
            die('Error en la consulta: ' . $conexion->error);
        }
        $stmt->bind_param('s', $carrera_nombre);
        $stmt->execute();
        $stmt->bind_result($carrera_id);
        $stmt->fetch();
        $stmt->close();
        // use of unassigned variable $carrera_id
        return $carrera_id ? $carrera_id : false;
    }

    // Validar y agregar Materia
    if (isset($_POST['nombre_materia']) && isset($_POST['codigo_materia']) && isset($_POST['nivel_materia']) && isset($_POST['carrera_materia']) && !empty ($_POST['nombre_materia']) || !empty($_POST['codigo_materia']) || !empty($_POST['nivel_materia'])) {
        $nombre_materia = sanitizar($_POST['nombre_materia']);
        $codigo_materia = sanitizar($_POST['codigo_materia']);
        $nivel_materia = sanitizar($_POST['nivel_materia']);
        $carrera_materia = sanitizar($_POST['carrera_materia']);

        if (!empty($nombre_materia) && !empty($codigo_materia) && !empty($nivel_materia) && !empty($carrera_materia)) {
            // Verificar si la materia ya existe
            $stmt = $conexion->prepare("SELECT MateriaID FROM Materias WHERE Nombre = ? AND Codigo = ?");
            $stmt->bind_param('ss', $nombre_materia, $codigo_materia);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                echo "ya existe";
            } else {
                // Obtener el CarreraID
                $carrera_id = obtenerCarreraID($conexion, $carrera_materia);
                if ($carrera_id) {
                    // Agregar la materia si no existe
                    $stmt = $conexion->prepare("INSERT INTO Materias (Nombre, Codigo, Nivel, CarreraID) VALUES (?, ?, ?, ?)");
                    $stmt->bind_param('ssii', $nombre_materia, $codigo_materia, $nivel_materia, $carrera_id);

                    if ($stmt->execute()) {
                        echo "Materia agregada con éxito";
                    } else {
                        echo "Error al agregar materia: " . $stmt->error;
                    }
                } else {
                    echo "Error: Carrera no encontrada";
                }
            }
            $stmt->close();
        } else {
            echo "Faltan datos por rellenar";
        }
    } 


    // Manejo de errores
}else {
    echo "Faltan datos por rellenaraaa";
}
if (!empty($errores)) {
    foreach ($errores as $error) {
        echo $error . "<br>";
    }
}
$conexion->close();
