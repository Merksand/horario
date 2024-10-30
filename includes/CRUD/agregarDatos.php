<?php
session_name('login');
session_start();
$usuarioID = $_SESSION['usuario_id'] ?? null;
include "../database.php";

function registrarLog($conexion, $usuarioID, $accion, $detalles)
{
    $accionEscapada = $conexion->real_escape_string($accion);
    $detallesEscapados = $conexion->real_escape_string($detalles);
    $sqlLog = "INSERT INTO logs (UsuarioID, Accion, Detalles) VALUES ('$usuarioID', '$accionEscapada', '$detallesEscapados')";
    return $conexion->query($sqlLog);
}

function sanitizar($dato)
{
    return htmlspecialchars(trim($dato));
}
if (!empty($_POST['nombre_docente']) || !empty($_POST['apellido_docente']) || !empty($_POST['nombre_aula']) || !empty($_POST['nombre_materia']) || !empty($_POST['codigo_materia']) || !empty($_POST["fecha_inicio"]) || !empty($_POST["gestion"])) {
    $errores = [];

    if (isset($_POST['nombre_aula'])) {
        $nombre_aula = sanitizar($_POST['nombre_aula']);

        if (!empty($nombre_aula)) {
            $stmt = $conexion->prepare("SELECT AulaID FROM Aulas WHERE Nombre = ?");
            $stmt->bind_param('s', $nombre_aula);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $errores['aula'] = "El aula ya existe.";
            } else {
                $stmt = $conexion->prepare("INSERT INTO Aulas (Nombre) VALUES (?)");
                $stmt->bind_param('s', $nombre_aula);

                if ($stmt->execute()) {
                    echo "Aula agregada con éxito";
                    registrarLog($conexion, $usuarioID, "Inserción de un dato nuevo", "Se agregó el aula con nombre: $nombre_aula");
                } else {
                    $errores['aula'] = "Error al agregar aula: " . $stmt->error;
                }
            }
            $stmt->close();
        }
    }

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
                    registrarLog($conexion, $usuarioID, "Inserción de un dato nuevo", "Se agregó el docente con nombre: $nombre_docente $apellido_docente");
                } else {
                    $errores['docente'] = "Error al agregar docente: " . $stmt->error;
                }
            }
            $stmt->close();
        } else if (!empty($nombre_docente) || !empty($apellido_docente)) {
            echo "Falta rellenar la siguiente casilla";
        }
    }
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
        return $carrera_id ? $carrera_id : false;
    }

    if (isset($_POST['nombre_materia']) && isset($_POST['codigo_materia']) && isset($_POST['nivel_materia']) && isset($_POST['carrera_materia']) && !empty($_POST['nombre_materia']) || !empty($_POST['codigo_materia']) || !empty($_POST['nivel_materia'])) {
        $nombre_materia = sanitizar($_POST['nombre_materia']);
        $codigo_materia = sanitizar($_POST['codigo_materia']);
        $nivel_materia = sanitizar($_POST['nivel_materia']);
        $carrera_materia = sanitizar($_POST['carrera_materia']);
        $paralelo_materia = sanitizar($_POST['paralelo_materia']) ?? NUll;

        if (!empty($nombre_materia) && !empty($codigo_materia) && !empty($nivel_materia) && !empty($carrera_materia)) {
            // Verificar si la materia ya existe
            $stmt = $conexion->prepare("SELECT MateriaID FROM Materias WHERE Nombre = ? AND Codigo = ?");
            $stmt->bind_param('ss', $nombre_materia, $codigo_materia);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                echo "ya existe";
            } else {
                $carrera_id = obtenerCarreraID($conexion, $carrera_materia);
                if ($carrera_id) {
                    // Agregar la materia si no existe
                    $stmt = $conexion->prepare("INSERT INTO Materias (Nombre, Codigo, Nivel, CarreraID, Paralelo) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param('ssiis', $nombre_materia, $codigo_materia, $nivel_materia, $carrera_id, $paralelo_materia);

                    if ($stmt->execute()) {
                        echo "Materia agregada con éxito";
                        registrarLog($conexion, $usuarioID, "Inserción de un dato nuevo", "Se agregó la materia: $nombre_materia con código: $codigo_materia");
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

    if (isset($_POST["gestion"]) && isset($_POST["semestre"])) {
        if (!empty($_POST["gestion"]) && !empty($_POST["semestre"]) && !empty($_POST["fecha_inicio"]) && !empty($_POST["fecha_fin"])) {
            $gestion = sanitizar($_POST["gestion"]);
            $semestre = sanitizar($_POST["semestre"]);
            $fecha_inicio = sanitizar($_POST["fecha_inicio"]);
            $fecha_fin = sanitizar($_POST["fecha_fin"]);

            $year_gestion = (int)$gestion;
            $year_inicio = (int)date('Y', strtotime($fecha_inicio));
            $year_fin = (int)date('Y', strtotime($fecha_fin));

            if ($year_gestion === $year_inicio && $year_gestion === $year_fin) {
                $stmt = $conexion->prepare("INSERT INTO GestionSemestre (Gestion, Semestre, FechaInicio, FechaFin) VALUES (?, ?, ?, ?)");
                $stmt->bind_param('ssss', $gestion, $semestre, $fecha_inicio, $fecha_fin);

                if ($stmt->execute()) {
                    echo "Gestión agregada correctamente";
                    registrarLog($conexion, $usuarioID, "Inserción de un dato nuevo", "Se agregó la gestión: $gestion, semestre: $semestre");
                } else {
                    echo "Error al agregar Gestión: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "El año de gestión debe coincidir con las fechas de inicio y fin.";
            }
        }
    }
} else {
    echo "Faltan datos por rellenar";
}
if (!empty($errores)) {
    foreach ($errores as $error) {
        echo $error . "<br>";
    }
}
$conexion->close();
