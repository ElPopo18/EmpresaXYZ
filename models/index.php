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

    public function insertar($tabla, $data){
        $consulta="insert into ".$tabla." values(".$data.")";
        $resultado=$this->db->query($consulta);
        if($resultado){
            return true;
        }else{
            return false;
        }
    }
        // Login /registrar
    /*
    public function validarUsuarioExistente($tabla, $condicion,$condicion2){
        $consul="select * from ".$tabla." where ".$condicion." OR ".$condicion2.";";
        $resul=$this->db->query($consul);
        if($resul){
            return $resul->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
    */
    
    public function validarUsuarioExistente($tabla, $condicion){
        $consul="select * from ".$tabla." where ".$condicion.";";
        $resul=$this->db->query($consul);
        if($resul){
            return $resul->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
}    
?>

