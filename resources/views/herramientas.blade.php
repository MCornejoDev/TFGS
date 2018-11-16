@extends('layouts.app')

@section('content')
@if (Route::has('login'))
@auth
<script src="{{asset('js/herramientas.js')}}"></script>
<div class="container">
    <div class="row text-center">
        <div class="col-sm-6 col-md-6 col-lg-6" >
            <div id="juegoMoneda">
               juego Moneda
               <button id="play">Roll</button>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6" >
            <div id="juegoDado">
               juego Dado
            </div>
        </div>
    </div>
</div>

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