buscarPersonasUsuario();
function buscarPersonasUsuario(){
    var busqueda = document.getElementById('busquedaUsuario').value;
    var solicitud = new XMLHttpRequest();
    var data  = new FormData();
    var url = 'mostrarPersonasUsuario.php';

    data.append("busquedaUsuario", busqueda);
    solicitud.open('POST',url, true);
    solicitud.send(data);

    solicitud.addEventListener('load', function(e){

        var cajadatos = document.getElementById('datosUsuario');
        cajadatos.innerHTML = e.target.responseText;
        
    }, false);
}

window.addEventListener('load', function(){
    document.getElementById('busquedaUsuario').addEventListener('input', buscarPersonasUsuario, false);
}, false);