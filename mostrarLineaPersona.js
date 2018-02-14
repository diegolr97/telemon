$(obtener_registros());

function obtener_registros(lineapersona)
{
	$.ajax({
		url : 'mostrarLineaPersona.php',
		type : 'POST',
		dataType : 'html',
		data : { lineapersona: lineapersona },
		})

	.done(function(resultado){
		$("#tabla_resultado3").html(resultado);
	})
}