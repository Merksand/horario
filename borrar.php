<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Datos Académicos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group datalist {
            width: 100%;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Agregar Datos Académicos</h2>

        <!-- Formulario para agregar Aula -->
        <div class="form-group">
            <label for="aula">Agregar Aula:</label>
            <input type="text" id="aula" placeholder="Nombre del Aula">
        </div>

        <!-- Formulario para agregar Docente -->
        <div class="form-group">
            <label for="docente">Agregar Docente:</label>
            <input type="text" id="docenteNombre" placeholder="Nombre del Docente">
            <input type="text" id="docenteApellido" placeholder="Apellido del Docente">
        </div>

        <!-- Formulario para agregar Materia -->
        <div class="form-group">
            <label for="materia">Agregar Materia:</label>
            <input type="text" id="materiaNombre" placeholder="Nombre de la Materia">
            <input type="text" id="materiaCodigo" placeholder="Código de la Materia">
            <input type="number" id="materiaNivel" placeholder="Nivel de la Materia">
        </div>

        <!-- Formulario para seleccionar Carrera -->
        <div class="form-group">
            <label for="carrera">Asignar a Carrera:</label>
            <input list="carreras" id="carrera" placeholder="Seleccione la Carrera">
            <datalist id="carreras">
                <option value="Ingeniería Informática">
                <option value="Derecho">
                <option value="Medicina">
                <option value="Arquitectura">
            </datalist>
        </div>

        <!-- Formulario para agregar Horario -->
        <div class="form-group">
            <label for="dia">Día:</label>
            <input list="dias" id="dia" placeholder="Seleccione el Día">
            <datalist id="dias">
                <option value="Lunes">
                <option value="Martes">
                <option value="Miércoles">
                <option value="Jueves">
                <option value="Viernes">
                <option value="Sábado">
            </datalist>
        </div>

        <div class="form-group">
            <label for="periodo">Periodo:</label>
            <input type="number" id="periodo" placeholder="Periodo">
        </div>

        <div class="form-group">
            <label for="horaInicio">Hora de Inicio:</label>
            <input type="time" id="horaInicio">
        </div>

        <div class="form-group">
            <label for="horaFin">Hora de Fin:</label>
            <input type="time" id="horaFin">
        </div>

        <button type="submit">Agregar</button>
    </div>

</body>
</html>
