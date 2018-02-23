buscarTelefonosUsuario();
function buscarTelefonosUsuario(){
    var busqueda = document.getElementById('busqueda2Usuario').value;
    var solicitud = new XMLHttpRequest();
    var data  = new FormData();
    var url = 'mostrarLineasUsuario.php';

    data.append("busqueda2Usuario", busqueda);
    solicitud.open('POST',url, true);
    solicitud.send(data);

    solicitud.addEventListener('load', function(e){

        var cajadatos = document.getElementById('datos2Usuario');
        cajadatos.innerHTML = e.target.responseText;
        
    }, false);
}

window.addEventListener('load', function(){
    document.getElementById('busqueda2Usuario').addEventListener('input', buscarTelefonosUsuario, false);
}, false);