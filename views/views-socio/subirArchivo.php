<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location: index.php?n=paginaLogin');
}

include('../../config/conexion.php');
$SqlReunions   = ("SELECT * FROM empresa WHERE nombre_empresa LIKE '$_SESSION[empresa]'");

$resulReunions = mysqli_query($conexion, $SqlReunions);
//si le damos click al boton
if ($_POST['subir']) {
    $permitidos = array('pdf');
    $arregloArchivo = explode(".", $_FILES['archivo']['name']);
    $extension = strtolower(end($arregloArchivo));
    if (in_array($extension, $permitidos)) {
        if (file_exists($_FILES['archivo']['tmp_name'])) {
            if (move_uploaded_file($_FILES['archivo']['tmp_name'], '../../documents/' . $_FILES['archivo']['name'])) {
                $descripcion = $_POST['descripcion'];
                $archivo = $_FILES['archivo']['name'];
                $username = $_SESSION['username'];
                $nombre_empresa = $_SESSION['empresa'];
                $id_reunion = $_POST['id_reunion'];
                $fecha_inicio = $_POST['fecha_inicio'];
                $fecha_fin = $_POST['fecha_fin'];
                $tipo = $_POST['tipo'];
                $sql = $conexion->query("INSERT INTO punto (
                    username,
                    descripcion,
                    archivo,
                    nombre_empresa,
                    id_reunion,
                    fecha_inicio,
                    tipo
                    )                 
                    VALUES (
                        '" . $username. "',
                        '" . $descripcion . "',
                        '" . $archivo . "',
                        '" . $nombre_empresa . "',
                        '" . $id_reunion . "',
                        '" . $fecha_inicio . "',
                        '" . $tipo . "'
                    )");
                header('Location: ../../index.php?n=afterNuevoPunto');
            }
        }
    } else {
        $descripcion = $_POST['descripcion'];
        $archivo = $_FILES['archivo']['name'];
        $username = $_SESSION['username'];
        $nombre_empresa = $_SESSION['empresa'];
        $id_reunion = $_POST['id_reunion'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $tipo = $_POST['tipo'];
        $sql = $conexion->query("INSERT INTO punto (
            username,
            descripcion,
            archivo,
            nombre_empresa,
            id_reunion,
            fecha_inicio,
            tipo
            )                 
            VALUES (
                '" . $username. "',
                '" . $descripcion . "',
                '" . $archivo . "',
                '" . $nombre_empresa . "',
                '" . $id_reunion . "',
                '" . $fecha_inicio . "',
                '" . $tipo . "'
            )");
        header('Location: ../../index.php?n=afterNuevoPunto');
    }
}
