<style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th,
            td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #f0f0f0;
            }

            tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            tr:hover {
                background-color: #f1f1f1;
            }
        </style>
<?php
require_once "../includes/database.php";

$query = "


    SELECT d.DocenteID,
        CONCAT(d.Nombre, ' ', d.Apellido) AS Docente,
        c.Nombre AS Carrera,
        -- Lunes
        CASE 
            WHEN MIN(CASE WHEN h.Dia = 'Lunes' AND h.Turno = 'Mañana' THEN h.HoraInicio END) IS NOT NULL
                AND MIN(CASE WHEN h.Dia = 'Lunes' AND h.Turno = 'Noche' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Lunes' AND h.Turno = 'Mañana' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Lunes' AND h.Turno = 'Mañana' THEN h.HoraFin END), '%H:%i'),
                ' ',
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Lunes' AND h.Turno = 'Noche' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Lunes' AND h.Turno = 'Noche' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Lunes' AND h.Turno = 'Mañana' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Lunes' AND h.Turno = 'Mañana' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Lunes' AND h.Turno = 'Mañana' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Lunes' AND h.Turno = 'Noche' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Lunes' AND h.Turno = 'Noche' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Lunes' AND h.Turno = 'Noche' THEN h.HoraFin END), '%H:%i')
            )
            ELSE ''
        END AS Lunes,
        -- Martes
        CASE 
            WHEN MIN(CASE WHEN h.Dia = 'Martes' AND h.Turno = 'Mañana' THEN h.HoraInicio END) IS NOT NULL
                AND MIN(CASE WHEN h.Dia = 'Martes' AND h.Turno = 'Noche' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Martes' AND h.Turno = 'Mañana' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Martes' AND h.Turno = 'Mañana' THEN h.HoraFin END), '%H:%i'),
                ' ',
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Martes' AND h.Turno = 'Noche' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Martes' AND h.Turno = 'Noche' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Martes' AND h.Turno = 'Mañana' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Martes' AND h.Turno = 'Mañana' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Martes' AND h.Turno = 'Mañana' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Martes' AND h.Turno = 'Noche' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Martes' AND h.Turno = 'Noche' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Martes' AND h.Turno = 'Noche' THEN h.HoraFin END), '%H:%i')
            )
            ELSE ''
        END AS Martes,
        -- Miércoles
        CASE 
            WHEN MIN(CASE WHEN h.Dia = 'Miércoles' AND h.Turno = 'Mañana' THEN h.HoraInicio END) IS NOT NULL
                AND MIN(CASE WHEN h.Dia = 'Miércoles' AND h.Turno = 'Noche' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Miércoles' AND h.Turno = 'Mañana' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Miércoles' AND h.Turno = 'Mañana' THEN h.HoraFin END), '%H:%i'),
                ' ',
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Miércoles' AND h.Turno = 'Noche' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Miércoles' AND h.Turno = 'Noche' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Miércoles' AND h.Turno = 'Mañana' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Miércoles' AND h.Turno = 'Mañana' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Miércoles' AND h.Turno = 'Mañana' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Miércoles' AND h.Turno = 'Noche' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Miércoles' AND h.Turno = 'Noche' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Miércoles' AND h.Turno = 'Noche' THEN h.HoraFin END), '%H:%i')
            )
            ELSE ''
        END AS Miércoles,
        -- Jueves
        CASE 
            WHEN MIN(CASE WHEN h.Dia = 'Jueves' AND h.Turno = 'Mañana' THEN h.HoraInicio END) IS NOT NULL
                AND MIN(CASE WHEN h.Dia = 'Jueves' AND h.Turno = 'Noche' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Jueves' AND h.Turno = 'Mañana' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Jueves' AND h.Turno = 'Mañana' THEN h.HoraFin END), '%H:%i'),
                ' ',
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Jueves' AND h.Turno = 'Noche' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Jueves' AND h.Turno = 'Noche' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Jueves' AND h.Turno = 'Mañana' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Jueves' AND h.Turno = 'Mañana' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Jueves' AND h.Turno = 'Mañana' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Jueves' AND h.Turno = 'Noche' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Jueves' AND h.Turno = 'Noche' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Jueves' AND h.Turno = 'Noche' THEN h.HoraFin END), '%H:%i')
            )
            ELSE ''
        END AS Jueves,
        -- Viernes
        CASE 
            WHEN MIN(CASE WHEN h.Dia = 'Viernes' AND h.Turno = 'Mañana' THEN h.HoraInicio END) IS NOT NULL
                AND MIN(CASE WHEN h.Dia = 'Viernes' AND h.Turno = 'Noche' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Viernes' AND h.Turno = 'Mañana' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Viernes' AND h.Turno = 'Mañana' THEN h.HoraFin END), '%H:%i'),
                ' ',
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Viernes' AND h.Turno = 'Noche' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Viernes' AND h.Turno = 'Noche' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Viernes' AND h.Turno = 'Mañana' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Viernes' AND h.Turno = 'Mañana' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Viernes' AND h.Turno = 'Mañana' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Viernes' AND h.Turno = 'Noche' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Viernes' AND h.Turno = 'Noche' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Viernes' AND h.Turno = 'Noche' THEN h.HoraFin END), '%H:%i')
            )
            ELSE ''
        END AS Viernes,
        -- Sábado
        CASE 
            WHEN MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Mañana' THEN h.HoraInicio END) IS NOT NULL
                AND MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Tarde' THEN h.HoraInicio END) IS NOT NULL
                AND MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Noche' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Mañana' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Mañana' THEN h.HoraFin END), '%H:%i'),
                ' ',
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Tarde' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Tarde' THEN h.HoraFin END), '%H:%i'),
                ' Y ',
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Noche' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Noche' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Mañana' THEN h.HoraInicio END) IS NOT NULL
                AND MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Tarde' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Mañana' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Mañana' THEN h.HoraFin END), '%H:%i'),
                ' ',
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Tarde' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Tarde' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Mañana' THEN h.HoraInicio END) IS NOT NULL
                AND MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Noche' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Mañana' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Mañana' THEN h.HoraFin END), '%H:%i'),
                ' Y ',
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Noche' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Noche' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Tarde' THEN h.HoraInicio END) IS NOT NULL
                AND MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Noche' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Tarde' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Tarde' THEN h.HoraFin END), '%H:%i'),
                ' ',
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Noche' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Noche' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Mañana' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Mañana' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Mañana' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Tarde' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Tarde' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Tarde' THEN h.HoraFin END), '%H:%i')
            )
            WHEN MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Noche' THEN h.HoraInicio END) IS NOT NULL
            THEN CONCAT(
                TIME_FORMAT(MIN(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Noche' THEN h.HoraInicio END), '%H:%i'), 
                ' A ', 
                TIME_FORMAT(MAX(CASE WHEN h.Dia = 'Sábado' AND h.Turno = 'Noche' THEN h.HoraFin END), '%H:%i')
            )
            ELSE ''
        END AS Sábado ,
        od.Descripcion AS Observacion
    FROM Docentes d
    JOIN 
        DocenteMateria dm ON d.DocenteID = dm.DocenteID
    JOIN 
        Materias m ON dm.MateriaID = m.MateriaID
    JOIN 
        Carreras c ON m.CarreraID = c.CarreraID
    LEFT JOIN 
        Horarios h ON dm.HorarioID = h.HorarioID
    LEFT JOIN 
        DocenteCarreraObservacion dco ON d.DocenteID = dco.DocenteID AND c.CarreraID = dco.CarreraID
    LEFT JOIN 
        ObservacionesDocente od ON dco.ObservacionID = od.ObservacionID
    -- WHERE c.Nombre = 'Electricidad Industrial'
        -- Filtrar según sea necesario, por ejemplo, por un día específico o por turno
    GROUP BY 
        d.DocenteID, c.CarreraID, od.Descripcion ;
    ";
$docentes = '';

$result = mysqli_query($conexion, $query);
while ($row = mysqli_fetch_array($result)) {
    $docentes .= '<tr> 
            <td>' . $row['Docente'] . '</td>
            <td>' . $row['Carrera'] . '</td>
            <td>' . (isset($row['Lunes']) ? $row['Lunes'] : '-') . '</td>
            <td>' . (isset($row['Martes']) ? $row['Martes'] : '-') . '</td>
            <td>' . (isset($row['Miércoles']) ? $row['Miércoles'] : '-') . '</td>
            <td>' . (isset($row['Jueves']) ? $row['Jueves'] : '-') . '</td>
            <td>' . (isset($row['Viernes']) ? $row['Viernes'] : '-') . '</td>
            <td>' . (isset($row['Sábado']) ? $row['Sábado'] : '-') . '</td>
            <td>' . (isset($row['Observacion']) ? $row['Observacion'] : '-') . '</td>
        </tr>';
}
?>

<table id="tabla-centralizador">
    <thead>
        <tr>
            <th>Docente</th>
            <th>Carrera</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sábado</th>
            <th>Observación</th>
        </tr>
    </thead>
    <tbody>
        <?php echo $docentes; ?>
    </tbody>
</table>




<script>
    alert("ESTOY EN ARCHIVO CENTRA")
    console.log(232393);
    // if ($("#table")) {
    //     $(function() {
    //         $("#table").DataTable({
    //             dom: 'Bfrtip',
    //             buttons: [{
    //                     extend: 'pdfHtml5',
    //                     text: 'Exportar a PDF',
    //                     customize: function(doc) {
    //                         var fecha = new Date();
    //                         var fechaTexto = fecha.toLocaleDateString() + ' ' + fecha.toLocaleTimeString();

    //                         doc.content.splice(0, 0, {
    //                             text: 'Fecha: ' + fechaTexto,
    //                             alignment: 'left',
    //                             margin: [20, 10] 
    //                         });
    //                     }
    //                 },
    //                 'csv', 'excel', 'print'
    //             ],
    //             "pageLength": 15,
    //             "language": {
    //                 "emptyTable": "No hay información",
    //                 "info": "Mostrando _START_ a _END_ de _TOTAL_ Categorías",
    //                 "infoEmpty": "Mostrando 0 a 0 de 0 Categorías",
    //                 "infoFiltered": "(Filtrado de _MAX_ total Categorías)",
    //                 "infoPostFix": "",
    //                 "thousands": ",",
    //                 "lengthMenu": "Mostrar _MENU_ Categorías",
    //                 "loadingRecords": "Cargando...",
    //                 "processing": "Procesando...",
    //                 "search": "Buscador:",
    //                 "zeroRecords": "Sin resultados encontrados",
    //                 "paginate": {
    //                     "first": "Primero",
    //                     "last": "Ultimo",
    //                     "next": "Siguiente",
    //                     "previous": "Anterior"
    //                 }
    //             },
    //             "responsive": true,
    //             "lengthChange": true,
    //             "autoWidth": false,

    //         }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
    //     });
    // }
</script>