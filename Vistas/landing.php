<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Registro UNAH</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
     <link rel="stylesheet" href="/Poryecto-Ingenieria-de-Software/Modelos/public/css/landing.css">
    
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
    
        <a class="navbar-brand" href="#">
            <img src="/Poryecto-Ingenieria-de-Software/Modelos/public/images/puma.png" alt="Logo UNAH" style="height: 40px; margin-right: 10px;">
            UNAH Registro
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#matricula">Matrícula</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#biblioteca">Biblioteca Virtual</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#docentes">Docentes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formulario_admisiones.php">Admisiones</a>
                    </li>
                    <li>
                    <a class="nav-link btn btn-warning" href="login.php">Acceder</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Bienvenido al Sistema de Registro UNAH</h1>
            <p class="lead">Accede a los servicios de matrícula, biblioteca, docentes y admisiones.</p>
            <a href="#matricula" class="btn btn-light btn-lg">Comienza Aquí</a>
        </div>
    </section>

    <section id="matricula" class="py-5 ">
        <div class="container text-center">
            <h2>Matricula</h2>
            <p>Realiza tu matrícula, consulta tu historial académico y registra tus cursos.</p>
            
            <!-- Accordion para Matrícula -->
            <div class="accordion" id="accordionMatricula">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMatricula" aria-expanded="true" aria-controls="collapseMatricula">
                            Calendario de Matricula
                        </button>
                    </h2>
                    <div id="collapseMatricula" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionMatricula">
                        <div class="accordion-body">
                            Aquí puedes acceder a todos los servicios relacionados con tu matrícula, como registrar cursos y consultar tu historial académico.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="biblioteca" class="py-5">
        <div class="container text-center">
            <h2>Biblioteca Virtual</h2>
            <p>Accede a la vasta colección de recursos académicos y materiales digitales de nuestra biblioteca virtual.</p>
            
            <!-- Accordion para Biblioteca -->
            <div class="accordion" id="accordionBiblioteca">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBiblioteca" aria-expanded="false" aria-controls="collapseBiblioteca">
                            Explorar Biblioteca
                        </button>
                    </h2>
                    <div id="collapseBiblioteca" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionBiblioteca">
                        <div class="accordion-body">
                            Explora todos los recursos académicos disponibles, incluyendo libros, artículos, y más en nuestra biblioteca digital.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="docentes" class="py-5">
        <div class="container text-center">
            <h2>Docentes</h2>
            <p>Consulta la información de los docentes, horarios de clases y recursos relacionados para tu mejor preparación.</p>
            
            <!-- Accordion para Docentes -->
            <div class="accordion" id="accordionDocentes">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDocentes" aria-expanded="false" aria-controls="collapseDocentes">
                            Ver Docentes
                        </button>
                    </h2>
                    <div id="collapseDocentes" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionDocentes">
                        <div class="accordion-body">
                            Encuentra información detallada sobre los docentes, sus materias y horarios.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="admisiones" class="py-5">
        <div class="container text-center">
            <h2>Admisiones</h2>
            <p>Infórmate sobre los requisitos de admisión, fechas y cómo puedes iniciar tu proceso de ingreso a la UNAH.</p>
            
            <!-- Accordion para Admisiones -->
            <div class="accordion" id="accordionAdmisiones">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdmisiones" aria-expanded="false" aria-controls="collapseAdmisiones">
                        LA PRUEBA HONDUREÑA UNIVERSITARIA DE MEDICIÓN ACADÉMICA (PHUMA)
                        </button>
                    </h2>
                    <div id="collapseAdmisiones" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionAdmisiones">
                        <div class="accordion-body">
    <p  style="text-align: justify;">La Prueba Hondureña Universitaria de Medición Académica (PHUMA).

La prueba de admisión evalúa las Competencias Académicas en cuatro entornos fundamentales y un componente denominado habilidades blandas que en conjunto permiten predecir un adecuado desempeño en su trayectoria de la educación superior:

Competencias Comunicativas (español)
Competencias Matemáticas
Competencias del Entorno Natural (Ciencias Naturales)
Competencias del Entorno Social (Ciencias Sociales)
Habilidades blandas.
La prueba de admisión PHUMA es un instrumento que permite seleccionar de manera objetiva y con fundamento estadístico confiable a los nuevos estudiantes de la UNAH.
                        </div></p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-white text-center py-4">
        <p>&copy; 2025 Universidad Nacional Autónoma de Honduras | Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
