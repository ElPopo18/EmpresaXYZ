<?php
session_start();
$incluir = include('config/conexion.php');
if ($incluir) {
    $consulta = "SELECT *  FROM socio WHERE nombre_empresa like '$_SESSION[empresa]'";
    $resultado = mysqli_query($conexion, $consulta);
}
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
    <title>Ver Socios</title>
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
                    <li><a href="index.php?n=reunionesSocio">Reuniones</a></li>
                    <li><a href="index.php?n=sociosSocio" class="active">Socios</a></li>
                </ul>
            </aside>
        </header>
        <div id="contenido">
            <nav id="navbar">
                <ul>
                    <li><a href="index.php?n=principal"><i class="fi fi-rr-settings"></i></a></li>
                    <li class="margin-right"><a href="controllers/controladorCerrarSesion.php"><i class="fi fi-sr-exit"></i></a></li>

                    <li class="ajustar"><img src="<?php echo $_SESSION['foto']?>"><span class="username"><?php echo $_SESSION['username'] ?><p class="cargo"><?php echo $_SESSION['cargo'] ?></p></span></li>
                </ul>
            </nav>
            <div class="contenido__pagina">
                <h2 class="tabla__titulo">Socios de la Empresa <?php echo $_SESSION['empresa'] ?></h2>
                <div class="tabla_scroll">
                    <table border="1" class="tabla">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cedula</th>
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
                                </tr>
    
                            <?php         } ?>
                        </tbody>
                    </table>
                </div>
            </div>
</body>
<script type="text/javascript">
        $(buscar_datos());
        function buscar_datos(consulta){
            $.ajax({
                url: "views/views-socio/buscarSocio.php",
                type: "POST",
                dataType: "HTML",
                data: {consulta: consulta},
            })
            .done(function(respuesta) {
                $("#reuniones").html(respuesta);
            })
            .fail(function() {
                console.log("error");
            })
        }

        $(document).on("keyup", "#buscar", function(){
            var valor = $(this).val();
            if (valor != "") {
                buscar_datos(valor);
            }else{
                buscar_datos();
            }
        });
    </script>
</html>