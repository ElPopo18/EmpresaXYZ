<?php
require 'models/index.php';

class ModeloController
{
    private $model;
    public function __construct()
    {
        $this->model = new Modelo();
    }
    //Iniciar en la pagina principal
    static function principal()
    {
        require_once("views/principal.php");
    }
    //todo apartir de aqui es funciones de registro
    // va a la pagina de registrar socio
    static function paginaRegistroSocio()
    {
        require_once("views/registroSocio.php");
    }
    //va a la pagina de registrar una empresa
    static function paginaRegistroEmpresa()
    {
        require_once("views/registroEmpresa.php");
    }
    //  Guardar datos de un usuario socio
    static function registroSocio()
    {
        $ced_socio = $_REQUEST['ced_socio'];
        $nombre_soc = $_REQUEST['nombre_soc'];
        $apellido_soc = $_REQUEST['apellido_soc'];
        $username = $_REQUEST['username'];
        $cargo = $_REQUEST['cargo'];
        $data = "'" . $ced_socio . "','" . $nombre_soc . "','" . $apellido_soc . "','" . $username . "','" . $cargo . "'";
        $usuario = new Modelo();
        $condicion = "ced_socio='" . $ced_socio . "' AND nombre_soc='" . $nombre_soc . "' AND apellido_soc='" . $apellido_soc . "' AND username='" . $username . "' AND
        cargo='" . $cargo . "'";

        if ($usuario->validarUsuarioExistente("socio", "username='" . $username . "'", "cargo='" . $cargo . "'")) {
            header('location:' . ModeloController::paginaRegistroSocio());
        } else {
            $dato = $usuario->insertar("socio", $data);
            header('location:' . 'index.php?n=dashboard');
        }
    }
    //registrar una empresa
    static function registroEmpresa()
    {
        $rif = $_REQUEST['rif'];
        $nombre_empresa = $_REQUEST['nombre_empresa'];
        $data = "'" . $rif . "','" . $nombre_empresa . "'";
        $empresa = new Modelo();
        $condicion = "rif='" . $rif . "' AND nombre_empresa='" . $nombre_empresa . "'";
        if ($empresa->validarUsuarioExistente("empresa", "nombre_empresa='" . $nombre_empresa . "'")) {
            header('location:' . ModeloController::paginaRegistroEmpresa());
            echo "<script>alert('el nombre de la empresa: $empresa ya esta siendo utilizados');</script>";
        } else {
            $dato = $empresa->insertar("empresa", $data);
            header('location:' . 'index.php?n=dashboard');
        }
    }
    //todo apartir de aqui es funciones de Login
    //va a la pagina de login
    static function paginaLogin()
    {
        require_once("views/login.php");
    }
    //iniciar sesion como socio
    static function login()
    {
        $username = $_REQUEST['username'];
        $ced_socio = $_REQUEST['ced_socio'];
        $datos = new Modelo();
        $data = "username ='" . $username . "' and ced_socio ='" . $ced_socio . "'";
        $dato = $datos->validarUsuarioExistente("socio", $data);
        $cargoAdmin = $datos->cargoAdmin($username);
        /*
        if ($dato == true && $cargoSocio == true) {
            require_once("views/socio/index.php");
        }*/
        if ($dato == true && $cargoAdmin == true) {
            require_once("views/admin/index.php");
        } else {
            header('location:' . ModeloController::paginaLogin());
        }
    }
    //todo interfaz
    /*
    static function inicioSocio()
    {
        require_once("views/socio/index.php");
    }
    */
    //ir al inicio
    static function dashboard()
    {
        require_once("views/admin/index.php");
    }
    //ir al calendario
    static function calendario()
    {
        require_once("views/calendario.php");
    }
}
