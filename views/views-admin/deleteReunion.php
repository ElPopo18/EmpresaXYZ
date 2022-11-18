<?php
require_once('config.php');
$id_reunion = $_REQUEST['id_reunion']; 

$sqlDeleteEvento = ("DELETE FROM reunion WHERE id_reunion='" .$id_reunion. "'");
$resultProd = mysqli_query($conexion, $sqlDeleteEvento);

?>
  