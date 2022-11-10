<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location: index.php?n=paginaLogin');
}
include("config.php");

$SqlEventos   = ("SELECT * FROM reunion");
$resulEventos = mysqli_query($conexion, $SqlEventos);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Reuniones</title>
    <link rel="icon" href="views/img/calendario.png">
    <link rel="stylesheet" href="views/views-admin/css/calendarioAdmin.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script defer src="js/activarPagina.js"></script>
    <!--calendario-->
    <link rel="stylesheet" type="text/css" href="views/css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="views/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/estiloCalendario.css">
</head>

<body>
    <div id="container">
        <header id="header">
            <h1 class="titulo"><img src="views/img/calendario.png" class="logo">EmpresaXYZ</h1>
            <aside class="lateral">
                <ul>
                    <li><a href="index.php?n=inicioAdmin">Dashboard</a></li>
                    <li><a href="index.php?n=calendarioAdmin" class="active">Calendario</a></li>
                    <li><a href="index.php?n=reunionesAdmin">Reuniones</a></li>
                    <li><a href="index.php?n=empresasAdmin">Empresas</a></li>
                    <li><a href="index.php?n=sociosAdmin">Socios</a></li>
                </ul>
            </aside>
        </header>
        <div id="contenido">
            <nav id="navbar">
                <ul>
                    <li><a href="index.php?n=principal"><i class="fi fi-rr-settings"></i></a></li>
                    <li class="margin-right"><a href="controllers/controladorCerrarSesion.php"><i class="fi fi-sr-exit"></i></a></li>
                    <li class="ajustar"><img src="https://i.scdn.co/image/ab67616d00001e0249d694203245f241a1bcaa72"><span class="username"><?php echo $_SESSION['username'] ?><p class="cargo"><?php echo $_SESSION['cargo'] ?></p></span></li>
                </ul>
            </nav>
            <div class="contenido__pagina">
                <div class="container">
                    <div class="row">
                        <div class="col msjs">
                            <?php
                            include('msjs.php');
                            ?>
                        </div>
                    </div>
                </div>
                <div id="calendar"></div>
                <?php
                include('modalNuevoReunion.php');
                include('modalUpdateReunion.php');
                ?>
                <script src="js/jquery-3.0.0.min.js"> </script>
                <script src="js/popper.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script type="text/javascript" src="js/moment.min.js"></script>
                <script type="text/javascript" src="js/fullcalendar.min.js"></script>
                <script src='locales/es.js'></script>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $("#calendar").fullCalendar({
                            header: {
                                left: "prev,next today",
                                center: "title",
                                right: "month,agendaWeek,agendaDay"
                            },

                            locale: 'es',

                            defaultView: "month",
                            navLinks: true,
                            editable: true,
                            eventLimit: true,
                            selectable: true,
                            selectHelper: false,

                            //Nuevo Evento
                            select: function(start, end) {
                                $("#exampleModal").modal();
                                $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));

                                var valorFechaFin = end.format("DD-MM-YYYY");
                                var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
                                $('input[name=fecha_fin').val(F_final);

                            },

                            events: [
                                <?php
                                while ($dataEvento = mysqli_fetch_array($resulEventos)) { ?> {
                                        _id_reunion: '<?php echo $dataEvento['id_reunion'] ?>',
                                        title: '<?php echo $dataEvento['nombre_empresa']; ?>',
                                        start: '<?php echo $dataEvento['fecha_inicio']; ?>',
                                        end: '<?php echo $dataEvento['fecha_fin']; ?>',
                                        color: '<?php echo $dataEvento['color_reunion']; ?>'
                                    },
                                <?php } ?>
                            ],


                            //Eliminar Evento
                            eventRender: function(event, element) {
                                element
                                    .find(".fc-content")
                                    .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");

                                //Eliminar evento
                                element.find(".closeon").on("click", function() {

                                    var pregunta = confirm("Deseas Borrar este Evento?");
                                    if (pregunta) {

                                        $("#calendar").fullCalendar("removeEvents", event._id_reunion);

                                        $.ajax({
                                            type: "POST",
                                            url: 'views/views-admin/deleteReunion.php',
                                            data: {
                                                id_reunion: event._id_reunion
                                            },
                                            success: function(datos) {
                                                $(".alert-danger").show();

                                                setTimeout(function() {
                                                    $(".alert-danger").slideUp(500);
                                                }, 3000);

                                            }
                                        });
                                    }
                                });
                            },


                            //Moviendo Evento Drag - Drop
                            eventDrop: function(event, delta) {
                                var id_reunion = event._id_reunion;
                                var start = (event.start.format('DD-MM-YYYY'));
                                var end = (event.end.format("DD-MM-YYYY"));

                                $.ajax({
                                    url: 'views/views-admin/drag_drop_Reunion.php',
                                    data: 'start=' + start + '&end=' + end + '&id_reunion=' + id_reunion,
                                    type: "POST",
                                    success: function(response) {
                                        // $("#respuesta").html(response);
                                    }
                                });
                            },
                            //Modificar Evento del Calendario 
                            eventClick: function(event) {
                                var id_reunion = event._id_reunion;
                                $('input[name=id_reunion').val(id_reunion);
                                $('input[name=nombre_empresa').val(event.title);
                                $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
                                $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));
                                $("#modalUpdateEvento").modal();
                            },
                        });
                        //Oculta mensajes de Notificacion
                        setTimeout(function() {
                            $(".alert").slideUp(300);
                        }, 3000);


                    });
                </script>
            </div>
        </div>
    </div>

</body>

</html>