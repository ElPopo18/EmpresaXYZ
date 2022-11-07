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
        require_once("views/views-admin/registroSocio.php");
    }
    //va a la pagina de registrar una empresa
    static function paginaRegistroEmpresa()
    {
        require_once("views/views-admin/registroEmpresa.php");
    }
    //  Guardar datos de un usuario socio
    static function registroSocio()
    {
        $ced_socio = $_REQUEST['ced_socio'];
        $nombre_soc = $_REQUEST['nombre_soc'];
        $apellido_soc = $_REQUEST['apellido_soc'];
        $username = $_REQUEST['username'];
        $cargo = $_REQUEST['cargo'];
        $empresa = $_REQUEST['nombre_empresa'];
        $data = "'" . $ced_socio . "','" . $nombre_soc . "','" . $apellido_soc . "','" . $username . "','" . $cargo . "','".$empresa."'";
        $usuario = new Modelo();
        $condicion = "ced_socio='" . $ced_socio . "' AND nombre_soc='" . $nombre_soc . "' AND apellido_soc='" . $apellido_soc . "' AND username='" . $username . "' AND
        cargo='" . $cargo . "' AND nombre_empresa='".$empresa."'";

        if ($usuario->validarUsuarioExistente("socio", "username='" . $username . "'", "cargo='" . $cargo . "'")) {
            header('location:' . 'index.php?n=paginaRegistroSocio');
        } else {
            $dato = $usuario->insertar("socio", $data);
            header('location:' . 'index.php?n=inicioAdmin');
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
            header('location: index.php?n=paginaRegistroEmpresa');
        } else {
            $dato = $empresa->insertar("empresa", $data);
            header('location:' . 'index.php?n=inicioAdmin');
        }
    }
    //
    //va a la pagina de login
    static function paginaLogin()
    {
        require_once("views/login.php");
    }
    //todo interfaz del admin
    static function inicioAdmin()
    {
        require_once("views/views-admin/indexAdmin.php");
    }
    //empresas
    static function empresasAdmin(){
        require_once("views/views-admin/empresasAdmin.php");
    }
    //reuniones
    static function reunionesAdmin(){
        require_once("views/views-admin/reunionesAdmin.php");
    }
    //reuniones
    static function sociosAdmin(){
        require_once("views/views-admin/sociosAdmin.php");
    }
    static function calendarioAdmin()
    {
        require_once("views/views-admin/calendarioAdmin.php");
    }
    //todo fin interfaz del admin

    //todo interfaz del socio

    static function calendarioSocio(){
        require_once("views/views-socio/calendarioSocios.php");
    }
    static function reunionesSocio(){
        require_once("views/views-socio/reunionesSocios.php");
    }
    static function sociosSocio(){
        require_once("views/views-socio/sociosSocios.php");
    }
    //todo fin interfaz del socio
}