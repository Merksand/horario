<?php
require '../../pages/assets/fpdf/fpdf.php';
if (isset($_GET['nombre']) || isset($_GET['apellido']) || isset($_GET['fecha'])) {
    $nombre = $_GET['nombre'] ?? '';
    $apellido = $_GET['apellido'] ?? '';
    $fecha = $_GET['fecha'] ?? '';
    include '../database.php';
    $consulta = "SELECT
                    Docentes.Nombre AS NombreDocente,
                    Docentes.Apellido AS ApellidoDocente,
                    Materias.Nombre AS NombreMateria,
                    Carreras.Nombre AS NombreCarrera,
                    Horarios.Dia,
                    DATE_FORMAT(HoraInicio, '%H:%i') AS HoraInicio,
                    DATE_FORMAT(HoraFin, '%H:%i') AS HoraFin,
                    Aulas.Nombre AS NombreAula,
                    Materias.Nivel As NivelMateria,
                    Materias.Codigo AS CodigoMateria,
                    Horarios.Periodo AS Periodo
                FROM
                    DocenteMateria
                    INNER JOIN Docentes ON DocenteMateria.DocenteID = Docentes.DocenteID
                    INNER JOIN Materias ON DocenteMateria.MateriaID = Materias.MateriaID
                    INNER JOIN Carreras ON Materias.CarreraID = Carreras.CarreraID
                    INNER JOIN Horarios ON DocenteMateria.HorarioID = Horarios.HorarioID
                    INNER JOIN Aulas ON DocenteMateria.AulaID = Aulas.AulaID
                    INNER JOIN GestionSemestre ON DocenteMateria.GestionSemestreID = GestionSemestre.GestionSemestreID
                WHERE GestionSemestre.GestionSemestreID = (SELECT GestionSemestreID FROM GestionSemestre ORDER BY GestionSemestreID DESC LIMIT 1) ";

    if (!empty($nombre) && !empty($apellido)) {
        $consulta .= " AND Docentes.Nombre LIKE '%$nombre%' AND Docentes.Apellido LIKE '%$apellido%'";
        if (!empty($fecha)) {
            $consulta .= " AND  CASE DAYOFWEEK('$fecha')
                WHEN 1 THEN 'Domingo'
                WHEN 2 THEN 'Lunes'
                WHEN 3 THEN 'Martes'
                WHEN 4 THEN 'Miércoles'
                WHEN 5 THEN 'Jueves'
                WHEN 6 THEN 'Viernes'
                WHEN 7 THEN 'Sábado'
            END = Horarios.Dia ";
        }
    } elseif (!empty($apellido)) {
        $consulta .= " AND Docentes.Apellido LIKE '%$apellido%'";
        if (!empty($fecha)) {
            $consulta .= " AND  CASE DAYOFWEEK('$fecha')
                WHEN 1 THEN 'Domingo'
                WHEN 2 THEN 'Lunes'
                WHEN 3 THEN 'Martes'
                WHEN 4 THEN 'Miércoles'
                WHEN 5 THEN 'Jueves'
                WHEN 6 THEN 'Viernes'
                WHEN 7 THEN 'Sábado'
            END = Horarios.Dia ";
        }
    } elseif (!empty($nombre)) {
        $consulta .= " AND Docentes.Nombre LIKE '%$nombre%'";
        if (!empty($fecha)) {
            $consulta .= " AND  CASE DAYOFWEEK('$fecha')
                WHEN 1 THEN 'Domingo'
                WHEN 2 THEN 'Lunes'
                WHEN 3 THEN 'Martes'
                WHEN 4 THEN 'Miércoles'
                WHEN 5 THEN 'Jueves'
                WHEN 6 THEN 'Viernes'
                WHEN 7 THEN 'Sábado'
            END = Horarios.Dia ";
        }
    } else {
        echo "<div class='datosIncorrectos'>No se proporcionaron nombre y/o apellido.</div>";
        exit;
    }
    $consulta .= " ORDER BY Horarios.HorarioID";

    $resultado = $conexion->query($consulta);

    $docente = "SELECT * FROM Docentes WHERE Nombre LIKE '%$nombre%' AND Apellido LIKE '%$apellido%'";
    $resultado2 = $conexion->query($docente);

    $docente = $resultado2->fetch_assoc();

    class PDF extends FPDF
    {

        function Header()
        {
            global $docente;
            $this->Image('../../img/logo-tran.png', 175, 5, 25);
            $this->SetFont('Arial', 'B', 10);
            date_default_timezone_set("America/La_Paz");
            $dias_espanol = array(
                'Sunday' => 'Domingo',
                'Monday' => 'Lunes',
                'Tuesday' => 'Martes',
                'Wednesday' => 'Miércoles',
                'Thursday' => 'Jueves',
                'Friday' => 'Viernes',
                'Saturday' => 'Sábado'
            );
            global $fecha;
            $fechaActual = $fecha;
            $dia_ingles = date('l', strtotime($fecha));
            $dia_espanol = $dias_espanol[$dia_ingles];
            // Mostrar en el PDF
            $this->Cell(0, 5, utf8_decode("$dia_espanol - $fechaActual"), 0, 1, 'L');
            $this->Cell(0, 3, utf8_decode("Hora: " . date('H:i:s')), 0, 1, 'L');
            // $this->Ln(10);
            $this->Cell(0, 5, utf8_decode("Docente: " . $docente['Nombre'] . " " . $docente['Apellido']), 0, 1, 'L');
            $this->Ln(8);

            // Título
            $this->SetFont('Arial', 'B', 15);
            $this->Cell(0, 10, utf8_decode("Horario por Docente"), 0, 1, 'C');
            $this->Ln(3);
            // Encabezado de tabla
            $this->SetFillColor(228, 100, 0);
            $this->SetTextColor(255, 255, 255);
            $this->SetDrawColor(163, 163, 163);
            $this->SetFont('Arial', 'B', 11);
            $this->Cell(10, 10, utf8_decode('Per.'), 1, 0, 'C', 1);
            $this->Cell(24, 10, utf8_decode('Horario'), 1, 0, 'C', 1);
            // $this->Cell(63, 10, utf8_decode('Docente'), 1, 0, 'C', 1);
            $this->Cell(45, 10, utf8_decode('Aula'), 1, 0, 'C', 1);
            $this->Cell(24, 10, utf8_decode('Materia'), 1, 0, 'C', 1);
            $this->Cell(16, 10, utf8_decode('Nivel'), 1, 0, 'C', 1);
            $this->Cell(55, 10, utf8_decode('Carrera'), 1, 1, 'C', 1);
        }
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }
    }
    $pdf = new PDF();
    $pdf->AddPage("portrait", "A4");
    $pdf->AliasNbPages();

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetDrawColor(163, 163, 163);
    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $pdf->Cell(10, 6, utf8_decode($fila['Periodo']), 1, 0, "C");
            $pdf->Cell(24, 6, utf8_decode($fila['HoraInicio'] . " - " . $fila['HoraFin']), 1, 0, "C");
            // $pdf->Cell(63, 6, utf8_decode($fila['NombreDocente'] . " " . $fila['ApellidoDocente']), 1, 0, "C");
            $pdf->Cell(45, 6, utf8_decode($fila['NombreAula']), 1, 0, "C");
            $pdf->Cell(24, 6, utf8_decode($fila['CodigoMateria']), 1, 0, "C");
            $pdf->Cell(16, 6, utf8_decode($fila['NivelMateria']), 1, 0, "C");
            $pdf->Cell(55, 6, utf8_decode($fila['NombreCarrera']), 1, 0, "C");
            $pdf->Ln();
        }
    }

    $pdf->Output('Reporte.pdf', 'I'); // nombre del archivo, modo de salida
} else {
    echo "Faltan parámetros en la solicitud.";
}

// div final
//Sueldo mayor igual a 600 = sueldo ejecutivo
//Sueldo menor a 400 = sueldo bajo
//Sueldo entre 400 y 599 = sueldo medio

//suma * 0.13

// sueldo final reta de los dos anteriores inputs
//haz esta interfaz,en el input anticipo se pondra se podra ingresar un monto, en afp estara el 13%, y se tendra que sacar el resultado de los primero 3 input y de ese resultado multiplicar por 0.3 para que en el input afp se vea el resultado, en el input suelo liquido ira el resultado de la de los tres primeros inputs menos los la suma de 2 dos inptu que son anticipo y afp, el resultado liquido se calculara cuando se presione el boton de calcular, y al lado del input saldra un mensaje, el mensaje sera si el sueldo es menor de 400 entonces saldra el mensaje "Sueldo bajo", si el sueldo es entre 400 y 599 entonces saldra el mensaje "Sueldo medio", y si el sueldo es mayor o igual de 600 entonces saldra el mensaje "Suelda ejecutivo", se hara con html,css y jquert