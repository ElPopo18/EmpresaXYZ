<?php

require_once("config/conexion.php");
require_once("controllers/index.php");
if(isset($_GET['n'])){
    if(method_exists("ModeloController",$_GET['n'])){
        ModeloController::{$_GET['n']}();
    }
}
else{
    ModeloController::principal();
    }
