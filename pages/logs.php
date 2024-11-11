<?php
include '../includes/database.php';

session_name('login');
session_start();

if ($_SESSION['rol'] != 1) {
    // Verificar que el usuario sea administrador
    echo "Acceso no autorizado.";
    exit;
}

// Obtener todos los usuarios para el select
$queryUsuarios = "SELECT UsuarioID, Nombre, Apellido FROM Usuarios";
$resultUsuarios = $conexion->query($queryUsuarios);

$usuariosOptions = "";
while ($row = $resultUsuarios->fetch_assoc()) {
    $usuariosOptions .= "<option value='" . $row['UsuarioID'] . "'>" . $row['Nombre'] . " " . $row['Apellido'] . "</option>";
}
?>


<style>
    /* Estilos del contenedor del formulario */
    #form-log-filter {
        width: 100%;
        max-width: 500px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        margin: auto;
        margin-top: 20px;
    }
    h2{
        text-align: center;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 15px;
    }

    label {
        color: #555;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="date"],
    select {
        padding: 10px;
        font-size: 14px;
        color: #333;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: border-color 0.2s;
    }

    input[type="date"]:focus,
    select:focus {
        border-color: #4f46e5;
        outline: none;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #4f46e5;
        color: #fff;
        font-weight: bold;
        font-size: 14px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #3b36d0;
    }

    /* Estilos de la tabla de logs */
    #logs-table {
        width: 100%;
        max-width: 800px;
        background-color: #fff;
        border-collapse: collapse;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-top: 20px;
    }

    #logs-table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        color: #333;
    }

    th {
        background-color: #4f46e5;
        color: #fff;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9fafb;
    }

    table > tr:hover {
        background-color: #red !important;
    }

    td a {
        color: #4f46e5;
        text-decoration: none;
        font-weight: bold;
    }

    td a:hover {
        text-decoration: underline;
    }

    #logsResults{
        margin-top: 20px;
    }
</style>

<h2>Consultar Logs del Sistema</h2>

<form id="form-log-filter" method="GET">
    <div class="form-group">
        <label for="usuario" class="blanco">Seleccionar Usuario:</label>
        <select id="usuario" name="usuario">
            <option value="">Todos los usuarios</option>
            <?php echo $usuariosOptions; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="fecha_desde" class="blanco">Fecha Desde:</label>
        <input type="date" id="fecha_desde" name="fecha_desde" >
    </div>
    <div class="form-group">
        <label for="fecha_hasta" class="blanco">Fecha Hasta:</label>
        <input type="date" id="fecha_hasta" name="fecha_hasta">
    </div>
    <button type="submit">Filtrar</button>
</form>

<!-- Contenedor para los resultados de los logs -->
<div id="logsResults"></div>
