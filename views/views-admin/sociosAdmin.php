<?php
$incluir = include('config/conexion.php');
if ($incluir) {
    $consulta = "SELECT *  FROM socio";
    $resultado = mysqli_query($conexion, $consulta);
}
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
    <title>Socios</title>
    <link rel="icon" href="views/img/calendario.png">
    <link rel="stylesheet" href="views/views-admin/css/sociosAdmin.css">
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
                <li><a href="index.php?n=inicioAdmin">Dashboard</a></li>
                    <li><a href="index.php?n=calendarioAdmin">Calendario</a></li>
                    <li><a href="index.php?n=reunionesAdmin">Reuniones</a></li>
                    <li><a href="index.php?n=empresasAdmin">Empresas</a></li>
                    <li><a href="index.php?n=sociosAdmin" class="active">Socios</a></li>
                </ul>
            </aside>
        </header>
        <div id="contenido">
            <nav id="navbar">
                <ul>
                    <li><a href="index.php?n=principal"><i class="fi fi-rr-settings"></i></a></li>
                    <li class="margin-right"><a href="controllers/controladorCerrarSesion.php"><i class="fi fi-sr-exit"></i></a></li>

                    <li class="ajustar"><img src="https://i.scdn.co/image/ab67616d00001e0249d694203245f241a1bcaa72"><span class="username"><?php echo $_SESSION['username']?><p class="cargo"><?php echo $_SESSION['cargo']?></p></span></li>
                </ul>
            </nav>
            <div class="contenido__pagina">
                <h2 class="tabla__titulo">Socios Registrados</h2>
                <div class="tabla_scroll">
                    <table border="1" class="tabla">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cedula</th>
                                <th>Empresa</th>
                                <th>Cargo</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $resultado->fetch_array()) { ?>
                                <tr>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['nombre_soc'] ?></td>
                                    <td><?php echo $row['apellido_soc'] ?></td>
                                    <td><?php echo $row['ced_socio'] ?></td>
                                    <td><?php echo $row['nombre_empresa']?></td>
                                    <td><?php echo $row['cargo'] ?></td>
                                    <td class="tabla__link"> <a  href="editar-inventario.php?id=<?php echo $row['ced_socio']; ?>" class="editar">Editar</td>
                                    <td class="tabla__link"> <a  href="eliminar-inventario.php?id=<?php echo $row['ced_socio']; ?>" class="eliminar">Eliminar</td>
                                </tr>
    
                            <?php         } ?>
                        </tbody>
                    </table>
                </div>
                <a href="index.php?n=paginaRegistroSocio" class="registro__btn">&iquest; Desea registrar un Socio ?</a>
            </div>
        </div>
    </div>
</body>

</html>