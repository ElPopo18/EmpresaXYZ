<?php

function connect(){
    $user="root";
    $pass="";
    $db="consorcio";
    $server="127.0.0.1";
    $con =  mysqli_connect($server,$user, $pass, $db );
   
  
    return $con;

}


?>