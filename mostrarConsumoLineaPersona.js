$('#guardar2').click(function(){
       var parametros = {
            "fecha1" : $("#fechaInicioConsumo").val(),
            "fecha2" : $("#fechaFinalConsumo").val()
      }
       if(parametros.fecha1.length==0 || parametros.fecha2.length==0){
           alert("rellene todos los campos");
          
          }else{
              $.ajax({
              data : parametros,
              url : "mostrarConsumoLineaPersona.php",
              type : "post",
              success : function(response){
                  $("#datosConsumo").html(response);
                     //response contiene la respuesta al llamado de tu archivo
                     //aqui actualizas los valores de inmediato llamando a sus respectivas id.
              }
       })
              
          }
      
});