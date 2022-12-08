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
    <title>Configuracion</title>
    <link rel="icon" href="views/img/calendario.png">
    <link rel="stylesheet" href="../css/configuracionesUsuario.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script defer src="js/activarPagina.js"></script>
</head>

<body>
    <div id="container">
        <header id="header">
            <h1 class="titulo"><img src="../img/calendario.png" class="logo">EmpresaXYZ</h1>
            <aside class="lateral">
                <ul>
                    <li><a href="../../index.php?n=inicioAdmin">Dashboard</a></li>
                    <li><a href="../../index.php?n=calendarioAdmin">Calendario</a></li>
                    <li><a href="../../index.php?n=reunionesAdmin">Reuniones</a></li>
                    <li><a href="../../index.php?n=empresasAdmin">Empresas</a></li>
                    <li><a href="../../index.php?n=sociosAdmin">Socios</a></li>
                    <li><a href="../../index.php?n=configuracionAdmin" class="active">Configuracion</a></li>
                </ul>
            </aside>
        </header>
        <div id="contenido">
            <nav id="navbar">
                <div class="navbar__seccion">
                    <h2 class="seccion">Configuraciones del adminitrador</h2>
                </div>
                <ul>
                    <li><a href="../../index.php?n=configuracionSocio"></a>Configuracion</li>
                    <li class="margin-right"><a href="../../controllers/controladorCerrarSesion.php">Cerrar Sesion</a></li>
                    <li class="ajustar"><img src="img-perfil/<?php echo $_SESSION['foto']?>"><span class="username"><?php echo $_SESSION['username'] ?><p class="cargo"><?php echo $_SESSION['cargo'] ?></p></span></li>
                </ul>
            </nav>
            <div class="contenido__pagina">
                <div class="configuracion">
                    <?php
                    require '../../config/conexion.php';
                    $usuario = $_SESSION['username'];
                    $nombre = $conexion->real_escape_string($_POST['nombre_soc']);
                    $apellido = $conexion->real_escape_string($_POST['apellido_soc']);
                    $password = $conexion->real_escape_string($_POST['password']);
                    $foto_antigua = $_SESSION['foto'];
                    $pass = "SELECT * FROM socio WHERE password NOT LIKE '%$password%'";
                    $foto = $_FILES['foto'];
                    $tmp_name = $foto['tmp_name'];
                    $img_file = $foto['name'];
                    $img_type = $foto['type'];
                    $directorio = "../../img-perfil";
                    $actualizar = "UPDATE socio SET nombre_soc='$nombre', apellido_soc='$apellido' WHERE username= '$usuario'";   
                    if ($pass == NULL) {
                        $resultado = $conexion->query($actualizar);
                    }
                    else if ($img_file == NULL) {
                        $actualizar = "UPDATE socio SET nombre_soc='$nombre', apellido_soc='$apellido', password='$password' WHERE username= '$usuario'";   
                        $resultado = $conexion->query($actualizar);
                        echo '<div class="mensaje">Usuario editado con exito</div>';
                        header('refresh:3; url=../../index.php?n=configuracionSocio');
                    }
                    else {
                        //si es una imagen
                        if ((strpos($img_type, "png")) || (strpos($img_type, "jpeg")) || (strpos($img_type, "jpg") || (strpos($img_type, "gif")))) {
                            //se sube la imagen
                            $destino = $directorio . "/" . $img_file;
                            $nombre_foto = $img_file;
                            $actualizar = "UPDATE socio SET nombre_soc='$nombre', apellido_soc='$apellido', password='$password', foto='$nombre_foto' WHERE username= '$usuario'";   
                            $resultado = $conexion->query($actualizar);
                            if (move_uploaded_file($tmp_name, $destino)) {
                                echo '<div class="mensaje">Usuario editado con exito</div>';
                                header('refresh:3; url=../../index.php?n=configuracionSocio');
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>