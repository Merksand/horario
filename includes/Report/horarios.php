<?php
require('../../pages/assets/fpdf/fpdf.php');

if (isset($_GET['carrera']) && isset($_GET['fecha']) && isset($_GET['nivel']) && isset($_GET['turno'])) {
    $carrera = $_GET['carrera'];
    $fecha = $_GET['fecha'];
    $nivel = $_GET['nivel'];
    $turno = $_GET['turno'];

    include '../database.php';

    $consulta = "
        SELECT
            Docentes.Nombre AS NombreDocente,
            Docentes.Apellido AS ApellidoDocente,
            Materias.Codigo AS CodigoMateria,
            Materias.Nombre AS NombreMateria,
            Materias.Paralelo AS ParaleloMateria,
            Carreras.Nombre AS NombreCarrera,
            Materias.Nivel AS NivelMateria,
            Horarios.Periodo AS periodo,
            Horarios.Dia AS Dia,
            DATE_FORMAT(HoraInicio, '%H:%i') AS HoraInicio,
            DATE_FORMAT(HoraFin, '%H:%i') AS HoraFin,
            Aulas.Nombre AS NombreAula
        FROM
            DocenteMateria
            INNER JOIN Docentes ON DocenteMateria.DocenteID = Docentes.DocenteID
            INNER JOIN Materias ON DocenteMateria.MateriaID = Materias.MateriaID
            INNER JOIN Carreras ON Materias.CarreraID = Carreras.CarreraID
            INNER JOIN Horarios ON DocenteMateria.HorarioID = Horarios.HorarioID
            INNER JOIN Aulas ON DocenteMateria.AulaID = Aulas.AulaID
        WHERE
            CASE DAYOFWEEK('$fecha')
                WHEN 1 THEN 'Domingo'
                WHEN 2 THEN 'Lunes'
                WHEN 3 THEN 'Martes'
                WHEN 4 THEN 'Miércoles'
                WHEN 5 THEN 'Jueves'
                WHEN 6 THEN 'Viernes'
                WHEN 7 THEN 'Sábado'
            END = Horarios.Dia";

    if ($nivel !== 'Todas') {
        $consulta .= " AND Materias.Nivel = '$nivel'";
    }
    if ($carrera !== "Todas") {
        $consulta .= " AND Carreras.Nombre = '$carrera'";
    }
    if ($turno !== "Todas") {
        $consulta .= " AND Horarios.Turno = '$turno'";
    }

    $consulta .= " AND Aulas.Nombre <> 'Desconocido'";
    
    // $consulta .= " ORDER BY Horarios.Periodo,NombreDocente ASC, NombreMateria ASC, NombreDocente, NivelMateria";
    $consulta .= " ORDER BY NombreDocente ASC,HoraInicio,NivelMateria,NombreMateria ASC,NombreDocente,NivelMateria"; 

    $resultado = $conexion->query($consulta);

    class PDF extends FPDF
    {
        public $mostrarCarreraEnFilas = true;

        function Header()
        {
            global $carrera;
            $this->Image('../../img/logo-tran.png', 10, 5, 25);
            $this->SetFont('Arial', 'B', 10);
            date_default_timezone_set("America/New_York");
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
            $this->Cell(0, 5, utf8_decode("$dia_espanol - $fechaActual" ), 0, 1, 'R');
            $this->Cell(0, 3, utf8_decode("Hora: " . date('H:i:s')), 0, 1, 'R');
            // $this->Ln(10);



            // Si hay una sola carrera, muéstrala en el header y no en las filas
            if ($carrera !== "Todas") {
                $this->Cell(0, 5, utf8_decode("Carrera: " . $carrera), 0, 1, 'R');
                $this->mostrarCarreraEnFilas = false;
                $this->Ln(10);
            }

            // Título
            $this->SetFont('Arial', 'B', 15);
            $this->Cell(0, 10, utf8_decode("DOCENTE Y SUS HORARIOS"), 0, 1, 'C');
            $this->Ln(3);
            // Encabezado de tabla
            $this->SetFillColor(228, 100, 0);
            $this->SetTextColor(255, 255, 255);
            $this->SetDrawColor(163, 163, 163);
            $this->SetFont('Arial', 'B', 11);
            $this->Cell(10, 10, utf8_decode('Per.'), 1, 0, 'C', 1);
            $this->Cell(24, 10, utf8_decode('Hora Inicio'), 1, 0, 'C', 1);
            $this->Cell(24, 10, utf8_decode('Hora Fin'), 1, 0, 'C', 1);
            $this->Cell(63, 10, utf8_decode('Docente'), 1, 0, 'C', 1);
            $this->Cell(25, 10, utf8_decode('Materia'), 1, 0, 'C', 1);
            $this->Cell(18, 10, utf8_decode('Nivel'), 1, 0, 'C', 1);
            $this->Cell(70, 10, utf8_decode('Aula'), 1, 0, 'C', 1);

            if ($this->mostrarCarreraEnFilas) {
                $this->Cell(45, 10, utf8_decode('Carrera'), 1, 1, 'C', 1);
            } else {
                $this->Cell(0, 10, '', 0, 1); // Asegurarse de que el diseño esté alineado cuando no se muestra la carrera
            }
        }

        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }
    }

    $pdf = new PDF();
    $pdf->AddPage("H");
    $pdf->AliasNbPages();

    $pdf->SetFont('Arial', '', 10);
    $pdf->SetDrawColor(163, 163, 163);

    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $pdf->Cell(10, 6, utf8_decode($fila['periodo']), 1, 0, "C");
            $pdf->Cell(24, 6, utf8_decode($fila['HoraInicio']), 1, 0, "C");
            $pdf->Cell(24, 6, utf8_decode($fila['HoraFin']), 1, 0, "C");
            $pdf->Cell(63, 6, utf8_decode($fila['NombreDocente'] . ' ' . $fila['ApellidoDocente']), 1);
            $pdf->Cell(25, 6, utf8_decode($fila['CodigoMateria']), 1, 0, "C");
            $pdf->Cell(18, 6, utf8_decode($fila['NivelMateria'] . ' ' . $fila['ParaleloMateria']), 1, 0, "C");
            $pdf->Cell(70, 6, utf8_decode($fila['NombreAula']), 1, 0, "C");

            if ($pdf->mostrarCarreraEnFilas) {
                $pdf->Cell(45, 6, utf8_decode($fila['NombreCarrera']), 1);
            }
            $pdf->Ln();
        }
    }

    $pdf->Output('Prueba.pdf', 'I'); // nombre del archivo, modo de salida
} else {
    echo "Faltan parámetros en la solicitud.";
}


//sistema y contaduria 