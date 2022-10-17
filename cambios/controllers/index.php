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
                $cargo=$_REQUEST['cargo'];
                $data="'".$ced_socio."','".$nombre_soc."','".$apellido_soc."','".$username."','".$cargo."'";
               
                $usuario=new Modelo();
                $condicion="ced_socio='".$ced_socio."' AND nombre_soc='".$nombre_soc."' AND apellido_soc='".$apellido_soc."' AND username='".$username."' AND cargo='".$cargo."'";
      
                  if($usuario->validar_User_existente("socio","username='".$username."'","ced_socio='".$ced_socio."'")){
                    header('location:'.ModeloController::registrosoc());
                     echo "<script>alert('el nombre de usuario: $username o el correo: $ced_socio ya estan siendo utilizados');</script>";
                  }else{
                    $dato=$usuario->insertar("socio",$data);
                     header('location:'.'index.php?n=iniciar.php');
                  }
             }
    static function inicioSocio(){
        require_once("views/loginSocio.php");
    }
    static function login(){
        $username=$_REQUEST['username'];
        $ced_socio=$_REQUEST['ced_socio'];
         $datos=new Modelo();
         $data="username='".$username."' AND ced_socio='".$ced_socio."'";
         $dato=$datos->login("socio",$data);
         $soc=$datos->areSoc($username);
         $adm=$datos->areAdmin($username);
        
        if($dato==true && $soc == true){
            require_once("views/homesocio.php");
        }
        elseif($dato== true && $adm==true){
            require_once("views/homeadmin.php");
        }
        else{
            
          header('location:'.ModeloController::iniciar());
          echo "<script>alert ('la contraseña o el nombre de usuario es incorrecto');</script>";

        
        }
      } 
}
?>
