<?php
// Verificar si se recibieron los datos de nombre y apellido
if (isset($_GET["nombre"]) && isset($_GET["apellido"])) {
    // Obtener los valores de nombre y apellido
    $nombreDocente = $_GET["nombre"];
    $apellidoDocente = $_GET["apellido"];

    // Realizar la conexión a la base de datos (asumiendo que ya tienes un archivo de conexión)
    include("database.php");

    // Consulta SQL para buscar los docentes según los filtros ingresados
    $sql = "SELECT * FROM Profesores WHERE Nombre LIKE '%$nombreDocente%' AND Apellido LIKE '%$apellidoDocente%'";

    // Ejecutar la consulta
    $result = mysqli_query($conn, $sql);

    // Verificar si se encontraron resultados
    if (mysqli_num_rows($result) > 0) {
        // Mostrar los resultados
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Nombre: " . $row["Nombre"] . ", Apellido: " . $row["Apellido"] . "<br>";
        }
    } else {
        echo "No se encontraron docentes con los filtros especificados.";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
} else {
    // Si no se recibieron los datos esperados, mostrar un mensaje de error
    echo "Error: No se recibieron los datos esperados.";
}
?>
