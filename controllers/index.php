<?php
require 'models/index.php';
class ModeloController
{
    private $model;
    public function __construct()
    {
        $this->model = new Modelo();
    }
    //Iniciar en la pagina principal
    static function principal()
    {
        require_once("views/principal.php");
    }
    //todo apartir de aqui es funciones de registro
    // va a la pagina de registrar socio
    static function paginaRegistroSocio()
    {
        require_once("views/views-admin/registroSocio.php");
    }
    //va a la pagina de registrar una empresa
    static function paginaRegistroEmpresa()
    {
        require_once("views/views-admin/registroEmpresa.php");
    }
    //  Guardar datos de un usuario socio

    //?Admin
    static function registroSocio()
    {
        $username = $_REQUEST['username'];
        $socio = new Modelo();
        if ($socio->validarUsuarioExistente("socio", "username='" .$username. "'")) {
            header('location:' . 'index.php?n=paginaRegistroSocio');
        }
        else {   
            $nombre_soc = $_REQUEST['nombre_soc'];
            $apellido_soc = $_REQUEST['apellido_soc'];
            $ced_socio = $_REQUEST['ced_socio'];
            if ($socio->validarUsuarioExistente("socio", "ced_socio='" .$ced_socio. "'")) {
                header('location:' . 'index.php?n=paginaRegistroSocio');
            }
            else {
                $pass = $_REQUEST['password'];
                $cargo = $_REQUEST['cargo'];
                $empresa = $_REQUEST['nombre_empresa'];
                if ($socio->validarUsuarioExistente("empresa", "nombre_empresa='" . $empresa . "'")) {
                    $foto = $_FILES['foto'];
                    $tmp_name = $foto['tmp_name'];
                    $img_file = $foto['name'];
                    $img_type = $foto['type'];
                    $directorio = "../../img-perfil";
                    $data = "'" . $username . "','" . $nombre_soc . "','" . $apellido_soc . "','" . $ced_socio . "','" . $pass . "','" . $cargo . "', '" . $empresa . "', '" . $img_file . "'";
                    $condicion = "username='" . $username . "' AND nombre_soc='" . $nombre_soc . "' AND apellido_soc='" . $apellido_soc . "' AND ced_socio='" . $ced_socio . "' AND
                    pass='" . $pass . "' AND cargo='" . $cargo . "' AND nombre_empresa='" . $empresa . "' AND foto = '" . $img_file . "'";
                    $dato = $socio->insertar("socio", $data);
                    header('location:' . 'index.php?n=afterRegistroSocio');       
                }
                else {
                    header('location:' . 'index.php?n=paginaRegistroSocio');
                }
            }
        }
    }
    //registrar una empresa
    static function registroEmpresa()
    {
        $empresa = new Modelo();
        $nombre_empresa = ucwords($_REQUEST['nombre_empresa']);
        if ($empresa->validarUsuarioExistente("empresa", "nombre_empresa='" . $nombre_empresa . "'")) {
            header('location: index.php?n=paginaRegistroEmpresa');
        }
        else {
            $id_empresa = $_REQUEST['id_empresa'];
            $nombre_empresa = $_REQUEST['nombre_empresa'];
            $data = "'" . $id_empresa . "','" . $nombre_empresa . "'";
            $empresa = new Modelo();
            $condicion = "id_empresa='" . $id_empresa . "' AND nombre_empresa='" . $nombre_empresa . "'";
            $dato = $empresa->insertar("empresa", $data);
            header('location:' . 'index.php?n=afterRegistroEmpresa');
        }
    }

    //todo fin de funciones de registro
    //va a la pagina de login
    static function paginaLogin()
    {
        require_once("views/login.php");
    }

    //todo funciones del calendario del admin
    static function nuevaReunion()
    {
        require('config/conexion.php');
        $empresa = new Modelo();
        $nombre_empresa = ucwords($_REQUEST['nombre_empresa']);
        if ($empresa->validarUsuarioExistente("empresa", "nombre_empresa='" . $nombre_empresa . "'")) {
            $nombre_empresa = ucwords($_REQUEST['nombre_empresa']);
            $f_inicio = $_REQUEST['fecha_inicio'];
            $fecha_inicio = date('Y-m-d', strtotime($f_inicio));
            $f_fin = $_REQUEST['fecha_fin'];
            $seteando_f_final = date('Y-m-d', strtotime($f_fin));
            $fecha_fin1 = strtotime($seteando_f_final . "+ 1 days");
            $fecha_fin = date('Y-m-d', ($fecha_fin1));
            $color_reunion = $_REQUEST['color_reunion'];
            $hora_inicio = $_REQUEST['hora_inicio'];
            $hora_fin = $_REQUEST['hora_fin'];
            $InsertNuevoReunion = "INSERT INTO reunion(
              nombre_empresa,
              fecha_inicio,
              fecha_fin,
              color_reunion,
              hora_inicio,
              hora_fin
              )
            VALUES (
              '" . $nombre_empresa . "',
              '" . $fecha_inicio . "',
              '" . $fecha_fin . "',
              '" . $color_reunion . "',
              '" . $hora_inicio . "',
              '" . $hora_fin . "'
              )";
            $resultadoNuevoReunion = mysqli_query($conexion, $InsertNuevoReunion);

            $InsertNuevoReunion2 = "INSERT INTO reuniones(
              nombre_empresa,
              fecha_inicio,
              fecha_fin,
              color_reunion,
              hora_inicio,
              hora_fin
              )
            VALUES (
              '" . $nombre_empresa . "',
              '" . $fecha_inicio . "',
              '" . $fecha_fin . "',
              '" . $color_reunion . "',
              '" . $hora_inicio . "',
              '" . $hora_fin . "'
                )";
                $resultadoNuevoreunion2 = mysqli_query($conexion, $InsertNuevoReunion2);
                header("Location: index.php?n=afterNuevaReunion");
        }
        else {
            header("Location: index.php?n=calendarioAdmin");
        }
    }
    static function eliminarReunion()
    {
        require 'config/conexion.php';
        $id_reunion = $_REQUEST['id_reunion'];
        $sqlDeleteEvento = ("DELETE FROM reunion WHERE id_reunion='" . $id_reunion . "'");
        $resultProd = mysqli_query($conexion, $sqlDeleteEvento);
    }

    static function moverReunion()
    {
        require 'config/conexion.php';
        $id_reunion = $_POST['id_reunion'];
        $start = $_REQUEST['start'];
        $fecha_inicio = date('Y-m-d', strtotime($start));
        $end = $_REQUEST['end'];
        $fecha_fin = date('Y-m-d', strtotime($end));
        $UpdateProd = ("UPDATE reunion 
    SET 
        fecha_inicio ='$fecha_inicio',
        fecha_fin ='$fecha_fin'

    WHERE id_reunion='" . $id_reunion . "' ");
        $result = mysqli_query($conexion, $UpdateProd);

        if ($result) {
            $UpdateProd = "UPDATE reuniones 
    SET 
        fecha_inicio ='$fecha_inicio',
        fecha_fin ='$fecha_fin'

    WHERE id_reunion='" . $id_reunion . "'";
            $result2 = mysqli_query($conexion, $UpdateProd);
        }
    }
    //todo fin funciones del calendario del admin

    //todo busquedas del admin

    static function buscarReunionAdmin()
    {
        require 'config/conexion.php';
        $salida = "";
        $consulta = "SELECT * FROM reuniones";

        if (isset($_POST['consulta'])) {
            $q = $conexion->real_escape_string($_POST['consulta']);
            $consulta = "SELECT * FROM reuniones WHERE id_reunion LIKE '%" . $q . "%' OR nombre_empresa LIKE '%" . $q . "%' OR color_reunion LIKE '%" . $q . "%' OR fecha_inicio LIKE '%" . $q . "%' OR fecha_fin LIKE '%" . $q . "%'";
        }

        $resultado = $conexion->query($consulta);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $salida .= '<tr>';
                $salida .= '<td>' . $row['id_reunion'] . '</td>';
                $salida .= '<td>' . $row['nombre_empresa'] . '</td>';
                $color = $row['color_reunion'];
                $salida .= '<td style="background-color: ' . $color . ';">' . $row['color_reunion'] . '</td>';
                $salida .= '<td>' . $row['fecha_inicio'] . '</td>';
                $salida .= '<td>' . $row['fecha_fin'] . '</td>';
                $salida .= '</tr>';
            }
        } else {
            $salida .= "No se encontraron resultados :(";
        }

        echo $salida;

        $conexion->close();
    }

    static function buscarEmpresaAdmin()
    {
        require 'config/conexion.php';
        $salida = "";
        $consulta = "SELECT * FROM empresa";

        if (isset($_POST['consulta'])) {
            $q = $conexion->real_escape_string($_POST['consulta']);
            $consulta = "SELECT * FROM empresa WHERE nombre_empresa LIKE '%" . $q . "%' OR id_empresa LIKE '%" . $q . "%'";
        }

        $resultado = $conexion->query($consulta);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $salida .= '<tr>';
                $salida .= '<td>' . $row['id_empresa'] . '</td>';
                $salida .= '<td>' . $row['nombre_empresa'] . '</td>';
                $salida .= '<td class="tabla__link"><a href="">Editar</a></td>';
                $salida .= '<td class="tabla__link"><a href="">Eliminar</a></td>';
                $salida .= '</tr>';
            }
        } else {
            $salida .= "No se encontraron resultados :(";
        }

        echo $salida;

        $conexion->close();
    }

    static function buscarSocioAd()
    {
        require 'config/conexion.php';
        $salida = "";
        $consulta = "SELECT * FROM socio";

        if (isset($_POST['consulta'])) {
            $q = $conexion->real_escape_string($_POST['consulta']);
            $consulta = "SELECT * FROM socio WHERE username LIKE '%" . $q . "%' OR ced_socio LIKE '%" . $q . "%' OR nombre_soc LIKE '%" . $q . "%' OR apellido_soc LIKE '%" . $q . "%' OR nombre_empresa LIKE '%" . $q . "%' OR cargo LIKE '%" . $q . "%'";
        }

        $resultado = $conexion->query($consulta);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $salida .= '<tr>';
                $salida .= '<td>' . $row['username'] . '</td>';
                $salida .= '<td>' . $row['nombre_soc'] . '</td>';
                $salida .= '<td>' . $row['apellido_soc'] . '</td>';
                $salida .= '<td>' . $row['ced_socio'] . '</td>';
                $salida .= '<td>' . $row['nombre_empresa'] . '</td>';
                $salida .= '<td>' . $row['cargo'] . '</td>';
                $salida .= '<td class="tabla__link"><a href="">Eliminar</a></td>';
                $salida .= '</tr>';
            }
        } else {
            $salida .= "No se encontraron resultados :(";
        }

        echo $salida;

        $conexion->close();
    }
    // todo fin de busquedas del admin

    //todo interfaz del admin
    static function inicioAdmin()
    {
        require_once("views/views-admin/indexAdmin.php");
    }
    static function afterRegistroSocio()
    {
        require_once("views/views-admin/afterRegistroSocio.php");
    }
    static function afterRegistroEmpresa()
    {
        require_once("views/views-admin/afterRegistroEmpresa.php");
    }
    //empresas
    static function empresasAdmin()
    {
        require_once("views/views-admin/empresasAdmin.php");
    }
    //reuniones
    static function reunionesAdmin()
    {
        require_once("views/views-admin/reunionesAdmin.php");
    }
    //reuniones
    static function sociosAdmin()
    {
        require_once("views/views-admin/sociosAdmin.php");
    }
    static function calendarioAdmin()
    {
        require_once("views/views-admin/calendarioAdmin.php");
    }
    static function configuracionAdmin()
    {
        require_once("views/views-admin/configuracionesAdmin.php");
    }

    static function afterNuevaReunion()
    {
        require_once("views/views-admin/afterNuevaReunion.php");
    }
    static function afterEliminarReunion(){
        require_once("views/views-admin/afterEliminarReunion.php");
    }
    static function afterNuevoPunto()
    {
        require_once("views/views-socio/afterNuevoPunto.php");
    }
    //todo fin interfaz del admin

    //? fin de admin

    //? Inicio Socio
    //todo busquedas del socio

    static function buscarSocio()
    {
        session_start();
        require 'config/conexion.php';
        $salida = "";
        $consulta = "SELECT * FROM socio where nombre_empresa like '$_SESSION[empresa]'";
        if (isset($_POST['consulta'])) {
            $q = $conexion->real_escape_string($_POST['consulta']);
            $consulta = "SELECT * FROM socio WHERE nombre_empresa like '$_SESSION[empresa]' and username LIKE '%" . $q . "%' OR ced_socio LIKE '%" . $q . "%' OR nombre_soc LIKE '%" . $q . "%' OR apellido_soc LIKE '%" . $q . "%'";
        }

        $resultado = $conexion->query($consulta);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $salida .= '<tr>';
                $salida .= '<td>' . $row['username'] . '</td>';
                $salida .= '<td>' . $row['nombre_soc'] . '</td>';
                $salida .= '<td>' . $row['apellido_soc'] . '</td>';
                $salida .= '<td>' . $row['ced_socio'] . '</td>';
                $salida .= '</tr>';
            }
        } else {
            $salida .= "No se encontraron resultados :(";
        }

        echo $salida;

        $conexion->close();
    }

    static function buscarReunionSocio()
    {
        session_start();
        require 'config/conexion.php';
        $salida = "";
        $consulta   = ("SELECT * FROM reuniones WHERE nombre_empresa LIKE '$_SESSION[empresa]'");
        if (isset($_POST['consulta'])) {
            $q = $conexion->real_escape_string($_POST['consulta']);
            $consulta = "SELECT * FROM reuniones WHERE nombre_empresa LIKE '$_SESSION[empresa]' and id_reunion LIKE '%" . $q . "%' OR color_reunion LIKE '%" . $q . "%' OR fecha_inicio LIKE '%" . $q . "%' OR fecha_fin LIKE '%" . $q . "%' OR descripcion LIKE '%" . $q . "%'";
        }

        $resultado = $conexion->query($consulta);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $salida .= '<tr>';
                $salida .= '<td>' . $row['id_reunion'] . '</td>';
                $color = $row['color_reunion'];
                $salida .= '<td style="background-color: ' . $color . ';">' . $row['color_reunion'] . '</td>';
                $salida .= '<td>' . $row['fecha_inicio'] . '</td>';
                $salida .= '<td>' . $row['fecha_fin'] . '</td>';
                $salida .= '</tr>';
            }
        } else {
            $salida .= "No se encontraron resultados :(";
        }

        echo $salida;

        $conexion->close();
    }

    static function buscarPunto()
    {
        session_start();
        require 'config/conexion.php';
        $salida = "";
        $consulta   = ("SELECT * FROM punto WHERE nombre_empresa LIKE '$_SESSION[empresa]'");
        if (isset($_POST['consulta'])) {
            $q = $conexion->real_escape_string($_POST['consulta']);
            $consulta = "SELECT * FROM puntos WHERE id_reunion LIKE '%" . $q . "%' OR id_punto LIKE '%" . $q . "%' OR fecha_inicio LIKE '%" . $q . "%' OR fecha_fin LIKE '%" . $q . "%' OR descripcion LIKE '%" . $q . "%' OR archivo LIKE '%" . $q . "%'";
        }

        $resultado = $conexion->query($consulta);

        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $salida .= '<tr>';
                $salida .= '<td>' . $row['id_punto'] . '</td>';
                $salida .= '<td>' . $row['id_reunion'] . '</td>';
                $salida .= '<td>' . $row['username'] . '</td>';
                $salida .= '<td>' . $row['descripcion'] . '</td>';
                $salida .= '<td><a href="documents/' . $row['archivo'] . '" class="pdf" TARGET="BLANK">' . $row['archivo'] . '</a></td>';
                $salida .= '<td>' . $row['tipo'] . '</td>';
                $salida .= '<td>' . $row['fecha_inicio'] . '</td>';
                $salida .= '</tr>';
            }
        } else {
            $salida .= "No se encontraron resultados :(";
        }

        echo $salida;

        $conexion->close();
    }
    //todo fin de busquedas del socio

    //todo interfaz del socio

    static function calendarioSocio()
    {
        require_once("views/views-socio/calendarioSocios.php");
    }
    static function reunionesSocio()
    {
        require_once("views/views-socio/reunionesSocios.php");
    }
    static function sociosSocio()
    {
        require_once("views/views-socio/sociosSocios.php");
    }
    static function puntos()
    {
        require_once("views/views-socio/puntos.php");
    }
    static function configuracionSocio()
    {
        require_once("views/views-socio/configuracionesSocio.php");
    }
    static function votacionesSocio()
    {
        require_once("views/views-socio//votacionesSocios.php");
    }
    //todo fin interfaz del socio
}
