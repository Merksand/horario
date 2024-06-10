/*Construccion Civil*/
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
('Base de datos II', 'BDD-308', 300, 1),




















INSERT INTO DocenteMateria (DocenteID, MateriaID, AulaID, HorarioID) VALUES
/*100*/
(1, 3, 1, 7), 
(1, 3, 1, 8),
/*HELEN*/
(3, 4, 1, 9),
(3, 4, 1, 10),
(3, 4, 1, 11),
(4, 4, 1, 12),
/*TOLA martes*/
(4, 6, 1, 19),
(4, 6, 1, 20),
(4, 6, 1, 21),
(4, 6, 1, 22),
(4, 5, 1, 23),
(4, 5, 1, 24),
/*Gina miercoles*/
(1, 1, 1, 31),
(1, 1, 1, 32),
(1, 1, 1, 33),
(1, 1, 1, 34),
(2, 2, 1, 35),
(2, 2, 1, 36),
/*Ivar Jueves*/
(2, 7, 1, 43),
(2, 7, 1, 44),
(2, 7, 1, 45),
(2, 7, 1, 46),
(4, 5, 1, 47),
(4, 5, 1, 48),
/*Ivar Viernes*/
(2, 7, 1, 55),
(2, 7, 1, 56),
(2, 7, 1, 57),
(2, 7, 1, 58),
(2, 7, 1, 59),
(2, 7, 1, 60),
/*200*/
/*LUNES*/
(2, 9, 2, 7),
(2, 9, 2, 8),
(2, 9, 2, 9),
(2, 9, 2, 10),
(2, 9, 2, 11),
(2, 9, 2, 12),
/*MARTES*/
(3, 8, 2, 13),
(3, 8, 2, 14),
(3, 11, 2, 15),
(3, 11, 2, 16),
(3, 11, 2, 17),
(3, 11, 2, 18),
/*MIERCOLES*/
(2, 13, 2, 19),
(2, 13, 2, 20),
(2, 13, 2, 21),
(2, 13, 2, 22),
(1, 14, 2, 23),
(1, 14, 2, 24),
/*JUEVES*/
(4, 15, 2, 25),
(4, 15, 2, 26),
(1, 12, 2, 27),
(1, 12, 2, 28),
(1, 12, 2, 29),
(1, 12, 2, 30),
/*VIERNES*/
(4, 10, 2, 31),
(4, 10, 2, 32),
(4, 10, 2, 33),
(4, 10, 2, 34),
(4, 15, 2, 35),
(4, 15, 2, 36),
/*300*/
-- Lunes Noche (HorarioID: 7-12)
(1, 21, 3, 7),
(1, 21, 3, 8),  
(2, 22, 3, 9),
(2, 22, 3, 10),
(2, 22, 3, 11),
(2, 22, 3, 12),

-- Martes Noche (HorarioID: 19-24)
(1, 21, 3, 19),
(1, 21, 3, 20),
(1, 20, 3, 21),
(1, 20, 3, 22),
(1, 20, 3, 23),
(1, 20, 3, 24),

-- Miércoles Noche (HorarioID: 31-36)
(5, 19, 3, 31),
(5, 19, 3, 32),
(5, 19, 3, 33),
(5, 19, 3, 34),
(5, 23, 3, 35),
(5, 23, 3, 36),

-- Jueves Noche (HorarioID: 43-48)
(4, 18, 3, 43),
(4, 18, 3, 44),
(4, 18, 3, 45),
(4, 18, 3, 46),
(5, 19, 3, 47),
(5, 19, 3, 48),

-- Viernes Noche (HorarioID: 55-60)
(3, 16, 3, 55),
(3, 16, 3, 56),
(3, 17, 3, 57),
(3, 17, 3, 58),
(3, 17, 3, 59),
(3, 17, 3, 60);













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
