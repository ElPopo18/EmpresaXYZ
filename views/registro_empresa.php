<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de empresa</title>
    <link rel="stylesheet" href="views/css/registro-empresa.css">
    <link rel="icon" href="./views/img/calendario.png">
</head>

<body>
    <form class="form">
        <h2 class="titulo-form">Resgistra tu empresa</h2>
        <p class="parrafo">&iquest; Ya tienes una empresa ? <a href="" class="form-link">Entra aqui para iniciar sesion</a></p>
        <div class="form_container">
            <div class="form_grupo">
                <input type="text" name="nombre_empresa" class="form_input" placeholder=" " required>
                <label for="name" class="form_label">Nombre de la empresa:</label>
                <span class="form_line"></span>
            </div>
            <div class="form_grupo">
                <input type="text" name="rif" class="form_input" placeholder=" " required>
                <label for="rif" class="form_label">Rif de la empresa:</label>
                <span class="form_line"></span>
            </div>
            <div class="form_grupo">
                <input type="password" name="password" class="form_input" placeholder=" " required>
                <label for="password" class="form_label">Contrase&ntilde;a:</label>
                <span class="form_line"></span>
            </div>
            <input type="submit" class="form_submit" value="Registrar empresa">
            <input type="hidden" name="n" value="registroEmpresa">
        </div>
    </form>
</body>

</html>