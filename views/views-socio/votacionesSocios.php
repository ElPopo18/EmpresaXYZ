<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location: index.php?n=paginaLogin');
}
$incluir = include('config/conexion.php');
if ($incluir) {
    $consulta = "SELECT *  FROM punto WHERE nombre_empresa like '$_SESSION[empresa]'";
    $resultado = mysqli_query($conexion, $consulta);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votaciones</title>
    <link rel="icon" href="views/img/calendario.png">
    <link rel="stylesheet" href="views/views-socio/css/estilos.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script defer src="js/activarPagina.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
</head>

<body>
    <div id="container">
        <header id="header">
            <h1 class="titulo"><img src="views/img/calendario.png" class="logo">EmpresaXYZ</h1>
            <aside class="lateral">
                <ul>
                    <li><a href="index.php?n=calendarioSocio">Calendario</a></li>
                    <li><a href="index.php?n=puntos">Puntos</a></li>
                    <li><a href="index.php?n=reunionesSocio">Reuniones</a></li>
                    <li><a href="index.php?n=sociosSocio">Socios</a></li>
                    <li><a href="index.php?n=votacionesSocio" class="active">Votaciones</a></li>
                </ul>
            </aside>
        </header>
        <div id="contenido">
            <nav id="navbar">
                <div class="navbar__titulo">
                    <h2 class="navbar__r">Votaciones de Temas</h2>
                </div>
                <ul>
                    <li><a href="index.php?n=configuracionSocio">Configuracion</a></li>
                    <li class="margin-right"><a href="controllers/controladorCerrarSesion.php">Cerrar Sesion</a></li>
                    <li class="ajustar"><img src="img-perfil/<?php echo $_SESSION['foto'] ?>"><span class="username"><?php echo $_SESSION['username'] ?><p class="cargo"><?php echo $_SESSION['cargo'] ?></p></span></li>
                </ul>
            </nav>
            <div class="contenido__pagina">
                <h2 class="tabla__titulo">Votaciones de la Empresa <?php echo $_SESSION['empresa'] ?></h2>
                <div class="espacio_card">
                    <?php
                    while ($row = $resultado->fetch_array()) { ?>
                        <div class="card">
                            <p class="p">Tema:</p>
                            <a class="pdf_voto" href="documents/<?php echo $row['archivo'] ?> " TARGET="BLANK"><?php echo $row['descripcion'] ?></a>
                            <img src="views/img/pdf.png">
                            <p class="p">Propuesto Por:</p>
                            <h3 class="pdf_usuario"><?php echo $row['username'] ?></h3>
                            <p class="p"><?php echo $row['tipo']?></p>
                        </div>
                    <?php         } ?>
                </div>
            </div>
</body>
<script src="js/buscarPuntos.js"></script>

</html>