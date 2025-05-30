<?php
include('../../Conexion.php'); // define $link
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ya no necesitas crear la conexión aquí, solo usar $link

    $NombreApe       = trim($_POST['NombreApe']);
    $TipoDocumento   = trim($_POST['TipoDocumento']);
    $NumDocumento    = trim($_POST['NumDocumento']);
    $FechaNacimiento = trim($_POST['FechaNacimiento']);
    $Celular         = trim($_POST['Celular']);
    $Correo          = trim($_POST['Correo']);
    $TipoSeguro      = trim($_POST['TipoSeguro']);
    $Contraseña      = $Contraseña = trim($_POST['Contraseña']);

    $stmt = $link->prepare("SELECT id FROM paciente WHERE TipoDocumento = ? AND NumDocumento = ?");
    $stmt->bind_param("ss", $TipoDocumento, $NumDocumento);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $mensaje = "⚠️ El paciente ya está registrado.";
    } else {
        $sql = "INSERT INTO paciente (NombreApe, TipoDocumento, NumDocumento, FechaNacimiento, Celular, Correo, TipoSeguro, Contraseña) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("ssssssss", $NombreApe, $TipoDocumento, $NumDocumento, $FechaNacimiento, $Celular, $Correo, $TipoSeguro, $Contraseña);

        if ($stmt->execute()) {
            $mensaje = "✅ Paciente registrado correctamente.";
        } else {
            $mensaje = "❌ Error al registrar: " . $stmt->error;
        }
    }

    $stmt->close();
    $link->close();
}
?>






<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Paciente</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom, rgba(0, 247, 255, 0.84) 40%, #eeeeee 40%);
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .contenedor {
            text-align: center;
            padding-top: 60px;
        }

        .titulo {
            color: white;
            font-size: 24px;
            margin-bottom: 40px;
        }

        .form-box {
            background-color: white;
            width: 400px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            text-align: left;
            font-weight: bold;
            margin-top: 10px;
        }

        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        .btn-registrar {
            margin-top: 20px;
            padding: 12px;
            background-color: rgba(0, 247, 255, 0.84);
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-registrar:hover {
            background-color: #095b53;
        }

        .mensaje {
            margin-top: 15px;
            font-weight: bold;
            color: red;
        }

        .exito {
            color: green;
        }

        .btn-volver {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>
<body>
<div class="contenedor">
    <h2 class="titulo">Registro de Nuevo Paciente</h2>

    <div class="form-box">
        <?php
        if (!empty($mensaje)) {
            $clase = strpos($mensaje, "✅") !== false ? "exito" : "mensaje";
            echo "<div class='$clase'>$mensaje</div>";
        }
        ?>

        <form method="POST" action="">
            <label for="NombreApe">Nombre y Apellido</label>
            <input type="text" name="NombreApe" id="NombreApe" required>

            <label for="TipoDocumento">Tipo de Documento</label>
            <input type="text" name="TipoDocumento" id="TipoDocumento" required>

            <label for="NumDocumento">Número de Documento</label>
            <input type="text" name="NumDocumento" id="NumDocumento" required>

            <label for="FechaNacimiento">Fecha de Nacimiento</label>
            <input type="date" name="FechaNacimiento" id="FechaNacimiento" required>

            <label for="Celular">Celular</label>
            <input type="text" name="Celular" id="Celular" required>

            <label for="Correo">Correo</label>
            <input type="email" name="Correo" id="Correo" required>

            <label for="TipoSeguro">Tipo de Seguro</label>
            <input type="text" name="TipoSeguro" id="TipoSeguro" required>

            <label for="Contraseña">Contraseña</label>
            <input type="password" name="Contraseña" id="Contraseña" required>

            <button type="submit" class="btn-registrar">Registrar</button>
            <a href="Login.php" class="btn-volver">Regresar</a>
        </form>
    </div>
</div>
</body>
</html>
