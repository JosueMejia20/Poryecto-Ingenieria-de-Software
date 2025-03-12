<?php


?>


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
            <p class="lead">Accede a los servicios de matrícula, biblioteca, docentes y admisiones de forma fácil y rápida.</p>
            <a href="#matricula" class="btn btn-light btn-lg">Comienza Aquí</a>
        </div>
    </section>


    <section id="matricula" class="py-5 ">
        <div class="container text-center">
            <h2>Matrícula</h2>
            <p>Realiza tu matrícula de manera rápida y sencilla. Consulta tu historial académico y registra tus cursos.</p>
            <a href="#" class="btn btn-primary">Acceder a Matrícula</a>
        </div>
    </section>


    <section id="biblioteca" class="py-5">
        <div class="container text-center">
            <h2>Biblioteca Virtual</h2>
            <p>Accede a la vasta colección de recursos académicos y materiales digitales de nuestra biblioteca virtual.</p>
            <a href="#" class="btn btn-primary">Explorar Biblioteca</a>
        </div>
    </section>


    <section id="docentes" class="py-5">
        <div class="container text-center">
            <h2>Docentes</h2>
            <p>Consulta la información de los docentes, horarios de clases y recursos relacionados para tu mejor preparación.</p>
            <a href="#" class="btn btn-primary">Ver Docentes</a>
        </div>
    </section>

    <section id="admisiones" class="py-5">
        <div class="container text-center">
            <h2>Admisiones</h2>
            <p>Infórmate sobre los requisitos de admisión, fechas y cómo puedes iniciar tu proceso de ingreso a la UNAH.</p>
            <a href="formulario_admisiones.php" class="btn btn-primary">Iniciar Admisión</a>
        </div>
    </section>


    <footer class="text-white text-center py-4">
        <p>&copy; 2025 Universidad Nacional Autónoma de Honduras | Todos los derechos reservados</p>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>