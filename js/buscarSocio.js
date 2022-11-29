$(buscar_datos());
function buscar_datos(consulta){
    $.ajax({
        url: "index.php?n=buscarSocio",
        type: "POST",
        dataType: "HTML",
        data: {consulta: consulta},
    })
    .done(function(respuesta) {
        $("#socio").html(respuesta);
    })
    .fail(function() {
        console.log("error");
    })
}

$(document).on("keyup", "#buscar", function(){
    var valor = $(this).val();
    if (valor != "") {
        buscar_datos(valor);
    }else{
        buscar_datos();
    }
});