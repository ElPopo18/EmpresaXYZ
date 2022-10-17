<?php
require 'models/index.php';

class ModeloController{
    private $model;
    public function __construct(){
        $this->model=new Modelo();
    }
    //Iniciar en la pagina principal
    static function principal(){
    require_once("views/principal.php");
    }
    //todo apartir de aqui es funciones de registro
    //VA ALA PAGINA DE REGISTRO
    static function registro(){
        require_once("views/registro.php");
    }
    // va a la pagina de registrar socio
    static function paginaRegistroSocio(){
        require_once("views/registroSocio.php");
    }
    //va a la pagina de registrar una empresa
    static function paginaRegistroEmpresa(){
        require_once("views/registroEmpresa.php");
    }
    //  Guardar datos de un usuario socio
    static function registroSocio(){
        $ced_socio=$_REQUEST['ced_socio'];
        $nombre_soc=$_REQUEST['nombre_soc'];
        $apellido_soc=$_REQUEST['apellido_soc'];
        $username=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $data="'".$ced_socio."','".$nombre_soc."','".$apellido_soc."','".$username."','".$password."'";
        $usuario=new Modelo();
        $condicion="ced_socio='".$ced_socio."' AND nombre_soc='".$nombre_soc."' AND apellido_soc='".$apellido_soc."' AND username='".$username."' AND
        password='".$password."'";

            if($usuario->validarUsuarioExistente("socio","username='".$username."'","password='".$password."'")){
            header('location:'.ModeloController::paginaRegistroSocio());
                echo "<script>alert('el nombre de usuario: $username o el correo: $password ya estan siendo utilizados');</script>";
            }else{
            $dato=$usuario->insertar("socio",$data);
                header('location:'.'index.php?n=inicioSocio');
            }
    } 
    //registrar una empresa
    static function registroEmpresa(){
        $rif = $_REQUEST['rif'];
        $nombre_empresa = $_REQUEST['nombre_empresa'];
        $password = $_REQUEST['password'];
        $data = "'".$rif."','".$nombre_empresa."','".$password."'";
        $empresa = new Modelo();
        $condicion = "rif='".$rif."' AND nombre_empresa='".$nombre_empresa."' AND password='".$password."'";
        if ($empresa->validarUsuarioExistente("empresa","nombre_empresa='".$nombre_empresa."'","password='".$password."'")) {
            header('location:'.ModeloController::registroEmpresa());
            echo "<script>alert('el nombre de la empresa: $empresa ya esta siendo utilizados');</script>";
        }
        else {
            $dato = $empresa->insertar("empresa",$data);
            header('location:'.'index.php?n=inicioAdmin');
        }
    }
    //todo apartir de aqui es funciones de Login
    // va a la pagina de login
    static function login(){
        require_once("views/login.php");
    }
    //va a la pagina de login socio
    static function paginaLoginSocio(){
        require_once("views/loginSocio.php");
    }
    //va a la pagina de login empresa
    static function paginaLoginEmpresa(){
        require_once("views/loginEmpresa.php");
    }
    //iniciar sesion como socio
    static function loginSocio(){
        $usuario = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $datos = new Modelo();
        $data = "username ='".$usuario."' and password ='".$password."'";
        $dato = $datos->validarUsuarioExistente("socio",$data);
        if ($dato ) {
            header('Location:'.'index.php?n=inicioSocio');
        }
        else{
            header('location:'.'index.php?n=paginaLoginSocio');
        }

    }        
    //inicio de empresa
    static function loginEmpresa(){
        $empresa = $_REQUEST['nombre_empresa'];
        $password = $_REQUEST['password'];
        $datos = new Modelo();
        $data = "nombre_empresa ='".$empresa."' and password ='".$password."'";
        $dato = $datos->validarUsuarioExistente("empresa",$data);

        if ($dato == true) {
            header('Location:'.'index.php?n=inicioAdmin');
        }
        else{
            header('location:'.'index.php?n=paginaLoginEmpresa');
        }
    }
    //todo interfaz
    static function inicioAdmin(){
        require_once("views/admin/index.php");
    }
    static function inicioSocio(){
        require_once("views/socio/index.php");
    }
}
