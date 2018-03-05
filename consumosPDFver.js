function reportePDF(){
    var fechainicio = $('#fechaInicioConsumo').val();
    var fechafinal =  $('#fechaFinalConsumo').val();
    window.open('consumosPDFver.php?fechainicio3='+fechainicio+'&fechafinal3='+fechafinal);
}

