@extends('layouts.app')

@section('content')
@if (Route::has('login'))
@auth

<style>

ul>li{
    list-style-type: none;
    
}


@media screen and (min-width: 1023px) {
  .ctamanno
    {
      max-width: 100% !important;
      width:70% !important;
      
    }
}

@media screen and (min-width: 1439px) {
  .ctamanno
    {
      max-width: 100% !important;
      width:53% !important;
      
    }
}

</style>

<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
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
</div>

 <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.0/chartist.min.css'/>
<script src='https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.0/chartist.min.js'></script> 
<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->

<script>

var personajeSinCambio = <?php echo(json_encode($personaje)); ?>;
var personajeCambiado = <?php echo(json_encode($personajesC)); ?>;
/*personajeSinCambio['carisma'], personajeSinCambio['sabiduria'], 
      personajeSinCambio['inteligencia'], personajeSinCambio['constitucion'], 
      personajeSinCambio['destreza'], personajeSinCambio['fuerza'],
      personajeCambiado[0]['carisma'], personajeCambiado[0]['sabiduria'], 
      personajeCambiado[0]['inteligencia'], personajeCambiado[0]['constitucion'], 
      personajeCambiado[0]['destreza'], personajeCambiado[0]['fuerza'],'C', 'S', 'I', 'Co', 'D', 'F', 
      */
console.log(personajeCambiado);
console.log(personajeSinCambio);
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
  labels: [1, 2, 3, 4, 5],
  series: [
    [ 0,personajeSinCambio['nivel'],personajeCambiado[0]['nivel']]
  ]
}, {
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

</script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>-->
@else

<div style="" >
    <h1 style="text-align:center !important; font-weight:bold !important; align-content: center;">Debe iniciar sesión o registrarse</h1>
</div>
</div>

@endauth
@endif
@endsection