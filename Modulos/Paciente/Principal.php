<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Principal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('../../img/banner.jpeg');
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
            padding: 40px;
            border-radius: 120px;
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
            <a class="navbar-brand" href="#">Sistema para los Pacientes</a>
        </div>
    </nav>

    <!-- Sección Principal -->
    <div class="container main-container">
        <h2 class="text-center mb-5">SELECCIONE A DONDE QUIERE REDIRIGIRSE </h2>
        <div class="row g-4">
            <!-- Vacunas -->
            <div class="col-md-4">
                <div class="card bg-primary text-white text-center">
                    <div class="card-body">
                        <h5 class="card-title">Vacunas</h5>
                        <img src="../../img/vacuna_logo.jpg" alt="vacunas" style="width: 50%">
                        <p class="card-text mt-2">Regstre las vacunas que se encuentren disponibles.</p>
                        <button class="btn btn-light mt-2" onclick="window.location.href='vacunas.php'">Acceder</button>
                    </div>
                </div>
            </div>
            <!-- citas -->
            <div class="col-md-4">
                <div class="card bg-success text-white text-center">
                    <div class="card-body">
                        <h5 class="card-title">Citas</h5>
                        <img src="../../img/cita.jpg" alt="doctores" style="width: 63%">
                        <p class="card-text mt-2">Aqui podra ver las citas que tiene pendiente </p>
                        <button class="btn btn-light mt-2" onclick="window.location.href='Citas.php'">Acceder</button>
                    </div>
                </div>
            </div>
                <button class="btn btn-warning mt-2" onclick="window.location.href='../../index.php'">Regresar</button>
        </div>
    </div>

</body>
</html>
