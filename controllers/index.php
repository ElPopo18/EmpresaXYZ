<?php
require 'models/index.php';

class ModeloController{
    private $model;
    public function __construct(){
        $this->model=new Modelo();
    }
        // Iniciar en la pagina de inicio
    static function iniciar(){
        require_once("views/login.php");
    }
    static function inicio(){
        require_once("views/index.php");
    }
         //Iniciar en la pagina principal
    static function principal(){
    require_once("views/principal.php");
    }
}      
?>
