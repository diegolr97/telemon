buscarPersonas();
function buscarPersonas(){
    var busqueda = document.getElementById('busqueda').value;
    var solicitud = new XMLHttpRequest();
    var data  = new FormData();
    var url = 'mostrarPersonas.php';

    data.append("busqueda", busqueda);
    solicitud.open('POST',url, true);
    solicitud.send(data);

    solicitud.addEventListener('load', function(e){

        var cajadatos = document.getElementById('datos');
        cajadatos.innerHTML = e.target.responseText;
        
    }, false);
}

window.addEventListener('load', function(){
    document.getElementById('busqueda').addEventListener('input', buscarPersonas, false);
}, false);