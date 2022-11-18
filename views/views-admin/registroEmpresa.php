<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de empresa</title>
    <link rel="stylesheet" href="views/views-admin/css/registroEmpresa.css">
    <link rel="icon" href="views/img/calendario.png">
    <script src="https://kit.fontawesome.com/1c51e264f0.js" crossorigin="anonymous"></script>
</head>

<body>
    <form class="form">
        <div class="titulo-btn">
            <a class="btn" href="index.php?n=inicioAdmin"><i class="fa-solid fa-arrow-left"></i></a>
            <h2 class="titulo-form">Registrar Empresa</h2>
        </div>
        <div class="form_container">
            <div class="form_grupo">
                <input type="hidden" name="id_empresa" id="id_empresa">
                <input type="text" id="nombre_empresa" name="nombre_empresa" class="form_input" placeholder=" " required>
                <label for="name" class="form_label">Nombre de la empresa:</label>
                <span class="form_line"></span>
            </div>
            <input type="submit" class="form_submit" value="Registrar empresa">
            <input type="hidden" name="n" value="registroEmpresa">
        </div>
    </form>
</body>

</html>