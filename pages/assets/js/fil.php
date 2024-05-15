<?php
// Verificar si se recibieron los datos de nombre y apellido
if (isset($_GET["nombre"]) && isset($_GET["apellido"])) {
    // Obtener los valores de nombre y apellido
    // $nombreDocente = $_GET["nombre"];
    // $apellidoDocente = $_GET["apellido"];

    // include("database.php");

    // $sql = "SELECT * FROM Profesores WHERE Nombre LIKE '%$nombreDocente%' AND Apellido LIKE '%$apellidoDocente%'";

    // $result = mysqli_query($conn, $sql);

    // if (mysqli_num_rows($result) > 0) {
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         echo "Nombre: " . $row["Nombre"] . ", Apellido: " . $row["Apellido"] . "<br>";
    //     }
    // } else {
    //     echo "No se encontraron docentes con los filtros especificados.";
    // }

    // mysqli_close($conn);

    echo "VERIFICACION EXITOSA";
} else {
    echo "Error: No se recibieron los datos esperados.";
}
