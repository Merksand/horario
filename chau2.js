CREATE DATABASE InstitutoPrueba;
use InstitutoPrueba;
-- Tabla Docentes
CREATE TABLE Docentes (
    DocenteID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(50) NOT NULL,
    Apellido VARCHAR(50) NOT NULL
);

-- Tabla Carreras
CREATE TABLE Carreras (
    CarreraID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL
);

-- Tabla Materias
CREATE TABLE Materias (
    MateriaID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL,
    Codigo VARCHAR(30) NOT NULL,
    Nivel INT,
    CarreraID INT NOT NULL,
    FOREIGN KEY (CarreraID) REFERENCES Carreras(CarreraID)
);

-- Tabla Aulas
CREATE TABLE Aulas (
    AulaID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(10) NOT NULL
);

-- Tabla Horarios
CREATE TABLE Horarios (
    HorarioID INT PRIMARY KEY AUTO_INCREMENT,
    Periodo INT,
    Dia VARCHAR(10) NOT NULL,
    HoraInicio TIME NOT NULL,
    HoraFin TIME NOT NULL
);

-- Tabla DocenteMateria (Relación muchos a muchos)
CREATE TABLE DocenteMateria (
    DocenteID INT NOT NULL,
    MateriaID INT NOT NULL,
    AulaID INT NOT NULL,
    HorarioID INT NOT NULL,
    PRIMARY KEY (DocenteID, MateriaID, AulaID, HorarioID),
    FOREIGN KEY (DocenteID) REFERENCES Docentes(DocenteID),
    FOREIGN KEY (MateriaID) REFERENCES Materias(MateriaID),
    FOREIGN KEY (AulaID) REFERENCES Aulas(AulaID),
    FOREIGN KEY (HorarioID) REFERENCES Horarios(HorarioID)
);

CREATE TABLE Usuarios (
    UsuarioID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(20),
    Apellido VARCHAR(20),
    Usuario VARCHAR(20),
    Clave VARCHAR(20)
);