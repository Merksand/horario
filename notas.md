


## arreglar buscar y modificar la parte de actualizar codigo 

### modulo_report.php posiblemente borrar porque es inutilizable



Para ignorar todos los archivos con extensión .json:

*.json

Para ignorar todos los archivos que comienzan con json y tienen cualquier extensión:

json*

Si quieres combinar ambos patrones en una sola línea:

*.json
json*



Bien, en este video explicare de como funciona este sistema de horarios, en primer lugar esta el login que que tienen que ingresar con su usuario y contraseña que es creado por los quienen acceso total al sistema en este caso seria la parte administrativa, hay 3 roles en este sistema que son administrador, jefe de carrera y visitante, el administrador tendra acceso a todos los modulos que ofrece tiene el sistema, 
El jefe de carrera tendra acceso a los diferentes modulos con filtros para visualizar los horarios de los diferentes docentes y podra crear nuevos horarios, editarlos o eliminarlos, pero solo de las carreras que lo permita su usuario ya que los horarios de las demas carreras no podran tocarlos y eso lo configura el administrador
Estos serian los modulos que los jefes de carrera tendran acceso, se  puede filtrar por carrera, turno, nivel , nombre , fecha, pero eso es más para el uso administrativo que a veces tiene la necesidad se saber el horario de un docente o saber en que aula esta tal docente en x dia, en este modulo los jefes de carrera podran crear los horarios de los docentes que estan encargados, y solo podran crear horarios, editar o eliminar de los docentes que estan a cargo,
para crear un nuevo horario solo hay que dar click en cada casilla, y no ingresar datos nuevo, por ejemplo aqui me sale una lista de docentes y se tiene que elegir uno y no escribirlo, o si no encuentra facilmente el nombre del docente entonces puede escribir una parte de su nombre y le saldra, tiene que clickearlo y despues rellenar lo demas, aqui solo le saldra las carreras que su usuario tiene permitido configurar,
esta parte es opcional, pero se puede elegir cuantos sabados el docente viene por mes, si es un sabado por mes, 2 sabados y todos los sabados,














