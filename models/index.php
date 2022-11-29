<?php

class Modelo
{
    private $Modelo;
    private $db;
    private $datos;
    private $datos2; //para anotaciones
    public function __construct()
    {
        $this->Modelo = array();
        $this->db = new PDO('mysql:host=localhost;dbname=consorcio', "root", "");
    }
    //insertar a la base de datos
    public function insertar($tabla, $data)
    {
        $consulta = "insert into " . $tabla . " values(" . $data . ")";
        $resultado = $this->db->query($consulta);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    //validar si existe 
    public function validarUsuarioExistente($tabla, $condicion)
    {
        $consul = "select * from " . $tabla . " where " . $condicion . ";";
        $resul = $this->db->query($consul);
        if ($resul) {
            return $resul->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}
