<?php
require('../../pages/assets/fpdf/fpdf.php');

// if (isset($_GET['nombre']) || isset($_GET['apellido']) || isset($_GET['fecha'])) {
if (!empty($_GET['docenteID1']) && !empty($_GET['gestion']) && !empty($_GET['semestre'])) {
    $docenteID = $_GET['docenteID1'];
    $gestion = $_GET['gestion'];
    $semestre = $_GET['semestre'];
    // $carreraID = isset($_GET['carreraID']) ? $_GET['carreraID'] : null;

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
                    Horarios.Periodo AS Periodo,
                    Horarios.Dia AS Dia,
                    Aulas.Nombre AS Aula
                FROM
                    DocenteMateria
                    INNER JOIN Docentes ON DocenteMateria.DocenteID = Docentes.DocenteID
                    INNER JOIN Materias ON DocenteMateria.MateriaID = Materias.MateriaID
                    INNER JOIN Carreras ON Materias.CarreraID = Carreras.CarreraID
                    INNER JOIN Horarios ON DocenteMateria.HorarioID = Horarios.HorarioID
                    INNER JOIN Aulas ON DocenteMateria.AulaID = Aulas.AulaID
                    INNER JOIN GestionSemestre ON DocenteMateria.GestionSemestreID = GestionSemestre.GestionSemestreID
                WHERE GestionSemestre.GestionSemestreID = (SELECT GestionSemestreID FROM GestionSemestre WHERE Gestion = $gestion AND Semestre = $semestre) ";

    $consulta .= " AND DocenteMateria.DocenteID = $docenteID";

    // $consulta .= " ORDER BY Horarios.HorarioID";
    $consulta .= " ORDER BY Horarios.HorarioID, Horarios.HoraInicio ";   

    $resultado = $conexion->query($consulta);

    $docente = "SELECT Nombre,Apellido FROM Docentes WHERE DocenteID = $docenteID";
    $resultado2 = $conexion->query($docente);

    $docente = $resultado2->fetch_assoc();

    class PDF extends FPDF
    {
        public $mostrarCarreraEnFilas = true;

        function Header()
        {
            global $docente;
            global $gestion;
            global $semestre;

            $this->Image('../../img/logo-tran.png', 175, 5, 25);
            $this->SetFont('Arial', 'B', 10);

            // Establecer la zona horaria
            date_default_timezone_set("America/La_Paz");

            // Crear un array para los días de la semana en español
            $dias_espanol = array(
                'Sunday' => 'Domingo',
                'Monday' => 'Lunes',
                'Tuesday' => 'Martes',
                'Wednesday' => 'Miércoles',
                'Thursday' => 'Jueves',
                'Friday' => 'Viernes',
                'Saturday' => 'Sábado'
            );

            // Obtener la fecha y hora actual
            $fechaActual = date('Y-m-d');  // Formato YYYY-MM-DD
            $dia_ingles = date('l');       // Nombre del día en inglés
            $horaActual = date('H:i:s');   // Hora actual en formato HH:MM:SS

            // Convertir el día al español
            $dia_espanol = isset($dias_espanol[$dia_ingles]) ? $dias_espanol[$dia_ingles] : $dia_ingles;

            // Mostrar en el PDF
            $this->Cell(0, 5, utf8_decode("$dia_espanol - $fechaActual"), 0, 1, 'L');
            $this->Cell(0, 3, utf8_decode("Hora: " . $horaActual), 0, 1, 'L');

            // $this->Ln(10);
            $this->Cell(0, 5, utf8_decode("Docente: " . $docente['Nombre'] . " " . $docente['Apellido']), 0, 1, 'L');
            $this->Cell(0, 5, utf8_decode("Gestion: " . $gestion . " - Semestre: " . $semestre), 0, 1, 'L');
            // $this->Ln(10);

            // Título
            $this->SetFont('Arial', 'B', 15);
            $this->Cell(0, 10, utf8_decode("Horario de Docente"), 0, 1, 'C');
            $this->Ln(3);
            // Encabezado de tabla
            $this->SetFillColor(228, 100, 0);
            $this->SetTextColor(255, 255, 255);
            $this->SetDrawColor(163, 163, 163);
            $this->SetFont('Arial', 'B', 11);
            $this->Cell(24, 10, utf8_decode('Dia'), 1, 0, 'C', 1);
            $this->Cell(10, 10, utf8_decode('Per.'), 1, 0, 'C', 1);
            $this->Cell(24, 10, utf8_decode('Horario'), 1, 0, 'C', 1);
            // $this->Cell(63, 10, utf8_decode('Docente'), 1, 0, 'C', 1);
            $this->Cell(24, 10, utf8_decode('Materia'), 1, 0, 'C', 1);
            $this->Cell(16, 10, utf8_decode('Nivel'), 1, 0, 'C', 1);
            $this->Cell(48, 10, utf8_decode('Carrera'), 1, 0, 'C', 1);
            $this->Cell(45, 10, utf8_decode('Aula'), 1, 1, 'C', 1);
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
            $pdf->Cell(24, 6, utf8_decode($fila['Dia']), 1, 0, "C");
            $pdf->Cell(10, 6, utf8_decode($fila['Periodo']), 1, 0, "C");
            $pdf->Cell(24, 6, utf8_decode($fila['HoraInicio'] . " - " . $fila['HoraFin']), 1, 0, "C");
            // $pdf->Cell(63, 6, utf8_decode($fila['NombreDocente'] . " " . $fila['ApellidoDocente']), 1, 0, "C");
            $pdf->Cell(24, 6, utf8_decode($fila['CodigoMateria']), 1, 0, "C");
            $pdf->Cell(16, 6, utf8_decode($fila['NivelMateria']), 1, 0, "C");
            $pdf->Cell(48, 6, utf8_decode($fila['NombreCarrera']), 1, 0, "C");
            $pdf->Cell(45, 6, utf8_decode($fila['Aula']), 1, 0, "C");
            $pdf->Ln();
        }
    }

    $pdf->Output('Reporte.pdf', 'I'); // nombre del archivo, modo de salida
} else {
    echo "Faltan parámetros en la solicitud.";
}
