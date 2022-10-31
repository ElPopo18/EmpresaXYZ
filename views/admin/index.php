<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="views/img/calendario.png">
    <link rel="stylesheet" href="views/css/indexAdmin.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
</head>

<body>
    <div id="container">
        <header id="header">
            <h1 class="titulo"><img src="views/img/calendario.png" class="logo">EmpresaXYZ</h1>
            <aside class="lateral">
                <ul>
                    <li><a href="index.php?n=dashboard">Dashboard</a></li>
                    <li><a href="index.php?n=calendario">Calendario</a></li>
                    <li><a>Reuniones</a></li>
                    <li><a>Empresas</a></li>
                    <li><a>Socios</a></li>
                </ul>
            </aside>
        </header>
        <div id="contenido">
            <nav id="navbar">
                <ul>
                    <li><a href="index.php?n=principal"><i class="fi fi-rr-settings"></i></a></li>
                    <li class="margin-right"><a href="index.php?n=principal"><i class="fi fi-sr-exit"></i></a></li>
                    <li class="ajustar"><img src="https://i.scdn.co/image/ab67616d00001e0249d694203245f241a1bcaa72"><span class="username">Administrador</span></li>
                </ul>
            </nav>
            <div class="contenido__pagina">
                <article class="registro">
                    <div class="registro__titulos">
                        <h2>Registrar Socio</h2>
                    </div>
                    <div>
                        <h3>Un Socio tiene los siguientes accesos:</h3>
                    </div>
                    <div class="registro__lista">
                        <ul>
                            <li>Ver calendario de reuniones</li>
                            <li>Subir puntos de reuniones</li>
                            <li>Ver empresas a las que pertenece</li>
                            <li>Ver a otros socios que pertenezcan a la empresa</li>
                            <li>No se que mas digan</li>
                        </ul>
                    </div>
                    <a href="" class="registro__btn">Un Socio</a>
                </article>
                <article class="registro">
                    <div class="registro__titulos">
                        <h2>Registrar Empresa</h2>
                    </div>
                    <div>
                        <h3 class="registro__contenido">Una Empresa tiene los siguientes accesos:</h3>
                    </div>
                    <div class="registro__lista">
                        <ul>
                            <li></li>
                        </ul>
                    </div>
                    <a href="" class="registro__btn">Una Empresa</a>
                </article>
            </div>
        </div>
    </div>
</body>

</html>