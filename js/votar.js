$(function(){
    $("#boton_votar").click(function(){
     $('#contador');
       $.ajax({
              url: "index.php?n=votar",
              type: "POST",
              data: $("#form").serialize(),
              success: function(data)
              {
                 $("#contador").html(data);
              }
            });
   
       return false;
    });
   });