<?php 
    require 'config.php';
    $salida = "";
    $consulta = "SELECT * FROM reuniones";

    if (isset($_POST['consulta'])) {
        $q = $conexion->real_escape_string($_POST['consulta']);
        $consulta = "SELECT * FROM reuniones WHERE id_reunion LIKE '%".$q."%' OR nombre_empresa LIKE '%".$q."%' OR color_reunion LIKE '%".$q."%' OR fecha_inicio LIKE '%".$q."%' OR fecha_fin LIKE '%".$q."%'";
    }

    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $salida .= '<tr>';
            $salida .= '<td>'.$row['id_reunion'].'</td>';
            $salida .= '<td>'.$row['nombre_empresa'].'</td>';
            $color = $row['color_reunion'];
            $salida .= '<td style="background-color: '.$color.';">'.$row['color_reunion'].'</td>';
            $salida .= '<td>'.$row['fecha_inicio'].'</td>';
            $salida .= '<td>'.$row['fecha_fin'].'</td>';
            $salida .= '</tr>';
        }
    }else {
        $salida.= "No se encontraron resultados :(";
    }

    echo $salida;

    $conexion->close();
?>