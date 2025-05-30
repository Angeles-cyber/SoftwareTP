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
        <a class="navbar-brand" href="#">Sistema de para los Pacientes</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="Principal.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="vacunas.php">Vacunas</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page"  href="Citas.php">Citas</a></li>
            </ul>
        </div>
    </div>
</nav>

    <!-- Contenedor de Tabla -->
    <div class="container mt-9">
        <h2 class="text-center mb-1">Listado de Citas</h2>
        <div class="d-flex justify-content-end mb-3">
        </div>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Nombre del Doctor</th>
                    <th>Especialidad</th>
                    <th>Hora de Atencion</th>
                    <th>Aviso</th>
                    <th>Nombre del Paciente</th>
                    <th>Numero de Documento</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $servicios = $link->query("SELECT * FROM cita");

                if ($servicios && $servicios->num_rows > 0) {
                    while ($row = $servicios->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["IdCita"] . "</td>";
                        echo "<td>" . $row["Fecha"] . "</td>";
                        echo "<td>" . $row["NombreDoctor"] . "</td>";
                        echo "<td>" . $row["Especialidad"] . "</td>";
                        echo "<td>" . $row["HoradeAtencion"] . "</td>";
                        echo "<td>" . $row["Aviso"] . "</td>";
                        echo "<td>" . $row["NombredelPaciente"] . "</td>";
                        echo "<td>" . $row["NumDocumento"] . "</td>";
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
