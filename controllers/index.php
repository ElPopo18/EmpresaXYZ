<?php
require 'models/index.php';

class ModeloController{
    private $model;
    public function __construct(){
        $this->model=new Modelo();
    }
    static function inicio(){
        require_once("views/index.php");
    }
    //Iniciar en la pagina principal
    static function principal(){
    require_once("views/principal.php");
    }
    // Iniciar en la pagina de inicio
    static function iniciar(){
        require_once("views/login.php");
    }
    //VA ALA PAGINA DE REGISTRO
    static function registro(){
        require_once("views/registro.php");
    }
    static function registrosoc(){
        require_once("views/registrosoc.php");
    }
            //  Guardar datos de usuario
            static function guardaru(){
                $ced_socio=$_REQUEST['ced_socio'];
                $nombre_soc=$_REQUEST['nombre_soc'];
                 $apellido_soc=$_REQUEST['apellido_soc'];
                $username=$_REQUEST['username'];
                $data="'".$ced_socio."','".$nombre_soc."','".$apellido_soc."','".$username."'";
               
                $usuario=new Modelo();
                $condicion="ced_socio='".$ced_socio."' AND nombre_soc='".$nombre_soc."' AND apellido_soc='".$apellido_soc."' AND username='".$username."'";
      
                  if($usuario->validar_User_existente("socio","username='".$username."'","ced_socio='".$ced_socio."'")){
                    header('location:'.ModeloController::registrosoc());
                     echo "<script>alert('el nombre de usuario: $username o el correo: $ced_socio ya estan siendo utilizados');</script>";
                  }else{
                    $dato=$usuario->insertar("socio",$data);
                     header('location:'.'index.php?n=iniciar.php');
                  }
             } 
}
?>
