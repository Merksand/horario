<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
</head>

<body>
    <style>
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

        form#agregarUsuarioForm {
            border-left: 5px solid #007bff;
        }

        form#cambiarContrasenaForm {
            border-left: 5px solid #ffc107;
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

        p.error {
            color: red;
        }

        p.success {
            color: green;
        }

        #apellido{
            margin: 0;
        }
    </style>
    <?php
    include '../includes/database.php';

    $sql = "SELECT RolID, NombreRol FROM Rol";
    $result = $conexion->query($sql);

    $sqlUsuarios = "SELECT UsuarioID, Usuario FROM Usuarios";
    $resultUsuarios = $conexion->query($sqlUsuarios);
    ?>
    <h2>Gestión de Usuarios</h2>

    <!-- Formulario para agregar usuarios -->
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
            <!-- Los roles se llenarán desde la base de datos -->
            <option value="">Seleccione un rol</option>
            <?php
            // Llenar el select con los roles obtenidos de la base de datos
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['RolID'] . "'>" . $row['NombreRol'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay roles disponibles</option>";
            }
            ?>
        </select><br>

        <button type="submit">Agregar Usuario</button>
    </form>

    <!-- Formulario para cambiar la contraseña -->
    <form id="cambiarContrasenaForm">
        <h3>Cambiar Contraseña</h3>
        <label for="usuarioExistente">Seleccionar Usuario:</label>
        <select id="usuarioExistente" name="usuarioExistente" >
        <option value="">Seleccione un usuario</option>
            <!-- Los usuarios se llenarán desde la base de datos -->
            <?php
            if ($resultUsuarios->num_rows > 0) {
                while ($row = $resultUsuarios->fetch_assoc()) {
                    echo "<option value='" . $row['UsuarioID'] . "'>" . $row['Usuario'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay usuarios disponibles</option>";
            } ?>
        </select><br>

        <label for="nuevaClave">Nueva Contraseña:</label>
        <input type="password" id="nuevaClave" name="nuevaClave" ><br>

        <button type="submit" >Cambiar Contraseña</button>
    </form>

    <script src="script.js"></script>
</body>

</html>