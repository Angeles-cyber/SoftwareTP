<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Principal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('../../img/Banner.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            min-height: 100vh;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .card h5 {
            font-size: 1.25rem;
        }
        .main-container {
            max-width: 1200px;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 12px;
        }
        .navbar {
            margin-bottom: 0;
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

    <!-- Sección Principal -->
    <div class="container">
        <h2 class="text-center mb-5">Acceso Rápido</h2>
        <div class="row g-4">
            <!-- Vacunas -->
            <div class="col-md-4">
                <div class="card bg-primary text-white text-center">
                    <div class="card-body">
                        <h5 class="card-title">Vacunas</h5>
                        <img src="../../img/vacuna_logo.jpg" alt="vacunas" style="width: 50%">
                        <p class="card-text mt-2">Gestiona y registra las vacunas disponibles.</p>
                        <button class="btn btn-light mt-2" onclick="window.location.href='vacunas.php'">Acceder</button>
                    </div>
                </div>
            </div>
            <!-- Pacientes -->
            <div class="col-md-4">
                <div class="card bg-secondary text-white text-center">
                    <div class="card-body">
                        <h5 class="card-title">Pacientes</h5>
                        <img src="../../img/paciente.icon.png" alt="pacientes" style="width: 55%">
                        <p class="card-text mt-2">Consulta y administra la lista de pacientes.</p>
                        <button class="btn btn-light mt-2" onclick="window.location.href='pacientes.php'">Acceder</button>
                    </div>
                </div>
            </div>
            <!-- Doctores -->
            <div class="col-md-4">
                <div class="card bg-success text-white text-center">
                    <div class="card-body">
                        <h5 class="card-title">Doctores</h5>
                        <img src="../../img/Doctor.icon.png" alt="doctores" style="width: 55%">
                        <p class="card-text mt-2">Consulta y gestiona la información de doctores.</p>
                        <button class="btn btn-light mt-2" onclick="window.location.href='doctores.php'">Acceder</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
