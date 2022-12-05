<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de socio</title>
  <link rel="stylesheet" href="views/views-admin/css/registroSocios.css">
  <link rel="icon" href="views/img/calendario.png">
  <script src="https://kit.fontawesome.com/1c51e264f0.js" crossorigin="anonymous"></script>
</head>

<body>

  <form class="form" enctype="multipart/form-data">
    <div class="titulo-btn">
      <a class="btn" href="index.php?n=inicioAdmin"><i class="fa-solid fa-arrow-left"></i></a>
      <h2 class="titulo-form">Resgistrar Socio</h2>
    </div>
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
        <input type="text" name="ced_socio" class="form_input" placeholder=" " required>
        <label for="cedula" class="form_label">Cedula:</label>
        <span class="form_line"></span>
      </div>
      <div class="form_grupo">
        <input type="password" name="password" class="form_input" placeholder=" " required>
        <label for="password" class="form_label">Contraseña:</label>
        <span class="form_line"></span>
      </div>
      <div class="form_grupo">
        <input type="text" name="nombre_empresa" class="form_input" placeholder=" " required>
        <label for="nombre_empresa" class="form_label">Nombre de la empresa:</label>
        <span class="form_line"></span>
      </div>
      <div class="form_grupo block">
        <label>Cargo: </label>
        <span class="cargo">
          <label>Socio</label>
          <input type="radio" name="cargo" value="Socio">
        </span>
        <span class="cargo">
          <label>Administrador</label>
          <input type="radio" name="cargo" value="Administrador">
        </span>
      </div>
      <input class="subir_archivo block"  type="file" name="foto">
      <input type="submit" class="form_submit" value="Registrar">
      <input type="hidden" name="n" value="registroSocio">
    </div>
  </form>
</body>

</html>