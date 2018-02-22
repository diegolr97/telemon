$('#consumosVerPDF').click(function(){
       var parametros = {
            "fecha1" : $("#fechaInicioConsumo").val(),
            "fecha2" : $("#fechaFinalConsumo").val()
      }
       
         
    var saveme =   $.ajax({
              data : parametros,
              url : "consumosPDFver.php",
              type : "post",
              success : function(response){
                  alert("El consumo se ha insertado correctamente");
                     //response contiene la respuesta al llamado de tu archivo
                     //aqui actualizas los valores de inmediato llamando a sus respectivas id.
              }
       })

        console.log(saveme);

    
              
          
      
});