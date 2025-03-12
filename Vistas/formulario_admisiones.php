<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admisiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style_formulario_admisiones.css">
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" id="nav_bar">
        <div class="container">
            <a class="navbar-brand" href="#">UNAH Registro</a>
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
                        <a class="nav-link" href="#admisiones">Admisiones</a>
                    </li>
                    <li>
                        <a class="nav-link" href="login.html">Acceder</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <section class="cuerpo_admisiones">
        <div class="container-form" id="Cuerpo_login">
            <div class="informacion">
                <div class="info-childs">
                    <h2>Se Parte de la UNAH</h2>
                    <p> 
                    </p>
                    <a href="landing.php">
                        <input type="button" value="Regresar">
                    </a>
                </div>
            </div>
            <dive class="form-informacion">
                <div class="form-informacion-child">
                    <h2>Proceso de Admision</h2>
                    <p>Le solicitamos ingresar datos correctos y verificables</p>
                    <form class="form">
                        <label>
                            <i class="bi bi-person"></i>
                            <input type="text" placeholder="Nuemero de Cuenta">
                        </label>
                        <label>
                            <input type="email" placeholder="Ingresar su correo">
                        </label>
                        <label>
                            <input type="nacionalidad" placeholder="Ingrese su nacionalidad">
                        </label>
                        <label>
                            <input type="numero_identidad" placeholder="Ingrese su numero de identidad">
                        </label>
                        <label>
                            <select name="" id="" placeholder="Seleccione una carrera">
                                <option value=""></option>
                                <option value="">Ingenieria en Sistemas</option>
                                <option value="">Ingenieria Civil</option>
                                <option value="">Derecho</option>
                                <option value="">Lenguas Extranjeras</option>
                                <option value="">Mercadotecnia</option>
                                <option value="">Arquitectura</option>
                            </select>
                        </label>
                        <input type="submit" value="Enviar">
                    </form>
                </div>
            </dive>
        </div>
        
    </section>
    
    
    
    
    <footer class="text-white text-center py-4">
        <p>&copy; 2025 Universidad Nacional Autónoma de Honduras | Todos los derechos reservados</p>
    </footer>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
    </script>
</body>
</html>