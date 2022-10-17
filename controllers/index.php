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
    static function registrosoc(){
        require_once("views/registrosoc.php");
    }
    //  Guardar datos de un usuario socio
    static function guardaru(){
        $ced_socio=$_REQUEST['ced_socio'];
        $nombre_soc=$_REQUEST['nombre_soc'];
        $apellido_soc=$_REQUEST['apellido_soc'];
        $username=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $data="'".$ced_socio."','".$nombre_soc."','".$apellido_soc."','".$username."','".$password."'";
        $usuario=new Modelo();
        $condicion="ced_socio='".$ced_socio."' AND nombre_soc='".$nombre_soc."' AND apellido_soc='".$apellido_soc."' AND username='".$username."' AND
        password='".$password."'";

            if($usuario->validar_User_existente("socio","username='".$username."'","password='".$password."'")){
            header('location:'.ModeloController::registrosoc());
                echo "<script>alert('el nombre de usuario: $username o el correo: $password ya estan siendo utilizados');</script>";
            }else{
            $dato=$usuario->insertar("socio",$data);
                header('location:'.'index.php?n=inicio');
            }
    } 
    //va a la pagina de registrar una empresa
    static function registro_empresa(){
        require_once("views/registro_empresa.php");
    }
    //registrar una empresa
    static function registroEmpresa(){
        $rif = $_REQUEST['rif'];
        $nombre_empresa = $_REQUEST['nombre_empresa'];
        $password = $_REQUEST['password'];
        $data = "'".$rif."','".$nombre_empresa."','".$password."'";
        $empresa = new Modelo();
        $condicion = "rif='".$rif."' AND nombre_empresa='".$nombre_empresa."' AND password='".$password."'";
        if ($empresa->validar_User_existente("empresa","nombre_empresa='".$nombre_empresa."'","password='".$password."'")) {
            header('location:'.ModeloController::registro_empresa());
            echo "<script>alert('el nombre de la empresa: $empresa ya esta siendo utilizados');</script>";
        }
        else {
            $dato = $empresa->insertar("empresa",$data);
            header('location:'.'index.php?n=inicio');
        }
    }
    //todo apartir de aqui es funciones de Login
    // va a la pagina de login
    static function login(){
        require_once("views/login.php");
    }
    //va a la pagina de login socio
    static function inicioSocio(){
        require_once("views/loginSocio.php");
    }
    //va a la pagina de login empresa
    static function inicioEmpresa(){
        require_once("views/loginEmpresa.php");
    }
    //iniciar sesion como socio
    static function loginSocio(){
        $usuario = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $datos = new Modelo();
        $data = "username ='".$usuario."' and password ='".$password."'";
        $dato = $datos->login("socio",$data);

        if ($dato == true) {
            header('Location:'.'index.php?n=inicio');
        }
        else{
            header('location:'.'index.php?n=inicioSocio');
        }

    }        
    //inicio de empresa
    static function loginEmpresa(){
        $empresa = $_REQUEST['nombre_empresa'];
        $password = $_REQUEST['password'];
        $datos = new Modelo();
        $data = "nombre_empresa ='".$empresa."' and password ='".$password."'";
        $dato = $datos->login("empresa",$data);

        if ($dato == true) {
            header('Location:'.'index.php?n=inicio');
        }
        else{
            header('location:'.'index.php?n=inicioEmpresa');
        }
    }

    //todo interfaz
    static function inicio(){
        require_once("views/index.php");
    }
}
