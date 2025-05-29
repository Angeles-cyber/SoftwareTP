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
    $stmt = $conn->prepare("SELECT * FROM usuarioadmin WHERE NumDoc = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $contrasena === $user['Contraseña']) {
        $_SESSION['admin'] = $user['NumDoc'];
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
            background: linear-gradient(to bottom,rgba(0, 110, 255, 0.84) 40%, #eeeeee 40%);
            height: 100vh;
        }

        .contenedor-login {
            text-align: center;
            padding-top: 60px;
        }

        .titulo-principal {
            color: white;
            font-size: 24px;
            margin-bottom: 40px;
        }

        .login-box {
            background-color: white;
            width: 350px;
            margin: 0 auto;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0,0,0,0.2);
        }

        .titulo-secundario {
            margin-bottom: 25px;
            font-size: 20px;
            color: #222;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }

        label {
            text-align: left;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 5px;
            color: #444;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .enlace {
            text-align: right;
            margin-top: 10px;
        }

        .enlace a {
            font-size: 13px;
            color:rgba(0, 110, 255, 0.84);
            text-decoration: none;
        }

        .btn-login {
            margin-top: 20px;
            padding: 12px;
            background-color: rgba(0, 110, 255, 0.84);
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .btn-login:hover {
            background-color:rgb(84, 152, 240);
        }

        .mensaje {
            margin-top: 15px;
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="contenedor-login">
    <h2 class="titulo-principal">BIENVENIDO ADMINISTRADOR – </h2>
    <H3>GESTOR DE VACUNAS</H3>

    <div class="login-box">
        <h2 class="titulo-secundario">🧑‍💼 Iniciar sesión</h2>
        <img src="" alt="">

        <?php if (!empty($mensaje)) echo "<div class='mensaje'>$mensaje</div>"; ?>

        <form method="POST" action="">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" required>

            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" id="contrasena" required>

            <button type="submit" class="btn-login">Iniciar sesión</button>
        </form>
    </div>
</div>

</body>
</html>
