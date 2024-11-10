<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
</head>

<body>
    <style>
        /* Estilos generales (ya definidos anteriormente) */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        h3 {
            margin-bottom: 15px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        button {
            width: 100%;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 3px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        /* Estilos específicos para cada formulario */
        form#agregarUsuarioForm {
            border-left: 5px solid #007bff;
        }

        form#cambiarContrasenaForm {
            border-left: 5px solid #ffc107;
        }

        form#eliminarUsuarioForm {
            border-left: 5px solid #dc3545;
            /* Color rojo para distinguir el formulario de eliminación */
        }

        button[type="submit"] {
            background-color: #007bff;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        button[type="submit"]:nth-of-type(2) {
            background-color: #ffc107;
        }

        button[type="submit"]:nth-of-type(2):hover {
            background-color: #e0a800;
        }

        /* Botón de eliminación con estilo rojo */
        form#eliminarUsuarioForm button[type="submit"] {
            background-color: #dc3545;
        }

        form#eliminarUsuarioForm button[type="submit"]:hover {
            background-color: #c82333;
        }

        p.error {
            color: red;
        }

        p.success {
            color: green;
        }

        #apellido {
            margin: 0;
        }
    </style>
    <?php
    include '../includes/database.php';

    $sql = "SELECT RolID, NombreRol FROM Rol";
    $result = $conexion->query($sql);

    $sqlUsuarios = "SELECT * FROM Usuarios WHERE is_active = 1";
    $resultUsuarios = $conexion->query($sqlUsuarios);

    $sqlCarreras = "SELECT CarreraID, Nombre FROM Carreras";
    $resultCarreras = $conexion->query($sqlCarreras);
    ?>

    <h2>Gestión de Usuarios</h2>

    <!-- Formulario para agregar usuario -->
    <form id="agregarUsuarioForm">
        <h3>Agregar Usuario</h3>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required><br>

        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="clave">Clave:</label>
        <input type="password" id="clave" name="clave" required><br>

        <label for="rol">Rol:</label>
        <select id="rol" name="rol" required>
            <option value="">Seleccione un rol</option>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['RolID'] . "'>" . $row['NombreRol'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay roles disponibles</option>";
            }
            ?>
        </select><br>
        <div id="carrerasContainer" style="display: none;">
            <label>Selecciona las carreras que estara a cargo:</label>
            <?php
            while ($res = $resultCarreras->fetch_assoc()) {
                echo "<input type='checkbox' name='carreraID[]' value='$res[CarreraID]'> $res[Nombre]<br>";
            }
            ?>
        </div>

        <button type="submit">Agregar Usuario</button>
    </form>

    <!-- Formulario para cambiar la contraseña -->
    <form id="cambiarContrasenaForm">
        <h3>Cambiar Contraseña</h3>
        <label for="usuarioExistente">Seleccionar Usuario:</label>
        <select id="usuarioExistente" name="usuarioExistente" required>
            <option value="">Seleccione un usuario</option>
            <?php
            if ($resultUsuarios->num_rows > 0) {
                while ($row = $resultUsuarios->fetch_assoc()) {
                    echo "<option value='" . $row['UsuarioID'] . "'>" . $row['Nombre'] .  ". " . $row['Apellido'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay usuarios disponibles</option>";
            } ?>
        </select><br>
        <label for="nuevaClave">Nueva Contraseña:</label>
        <input type="password" id="nuevaClave" name="nuevaClave" required><br>
        <button type="submit">Cambiar Contraseña</button>
    </form>

    <!-- Formulario para eliminar usuario -->
    <form id="eliminarUsuarioForm">
        <h3>Eliminar Usuarioz</h3>
        <label for="usuarioEliminar">Seleccionar Usuario:</label>
        <select id="usuarioEliminar" name="usuarioEliminar" required>
            <option value="">Seleccione un usuario</option>
            <?php
            $resultUsuarios->data_seek(0);  // Restablecer puntero para reutilizar $resultUsuarios
            while ($row = $resultUsuarios->fetch_assoc()) {
                echo "<option value='" . $row['UsuarioID'] . "'>" . $row['Nombre'] . " " . $row['Apellido'] . "</option>";
            }
            ?>
        </select><br>
        <button type="submit">Eliminar Usuario</button>
    </form>

    <script src="script.js"></script>
</body>

</html>