<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location: index.php?n=paginaLogin');
}
include("config/conexion.php");

$SqlReunions   = ("SELECT * FROM reunion");
$resulReunions = mysqli_query($conexion, $SqlReunions);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Reuniones</title>
    <link rel="icon" href="views/img/calendario.png">
    <link rel="stylesheet" href="views/views-admin/css/calendarioAdmin.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script defer src="js/activarPagina.js"></script>
    <!--calendario-->
    <link rel="stylesheet" type="text/css" href="views/views-admin/css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="views/views-admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/views-admin/css/estiloCalendario.css">
</head>

<body>
    <div id="container">
        <header id="header">
            <h1 class="titulo"><img src="views/img/calendario.png" class="logo">EmpresaXYZ</h1>
            <aside class="lateral">
                <ul>
                    <li><a href="index.php?n=inicioAdmin">Dashboard</a></li>
                    <li><a href="index.php?n=calendarioAdmin" class="active">Calendario</a></li>
                    <li><a href="index.php?n=reunionesAdmin">Reuniones</a></li>
                    <li><a href="index.php?n=empresasAdmin">Empresas</a></li>
                    <li><a href="index.php?n=sociosAdmin">Socios</a></li>
                </ul>
            </aside>
        </header>
        <div id="contenido">
            <nav id="navbar">
                <div class="navbar__nombre__empresa">
                    <h2 class="nombre_empresa">Calendario de reuniones de las empresa</h2>
                </div>
                <ul>
                    <li><a href="index.php?n=configuracionAdmin">Configuracion</a></li>
                    <li class="margin-right"><a href="controllers/controladorCerrarSesion.php">Cerrar Sesion</a></li>
                    <li class="ajustar"><img src="img-perfil/<?php echo $_SESSION['foto']?>"><span class="username"><?php echo $_SESSION['username'] ?><p class="cargo"><?php echo $_SESSION['cargo'] ?></p></span></li>
                </ul>
            </nav>
            <div class="contenido__pagina">
                <div id="calendar"></div>
                <?php include('modalNuevaReunion.php');?>
                <script src="js/jquery-3.0.0.min.js"> </script>
                <script src="js/popper.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script type="text/javascript" src="js/moment.min.js"></script>
                <script type="text/javascript" src="js/fullcalendar.min.js"></script>
                <script src="js/es.js"></script>
                <?php include('controllers/mostrarCalendarioAdmin.php')?>
            </div>
        </div>
    </div>

</body>

</html>