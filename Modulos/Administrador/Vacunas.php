<?php
include('../../Conexion.php');

$mensaje = "";

// Procesar eliminación si se recibe ID por GET
if (isset($_GET['eliminar'])) {
    $idEliminar = intval($_GET['eliminar']);
    $link->query("DELETE FROM vacunas WHERE id = $idEliminar");
    header("Location: vacunas.php");
    exit();
}

// Procesar inserción si se recibe formulario POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $fabricante = $_POST['fabricante'];
    $dosis = intval($_POST['dosis']);

    $stmt = $link->prepare("INSERT INTO vacunas (Nombre, Fabricante, Vacu_disp) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nombre, $fabricante, $dosis);

    if ($stmt->execute()) {
        header("Location: vacunas.php");
        exit();
    } else {
        $mensaje = "Error al agregar la vacuna: " . $link->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Vacunas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
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

<!-- Barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistema de Administración</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="Principal.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="pacientes.php">Pacientes</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="vacunas.php">Vacunas</a></li>
                <li class="nav-item"><a class="nav-link" href="doctores.php">Doctores</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenido -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Listado de Vacunas</h2>

    <?php if ($mensaje): ?>
        <div class="alert alert-danger"><?= $mensaje ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-end mb-3">
        <!-- Botón para abrir el modal -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalVacuna">Agregar Vacuna</button>
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
            <?php 
            $servicios = $link->query("SELECT * FROM vacunas");

            if ($servicios && $servicios->num_rows > 0) {
                while ($row = $servicios->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["Nombre"] . "</td>";
                    echo "<td>" . $row["Fabricante"] . "</td>";
                    echo "<td>" . $row["Vacu_disp"] . "</td>";
                    echo "<td>
                            <a href='vacunas.php?eliminar=" . $row["id"] . "' 
                               class='btn btn-danger btn-sm'
                               onclick=\"return confirm('¿Estás seguro de que deseas eliminar esta vacuna?');\">
                               Eliminar
                            </a>
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

<!-- Modal para agregar vacuna -->
<div class="modal fade" id="modalVacuna" tabindex="-1" aria-labelledby="modalVacunaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalVacunaLabel">Agregar Nueva Vacuna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la Vacuna</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="fabricante" class="form-label">Fabricante</label>
                    <input type="text" class="form-control" id="fabricante" name="fabricante" required>
                </div>
                <div class="mb-3">
                    <label for="dosis" class="form-label">Dosis Requeridas</label>
                    <input type="number" class="form-control" id="dosis" name="dosis" min="1" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Guardar Vacuna</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
