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

            //Nuevo Reunion
            select: function(start, end) {
                $("#nuevaReunion").modal();
                $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));

                var valorFechaFin = end.format("DD-MM-YYYY");
                var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
                $('input[name=fecha_fin').val(F_final);

            },

            events: [
                <?php
                while ($dataReunion = mysqli_fetch_array($resulReunions)) { ?> {
                        _id_reunion: '<?php echo $dataReunion['id_reunion'] ?>',
                        title: '<?php echo $dataReunion['nombre_empresa']; ?>',
                        start: '<?php echo $dataReunion['fecha_inicio']; ?>',
                        end: '<?php echo $dataReunion['fecha_fin']; ?>',
                        color: '<?php echo $dataReunion['color_reunion']; ?>'
                    },
                <?php } ?>
            ],


            //Eliminar Reunion
            eventRender: function(event, element) {
                element
                    .find(".fc-content")
                    .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");

                //Eliminar Reunion
                element.find(".closeon").on("click", function() {

                    var pregunta = confirm("¿ Desea Borrar esta Reunion ?");
                    if (pregunta) {

                        $("#calendar").fullCalendar("removeEvents", event._id_reunion);

                        $.ajax({
                            type: "POST",
                            url: 'index.php?n=eliminarReunion',
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


            //Moviendo Reunion Drag - Drop
            eventDrop: function(event, delta) {
                var id_reunion = event._id_reunion;
                var start = (event.start.format('DD-MM-YYYY'));
                var end = (event.end.format("DD-MM-YYYY"));

                $.ajax({
                    url: 'index.php?n=moverReunion',
                    data: 'start=' + start + '&end=' + end + '&id_reunion=' + id_reunion,
                    type: "POST",
                    success: function(response) {
                        // $("#respuesta").html(response);
                    }
                });
            },
        });


    });
</script>