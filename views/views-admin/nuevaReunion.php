
<?php
require("config.php");
$nombre_empresa = ucwords($_REQUEST['nombre_empresa']);
$f_inicio = $_REQUEST['fecha_inicio'];
$fecha_inicio = date('Y-m-d', strtotime($f_inicio)); 

$f_fin = $_REQUEST['fecha_fin']; 
$seteando_f_final = date('Y-m-d', strtotime($f_fin));  
$fecha_fin1 = strtotime($seteando_f_final."+ 1 days");
$fecha_fin = date('Y-m-d', ($fecha_fin1));  
$color_reunion = $_REQUEST['color_reunion'];
$descripcion = $_REQUEST['descripcion'];
$InsertNuevoReunion = "INSERT INTO reunion(
      nombre_empresa,
      fecha_inicio,
      fecha_fin,
      color_reunion,
      descripcion
      )
    VALUES (
      '" .$nombre_empresa. "',
      '". $fecha_inicio."',
      '" .$fecha_fin. "',
      '" .$color_reunion. "',
      '".$descripcion."'
  )";
$resultadoNuevoReunion = mysqli_query($conexion, $InsertNuevoReunion);

$InsertNuevoReunion2 = "INSERT INTO reuniones(
      nombre_empresa,
      fecha_inicio,
      fecha_fin,
      color_reunion,
      descripcion
      )
    VALUES (
      '" .$nombre_empresa. "',
      '". $fecha_inicio."',
      '" .$fecha_fin. "',
      '" .$color_reunion. "',
      '".$descripcion."'
  )";
$resultadoNuevoreunion2 = mysqli_query($conexion, $InsertNuevoReunion2);

header("Location: ../../index.php?n=calendarioAdmin");

?>