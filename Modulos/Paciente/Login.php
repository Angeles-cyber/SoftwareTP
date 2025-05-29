<!DOCTYPE html>
<html lang="es">
  <?php include('../../head.php')?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión / Registro</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container login-container">
    <form action="login.php" method="POST" class="form">
      <h2>Iniciar Sesión</h2>
      <input type="text" name="documento" placeholder="N° de Documento" required>
      <input type="password" name="password" placeholder="Contraseña" required>
      <button type="submit">Ingresar</button>
      <p>¿No tienes una cuenta? <a href="#registro">Regístrate</a></p>
    </form>
  </div>

  <div class="container register-container" id="registro">
    <form action="register.php" method="POST" class="form">
      <h2>Crear Cuenta</h2>
      <input type="text" name="nombre" class="form-control" placeholder="Nombre y Apellido" required>

      <select name="TipoDocumento" required>
        <option value="">Tipo de Documento</option>
        <option value="DNI">DNI</option>
        <option value="CE">Carnet de Extranjería</option>
      </select>

      <input type="text" name="NumDocumento" placeholder="N° de Documento" required>
      <input type="date" name="FechaNacimiento" required>
      <input type="text" name="Celular" placeholder="Celular" required>
      <input type="email" name="Correo" placeholder="Correo" required>

      <select name="TipoSeguro" required>
        <option value="">Tipo de Seguro</option>
        <option value="SIS">SIS</option>
        <option value="EPS">EPS</option>
      </select>
      
      <input type="Contraseña" name="Contraseña" placeholder="Contraseña" required>

      <label><input type="checkbox" required> Acepto términos y condiciones</label>
      <button type="submit">Registrarme</button>
    </form>
  </div>
  <?php
//Crear registro
if (isset($_POST['crear'])){
  $NombreApe = $_POST['nombre'];
  $TipoDoc = $_POST['TipoDocumento'];
  $NumDoc = $_POST['NumDocumento'];
  $FechaNac = $_POST['FechaNacimiento'];
  $Cel = $_POST['Celular'];
  $Correo = $_POST['Correo'];
  $TipoSe = $_POST['TipoSeguro'];
  $Contraseña = $_POST['Contraseña'];


  $sql="INSERT INTO usuarios(
  NombreApe, TipoDocumento, NumDocumento, FechaNacimiento, Celular, Correo, TipoSeguro, Contraseña
  ) VALUES(
  '$nombre','$TipoDoc','$NumDoc','$FechaNac','$Cel','$$Correo','$TipoSe','$Contraseña')";
  $link->query($sql);
  
}
?>
</body>

</html>
