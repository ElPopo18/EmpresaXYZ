<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link rel="icon" href="views/img/calendario.png">
  <link rel="stylesheet" href="views/css/login.css">
  <script src="https://kit.fontawesome.com/1c51e264f0.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="views/css/bootstrap.min.css">
</head>

<body>
  <form class="form" autocomplete="off" method="POST">
    <div class="titulo-btn">
      <a class="btn" href="index.php?n=principal"><i class="fa-solid fa-arrow-left"></i></a>
      <h2 class="titulo-form">Iniciar Sesion</h2>
    </div>
    <?php
    include "config/conexion.php";
    include "controllers/controladorLogin.php";
    ?>
    <div class="form_container">
      <div class="form_grupo">
        <input type="text" name="username" class="form_input" placeholder=" ">
        <label for="name" class="form_label">Usuario:</label>
        <span class="form_line"></span>
      </div>
      <div class="form_grupo">
        <input type="password" name="password" class="form_input" placeholder=" ">
        <label for="password" class="form_label">Contraseña:</label>
        <span class="form_line"></span>
      </div>
      <input name="btn_ingresar" type="submit" class="form_submit" value="Iniciar Sesion">
    </div>
  </form>
</body>

</html>