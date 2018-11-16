@extends('layouts.app')

@section('content')
@if (Route::has('login'))
@auth

<div class="container">
  <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <div class="ctamanno">
          <div class="ct-chart ct-perfect-fourth destiloSombreado">
        </div>
        <div>
          <ul>
            <li>Carisma-->C</li>
            <li>Sabiduria --> S</li>
            <li>Inteligencia --> I</li>
            <li>Constitución --> C</li>
            <li>Destreza --> D</li>
            <li>Fuerza --> F</li>
            <li>Vida --> V</li>
          </ul>
        </div>  
      </div>
    </div>
    <a class="button4" href="{{ route('mostrarTodos')}}">Volver</a>
  </div>
</div>



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