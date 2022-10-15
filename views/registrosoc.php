<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de socio</title>
  <link rel="stylesheet" href="./views/css/registro-socios.css">
  <link rel="icon" href="./views/img/calendario.png">
</head>

<body>

  <form class="form">
    <h2 class="titulo-form">Resgistrar Socio</h2>
    <p class="parrafo">&iquest; Ya eres socio ? <a href="" class="form-link">Entra aqui para iniciar sesion</a></p>
    <div class="form_container">
      <div class="form_grupo">
        <input type="text" name="username" class="form_input" placeholder=" " required>
        <label for="name" class="form_label">Usuario:</label>
        <span class="form_line"></span>
      </div>
      <div class="form_grupo">
        <input type="text" name="nombre_soc" class="form_input" placeholder=" " required>
        <label for="nombre" class="form_label">Nombre:</label>
        <span class="form_line"></span>
      </div>
      <div class="form_grupo">
        <input type="text" name="apellido_soc" class="form_input" placeholder=" " required>
        <label for="apellido" class="form_label">Apellido:</label>
        <span class="form_line"></span>
      </div>
      <div class="form_grupo">
        <input type="number" name="ced_socio" class="form_input" placeholder=" " required>
        <label for="cedula" class="form_label">Cedula:</label>
        <span class="form_line"></span>
      </div>
      <div class="form_grupo">
        <input type="password" name="password" class="form_input" placeholder=" " required>
        <label for="password" class="form_label">Contrase&ntilde;a:</label>
        <span class="form_line"></span>
      </div>
      <input type="submit" class="form_submit" value="Registrar">
      <input type="hidden" name="n" value="guardaru">
    </div>
  </form>
</body>

</html>