<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location: index.php?n=paginaLogin');
}
$incluir = include('config/conexion.php');
if ($incluir) {
    $consulta = "SELECT *  FROM reunion WHERE nombre_empresa like '$_SESSION[empresa]'";
    $resultado = mysqli_query($conexion, $consulta);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reuniones</title>
    <link rel="icon" href="views/img/calendario.png">
    <link rel="stylesheet" href="views/views-socio/css/estilos.css">
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
                    <li><a href="index.php?n=calendarioSocio">Calendario</a></li>
                    <li><a href="index.php?n=puntos">Puntos</a></li>
                    <li><a href="index.php?n=reunionesSocio" class="active">Reuniones</a></li>
                    <li><a href="index.php?n=sociosSocio">Socios</a></li>
                </ul>
            </aside>
        </header>
        <div id="contenido">
            <nav id="navbar">
                <ul>
                    <li><a href="index.php?n=principal"><i class="fi fi-rr-settings"></i></a></li>
                    <li class="margin-right"><a href="controllers/controladorCerrarSesion.php"><i class="fi fi-sr-exit"></i></a></li>

                    <li class="ajustar"><img src="https://i.scdn.co/image/ab67616d00001e0249d694203245f241a1bcaa72"><span class="username"><?php echo $_SESSION['username'] ?><p class="cargo"><?php echo $_SESSION['cargo'] ?></p></span></li>
                </ul>
            </nav>
            <div class="contenido__pagina">
            <h2 class="tabla__titulo">Reuniones de la Empresa <?php echo $_SESSION['empresa'] ?></h2>
                <div class="tabla_scroll">
                    <table border="1" class="tabla">
                        <thead>
                            <tr>
                            <th>Id</th>
                                <th>Nombre Empresa</th>
                                <th>color</th>
                                <th>Fecha de inicio</th>
                                <th>Fecha de fin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $resultado->fetch_array()) { ?>
                                <tr>
                                <td><?php echo $row['id_reunion']; ?></td>
                                    <td><?php echo $row['nombre_empresa'] ?></td>
                                    <td><?php echo $row['color_reunion'] ?></td>
                                    <td><?php echo $row['fecha_inicio'] ?></td>
                                    <td><?php echo $row['fecha_fin']?></td>
                                </tr>
                            <?php         } ?>
                        </tbody>
                    </table>
                </div>
            </div>
</body>

</html>