buscarTelefonos();
function buscarTelefonos(){
    var busqueda = document.getElementById('busqueda2').value;
    var solicitud = new XMLHttpRequest();
    var data  = new FormData();
    var url = 'mostrarLineas.php';

    data.append("busqueda2", busqueda);
    solicitud.open('POST',url, true);
    solicitud.send(data);

    solicitud.addEventListener('load', function(e){

        var cajadatos = document.getElementById('datos2');
        cajadatos.innerHTML = e.target.responseText;
        
    }, false);
}

window.addEventListener('load', function(){
    document.getElementById('busqueda2').addEventListener('input', buscarTelefonos, false);
}, false);