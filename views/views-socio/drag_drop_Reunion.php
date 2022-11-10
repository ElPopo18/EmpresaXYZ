<?php
include('config.php');
                        
$id_reunion = $_POST['id_reunion'];
$start = $_REQUEST['start'];
$fecha_inicio = date('Y-m-d', strtotime($start)); 
$end = $_REQUEST['end']; 
$fecha_fin = date('Y-m-d', strtotime($end));  


$UpdateProd = ("UPDATE reunion 
    SET 
        fecha_inicio ='$fecha_inicio',
        fecha_fin ='$fecha_fin'

    WHERE id_reunion='".$id_reunion."' ");
$result = mysqli_query($conexion, $UpdateProd);

if ($result) {
    $UpdateProd = "UPDATE reuniones 
    SET 
        fecha_inicio ='$fecha_inicio',
        fecha_fin ='$fecha_fin'

    WHERE id_reunion='".$id_reunion."'";
    $result2 = mysqli_query($conexion,$UpdateProd);
}

?>