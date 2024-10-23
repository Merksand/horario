<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="styles.css"> <!-- Añade estilos según prefieras -->
</head>
<body>
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
        </select><br>

        <button type="submit">Agregar Usuario</button>
    </form>

    <!-- Formulario para cambiar la contraseña -->
    <form id="cambiarContrasenaForm">
        <h3>Cambiar Contraseña</h3>
        <label for="usuarioExistente">Seleccionar Usuario:</label>
        <select id="usuarioExistente" name="usuarioExistente" required>
            <!-- Los usuarios se llenarán desde la base de datos -->
        </select><br>

        <label for="nuevaClave">Nueva Contraseña:</label>
        <input type="password" id="nuevaClave" name="nuevaClave" required><br>

        <button type="submit">Cambiar Contraseña</button>
    </form>

    <script src="script.js"></script>
</body>
</html>
