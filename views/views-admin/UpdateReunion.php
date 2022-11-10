<?php
require("config.php");
$id_reunion = $_POST['id_reunion'];     
$nombre_empresa = ucwords($_POST['nombre_empresa']);
$f_inicio = $_REQUEST['fecha_inicio'];
$fecha_inicio = date('Y-m-d', strtotime($f_inicio)); 
$f_fin = $_REQUEST['fecha_fin']; 
$seteando_f_final = date('Y-m-d', strtotime($f_fin));  
$fecha_fin1 = strtotime($seteando_f_final."+ 1 days");
$fecha_fin = date('Y-m-d', ($fecha_fin1));  
$color_reunion = $_REQUEST['color_reunion'];

$UpdateProd = ("UPDATE reunion
    SET nombre_empresa ='$nombre_empresa',
        fecha_inicio ='$fecha_inicio',
        fecha_fin ='$fecha_fin',
        color_reunion ='$color_reunion'
    WHERE id_reunion='".$id_reunion."'");
$result = mysqli_query($conexion, $UpdateProd);

$UpdateProd = ("UPDATE reuniones
    SET nombre_empresa ='$nombre_empresa',
        fecha_inicio ='$fecha_inicio',
        fecha_fin ='$fecha_fin',
        color_reunion ='$color_reunion'
    WHERE id_reunion='".$id_reunion."'");
$result = mysqli_query($conexion, $UpdateProd);

header("Location: ../../index.php?n=calendarioAdmin");
?>