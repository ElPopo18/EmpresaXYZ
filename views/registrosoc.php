<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de socio</title>
    <link rel="icon" href="./img/calendario.png">
</head>
<body>
    <div>Registro socio</div>
    <form action="" method="get">
  <div class="ced_socio">
    <input type="number"  required placeholder = "cedula" name="ced_socio">
  </div>  
  <div class="nombre">
    <input type="text"   placeholder = "nombre" name="nombre_soc">
  </div>  
  <div class="apellido">
    <input type="text"   placeholder = "apellido" name="apellido_soc">
  </div>  
  <div class="nombreusuario">
    <input type="text" class="form-control"  placeholder = "nombreusuario" name="username">
  </div>  
  </div>
  <button type="submit" value="guardar">Enviar</button>
  <input type="hidden" name="n" value="guardaru">
</form>
</body>
</html>