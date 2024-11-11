<?php

include 'database.php';
// Variables para filtros
$usuarioID = isset($_POST['usuario']) ? $_POST['usuario'] : '';
$fechaDesde = isset($_POST['fecha_desde']) ? $_POST['fecha_desde'] : '';
$fechaHasta = isset($_POST['fecha_hasta']) ? $_POST['fecha_hasta'] : '';

// Construcción de la consulta de logs
$queryLogs = "SELECT logs.LogID, logs.Accion, logs.Detalles, logs.fyh_creacion, usuarios.Nombre, usuarios.Apellido 
              FROM logs 
              INNER JOIN Usuarios ON logs.UsuarioID = Usuarios.UsuarioID 
              WHERE 1=1";

// Agregar filtros a la consulta si se han proporcionado
if (!empty($usuarioID)) {
    $queryLogs .= " AND Usuarios.UsuarioID = $usuarioID";
}
if (!empty($fechaDesde)) {
    $queryLogs .= " AND logs.fyh_creacion >= '$fechaDesde 00:00:00'";
}
if (!empty($fechaHasta)) {
    $queryLogs .= " AND logs.fyh_creacion <= '$fechaHasta 23:59:59'";
}

$queryLogs .= " ORDER BY logs.fyh_creacion DESC";
$resultLogs = $conexion->query($queryLogs);

// Mostrar resultados
if ($resultLogs->num_rows > 0) {
    echo "<table class='modo'>";
    echo "<tr><th>ID</th><th>Acción</th><th>Detalles</th><th>Fecha</th><th>Usuario</th></tr>";
    while ($row = $resultLogs->fetch_assoc()) {
        echo "<tr>
                <td class='modo'>{$row['LogID']}</td>
                <td class='modo'>{$row['Accion']}</td>
                <td class='modo'>{$row['Detalles']}</td>
                <td class='modo'>{$row['fyh_creacion']}</td>
                <td class='modo'>{$row['Nombre']} {$row['Apellido']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros para los filtros seleccionados.";
}

// $conexion->close();
