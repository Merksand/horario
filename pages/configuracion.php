<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <title>Gestion de Docentes</title>
</head>

<body>
    <style>
        * {
            box-sizing: border-box;
        }

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
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            font-size: 16px;
            border: 3px solid #ddd;
            border-radius: 4px;
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
        /* #buscar-form input[type="text"] {
            width: calc(50% - 22px);
            display: inline-block;
            margin-right: 10px;
            box-sizing: border-box;
        } */

        #buscar-form button {
            /* width: calc(100% - 22px); */
        }

        .datalist {
            width: 200px;
        }

        #dialogBorrar,
        .dialogBorrarAula {
            /* position: relative; */
            margin: auto;
        }

        #dialogBorrar,
        .dialogBorrarAula {
            border: none;
            border-radius: 5px;
            bottom: 60%;
            padding: 1%;
            background: #000;
            /* z-index: 1000; */
        }

        #dialogBorrar::backdrop {
            background-color: #0007;
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
        }

        .dialogBorrarAula::backdrop {
            background-color: #0007;
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
        }



        #close {
            cursor: pointer;
            float: right;
            font-size: 2rem;
            font-weight: bolder;
            color: #aaa;
            position: relative;
            bottom: 20px;
            left: 8px;
        }

        #close:hover {
            /* color: #000; */
            filter: brightness(.6);
        }

        .opciones {
            display: flex;
            padding: 2%;
            user-select: none;
            grid-auto-flow: row;
            gap: 30px;
        }

        @media (max-width: 768px) {
            .desicion {
                flex-direction: column;
                align-items: center;
            }
        }

        /** CSS para el modal BORRAR */
        /* Estilos para el botón de abrir el modal */
        .btn {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Estilos para el dialogo modal */
        .modal {
            width: 80%;
            max-width: 600px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: auto;
        }

        .modal::backdrop {
            background-color: #0007;
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
        }

        .modal__title {
            margin-top: 0;
        }

        .modal__label {
            display: block;
            margin: 15px 0 5px;
        }

        .modal__input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .modal__menu {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .modal__btn {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .modal__btn--submit {
            background-color: #4CAF50;
            color: white;
        }

        .modal__btn--reset {
            background-color: #f44336;
            color: white;
        }

        /* Estilos para el sweet */
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

        /* form {
            max-width: 600px;
            margin: 20px auto;
            padding: 10px;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        } */


        .busqueda-seccion {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
        }

        .busqueda-seccion h3 {
            margin-top: 0;
            margin-bottom: 6px;
            font-size: 18px;
            /* color: #333; */
        }



        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }


        .busqueda-seccion,
        #docenteForm input {
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        .busqueda-seccion .docente {
            width: 30%;
            padding: 8px;
            margin-top: 8px;
            margin-bottom: 12px;
            border: 10px solid #a3c;
            border-radius: 4px;
        }

        #buscar-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        #buscarDocente {
            grid-column: span 2;
        }

        /* .opciones {
            user-select: none;
        } */
        .dialogBorrarAula__title {
            color: #fff;
            text-align: center;
        }

        @media (max-width: 600px) {
            #buscar-form {
                /* display: grid; */
                grid-template-columns: 1fr;
            }

            #buscarDocente {
                grid-column: span 1;
            }
        }
    </style>
    <?php
    include '../includes/database.php';


    $sql = "SELECT Nombre FROM Carreras";
    $result = $conexion->query($sql);

    $options = "";
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='{$row['Nombre']}'></option>";
    }


    $sql2 = "SELECT Nombre,Nivel,Paralelo FROM materias";
    $result = $conexion->query($sql2);
    $materias = [];
    while ($row = $result->fetch_assoc()) {
        $materias[] = $row;
    }

    $sql3 = "SELECT Nombre FROM Aulas ORDER BY SUBSTRING_INDEX(Nombre, '-', 1),CAST(SUBSTRING_INDEX(Nombre, '-', -1) AS UNSIGNED)";
    $result = $conexion->query($sql3);
    $aulas = [];
    while ($row = $result->fetch_assoc()) {
        $aulas[] = $row;
    }



    $queryAulas = "SELECT Nombre FROM Aulas ORDER BY SUBSTRING_INDEX(Nombre, '-', 1),CAST(SUBSTRING_INDEX(Nombre, '-', -1) AS UNSIGNED)";
    $result = $conexion->query($queryAulas);
    $filtrar_carrera = "";
    while ($row = $result->fetch_assoc()) {
        $filtrar_carrera .= "<option value='{$row['Nombre']}'>{$row['Nombre']}</option>";
    }


    $conexion->close();
    ?>
    <div id="docentesCRUD spanOscuro">
        <dialog id="dialogBorrar">
            <span id="close">&times;</span>
            <div class="opciones">
                <div>
                    <button class="eliminar eliminarRegistro">Eliminar Registro</button>
                </div>
                <!-- <div>
                    <button class="eliminar eliminarTodoDocente">Eliminar Docente y todos sus registros</button>
                </div> -->
            </div>
        </dialog>

        <dialog id="editModalDocente" class="modal">
            <form method="dialog" id="editModal__form" class="modal__form">
                <h2 class="modal__title">Editar Docente y Horario</h2>
                <input type="hidden" id="editModal__docenteMateriaID" name="docenteMateriaID">

                <label for="editModal__nombre" class="modal__label">Nombre:</label>
                <input type="text" id="editModal__nombre" name="nombre" class="modal__input">

                <label for="editModal__apellido" class="modal__label">Apellido:</label>
                <input type="text" id="editModal__apellido" name="apellido" class="modal__input">
<!-- 
                <label for="editModal__dia" class="modal__label">Día:</label>
                <input list="editModal__periodo-dia" id="editModal__dia" name="dia" type="text" class="modal__input">
                <datalist id="editModal__periodo-dia" class="modal__datalist">
                    <option value="Lunes">
                    <option value="Martes">
                    <option value="Miercoles">
                    <option value="Jueves">
                    <option value="Viernes">
                    <option value="Sabado">
                </datalist> -->

                <!-- <label for="editModal__periodoInicio" class="modal__label">Periodo:</label>
                <input list="editModal__inicio-periodo" id="editModal__periodoInicio" name="periodoInicio" type="text" class="modal__input">
                <datalist id="editModal__inicio-periodo" class="modal__datalist">
                    <option value="1">
                    <option value="2">
                    <option value="3">
                    <option value="4">
                    <option value="5">
                    <option value="6">
                </datalist> -->


                <label for="editModal__carrera" class="modal__label">Carrera:</label>
                <input list="editModal__list-carrera" id="editModal__carrera" name="carrera" type="text" class="modal__input">
                <datalist id="editModal__list-carrera" class="modal__datalist">
                    <?php echo $options; ?>
                </datalist>

                <label for="editModal__agregarNivel" class="modal__label">Nivel:</label>
                <input list="editModal__periodo-nivel" id="editModal__agregarNivel" name="nivel" type="text" class="modal__input" placeholder="Primero seleccione una carrera">
                <datalist id="editModal__periodo-nivel" class="modal__datalist" >
                    <option value="100">
                    <option value="200">
                    <option value="300">
                    <option value="400">
                    <option value="500">
                    <option value="600">
                </datalist>

                <label for="editModal__materia-input" class="modal__label">Materia:</label>
                <input list="editModal__materia" id="editModal__materia-input" name="materia" type="text" class="modal__input" disabled placeholder="Seleccione un nivel y carrera">
                <datalist id="editModal__materia">
                </datalist>





                <!-- <label for="editModal__materia-input" class="modal__label">Materia:</label>
                <input list="editModal__materia" id="editModal__materia-input" name="materia" type="text" class="modal__input" disabled>
                <datalist id="editModal__materia" class="modal__datalist">
                </datalist> -->



                <!-- <label for="editModal__materia-input" class="modal__label">Materia:</label> -->

                <!-- <input  list="editModal__materia" id="editModal__materia-input" name="materia" type="hidden" class="modal__input" disabled> -->
                <!-- <datalist id="editModal__materia" class="modal__datalist"> -->
                <!--  -->
                <!-- </datalist> -->

                <label for="editModal__aula" class="modal__label">Aula:</label>
                <input list="lista-aulass" type="text" id="editModal__aula" name="aula" class="modal__input">
                <datalist id="lista-aulass">
                    <?php
                    foreach ($aulas as $aula) {
                        echo "<option value='$aula[Nombre]'>$aula[Nombre]</option>";
                    }
                    ?>
                </datalist>





                <menu class="modal__menu">
                    <button type="submit" class="modal__btn modal__btn--submit">Guardar Cambios</button>
                    <button type="reset" class="modal__btn modal__btn--reset">Cancelar</button>
                </menu>
            </form>
        </dialog>




        <dialog id="editModalAula" class="modal">
            <form method="dialog" id="editModalAula__form" class="modal__form">
                <h2 class="modal__title">Editar Aula</h2>
                <input type="hidden" id="editModalAula__docenteMateriaID" name="docenteMateriaID">

                <label for="editModalAula__nombre" class="modal__label">Nombre:</label>
                <input type="text" id="editModalAula__nombre" name="nombre" class="modal__input">


                <menu class="modal__menu">
                    <button type="submit" class="modal__btn modal__btn--submit">Guardar Cambios</button>
                    <button type="reset" class="modal__btn modal__btn--reset">Cancelar</button>
                </menu>
            </form>
        </dialog>

        <dialog class="dialogBorrarAula">
            <!-- <span id="close">&times;</span> -->
            <h3 class="dialogBorrarAula__title">¿Está seguro?</h3>
            <div class="opciones">
                <div>
                    <button class="eliminar eliminarRegistro eliminarAula">SI</button>
                </div>
                <div>
                    <button class="eliminar eliminarTodoDocente noEliminarAula">NO</button>
                </div>
            </div>
        </dialog>


        <dialog id="editModalMateria" class="modal">
            <form method="dialog" id="editModalMateria__form" class="modal__form">
                <h2 class="modal__title">Editar Materia</h2>
                <input type="hidden" id="editModalMateria__materiaID" name="materiaID">

                <label for="editModalMateria__nombre" class="modal__label">Nombre:</label>
                <input type="text" id="editModalMateria__nombre" name="nombre" class="modal__input">

                <label for="editModalMateria__codigo" class="modal__label">Código:</label>
                <input type="text" id="editModalMateria__codigo" name="codigo" class="modal__input">
<!-- 
                <label for="editModalMateria__nivel" class="modal__label">Nivel:</label>
                <input type="text" id="editModalMateria__nivel" name="nivel" class="modal__input"> -->

                <menu class="modal__menu">
                    <button type="submit" class="modal__btn modal__btn--submit">Guardar Cambios</button>
                    <button type="reset" class="modal__btn modal__btn--reset">Cancelar</button>
                </menu>
            </form>
        </dialog>


        <h2>Gestión de Docentes</h2>
        <form id="docenteForm">
            <input type="hidden" id="docenteID" name="docenteID">
            <div>
                <label for="agregarNombre">Nombre del Docente:</label>
                <input type="text" id="agregarNombre" name="nombre">
            </div>
            <div>
                <label for="agregarApellido">Apellido del Docente:</label>
                <input type="text" id="agregarApellido" class="apellido" name="apellido">
            </div>

            <label for="carrera">Carrera:</label>
            <input list="list-carrera" id="carrera" name="carrera" type="text">
            <datalist id="list-carrera" class="datalist">
                <option value="Sistemas Informaticos">
                <option value="Construccion Civil">
                <option value="Contaduria General">
                <option value="Mecanica Automotriz">
                <option value="Electronica">
                <option value="Quimica Industrial">
                <option value="Mecanica Industrial">
                <option value="Electricidad Industrial">
            </datalist>

            <!-- <label for="periodo">Periodo:</label>
            <input list="list-periodo" id="periodo" name="periodo" type="text">
            <datalist id="list-periodo" class="datalist">
                <option value="18:30 - 19:10">
                <option value="19:10 - 19:50">
                <option value="19:50 - 20:30">
                <option value="20:30 - 21:10">
                <option value="21:10 - 21:50">
                <option value="21:50 - 22:30">
            </datalist> -->

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


            <label for="dia">Dia:</label>
            <input list="periodo-dia" id="dia" name="dia" type="text">
            <datalist id="periodo-dia" class="datalist">
                <option value="Lunes">
                <option value="Martes">
                <option value="Miércoles">
                <option value="Jueves">
                <option value="Viernes">
            </datalist>



            <div>
                <label for="materia">Materia:</label>
                <input list="lista-materias" type="text" id="materia" name="materia">
                <!-- <input list="lista-materias" type="text" id="materia" name="materia" placeholder="Nombre de la materia" style="width: 250px;"> -->
                <datalist id="lista-materias">
                    <?php
                    if ($materias) {
                        foreach ($materias as $materia) {

                            echo "<option value='$materia[Nombre]'>$materia[Nivel] $materia[Paralelo]</option>";
                        }
                    }
                    ?>
                </datalist>



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
                <input list="lista-aulas" type="text" id="aula" name="aula">


                <datalist id="lista-aulas">
                    <?php
                    foreach ($aulas as $aula) {
                        echo "<option value='$aula[Nombre]'>$aula[Nombre]</option>";
                    }
                    ?>
                </datalist>


            </div>
            <div>
                <button type="submit" id="btn-submit">Agregar Informacion</button>
            </div>
        </form>

        <!-- Formulario de búsqueda -->
        <h2>Buscar y Modificar</h2>
        <br>
        <form id="buscar-form">
            <div class="busqueda-seccion docente">
                <h3>Buscar Docente</h3>
                <input type="text" id="buscarNombre" name="buscarNombre" placeholder="Nombre del docente" required>
                <input type="text" id="buscarApellido" name="buscarApellido" placeholder="Apellido del docente">
            </div>

            <div class="busqueda-seccion">
                <h3>Buscar Aula o Materia</h3>
                <input type="text" id="buscarAula" name="buscarAula" placeholder="Nombre del aula">
                <input type="text" id="buscarMateria" name="buscarMateria" placeholder="Nombre de la materia">
            </div>

            <!-- <div class="busqueda-seccion"> -->
            <!-- <h3>Materias</h3> -->
            <!-- </div> -->

            <button type="submit" id="buscarDocente">Buscar</button>
        </form>



        <table id="tabla-docentes">
            <!-- <thead>
                <tr>
                    <th>Dia</th>
                    <th>Horas</th>
                    <th>Nombre Completo</th>
                    <th>Materia</th>
                    <th>Carrera</th>
                    <th>Nivel</th>
                    <th>Aula</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody> -->
        </table>
    </div>
    <script src="assets/js/script.js"></script>
</body>

</html>