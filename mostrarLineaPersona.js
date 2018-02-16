buscarLineas();
function buscarLineas(){
    var busqueda = document.getElementById('busqueda3').value;
    var solicitud = new XMLHttpRequest();
    var data  = new FormData();
    var url = 'mostrarLineaPersona.php';

    data.append("busqueda3", busqueda);
    solicitud.open('POST',url, true);
    solicitud.send(data);

    solicitud.addEventListener('load', function(e){

        var cajadatos = document.getElementById('datos3');
        cajadatos.innerHTML = e.target.responseText;
        
    }, false);
}

window.addEventListener('load', function(){
    document.getElementById('busqueda3').addEventListener('input', buscarLineas, false);
}, false);