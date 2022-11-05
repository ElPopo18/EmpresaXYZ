<?php
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
    <title>Calendario Socio</title>
    <link rel="icon" href="views/img/calendario.png">
    <link rel="stylesheet" href="views/css/calendarioSocios.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <!--bootstrap-->
    <link href="views/css/bootstrap.min.css" rel="stylesheet">
    <link href="views/css/main.css" rel="stylesheet">
</head>

<body>
    <div id="container">
        <header id="header">
            <h1 class="titulo"><img src="views/img/calendario.png" class="logo">EmpresaXYZ</h1>
            <aside class="lateral">
                <ul>
                    <li><a href="#">Agregar puntos</a></li>
                    <li><a href="index.php?n=calendarioSocio">Calendario</a></li>
                    <li><a href="index.php?n=reunionesSocio">Reuniones</a></li>
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
                <div id='calendar'></div>
            </div>
            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h5 class="modal-title" id="titulo">Registro de Eventos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="formulario" autocomplete="off">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3">
                                            <input type="hidden" id="id" name="id">
                                            <input id="title" type="text" class="form-control" name="title">
                                            <label for="title">Evento</label>
                                        </div>
                                         
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="start" type="date" name="start">
                                            <label for="" class="form-label">Fecha</label>
                                        </div>
                                         
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="color" type="color" name="color">
                                            <label for="color" class="form-label">Color</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                                <button type="submit" class="btn btn-primary" id="btnAccion">Guardar</button>
                            </div>
                        </form>
                         
                    </div>
                </div>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/moment.js"></script>
        <script src="js/sweetalert2.all.min.js"></script>
        <script src="js/es.js"></script>
        <script src="js/app.js"></script>
</body>

</html>