<?php
session_start();
if (!empty($_POST['btn_ingresar'])) {
    if (!empty($_POST['username']) and !empty($_POST['password'])) {
        $usuario = $_POST['username'];
        $password = $_POST['password'];
        $sql = $conexion->query("SELECT * FROM socio WHERE username ='$usuario' and password = '$password'");
        if ($datos = $sql->fetch_object()) {
            $_SESSION['username'] = $datos->username;
            $_SESSION['cargo'] = $datos->cargo;
            $_SESSION['empresa'] = $datos->nombre_empresa;
            $_SESSION['foto'] = $datos->foto;
            if ($datos->foto == NULL) {
                $_SESSION['foto'] = "https://i.scdn.co/image/ab67616d00001e0249d694203245f241a1bcaa72";
            }
            if ($datos->cargo == 'Administrador') {
                header('location: index.php?n=inicioAdmin');
            } elseif ($datos->cargo == "Socio") {

                header('location: index.php?n=calendarioSocio');
            }
        } else {
            
            echo "<div class='alert alert-danger'>Acesso Denegado</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Campos vacios</div>";
    }
}
?>
