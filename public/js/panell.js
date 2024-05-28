//Utilizamos ajax para enviar los datos del formulario a la ruta que hemos creado en el controlador
// $('#afegir').click(function(e){
//     e.preventDefault();

//     $.ajax({
//         url: '/app/Http/Controllers/PanelController.php',
//         type: 'post',
//         data: $('#afegir-empresa').serialize(),
//         success: function(){
//             // Código para ejecutar si la solicitud se completa correctamente
            
//             $('#modalafegir').modal('hide');
//         },
//         error: function(jqXHR, textStatus, errorThrown){
//             // Código para ejecutar si la solicitud falló
//             console.log(textStatus, errorThrown);
//         }
//     });
// });

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
        //Aqui lo que intentamos es limpiar los parametros que añadimos a la url quando hacemos la accion de eliminar una empresa
        let clean_url = window.location.protocol + "//" + window.location.host + window.location.pathname;
        window.location.href = clean_url;
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
            location.href = '/carpetas/' + id;
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

$('#filaEmpresa').click(function(){
    let empresa_id = $(this).data('empresa-id');
    window.location.href = '/empresas/' + empresa_id;
});