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
        //Aqui lo que intentamos es limpiar los parametros que añadimos a la url quando hacemos la accion de eliminar una empresa
        var clean_url = window.location.protocol + "//" + window.location.host + window.location.pathname;
        window.location.href = clean_url;
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

//Lo que buscamos aquí es comprobar cuando entras a la vista de empresa, si en la URL hay la propiedad abrirModal, si es así, abrir el modal.
$(document).ready(function() {
    var urlParams = new URLSearchParams(window.location.search);
    var abrirModal = urlParams.get('abrirModal');

    if (abrirModal === 'true') {
        $('#afegirEmpresa').modal('show');
    }
});

// Esto lo que hace es que cuando entres en el panel salga el gràfico con la informacion del numero de acciones que se hacen diariamente durante la semana
let xArray, yArray;
$.get('/dades', function(data) {
    xArray = data.xArray;
    yArray = data.yArray;

}).done(function(){
//Pasem les dades de Date a un format que ens interessa que es com el tenim a la base de dades
let avui = new Date();
let dataAvui = avui.toISOString().split('T')[0];

//Aqui calculem la data de fa 7 dies per poder mostrar les dades de la ultima setmanai que quedi mes o menys be
let setDies = new Date();
setDies.setDate(avui.getDate() - 7);
let formatSetdies = setDies.toISOString().split('T')[0];
    const data = [{
        x: xArray,
        y: yArray,
        mode:"lines"
      }];
      const config = { displayModeBar: false };
      const layout = {
        yaxis: {range: [0, 10]},
        xaxis: {range: [formatSetdies, dataAvui], title: "Día del mes"},  
        title: "Acciones diarias de la empresa"
      };
      Plotly.newPlot("myPlot", data, layout, config);
});
