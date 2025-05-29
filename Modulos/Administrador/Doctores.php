<?php
include('../../Conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Pacientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
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
                        <a class="nav-link" href="Principal.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pacientes.php">Pacientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vacunas.php">Vacunas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="doctores.php">Doctores</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenedor de Tabla -->
    <div class="container mt-9">
        <h2 class="text-center mb-1">Listado de Pacientes</h2>
        <div class="d-flex justify-content-end mb-3">
        </div>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre y Apellidos</th>
                    <th>Tipo de Documento</th>
                    <th>Numero de Documento</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Celular</th>
                    <th>Correo</th>
                    <th>Tipo de Seguro</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $servicios = $link->query("SELECT * FROM paciente");

                if ($servicios && $servicios->num_rows > 0) {
                    while ($row = $servicios->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["NombreApe"] . "</td>";
                        echo "<td>" . $row["TipoDocumento"] . "</td>";
                        echo "<td>" . $row["NumDocumento"] . "</td>";
                        echo "<td>" . $row["FechaNacimiento"] . "</td>";
                        echo "<td>" . $row["Celular"] . "</td>";
                        echo "<td>" . $row["Correo"] . "</td>";
                        echo "<td>" . $row["TipoSeguro"] . "</td>";
                        echo "<td>" . $row["Contraseña"] . "</td>";
                        echo "<td>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No se encontraron registros.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
