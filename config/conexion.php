<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "consorcio";
    $conexion = new mysqli($server,$user,$pass,$db);
    if ($conexion->connect_errno) {
        die("La conexion a fallado". $conexion->connect_errno);
    }
?>
