<?php
session_name('login');
session_start();
?>

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
            padding: 6px;
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

        .opcional {
            text-align: center;
            color: #fff;
            font-weight: bolder;
            font-size: 1.2rem;
            text-transform: uppercase;
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




    $queryAulas = "SELECT AulaID,Nombre FROM Aulas ORDER BY SUBSTRING_INDEX(Nombre, '-', 1),CAST(SUBSTRING_INDEX(Nombre, '-', -1) AS UNSIGNED)";
    $resultAulas = $conexion->query($queryAulas);
    $filtrar_aulas = "";
    while ($row = $resultAulas->fetch_assoc()) {
        $filtrar_aulas .= "<option data-aula-id = '{$row['AulaID']}' value='{$row['Nombre']}'>";
    }

    $queryHorarios = "SELECT DISTINCT Dia FROM Horarios";
    $resultHorario = $conexion->query($queryHorarios);
    $horarios = "";
    while ($row = $resultHorario->fetch_assoc()) {
        $horarios .= "<option value='{$row['Dia']}'>";
    }

    $queryObservacion = "SELECT * FROM ObservacionesDocente";
    $resultObservacion = $conexion->query($queryObservacion);
    $observaciones = "";
    while ($row = $resultObservacion->fetch_assoc()) {
        $observaciones .= "<option data-observacion-id = '{$row['ObservacionID']}' value='{$row['Descripcion']}'>";
    }


    $rol = $_SESSION['rol'];
    $usuarioID = $_SESSION['usuario_id'];

    if ($rol == 2) { // Jefe de carrera

        // Obtener las carreras asignadas al jefe de carrera
        $carrerasQuery = "SELECT CarreraID FROM JefeCarrera WHERE JefeCarreraID = $usuarioID";
        $carrerasResult = $conexion->query($carrerasQuery);

        $carreras = [];
        while ($row = $carrerasResult->fetch_assoc()) {
            $carreras[] = $row['CarreraID'];
        }

        if (count($carreras) > 0) {
            $carrerasList = implode(',', $carreras);

            // Consulta para los docentes asociados a las carreras del jefe de carrera
            $docente = "
                SELECT Docentes.DocenteID, Docentes.Nombre, Docentes.Apellido 
                FROM Docentes
                INNER JOIN DocenteMateria ON Docentes.DocenteID = DocenteMateria.DocenteID
                INNER JOIN Materias ON DocenteMateria.MateriaID = Materias.MateriaID
                WHERE Materias.CarreraID IN ($carrerasList)
                GROUP BY Docentes.DocenteID, Docentes.Nombre, Docentes.Apellido
            ";

            // Consulta para las carreras asignadas al jefe de carrera
            $carrera = "SELECT CarreraID, Nombre FROM Carreras WHERE CarreraID IN ($carrerasList)";
        } else {
            // No se muestran docentes ni carreras si no tiene asignación de carrera
            $docente = "SELECT DocenteID, Nombre, Apellido FROM Docentes WHERE 1=0";
            $carrera = "SELECT CarreraID, Nombre FROM Carreras WHERE 1=0";
        }
    } else {
        // Consultas para otros roles (como administrador)
        $docente = "SELECT DocenteID, Nombre, Apellido FROM Docentes";
        $carrera = "SELECT CarreraID, Nombre FROM Carreras";
    }

    // Ejecutar las consultas y construir las opciones de docentes y carreras
    $docenteQuery = $conexion->query($docente);
    if (!$docenteQuery) {
        die("Error en la consulta de docentes: " . $conexion->error);
    }

    $docentes = "";
    while ($row = $docenteQuery->fetch_assoc()) {
        $docentes .= "<option data-docente-id = '{$row['DocenteID']}' value='{$row['Nombre']} {$row['Apellido']}'></option>";
    }

    $carreraQuery = $conexion->query($carrera);
    if (!$carreraQuery) {
        die("Error en la consulta de carreras: " . $conexion->error);
    }

    $options = "";
    while ($row = $carreraQuery->fetch_assoc()) {
        $options .= "<option data-carrera-id = '{$row['CarreraID']}' value='{$row['Nombre']}'></option>";
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



                <label for="editModal__carrera" class="modal__label">Carrera:</label>
                <input list="editModal__list-carrera" id="editModal__carrera" name="carrera" type="text" class="modal__input">
                <datalist id="editModal__list-carrera" class="modal__datalist">
                    <?php echo $options; ?>
                </datalist>

                <label for="editModal__agregarNivel" class="modal__label">Nivel:</label>
                <input list="editModal__periodo-nivel" id="editModal__agregarNivel" name="nivel" type="text" class="modal__input" placeholder="Primero seleccione una carrera">
                <datalist id="editModal__periodo-nivel" class="modal__datalist">
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




                <label for="editModal__aula" class="modal__label">Aula:</label>
                <input list="lista-aulass" type="text" id="editModal__aula" name="aula" class="modal__input">
                <datalist id="lista-aulass">
                    <?php
                    foreach ($aulas as $aula) {
                        echo "<option value='$aula[Nombre]'>$aula[Nombre]</option>";
                    }
                    ?>
                </datalist>

                <label for="observacionID">Observación</label>
                <input type="hidden" name="observacionID" id="observacionHidden">
                <input list="lista-observaciones" type="text" id="observacion" name="observacion" placeholder="Ejemplo: Un sábado por mes">
                <datalist id="lista-observaciones">
                    <?php echo $observaciones; ?>
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

                <label for="editModalMateria__nivel" class="modal__label">Nivel:</label>
                <input list="editModalMateria__nivel-lista" type="text" id="editModalMateria__nivel" name="nivel" class="modal__input">
                <datalist id="editModalMateria__nivel-lista" class="modal__datalist">
                    <option value="100">
                    <option value="200">
                    <option value="300">
                    <option value="400">
                    <option value="500">
                    <option value="600">
                </datalist>

                <menu class="modal__menu">
                    <button type="submit" class="modal__btn modal__btn--submit">Guardar Cambios</button>
                    <button type="reset" class="modal__btn modal__btn--reset">Cancelar</button>
                </menu>
            </form>
        </dialog>


        <h2>Gestión de Docentes</h2>
        <form id="docenteForm">
            <div>
                <label for="agregarNombreCompleto">Nombre Completo del Docente:</label>
                <input type="hidden" id="docenteID1" name="docenteID1">
                <input list="listaDocentes" type="text" id="agregarNombreCompleto" data-datalist="docentes" data-hidden-id="docenteID1" name="nombre1" required>
                <datalist id="listaDocentes" class="datalist">
                    <?php echo $docentes; ?>
                </datalist>
            </div>

            <label for="turno">Turno:</label>
            <input list="list-turno" id="turno" name="turno" type="text" placeholder="Selecciona un turno">
            <datalist id="list-turno" class="datalist">
                <option value="Mañana">
                <option value="Tarde">
                <option value="Noche">
            </datalist>

            <label for="dia">Dia:</label>
            <input list="periodo-dia" id="dia" name="dia" type="text" placeholder="Selecciona un turno primero" disabled>
            <datalist id="periodo-dia" class="datalist">
                <?php echo $horarios; ?>
            </datalist>

            <label for="periodo">Periodo Inicio:</label>
            <input type="hidden" name="periodoInicioID" id="periodoInicioHidden">
            <input list="inicio-periodo" id="periodoInicio" name="periodoInicio" type="text" placeholder="Selecciona un día primero" disabled>
            <datalist id="inicio-periodo" class="datalist">
            </datalist>

            <label for="periodoFin">Periodo Fin:</label>
            <input type="hidden" name="periodoFinID" id="periodoFinHidden">
            <input list="fin-periodo" id="periodoFin" name="periodoFin" type="text" placeholder="Selecciona un periodo de inicio primero" disabled>
            <datalist id="fin-periodo" class="datalist">
            </datalist>

            <label for="carrera">Carrera:</label>
            <input type="hidden" name="carreraID" id="carreraHidden">
            <input list="lista-carrera" id="carrera" name="carrera" type="text" required>
            <datalist id="lista-carrera" class="datalist">
                <?php echo $options; ?>
            </datalist>

            <label for="agregarNivel">Nivel:</label>
            <input list="periodo-nivel" id="agregarNivel" class="gestionNivel" name="nivel" type="text" placeholder="Seleccione una carrera" disabled>
            <datalist id="periodo-nivel" class="datalist">
                <option value="100">
                <option value="200">
                <option value="300">
                <option value="400">
                <option value="500">
                <option value="600">
            </datalist>

            <div>
                <label for="materia">Materia:</label>
                <input type="hidden" name="materiaID" id="materiaHidden">
                <input list="lista-materias" type="text" id="materia" name="materia" disabled placeholder="Seleccione un nivel">
                <datalist id="lista-materias">
                </datalist>
            </div>

            <div>
                <label for="aula">Aula:</label>
                <input type="hidden" name="aulaID" id="aulaHidden">
                <input list="lista-aulas" type="text" id="aula" name="aula">
                <datalist id="lista-aulas">
                    <?php echo $filtrar_aulas; ?>
                </datalist>
            </div>
            <label for="observacionID">Observación (OPCIONAL)</label>
            <input type="hidden" name="observacionID" id="observacionHidden">
            <input list="lista-observaciones" type="text" id="observacion" name="observacion" placeholder="Ejemplo: Un sábado por mes">
            <datalist id="lista-observaciones">
                <?php echo $observaciones; ?>
            </datalist>

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
                <input type="text" id="buscarNombre" name="buscarNombre" placeholder="Nombre del docente">

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