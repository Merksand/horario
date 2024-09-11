<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../database.php';

if (!empty($_GET['nombre']) || !empty($_GET['apellido']) || !empty($_GET['materia']) || !empty($_GET['aula'])) {
    $nombre = $_GET["nombre"] ?? '';
    $apellido = $_GET["apellido"] ?? '';
    $materia = $_GET["materia"] ?? '';
    $aula = $_GET["aula"] ?? '';

    if (!empty($aula)) {
        // Consulta para Aulas
        $consultaAulas = 'SELECT * FROM Aulas WHERE Nombre LIKE "%' . $conexion->real_escape_string($aula) . '%"';
        $resultadoAulas = $conexion->query($consultaAulas);

        // Generar tabla HTML para Aulas
        if ($resultadoAulas) {
            if ($resultadoAulas->num_rows > 0) {
                $tablaHTML = '<thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>';

                while ($fila = $resultadoAulas->fetch_assoc()) {
                    $tablaHTML .= '<tr data-aula-id = "' . $fila['AulaID'] . '">
                                    <td>' . $fila['Nombre'] . '</td>
                                    <td>
                                        <button class="editar" onclick="editarAula(' . $fila['AulaID'] . ')">✏️</button>
                                        <button class="eliminar" onclick="eliminarAula(' . $fila['AulaID'] . ')">🗑️</button>
                                    </td>
                                </tr>';
                }

                $tablaHTML .= '</tbody>';

                echo $tablaHTML;
            } else {
                echo 'No se encontraron aulas.';
            }
        } else {
            echo "Error en la consulta: $conexion->error";
        }
    } else if (!empty($nombre) || !empty($apellido)) {
        // Consulta para Docentes
        $consulta = "SELECT
                        GestionSemestre.GestionSemestreID AS GestionSemestreID,
                        DocenteMateria.DocenteMateriaID as DocenteMateriaID,    
                        Docentes.DocenteID AS id,
                        Docentes.Nombre AS nombre,
                        Docentes.Apellido AS apellido,
                        Materias.Nombre AS materia,
                        Materias.Nivel AS nivel,
                        Aulas.Nombre AS aula,
                        Carreras.Nombre AS nombreCarrera,
                        DATE_FORMAT(HoraInicio, '%H:%i') AS horaInicio,
                        DATE_FORMAT(HoraFin, '%H:%i') AS horaFin,
                        Horarios.Dia AS dia,
                        Horarios.HorarioID AS horarioID,
                        Materias.Paralelo AS paralelo
                    FROM
                        DocenteMateria
                        INNER JOIN Docentes ON DocenteMateria.DocenteID = Docentes.DocenteID
                        INNER JOIN Materias ON DocenteMateria.MateriaID = Materias.MateriaID
                        INNER JOIN Carreras ON Materias.CarreraID = Carreras.CarreraID
                        INNER JOIN Aulas ON DocenteMateria.AulaID = Aulas.AulaID
                        INNER JOIN Horarios ON Horarios.HorarioID = DocenteMateria.HorarioID
                        INNER JOIN GestionSemestre ON DocenteMateria.GestionSemestreID = GestionSemestre.GestionSemestreID";

        // Aplicación de filtros
        $filtros = [];
        if (!empty($nombre)) {
            $filtros[] = "Docentes.Nombre LIKE '%" . $conexion->real_escape_string($nombre) . "%'";
        }
        if (!empty($apellido)) {
            $filtros[] = "Docentes.Apellido LIKE '%" . $conexion->real_escape_string($apellido) . "%'";
        }

        if (!empty($filtros)) {
            $consulta .= ' WHERE ' . implode(' AND ', $filtros);
        }

        $consulta .= ' AND GestionSemestre.GestionSemestreID = (SELECT GestionSemestreID FROM GestionSemestre ORDER BY GestionSemestreID DESC LIMIT 1)';
        $consulta .= ' ORDER BY Horarios.HorarioID, horaInicio';

        $resultado = $conexion->query($consulta);

        // Generar tabla HTML para Docentes
        if ($resultado) {
            if ($resultado->num_rows > 0) {
                $tablaHTML = '<thead>
                                    <tr>
                                        <th>Dia</th>
                                        <th>Horas</th>
                                        <th>Nombre Completo</th>
                                        <th>Carrera</th>
                                        <th>Materia</th>
                                        <th>Nivel</th>
                                        <th>Aula</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>';

                while ($fila = $resultado->fetch_assoc()) {
                    $tablaHTML .= '<tr data-docente-materia-id="' . $fila['DocenteMateriaID'] . '">
                                        <td class="dia">' . $fila['dia'] . '</td>
                                        <td class="horaInicio">' . $fila['horaInicio'] . ' - ' . $fila['horaFin'] . '</td>
                                        <td class="nombreCompleto">' . $fila['nombre'] . ' ' . $fila['apellido'] . '</td>
                                        <td class="nombreCarrera">' . $fila['nombreCarrera'] . '</td>
                                        <td class="materia">' . $fila['materia'] . '</td>
                                        <td class="nivel">' . $fila['nivel'] . ' ' . $fila['paralelo'] . '</td>
                                        <td class="aula">' . $fila['aula'] . '</td>
                                        <td>
                                            <button class="editar" onclick="editarDocente(' . $fila['DocenteMateriaID'] . ')">✏️</button>
                                            <button class="eliminar" onclick="eliminarDocenteMateria(' . $fila['DocenteMateriaID'] . ')">🗑️</button>
                                        </td>
                                    </tr>';
                }



                $tablaHTML .= '</tbody>';

                echo $tablaHTML;
            } else {
                echo 'No se encontraron resultados.';
            }
        } else {
            echo "Error en la consulta: $conexion->error";
        }
    } else if (!empty($materia)) {
        // Consulta y tabla para materias
        $consultaMaterias = "SELECT Materias.Paralelo as para, Materias.MateriaID as MateriaID,Materias.Codigo as Codigo, Materias.Nombre as NombreMateria,Materias.Nivel as Nivel, Carreras.Nombre as NombreCarrera FROM Materias 
                            inner join Carreras on Carreras.CarreraID = Materias.CarreraID  
                            WHERE Materias.Nombre LIKE '%" . $conexion->real_escape_string($materia) . "%'" . " ORDER BY Carreras.Nombre, Materias.Nivel";
        $resultadoMaterias = $conexion->query($consultaMaterias);

        if ($resultadoMaterias) {
            if ($resultadoMaterias->num_rows > 0) {
                $tablaHTML = '<table id="tabla-materias">
                            <thead>
                                <tr>
                                    <th>Materia</th>
                                    <th>Codigo</th>
                                    <th>Nivel</th>
                                    <th>Carrera</th>
                                    <th>Opciones</th>

                                </tr>
                            </thead>
                            <tbody>';
                while ($fila = $resultadoMaterias->fetch_assoc()) {
                    $tablaHTML .= '<tr data-materia-id="' . $fila['MateriaID'] . '">
                                <td>' . $fila['NombreMateria'] . '</td>
                                <td>' . $fila['Codigo'] . '</td>
                                <td>' . $fila['Nivel'] . ' ' . $fila['para'] . '</td>
                                <td>' . $fila['NombreCarrera'] . '</td>
                                <td>
                                    <button class="editar" onclick="editarMateria(' . $fila['MateriaID'] . ')">✏️</button>
                                    <button class="eliminar" onclick="eliminarMateria(' . $fila['MateriaID'] . ')">🗑️</button>
                                </td>
                            </tr>';
                }
                $tablaHTML .= '</tbody></table>';
                echo $tablaHTML;
            } else {
                echo 'No se encontraron resultados para materias.';
            }
        } else {
            echo 'Error en la consulta: ' . $conexion->error;
        }
    }
} else {
    echo 'Parámetros de búsqueda no proporcionados.';
}

$conexion->close();
