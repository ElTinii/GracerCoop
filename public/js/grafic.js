// Esto lo que hace es que cuando entres en el panel salga el gràfico con la informacion del numero de acciones que se hacen diariamente durante la semana
let xArray, yArray;
$.get('/dades', function(data) {
    xArray = data.xArray;
    yArray = data.yArray;

}).done(function(){
//Pasem les dades de Date a un format que ens interessa que es com el tenim a la base de dades
let avui = new Date();
let dataAvui = avui.toISOString().split('T')[0];

// Aqui calculem la data de fa 7 dies per poder mostrar les dades de la ultima setmanai que quedi mes o menys be

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