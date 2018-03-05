function reporteXLS(){
    var fechainicio = $('#fechaInicioConsumo').val();
    var fechafinal =  $('#fechaFinalConsumo').val();
    window.open('consumosXLS.php?fechainicio3='+fechainicio+'&fechafinal3='+fechafinal);
}