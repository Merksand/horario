use Instituto2;

INSERT INTO Docentes (Nombre, Apellido)
VALUES
    ('Gina Faviola', 'Borda Mendez'),
    ('Ivar Angel', 'Orosco Huarín'),
    ('Marcy Helen', 'Dorado Reynolds'),
    ('Luis Amilcar', 'Tola Yupanqui'),
    ('Jorge Robbert', 'Lozano Barro'),
    -- Construccion Civil
    ('Antonio','Villarroel'),
    ('Johnny','Aleman'),
    ('Antonio', 'Roca'),
    ('Freddy', 'Franco'),
    ('Santiago', 'Montenegro'),
    ('Roberto', 'Terrezas'),
    ('Fernando', 'Flores'),
    ('Henry', 'Cespedes'),
    ('Romulo', 'Velarde'),
    ('Javier', 'Quiñones'),
    ('Roamir', 'Ledezma'),
    ('Jhonny', 'Vera'),
    -- Contabilidad
    ("Cinthya", "Añez Barboza"),
    ("María Elena", "Arteaga Forest"),
    ("Antonio", "Bustillos Terceros"),
    ("Domingo", "Cuasase Antiace"),
    ("Rosario", "Gutiérrez Pinto"),
    ("Jaime", "Pamuri"),
    ("Lizbeth Esther", "Rojas Galvez"),
    ("Jhonny", "Moscoso Taboada"),
    ("Kathya Alcira", "Vilaseca Banegas"),
    ("Francisco", "Montero Candia"),
    ("Keny", "Yáñez Dorado"),
    ("María del Carmen", "Moscoso Cuellar"),
    ("Gabriela", "Méndez Burgos"),
    -- MECANICA AUTOMOTRIZ
    ("Josue", "Sibila"),
    ("Freddy", "Bozo"),
    ("Sander", "Velasquez"),
    ("Henrry", "Salazar"),
    ("Adalid", "Rojas"),
    ("David", "Quispe"),
    ("Wilnner", "Cespedes"),
    ("Wilmer", "Galvis"),
    ("Bermanch", "Pedriel"),
    ("Eduardo", "Marquez"),
    ("Miguel Angel", "Ortiz"),
    ("Solia", "Castro"),
    ("Jose Ernesto", "Bozo"),
    ("Martin", "Salces"),
    ("Carla", "Reyes"),
    ("Reinaldo", "Velasco"),
    ("Luis A.", "Torrez"),
  --   ("Miguel", "Sejas"),
    -- ("Miguel Angel", "Gomez"),
    -- ("Esteban", "Calero"),
    -- ("Jose", "Gonzales"),
    -- ("Ester", "Toledo"),
    -- ("Hernan", "Alvarez"),
    -- ("Ivan", "Mora");
    
    -- MECANICA INDUSTRIAL
    -- Docentes Turno Mañana
	("Max", "Adhemar Mercado"),
	("Carlos", "Molina"),
	("Javier", "Torrico"),
	("Juan Carlos", "Torrez"),
	("Wilson", "Vargas"),
	("Beimar", "Varon"),
	("Hernan", "Tinta"),
	("Helen", "Cervantes"),
	("Edwin", "Vera"),
	-- Docentes Turno Noche
	("Jose", "Claure"),
	("Hernan", "Antezana"),
	("Henry", "Chuquimia"),

	-- ELECTRONICA
	('Boris', 'Carrasco A.'),
	('Danya X.', 'Miranda L.'),
	('Carlos E.', 'Ibarra O.'),
	('Limber', 'Tola Y.'),
	('Jose M.', 'Rojas'),
	('Jose L.', 'Montoya C.'),
	('Jorge', 'Ara C.'),
	('Nadir A.', 'Chacon S.'),
	('Marizol', 'Chocopani H.'),
    
	-- QUIMICA INDUSTRIAL
    ("Lidia", "Cuellar Nuñez"),
    ("Irma", "Carrillo Velasco"),
    ("Graciela", "Columba Galviz"),
    ("Juan Luis", "Mollo Mamani"),
    ("Mario", "Sánchez Villarroel"),
    ("Carlos", "Peredo Parada"),
    ("Alba Duaneth", "Rocabado Mendieta"),
    ("Henry", "Arancibia Guzmán"),
    ("Fabiola", "Coca Perez"),
    ("Golwin", "Román Melgar"),
    ("Francheskoly", "Montaño Saucedo"),

	-- ELECTRICIDAD INDUSTRIAL
    ('Marco Antonio', 'Chacón Paniagua'),
    ('Daniel', 'Zeballos Pérez'),
    ('Jorge Julio', 'Nuñez Rojas'),
    ('Freddy Valentín', 'Navarro Campoverde'),
    ('Alejandro L.', 'Fernandez'),
    ('Denisse Abigail', 'Rodríguez Rosas'),
    ('Fausto Enrique', 'Valdez Jordan'),
    ('Rolando', 'Salvatierra Mercado'),
    ('Omar Fernando', 'Magne Blanco'),
    ('Jose Luis', 'Guerrero Villapando'),
    ('Galo Alberto', 'Balbontin Saucedo'),
    ('Jorge', 'Vásquez Soliz'),
    ('Jorge', 'Ara Céspedes');

    

    


INSERT INTO Carreras (Nombre) VALUES 
    ('Sistemas Informaticos'),
    ('Construccion Civil'),
    ('Contaduria General'),
    ('Mecanica Automotriz'),
    ('Mecanica Industrial'),
    ('Electronica'),
    ('Quimica Industrial'),
    ('Electricidad Industrial');


    

INSERT INTO Materias (Nombre, Codigo, Nivel, CarreraID,SubNivel) VALUES
('Matemática para la informática', 'MPI-101', 100, 1,NULL),
('Programación I', 'PRG-102', 100, 1,NULL),
('Ingles Técnico', 'INT-103', 100, 1,NULL),
('Hardware de computadoras', 'HDC-104', 100, 1,NULL),
('Taller de sistemas operativos', 'TSO-105', 100, 1,NULL),
('Ofimática y tecnología multimedia', 'OTM-106', 100, 1,NULL),
('Diseño y programación web I', 'DPW-107', 100, 1,NULL),
('Estadística', 'ETD-201', 200, 1,NULL),
('Programación II', 'PRG-202', 200, 1,NULL),
('Redes de computadoras I', 'RDC-203', 200, 1,NULL),
('Programación móvil I', 'PDM-204', 200, 1,NULL),
('Análisis y diseño de sistemas I', 'ADS-205', 200, 1,NULL),
('Diseño y programación web II', 'DPW-206', 200, 1,NULL),
('Base de datos I', 'BDD-207', 200, 1,NULL),
('Emprendimiento productivo', 'EMP-208', 200, 1,NULL),
('Emprendimiento productivo', 'EMP-301', 300, 1,NULL),
('Programación III', 'PRG-302', 300, 1,NULL),
('Gestión de software', 'GDS-303', 300, 1,NULL),
('Redes de computadoras II', 'RDC-304', 300, 1,NULL),
('Taller modalidad de graduación', 'TMG-305', 300, 1,NULL),
('Análisis y diseño de sistemas II', 'ADS-306', 300, 1,NULL),
('Diseño y programación web III', 'DPW-307', 300, 1,NULL),
('Base de datos II', 'BDD-308', 300, 1,NULL),
-- Construccion Civil
-- Nivel 100 A
('Física para la construcción', 'FIS-100', 100, 2,NULL), -- TODO
('Dibujo técnico', 'DIB-100', 100, 2,NULL), -- TODO
('Materiales de construcción', 'MAC-100', 100, 2,NULL), -- TODO
('Ingles técnico I', 'ITE-100', 100, 2,NULL),  -- TODO
('Seguridad industrial y medio ambiente', 'SIM-100', 100, 2,NULL), -- TODO
('Matemática para la construcción', 'MAT-100', 100, 2,NULL), -- TODO

-- -- Nivel 100 B
-- ('Materiales de construcción', 'MAC-100', 100, 2,NULL), -- TODO
-- ('Ingles técnico I', 'ITE-100', 100, 2,NULL), -- TODO
-- ('Seguridad industrial y medio ambiente', 'SIM-100', 100, 2,NULL), -- TODO
-- ('Dibujo técnico', 'DIB-100', 100, 2,NULL), -- TODO
-- ('Física para la construcción', 'FIS-100', 100, 2,NULL), -- TODO
-- ('Matemática para la construcción', 'MAT-100', 100, 2,NULL), -- TODO

-- Nivel 200
('Procesos constructivos I', 'PCO-200', 200, 2,NULL),
('Hidraulica', 'HID-200', 200, 2,NULL),
('Ingles técnico II', 'ITE-200', 200, 2,NULL),
('Estructuras isostaticas', 'EIS-200', 200, 2,NULL),
('Dibujo constructivo asistido por computadora I', 'DIB-200', 200, 2,NULL),
('Mecanica de suelos I', 'MES-200', 200, 2,NULL),

-- Nivel 300 A
('Resistencia de materiales', 'RDM-300', 300, 2,NULL), -- TODO
('Tecnología del hormigón', 'THO-300', 300, 2,NULL),-- TODO
('Mecanica de suelos II', 'MES-300', 300, 2,NULL), -- TODO
('Procesos constructivos II', 'PCO-300', 300, 2,NULL), -- TODO
('Dibujo constructivo asistido por computadora II', 'DIB-300', 300, 2,NULL), -- TODO
('Topografía I', 'TOP-300', 300, 2,NULL),           -- TODO

-- Nivel 300 B
-- ('Tecnología del hormigón', 'THO-300', 300, 2,NULL), -- TODO
-- ('Dibujo constructivo asistido por computadora II', 'DIB-300', 300, 2,NULL), -- TODO
-- ('Mecanica de suelos II', 'MES-300', 300, 2,NULL), -- TODO
-- ('Procesos constructivos II', 'PCO-300', 300, 2,NULL), -- TODO
-- ('Resistencia de materiales', 'RDM-300', 300, 2,NULL), -- TODO
-- ('Topografía I', 'TOP-300', 300, 2,NULL), --TODO 

-- Nivel 400
('Hormigón armado I', 'HOA-400', 400, 2,NULL),
('Procesos constructivos III', 'PCO-400', 400, 2,NULL),
('Costos y presupuestos', 'COP-400', 400, 2,NULL),
('Maquinaria y equipo de construcción', 'MEC-400', 400, 2,NULL),
('Obras sanitarias I', 'OSA-400', 400, 2,NULL),
('Topografía II', 'TOP-400', 400, 2,NULL),

-- Nivel 500
('Obras viales', 'OVI-500', 500, 2,NULL),
('Dirección y administración de obras', 'DAO-500', 500, 2,NULL),
('Hormigón armado II', 'HOA-500', 500, 2,NULL),
('Taller de modalidad de graduación I', 'TMG-500', 500, 2,NULL),
('Obras sanitarias II', 'OSA-500', 500, 2,NULL),
('Emprendimiento productivo I', 'EMP-500', 500, 2,NULL),

-- Nivel 600
('Seguimiento de obras', 'SEO-600', 600, 2,NULL),
('Estructuras de madera', 'EMA-600', 600, 2,NULL),
('Emprendimiento productivo II', 'EMP-600', 600, 2,NULL),
('Estructuras metálicas', 'ESM-600', 600, 2,NULL),
('Instalaciones especiales en obras civiles', 'IOC-600', 600, 2,NULL),
('Taller de modalidad de graduación', 'TMG-600', 600, 2,NULL),

-- CONTABILIDAD

-- Nivel 100A
# Turno Mañana

('Contabilidad I', 'CON-101',100, 3,'A'),
('Matemática Financiera', 'MAF-102',100, 3,'A'),
('Informática Contable', 'ICO-103',100, 3,'A'),
('Administración General', 'ADG-104',100, 3,'A'),
('Legislación Laboral y Seguridad Social Aplicada', 'LSA-105',100, 3,'A'),
('Economía General Aplicada', 'EGA-106',100, 3,'A'),
('Documentos Comerciales y Mercantiles', 'DCM-107',100, 3,'A'),
('Estadística Aplicada', 'ESA-108',100, 3,'A'),
('Inglés Técnico', 'INT-109',100,3,'A'),
    
('Contabilidad I', 'CON-101',100, 3,'C'),
('Matemática Financiera', 'MAF-102',100, 3,'C'),
('Informática Contable', 'ICO-103',100, 3,'C'),
('Administración General', 'ADG-104',100, 3,'C'),
('Legislación Laboral y Seguridad Social Aplicada', 'LSA-105',100, 3,'C'),
('Economía General Aplicada', 'EGA-106',100, 3,'C'),
('Documentos Comerciales y Mercantiles', 'DCM-107',100, 3,'C'),
('Estadística Aplicada', 'ESA-108',100, 3,'C'),
('Inglés Técnico', 'INT-109',100, 3,'C'),


('Contabilidad II', 'CON-201',200, 3,NULL),
('Contabilidad de Costos I', 'COC-202',200, 3,NULL),
('Contabilidad de Sociedades', 'COS-203',200, 3,NULL),
('Contabilidad de Seguros', 'CDS-204',200, 3,NULL),
('Contabilidad Bancaria y Cooperativas', 'CBC-205',200, 3,NULL),
('Emprendimiento Productivo', 'EMP-206',200, 3,NULL),
('Sistema Tributario', 'SIT-207',200, 3,NULL),

('Contabilidad Agropecuaria', 'COA-301',300, 3,NULL),
('Contabilidad de Costos II', 'COC-302',300, 3,NULL),
('Contabilidad Gubernamental', 'COG-303',300, 3,NULL),
('Contabilidad Extractiva Minera, Petrolera y Forestal', 'CEP-304',300, 3,NULL),
('Contabilidad de Servicios (Construcción, Hotelera y Transporte)', 'CSH-305',300, 3,NULL),
('Gabinete Contable Informático', 'GCI-306',300, 3,NULL),
('Análisis e Interpretación de Estados Financieros', 'AEF-307',300, 3,NULL),
('Taller de Modalidad de Graduación', 'TMG-308',300, 3,NULL),


# Turno Noche

('Contabilidad I', 'CON-101',100, 3,'B'),
('Matemática Financiera', 'MAF-102',100, 3,'B'),
('Informática Contable', 'ICO-103',100, 3,'B'),
('Administración General', 'ADG-104',100, 3,'B'),
('Legislación Laboral y Seguridad Social Aplicada', 'LSA-105',100, 3,'B'),
('Economía General Aplicada', 'EGA-106',100, 3,'B'),
('Documentos Comerciales y Mercantiles', 'DCM-107',100, 3,'B'),
('Estadística Aplicada', 'ESA-108',100, 3,'B'),
('Inglés Técnico', 'INT-109',100,3,'B'),

('Contabilidad I', 'CON-101',100, 3,'D'),
('Matemática Financiera', 'MAF-102',100, 3,'D'),
('Informática Contable', 'ICO-103',100, 3,'D'),
('Administración General', 'ADG-104',100, 3,'D'),
('Legislación Laboral y Seguridad Social Aplicada', 'LSA-105',100, 3,'D'),
('Economía General Aplicada', 'EGA-106',100, 3,'D'),
('Documentos Comerciales y Mercantiles', 'DCM-107',100, 3,'D'),
('Estadística Aplicada', 'ESA-108',100, 3,'D'),
('Inglés Técnico', 'INT-109',100, 3,'D'),

-- MECANICA AUTOMOTRIZ

('Electricidad Automotriz I', 'ELA-100', 100, 4, NULL),
('Dibujo Tecnico Automotriz I', 'DTA-100', 100, 4, NULL),
('Metrologia Automotriz Aplicada', 'MEA-100', 100, 4, NULL),
('Higiene y Seguridad Industrial y Medio Ambiente', 'HSI-100', 100, 4, NULL),
('Motores a Gasolina I', 'MOG-100', 100, 4, NULL),
('Quimica Automotriz Aplicada', 'QUA-100', 100, 4, NULL),
('Matemática Automotriz Aplicada', 'MAA-100', 100, 4, NULL),

('Motores a Gasolina II', 'MOG-200', 200, 4, NULL),
('Chaperia y Soldadura', 'CHS-200', 200, 4, NULL),
('Dibujo Tecnico Automotriz II', 'DTA-200', 200, 4, NULL),
('Electricidad Automotriz II', 'ELA-200', 200, 4, NULL),
('Fisica Aplicada', 'FIS-200', 200, 4, NULL),
('Ingles Tecnico Aplicado', 'INT-200', 200, 4, NULL),

('Electricidad Automotriz III', 'ELA-300', 300, 4, NULL),
('Electronica Automotriz I', 'ETA-300', 300, 4, NULL),
('Termodinamica', 'TER-300', 300, 4, NULL),
('Motores a Gasolina III', 'MOG-300', 300, 4, NULL),
('Motores a Diesel I', 'MOD-300', 300, 4, NULL),
('Transmisiones I', 'TRA-300', 300, 4, NULL),

('Emprendimiento Productivo II', 'EMP-400', 400, 4, NULL),
('Electronica Automotriz II', 'ETA-400', 400, 4, NULL),
('Motores a Gasolina IV', 'MOG-400', 400, 4, NULL),
('Motores a Diesel II', 'MOD-400', 400, 4, NULL),
('Transmisiones II', 'TRA-400', 400, 4, NULL),
('Neumatica', 'NEU-400', 400, 4, NULL),
('Inyeccion a Gasolina I', 'IAG-400', 400, 4, NULL),

('Transmisiones III', 'TRA-500', 500, 4, NULL),
('Taller de Modalidad de Graduacion I', 'TMG-500', 500, 4, NULL),
('Hidraulica', 'HID-500', 500, 4, NULL),
('Inyeccion Electronica Diesel I', 'IED-500', 500, 4, NULL),
('Laboratorio Diesel I', 'LAD-500', 500, 4, NULL),
('Inyeccion a Gasolina II', 'IAG-500', 500, 4, NULL),
('Electronica Automotriz III', 'ETA-500', 500, 4, NULL),

('Maquinaria Agricola y Pesada', 'MAP-600', 600, 4, NULL),
('Inyeccion Electronica Diesel II', 'IED-600', 600, 4, NULL),
('Inyeccion a Gasolina III', 'IAG-600', 600, 4, NULL),
('Taller Modalidad de Graduacion II', 'TMG-600', 600, 4, NULL),
('Laboratorio Diesel II', 'LAD-600', 600, 4, NULL),
('Energias Alternativas', 'ENA-600', 600, 4, NULL),
('Transmisiones IV', 'TRA-600', 600, 4, NULL),

-- MECANICA INDUSTRIAL
-- Nivel 100 
("Física Aplicada y Laboratorio", "FAL-100", 100, 5, NULL),
("Seguridad Ocupacional y Medio Ambiente", "SMA-100", 100, 5, NULL),
("Dibujo Técnico y CAD", "DTC-100", 100, 5, NULL),
("Matemática Aplicada A La Mecánica", "MAM-100", 100, 5, NULL),
("Metrología Industrial", "MEI-100", 100, 5, NULL),
("Tecnología y Taller Mecánico I", "TTM-100", 100, 5, NULL),

-- Nivel 200
("Electrotecnia y Electrónica Básica", "ELE-200", 200, 5, NULL),
("Soldadura Industrial I", "SOL-200", 200, 5, NULL),
("Tratamiento Térmico y Tecnología De Los Materiales", "TTT-200", 200, 5, NULL),
("Dibujo Mecánico En CAD", "DMC-200", 200, 5, NULL),
("Tecnología y Taller Mecánico II", "TET-200", 200, 5, NULL),

-- Nivel 300
("Automatismos Eléctricos y Control", "AEC-300", 300, 5, NULL),
("Resistencia De Materiales", "REM-300", 300, 5, NULL),
("Tecnología y Taller Mecánico III", "TTM-300", 300, 5, NULL),
("Soldadura Industrial II", "SOL-300", 300, 5, NULL),
("Modelado En CAD", "MOC-300", 300, 5, NULL),

-- Nivel 400
("Automatismos Eléctricos", "AUE-400", 400, 5, NULL),
("Elementos y Mecanismos", "ELM-400", 400, 5, NULL),
("Control Numérico Computarizado I", "CNC-400", 400, 5, NULL),
("Neumática e Hidráulica", "NEH-400", 400, 5, NULL),
("Tecnología y Taller IV", "TET-400", 400, 5, NULL),
("Soldadura II", "SOL-400", 400, 5, NULL),

-- Nivel 500 Turno Mañana
("Taller De Modalidad De Graduación I", "TMG-500", 500, 5, NULL),
("Emprendimiento Productivo I", "EMP-500", 500, 5, NULL),
("Control Numérico Computarizado II", "CNC-500", 500, 5, NULL),
("Electroneumática y Electrohidráulica", "EYE-500", 500, 5, NULL),
("Diseño de Máquinas", "DIM-500", 500, 5, NULL),
("Tecnología y Taller V", "TET-500", 500, 5, NULL),
("Soldaduras Especiales", "SOE-500", 500, 5, NULL),

-- Nivel 600
("Taller De Modalidades De Graduación II", "TMG-600", 600, 5, NULL),
("Emprendimiento Productivo II", "EMP-600", 600, 5, NULL),
("Automatización Industrial", "AUI-600", 600, 5, NULL),
("Estructuras Metálicas", "ESM-600", 600, 5, NULL),
("Tecnología y Taller VI", "TET-600", 600, 5, NULL),
("Mantenimiento Industrial", "MAI-600", 600, 5, NULL),


-- ELETRONICA
('Análisis de Circuitos de Corriente Continua', 'ACC-100', 100, 6, NULL),
('Instrumentos y Componentes', 'INC-100', 100, 6, NULL),
('Instalaciones Eléctricas', 'INE-100', 100, 6, NULL),
('Seguridad Industrial y Medio Ambiente I', 'SIM-100', 100, 6, NULL),
('Álgebra y Cálculo', 'ALC-100', 100, 6, NULL),
('Física', 'FIS-100', 100, 6, NULL),
('Sistemas CAD', 'SIC-100', 100, 6, NULL),

('Análisis de Circuitos de Corriente Alterna', 'ACC-200', 200, 6, NULL),
('Electrónica Analógica', 'ELA-200', 200, 6, NULL),
('Algoritmos y Estructuras', 'ALE-200', 200, 6, NULL),
('Electrónica Digital', 'ELD-200', 200, 6, NULL),
('Inglés Técnico', 'INT-200', 200, 6, NULL),
('Seguridad Industrial y Medio Ambiente II', 'SIM-200', 200, 6, NULL),

('Operacionales y Aplicaciones', 'OAP-300', 300, 6, NULL),
('Máquinas e Instalaciones Industriales', 'MII-300', 300, 6, NULL),
('Líneas de Transmisión y Antenas', 'LTA-300', 300, 6, NULL),
('Sistemas Lógicos Programables', 'SLP-300', 300, 6, NULL),
('Programación', 'PRO-300', 300, 6, NULL),
('Emprendimiento Productivo', 'EMP-300', 300, 6, NULL),

('Electrónica Industrial', 'ELI-400', 400, 6, NULL),
('Microcontroladores I', 'MIC-400', 400, 6, NULL),
('Sistemas de Telecomunicaciones', 'STE-400', 400, 6, NULL),
('Arquitectura y Mantenimiento de Computadoras', 'AMC-400', 400, 6, NULL),
('Mantenimiento de Equipos Electrónicos', 'MEE-400', 400, 6, NULL),
('Electroacústica', 'ELA-400', 400, 6, NULL),

('Microcontroladores II', 'MIC-500', 500, 6, NULL),
('Electrónica Industrial II', 'ELI-500', 500, 6, NULL),
('Redes y Autómatas Programables I', 'RAP-500', 500, 6, NULL),
('Sistemas Neumáticos', 'SNE-500', 500, 6, NULL),
('Sistemas de Control I', 'SIC-500', 500, 6, NULL),
('Emprendimiento Productivo I', 'EMP-500', 500, 6, NULL),
('Taller de Modalidad de Graduación I', 'TMG-500', 500, 6, NULL),

('Redes y Autómatas Programables II', 'RAP-600', 600, 6, NULL),
('Robótica Industrial', 'ROI-600', 600, 6, NULL),
('Sistemas Electroneumáticos', 'SEN-600', 600, 6, NULL),
('Sistemas de Control II', 'SIC-600', 600, 6, NULL),
('Emprendimiento Productivo II', 'EMP-600', 600, 6, NULL),
('Taller de Modalidad de Graduación II', 'TMG-600', 600, 6, NULL),


-- QUIMICA INDUSTRIAL
("Inglés Técnico I", "INT-100", 100, 7, NULL),
("Química General I", "QCG-100", 100, 7, NULL),
("Elaboración de Productos Químicos", "EPQ-100", 100, 7, NULL),
("Química Orgánica I", "QCO-100", 100, 7, NULL),
("Física para Química Industrial", "FIS-100", 100, 7, NULL),
("Matemáticas para Química Industrial", "MAT-100", 100, 7, NULL),

("Química Inorgánica", "QCI-200", 200, 7, NULL),
("Higiene, Seguridad Industrial y Medio Ambiente", "HSI-200", 200, 7, NULL),
("Inglés Técnico II", "INT-200", 200, 7, NULL),
("Química Orgánica II", "QCO-200", 200, 7, NULL),
("Química General II", "QCG-200", 200, 7, NULL),
("Estadística Aplicada y Diseño de Experimentos", "EDE-200", 200, 7, NULL),

("Elaboración de Productos Químicos II", "EPQ-300", 300, 7, NULL),
("Bromatología y Microbiología Industrial I", "BMI-300", 300, 7, NULL),
("Análisis Químico I", "ANQ-300", 300, 7, NULL),
("Fisicoquímica II", "FIQ-300", 300, 7, NULL),
("Emprendimiento Productivo I", "ECI-300", 300, 7, NULL),
("Electroquímica", "ELQ-300", 300, 7, NULL),

("Termodinámica Industrial", "TDI-400", 400, 7, NULL),
("Operaciones Unitarias I", "OPU-400", 400, 7, NULL),
("Análisis Químico II", "ANQ-400", 400, 7, NULL),
("Instrumentación y Control", "IYC-400", 400, 7, NULL),
("Bromatología y Microbiología Industrial II", "BMI-400", 400, 7, NULL),
("Elaboración de Productos Químicos III", "EPQ-400", 400, 7, NULL),

("Análisis Aplicado Inorgánico", "AAI-500", 500, 7, NULL),
("Control de Calidad en la Industria", "CCI-500", 500, 7, NULL),
("Procesos Químicos Inorgánicos", "PQI-500", 500, 7, NULL),
("Taller de Modalidad de Graduación I", "TMG-500", 500, 7, NULL),
("Análisis Instrumental I", "ANI-500", 500, 7, NULL),
("Emprendimiento Productivo I", "EMP-500", 500, 7, NULL),
("Operaciones Unitarias II", "OPU-500", 500, 7, NULL),

("Procesos Químicos Orgánicos", "PQO-600", 600, 7, NULL),
("Análisis Instrumental II", "ANI-600", 600, 7, NULL),
("Operaciones Unitarias III", "OPU-600", 600, 7, NULL),
("Análisis Aplicado Orgánico", "AAO-600", 600, 7, NULL),
("Taller de Modalidad de Graduación II", "TMG-600", 600, 7, NULL),
("Emprendimiento Productivo II", "EMP-600", 600, 7, NULL),

-- ELECTRICIDAD INDUSTRIAL
('Circuitos Eléctricos I Y Laboratorio', 'CEL-100', 100, 8, NULL),
('Instalaciones Eléctricas Y Taller I', 'IET-100', 100, 8, NULL),
('Taller Electromecánico', 'TEM-100', 100, 8, NULL),
('Dibujo De Especialidad', 'DIE-100', 100, 8, NULL),
('Seguridad Industrial Y Medio Ambiente', 'SIM-100', 100, 8, NULL),
('Matemática Aplicada', 'MAA-100', 100, 8, NULL),

('Circuitos Eléctricos I Y Laboratorio', 'CEL-100', 100, 8, 'C'),
('Instalaciones Eléctricas Y Taller I', 'IET-100', 100, 8, 'C'),
('Taller Electromecánico', 'TEM-100', 100, 8, 'C'),
('Dibujo De Especialidad', 'DIE-100', 100, 8, 'C'),
('Seguridad Industrial Y Medio Ambiente', 'SIM-100', 100, 8, 'C'),
('Matemática Aplicada', 'MAA-100', 100, 8, 'C'),

('Circuitos Eléctricos Y Laboratorio II', 'CEL-200', 200, 8, NULL),
('Instalaciones Eléctricas Y Taller II', 'IET-200', 200, 8, NULL),
('Máquinas Eléctricas I', 'MLT-200', 200, 8, NULL),
('Física Aplicada', 'FIA-200', 200, 8, NULL),
('Inglés Técnico', 'INT-200', 200, 8, NULL),

('Instrumentación Y Medidas', 'INM-300', 300, 8, NULL),
('Automatismos Eléctricos I', 'AUE-300', 300, 8, NULL),
('Electrónica Analógica', 'ELA-300', 300, 8, NULL),
('Máquinas Eléctricas II', 'MLT-300', 300, 8, NULL),
('Energías Alternativas I', 'ENA-300', 300, 8, NULL),
('Electricidad Del Automóvil', 'EDA-300', 300, 8, NULL),
('Emprendimiento Productivo I', 'EMP-300', 300, 8, NULL),

('Automatismos Eléctricos II', 'AUE-400', 400, 8, NULL),
('Centrales Eléctricas', 'CEE-400', 400, 8, NULL),
('Máquinas Eléctricas III', 'MLT-400', 400, 8, NULL),
('Electrónica Digital', 'ELD-400', 400, 8, NULL),
('Energías Alternativas II', 'ENA-400', 400, 8, NULL),
('Sistemas De Refrigeración', 'SIR-400', 400, 8, NULL),

('Control Lógico Programable', 'PLC-500', 500, 8, NULL),
('Electrónica De Potencia', 'ELP-500', 500, 8, NULL),
('Máquinas Eléctricas IV', 'MLT-500', 500, 8, NULL),
('Redes De Distribución', 'RED-500', 500, 8, NULL),
('Taller De Modalidad De Graduación I', 'TMG-500', 500, 8, NULL),
('Emprendimiento Productivo I', 'EMP-500', 500, 8, NULL),

('Electroneumática', 'ELN-600', 600, 8, NULL),
('Sistema SCADA', 'SIS-600', 600, 8, NULL),
('Sub Estaciones De Potencia', 'SUP-600', 600, 8, NULL),
('Líneas De Transmisión', 'LIT-600', 600, 8, NULL),
('Taller De Modalidad De Graduación II', 'TMG-600', 600, 8, NULL),
('Emprendimiento Productivo II', 'EMP-600', 600, 8, NULL);
















    
    
-- INSERT INTO Horarios (Dia, HoraInicio, HoraFin) VALUES
-- ('Lunes', '18:30', '19:10'),
-- ('Lunes', '19:10', '19:50'),
-- ('Lunes', '19:50', '20:30'),
-- ('Lunes', '20:30', '21:10'),
-- ('Lunes', '21:10', '21:50'),
-- ('Lunes', '21:50', '22:30');


DELIMITER $$
CREATE PROCEDURE InsertarHorarios()
BEGIN
    DECLARE dia VARCHAR(10);
    SET dia = 'Lunes';
    WHILE dia != 'Sábado' DO
        -- Insertar horarios para el turno de la mañana
        INSERT INTO Horarios (Periodo, Dia, HoraInicio, HoraFin, Turno) VALUES
        (1, dia, '08:00', '08:45', 'Mañana'),
        (2, dia, '08:45', '09:30', 'Mañana'),
        (3, dia, '09:30', '10:15', 'Mañana'),
        (4, dia, '10:15', '11:00', 'Mañana'),
        (5, dia, '11:00', '11:45', 'Mañana'),	
        (6, dia, '11:45', '12:30', 'Mañana');

        -- Insertar horarios para el turno de la noche
        INSERT INTO Horarios (Periodo, Dia, HoraInicio, HoraFin, Turno) VALUES
        (1, dia, '18:30', '19:10', 'Noche'),
        (2, dia, '19:10', '19:50', 'Noche'),
        (3, dia, '19:50', '20:30', 'Noche'),
        (4, dia, '20:30', '21:10', 'Noche'),
        (5, dia, '21:10', '21:50', 'Noche'),
        (6, dia, '21:50', '22:30', 'Noche');

        CASE dia
            WHEN 'Lunes' THEN SET dia = 'Martes';
            WHEN 'Martes' THEN SET dia = 'Miércoles';
            WHEN 'Miércoles' THEN SET dia = 'Jueves';
            WHEN 'Jueves' THEN SET dia = 'Viernes';
            ELSE SET dia = 'Sábado';
        END CASE;
    END WHILE;
END$$
DELIMITER ;
CALL InsertarHorarios();



INSERT INTO Horarios (Periodo, Dia, HoraInicio, HoraFin, Turno) VALUES 
(1, 'Sábado', '08:00', '08:45', 'Mañana'),
(2, 'Sábado', '08:45', '09:30', 'Mañana'),
(3, 'Sábado', '09:30', '10:15', 'Mañana'),
(4, 'Sábado', '10:15', '11:00', 'Mañana'),
(5, 'Sábado', '11:00', '11:45', 'Mañana'),
(6, 'Sábado', '11:45', '12:30', 'Mañana'),

(1, 'Sábado', '14:00', '14:45', 'Tarde'),
(2, 'Sábado', '14:45', '15:30', 'Tarde'),
(3, 'Sábado', '15:30', '16:15', 'Tarde'),
(4, 'Sábado', '16:15', '17:00', 'Tarde'),
(5, 'Sábado', '17:00', '17:45', 'Tarde'),
(6, 'Sábado', '17:45', '18:30', 'Tarde'),

(1, 'Sábado', '14:45', '15:30', 'Tarde'),
(2, 'Sábado', '15:30', '16:15', 'Tarde'),
(3, 'Sábado', '16:15', '17:00', 'Tarde'),
(4, 'Sábado', '17:00', '17:45', 'Tarde'),
(5, 'Sábado', '17:45', '18:30', 'Tarde'),
(6, 'Sábado', '18:30', '19:15', 'Tarde'),


(1, 'Sábado','15:00', '15:45', 'Tarde'),
(2, 'Sábado','15:45', '16:30', 'Tarde'),
(3, 'Sábado','16:30', '17:15', 'Tarde'),
(4, 'Sábado','17:15', '18:00', 'Tarde'),
(5, 'Sábado','18:00', '18:45', 'Tarde'),
(6, 'Sábado','18:45', '19:30', 'Tarde');

INSERT INTO Usuarios(Nombre, Apellido,Usuario, Clave) VALUES ('Miguel','Mayta Cruz','Miguel',123);


INSERT INTO Aulas(Nombre) VALUES 
-- ('Multisala'),('MB5'),('MF5'),('MF6'),('MF1'),('MA1'),('MA3'),('MA5'),('MA6'),('MA7'), ('MF7'),('MF8'),('MB10'),('MA2'), ('MF-1'),('MA-12'),('MB-10'),('ME-2'),('MB-1'),('ME-3');
('Multisala'),('MB-5'),('MF-5'),('MF-6'),('MF-1'),('MA-1'),('MA-3'),('MA-5'),('MA-6'),('MA-7'),('MF-7'),('MF-8'),('MB-10'),('MA-2'),('MA-12'),('ME-2'),('MB-1'),('ME-3'),('Desconocido'),
("MF-4"),("MC-6 TALLER ELT"),("MC-4 LAB. ELT DIGITAL"),("LAB. COMPUTACIÓN"),("MC-7 LAB. TELECOM"),("MC-8 LAB. MICROCONT"),("LAB. De SIMULADORES"),("MA-9"),("MA-10"),("MA-11"),("MB-7"),
("MB-8"),("MB-9"),("TALLER ELECTROMECÁNICO"),("LAB. DE CIRCUITOS ELECTRICO"),("MF-3"),("MD-1"),("MA-4"),("LAB. DE AUTOMATISMOS"),("TALLER ELECTRICO"),("LAB. DE ELECTRONEUMÁTICA"),
("SALA DE COMPUTACIÓN");







INSERT INTO DocenteMateria (DocenteID, MateriaID, AulaID, HorarioID) VALUES

/*100*/
(2, 3, 1, 7), 
(2, 3, 1, 8),
(3, 4, 1, 9),
(3, 4, 1, 10),
(3, 4, 1, 11),
(3, 4, 1, 12),
/*MARTES*/
(4, 6, 1, 19),
(4, 6, 1, 20),
(4, 6, 1, 21),
(4, 6, 1, 22),
(4, 5, 1, 23),
(4, 5, 1, 24),
/*MIERCOLES*/
(1, 1, 1, 31),
(1, 1, 1, 32),
(1, 1, 1, 33),
(1, 1, 1, 34),
(2, 2, 1, 35),
(2, 2, 1, 36),
/*JUEVES*/
(5, 7, 1, 43),
(5, 7, 1, 44),
(5, 7, 1, 45),
(5, 7, 1, 46),
(4, 5, 1, 47),
(4, 5, 1, 48),
/*VIERNES*/
(2, 7, 1, 55),
(2, 7, 1, 56),
(2, 7, 1, 57),
(2, 7, 1, 58),
(2, 7, 1, 59),
(2, 7, 1, 60),
/*200*/
/*LUNES*/
(5, 9, 2, 7),
(5, 9, 2, 8),
(5, 9, 2, 9),
(5, 9, 2, 10),
(5, 9, 2, 11),
(5, 9, 2, 12),
/*MARTES*/
(3, 8, 2, 19),
(3, 8, 2, 20),
(3, 11, 2, 21),
(3, 11, 2, 22),
(3, 11, 2, 23),
(3, 11, 2, 24),
/*MIERCOLES*/
(2, 13, 2, 31),
(2, 13, 2, 32),
(2, 13, 2, 33),
(2, 13, 2, 34),
(1, 14, 2, 35),
(1, 14, 2, 36),
/*JUEVES*/
(1, 15, 2, 43),
(1, 15, 2, 44),
(1, 12, 2, 45),
(1, 12, 2, 46),
(1, 12, 2, 47),
(1, 12, 2, 48),
/*VIERNES*/
(4, 10, 2, 55),
(4, 10, 2, 56),
(4, 10, 2, 57),
(4, 10, 2, 58),
(4, 15, 2, 59),
(4, 15, 2, 60),
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
(3, 17, 3, 60),


/* Construcción Civil */
/* 100 */
(6, 24, 4, 1),
(6, 24, 4, 2),
(6, 24, 4, 3),
(6, 24, 4, 4),
(6, 24, 4, 5),
(6, 24, 4, 6),

(7, 25, 4, 13), 
(7, 25, 4, 14),
(7, 25, 4, 15),
(7, 25, 4, 16),
(7, 25, 4, 17),
(7, 25, 4, 18),

(8, 26, 4, 25), 
(8, 26, 4, 26),
(8, 26, 4, 27),
(8, 26, 4, 28),
(8, 26, 4, 29),
(8, 26, 4, 30),

(9, 27, 4, 37), 
(9, 27, 4, 38),
(10, 28, 4,39),
(10, 28, 4,40),
(10, 28, 4,41),
(10, 28, 4,42),

(11, 29, 4, 49), 
(11, 29, 4, 50),
(11, 29, 4, 51),
(11, 29, 4, 52),
(11, 29, 4, 53),
(11, 29, 4, 54),

/* 100 B */
(6, 26, 4, 7), 
(6, 26, 4, 8),
(6, 26, 4, 9),
(6, 26, 4, 10),
(6, 26, 4, 11),
(6, 26, 4, 12),

(12, 27, 4, 19), 
(12, 27, 4, 20),
(10, 28, 4, 21),
(10, 28, 4, 22),
(10, 28, 4, 23),
(10, 28, 4, 24),

(10, 25, 4, 31), 
(10, 25, 4, 32),
(10, 25, 4, 33),
(10, 25, 4, 34),
(10, 25, 4, 35),
(10, 25, 4, 36),

(6, 24, 4, 43), 
(6, 24, 4, 44),
(6, 24, 4, 45),
(6, 24, 4, 46),
(6, 24, 4, 47),
(6, 24, 4, 48),

(11, 29, 4, 55), 
(11, 29, 4, 56),
(11, 29, 4, 57),
(11, 29, 4, 58),
(11, 29, 4, 59),
(11, 29, 4, 60),


/* 200 */
(8, 30, 7, 7), 
(8, 30, 7, 8),
(8, 30, 7, 9),
(8, 30, 7, 10),
(8, 30, 7, 11),
(8, 30, 7, 12),

(9, 32, 7, 19), 
(9, 32, 7, 20),
(13, 31, 7, 21),
(13, 31, 7, 22),
(13, 31, 7, 23),
(13, 31, 7, 24),

(14, 33, 7, 31), 
(14, 33, 7, 32),
(14, 33, 7, 33),
(14, 33, 7, 34),
(14, 33, 7, 35),
(14, 33, 7, 36),

(15, 35, 7, 43), 
(15, 35, 7, 44),
(15, 35, 7, 45),
(15, 35, 7, 46),
(15, 35, 7, 47),
(15, 35, 7, 48),

(9, 34, 7, 55), 
(9, 34, 7, 56),
(9, 34, 7, 57),
(9, 34, 7, 58),
(9, 34, 7, 59),
(9, 34, 7, 60),
/* 300 A */

(14, 36, 8, 1), 
(14, 36, 8, 2),
(14, 36, 8, 3),
(14, 36, 8, 4),
(14, 36, 8, 5),
(14, 36, 8, 6),

(16, 37, 8, 13), 
(16, 37, 8, 14),
(16, 37, 8, 15),
(16, 37, 8, 16),
(16, 38, 8, 17),
(16, 38, 8, 18),

(7, 39, 8, 25), 
(7, 39, 8, 26),
(7, 39, 8, 27),
(7, 39, 8, 28),
(7, 39, 8, 29),
(7, 39, 8, 30),

(16, 38, 8, 37), 
(16, 38, 8, 38),
(9, 40, 8, 39),
(9, 40, 8, 40),
(9, 40, 8, 41),
(9, 40, 8, 42),

(15, 41, 8, 49), 
(15, 41, 8, 50),
(15, 41, 8, 51),
(15, 41, 8, 52),
(15, 41, 8, 53),
(15, 41, 8, 54),

/* 300 B */
(16, 37, 8, 7), 
(16, 37, 8, 8),
(16, 37, 8, 9),
(16, 37, 8, 10),
(16, 37, 8, 11),
(16, 37, 8, 12),

(9, 40, 8, 19), 
(9, 40, 8, 20),
(9, 40, 8, 21),
(9, 40, 8, 22),
(9, 40, 8, 23),
(9, 40, 8, 24),

(16, 38, 8, 31), 
(16, 38, 8, 32),
(16, 38, 8, 33),
(16, 38, 8, 34),
(16, 38, 8, 35),
(16, 38, 8, 36),

(10, 36, 8, 43), 
(10, 36, 8, 44),
(10, 36, 8, 45),
(10, 36, 8, 46),
(10, 36, 8, 47),
(10, 36, 8, 48),

(12, 39, 8, 55), 
(12, 39, 8, 56),
(12, 39, 8, 57),
(12, 39, 8, 58),
(12, 39, 8, 59),
(12, 39, 8, 60),

(15, 41, 8, 61),
(15, 41, 8, 62),
(15, 41, 8, 63),
(15, 41, 8, 64),
(15, 41, 8, 65),
(15, 41, 8, 66),

/* 400 */
(17, 42, 9, 7), 
(17, 42, 9, 8),
(17, 42, 9, 9),
(17, 42, 9, 10),
(17, 42, 9, 11),
(17, 42, 9, 12),

(8, 43, 9, 19), 
(8, 43, 9, 20),
(8, 43, 9, 21),
(8, 43, 9, 22),
(8, 43, 9, 23),
(8, 43, 9, 24),

(11, 44, 9, 31), 
(11, 44, 9, 32),
(11, 44, 9, 33),
(11, 44, 9, 34),
(11, 44, 9, 35),
(11, 44, 9, 36),

(16, 46, 9, 43), 
(16, 46, 9, 44),
(16, 46, 9, 45),
(16, 46, 9, 46),
(16, 46, 9, 47),
(16, 46, 9, 48),

(10, 45, 9, 55), 
(10, 45, 9, 56),
(10, 45, 9, 57),
(10, 45, 9, 58),
(10, 45, 9, 59),
(10, 45, 9, 60),

(15, 47, 9, 67), 
(15, 47, 9, 68),
(15, 47, 9, 69),
(15, 47, 9, 70),
(15, 47, 9, 71),
(15, 47, 9, 72),


/* 500 */
(13, 48, 10, 7),
(13, 48, 10, 8),
(13, 48, 10, 9),
(13, 48, 10, 10),
(13, 48, 10, 11),
(13, 48, 10, 12),

(7, 49, 10, 19),
(7, 49, 10, 20),
(7, 49, 10, 21),
(7, 49, 10, 22),
(7, 49, 10, 23),
(7, 49, 10, 24),

(17, 50, 10, 31),
(17, 50, 10, 32),
(17, 50, 10, 33),
(17, 50, 10, 34),
(17, 50, 10, 35),
(17, 50, 10, 36),

(17, 52, 10, 43),
(17, 52, 10, 44),
(17, 52, 10, 45),
(17, 52, 10, 46),
(8, 51, 10, 47),
(8, 51, 10, 48),

(6, 53, 10, 55),
(6, 53, 10, 56),
(17, 52, 10, 57),
(17, 52, 10, 58),
(17, 52, 10, 59),
(17, 52, 10, 60),
/* 600 */
(12, 54, 6, 7),
(12, 54, 6, 8),
(12, 54, 6, 9),
(12, 54, 6, 10),
(12, 54, 6, 11),
(12, 54, 6, 12),

(13, 55, 6, 19),
(13, 55, 6, 20),
(12, 54, 6, 21),
(12, 54, 6, 22),
(12, 56, 6, 23),
(12, 56, 6, 24),

(13, 55, 6, 31),
(13, 55, 6, 32),
(13, 57, 6, 33),
(13, 57, 6, 34),
(13, 57, 6, 35),
(13, 57, 6, 36),

(11, 58, 6, 43),
(11, 58, 6, 44),
(11, 58, 6, 45),
(11, 58, 6, 46),
(11, 58, 6, 47),
(11, 58, 6, 48),

(8, 59, 6, 55),
(8, 59, 6, 56),
(8, 59, 6, 57),
(8, 59, 6, 58),
(8, 59, 6, 59),
(8, 59, 6, 60),

-- CONTABILIDAD
-- Nivel 100 A
-- Lunes
(18, 60, 11, 1),
(18, 60, 11, 2),
(18, 60, 11, 3),
(18, 60, 11, 4),
(20, 65, 11, 5),
(20, 65, 11, 6),
-- Martes
(19, 61, 11, 13),
(19, 61, 11, 14),
(19, 61, 11, 15),
(19, 61, 11, 16),
(22, 66, 11, 17),
(22, 66, 11, 18),
-- Miércoles
(18, 60, 11, 25),
(18, 60, 11, 26),
(18, 60, 11, 27),
(18, 60, 11, 28),
(22, 64, 11, 29),
(22, 64, 11, 30),
-- Jueves
(18, 63, 11, 37),
(18, 63, 11, 38),
(18, 63, 11, 39),
(18, 63, 11, 40),
(21, 67, 11, 41),
(21, 67, 11, 42),
-- Viernes
(23, 68, 11, 49),
(23, 68, 11, 50),
(23, 62, 11, 51),
(23, 62, 11, 52),
(23, 62, 11, 53),
(23, 62, 11, 54),
-- 100 C
-- Lunes
(20, 69, 12, 1),
(20, 69, 12, 2),
(20, 69, 12, 3),
(20, 69, 12, 4),
(26, 70, 12, 5),
(26, 70, 12, 6),
-- Martes
(22, 73, 12, 13),
(22, 73, 12, 14),
(22, 75, 12, 15),
(22, 75, 12, 16),
(26, 70, 12, 17),
(26, 70, 12, 18),
-- Miércoles
(23, 77, 12, 25),
(23, 77, 12, 26),
(23, 71, 12, 27),
(23, 71, 12, 28),
(23, 71, 12, 29),
(23, 71, 12, 30),
-- Jueves
(20, 69, 12, 37),
(20, 69, 12, 38),
(20, 69, 12, 39),
(20, 69, 12, 40),
(18, 72, 12, 41),
(18, 72, 12, 42),
-- Viernes
(20, 73, 12, 49),
(20, 73, 12, 50),
(20, 77, 12, 51),
(20, 77, 12, 52),
(19, 72, 12, 53),
(19, 72, 12, 54),

-- 200
-- Lunes
(22, 79, 13, 1),
(22, 79, 13, 2),
(22, 79, 13, 3),
(22, 79, 13, 4),
(22, 79, 13, 5),
(22, 79, 13, 6),
-- Martes
(24, 78, 13, 13),
(24, 78, 13, 14),
(24, 78, 13, 15),
(24, 78, 13, 16),
(24, 78, 13, 17),
(24, 78, 13, 18),
-- Miércoles
(22, 80, 13, 25),
(22, 80, 13, 26),
(22, 80, 13, 27),
(22, 80, 13, 28),
(25, 81, 13, 29),
(25, 81, 13, 30),
-- Jueves
(21, 83, 13, 37),
(21, 83, 13, 38),
(21, 83, 13, 39),
(21, 83, 13, 40),
(20, 82, 13, 41),
(20, 82, 13, 42),
-- Viernes
(24, 84, 13, 49),
(24, 84, 13, 50),
(24, 84, 13, 51),
(24, 84, 13, 52),
(20, 82, 13, 53),
(20, 82, 13, 54),
-- 300
-- Lunes
(24, 86, 14, 1),
(24, 86, 14, 2),
(24, 86, 14, 3),
(24, 86, 14, 4),
(18, 87, 14, 5),
(18, 87, 14, 6),
-- Martes
(25, 90, 14, 13),
(25, 90, 14, 14),
(25, 90, 14, 15),
(25, 90, 14, 16),
(25, 89, 14, 17),
(25, 89, 14, 18),
-- Miércoles
(25, 85, 14, 25),
(25, 85, 14, 26),
(25, 85, 14, 27),
(25, 85, 14, 28),
(18, 87, 14, 29),
(18, 87, 14, 30),
-- Jueves
(24, 92, 14, 37),
(24, 92, 14, 38),
(24, 92, 14, 39),
(24, 92, 14, 40),
(24, 88, 14, 41),
(24, 88, 14, 42),
-- Viernes
(25, 89, 14, 49),
(25, 89, 14, 50),
(25, 89, 14, 51),
(25, 89, 14, 52),
(25, 89, 14, 53),
(25, 89, 14, 54),

-- TURNO NOCHE
-- 100 B
-- Lunes
(27, 93, 11, 7),
(27, 93, 11, 8),
(27, 93, 11, 9),
(27, 93, 11, 10),
(27, 93, 11, 11),
(27, 93, 11, 12),
-- Martes
(29, 97, 11, 19),
(29, 97, 11, 20),
(28, 95, 11, 21),
(28, 95, 11, 22),
(28, 95, 11, 23),
(28, 95, 11, 24),
-- Miércoles
(21, 100, 11, 31),
(21, 100, 11, 32),
(23, 96, 11, 33),
(23, 96, 11, 34),
(23, 96, 11, 35),
(23, 96, 11, 36),
-- Jueves
(19, 99, 11, 43),
(19, 99, 11, 44),
(28, 101, 11, 45),
(28, 101, 11, 46),
(28, 98, 11, 47),
(28, 98, 11, 48),
-- Viernes
(27, 93, 11, 55),
(27, 93, 11, 56),
(26, 94, 11, 57),
(26, 94, 11, 58),
(26, 94, 11, 59),
(26, 94, 11, 60),
-- 100 D
-- Lunes
(19, 102, 12, 7),
(19, 102, 12, 8),
(19, 102, 12, 9),
(19, 102, 12, 10),
(30, 106, 12, 11),
(30, 106, 12, 12),
-- Martes
(28, 107, 12, 19),
(28, 107, 12, 20),
(19, 102, 12, 21),
(19, 102, 12, 22),
(19, 102, 12, 23),
(19, 102, 12, 24),
-- Miércoles
(23, 105, 12, 31),
(23, 105, 12, 32),
(21, 103, 12, 33),
(21, 103, 12, 34),
(21, 103, 12, 35),
(21, 103, 12, 36),
-- Jueves
(26, 110, 12, 43),
(26, 110, 12, 44),
(26, 108, 12, 45),
(26, 108, 12, 46),
(26, 109, 12, 47),
(26, 109, 12, 48),
-- Viernes
(23, 105, 12, 55),
(23, 105, 12, 56),
(28, 104, 12, 57),
(28, 104, 12, 58),
(28, 104, 12, 59),
(28, 104, 12, 60),

-- 200
-- Lunes
(29, 79, 13, 7),
(29, 79, 13, 8),
(29, 79, 13, 9),
(29, 79, 13, 10),
(29, 79, 13, 11),
(29, 79, 13, 12),
-- Martes
(30, 83, 13, 19),
(30, 83, 13, 20),
(30, 84, 13, 21),
(30, 84, 13, 22),
(30, 84, 13, 23),
(30, 84, 13, 24),
-- Miércoles
(29, 78, 13, 31),
(29, 78, 13, 32),
(29, 78, 13, 33),
(29, 78, 13, 34),
(29, 78, 13, 35),
(29, 78, 13, 36),
-- Jueves
(30, 83, 13, 43),
(30, 83, 13, 44),
(30, 82, 13, 45),
(30, 82, 13, 46),
(30, 82, 13, 47),
(30, 82, 13, 48),
-- Viernes
(20, 81, 13, 55),
(20, 81, 13, 56),
(27, 80, 13, 57),
(27, 80, 13, 58),
(27, 80, 13, 59),
(27, 80, 13, 60),
-- 300
-- Lunes
(30, 86, 14, 7),
(30, 86, 14, 8),
(30, 86, 14, 9),
(30, 86, 14, 10),
(19, 85, 14, 11),
(19, 85, 14, 12),
-- Martes
(19, 85, 14, 19),
(19, 85, 14, 20),
(29, 89, 14, 21),
(29, 89, 14, 22),
(29, 89, 14, 23),
(29, 89, 14, 24),
-- Miércoles
(27, 91, 14, 31),
(27, 91, 14, 32),
(28, 92, 14, 33),
(28, 92, 14, 34),
(28, 92, 14, 35),
(28, 92, 14, 36),
-- Jueves
(27, 91, 14, 43),
(27, 91, 14, 44),
(27, 90, 14, 45),
(27, 90, 14, 46),
(27, 90, 14, 47),
(27, 90, 14, 48),
-- Viernes
(21, 88, 14, 55),
(21, 88, 14, 56),
(21, 87, 14, 57),
(21, 87, 14, 58),
(21, 87, 14, 59),
(21, 87, 14, 60),

-- MECANICA AUTOMOTRIZ

-- TURNO MAÑANA
-- 100
(39, 117, 5, 1),
(39, 117, 5, 2),
(39, 117, 5, 3),
(39, 117, 5, 4),
(38, 112, 5, 5),
(38, 112, 5, 6),

(38, 116, 5, 13),
(38, 116, 5, 14),
(38, 113, 5, 15),
(38, 113, 5, 16),
(38, 113, 5, 17),
(38, 113, 5, 18),

(36, 111, 5, 25),
(36, 111, 5, 26),
(36, 111, 5, 27),
(36, 111, 5, 28),
(36, 111, 5, 29),
(36, 111, 5, 30),

(36, 115, 5, 38),
(36, 115, 5, 37),
(36, 115, 5, 39),
(36, 115, 5, 40),
(36, 115, 5, 41),
(36, 115, 5, 42),

(38, 116, 5, 49),
(38, 116, 5, 50),
(38, 114, 5, 51),
(38, 114, 5, 52),
(38, 114, 5, 53),
(38, 114, 5, 54),

-- 200

(36, 120, 15, 2),
(36, 120, 15, 1),
(36, 120, 15, 3),
(36, 120, 15, 4),
(39, 122, 15, 5),
(39, 122, 15, 6),

(36, 118, 15, 13),
(36, 118, 15, 14),
(36, 118, 15, 15),
(36, 118, 15, 16),
(36, 118, 15, 17),
(36, 118, 15, 18),

(35, 121, 15, 25),
(35, 121, 15, 26),
(35, 121, 15, 27),
(35, 121, 15, 28),
(35, 121, 15, 29),
(35, 121, 15, 30),

(43, 119, 15, 37),
(43, 119, 15, 38),
(43, 119, 15, 39),
(43, 119, 15, 40),
(43, 119, 15, 41),
(43, 119, 15, 42),

(39, 122, 15, 49),
(39, 122, 15, 50),
(42, 123, 15, 51),
(42, 123, 15, 52),
(42, 123, 15, 53),
(42, 123, 15, 54),

-- 300
(34, 129, 13, 1),
(34, 129, 13, 2),
(34, 129, 13, 3),
(34, 129, 13, 4),
(34, 129, 13, 5),
(34, 129, 13, 6),

(32, 126, 13, 13),
(32, 126, 13, 14),
(32, 128, 13, 15),
(32, 128, 13, 16),
(32, 128, 13, 17),
(32, 128, 13, 18),

(34, 129, 13, 25),
(34, 129, 13, 26),
(31, 124, 13, 27),
(31, 124, 13, 28),
(31, 124, 13, 29),
(31, 124, 13, 30),

(33, 127, 13, 37),
(33, 127, 13, 38),
(33, 127, 13, 39),
(33, 127, 13, 40),
(33, 127, 13, 41),
(33, 127, 13, 42),

(31, 125, 13, 49),
(31, 125, 13, 50),
(31, 125, 13, 51),
(31, 125, 13, 52),
(31, 125, 13, 53),
(31, 125, 13, 54),

-- 400
(31, 136, 16, 1),
(31, 136, 16, 2),
(31, 136, 16, 3),
(31, 136, 16, 4),
(36, 135, 16, 5),
(36, 135, 16, 6),

(34, 134, 16, 13),
(34, 134, 16, 14),
(34, 134, 16, 15),
(34, 134, 16, 16),
(34, 134, 16, 17),
(34, 134, 16, 18),

(32, 133, 16, 25),
(32, 133, 16, 26),
(32, 133, 16, 27),
(32, 133, 16, 28),
(32, 133, 16, 29),
(32, 133, 16, 30),

(31, 131, 16, 37),
(31, 131, 16, 38),
(31, 131, 16, 39),
(31, 131, 16, 40),
(31, 130, 16, 41),
(31, 130, 16, 42),

(35, 132, 16, 49),
(35, 132, 16, 50),
(35, 132, 16, 51),
(35, 132, 16, 52),
(35, 132, 16, 53),
(35, 132, 16, 54),


-- 500
(37, 141,17, 1),
(37, 141,17, 2),
(37, 141,17, 3),
(37, 141,17, 4),
(37, 140,17, 5),
(37, 140,17, 6),

(37, 140,17, 13),
(37, 140,17, 14),
(37, 137,17, 15),
(37, 137,17, 16),
(37, 137,17, 17),
(37, 137,17, 18),

(33, 143,17, 25),
(33, 143,17, 26),
(33, 143,17, 27),
(33, 143,17, 28),
(33, 143,17, 29),
(33, 143,17, 30),

(34, 142,17, 37),
(34, 142,17, 38),
(34, 142,17, 39),
(34, 142,17, 40),
(34, 142,17, 41),
(34, 142,17, 42),

(36, 139,17, 49),
(36, 139,17, 50),
(36, 139,17, 51),
(36, 139,17, 52),
(36, 138,17, 53),
(36, 138,17, 54),
 
-- TURNO NOCHE
-- 100
(38,114,5, 7),
(38,114,5, 8),
(38,114,5, 9),
(38,114,5, 10),
(39,112,5, 11),
(39,112,5, 12),

(37,115,5, 19),
(37,115,5, 20),
(37,115,5, 21),
(37,115,5, 22),
(37,115,5, 23),
(37,115,5, 24),

(39,116,5, 31),
(39,116,5, 32),
(40,113,5, 33),
(40,113,5, 34),
(40,113,5, 35),
(40,113,5, 36),

(41,111,5, 43),
(41,111,5, 44),
(41,111,5, 45),
(41,111,5, 46),
(41,111,5, 47),
(41,111,5, 48),

(39,116,5, 55),
(39,116,5, 56),
(39,117,5, 57),
(39,117,5, 58),
(39,117,5, 59),
(39,117,5, 60),

-- 200

(40, 118,15, 7),
(40, 118,15, 8),
(40, 118,15, 9),
(40, 118,15, 10),
(40, 118,15, 11),
(40, 118,15, 12),

(47,119,15, 19),
(47,119,15, 20),
(47,119,15, 21),
(47,119,15, 22),
(47,119,15, 23),
(47,119,15, 24),

(35,121,15, 31),
(35,121,15, 32),
(35,121,15, 33),
(35,121,15, 34),
(35,121,15, 35),
(35,121,15, 36),

(38,120,15, 43),
(38,120,15, 44),
(44,122,15, 45),
(44,122,15, 46),
(44,122,15, 47),
(44,122,15, 48),

(38,120,15, 55),
(38,120,15, 56),
(42,123,15, 57),
(42,123,15, 58),
(42,123,15, 59),
(42,123,15, 60),

-- 300
(47, 129, 13, 7),
(47, 129, 13, 8),
(47, 128, 13, 9),
(47, 128, 13, 10),
(47, 128, 13, 11),
(47, 128, 13, 12),

(43, 126, 13, 19),
(43, 126, 13, 20),
(43, 124, 13, 21),
(43, 124, 13, 22),
(43, 124, 13, 23),
(43, 124, 13, 24),

(47, 129, 13, 31),
(47, 129, 13, 32),
(47, 129, 13, 33),
(47, 129, 13, 34),
(47, 129, 13, 35),
(47, 129, 13, 36),

(43, 127, 13, 43),
(43, 127, 13, 44),
(43, 127, 13, 45),
(43, 127, 13, 46),
(43, 127, 13, 47),
(43, 127, 13, 48),

(41, 125, 13, 55),
(41, 125, 13, 56),
(41, 125, 13, 57),
(41, 125, 13, 58),
(41, 125, 13, 59),
(41, 125, 13, 60),


-- 400
(36, 131, 16, 7),
(36, 131, 16, 8),
(36, 131, 16, 9),
(36, 131, 16, 10),
(46, 132, 16, 11),
(46, 132, 16, 12),

(46, 132, 16, 19),
(46, 132, 16, 20),
(46, 132, 16, 21),
(46, 132, 16, 22),
(46, 132, 16, 23),
(46, 132, 16, 24),

(41, 133, 16, 31),
(41, 133, 16, 32),
(41, 133, 16, 33),
(41, 133, 16, 34),
(41, 133, 16, 35),
(41, 133, 16, 36),

(45, 130, 16, 43),
(45, 130, 16, 44),
(38, 136, 16, 45),
(38, 136, 16, 46),
(38, 136, 16, 47),
(38, 136, 16, 48),

(45, 134, 16, 55),
(45, 134, 16, 56),
(45, 134, 16, 57),
(45, 134, 16, 58),
(45, 134, 16, 59),
(45, 134, 16, 60),

-- 500
(45, 140, 17, 7),
(45, 140, 17, 8),
(46, 137, 17, 9),
(46, 137, 17, 10),
(46, 137, 17, 11),
(46, 137, 17, 12),

(44, 139, 17, 19),
(44, 139, 17, 20),
(44, 139, 17, 21),
(44, 139, 17, 22),
(44, 138, 17, 23),
(44, 138, 17, 24),

(45, 140, 17, 31),
(45, 140, 17, 32),
(38, 141, 17, 33),
(38, 141, 17, 34),
(38, 141, 17, 35),
(38, 141, 17, 36),

(40, 142, 17, 43),
(40, 142, 17, 44),
(40, 142, 17, 45),
(40, 142, 17, 46),
(40, 142, 17, 47),
(40, 142, 17, 48),

(40, 143, 17, 55),
(40, 143, 17, 56),
(40, 143, 17, 57),
(40, 143, 17, 58),
(40, 143, 17, 59),
(40, 143, 17, 60),

-- 600

(46, 149, 18, 7),
(46, 149, 18, 8),
(45, 144, 18, 9),
(45, 144, 18, 10),
(45, 144, 18, 11),
(45, 144, 18, 12),

(33, 150, 18, 19),
(33, 150, 18, 20),
(33, 150, 18, 21),
(33, 150, 18, 22),
(33, 150, 18, 23),
(33, 150, 18, 24),

(46, 149, 18, 31),
(46, 149, 18, 32),
(46, 148, 18, 33),
(46, 148, 18, 34),
(46, 148, 18, 35),
(46, 148, 18, 36),

(44, 147, 18, 43),
(44, 147, 18, 44),
(45, 145, 18, 45),
(45, 145, 18, 46),
(45, 145, 18, 47),
(45, 145, 18, 48),

(32, 146, 18, 55),
(32, 146, 18, 56),
(32, 146, 18, 57),
(32, 146, 18, 58),
(32, 146, 18, 59),
(32, 146, 18, 60),


-- MECANICA INDUSTRIAL
-- Turno Mañana
-- Nivel 100 
(48, 151, 19, 1), 
(48, 151, 19, 2), 
(51, 155, 19, 3), 
(51, 155, 19, 4), 
(51, 155, 19, 5), 
(51, 155, 19, 6), 

(48, 156, 19, 13),
(48, 156, 19, 14),
(48, 156, 19, 15),
(48, 156, 19, 16),
(48, 156, 19, 17),
(48, 156, 19, 18),

(48, 156, 19, 25),
(48, 156, 19, 26),
(48, 156, 19, 27),
(48, 156, 19, 28),
(48, 156, 19, 29),
(48, 156, 19, 30),

(48, 151, 19, 37),
(48, 151, 19, 38),
(50, 153, 19, 39),
(50, 153, 19, 40),
(50, 153, 19, 41),
(50, 153, 19, 42),

(49, 152, 19, 49),
(49, 152, 19, 50),
(48, 154, 19, 51),
(48, 154, 19, 52),
(48, 154, 19, 53),
(48, 154, 19, 54),


-- 400

-- Lunes
(50, 170, 19, 1),
(50, 170, 19, 2),
(50, 170, 19, 3),
(50, 170, 19, 4),
(53, 169, 19, 5),
(53, 169, 19, 6),

-- Martes
(54, 172, 19, 13),
(54, 172, 19, 14),
(54, 172, 19, 15),
(54, 172, 19, 16),
(53, 169, 19, 17),
(53, 169, 19, 18),

-- Miércoles
(52, 171, 19, 25),
(52, 171, 19, 26),
(52, 171, 19, 27),
(52, 171, 19, 28),
(52, 171, 19, 29),
(52, 171, 19, 30),

-- Jueves
(52, 171, 19, 37),
(52, 171, 19, 38),
(52, 171, 19, 39),
(52, 171, 19, 40),
(52, 171, 19, 41),
(52, 171, 19, 42),

-- Viernes
(52, 167, 19, 49),
(52, 167, 19, 50),
(52, 167, 19, 51),
(52, 167, 19, 52),
(52, 168, 19, 53),
(52, 168, 19, 54),


-- Nivel 500

-- Lunes
(56, 176, 19, 1),
(56, 176, 19, 2),
(56, 176, 19, 3),
(56, 176, 19, 4),
(56, 175, 19, 5),
(56, 175, 19, 6),

-- Martes
(53, 179, 19, 13),
(53, 179, 19, 14),
(53, 179, 19, 15),
(53, 179, 19, 16),
(56, 175, 19, 17),
(56, 175, 19, 18),

-- Miércoles
(55, 177, 19, 25),
(55, 177, 19, 26),
(55, 177, 19, 27),
(55, 177, 19, 28),
(55, 173, 19, 29),
(55, 173, 19, 30),

-- Jueves
(56, 178, 19, 37),
(56, 178, 19, 38),
(56, 178, 19, 39),
(56, 178, 19, 40),
(56, 178, 19, 41),
(56, 178, 19, 42),

-- Viernes
(56, 178, 19, 49),
(56, 178, 19, 50),
(56, 178, 19, 51),
(56, 178, 19, 52),
(56, 174, 19, 53),
(56, 174, 19, 54),


-- Turno Noche
-- Nivel 200 

-- Lunes
(50, 160, 19, 7),
(50, 160, 19, 8),
(50, 160, 19, 9),
(50, 160, 19, 10),
(54, 159, 19, 11),
(54, 159, 19, 12),

-- Martes
(54, 159, 19, 19),
(54, 159, 19, 20),
(57, 158, 19, 21),
(57, 158, 19, 22),
(57, 158, 19, 23),
(57, 158, 19, 24),

-- Miércoles
(54, 161, 19, 31),
(54, 161, 19, 32),
(54, 161, 19, 33),
(54, 161, 19, 34),
(54, 161, 19, 35),
(54, 161, 19, 36),

-- Jueves
(54, 161, 19, 43),
(54, 161, 19, 44),
(54, 161, 19, 45),
(54, 161, 19, 46),
(54, 161, 19, 47),
(54, 161, 19, 48),

-- Viernes
(49, 157, 19, 55),
(49, 157, 19, 56),
(49, 157, 19, 57),
(49, 157, 19, 58),
(49, 157, 19, 59),
(49, 157, 19, 60),


-- 300

-- Lunes
(58, 165, 19, 7),
(58, 165, 19, 8),
(58, 165, 19, 9),
(58, 165, 19, 10),
(49, 162, 19, 11),
(49, 162, 19, 12),

-- Martes
(50, 166, 19, 19),
(50, 166, 19, 20),
(50, 166, 19, 21),
(50, 166, 19, 22),
(49, 162, 19, 23),
(49, 162, 19, 24),

-- Miércoles
(51, 163, 19, 31),
(51, 163, 19, 32),
(51, 163, 19, 33),
(51, 163, 19, 34),
(49, 162, 19, 35),
(49, 162, 19, 36),

-- Jueves
(58, 164, 19, 43),
(58, 164, 19, 44),
(58, 164, 19, 45),
(58, 164, 19, 46),
(58, 164, 19, 47),
(58, 164, 19, 48),

-- Viernes
(58, 164, 19, 55),
(58, 164, 19, 56),
(58, 164, 19, 57),
(58, 164, 19, 58),
(58, 164, 19, 59),
(58, 164, 19, 60),

-- 400
-- Lunes
(57, 168, 19, 7),
(57, 168, 19, 8),
(57, 172, 19, 9),
(57, 172, 19, 10),
(57, 172, 19, 11),
(57, 172, 19, 12),

-- Martes
(59, 169, 19, 19),
(59, 169, 19, 20),
(59, 167, 19, 21),
(59, 167, 19, 22),
(59, 167, 19, 23),
(59, 167, 19, 24),

-- Miércoles
(50, 170, 19, 31),
(50, 170, 19, 32),
(50, 170, 19, 33),
(50, 170, 19, 34),
(59, 169, 19, 35),
(59, 169, 19, 36),

-- Jueves
(57, 171, 19, 43),
(57, 171, 19, 44),
(57, 171, 19, 45),
(57, 171, 19, 46),
(57, 171, 19, 47),
(57, 171, 19, 48),

-- Viernes
(57, 171, 19, 55),
(57, 171, 19, 56),
(57, 171, 19, 57),
(57, 171, 19, 58),
(57, 171, 19, 59),
(57, 171, 19, 60),


-- 500
-- Lunes
(59, 176, 19, 7),
(59, 176, 19, 8),
(59, 176, 19, 9),
(59, 176, 19, 10),
(59, 175, 19, 11),
(59, 175, 19, 12),

-- Martes
(55, 173, 19, 19),
(55, 173, 19, 20),
(58, 179, 19, 21),
(58, 179, 19, 22),
(58, 179, 19, 23),
(58, 179, 19, 24),

-- Miércoles
(53, 178, 19, 31),
(53, 178, 19, 32),
(53, 178, 19, 33),
(53, 178, 19, 34),
(53, 178, 19, 35),
(53, 178, 19, 36),

-- Jueves
(53, 178, 19, 43),
(53, 178, 19, 44),
(53, 178, 19, 45),
(53, 178, 19, 46),
(53, 174, 19, 47),
(53, 174, 19, 48),

-- Viernes
(55, 177, 19, 55),
(55, 177, 19, 56),
(55, 177, 19, 57),
(55, 177, 19, 58),
(59, 175, 19, 59),
(59, 175, 19, 60),

-- Sabado

(53, 174, 19, 79),
(53, 174, 19, 80),


-- 600
-- Lunes
(51, 184, 19, 7),
(51, 184, 19, 8),
(51, 184, 19, 9),
(51, 184, 19, 10),
(51, 184, 19, 11),
(51, 184, 19, 12),

-- Martes
(51, 184, 19, 19),
(51, 184, 19, 20),
(51, 184, 19, 21),
(51, 184, 19, 22),
(51, 184, 19, 23),
(51, 184, 19, 24),

-- Miércoles
(55, 185, 19, 31),
(55, 185, 19, 32),
(55, 185, 19, 33),
(55, 185, 19, 34),
(55, 180, 19, 35),
(55, 180, 19, 36),

-- Jueves
(49, 183, 19, 43),
(49, 183, 19, 44),
(49, 183, 19, 45),
(49, 183, 19, 46),
(49, 181, 19, 47),
(49, 181, 19, 48),

-- Viernes
(59, 182, 19, 55),
(59, 182, 19, 56),
(59, 182, 19, 57),
(59, 182, 19, 58),
(55, 180, 19, 59),
(55, 180, 19, 60),

-- ELECTRONICA
-- 100
-- Lunes
(60, 186, 20, 7),
(60, 186, 20, 8),
(60, 186, 20, 9),
(60, 186, 20, 10),
(60, 186, 20, 11),
(60, 186, 20, 12),

-- Martes
(61, 189, 20, 19),
(61, 189, 20, 20),
(61, 188, 20, 21),
(61, 188, 20, 22),
(61, 188, 20, 23),
(61, 188, 20, 24),

-- Miércoles
(60, 187, 21, 31),
(60, 187, 21, 32),
(60, 187, 21, 33),
(60, 187, 21, 34),
(60, 187, 21, 35),
(60, 187, 21, 36),

-- Jueves
(60, 192, 20, 43),
(60, 192, 20, 44),
(60, 192, 20, 45),
(60, 192, 20, 46),
(14, 190, 20, 47),
(14, 190, 20, 48),

-- Viernes
(14, 190, 20, 55),
(14, 190, 20, 56),
(14, 191, 20, 57),
(14, 191, 20, 58),
(14, 191, 20, 59),
(14, 191, 20, 60),


-- 200

-- Lunes
(64, 196, 22, 7),
(64, 196, 22, 8),
(64, 196, 22, 9),
(64, 196, 22, 10),
(64, 196, 22, 11),
(64, 196, 22, 12),

-- Martes
(60, 193, 21, 19),
(60, 193, 21, 20),
(60, 193, 21, 21),
(60, 193, 21, 22),
(60, 193, 21, 23),
(60, 193, 21, 24),

-- Miércoles
-- (66, 197, 20, 31),-- Sin definir docente
-- (66, 197, 20, 32),-- Sin definir docente
-- (66, 197, 20, 33),-- Sin definir docente
-- (66, 197, 20, 34),-- Sin definir docente
(64, 198, 20, 35),
(64, 198, 20, 36),

-- Jueves
(62, 194, 22, 43),
(62, 194, 22, 44),
(62, 194, 22, 45),
(62, 194, 22, 46),
(62, 194, 22, 47),
(62, 194, 22, 48),

-- Viernes
(63, 195, 23, 55),
(63, 195, 23, 56),
(63, 195, 23, 57),
(63, 195, 23, 58),
(63, 195, 23, 59),
(63, 195, 23, 60),


-- 300
-- Lunes
(63, 200, 21, 7),
(63, 200, 21, 8),
(63, 200, 21, 9),
(63, 200, 21, 10),
(63, 200, 21, 11),
(63, 200, 21, 12),

-- Martes
(63, 201, 24, 19),
(63, 201, 24, 20),
(63, 201, 24, 21),
(63, 201, 24, 22),
(63, 201, 24, 23),
(63, 201, 24, 24),

-- Miércoles
(64, 202, 24, 31),
(64, 202, 24, 32),
(64, 202, 24, 33),
(64, 202, 24, 34),
-- (66, 204, 24, 35), -- Sin definir docente
(66, 204, 24, 36), -- Sin definir docente

-- Jueves
-- (66, 204, 23, 43), -- Sin definir docente
-- (66, 204, 23, 44), -- Sin definir docente
(65, 203, 23, 45),
(65, 203, 23, 46),
(65, 203, 23, 47),
(65, 203, 23, 48),

-- Viernes
(62, 199, 21, 55),
(62, 199, 21, 56),
(62, 199, 21, 57),
(62, 199, 21, 58),
(62, 199, 21, 59),
(62, 199, 21, 60),

-- 400
-- Lunes
(65, 206, 25, 7),
(65, 206, 25, 8),
(65, 206, 25, 9),
(65, 206, 25, 10),
(65, 206, 25, 11),
(65, 206, 25, 12),

-- Martes
(64, 207, 22, 19),
(64, 207, 22, 20),
(64, 207, 22, 21),
(64, 207, 22, 22),
(64, 207, 22, 23),
(64, 207, 22, 24),

-- Miércoles
(66, 205, 24, 31),
(66, 205, 24, 32),
(66, 205, 24, 33),
(66, 205, 24, 34),
(66, 205, 24, 35),
(66, 205, 24, 36),

-- Jueves
(65, 210, 21, 43),
(65, 210, 21, 44),
(61, 208, 21, 45),
(61, 208, 21, 46),
(61, 208, 21, 47),
(61, 208, 21, 48),

-- Viernes
(65, 210, 24, 55),
(65, 210, 24, 56),
(65, 209, 24, 57),
(65, 209, 24, 58),
(65, 209, 24, 59),
(65, 209, 24, 60),


-- 500
-- Lunes
(3, 216, 24, 7),
(3, 216, 24, 8),
(61, 215, 24, 9),
(61, 215, 24, 10),
(61, 215, 24, 11),
(61, 215, 24, 12),

-- Martes
(62, 211, 25, 20),
(62, 211, 25, 19),
(62, 211, 25, 21),
(62, 211, 25, 22),
(62, 211, 25, 23),
(62, 211, 25, 24),

-- Miércoles
(65, 217, 26, 31),
(65, 217, 26, 32),
(61, 212, 26, 33),
(61, 212, 26, 34),
(61, 212, 26, 35),
(61, 212, 26, 36),

-- Jueves
(67, 213, 26, 43),
(67, 213, 26, 44),
(67, 213, 26, 45),
(67, 213, 26, 46),
(67, 213, 26, 47),
(67, 213, 26, 48),

-- Viernes
(68, 214, 25, 55),
(68, 214, 25, 56),
(68, 214, 25, 57),
(68, 214, 25, 58),
(68, 214, 25, 59),
(68, 214, 25, 60),

-- 600
-- Lunes
(67, 219, 23, 7),
(67, 219, 23, 8),
(67, 219, 23, 9),
(67, 219, 23, 10),
(67, 219, 23, 11),
(67, 219, 23, 12),

-- Martes
(67, 218, 26, 19),
(67, 218, 26, 20),
(67, 218, 26, 21),
(67, 218, 26, 22),
(67, 218, 26, 23),
(67, 218, 26, 24),

-- Miércoles
(68, 221, 23, 31),
(68, 221, 23, 32),
(68, 221, 23, 33),
(68, 221, 23, 34),
(68, 221, 23, 35),
(68, 221, 23, 36),

-- Jueves
(68, 220, 25, 43),
(68, 220, 25, 44),
(68, 220, 25, 45),
(68, 220, 25, 46),
(68, 220, 25, 47),
(68, 220, 25, 48),

-- Viernes
(44, 222, 22, 55),
(44, 222, 22, 56),
(44, 223, 22, 57),
(44, 223, 22, 58),
(44, 223, 22, 59),
(44, 223, 22, 60),


-- QUIMICA INDUSTRIAL
-- TURNO MAÑANA
-- Nivel 100 (Aula ID 27)
(70, 226, 27, 1),
(70, 226, 27, 2),
(70, 226, 27, 3),
(70, 226, 27, 4),
(70, 226, 27, 5),
(70, 226, 27, 6),

(42, 224, 27, 13),
(42, 224, 27, 14),
(72, 229, 27, 15),
(72, 229, 27, 16),
(72, 229, 27, 17),
(72, 229, 27, 18),

(69, 225, 27, 25),
(69, 225, 27, 26),
(73, 228, 27, 27),
(73, 228, 27, 28),
(73, 228, 27, 29),
(73, 228, 27, 30),

(71, 227, 27, 37),
(71, 227, 27, 38),
(71, 227, 27, 39),
(71, 227, 27, 40),
(71, 227, 27, 41),
(71, 227, 27, 42),

(69, 225, 27, 49),
(69, 225, 27, 50),
(69, 225, 27, 51),
(69, 225, 27, 52),
(69, 225, 27, 53),
(69, 225, 27, 54),

-- Nivel 300 (Aula ID 28)
(75, 238, 28, 1),
(75, 238, 28, 2),
(75, 238, 28, 3),
(75, 238, 28, 4),
(75, 238, 28, 5),
(75, 238, 28, 6),

(72, 240, 28, 13),
(72, 240, 28, 14),
(77, 241, 28, 15),
(77, 241, 28, 16),
(77, 241, 28, 17),
(77, 241, 28, 18),

(72, 240, 28, 25),
(72, 240, 28, 26),
(75, 236, 28, 27),
(75, 236, 28, 28),
(75, 236, 28, 29),
(75, 236, 28, 30),

(69, 237, 28, 37),
(69, 237, 28, 38),
(69, 237, 28, 39),
(69, 237, 28, 40),
(69, 237, 28, 41),
(69, 237, 28, 42),

(73, 239, 28, 49),
(73, 239, 28, 50),
(73, 239, 28, 51),
(73, 239, 28, 52),
(73, 239, 28, 53),
(73, 239, 28, 54),


-- TURNO NOCHE
-- Nivel 100 (Aula ID 29)
(75, 225, 29, 7),
(75, 225, 29, 8),
(73, 228, 29, 9),
(73, 228, 29, 10),
(73, 228, 29, 11),
(73, 228, 29, 12),

(74, 229, 29, 19),
(74, 229, 29, 20),
(74, 229, 29, 21),
(74, 229, 29, 22),
(42, 224, 29, 23),
(42, 224, 29, 24),

(70, 226, 29, 31),
(70, 226, 29, 32),
(70, 226, 29, 33),
(70, 226, 29, 34),
(70, 226, 29, 35),
(70, 226, 29, 36),

(71, 227, 29, 43),
(71, 227, 29, 44),
(71, 227, 29, 45),
(71, 227, 29, 46),
(71, 227, 29, 47),
(71, 227, 29, 48),

(75, 225, 29, 55),
(75, 225, 29, 56),
(75, 225, 29, 57),
(75, 225, 29, 58),
(75, 225, 29, 59),
(75, 225, 29, 60),

-- Nivel 200 (Aula ID 30)
(76, 233, 30, 7),
(76, 233, 30, 8),
(71, 231, 30, 9),
(71, 231, 30, 10),
(71, 231, 30, 11),
(71, 231, 30, 12),

(42, 232, 30, 19),
(42, 232, 30, 20),
(76, 233, 30, 21),
(76, 233, 30, 22),
(76, 233, 30, 23),
(76, 233, 30, 24),

(77, 234, 30, 31),
(77, 234, 30, 32),
(76, 235, 30, 33),
(76, 235, 30, 34),
(76, 235, 30, 35),
(76, 235, 30, 36),

(70, 230, 30, 43),
(70, 230, 30, 44),
(70, 230, 30, 45),
(70, 230, 30, 46),
(70, 230, 30, 47),
(70, 230, 30, 48),

(77, 234, 30, 55),
(77, 234, 30, 56),
(77, 234, 30, 57),
(77, 234, 30, 58),
(77, 234, 30, 59),
(77, 234, 30, 60),

-- Nivel 300 (Aula ID 31)
(71, 240, 31, 7),
(71, 240, 31, 8),
(75, 236, 31, 9),
(75, 236, 31, 10),
(75, 236, 31, 11),
(75, 236, 31, 12),

(71, 240, 31, 19),
(71, 240, 31, 20),
(77, 241, 31, 21),
(77, 241, 31, 22),
(77, 241, 31, 23),
(77, 241, 31, 24),

(79, 239, 31, 31),
(79, 239, 31, 32),
(79, 239, 31, 33),
(79, 239, 31, 34),
(79, 239, 31, 35),
(79, 239, 31, 36),

(74, 238, 31, 43),
(74, 238, 31, 44),
(74, 238, 31, 45),
(74, 238, 31, 46),
(74, 238, 31, 47),
(74, 238, 31, 48),

(69, 237, 31, 55),
(69, 237, 31, 56),
(69, 237, 31, 57),
(69, 237, 31, 58),
(69, 237, 31, 59),
(69, 237, 31, 60),

-- Nivel 400 (Aula ID 32)
(78, 245, 32, 7),
(78, 245, 32, 8),
(76, 247, 32, 9),
(76, 247, 32, 10),
(76, 247, 32, 11),
(76, 247, 32, 12),

(79, 246, 32, 19),
(79, 246, 32, 20),
(79, 246, 32, 21),
(79, 246, 32, 22),
(79, 246, 32, 23),
(79, 246, 32, 24),

(72, 244, 32, 31),
(72, 244, 32, 32),
(72, 244, 32, 33),
(72, 244, 32, 34),
(72, 244, 32, 35),
(72, 244, 32, 36),

(72, 244, 32, 43),
(72, 244, 32, 44),
(72, 242, 32, 45),
(72, 242, 32, 46),
(72, 242, 32, 47),
(72, 242, 32, 48),

(74, 243, 32, 55),
(74, 243, 32, 56),
(74, 243, 32, 57),
(74, 243, 32, 58),
(74, 243, 32, 59),
(74, 243, 32, 60),


-- Nivel 500 (Aula ID 27)
(74, 248, 27, 7),
(74, 248, 27, 8),
(74, 248, 27, 9),
(74, 248, 27, 10),
(74, 248, 27, 11),
(74, 248, 27, 12),

(76, 249, 27, 19),
(76, 249, 27, 20),
(70, 251, 27, 21),
(70, 251, 27, 22),
(71, 253, 27, 23),
(71, 253, 27, 24),

(73, 252, 27, 31),
(73, 252, 27, 32),
(73, 252, 27, 33),
(73, 252, 27, 34),
(73, 252, 27, 35),
(73, 252, 27, 36),

(78, 254, 27, 43),
(78, 254, 27, 44),
(78, 254, 27, 45),
(78, 254, 27, 46),
(78, 254, 27, 47),
(78, 254, 27, 48),

(76, 249, 27, 55),
(76, 249, 27, 56),
(76, 250, 27, 57),
(76, 250, 27, 58),
(76, 250, 27, 59),
(76, 250, 27, 60),

-- Nivel 600 (Aula ID 28)
(79, 258, 28, 7),
(79, 258, 28, 8),
(79, 258, 28, 9),
(79, 258, 28, 10),
(79, 258, 28, 11),
(79, 258, 28, 12),

(78, 256, 28, 19),
(78, 256, 28, 20),
(78, 256, 28, 21),
(78, 256, 28, 22),
(78, 256, 28, 23),
(78, 256, 28, 24),

(79, 260, 28, 31),
(79, 260, 28, 32),
(77, 259, 28, 33),
(77, 259, 28, 34),
(77, 259, 28, 35),
(77, 259, 28, 36),

(79, 258, 28, 43),
(79, 258, 28, 44),
(79, 255, 28, 45),
(79, 255, 28, 46),
(79, 255, 28, 47),
(79, 255, 28, 48),

(78, 257, 28, 55),
(78, 257, 28, 56),
(78, 257, 28, 57),
(78, 257, 28, 58),
(78, 257, 28, 59),
(78, 257, 28, 60),

-- ELECTRICIDAD INDUSTRIAL
-- TURNO MAÑANA 
-- 100
(81, 262, 35, 1),
(81, 262, 35, 2),
(81, 262, 35, 3),
(81, 262, 35, 4),
(81, 262, 35, 5),
(81, 262, 35, 6),

(81, 262, 35, 13),
(81, 262, 35, 14),
(81, 263, 33, 15),
(81, 263, 33, 16),
(81, 263, 33, 17),
(81, 263, 33, 18),

(81, 265, 35, 25),
(81, 265, 35, 26),
(80, 266, 35, 27),
(80, 266, 35, 28),
(80, 266, 35, 29),
(80, 266, 35, 30),

(80, 261, 34, 37),
(80, 261, 34, 38),
(80, 261, 34, 39),
(80, 261, 34, 40),
(80, 261, 34, 41),
(80, 261, 34, 42),

(81, 264, 35, 49),
(81, 264, 35, 50),
(81, 264, 35, 51),
(81, 264, 35, 52),
(81, 265, 35, 53),
(81, 265, 35, 54),


-- TURNO NOCHE
-- 100
-- Nivel 100 (Aula ID 29)
(82, 261, 33, 7),
(82, 261, 33, 8),
(82, 261, 33, 9),
(82, 261, 33, 10),
(82, 261, 33, 11),
(82, 261, 33, 12),

(85, 265, 35, 19),
(85, 265, 35, 20),
(85, 265, 35, 21),
(85, 265, 35, 22),
(83, 262, 35, 23),
(83, 262, 35, 24),

(84, 263, 33, 31),
(84, 263, 33, 32),
(84, 263, 33, 33),
(84, 263, 33, 34),
(84, 263, 33, 35),
(84, 263, 33, 36),

(83, 262, 33, 43),
(83, 262, 33, 44),
(83, 262, 33, 45),
(83, 262, 33, 46),
(83, 262, 33, 47),
(83, 262, 33, 48),

(84, 264, 33, 55),
(84, 264, 33, 56),
(84, 266, 33, 57),
(84, 266, 33, 58),
(84, 266, 33, 59),
(84, 266, 33, 60),

-- Nivel 100 C
(83, 268, 35, 7),
(83, 268, 35, 8),
(83, 268, 35, 9),
(83, 268, 35, 10),
(83, 268, 35, 11),
(83, 268, 35, 12),

(84, 269, 33, 19),
(84, 269, 33, 20),
(84, 269, 33, 21),
(84, 269, 33, 22),
(85, 272, 33, 23),
(85, 272, 33, 24),

(85, 271, 35, 31),
(85, 271, 35, 32),
(85, 271, 35, 33),
(85, 271, 35, 34),
(85, 272, 33, 35),
(85, 272, 33, 36),

(82, 267, 34, 43),
(82, 267, 34, 44),
(82, 267, 34, 45),
(82, 267, 34, 46),
(82, 267, 34, 47),
(82, 267, 34, 48),

(83, 270, 34, 55),
(83, 270, 34, 56),
(83, 270, 34, 57),
(83, 270, 34, 58),
(83, 268, 35, 59),
(83, 268, 35, 60),

-- Nivel 200

(86, 274, 33, 7),
(86, 274, 33, 8),
(86, 274, 33, 9),
(86, 274, 33, 10),
(86, 274, 33, 11),
(86, 274, 33, 12),

(82, 273, 34, 19),
(82, 273, 34, 20),
(82, 273, 34, 21),
(82, 273, 34, 22),
(82, 273, 34, 23),
(82, 273, 34, 24),

(80, 276, 34, 31),
(80, 276, 34, 32),
(80, 276, 34, 33),
(80, 276, 34, 34),
(80, 275, 34, 35),
(80, 275, 34, 36),

(80, 275, 34, 43),
(80, 275, 34, 44),
(80, 275, 34, 45),
(80, 275, 34, 46),
(80, 275, 34, 47),
(80, 275, 34, 48),

(86, 277, 37, 55),
(86, 277, 37, 56),
(86, 277, 37, 57),
(86, 277, 37, 58),
(86, 274, 33, 59),
(86, 274, 33, 60),

-- Nivel 300 (Aula ID 31)
(88, 281, 38, 7),
(88, 281, 38, 8),
(88, 281, 38, 9),
(88, 281, 38, 10),
(88, 281, 38, 11),
(88, 281, 38, 12),

(87, 280, 38, 19),
(87, 280, 38, 20),
(87, 280, 38, 21),
(87, 280, 38, 22),
(89, 282, 38, 23),
(89, 282, 38, 24),

(86, 284, 38, 31),
(86, 284, 38, 32),
(86, 279, 38, 33),
(86, 279, 38, 34),
(86, 279, 38, 35),
(86, 279, 38, 36),

-- (66, 66, 38, 43), -- SIN CLASES
-- (66, 66, 38, 44), -- SIN CLASES
(87, 278, 38, 45),
(87, 278, 38, 46),
(87, 278, 38, 47),
(87, 278, 38, 48),

(88, 281, 38, 55),
(88, 281, 38, 56),
(85, 283, 38, 57),
(85, 283, 38, 58),
(85, 283, 38, 59),
(85, 283, 38, 60),

(89, 282, 32, 77),
(89, 282, 32, 78),

-- Nivel 400 (Aula ID 32)
(87, 286, 37, 7),
(87, 286, 37, 8),
(87, 288, 37, 9),
(87, 288, 37, 10),
(87, 288, 37, 11),
(87, 288, 37, 12),

(90, 290, 39, 19),
(90, 290, 39, 20),
(90, 290, 39, 21),
(90, 290, 39, 22),
(87, 286, 37, 23),
(87, 286, 37, 24),

(91, 287, 39, 31),
(91, 287, 39, 32),
(91, 287, 39, 33),
(91, 287, 39, 34),
(91, 287, 39, 35),
(91, 287, 39, 36),

(87, 285, 39, 43),
(87, 285, 39, 44),
-- SIN CLASES
-- SIN CLASES
-- SIN CLASES
-- SIN CLASES

(87, 285, 39, 55),
(87, 285, 39, 56),
(91, 287, 39, 57),
(91, 287, 39, 58),
(91, 287, 39, 59),
(91, 287, 39, 60),

(89, 287, 36, 67),
(89, 287, 36, 68),
(89, 287, 36, 69),
(89, 287, 36, 70),


-- Nivel 500 (Aula ID 27)
(90, 291, 39, 7),
(90, 291, 39, 8),
(90, 291, 39, 9),
(90, 291, 39, 10),
(90, 291, 39, 11),
(90, 291, 39, 12),

(89, 293, 37, 19),
(89, 293, 37, 20),
(89, 293, 37, 21),
(89, 293, 37, 22),
(84, 295, 37, 23),
(84, 295, 37, 24),

(89, 293, 37, 31),
(89, 293, 37, 32),
(88, 294, 37, 33),
(88, 294, 37, 34),
(88, 294, 37, 35),
(88, 294, 37, 36),

(89, 293, 37, 43),
(89, 293, 37, 44),
(89, 293, 37, 45),
(89, 293, 37, 46),
(89, 293, 37, 47),
(89, 293, 37, 48),

(85, 296, 38, 55),
(85, 296, 38, 56),
(90, 292, 38, 57),
(90, 292, 38, 58),
(90, 292, 38, 59),
(90, 292, 38, 60),

-- Nivel 600 (Aula ID 28)
(92, 298, 41, 7),
(92, 298, 41, 8),
(92, 298, 41, 9),
(92, 298, 41, 10),
(92, 298, 41, 11),
(92, 298, 41, 12),

(92, 299, 41, 19),
(92, 299, 41, 20),
(92, 299, 41, 21),
(92, 299, 41, 22),
(92, 299, 41, 23),
(92, 299, 41, 24),

(90, 297, 40, 31),
(90, 297, 40, 32),
(90, 297, 40, 33),
(90, 297, 40, 34),
(90, 297, 40, 35),
(90, 297, 40, 36),

(91, 300, 41, 43),
(91, 300, 41, 44),
(91, 300, 41, 45),
(91, 300, 41, 46),
(91, 300, 41, 47),
(91, 300, 41, 48),

(91, 302, 41, 55),
(91, 302, 41, 56),
(88, 301, 41, 57),
(88, 301, 41, 58),
(88, 301, 41, 59),
(88, 301, 41, 60);















