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
    <title>Configuracion</title>
    <link rel="icon" href="views/img/calendario.png">
    <link rel="stylesheet" href="views/css/configuracionesUsuario.css">
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
                    <li><a href="index.php?n=calendarioAdmin" class="active">Calendario</a></li>
                    <li><a href="index.php?n=puntos">Puntos</a></li>
                    <li><a href="index.php?n=reunionesAdmin">Reuniones</a></li>
                    <li><a href="index.php?n=sociosAdmin">Socios</a></li>
                </ul>
            </aside>
        </header>
        <div id="contenido">
            <nav id="navbar">
                <div class="navbar__seccion">
                    <h2 class="seccion">Configuraciones del adminitrador</h2>
                </div>
                <ul>
                    <li><a href="index.php?n=configuracionSocio"><i class="fi fi-rr-settings"></i>Configuracion</a></li>
                    <li class="margin-right"><a href="controllers/controladorCerrarSesion.php"><i class="fi fi-sr-exit"></i>Cerrar Sesion</a></li>
                    <li class="ajustar"><img src="<?php echo $_SESSION['foto']?>"><span class="username"><?php echo $_SESSION['username'] ?><p class="cargo"><?php echo $_SESSION['cargo'] ?></p></span></li>
                </ul>
            </nav>
            <div class="contenido__pagina">
                <div class="configuracion">
                    <?php echo '<div class="mensaje">Punto registrado con exito</div>'; 
                    header('refresh:3; url=index.php?n=calendarioSocio');
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>