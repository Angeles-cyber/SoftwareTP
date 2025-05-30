<?php
// vacunas.php
include('../../Conexion.php');

$mensaje = "";

// ——————————————————
// 1) Procesar eliminación si se recibe ID por GET
// ——————————————————
if (isset($_GET['eliminar'])) {
    $idEliminar = intval($_GET['eliminar']);
    $link->query("DELETE FROM vacunas WHERE id = $idEliminar");
    header("Location: vacunas.php");
    exit();
}

// ——————————————————
// 2) Procesar inserción si se recibe formulario POST (agregar vacuna)
// ——————————————————
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre'])) {
    $nombre      = trim($_POST['nombre']);
    $fabricante  = trim($_POST['fabricante']);
    $dosis       = intval($_POST['dosis']);

    $stmt = $link->prepare("
        INSERT INTO vacunas (Nombre, Fabricante, Vacu_disp)
        VALUES (?, ?, ?)
    ");
    $stmt->bind_param("ssi", $nombre, $fabricante, $dosis);

    if (! $stmt->execute()) {
        $mensaje = "Error al agregar la vacuna: " . $link->error;
    }

    // Evita resubmit al refrescar
    header("Location: vacunas.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Vacunas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .table-container { max-width: 1200px; margin: auto; }
        .btn { font-size: 0.875rem; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistema para los Pacientes</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="Principal.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="vacunas.php">Vacunas</a></li>
                <li class="nav-item"><a class="nav-link" href="Citas.php">Citas</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 table-container">
    <h2 class="text-center mb-4">Listado de Vacunas</h2>

    <?php if ($mensaje): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($mensaje) ?></div>
    <?php endif; ?>

    <div class="d-flex justify-content-end mb-3">
        <!-- Botón para abrir el modal de AGREGAR VACUNA -->
        
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Vacuna</th>
                <th>Dosis Disponibles</th>
                <th>Doctor</th>
                <th>Teléfono</th>
                <th>Especialidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Producto cartesiano original; si tienes relación, cámbialo por JOIN
        $servicios = $link->query("SELECT vacunas.id, vacunas.Nombre, vacunas.Vacu_disp, doctores.NombreDoc, doctores.Telefono, doctores.Especialidad
                                   FROM vacunas
                                   CROSS JOIN doctores");
        if ($servicios && $servicios->num_rows > 0):
            while ($row = $servicios->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['Nombre']) ?></td>
                <td><?= $row['Vacu_disp'] ?></td>
                <td><?= htmlspecialchars($row['NombreDoc']) ?></td>
                <td><?= htmlspecialchars($row['Telefono']) ?></td>
                <td><?= htmlspecialchars($row['Especialidad']) ?></td>
                <td>
                    <!-- Eliminar -->
                    <a href="vacunas.php?eliminar=<?= $row['id'] ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('¿Seguro que deseas eliminar esta vacuna?');">
                        Eliminar
                    </a>
                    <!-- Separar Cita -->
                    <button
                        class="btn btn-success btn-sm ms-1 btn-separar"
                        data-bs-toggle="modal"
                        data-bs-target="#modalCita"
                        data-id="<?= $row['id'] ?>"
                        data-vacuna="<?= htmlspecialchars($row['Nombre']) ?>"
                        data-doctor="<?= htmlspecialchars($row['NombreDoc']) ?>"
                        data-especialidad="<?= htmlspecialchars($row['Especialidad']) ?>"
                    >
                        Separar Cita
                    </button>
                </td>
            </tr>
        <?php
            endwhile;
        else:
        ?>
            <tr><td colspan="7" class="text-center">No se encontraron registros.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal Agregar Vacuna -->
<div class="modal fade" id="modalVacuna" tabindex="-1" aria-labelledby="modalVacunaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalVacunaLabel">Agregar Nueva Vacuna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
          <label for="dosis" class="form-label">Dosis Disponibles</label>
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

<!-- Modal Separar Cita -->
<div class="modal fade" id="modalCita" tabindex="-1" aria-labelledby="modalCitaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="procesar_cita.php" method="POST" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCitaLabel">Separar Cita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <!-- Campos ocultos / precargados -->
        <input type="hidden" name="doctor_nombre" id="doctor_nombre">
        <input type="hidden" name="especialidad" id="doctor_especialidad">

        <!-- Vacuna no es necesario, pero si la quieres-->
        <input type="hidden" name="vacuna_id" id="vacuna_id">

        <!-- Fecha de la cita -->
        <div class="mb-3">
          <label for="fecha" class="form-label">Fecha de la Cita</label>
          <input type="date" class="form-control" id="fecha" name="fecha" required>
        </div>
        <!-- Hora de atención -->
        <div class="mb-3">
          <label for="hora" class="form-label">Hora de Atención</label>
          <input type="time" class="form-control" id="hora" name="hora" required>
        </div>
        <!-- Aviso / Instrucciones -->
        <div class="mb-3">
          <label for="aviso" class="form-label">Aviso / Instrucciones</label>
          <textarea class="form-control" id="aviso" name="aviso" rows="2"
                    placeholder="Deje un mensaje para que lo vea su Doctor " required></textarea>
        </div>
        <!-- Si el paciente está logueado, podrías capturar su nombre/número de sesión aquí.
             Sino pedimos que lo ingrese manualmente: -->
        <div class="mb-3">
          <label for="paciente" class="form-label">Nombre del Paciente</label>
          <input type="text" class="form-control" id="paciente" name="paciente" required>
        </div>
        <div class="mb-3">
          <label for="documento" class="form-label">Número de Documento</label>
          <input type="text" class="form-control" id="documento" name="documento" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Confirmar Cita</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.querySelectorAll('.btn-separar').forEach(btn => {
    btn.addEventListener('click', () => {
      // Precargamos doctor, especialidad y vacuna si la necesitas
      document.getElementById('vacuna_id').value           = btn.dataset.id;
      document.getElementById('doctor_nombre').value       = btn.dataset.doctor;
      document.getElementById('doctor_especialidad').value = btn.dataset.especialidad;
      // Opcional: mostrar en campos disabled si prefieres verlos
      document.getElementById('vacuna_nombre').value    = btn.dataset.vacuna;
    });
  });
</script>

</body>
</html>
