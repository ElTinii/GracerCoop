
// Fem un on click per a poder fer un ajax per a poder eliminar una empresa
$('#Siel').click(function(){
    let empresaId = $(this).data('empresa-id');

    $.ajax({
        url: '/empresas/delete/' + empresaId,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(){
        console.log('Empresa eliminada correctament');
        window.location.href = '/empresas';
        },
        error: function(jqXHR, textStatus, errorThrown){
            // Código para ejecutar si la solicitud falló
            console.log(textStatus, errorThrown);
        }
    });
});
//Aqui li enviem les dades a un altre boto per poder fer be la eliminacio de la empresa
$('#elimEmp').on('show.bs.modal', function (event) {
  let button = $(event.relatedTarget) 
  let empresaId = button.data('empresa-id')
  let modal = $(this)
  modal.find('#Siel').data('empresa-id', empresaId)
})

//Lo que buscamos aquí es comprobar cuando entras a la vista de empresa, si en la URL hay la propiedad abrirModal, si es así, abrir el modal.
$(document).ready(function() {
    let urlParams = new URLSearchParams(window.location.search);
    let abrirModal = urlParams.get('abrirModal');

    if (abrirModal === 'true') {
        $('#afegirEmpresa').modal('show');
    }
});

//Aqui fem un ajax per a poder elimiar una carpeta
$('#SielCarp').click(function(){
    let id = $(this).data('pare-id');
    let carpeta_id = $(this).data('carpeta-id');
    $.ajax({
        url: '/carpetasDelete/' + carpeta_id,
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(){
            console.log('Carpeta eliminada correctament');
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown){
            // Código para ejecutar si la solicitud falló
            console.log(textStatus, errorThrown);
        }
    });
});
//Elimina la carpeta
$('#SielCarp').click(function(){
    let id = $(this).data('pare-id');
    let carpeta_id = $(this).data('carpeta-id');
    $.ajax({
        url: '/carpetasDelete/' + carpeta_id,
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(){
            console.log('Usuari eliminar correctament');
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown){
            // Código para ejecutar si la solicitud falló
            console.log(textStatus, errorThrown);
        }
    });
});

$('#SielArx').click(function(){
    let arxiu_id = $(this).data('arxiu-id');
    $.ajax({
        url: '/eliminarArxiu/' + arxiu_id,
        type: 'GET',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(){
            console.log('Arxiu eliminar correctament');
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown){
            // Código para ejecutar si la solicitud falló
            console.log(textStatus, errorThrown);
        }
    });
});

//Aqui li pasem el id a un altre boton per poder fer be i facil el eliminar la carpeta
$('#elimCarp').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget);
    let carpetaId = button.data('carpeta-id');
    let modal = $(this);
    modal.find('#SielCarp').data('carpeta-id', carpetaId);
});

$('#elimArx').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget);
    let arxiuId = button.data('arxiu-id');
    let modal = $(this);
    modal.find('#SielArx').data('arxiu-id', arxiuId);
});

$('[id^="filaEmpresa"]').click(function(){
    event.stopPropagation();
    let empresa_id = $(this).data('empresa-id');
    window.location.href = '/empresas/' + empresa_id;
});

$('[id^="filaLog"]').click(function(){
    let log_id= $(this).data('log-id');
    window.location.href = '/log/' + log_id;
});

$('#drop').click(function(){
    $('#drop').toggleClass('show');
});

$('#btneliminarUser').on('show.bs.modal', function (event) {
    console.log('hola');
    let button = $(event.relatedTarget);
    let userId = button.data('carpeta-id');
    let modal = $(this);
    modal.find('#SielUser').data('carpeta-id', userId);
});