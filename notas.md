INSERT INTO Materias (Nombre,Codigo,Nivel,CarreraID)
VALUES 
    ('Matematica para la informatica','MPI-101',100, 1), 
    ('Programación I','PRG-102',100, 1),
    ('Ingles Tecnico','INT -103',100, 1),
    ('Hardware de computadoras','HDC-104',100, 1),
    ('Taller de sistemas operativos','TSO-105',100, 1),
    ('Ofimatica y tecnologia multimedia','OTM-106',100, 1),
    ('Diseño y programación web I','DPW-107',100, 1);




ETD-201	Estadística 	Ing. Marcy Helen Dorado Reynolds
PRG-202	Programación II	Ing. Jorge Robbert Lozano Barro
RDC-203	Redes de computadoras I	TS. Luis Amilcar Tola Yupanqui
PDM-204	Programación  móvil I	Ing. Marcy Helen Dorado Reynolds
ADS-205	Análisis y diseño de sistemas I	Ing. Gina Faviola Borda Mendéz
DPW-206	Diseño y programación Web II	Ing. Ivar Angel Orosco Huarín
BDD-207	Base de datos I	Ing. Gina Faviola Borda Mendéz
ELE-208	Emprendimiento productivo	TS. Luis Amilcar Tola Yupanqui



INSERT INTO DocenteMateria (DocenteID, MateriaID, AulaID, HorarioID) VALUES
/*300*/
/*LUNES*/
(1, 21, 3, 1),
(1, 21, 3, 2),
(2, 22, 3, 3),
(2, 22, 3, 4),
(2, 22, 3, 5),
(2, 22, 3, 6),
/*MARTES*/
(1, 21, 3, 7),
(1, 21, 3, 8),
(1, 20,3, 9),
(1, 20,3, 10),
(1, 20,3, 11),
(1, 20,3, 12),
/*MIERCOLES*/
(5, 19, 3, 13),
(5, 19, 3, 14),
(5, 19, 3, 15),
(5, 19, 3, 16),
(5, 23, 3, 17),
(5, 23, 3, 18),
/*JUEVES*/
(4, 18, 3, 19),
(4, 18, 3, 20),
(4, 18, 3, 21),
(4, 18, 3, 22),
(5, 19, 3, 23),
(5, 19, 3, 24),
/*VIERNES*/
(3, 16, 3,25),
(3, 16, 3,26),
(3, 17, 3,27),
(3, 17, 3,28),
(3, 17, 3,29),
(3, 17, 3,30);



INSERT INTO Materias (Nombre, Codigo, Nivel, CarreraID) VALUES
('Matemática para la informática', 'MPI-101', 100, 1),
('Programación I', 'PRG-102', 100, 1),
('Ingles Técnico', 'INT-103', 100, 1),
('Hardware de computadoras', 'HDC-104', 100, 1),
('Taller de sistemas operativos', 'TSO-105', 100, 1),
('Ofimática y tecnología multimedia', 'OTM-106', 100, 1),
('Diseño y programación web I', 'DPW-107', 100, 1),
('Estadística', 'ETD-201', 200, 1),
('Programación II', 'PRG-202', 200, 1),
('Redes de computadoras I', 'RDC-203', 200, 1),
('Programación móvil I', 'PDM-204', 200, 1),
('Análisis y diseño de sistemas I', 'ADS-205', 200, 1),
('Diseño y programación Web II', 'DPW-206', 200, 1),
('Base de datos I', 'BDD-207', 200, 1),
('Emprendimiento productivo', 'ELE-208', 200, 1),
('Emprendimiento productivo', 'EMP-301', 300, 1),
('Programación III', 'PRG-302', 300, 1),
('Gestión de software', 'GDS-303', 300, 1),
('Redes de computadoras II', 'RDC-304', 300, 1),
('Taller modalidad de graduación', 'TMG-305', 300, 1),
('Análisis y diseño de sistemas II', 'ADS-306', 300, 1),
('Diseño y programación web II', 'DPW-307', 300, 1),
('Base de datos II', 'BDD-308', 300, 1);







Sistema-horarios/
├── includes/
│   ├── config.php
│   ├── database.php
│   └── functions.php
├── auth/
│   └── login.php
├── layouts/
│   └── sidebar.php
├── pages/
│   ├── home.php
│   ├── profesores.php
│   ├── materias.php
│   ├── carreras.php
│   ├── horarios.php
│   └── reports.php
├── assets/
│   ├── css/
│   │   └── styles.css
│   └── js/
│       └── scripts.js
├
├
├── index.php
