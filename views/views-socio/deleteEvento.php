<?php
require('config.php');
$nombre_empresa   		= $_REQUEST['nombre_empresa']; 

$sqlDeleteEvento = ("DELETE FROM eventos_tablas WHERE  nombre_empresa='" .$nombre_empresa. "'");
$resultProd = mysqli_query($conexion, $sqlDeleteEvento);

?>
  