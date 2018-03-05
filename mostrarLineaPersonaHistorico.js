buscarLineasHistorico();
function buscarLineasHistorico(){
    var busqueda = document.getElementById('busqueda4').value;
    var solicitud = new XMLHttpRequest();
    var data  = new FormData();
    var url = 'mostrarLineaPersonaHistorico.php';

    data.append("busqueda4", busqueda);
    solicitud.open('POST',url, true);
    solicitud.send(data);

    solicitud.addEventListener('load', function(e){

        var cajadatos = document.getElementById('datos5');
        cajadatos.innerHTML = e.target.responseText;
        
    }, false);
}

window.addEventListener('load', function(){
    document.getElementById('busqueda4').addEventListener('input', buscarLineasHistorico, false);
}, false);