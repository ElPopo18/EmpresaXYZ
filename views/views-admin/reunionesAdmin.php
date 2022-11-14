<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location: index.php?n=paginaLogin');
}
include('config/conexion.php');

    $consulta = "SELECT *  FROM reuniones";
    $resultado = mysqli_query($conexion, $consulta);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reuniones</title>
    <link rel="icon" href="views/img/calendario.png">
    <link rel="stylesheet" href="views/views-admin/css/reunionesAdmin.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
</head>

<body>
    <div id="container">
        <header id="header">
            <h1 class="titulo"><img src="views/img/calendario.png" class="logo">EmpresaXYZ</h1>
            <aside class="lateral">
                <ul>
                    <li><a href="index.php?n=inicioAdmin">Dashboard</a></li>
                    <li><a href="index.php?n=calendarioAdmin">Calendario</a></li>
                    <li><a href="index.php?n=reunionesAdmin" class="active">Reuniones</a></li>
                    <li><a href="index.php?n=empresasAdmin">Empresas</a></li>
                    <li><a href="index.php?n=sociosAdmin">Socios</a></li>
                </ul>
            </aside>
        </header>
        <div id="contenido">
            <nav id="navbar">
                <form class="buscar" method="post">
                    <label class="buscar__label" for="buscar">Buscar: </label>
                    <input type="text" id="buscar" name="buscar" class="buscar__input" placeholder="Id o nombre de la empresa que desea buscar">
                </form>
                <ul>
                    <li><a href="index.php?n=principal"><i class="fi fi-rr-settings"></i></a></li>
                    <li class="margin-right"><a href="controllers/controladorCerrarSesion.php"><i class="fi fi-sr-exit"></i></a></li>
                    <li class="ajustar"><img src="https://i.scdn.co/image/ab67616d00001e0249d694203245f241a1bcaa72"><span class="username"><?php echo $_SESSION['username'] ?><p class="cargo"><?php echo $_SESSION['cargo'] ?></p></span></li>
                </ul>
            </nav>
            <div class="contenido__pagina">
                <h2 class="tabla__titulo">Reuniones Registradas</h2>
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
                        <tbody id="reuniones">
                            <?php
                            while ($row = $resultado->fetch_array()) { ?>
                                <tr>
                                    <td><?php echo $row['id_reunion']; ?></td>
                                    <td><?php echo $row['nombre_empresa'] ?></td>
                                    <td><?php echo $row['color_reunion'] ?></td>
                                    <td><?php echo $row['fecha_inicio'] ?></td>
                                    <td><?php echo $row['fecha_fin'] ?></td>
                                </tr>
                            <?php         } ?>
                        </tbody>
                    </table>
                </div>
                <a href="index.php?n=calendarioAdmin" class="registro__btn">&iquest; Ir al calendario para registrar reuniones ?</a>
            </div>
        </div>
    </div>
</body>

</html>