DROP DATABASE IF EXISTS BD_UNI;
CREATE DATABASE BD_UNI;
USE BD_UNI;

-- Tabla Usuario
CREATE TABLE Usuario (
    UsuarioID INT AUTO_INCREMENT PRIMARY KEY,
    NombreCompleto VARCHAR(50) NOT NULL,
    Identidad VARCHAR(20) UNIQUE NOT NULL,
    Correo VARCHAR(255) UNIQUE NOT NULL,
    Pass VARCHAR(50) NOT NULL,
    Telefono VARCHAR(20)
);

-- Tabla Facultad
CREATE TABLE Facultad (
    FacultadID INT AUTO_INCREMENT PRIMARY KEY,
    NombreFacultad VARCHAR(255) NOT NULL,
    Decano INT,
    FOREIGN KEY (Decano) REFERENCES Usuario(UsuarioID)
);

-- Tabla Centro Regional
CREATE TABLE CentroRegional (
    CentroRegionalID INT AUTO_INCREMENT PRIMARY KEY,
    NombreCentro VARCHAR(255) NOT NULL,
    Ubicacion TEXT NOT NULL,
    Telefono VARCHAR(20),
    Correo VARCHAR(255)
);

-- Tabla Carrera
CREATE TABLE Carrera (
    CarreraID INT AUTO_INCREMENT PRIMARY KEY,
    NombreCarrera VARCHAR(255) NOT NULL,
    Duracion INT NOT NULL,
    Nivel VARCHAR(50) NOT NULL,
    FacultadID INT NOT NULL,
    CentroRegionalID INT NOT NULL,
    FOREIGN KEY (FacultadID) REFERENCES Facultad(FacultadID),
    FOREIGN KEY (CentroRegionalID) REFERENCES CentroRegional(CentroRegionalID)
);

-- Tabla Admisión
CREATE TABLE Admision (
    AdmisionID INT AUTO_INCREMENT PRIMARY KEY,
    UsuarioID INT UNIQUE,
    FechaSolicitud DATE NOT NULL,
    Estado ENUM('Pendiente', 'Aprobada', 'Rechazada') NOT NULL,
    CarreraID INT NOT NULL,
    CarreraAlternativaID INT,
    CertificadoSecundaria TEXT,
    Observaciones TEXT,
    FOREIGN KEY (UsuarioID) REFERENCES Usuario(UsuarioID),
    FOREIGN KEY (CarreraID) REFERENCES Carrera(CarreraID),
    FOREIGN KEY (CarreraAlternativaID) REFERENCES Carrera(CarreraID)
);

-- Tabla Estudiante
CREATE TABLE Estudiante (
    EstudianteID INT AUTO_INCREMENT PRIMARY KEY,
    UsuarioID INT UNIQUE,
    CarreraID INT NOT NULL,
    CentroRegionalID INT NOT NULL,
    CorreoInstitucional VARCHAR(255) UNIQUE NOT NULL,
    NumeroCuenta VARCHAR(50) UNIQUE NOT NULL,
    FOREIGN KEY (UsuarioID) REFERENCES Usuario(UsuarioID),
    FOREIGN KEY (CarreraID) REFERENCES Carrera(CarreraID),
    FOREIGN KEY (CentroRegionalID) REFERENCES CentroRegional(CentroRegionalID)
);

-- Tabla Docente
CREATE TABLE Docente (
    DocenteID INT AUTO_INCREMENT PRIMARY KEY,
    UsuarioID INT UNIQUE,
    NumeroCuenta VARCHAR(50) UNIQUE NOT NULL,
    CentroRegionalID INT NOT NULL,
    FOREIGN KEY (UsuarioID) REFERENCES Usuario(UsuarioID),
    FOREIGN KEY (CentroRegionalID) REFERENCES CentroRegional(CentroRegionalID)
);

-- Tabla Coordinador
CREATE TABLE Coordinador (
    CoordinadorID INT AUTO_INCREMENT PRIMARY KEY,
    DocenteID INT UNIQUE,
    DepartamentoID INT NOT NULL,
    FOREIGN KEY (DocenteID) REFERENCES Docente(DocenteID)
);

-- Tabla Categoria Libro
CREATE TABLE CategoriaLibro (
    CategoriaID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL
);

-- Tabla Biblioteca
CREATE TABLE Biblioteca (
    LibroID INT AUTO_INCREMENT PRIMARY KEY,
    Titulo VARCHAR(255) NOT NULL,
    Autor VARCHAR(255) NOT NULL,
    CategoriaLibroID INT NOT NULL,
    ArchivoPDF TEXT,
    FOREIGN KEY (CategoriaLibroID) REFERENCES CategoriaLibro(CategoriaID)
);

-- Tabla Sección
CREATE TABLE Seccion (
    SeccionID INT AUTO_INCREMENT PRIMARY KEY,
    Asignatura VARCHAR(255) NOT NULL,
    DocenteID INT NOT NULL,
    PeriodoAcademico VARCHAR(50) NOT NULL,
    Aula VARCHAR(50),
    Horario VARCHAR(100),
    CupoMaximo INT NOT NULL,
    FOREIGN KEY (DocenteID) REFERENCES Docente(DocenteID)
);

-- Tabla Matrícula
CREATE TABLE Matricula (
    MatriculaID INT AUTO_INCREMENT PRIMARY KEY,
    EstudianteID INT NOT NULL,
    SeccionID INT NOT NULL,
    FechaInscripcion DATE NOT NULL,
    EstadoMatricula ENUM('Activo', 'Inactivo') NOT NULL,
    FOREIGN KEY (EstudianteID) REFERENCES Estudiante(EstudianteID),
    FOREIGN KEY (SeccionID) REFERENCES Seccion(SeccionID)
);

-- Tabla Notas
CREATE TABLE Notas (
    NotaID INT AUTO_INCREMENT PRIMARY KEY,
    EstudianteID INT NOT NULL,
    SeccionID INT NOT NULL,
    Calificacion DECIMAL(5,2) NOT NULL,
    FOREIGN KEY (EstudianteID) REFERENCES Estudiante(EstudianteID),
    FOREIGN KEY (SeccionID) REFERENCES Seccion(SeccionID)
);

-- Insertar Usuarios
INSERT INTO Usuario (NombreCompleto, Identidad, Correo, Pass, Telefono) 
VALUES 
('Juan Pérez', '0801199901234', 'juan.perez@gmail.com', 'clave123', '98765432'),
('María López', '0802199505678', 'maria.lopez@gmail.com', 'pass456', '99887766');

-- Insertar Centros Regionales
INSERT INTO CentroRegional (NombreCentro, Ubicacion, Telefono, Correo) 
VALUES 
('Centro Regional Tegucigalpa', 'Tegucigalpa, Honduras', '22334455', 'info@uniteg.hn');

-- Insertar Facultades
INSERT INTO Facultad (NombreFacultad, Decano) 
VALUES 
('Facultad de Ingeniería', 2),
('Facultad de Ciencias Económicas', NULL);

-- Insertar Carreras
INSERT INTO Carrera (NombreCarrera, Duracion, Nivel, FacultadID, CentroRegionalID) 
VALUES 
('Ingeniería en Sistemas', 5, 'Licenciatura', 1, 1),
('Administración de Empresas', 4, 'Licenciatura', 2, 1);

-- Insertar Estudiantes
INSERT INTO Estudiante (UsuarioID, CarreraID, CentroRegionalID, CorreoInstitucional, NumeroCuenta) 
VALUES 
(1, 1, 1, 'juan.perez@uniteg.hn', '2023123456');

-- Insertar Docentes
INSERT INTO Docente (UsuarioID, NumeroCuenta, CentroRegionalID) 
VALUES 
(2, 'DOC-456789', 1);
