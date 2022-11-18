<?php 
    require 'config.php';
    $salida = "";
    $consulta = "SELECT * FROM socio";

    if (isset($_POST['consulta'])) {
        $q = $conexion->real_escape_string($_POST['consulta']);
        $consulta = "SELECT * FROM socio WHERE username LIKE '%".$q."%' OR ced_socio LIKE '%".$q."%' OR nombre_soc LIKE '%".$q."%' OR apellido_soc LIKE '%".$q."%' OR nombre_empresa LIKE '%".$q."%' OR cargo LIKE '%".$q."%'";
    }

    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $salida .= '<tr>';
            $salida .= '<td>'.$row['username'].'</td>';
            $salida .= '<td>'.$row['ced_socio'].'</td>';
            $salida .= '<td>'.$row['nombre_soc'].'</td>';
            $salida .= '<td>'.$row['apellido_soc'].'</td>';
            $salida .= '<td>'.$row['nombre_empresa'].'</td>';
            $salida .= '<td>'.$row['cargo'].'</td>';
            $salida .= '<td class="tabla__link"><a href="">Editar</a></td>';
            $salida .= '<td class="tabla__link"><a href="">Eliminar</a></td>';
            $salida .= '</tr>';
        }
    }else {
        $salida.= "No se encontraron resultados :(";
    }

    echo $salida;

    $conexion->close();
?>