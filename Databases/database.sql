DROP DATABASE IF EXISTS BD_UNI;
CREATE DATABASE BD_UNI;
USE BD_UNI;

-- Tabla Usuario
CREATE TABLE Usuario (
    UsuarioID SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    NombreCompleto VARCHAR(50) NOT NULL,
    Identidad CHAR(13) UNIQUE NOT NULL,
    Correo VARCHAR(100) UNIQUE NOT NULL,
    Pass VARCHAR(50) NOT NULL,
    Telefono CHAR(8),
    INDEX idx_usuario_correo (Correo)
);

-- Tabla Facultad
CREATE TABLE Facultad (
    FacultadID TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    NombreFacultad VARCHAR(100) NOT NULL,
    Decano SMALLINT UNSIGNED,
    FOREIGN KEY (Decano) REFERENCES Usuario(UsuarioID),
    INDEX idx_facultad_nombre (NombreFacultad)
);

-- Tabla Centro Regional
CREATE TABLE CentroRegional (
    CentroRegionalID TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    NombreCentro VARCHAR(100) NOT NULL,
    Ubicacion VARCHAR(255) NOT NULL,
    Telefono CHAR(8),
    Correo VARCHAR(100),
    INDEX idx_centroregional_nombre (NombreCentro)
);

-- Tabla Carrera
CREATE TABLE Carrera (
    CarreraID TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    NombreCarrera VARCHAR(100) NOT NULL,
    Duracion TINYINT UNSIGNED NOT NULL,
    Nivel ENUM('Licenciatura', 'Ingeniería', 'Técnico') NOT NULL,
    FacultadID TINYINT UNSIGNED NOT NULL,
    CentroRegionalID TINYINT UNSIGNED NOT NULL,
    FOREIGN KEY (FacultadID) REFERENCES Facultad(FacultadID),
    FOREIGN KEY (CentroRegionalID) REFERENCES CentroRegional(CentroRegionalID),
    INDEX idx_carrera_nombre (NombreCarrera)
);

-- Tabla Admisión
CREATE TABLE Admision (
    AdmisionID SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    UsuarioID SMALLINT UNSIGNED UNIQUE,
    FechaSolicitud DATE NOT NULL,
    Estado ENUM('Pendiente', 'Aprobada', 'Rechazada') NOT NULL,
    CarreraID TINYINT UNSIGNED NOT NULL,
    CarreraAlternativaID TINYINT UNSIGNED,
    CertificadoSecundaria TEXT,
    Observaciones TEXT,
    FOREIGN KEY (UsuarioID) REFERENCES Usuario(UsuarioID),
    FOREIGN KEY (CarreraID) REFERENCES Carrera(CarreraID),
    FOREIGN KEY (CarreraAlternativaID) REFERENCES Carrera(CarreraID)
);

-- Tabla Estudiante
CREATE TABLE Estudiante (
    EstudianteID SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    UsuarioID SMALLINT UNSIGNED UNIQUE,
    CarreraID TINYINT UNSIGNED NOT NULL,
    CentroRegionalID TINYINT UNSIGNED NOT NULL,
    CorreoInstitucional VARCHAR(100) UNIQUE NOT NULL,
    NumeroCuenta CHAR(10) UNIQUE NOT NULL,
    FOREIGN KEY (UsuarioID) REFERENCES Usuario(UsuarioID),
    FOREIGN KEY (CarreraID) REFERENCES Carrera(CarreraID),
    FOREIGN KEY (CentroRegionalID) REFERENCES CentroRegional(CentroRegionalID)
);

-- Tabla Docente
CREATE TABLE Docente (
    DocenteID SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    UsuarioID SMALLINT UNSIGNED UNIQUE,
    NumeroCuenta CHAR(10) UNIQUE NOT NULL,
    CentroRegionalID TINYINT UNSIGNED NOT NULL,
    FOREIGN KEY (UsuarioID) REFERENCES Usuario(UsuarioID),
    FOREIGN KEY (CentroRegionalID) REFERENCES CentroRegional(CentroRegionalID)
);

-- Tabla Coordinador
CREATE TABLE Coordinador (
    CoordinadorID TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    DocenteID SMALLINT UNSIGNED UNIQUE,
    DepartamentoID TINYINT UNSIGNED NOT NULL,
    FOREIGN KEY (DocenteID) REFERENCES Docente(DocenteID)
);

-- Tabla Categoría Libro
CREATE TABLE CategoriaLibro (
    CategoriaID TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    INDEX idx_categoria_nombre (Nombre)
);

-- Tabla Biblioteca
CREATE TABLE Biblioteca (
    LibroID SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Titulo VARCHAR(150) NOT NULL,
    Autor VARCHAR(100) NOT NULL,
    CategoriaLibroID TINYINT UNSIGNED NOT NULL,
    ArchivoPDF TEXT,
    FOREIGN KEY (CategoriaLibroID) REFERENCES CategoriaLibro(CategoriaID)
);

-- Tabla Sección
CREATE TABLE Seccion (
    SeccionID SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Asignatura VARCHAR(100) NOT NULL,
    DocenteID SMALLINT UNSIGNED NOT NULL,
    PeriodoAcademico VARCHAR(20) NOT NULL,
    Aula VARCHAR(20),
    Horario VARCHAR(50),
    CupoMaximo TINYINT UNSIGNED NOT NULL,
    FOREIGN KEY (DocenteID) REFERENCES Docente(DocenteID)
);

-- Tabla Matrícula
CREATE TABLE Matricula (
    MatriculaID SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    EstudianteID SMALLINT UNSIGNED NOT NULL,
    SeccionID SMALLINT UNSIGNED NOT NULL,
    FechaInscripcion DATE NOT NULL,
    EstadoMatricula ENUM('Activo', 'Inactivo') NOT NULL,
    FOREIGN KEY (EstudianteID) REFERENCES Estudiante(EstudianteID),
    FOREIGN KEY (SeccionID) REFERENCES Seccion(SeccionID)
);

-- Tabla Notas
CREATE TABLE Notas (
    NotaID SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    EstudianteID SMALLINT UNSIGNED NOT NULL,
    SeccionID SMALLINT UNSIGNED NOT NULL,
    Calificacion DECIMAL(4,2) NOT NULL,
    FOREIGN KEY (EstudianteID) REFERENCES Estudiante(EstudianteID),
    FOREIGN KEY (SeccionID) REFERENCES Seccion(SeccionID)
);

-- Inserts para Usuario
INSERT INTO Usuario (NombreCompleto, Identidad, Correo, Pass, Telefono) VALUES
('Juan Pérez', '0801199901234', 'juan.perez@gmail.com', 'clave123', '98765432'),
('María López', '0802199505678', 'maria.lopez@gmail.com', 'pass456', '99887766');

-- Inserts para Centro Regional
INSERT INTO CentroRegional (NombreCentro, Ubicacion, Telefono, Correo) VALUES
('Centro Regional Tegucigalpa', 'Tegucigalpa, Honduras', '22334455', 'info@uniteg.hn');

-- Inserts para Facultad
INSERT INTO Facultad (NombreFacultad, Decano) VALUES
('Facultad de Ingeniería', 2),
('Facultad de Ciencias Económicas', NULL);

-- Inserts para Carrera
INSERT INTO Carrera (NombreCarrera, Duracion, Nivel, FacultadID, CentroRegionalID) VALUES
('Ingeniería en Sistemas', 5, 'Ingeniería', 1, 1),
('Administración de Empresas', 4, 'Licenciatura', 2, 1);

-- Inserts para Estudiante
INSERT INTO Estudiante (UsuarioID, CarreraID, CentroRegionalID, CorreoInstitucional, NumeroCuenta) VALUES
(1, 1, 1, 'juan.perez@uniteg.hn', '2023123456'),
(2, 2, 1, 'maria.lopez@uniteg.hn', '2023127890');

-- Inserts para Docente
INSERT INTO Docente (UsuarioID, NumeroCuenta, CentroRegionalID) VALUES
(2, 'DOC-456789', 1);

-- Inserts para Sección
INSERT INTO Seccion (Asignatura, DocenteID, PeriodoAcademico, Aula, Horario, CupoMaximo) VALUES
('Programación I', 1, '2024-1', 'A101', '08:00-10:00', 30),
('Contabilidad ', 1, '2024-1', 'B201', '10:00-12:00', 25);

-- Inserts para Matrícula
INSERT INTO Matricula (EstudianteID, SeccionID, FechaInscripcion, EstadoMatricula) VALUES
(1, 1, '2024-01-15', 'Activo'),
(2, 2, '2024-01-16', 'Activo');

-- Inserts para Notas
INSERT INTO Notas (EstudianteID, SeccionID, Calificacion) VALUES
(1, 1, 89.50),
(2, 2, 92.75);
