$('#guardar3').click(function(){
       var parametros = {
            "fecha1" : $("#fechaInicioConsumo2").val(),
            "fecha2" : $("#fechaFinalConsumo2").val()
      }
       if(parametros.fecha1.length==0 || parametros.fecha2.length==0){
           alert("rellene todos los campos");
          
          }else{
              $.ajax({
              data : parametros,
              url : "mostrarConsumoTodo.php",
              type : "post",
              success : function(response){
                  $("#datos4").html(response);
                     
              }
       })
              
          }
      
});