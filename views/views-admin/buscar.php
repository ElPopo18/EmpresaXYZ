<?php 
    require 'config.php';
    $salida = "";
    $consulta = "SELECT * FROM empresa";

    if (isset($_POST['consulta'])) {
        $q = $conexion->real_escape_string($_POST['consulta']);
        $consulta = "SELECT * FROM empresa WHERE nombre_empresa LIKE '%".$q."%' OR id_empresa LIKE '%".$q."%'";
    }

    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $salida .= '<tr>';
            $salida .= '<td>'.$row['id_empresa'].'</td>';
            $salida .= '<td>'.$row['nombre_empresa'].'</td>';
            $salida .= '<td><a hreft="">Editar</a></td>';
            $salida .= '<td><a hreft="">Eliminar</a></td>';
            $salida .= '</tr>';
        }
    }else {
        $salida.= "No se encontraron resultados :(";
    }

    echo $salida;

    $conexion->close();
?>