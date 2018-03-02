$('#botonGuardarPersona').click(function(){
       var parametros = {
            "nombre" : $("#").val();
            
      }
       if(parametros.nombre.length==0 ){
           alert("rellene todos los campos");
          
          }else{
              $.ajax({
              data : parametros,
              url : "insertarPersona.php",
              type : "post",
              success : function(response){
                  alert("El consumo se ha insertado correctamente");
                     //response contiene la respuesta al llamado de tu archivo
                     //aqui actualizas los valores de inmediato llamando a sus respectivas id.
              }
       })
              
          }
      
});