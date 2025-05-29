<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Principal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ffffff;
        }
        .card {
            border: none;
            border-radius: 10px;
        }
        .card h5 {
            font-size: 1.25rem;
        }
        .main-container {
            max-width: 1200px;
            margin: auto;
        }
    </style>
</head>
<body>
    
    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Panel de Administración</a>
        </div>
    </nav>
        <!-- Sección Banner -->
        <section class="banner-section">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <img src="Imagenes/Banner.png" class="img-fluid" alt="Banner" style="width: 100%; height: 300px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </section>

    <!-- Sección Principal -->
    <div class="container main-container py-5">
        <h2 class="text-center mb-4">Acceso Rápido</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card bg-primary text-white text-center">
                    <div class="card-body">
                        <h5 class="card-title">Vacunas</h5>
                        <p class="card-text">Gestiona y registra las vacunas disponibles.</p>
                        <button class="btn btn-light" onclick="window.location.href='vacunas.html'">Acceder</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-secondary text-white text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pacientes</h5>
                        <p class="card-text">Consulta y administra la lista de pacientes.</p>
                        <button class="btn btn-light" onclick="window.location.href='pacientes.html'">Acceder</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white text-center">
                    <div class="card-body">
                        <h5 class="card-title">Doctores</h5>
                        <p class="card-text">Consulta y gestiona la información de doctores.</p>
                        <button class="btn btn-light" onclick="window.location.href='doctores.html'">Acceder</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie de Página -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">&copy; 2024 Sistema de Administración. Todos los derechos reservados.</p>
    </footer>

    <!-- Vacunas -->
    <div class="d-none" id="vacunas-page">
        <div class="container mt-5">
            <h3>Registro de Vacunas</h3>
            <form>
                <div class="mb-3">
                    <label for="vaccine-name" class="form-label">Nombre de la Vacuna</label>
                    <input type="text" id="vaccine-name" class="form-control" placeholder="Ingrese el nombre">
                </div>
                <div class="mb-3">
                    <label for="vaccine-description" class="form-label">Descripción</label>
                    <textarea id="vaccine-description" class="form-control" rows="3" placeholder="Ingrese una descripción"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
    </div>

    <!-- Pacientes -->
    <div class="d-none" id="pacientes-page">
        <div class="container mt-5">
            <h3>Listado de Pacientes</h3>
            <ul class="list-group">
                <li class="list-group-item">Paciente 1</li>
                <li class="list-group-item">Paciente 2</li>
                <li class="list-group-item">Paciente 3</li>
            </ul>
        </div>
    </div>

    <!-- Doctores -->
    <div class="d-none" id="doctores-page">
        <div class="container mt-5">
            <h3>Listado de Doctores</h3>
            <ul class="list-group">
                <li class="list-group-item">Doctor 1</li>
                <li class="list-group-item">Doctor 2</li>
                <li class="list-group-item">Doctor 3</li>
            </ul>
        </div>
    </div>

    <script>
        function navigateTo(sectionId) {
            document.querySelectorAll(".d-none, .container").forEach(section => {
                section.style.display = "none";
            });
            document.getElementById(sectionId).style.display = "block";
        }
    </script>
</body>
</html>
