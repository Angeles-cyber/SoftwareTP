<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Vacunas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #80a7ce;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .table-container {
            max-width: 1200px;
            margin: auto;
        }
        .btn {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <!-- Barra de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema de Administración</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="Principal.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pacientes.html">Pacientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="vacunas.html">Vacunas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="doctores.html">Doctores</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenedor de Tabla -->
    <div class="table-container">
        <h2 class="text-center mb-4">Listado de Vacunas</h2>
        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-primary">Agregar Vacuna</button>
        </div>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Fabricante</th>
                    <th>Dosis Requeridas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Pfizer-BioNTech</td>
                    <td>Pfizer</td>
                    <td>2</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Moderna</td>
                    <td>Moderna, Inc.</td>
                    <td>2</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>AstraZeneca</td>
                    <td>AstraZeneca</td>
                    <td>2</td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Editar</a>
                        <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pie de Página -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">&copy; 2024 Sistema de Administración. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
