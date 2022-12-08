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
                            events: [
                                <?php
                                while ($dataReunion = mysqli_fetch_array($resulReunions)) { ?> {
                                        _id_reunion: '<?php echo $dataReunion['id_reunion'] ?>',
                                        title: '<?php echo $dataReunion['hora_inicio']; echo "AM - "; echo $dataReunion['hora_fin']; echo "PM" ?>',
                                        start: '<?php echo $dataReunion['fecha_inicio']; ?>',
                                        end: '<?php echo $dataReunion['fecha_fin']; ?>',
                                        color: '<?php echo $dataReunion['color_reunion']; ?>'
                                    },
                                <?php } ?>
                            ],
                            //Subir punto a la reunion
                            eventClick: function(event) {
                                var id_reunion = event._id_reunion;
                                $('input[name=id_reunion').val(id_reunion);
                                $('input[name=nombre_empresa').val(event.title);
                                $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
                                $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));
                                $("#modalUpdateEvento").modal();
                            },
                        });


                    });
                </script>