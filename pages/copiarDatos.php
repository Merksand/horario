<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        #form-CopiarDatos {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            max-width: 700px;
            margin: 20px auto;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        #form-CopiarDatos h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Estilo para los grupos de formulario */
        #form-CopiarDatos .form-group {
            margin-bottom: 15px;
        }

        #form-CopiarDatos label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 14px;
        }

        /* Estilos para los campos de entrada */
        #form-CopiarDatos input[type="number"],
        #form-CopiarDatos select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        #form-CopiarDatos input[type="number"]:focus,
        #form-CopiarDatos select:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Botón de envío */
        #form-CopiarDatos button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #form-CopiarDatos button:hover {
            background-color: #0056b3;
        }

        #btn-bd {
            margin: 0;
            border-radius: 5px;
            padding: 12px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        /* Estilos responsivos para pantallas más pequeñas */
        @media (max-width: 768px) {
            #form-CopiarDatos {
                padding: 15px;
            }

            #form-CopiarDatos button {
                font-size: 14px;
            }
        }
    </style>
    <?php
    include '../includes/database.php';

    session_name('login');
    session_start();


    $queryGestionSemetre = "SELECT GestionSemestreID, Gestion,Semestre FROM GestionSemestre";
    $resultGestionSemetre = $conexion->query($queryGestionSemetre);

    $gestionSemetre = "";
    while ($row = $resultGestionSemetre->fetch_assoc()) {
        $gestionSemetre  .= "<option value='" . $row['GestionSemestreID'] . "'>" . $row['Gestion'] . " - " . $row['Semestre'] . "</option>";
    }


    $queryCarreras = "SELECT CarreraID, Nombre FROM Carreras";
    $resultCarreras = $conexion->query($queryCarreras);

    $carreras = "";
    while ($row = $resultCarreras->fetch_assoc()) {
        $carreras .= "<option value='" . $row['CarreraID'] . "'>" . $row['Nombre'] . "</option>";
    }
    ?>
    <?php if ($_SESSION['rol'] == 1): ?>
        <button id="btn-bd">Crear Copia de la Base de Datos</button>
    <?php endif; ?>








    <form id="form-CopiarDatos">
        <h2>Copiar Datos Académicos a una nueva Gestion y Semestre</h2>

        <div class="form-group">
            <label for="carrera_copiar">Seleccionar Carrera a Copiar:</label>
            <select id="carrera_copiar" name="carrera_copiar">
                <option value="">Seleccione una carrera</option>
                <?php echo $carreras; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="gestion_copiar">Seleccionar Gestión y Semestre a Copiar:</label>
            <select id="gestion_copiar" name="gestion_copiar">
                <option value="">Seleccione una Gestión</option>
                <?php echo $gestionSemetre; ?>
            </select>
        </div>

        <!-- Selección del nuevo período académico -->
        <div class="form-group">
            <label for="nueva_gestion">Nueva Gestión y Semestre:</label>
            <select name="nueva_gestion" id="nueva_gestion">
                <option value="">Seleccione una Gestión</option>
                <?php echo $gestionSemetre; ?>
            </select>
        </div>

        <button type="submit" id="btn-copiar">Copiar Datos</button>
    </form>

</body>

</html>