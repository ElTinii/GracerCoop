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

$('#Siel').click(function(){
    var empresaId = $(this).data('empresa-id');

    $.ajax({
        url: '/empresas/delete/' + empresaId,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(){
            // Código para ejecutar si la solicitud fue exitosa
            location.reload();
        },
        error: function(jqXHR, textStatus, errorThrown){
            // Código para ejecutar si la solicitud falló
            console.log(textStatus, errorThrown);
        }
    });
});
$('#elimEmp').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var empresaId = button.data('empresa-id')
  var modal = $(this)
  modal.find('#Siel').data('empresa-id', empresaId)
})