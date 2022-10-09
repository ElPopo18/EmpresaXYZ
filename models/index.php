<?php

class Modelo{
    private $Modelo;
    private $db;
    private $datos;
    private $datos2; //para anotaciones
    public function __construct(){
        $this->Modelo=array();
        $this->db=new PDO('mysql:host=localhost;dbname=consorcio',"root","");
    }
}    
?>

