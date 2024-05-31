<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Docentes</title>
</head>

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            background-color: #008b8b;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        #docentesCRUD {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #008b8b;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Formulario de búsqueda */
        form {
            margin-bottom: 20px;
        }

        form input[type="text"],
        form input[type="date"],
        form input[type="email"],
        form button,
        form select {
            display: block;
            width: calc(100% - 22px);
            margin-bottom: 10px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        form button {
            width: auto;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0056b3;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            margin-bottom: 5px;
            display: block;
        }

        /* Tabla de docentes */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 1.1rem;

        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f8f8f8;
            color: #111;
            font-weight: 900;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:nth-child(odd) {
            color: #fff;
        }

        table tbody tr:hover {
            background-color: #ff0000;
            color: #fff;
        }

        button {
            padding: 5px 10px;
            margin: 0 2px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.editar {
            background-color: #ffc107;
            color: #fff;
        }

        button.editar:hover {
            background-color: #e0a800;
        }

        button.eliminar {
            background-color: #dc3545;
            color: #fff;
        }

        button.eliminar:hover {
            background-color: #c82333;
        }

        /* Estilos adicionales */
        #buscarDocenteForm input[type="text"] {
            width: calc(50% - 22px);
            display: inline-block;
            margin-right: 10px;
        }

        #buscarDocenteForm button {
            width: calc(100% - 22px);
        }

        .datalist {
            width: 200px;
        }
    </style>
    <div id="docentesCRUD spanOscuro">
        <h2>Gestión de Docentes</h2>
        <form id="docenteForm">
            <!-- <input type="hidden" id="docenteID" name="docenteID"> -->
            <div>
                <label for="agregarNombre">Nombre del Docente:</label>
                <input type="text" id="agregarNombre" name="nombre" required>
            </div>
            <div>
                <label for="agregarApellido">Apellido del Docente:</label>
                <input type="text" id="agregarApellido" class="apellido" name="apellido" required>
            </div>

            <label for="carrera">Carrera:</label>
            <input list="list-carrera" id="carrera" name="carrera" type="text">
            <datalist id="list-carrera" class="datalist">
                <option value="Mecanica Industrial">
                <option value="Mecanica Automotriz">
                <option value="Electronica">
                <option value="Electricidad Industrial">
                <option value="Construccion Civil">
                <option value="Quimica">
                <option value="Contaduria General">
                <option value="Sistemas Informaticos">
            </datalist>




            <label for="dia">Dia:</label>
            <input list="periodo-dia" id="dia" name="dia" type="text">
            <datalist id="periodo-dia" class="datalist">
                <option value="Lunes">
                <option value="Martes">
                <option value="Miércoles">
                <option value="Jueves">
                <option value="Viernes">
            </datalist>

            <label for="periodoInicio">Periodo Inicio:</label>
            <input list="inicio-periodo" id="periodoInicio" name="periodoInicio" type="text">
            <datalist id="inicio-periodo" class="datalist">
                <option value="1">
                <option value="2">
                <option value="3">
                <option value="4">
                <option value="5">
                <option value="6">
            </datalist>


            <div>
                <label for="materia">Materia:</label>
                <input type="text" id="materia" name="materia" required>
            </div>
            <label for="agregarNivel">Nivel:</label>
            <input list="periodo-nivel" id="agregarNivel" name="nivel" type="text">
            <datalist id="periodo-nivel" class="datalist">
                <option value="100">
                <option value="200">
                <option value="300">
                <option value="400">
                <option value="500">
                <option value="600">
            </datalist>
            <div>
                <label for="aula">Aula:</label>
                <input type="text" id="aula" name="aula" required>
            </div>
            <div>
                <button type="submit" id="btn-submit">Agregar Informacion</button>
            </div>
        </form>
    </div>
    <script src="app.js"></script>
</body>

</html>