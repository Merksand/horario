<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Docentes</title>
</head>

<body>
    <!-- docentes.php -->
    <style>
        /* Estilos generales */
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
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f8f8f8;
            color: #333;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
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
        .datalist{
            width: 200px;
        }
    </style>
    <div id="docentesCRUD spanOscuro">
        <h2>Gestión de Docentes</h2>

        <!-- Formulario de búsqueda -->
        <form id="buscarDocenteForm">
            <input type="text" id="buscarNombre" name="buscarNombre" placeholder="Nombre del docente">
            <input type="text" id="buscarApellido" name="buscarApellido" placeholder="Apellido del docente">
            <button type="submit" id="buscar" >Buscar</button>
        </form>

        <!-- Formulario de registro y actualización de docentes -->
        <form id="docenteForm">
            <input type="hidden" id="docenteID" name="docenteID">
            <div>
                <label for="nombre">Nombre del Docente:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div>
                <label for="apellido">Apellido del Docente:</label>
                <input type="text" class="apellido" name="apellido" required>
            </div>
            <!-- <div>
                <label for="carrera">Carrera:</label>
                <input type="text" id="carrera" name="carrera" required>
            </div> -->


            <label for="navegador">Carrera:</label>
            <input list="carrera" id="navegador" name="navegador" type="text">
            <datalist id="carrera" class="datalist">
                <option value="Mecanica Industrial">
                <option value="Mecanica Automotriz">
                <option value="Electronica">
                <option value="Electricidad Industrial">
                <option value="Construccion Civil">
                <option value="Quimica">
                <option value="Contaduria General">
                <option value="Sistemas Informaticos">
            </datalist>

            <div>
                <label for="materia">Materia:</label>
                <input type="text" id="materia" name="materia" required>
            </div>
            <div>
                <label for="nivel">Nivel:</label>
                <input type="text" id="nivel" name="nivel" required>
            </div>
            <div>
                <label for="aula">Aula:</label>
                <input type="text" id="aula" name="aula" required>
            </div>
            <div>
                <button type="submit" id="btn-submit">Guardar</button>
            </div>
        </form>

        <!-- Tabla de docentes -->
        <table id="docentesTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Materia</th>
                    <th>Nivel</th>
                    <th>Aula</th>
                    <th>Carrera</th>
                </tr>
            </thead>
            <tbody>
                <!-- Datos de docentes se cargarán aquí -->
            </tbody>
        </table>
    </div>

</body>

</html>