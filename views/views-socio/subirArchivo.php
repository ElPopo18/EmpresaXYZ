<?php 
session_start();
if (empty($_SESSION['username'])) {
    header('location: index.php?n=paginaLogin');
}

include('config.php');
$SqlReunions   = ("SELECT * FROM empresa WHERE nombre_empresa LIKE '$_SESSION[empresa]'");

$resulReunions = mysqli_query($conexion, $SqlReunions);
//si le damos click al boton
if ($_POST['subir']) {
    $permitidos = array('pdf');
    $arregloArchivo = explode(".", $_FILES['archivo']['name']);
    $extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) {
        if (file_exists($_FILES['archivo']['tmp_name'])) {
            if (move_uploaded_file($_FILES['archivo']['tmp_name'], '../../documents/'.$_FILES['archivo']['name'])) {
                $descripcion = $_POST['descripcion'];
                $archivo = $_FILES['archivo']['name'];
                $nombre_empresa = $_SESSION['empresa'];
                $id_reunion = $_POST['id_reunion'];
                $fecha_inicio = $_POST['fecha_inicio'];
                $fecha_fin = $_POST['fecha_fin'];
                $color = $_POST['color_reunion'];
                $sql = $conexion->query("INSERT INTO punto (
                    descripcion,
                    archivo,
                    nombre_empresa,
                    id_reunion,
                    fecha_inicio,
                    fecha_fin,
                    color_reunion)                 
                    VALUES (
                        '".$descripcion."',
                        '".$archivo."',
                        '".$nombre_empresa."',
                        '".$id_reunion."',
                        '".$fecha_inicio."',
                        '".$fecha_fin."',
                        '".$color."'
                    )");
                $sql = $conexion->query("INSERT INTO puntos (
                    descripcion,
                    archivo,
                    nombre_empresa,
                    id_reunion,
                    fecha_inicio,
                    fecha_fin,
                    color_reunion)                 
                    VALUES (
                        '".$descripcion."',
                        '".$archivo."',
                        '".$nombre_empresa."',
                        '".$id_reunion."',
                        '".$fecha_inicio."',
                        '".$fecha_fin."',
                        '".$color."'
                    )");
                    header('Location: ../../index.php?n=calendarioSocio');
            }
        }
    }
    else {
        header('Location: ../../index.php?n=calendarioSocio');
    }
}
/*
if ($_FILES['archivo']['error'] == 0) { //Valida si no hay errores
    $dir = "files/"; //Directorio de carga
    $tamanio = 40000; //Tamaño permitido en kb
    $permitidos = array('csv', 'xlsx'); //Archivos permitido
    $ruta_carga = $dir . $_FILES['archivo']['name'];
    //Obtenemos la extensión del archivo
    $arregloArchivo = explode(".", $_FILES['archivo']['name']);
    $extension = strtolower(end($arregloArchivo));
    
    if (in_array($extension, $permitidos)) { //Valida si la extensión es permitida
        
        if ($_FILES['archivo']['size'] < ($tamanio * 1024)) { //Valida el tamaño
            
            //Valida si no existe la carpeta y la crea
            if (!file_exists($dir)) {
                mkdir($dir, 0777);
            }
            
            if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_carga)) {
                echo "<div class='alert alert-success'>El archivo se subio correctamente</div>";
                } else {
                echo "Error al cargar archivo";
            }
            } else {
            echo "Archivo excede el tamaño permitido";
        }
        } else {
        echo "<div class='alert alert-danger'>Solo se permiten archivos .pdf</div>";
    }
    } else {
    echo "No enviaste archivo";
}
?>
*/