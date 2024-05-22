<?php
if (isset($_GET['nombre']) || isset($_GET['apellido'])) {
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
    $apellido = isset($_GET['apellido']) ? $_GET['apellido'] : '';

    $conexion = new mysqli("localhost", "root", "Miguelangelomy1", "Instituto");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Construir la consulta SQL
    $consulta = "SELECT
                    Docentes.Nombre AS NombreDocente,
                    Docentes.Apellido AS ApellidoDocente,
                    Materias.Nombre AS NombreMateria,
                    Carreras.Nombre AS NombreCarrera,
                    Horarios.Dia,
                    Horarios.HoraInicio,
                    Horarios.HoraFin,
                    Aulas.Numero AS NumeroAula
                FROM
                    DocenteMateria
                    INNER JOIN Docentes ON DocenteMateria.DocenteID = Docentes.DocenteID
                    INNER JOIN Materias ON DocenteMateria.MateriaID = Materias.MateriaID
                    INNER JOIN Carreras ON Materias.CarreraID = Carreras.CarreraID
                    INNER JOIN Horarios ON DocenteMateria.HorarioID = Horarios.HorarioID
                    INNER JOIN Aulas ON DocenteMateria.AulaID = Aulas.AulaID
                WHERE";
                    
    if (!empty($nombre) && !empty($apellido)) {
        $consulta .= "Docentes.Nombre LIKE '%$nombre%' AND Docentes.Apellido LIKE '%$apellido%'";
    } elseif (!empty($apellido)) {
        $consulta .= "Docentes.Apellido LIKE '%$apellido%'";
    } elseif (!empty($nombre)) {
        $consulta .= "Docentes.Nombre LIKE '%$nombre%'";
    } else {
        // Si no se proporciona ni nombre ni apellido, la consulta no devolverá resultados
        $consulta .= " AND 1 = 0";
    }
    

    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "ID: " . $fila['DocenteID'] . "<br>";
            echo "Nombre: " . $fila['Nombre'] . "<br>";
            echo "Apellido: " . $fila['Apellido'] . "<br>";
            echo "<br>";
        }
    } else {
        echo "No se encontraron docentes con ese nombre y/o apellido.";
    }
    $conexion->close();
} else {
    echo "No se proporcionaron nombre y/o apellido.";
}
?>
