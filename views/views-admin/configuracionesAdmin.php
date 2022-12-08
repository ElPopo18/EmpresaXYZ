<?php
require('config/conexion.php');
$consulta = "SELECT *  FROM empresa";
$resultado = mysqli_query($conexion, $consulta);

session_start();
if (empty($_SESSION['username'])) {
    header('location: index.php?n=paginaLogin');
}
$username = $_SESSION['username'];
$sql = "SELECT * FROM socio WHERE username='$username'";
$resultadoS = $conexion->query($sql);

$row = $resultadoS->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuracion</title>
    <link rel="icon" href="views/img/calendario.png">
    <link rel="stylesheet" href="views/css/configuracionesUsuario.css">
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
                    <li><a href="index.php?n=sociosAdmin">Socios</a></li>
                    <li><a href="index.php?n=configuracionUsuario" class="active">Configuracion</a></li>
                </ul>
            </aside>
        </header>
        <div id="contenido">
            <nav id="navbar">
                <div class="navbar__seccion">
                    <h2 class="seccion">Configuraciones del Usuario</h2>
                </div>
                <ul>
                    <li><a href="index.php?n=configuracionAdmin">Configuracion</a></li>
                    <li class="margin-right"><a href="controllers/controladorCerrarSesion.php">Cerrar Sesion</a></li>
                    <li class="ajustar"><img src="img-perfil/<?php echo $_SESSION['foto']?>"><span class="username"><?php echo $_SESSION['username'] ?><p class="cargo">
                                <?php echo $_SESSION['cargo'] ?></p></span></li>
                </ul>
            </nav>
            <div class="contenido__pagina">
                <div class="configuracion">
                    <h3 class="configuracion__titulo">Editar perfil</h3>
                    <form class="form" autocomplete="off" method="POST" action="views/views-admin/editarAdmin.php" enctype="multipart/form-data">
                        <div class="form_container">
                            <div class="form-control">        
                                <input type="hidden" id="username" name="username" value="<?php echo $username; ?>" />
                            </div>
                            <div class="form_grupo">
                                <input type="text" name="nombre_soc" class="form_input" placeholder=" " value="<?php echo $row['nombre_soc']; ?>" required>
                                <label for="nombre" class="form_label">Nombre:</label>
                                <span class="form_line"></span>
                            </div>
                            <div class="form_grupo">
                                <input type="text" name="apellido_soc" class="form_input" placeholder=" " value="<?php echo $row['apellido_soc']; ?>" required>
                                <label for="apellido" class="form_label" value="">Apellido:</label>
                                <span class="form_line"></span>
                            </div>
                            <div class="form_grupo">
                                <input type="password" name="password" class="form_input" placeholder=" " value="<?php echo $row['password']; ?>">
                                <label for="password" class="form_label">Contraseña:</label>
                                <span class="form_line"></span>
                            </div>                            
                        </div>
                        <input class="subir_archivo"  type="file" name="foto">
                        <input type="submit" class="form_submit" name="subir" value="Guardar Cambios">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>