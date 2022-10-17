<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de socio</title>
  <link rel="icon" href="views/img/calendario.png">
  <link rel="stylesheet" href="views/css/loginSocios.css">
  <script src="https://kit.fontawesome.com/2a47b8bfbb.js" crossorigin="anonymous"></script>
</head>

<body>
  <form class="form">
    <div class="titulo-btn">
      <a class="btn" href="index.php?n=login"><i class="fa-solid fa-arrow-left"></i></a>
      <h2 class="titulo-form">Iniciar como Socio</h2>
    </div>
    <p class="parrafo">&iquest; Aun no eres socio ? <a href="index.php?n=registrosoc" class="form-link">Entra aqui para Registrarte</a></p>
    <div class="form_container">
      <div class="form_grupo">
        <input type="text" name="username" class="form_input" placeholder=" " required>
        <label for="name" class="form_label">Usuario:</label>
        <span class="form_line"></span>
      </div>
      <div class="form_grupo">
        <input type="password" name="password" class="form_input" placeholder=" " required>
        <label for="password" class="form_label">Contrase&ntilde;a:</label>
        <span class="form_line"></span>
      </div>
      <input type="submit" class="form_submit" value="Iniciar">
      <input type="hidden" name="n" value="loginSocio">
    </div>
  </form>
</body>

</html>