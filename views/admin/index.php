<?php

$usuario = $_GET['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpresaXYZ - Inicio</title>
    <link rel="icon" href="views/img/calendario.png">
    <link rel="stylesheet" href="views/css/indexAdmin.css">
</head>

<body>
    <div id="container">
        <header id="header">
            <h1 class="titulo"><img src="views/img/calendario.png" class="logo">EmpresaXYZ</h1>
            <nav id="navbar">
                <ul>
                    <li>Bienvenido <?php echo $usuario ?></li>
                    <li><a href="index.php?n=principal">posible opc</a></li>
                    <li><a href="index.php?n=principal">Cerrar Sesion</a></li>
                </ul>
            </nav>
        </header>
        <div id="contenido">
            <aside class="lateral">
                <ul>
                    <li><a>Inicio</a></li>
                    <li><a>Calendario</a></li>
                    <li><a>Reuniones</a></li>
                    <li><a>Empresas</a></li>
                    <li><a>Socios</a></li>
                    <li><a>Configuracion</a></li>
                </ul>
            </aside>
            <div class="calendario">
                <article class="proyects">
                    <div class="image-wrap">
                        <img src="https://via.placeholder.com/250x180">
                    </div>
                </article>
                <article class="proyects">
                    <div class="image-wrap">
                        <img src="https://via.placeholder.com/250x180">
                    </div>
                </article>
                <article class="proyects">
                    <div class="image-wrap">
                        <img src="https://via.placeholder.com/250x180">
                    </div>
                </article>
                <article class="proyects">
                    <div class="image-wrap">
                        <img src="https://via.placeholder.com/250x180">
                    </div>
                </article>
                <article class="proyects">
                    <div class="image-wrap">
                        <img src="https://via.placeholder.com/250x180">
                    </div>
                </article>
                <article class="proyects">
                    <div class="image-wrap">
                        <img src="https://via.placeholder.com/250x180">
                    </div>
                </article>
                <article class="proyects">
                    <div class="image-wrap">
                        <img src="https://via.placeholder.com/250x180">
                    </div>
                </article>
                <article class="proyects">
                    <div class="image-wrap">
                        <img src="https://via.placeholder.com/250x180">
                    </div>
                </article>
            </div>
        </div>
    </div>
</body>

</html>