USE BD_UNI;

-- Tabla Usuario
CREATE TABLE Usuario (
    UsuarioID INT AUTO_INCREMENT PRIMARY KEY,
    NombreCompleto VARCHAR(255) NOT NULL,
    Identidad VARCHAR(20) UNIQUE NOT NULL,
    CorreoPersonal VARCHAR(255) UNIQUE NOT NULL,
    Telefono VARCHAR(20),
    Rol ENUM('Aspirante', 'Estudiante', 'Docente', 'Administrador') NOT NULL
);

-- Tabla Centro Regional
CREATE TABLE CentroRegional (
    CentroRegionalID INT AUTO_INCREMENT PRIMARY KEY,
    NombreCentro VARCHAR(255) NOT NULL,
    Ubicacion TEXT NOT NULL,
    Telefono VARCHAR(20),
    Correo VARCHAR(255)
);

-- Tabla Categoria Libro
CREATE TABLE CategoriaLibro (
    CategoriaID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL
);

-- Tabla Facultad
CREATE TABLE Facultad (
    FacultadID INT AUTO_INCREMENT PRIMARY KEY,
    NombreFacultad VARCHAR(255) NOT NULL,
    Decano INT,
    FOREIGN KEY (Decano) REFERENCES Usuario(UsuarioID)
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


-- Tabla Biblioteca
CREATE TABLE Biblioteca (
    LibroID INT AUTO_INCREMENT PRIMARY KEY,
    Titulo VARCHAR(255) NOT NULL,
    Autor VARCHAR(255) NOT NULL,
    CategoriaLibroID INT NOT NULL,
    ArchivoPDF TEXT,
    FOREIGN KEY (CategoriaLibroID) REFERENCES CategoriaLibro(CategoriaID)
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

-- Tabla Notas
CREATE TABLE Notas (
    NotaID INT AUTO_INCREMENT PRIMARY KEY,
    EstudianteID INT NOT NULL,
    SeccionID INT NOT NULL,
    Calificacion DECIMAL(5,2) NOT NULL,
    FOREIGN KEY (EstudianteID) REFERENCES Estudiante(EstudianteID),
    FOREIGN KEY (SeccionID) REFERENCES Seccion(SeccionID)
);
