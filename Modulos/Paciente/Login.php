<?php 
session_start(); 

$mensaje = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "base_posta");

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $usuario = $_POST['usuario']; 
    $contrasena = $_POST['contrasena']; 

    // Consulta segura usando statement preparado
    $stmt = $conn->prepare("SELECT * FROM paciente WHERE NumDocumento = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $contrasena === $user['Contraseña']) {
        $_SESSION['admin'] = $user['NumDocumento'];
        header("Location: principal.php");
        exit();
    } else {
        $mensaje = "⚠️ Acceso denegado. Usuario o contraseña incorrectos.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login – Administrador</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            height: 100vh;
            background: url('../../img/fondopaciente.jpeg') no-repeat center center fixed;
            background-size: cover;
        }

        .contenedor-login {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .contenido-principal {
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Alínea todo a la izquierda */
            gap: 20px;
        }

        .texto-bienvenida {
            color: rgb(0, 0, 0);
            text-align: left;
            margin-left: 35px;
        }

        .texto-bienvenida h2 {
            font-size: 100px;
            margin: -350px;
            margin-top: -600px;
            font-weight: bold;
        }

        .texto-bienvenida h4 {
            font-size: 16px;
            margin: 50px 0 0;
        }

        .login-wrapper {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 450px;
        }

        .titulo-secundario {
            margin-bottom: 25px;
            font-size: 50px;
            color: #222;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin: 10px 0 5px;
            color: #444;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-login {
            margin-top: 20px;
            padding: 12px;
            background-color: rgb(17, 162, 124);
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }
        .enlace {
            text-align: right;
            margin-top: 10px;
        }

        .enlace a {
            font-size: 13px;
            color:rgba(2, 46, 243, 0.84);
            text-decoration: none;
        }

        .btn-login:hover {
            background-color: rgb(63,180,140);
        }

        .mensaje {
            margin-top: 15px;
            color: red;
            font-weight: bold;
            text-align: center;
        }
</style>
</head>
<body>

<div class="contenedor-login">
    <div class="texto-bienvenida">
        <h2>BIENVENIDO ADMINISTRADOR </h2>
    </div>

    <div class="login-wrapper">
        <h2 class="titulo-secundario">🧑‍💼 Iniciar sesión</h2>

        <?php if (!empty($mensaje)) echo "<div class='mensaje'>$mensaje</div>"; ?>

        <form method="POST" action="">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" required>

            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena" required>
             
            <div class="enlace">
                <a href="registar_login.php">¿No tienes una cuenta? Regístrate</a>
            </div>


            <button type="submit" class="btn-login">Iniciar sesión</button>
        </form>
    </div>
</div>

</body>
</html>
