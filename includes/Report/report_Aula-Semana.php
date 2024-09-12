<?php
require('../../pages/assets/fpdf/fpdf.php');

if (isset($_GET['aula'])) {
    $aula = $_GET['aula'] ?? '';
    $fecha = $_GET['fecha'] ?? '';
    $turno = $_GET['turno'] ?? '';

    include '../database.php';

    $consulta = "SELECT
                    Docentes.Nombre AS NombreDocente,
                    Docentes.Apellido AS ApellidoDocente,
                    Materias.Nombre AS NombreMateria,
                    Carreras.Nombre AS NombreCarrera,
                    Materias.Nivel AS NivelMateria,
                    Horarios.Dia AS Dia,
                    Horarios.Periodo AS Periodo,
                    DATE_FORMAT(HoraInicio, '%H:%i') AS HoraInicio,
                    DATE_FORMAT(HoraFin, '%H:%i') AS HoraFin,
                    Carreras.Nombre AS NombreCarrera,
                    Materias.Codigo AS CodigoMateria,
                    Horarios.HorarioID
                FROM
                    DocenteMateria
                    INNER JOIN Docentes ON DocenteMateria.DocenteID = Docentes.DocenteID
                    INNER JOIN Materias ON DocenteMateria.MateriaID = Materias.MateriaID
                    INNER JOIN Carreras ON Materias.CarreraID = Carreras.CarreraID
                    INNER JOIN Horarios ON DocenteMateria.HorarioID = Horarios.HorarioID
                    INNER JOIN Aulas ON DocenteMateria.AulaID = Aulas.AulaID
                    INNER JOIN GestionSemestre ON DocenteMateria.GestionSemestreID = GestionSemestre.GestionSemestreID
                    WHERE GestionSemestre.GestionSemestreID = (SELECT GestionSemestreID FROM GestionSemestre ORDER BY GestionSemestreID DESC LIMIT 1)";

    if ($aula) {
        $consulta .= " AND Aulas.Nombre ='$aula'";

        if (!empty($turno) && $turno !== 'Todas') {
            $consulta .= " AND Horarios.Turno = '$turno'";
        }

    }
    $resultado = $conexion->query($consulta);

    class PDF extends FPDF
    {
        public $mostrarCarreraEnFilas = true;

        function Header()
        {
            global $aula;
            $this->Image('../../img/logo-tran.png', 10, 5, 25);
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
            $this->Cell(0, 5, utf8_decode("$dia_espanol - $fechaActual"), 0, 1, 'R');
            $this->Cell(0, 3, utf8_decode("Hora: " . date('H:i:s')), 0, 1, 'R');
            // $this->Ln(10);

            $this->SetLeftMargin(2);

            // Si hay una sola aula, muéstrala en el header y no en las filas
            if ($aula !== "Todas") {
                $this->Cell(0, 5, utf8_decode("Aula: " . $aula), 0, 1, 'R');
                $this->mostrarCarreraEnFilas = false;
                $this->Ln(10);
            }

            // Título
            $this->SetFont('Arial', 'B', 15);
            $this->Cell(0, 10, utf8_decode("Horario de la semana por Aula"), 0, 1, 'C');
            $this->Ln(3);
            // Encabezado de tabla
            $this->SetFillColor(228, 100, 0);
            $this->SetTextColor(255, 255, 255);
            $this->SetDrawColor(163, 163, 163);
            $this->SetFont('Arial', 'B', 11);
            $this->Cell(20, 10, utf8_decode('Dia.'), 1, 0, 'C', 1);
            $this->Cell(10, 10, utf8_decode('Per.'), 1, 0, 'C', 1);
            $this->Cell(24, 10, utf8_decode('Horario'), 1, 0, 'C', 1);
            $this->Cell(63, 10, utf8_decode('Docente'), 1, 0, 'C', 1);
            $this->Cell(18, 10, utf8_decode('Materia'), 1, 0, 'C', 1);
            $this->Cell(12, 10, utf8_decode('Nivel'), 1, 0, 'C', 1);
            $this->Cell(55, 10, utf8_decode('Carrera'), 1, 1, 'C', 1);

            // if ($this->mostrarCarreraEnFilas) {
            // } else {
            //     $this->Cell(0, 10, '', 0, 1); // Asegurarse de que el diseño esté alineado cuando no se muestra la carrera
            // }
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
            $pdf->Cell(20, 6, utf8_decode($fila['Dia']), 1, 0, "C");
            $pdf->Cell(10, 6, utf8_decode($fila['Periodo']), 1, 0, "C");
            $pdf->Cell(24, 6, utf8_decode($fila['HoraInicio'] . " - " . $fila['HoraFin']), 1, 0, "C");
            $pdf->Cell(63, 6, utf8_decode($fila['NombreDocente'] . " " . $fila['ApellidoDocente']), 1, 0, "C");
            $pdf->Cell(18, 6, utf8_decode($fila['CodigoMateria']), 1,0,"C");
            $pdf->Cell(12, 6, utf8_decode($fila['NivelMateria']), 1, 0, "C");
            $pdf->Cell(55, 6, utf8_decode($fila['NombreCarrera']), 1, 0, "C");
            $pdf->Ln();
        }
    }

    $pdf->Output('Reporte.pdf', 'I'); // nombre del archivo, modo de salida
} else {
    echo "Faltan parámetros en la solicitud.";
}


//sistema y contaduria 