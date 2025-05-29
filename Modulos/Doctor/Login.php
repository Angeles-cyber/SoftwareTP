<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .admin-panel {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Login Section -->
    <div class="container d-flex align-items-center justify-content-center vh-100" id="login-section">
        <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
            <h2 class="text-center mb-4">Doctor - Login</h2>
            <form id="login-form">
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de Usuario</label>
                    <input type="text" id="username" class="form-control" placeholder="Usuario" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" id="password" class="form-control" placeholder="Contraseña" required>
                </div>

                <button type="button" id="login-btn" class="btn btn-primary w-100">Ingresar</button>
            </form>
        </div>
    </div>

    <!-- Admin Panel Section -->
    <div class="admin-panel" id="admin-panel">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Panel de Administrador</a>
                <button class="btn btn-outline-light btn-sm" id="logout-btn">Cerrar Sesión</button>
            </div>
        </nav>
        <div class="container mt-4">
            <h3>Bienvenido al Panel de Administrador</h3>
            <p>Este es el apartado principal donde puedes gestionar los datos del sistema.</p>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Gestión de Usuarios</h5>
                            <p class="card-text">Agrega, edita o elimina usuarios del sistema.</p>
                            <a href="#" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Estadísticas</h5>
                            <p class="card-text">Consulta estadísticas generales del sistema.</p>
                            <a href="#" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Configuración</h5>
                            <p class="card-text">Ajusta las configuraciones generales del sistema.</p>
                            <a href="#" class="btn btn-primary">Ir</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const loginBtn = document.getElementById('login-btn');
        const logoutBtn = document.getElementById('logout-btn');
        const loginSection = document.getElementById('login-section');
        const adminPanel = document.getElementById('admin-panel');

        // Simulación de login
        loginBtn.addEventListener('click', () => {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            if (username === 'admin' && password === '1234') {
                loginSection.style.display = 'none';
                adminPanel.style.display = 'block';
            } else {
                alert('Credenciales incorrectas. Por favor, intenta de nuevo.');
            }
        });

        // Simulación de logout
        logoutBtn.addEventListener('click', () => {
            adminPanel.style.display = 'flex';
            loginSection.style.display = 'none';
        });
    </script>
</body>
</html>
