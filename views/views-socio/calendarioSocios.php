<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location: index.php?n=paginaLogin');
}

$incluir = include('config/conexion.php');
if ($incluir) {
    /*? calendario de la empresa*/
    $SqlReunions   = ("SELECT * FROM reunion WHERE nombre_empresa LIKE '$_SESSION[empresa]'");
    $resulReunions = mysqli_query($conexion, $SqlReunions);

    $SqlPuntos = ("SELECT * FROM punto WHERE nombre_empresa LIKE '$_SESSION[empresa]'");
    $resulPuntos = mysqli_query($conexion, $SqlPuntos);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Reuniones</title>
    <link rel="icon" href="views/img/calendario.png">
    <link rel="stylesheet" href="views/views-socio/css/calendarioSocios.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script defer src="js/activarPagina.js"></script>
    <!--calendario-->
    <link rel="stylesheet" type="text/css" href="views/views-socio/css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="views/views-socio/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/views-socio/css/calendario.css">
</head>

<body>
    <div id="container">
        <header id="header">
            <h1 class="titulo"><img src="views/img/calendario.png" class="logo">EmpresaXYZ</h1>
            <aside class="lateral">
                <ul>
                    <li><a href="index.php?n=calendarioSocio" class="active">Calendario</a></li>
                    <li><a href="index.php?n=puntos">Puntos</a></li>
                    <li><a href="index.php?n=reunionesSocio">Reuniones</a></li>
                    <li><a href="index.php?n=sociosSocio">Socios</a></li>
                    <li><a href="index.php?n=votacionesSocio">Votaciones</a></li>
                </ul>
            </aside>
        </header>
        <div id="contenido">
            <nav id="navbar">
                <div class="navbar__nombre__empresa">
                    <h2 class="nombre_empresa">Calendario de la empresa <?php echo $_SESSION['empresa']; ?></h2>
                </div>
                <ul>
                    <li><a href="index.php?n=configuracionSocio">Configuracion</a></li>
                    <li class="margin-right"><a href="controllers/controladorCerrarSesion.php">Cerrar Sesion</a></li>
                    <li class="ajustar"><img src="img-perfil/<?php echo $_SESSION['foto']?>"><span class="username"><?php echo $_SESSION['username'] ?><p class="cargo"><?php echo $_SESSION['cargo'] ?></p></span></li>
                </ul>
            </nav>
            <div class="contenido__pagina">
                <div id="calendar"></div>
                <?php
                include('modalAgregarPunto.php');
                ?>
                <script src="js/jquery-3.0.0.min.js"> </script>
                <script src="js/popper.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script type="text/javascript" src="js/moment.min.js"></script>
                <script type="text/javascript" src="js/fullcalendar.min.js"></script>
                <script src='js/es.js'></script>
                <?php include('controllers/mostrarCalendarioSocio.php')?>
            </div>
        </div>
    </div>

</body>

</html>