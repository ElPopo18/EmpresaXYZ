<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location: index.php?n=paginaLogin');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="views/img/calendario.png">
    <link rel="stylesheet" href="views/views-admin/css/indexAdmin.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script defer src="js/activarPagina.js"></script>
</head>

<body>
    <div id="container">
        <header id="header">
            <h1 class="titulo"><img src="views/img/calendario.png" class="logo">EmpresaXYZ</h1>
            <aside class="lateral">
                <ul>
                    <li><a href="index.php?n=inicioAdmin" class="active">Dashboard</a></li>
                    <li><a href="index.php?n=calendarioAdmin">Calendario</a></li>
                    <li><a href="index.php?n=reunionesAdmin">Reuniones</a></li>
                    <li><a href="index.php?n=empresasAdmin">Empresas</a></li>
                    <li><a href="index.php?n=sociosAdmin">Socios</a></li>
                </ul>
            </aside>
        </header>
        <div id="contenido">
            <nav id="navbar">
                <div class="navbar__registro">
                    <h2 class="navbar__r">Registros de usuarios</h2>
                </div>
                <ul>
                    <li><a href="index.php?n=configuracionAdmin">Configuracion</a></li>
                    <li class="margin-right"><a href="controllers/controladorCerrarSesion.php">Cerrar Sesion</a></li>
                    <li class="ajustar"><img src="img-perfil/<?php echo $_SESSION['foto']?>"><span class="username"><?php echo $_SESSION['username'] ?><p class="cargo"><?php echo $_SESSION['cargo'] ?></p></span></li>
                </ul>
            </nav>
            <div class="contenido__pagina">
                <article class="registro">
                    <div class="registro__titulos">
                        <h2>Registrar Socio</h2>
                    </div>
                    <div>
                        <h3>Un Socio tiene los siguientes accesos:</h3>
                    </div>
                    <div class="registro__lista">
                        <ul>
                            <li>Ver calendario de reuniones</li>
                            <li>Subir puntos de reuniones</li>
                            <li>Ver empresas a las que pertenece</li>
                            <li>Ver a otros socios que pertenezcan a la empresa</li>
                            <li>Editar configuracion de su perfil</li>
                        </ul>
                    </div>
                    <a href="index.php?n=paginaRegistroSocio" class="registro__btn">Un Socio</a>
                </article>
                <article class="registro">
                    <div class="registro__titulos">
                        <h2>Registrar Empresa</h2>
                    </div>
                    <div>
                        <h3 class="registro__contenido">Una Empresa tiene los siguientes accesos:</h3>
                    </div>
                    <div class="registro__lista">
                        <ul>
                            <li>Ver calendario de reuniones</li>
                            <li>Crear reuniones</li>
                            <li>Editar fechas de reuniones</li>
                            <li>Eliminar Reuniones</li>
                            <li>Registrar, eliminar Socios</li>
                            <li>Registrar, eliminar Empresas</li>
                        </ul>
                    </div>
                    <a href="index.php?n=paginaRegistroEmpresa" class="registro__btn">Una Empresa</a>
                </article>
            </div>
        </div>
    </div>
</body>

</html>