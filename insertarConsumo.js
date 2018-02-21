$('#guardar').click(function(){
       var parametros = {
            "consumo" : $("#consumoLineaPersona").val(),
            "fecha" : $("#fechaConsumoLineaPersona").val()
      }
       if(parametros.consumo.length==0 || parametros.fecha.length==0){
           alert("rellene todos los campos");
          
          }else{
              $.ajax({
              data : parametros,
              url : "insertarConsumo.php",
              type : "post",
              success : function(response){
                  alert("El consumo se ha insertado correctamente");
                     //response contiene la respuesta al llamado de tu archivo
                     //aqui actualizas los valores de inmediato llamando a sus respectivas id.
              }
       })
              
          }
      
});