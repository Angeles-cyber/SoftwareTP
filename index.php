<?php include('head.php');?>

<body>
    <div class="container text-center mt-5 p-5">
        <h1 class="mb-5">BIENVENIDOS AL SISTEMA DE GESTIÓN DE VACUNAS</h1>
        
        <div class="d-flex justify-content-center gap-5">
            <!-- ADMINISTRADOR -->
            <div class="text-center user-card">
                <img src="img/Admin.icon.png" width="200px">
                <h2 class="card-title mt-3">ADMINISTRADOR</h2>
                <button class="btn btn-primary btn-anim" data-url="Modulos/Administrador/Login.php">ENTRAR</button>
            </div>

            <!-- DOCTOR -->
            <div class="text-center user-card">
                <img src="img/Doctor.icon.png" width="210px">
                <h2 class="card-title mt-3">DOCTOR</h2>
                <button class="btn btn-success btn-anim" data-url="Modulos/Doctor/Login.php">ENTRAR</button>
            </div>

            <!-- PACIENTE -->
            <div class="text-center user-card">
                <img src="img/paciente.icon.png" width="210px">
                <h2 class="card-title mt-3">PACIENTE</h2>
                <button class="btn btn-warning btn-anim" data-url="Modulos/Paciente/Login.php">ENTRAR</button>
            </div>
        </div>
    </div>

    <!-- Enlaces a los estilos y scripts -->
    <link rel="stylesheet" href="css/styles.css">
    <script src="JS/scripts.js"></script>
</div>

</body>
</html>
