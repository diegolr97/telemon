$(obtener_registros());

function obtener_registros(lineas)
{
	$.ajax({
		url : 'mostrarLineas.php',
		type : 'POST',
		dataType : 'html',
		data : { lineas: lineas },
		})

	.done(function(resultado){
		$("#tabla_resultado2").html(resultado);
	})
}