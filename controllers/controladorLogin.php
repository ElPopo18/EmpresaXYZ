<?php 
    session_start();
    if (!empty($_POST['btn_ingresar'])) {
        if (!empty($_POST['username']) and !empty($_POST['ced_socio'])) {
            $usuario = $_POST['username'];
            $password = $_POST['ced_socio'];
            $sql = $conexion->query("SELECT * FROM socio WHERE username ='$usuario' and ced_socio = '$password'");
            if ($datos = $sql->fetch_object()) {
                $_SESSION['username'] = $datos->username;
                $_SESSION['cargo'] = $datos->cargo;
                $_SESSION['empresa'] = $datos->nombre_empresa;
                if ($datos->cargo == 'Administrador') {
                    header('location: index.php?n=inicioAdmin');
                } elseif ($datos->cargo == "Socio") {
                    
                    header('location: index.php?n=calendarioSocio');
                } 
            } else {
                echo "<div class='alert alert-danger'>Acesso Denegado</div>";
            }
        } else {
            echo "Campos vacios";
        }
    }
?>