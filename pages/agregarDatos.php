<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Datos Académicos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f5f5f5; */
            margin: 0;
            /* padding: 20px; */
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: darkcyan;
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

        .form-group input,
        .form-group select,
        .form-group {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group select {
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

        .form-group input:nth-child(n+2),
        select {
            margin-bottom: 10px;
        }

        .custom-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 20px;
            border-radius: 5px;
            color: white;
            font-family: Arial, sans-serif;
            font-size: 16px;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 999;
        }

        .custom-alert.success {
            background-color: #4CAF50;
        }

        .custom-alert.error {
            background-color: #f44336;
        }

        .custom-alert-icon {
            font-size: 24px;
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form id="form-AgregarDatos">
            <h2>Agregar Datos Académicos</h2>
            <!-- Formulario para agregar Aula -->
            <div class="form-group">
                <label for="aula">Agregar Aula:</label>
                <input type="text" id="aulas" name="nombre_aula" placeholder="Nombre del Aula, ejemplo: MA-1">
            </div>

            <!-- Formulario para agregar Docente -->
            <div class="form-group">
                <label for="docenteNombre">Agregar Docente:</label>
                <input type="text" id="docenteNombre" name="nombre_docente" placeholder="Nombre del Docente">
                <input type="text" id="docenteApellido" name="apellido_docente" placeholder="Apellido del Docente">
            </div>

            <!-- Formulario para agregar Materia -->
            <div class="form-group materia">
                <label for="carrera">Asignar Carrera:</label>
                <select id="carreras" name="carrera_materia">
                    <option value="">Seleccione la Carrera</option>
                    <option value="Sistemas Informáticos">Sistemas Informáticos</option>
                    <option value="Construcción Civil">Construcción Civil</option>
                    <option value="Contaduría General">Contaduría General</option>
                    <option value="Mecánica Automotriz">Mecánica Automotriz</option>
                    <option value="Mecánica Industrial">Mecánica Industrial</option>
                    <option value="Electrónica">Electrónica</option>
                    <option value="Química Industrial">Química Industrial</option>
                    <option value="Electricidad Industrial">Electricidad Industrial</option>
                </select>



                <input type="text" id="materiaNombre" name="nombre_materia" placeholder="Nombre de la Materia">
                <input type="text" id="materiaCodigo" name="codigo_materia" placeholder="Código de la Materia, ejemplo: PRG-102">
                <!-- <input type="number" id="materiaNivel" name="nivel_materia" placeholder="Nivel de la Materia"> -->

                <!-- <label for="filtrar-nivel">Nivel:</label> -->
                <select id="materiaNivel" name="nivel_materia">
                    <option value="">Seleccione un nivel</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                    <option value="500">500</option>
                    <option value="600">600</option>
                </select>
            </div>

            <div class="form-group">
                <h3>Agregar Nuevo Período Académico</h3>
                <div>
                    <label for="gestion">Gestión (Año):</label>
                    <input type="number" id="gestion" name="gestion" min="2024" max="2100">
                </div>
                <div>
                    <label for="semestre">Semestre:</label>
                    <select id="semestre" name="semestre">
                        <option value="1">Primer Semestre</option>
                        <option value="2">Segundo Semestre</option>
                    </select>
                </div>
                <div>
                    <label for="fecha_inicio">Fecha de Inicio:</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio">
                </div>
                <div>
                    <label for="fecha_fin">Fecha de Fin:</label>
                    <input type="date" id="fecha_fin" name="fecha_fin">
                </div>
            </div>

            <button type="submit">Agregar</button>

        </form>
    </div>

    <script>

    </script>
</body>

</html>