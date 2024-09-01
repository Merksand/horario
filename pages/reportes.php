<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Reportes</title>
</head>

<body>
    <style>
        /* body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        } */

        .container {
            text-align: center;
        }

        .titulo {
            font-size: 2rem;
            margin-bottom: 2rem;
            color: #333;
        }

        .reportes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .reporte-card {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .reporte-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .reporte-card h2 {
            font-size: 1.5rem;
            color: #555;
            margin-bottom: 1rem;
        }

        .reporte-card p {
            font-size: 1rem;
            color: #777;
            margin-bottom: 2rem;
        }

        .reporte-card button {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .reporte-card button:hover {
            background-color: #0056b3;
        }
    </style>
    <div class="container">
        <h1 class="titulo">Generar Reportes</h1>
        <div class="reportes-grid">
            <div class="reporte-card">
                <h2>Reporte por Carrera</h2>
                <p>Genera un reporte de los docentes según la carrera seleccionada.</p>
                <button onclick="window.location.href='reporte_carrera.php'"><i class="fa-solid fa-file-pdf fa-lg" style="color: white;"></i></button>
            </div>
            <div class="reporte-card">
                <h2>Reporte por Aula</h2>
                <p>Genera un reporte de los docentes según el aula seleccionada.</p>
                <button onclick="window.location.href='reporte_aula.php'"><i class="fa-solid fa-file-pdf fa-lg" style="color: white;"></i></button>
            </div>
            <div class="reporte-card">
                <h2>Reporte por Fecha</h2>
                <p>Genera un reporte de los docentes según la fecha seleccionada.</p>
                <button onclick="window.location.href='reporte_fecha.php'"><i class="fa-solid fa-file-pdf fa-lg" style="color: white;"></i></button>
            </div>
            <div class="reporte-card">
                <h2>Reporte por Turno</h2>
                <p>Genera un reporte de los docentes según el turno seleccionado.</p>
                <!-- <button onclick="window.location.href='pages/assets/fpdf/PruebaV.php'"><i class="fa-solid fa-file-pdf fa-lg" style="color: white;"></i></button> -->
                <button onclick="window.open('pages/assets/fpdf/PruebaV.php', '_blank')">
                    <i class="fa-solid fa-file-pdf fa-lg" style="color: white;"></i>
                </button>

            </div>
            <div class="reporte-card">
                <h2>Lista de todos los docentes</h2>
                <p>Genera un reporte de los docentes .</p>
                <!-- <button onclick="window.location.href='pages/assets/fpdf/PruebaV.php'"><i class="fa-solid fa-file-pdf fa-lg" style="color: white;"></i></button> -->
                <button onclick="window.open('pages/assets/fpdf/PruebaV.php', '_blank')">
                    <i class="fa-solid fa-file-pdf fa-lg" style="color: white;"></i>
                </button>

            </div>
        </div>
    </div>
    <!-- <button class="iconoPdf" target="_blank"><i class="fa-solid fa-file-pdf fa-lg" style="color: #14e16d;"></i></button> -->
</body>

</html>
