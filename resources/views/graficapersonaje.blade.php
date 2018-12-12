@extends('layouts.app')

@section('content')
@if (Route::has('login'))
@auth
<style>
.Vida
{
    display: inline-block !important;
    border-radius: 30px !important;
    border: solid !important;
    color: #d70206 !important;
    width: 14px;
    height: 14px;
    background-color: #d70206 !important;
    position: relative;
    top: 2px;
    left: 4px;
}

.Sabiduría
{
    display: inline-block !important;
    border-radius: 30px !important;
    border: solid !important;
    color: #f05b4f !important;
    width: 14px;
    height: 14px;
    background-color: #f05b4f !important;
    position: relative;
    top: 2px;
    left: 4px;
}

.Inteligencia{
    display: inline-block !important;
    border-radius: 30px !important;
    border: solid !important;
    color: #f4c63d !important;
    width: 14px;
    height: 14px;
    background-color: #f4c63d !important;
    position: relative;
    top: 2px;
    left: 4px;
}

.Constitución{
    display: inline-block !important;
    border-radius: 30px !important;
    border: solid !important;
    color: #d17905 !important;
    width: 14px;
    height: 14px;
    background-color: #d17905 !important;
    position: relative;
    top: 2px;
    left: 4px;
}

.Fuerza{
    display: inline-block !important;
    border-radius: 30px !important;
    border: solid !important;
    color: #453d3f !important;
    width: 14px;
    height: 14px;
    background-color: #453d3f !important;
    position: relative;
    top: 2px;
    left: 4px;
}

.Destreza{
    display: inline-block !important;
    border-radius: 30px !important;
    border: solid !important;
    color: #59922b !important;
    width: 14px;
    height: 14px;
    background-color: #59922b !important;
    position: relative;
    top: 2px;
    left: 4px;
}

.Carísma{
    display: inline-block !important;
    border-radius: 30px !important;
    border: solid !important;
    color: #0544d3 !important;
    width: 14px;
    height: 14px;
    background-color: #0544d3 !important;
    position: relative;
    top: 2px;
    left: 4px;
}
ul>li{
  display: inline-block !important;
  margin-right:12px !important;
}

@media screen and (max-width:426px){
  footer{
    margin-top:2em !important;
  }
}

</style>

<div class="container">
  <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <div class="ctamanno">
          <div class="ct-chart ct-perfect-fourth destiloSombreado" id="ctchart">
        </div>
        <div>
          <ul id="ulDelimitar" class="destiloSombreado">       
          </ul>
        </div>  
      </div>
    </div>
  </div>
</div>
<footer >
    <a class="button4" href="{{ route('mostrarTodos')}}">Volver</a>
    <a class="button4" href="{{ route('mostrar',$personaje->id)}}">Personaje</a>
</footer>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.0/chartist.min.css'/>
<script src='https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.0/chartist.min.js'></script> 
<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->

<script>

var personajeSinCambio = <?php echo(json_encode($personaje)); ?>;
var personajeCambiado = <?php echo(json_encode($personajesC)); ?>;


/*var data = {
  labels: ['nivel'],
  series: [
    [ 
      personajeSinCambio['nivel']

    ],
    [ 
      personajeCambiado[0]['nivel']
    ]
  ]
};

var options = {
  seriesBarDistance: 15
};

var responsiveOptions = [
  ['screen and (min-width: 641px) and (max-width: 1024px)', {
    seriesBarDistance: 10,
    axisX: {
      labelInterpolationFnc: function (value) {
        return value;
      }
    }
  }],
  ['screen and (max-width: 640px)', {
    seriesBarDistance: 10,
    axisX: {
      labelInterpolationFnc: function (value) {
        return value[0];
      }
    }
  }]
];

new Chartist.Bar('.ct-chart', data, options, responsiveOptions);*/

var chart = new Chartist.Line('.ct-chart', {
  labels: [ ],
  series: [
    [ ],[ ],[ ],[ ],[ ],[ ],[ ]
  ]
}, 
{
  // Remove this configuration to see that chart rendered with cardinal spline interpolation
  // Sometimes, on large jumps in data values, it's better to use simple smoothing.
  lineSmooth: Chartist.Interpolation.simple({
    divisor: 2
  }),
  fullWidth: true,
  chartPadding: {
    right: 20
  },
  low: 0
});
var date;
var options = { year: '2-digit', month: '2-digit', day: '2-digit' };
for (let index = 0; index < personajeCambiado.length; index++) {
    if(index % 3 == 0){
      date =  new Date(personajeCambiado[index]['fecha']);
      chart['data']['labels'].push(date.toLocaleDateString("es-ES", options));
    }
    else
    {
        chart['data']['labels'].push(personajeCambiado[index][' ']);
    }
}
for (let index = 0; index < personajeCambiado.length; index++) {
    chart['data']['series'][0].push(personajeCambiado[index]['vida']);
    chart['data']['series'][1].push(personajeCambiado[index]['sabiduria']);
    chart['data']['series'][2].push(personajeCambiado[index]['inteligencia']);
    chart['data']['series'][3].push(personajeCambiado[index]['constitucion']);
     chart['data']['series'][4].push(personajeCambiado[index]['fuerza']);
    chart['data']['series'][5].push(personajeCambiado[index]['destreza']);
    chart['data']['series'][6].push(personajeCambiado[index]['carisma']);
}
var ulD = document.getElementById('ulDelimitar');
var caracteres = ['Vida','Sabiduría','Inteligencia','Constitución','Fuerza','Destreza','Carísma'];

for (let index = 0; index < caracteres.length; index++) {
    // Crear nodo de tipo Element
    var li = document.createElement("li");
    var divConColor = document.createElement("div");
    divConColor.className += " " +caracteres[index];
    // Crear nodo de tipo Text
    var contenido = document.createTextNode(caracteres[index]);
    // Añadir el nodo Text como hijo del nodo Element
    li.appendChild(contenido);
    li.appendChild(divConColor);

    // Añadir el nodo Element como hijo de la pagina
    ulD.appendChild(li);
    
}

</script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>-->
@else

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12" >
         <h1 style="text-align:center !important; font-weight:bold !important; align-content: center;">Debe iniciar sesión o registrarse</h1>
        </div>
    </div>
</div>

@endauth
@endif
@endsection