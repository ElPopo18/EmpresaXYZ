<?php

date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");

require("config.php");
                        
$nombre_empresa = $_POST['nombre_empresa'];
$evento = ucwords($_REQUEST['evento']);
$f_inicio = $_REQUEST['fecha_inicio'];
$fecha_inicio = date('Y-m-d', strtotime($f_inicio)); 
$f_fin = $_REQUEST['fecha_fin']; 
$seteando_f_final = date('Y-m-d', strtotime($f_fin));  
$fecha_fin1 = strtotime($seteando_f_final."+ 1 days");
$fecha_fin = date('Y-m-d', ($fecha_fin1));  
$color_evento = $_REQUEST['color_evento'];

$UpdateProd = ("UPDATE eventos_tablas
    SET nombre_empresa ='$nombre_empresa',
        evento ='$evento',
        fecha_inicio ='$fecha_inicio',
        fecha_fin ='$fecha_fin',
        color_evento ='$color_evento'
    WHERE id='".$idEvento."' ");
$result = mysqli_query($conexion, $UpdateProd);

header("Location: ../../index.php?n=calendarioAdmin");
?>