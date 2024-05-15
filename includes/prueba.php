<?php
include 'database.php';

if (!empty($_POST["btnIngresar"])) {

    
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
    $apellido = isset($_GET['apellido']) ? $_GET['apellido'] : '';
    
    $sql = "SELECT p.Nombre AS nombre_profesor, p.Apellido AS apellido_profesor, c.Nombre AS nombre_carrera, a.Numero AS numero_aula, h.Dia AS dia_horario, h.HoraInicio AS hora_inicio, h.HoraFin AS hora_fin
        FROM Profesores p
        JOIN ProfesorMateria pm ON p.ProfesorID = pm.ProfesorID
        JOIN Materias m ON pm.MateriaID = m.MateriaID
        JOIN Carreras c ON m.CarreraID = c.CarreraID
        JOIN Aulas a ON pm.AulaID = a.AulaID
        JOIN Horarios h ON pm.HorarioID = h.HorarioID";

        if (!empty($nombre) || !empty($apellido)) {
            $sql .= " WHERE ";
            if (!empty($nombre)) {
                $sql .= "p.Nombre LIKE '%$nombre%'";
            }
            if (!empty($apellido)) {
                $sql .= (!empty($nombre) ? " AND " : "") . "p.Apellido LIKE '%$apellido%'";
            }
        }
        
        $resultado = $conn->query($sql);
        
        // Mostrar los resultados en una tabla con div
        if ($resultado->num_rows > 0) {
            echo '<div class="encabezado fila">';
            echo '<div>Docente</div>';
            echo '<div>Carrera</div>';
            echo '<div>Aula</div>';
            echo '<div>Horario</div>';
            echo '</div>';
            
            while ($fila = $resultado->fetch_assoc()) {
                echo '<div class="fila">';
                echo '<div>' . $fila['nombre_profesor'] . ' ' . $fila['apellido_profesor'] . '</div>';
                echo '<div>' . $fila['nombre_carrera'] . '</div>';
                echo '<div>' . $fila['numero_aula'] . '</div>';
                echo '<div>' . $fila['dia_horario'] . ' ' . $fila['hora_inicio'] . ' - ' . $fila['hora_fin'] . '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No se encontraron profesores que coincidan con el filtro.</p>';
        }
    }

    ?>












<!-- DOCENTES -->




<?php




// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "Instituto";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el nombre y apellido ingresados en el filtro
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$apellido = isset($_GET['apellido']) ? $_GET['apellido'] : '';

// Consulta SQL para obtener los profesores que coincidan con el filtro
$sql = "SELECT p.Nombre AS nombre_profesor, p.Apellido AS apellido_profesor, c.Nombre AS nombre_carrera, a.Numero AS numero_aula, h.Dia AS dia_horario, h.HoraInicio AS hora_inicio, h.HoraFin AS hora_fin
        FROM Profesores p
        JOIN ProfesorMateria pm ON p.ProfesorID = pm.ProfesorID
        JOIN Materias m ON pm.MateriaID = m.MateriaID
        JOIN Carreras c ON m.CarreraID = c.CarreraID
        JOIN Aulas a ON pm.AulaID = a.AulaID
        JOIN Horarios h ON pm.HorarioID = h.HorarioID";

if (!empty($nombre) || !empty($apellido)) {
    $sql .= " WHERE ";
    if (!empty($nombre)) {
        $sql .= "p.Nombre LIKE '%$nombre%'";
    }
    if (!empty($apellido)) {
        $sql .= (!empty($nombre) ? " AND " : "") . "p.Apellido LIKE '%$apellido%'";
    }
}

$resultado = $conn->query($sql);

// Mostrar los resultados en una tabla con div
if ($resultado->num_rows > 0) {
    echo '<div class="encabezado fila">';
    echo '<div>Docente</div>';
    echo '<div>Carrera</div>';
    echo '<div>Aula</div>';
    echo '<div>Horario</div>';
    echo '</div>';

    while ($fila = $resultado->fetch_assoc()) {
        echo '<div class="fila">';
        echo '<div>' . $fila['nombre_profesor'] . ' ' . $fila['apellido_profesor'] . '</div>';
        echo '<div>' . $fila['nombre_carrera'] . '</div>';
        echo '<div>' . $fila['numero_aula'] . '</div>';
        echo '<div>' . $fila['dia_horario'] . ' ' . $fila['hora_inicio'] . ' - ' . $fila['hora_fin'] . '</div>';
        echo '</div>';
    }
} else {
    echo '<p>No se encontraron profesores que coincidan con el filtro.</p>';
}

$conn->close();
?>














// Conexión a la base de datos
include '../includes/database.php';

// Verifica si se ha enviado el parámetro de la carrera seleccionada
if(isset($_GET['carrera'])) {
    $carrera = $_GET['carrera'];

    // Consulta SQL para obtener las materias de la carrera seleccionada
    $sql = "SELECT m.Nombre AS NombreMateria, m.Codigo, c.Nombre AS NombreCarrera
            FROM Materias m
            INNER JOIN Carreras c ON m.CarreraID = c.CarreraID
            WHERE c.Nombre = '$carrera'";

    $result = $conn->query($sql);

    if($result) {
        $materias = array();

        // Obtener los resultados de la consulta
        while($row = $result->fetch_assoc()) {
            $materias[] = $row;
        }

        // Devolver los resultados en formato JSON
        echo json_encode($materias);
    } else {
        // Si hay un error en la consulta
        echo json_encode(array('error' => 'Error al obtener las materias.'));
    }
} 
// else {
//     // Si no se ha enviado el parámetro de la carrera seleccionada
//     echo json_encode(array('error' => 'No se ha especificado la carrera.'));
// }  
// Cerrar la conexión a la base de datos
// $conn->close();






















if (!empty($_POST["btningresar"])) {
    if (empty($_POST["usuario"]) and empty($_POST["password"])) {
        echo '<div class="alert alert-danger">LOS CAMPOS ESTAN VACIOS</div>';
    } else {
        $usuario = $_POST["usuario"];
        $clave = $_POST["password"];
    }
}
$conexion = mysqli_connect("localhost", "root", "Miguelangelomy1", "Instituto");
        $sql = "SELECT * FROM Usuarios WHERE usuario = '$usuario' AND Clave = '$clave'";
        $resultado = mysqli_query($conexion, $sql);
        $filas = mysqli_num_rows($resultado);
        if ($filas > 0) {
            echo '<div class="alert btn-success mt-4 aviso text-center">Conexion Exitosa</div>';
        }else{
            echo '<div class="alert btn-danger mt-4 aviso text-center">Usuario o Contraseña Incorrectos</div>';
        }
?>


if (!empty($_POST["btnIngresar"])) {
echo '<div class="alert btn-danger text-center aviso">HOLA MUNDO</div>';
}

Sconexion=new mysqLi("localhost", "root","*, "login", "3306");
Sconexion->set_charset(*utf8*);


?>














