buscarLineasUsuario();
function buscarLineasUsuario(){
    var busqueda = document.getElementById('busqueda3Usuario').value;
    var solicitud = new XMLHttpRequest();
    var data  = new FormData();
    var url = 'mostrarLineaPersonaUsuario.php';

    data.append("busqueda3Usuario", busqueda);
    solicitud.open('POST',url, true);
    solicitud.send(data);

    solicitud.addEventListener('load', function(e){

        var cajadatos = document.getElementById('datos3Usuario');
        cajadatos.innerHTML = e.target.responseText;
        
    }, false);
}

window.addEventListener('load', function(){
    document.getElementById('busqueda3Usuario').addEventListener('input', buscarLineasUsuario, false);
}, false);