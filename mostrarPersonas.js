$(obtener_registros());

function obtener_registros(personas)
{
	$.ajax({
		url : 'mostrarPersonas.php',
		type : 'POST',
		dataType : 'html',
		data : { personas: personas },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});