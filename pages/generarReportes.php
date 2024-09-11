<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Reportes</title>
</head>

<body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: darkcyan;
            color: #333;
            /* padding: 20px; */
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[list],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        select,
        datalist {
            width: 100%;
        }

        .form-group select,
        .form-group input {
            margin-bottom: 10px;
        }
    </style>
    <?php
    include '../includes/database.php';

    $queryCarreras = "SELECT CarreraID, Nombre FROM carreras";
    $resultCarreras = $conexion->query($queryCarreras);

    $carreras = "";
    while ($row = $resultCarreras->fetch_assoc()) {
        $carreras .= "<option value='" . $row['CarreraID'] . "'>" . $row['Nombre'] . "</option>";
    }

    $queryDocentes = "SELECT DocenteID, Nombre,Apellido FROM docentes";
    $resultDocentes = $conexion->query($queryDocentes);

    $docentes = "";
    while ($row = $resultDocentes->fetch_assoc()) {
        $docentes .= "<option value='" . $row['Nombre'] . " " . $row['Apellido'] . "' data-docente-id='" . $row['DocenteID'] . "'>";
    }

    $queryMaterias = "SELECT MateriaID, Nombre FROM materias";
    $resultMaterias = $conexion->query($queryMaterias);

    $materias = "";
    while ($row = $resultMaterias->fetch_assoc()) {
        $materias .= "<option value='" . $row['Nombre'] . "' data-materia-id='" . $row['MateriaID'] . "'>";
    }

    $queryGestiones = "SELECT Gestion FROM GestionSemestre";
    $resultGestiones = $conexion->query($queryGestiones);

    $gestiones = "";
    while ($row = $resultGestiones->fetch_assoc()) {
        $gestiones .= "<option value='" . $row['Gestion'] . "'>" . $row['Gestion'] . "</option>";
    }
    ?>

    <div class="container">
        <h2>Generar Reportes Académicos</h2>
        <form id="form-reportes">
            <!-- Seleccionar tipo de reporte -->
            <div class="form-group">
                <label for="tipo_reporte">Tipo de Reporte:</label>
                <select id="tipo_reporte" name="tipo_reporte" required>
                    <option value="">Seleccione el tipo de reporte</option>
                    <option value="docente">Reporte por Docente</option>
                    <option value="carrera">Reporte por Carrera</option>
                    <option value="materia">Reporte por Materia</option>
                    <option value="gestion_semestre">Reporte por Gestión/Semestre</option>
                </select>
            </div>

            <!-- Seleccionar Carrera -->
            <div class="form-group">
                <label for="carrera">Carrera:</label>
                <select id="carreras" name="carreras">
                    <!-- <option value="" disabled selected>Seleccione una carrera</option> -->
                    <option value="">Seleccione una carrera</option>
                    <?php echo $carreras; ?>
                </select>
            </div>

            <!-- Seleccionar Docente -->
            <div class="form-group">
                <label for="docente">Docente:</label>
                <input list="docentes" id="docente" name="docente">
                <datalist id="docentes">
                    <?php echo $docentes; ?>
                </datalist>
            </div>

            <div class="form-group">
                <label for="carrera">Carrera:</label>
                <select id="carrera" name="carrera" required>
                    <?php echo $carreras; ?>
                </select>
            </div>

            <!-- Seleccionar Nivel -->
            <div class="form-group">
                <label for="nivel">Nivel:</label>
                <select id="nivel" name="nivel" required>
                    <option value="">Seleccione un Nivel</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                    <option value="500">500</option>
                    <option value="600">600</option>
                    <!-- Niveles dinámicos basados en la carrera seleccionada -->
                </select>
            </div>

            <!-- Seleccionar Materia -->
            <div class="form-group">
                <label for="materia">Materia:</label>
                <input list="materias" id="materia" name="materia">
                <datalist id="materias">
                    <!-- <?php echo $materias; ?> -->
                </datalist>
            </div>

            <!-- Seleccionar Gestión -->
            <div class="form-group">
                <label for="gestion">Gestión:</label>
                <select id="gestion" name="gestion">
                    <option value="">Seleccione una Gestión</option>
                    <?php echo $gestiones; ?>
                </select>
            </div>

            <!-- Seleccionar Semestre -->
            <div class="form-group">
                <label for="semestre">Semestre:</label>
                <select id="semestre" name="semestre">
                    <option value="">Seleccione un Semestre</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>

            <!-- Botón de generación de reporte -->
            <div class="form-group">
                <button type="submit">Generar Reporte</button>
            </div>
        </form>
    </div>
</body>

</html>