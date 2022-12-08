<?php
include('config/conexion.php');
$consulta = "SELECT *  FROM empresa";
$resultado = mysqli_query($conexion, $consulta);

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
    <title>Empresas</title>
    <link rel="icon" href="views/img/calendario.png">
    <link rel="stylesheet" href="views/views-admin/css/empresaAdmin.css">
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
                    <li><a href="index.php?n=inicioAdmin">Dashboard</a></li>
                    <li><a href="index.php?n=calendarioAdmin">Calendario</a></li>
                    <li><a href="index.php?n=reunionesAdmin">Reuniones</a></li>
                    <li><a href="index.php?n=empresasAdmin" class="active">Empresas</a></li>
                    <li><a href="index.php?n=sociosAdmin">Socios</a></li>
                </ul>
            </aside>
        </header>
        <div id="contenido">
            <nav id="navbar">
                <form class="buscar" method="post">
                    <label class="buscar__label" for="buscar">Buscar: </label>
                    <input type="text" id="buscar" name="buscar" class="buscar__input" placeholder="Id/Nombre de la empresa">
                </form>
                <ul>
                    <li><a href="index.php?n=configuracionAdmin">Configuracion</a></li>
                    <li class="margin-right"><a href="controllers/controladorCerrarSesion.php">Cerrar Sesion</a></li>
                    <li class="ajustar"><img src="img-perfil/<?php echo $_SESSION['foto'] ?>"><span class="username"><?php echo $_SESSION['username'] ?><p class="cargo">
                                <?php echo $_SESSION['cargo'] ?></p></span></li>
                </ul>
            </nav>
            <div class="contenido__pagina">
                <h2 class="tabla__titulo">Empresas Registradas</h2>
                <div class="tabla_scroll">
                    <table border="1" class="tabla">
                        <thead>
                            <tr>
                                <th>Id de la empresa</th>
                                <th>Nombre de la empresa</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="empresas">
                        </tbody>
                    </table>
                </div>
                <a href="index.php?n=paginaRegistroEmpresa" class="registro__btn">&iquest; Desea registrar una
                    Empresa ?</a>
            </div>
        </div>
    </div>
    <script src="js/buscarEmpresaAdmin.js"></script>
</body>

</html>