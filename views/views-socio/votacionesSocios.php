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
                <form class="buscar" method="post">
                    <label class="buscar__label" for="buscar">Buscar: </label>
                    <input type="text" id="buscar" name="buscar" class="puntos" placeholder="Id punto/Id reunion/Descripcion/Documento que desea buscar">
                </form>
                <ul>
                    <li><a href="index.php?n=configuracionSocio"><i class="fi fi-rr-settings"></i></a></li>
                    <li class="margin-right"><a href="controllers/controladorCerrarSesion.php"><i class="fi fi-sr-exit"></i></a></li>
                    <li class="ajustar"><img src="<?php echo $_SESSION['foto'] ?>"><span class="username"><?php echo $_SESSION['username'] ?><p class="cargo"><?php echo $_SESSION['cargo'] ?></p></span></li>
                </ul>
            </nav>
            <div class="contenido__pagina">
                <h2 class="tabla__titulo">Votaciones de la Empresa <?php echo $_SESSION['empresa'] ?></h2>
                <?php
                while ($row = $resultado->fetch_array()) { ?>
                    <div class="card">
                        <h3><?php echo $row['username']; ?></h3>
                        <h4><?php echo $row['descripcion'] ?></h4>
                    </div>
                <?php         } ?>
                <!--
                <div class="tabla_scroll">
                    <table border="1" class="tabla">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Tema a tratar</th>
                                <th>Votacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $resultado->fetch_array()) { ?>
                                <tr>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['descripcion'] ?></td>
                                </tr>
                            <?php         } ?>
                        </tbody>
                    </table>
                </div>
                            -->
            </div>
</body>
<script src="js/buscarPuntos.js"></script>

</html>