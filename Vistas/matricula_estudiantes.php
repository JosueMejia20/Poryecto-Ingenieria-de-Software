<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrícula Estudiantil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style_matricula_estudiantes.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">UNAH Matricula</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#matricula">Matrícula</a></li>
                    <li class="nav-item"><a class="nav-link" href="#historial">Historial</a></li>
                    <li class="nav-item"><a class="nav-link" href="#asignaturas">Lista Asignaturas</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container_secciones">
        <div class="informacion_asignatura">
            <div class="titulos"><p>Selecciona la Asignatura</p></div>
            <label for="asignatura" class="form-label">
                <i class="bi bi-clipboard-check"></i>
                <select id="asignatura" class="form-select" aria-label="Selecciona una asignatura">
                    <option disabled selected>Seleccione una carrera</option>
                    <option value="sistemas">Ingeniería en Sistemas</option>
                    <option value="civil">Ingeniería Civil</option>
                    <option value="derecho">Derecho</option>
                    <option value="lenguas">Lenguas Extranjeras</option>
                    <option value="mercadotecnia">Mercadotecnia</option>
                    <option value="arquitectura">Arquitectura</option>
                </select>
            </label>
        </div>

        <div class="informacion_seccion">
            <div class="titulos"><p>Seleccione la Sección</p></div>
            <label for="seccion" class="form-label">
                <i class="bi bi-list-ul"></i>
                <select id="seccion" class="form-select" aria-label="Selecciona una sección">
                    <option disabled selected>Seleccione una sección</option>
                </select>
            </label>
        </div>

        <div class="informacion_docente">
            <div class="titulos"><p>Seleccione el Docente</p></div>
            <label for="docente" class="form-label">
                <i class="bi bi-person-check"></i>
                <select id="docente" class="form-select" aria-label="Selecciona un docente">
                    <option disabled selected>Seleccione un docente</option>
                    <option value="gomez">Dr. Gómez</option>
                    <option value="perez">Mtra. Pérez</option>
                    <option value="lopez">Ing. López</option>
                </select>
            </label>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Universidad Nacional Autónoma de Honduras | Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const asignaturas = {
            sistemas: ["Sección 101", "Sección 102", "Sección 103"],
            civil: ["Sección 201", "Sección 202", "Sección 203"],
            derecho: ["Sección 301", "Sección 302", "Sección 303"],
            lenguas: ["Sección 401", "Sección 402", "Sección 403"],
            mercadotecnia: ["Sección 501", "Sección 502", "Sección 503"],
            arquitectura: ["Sección 601", "Sección 602", "Sección 603"]
        };

        document.getElementById("asignatura").addEventListener("change", function() {
            const seccionSelect = document.getElementById("seccion");
            seccionSelect.innerHTML = '<option disabled selected>Seleccione una sección</option>';
            
            const selectedAsignatura = this.value;
            if (asignaturas[selectedAsignatura]) {
                asignaturas[selectedAsignatura].forEach(seccion => {
                    const option = document.createElement("option");
                    option.value = seccion.toLowerCase().replace(/\s+/g, '');
                    option.textContent = seccion;
                    seccionSelect.appendChild(option);
                });
            }
        });
    </script>
</body>
</html>