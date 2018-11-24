@extends('layouts.app')

@section('content')
@if (Route::has('login'))
@auth
<link rel="stylesheet" href="{{asset('css/herramientas.css')}}">

<div class="container">
    <div class="row text-center">
        <div class="col-sm-12 col-md-12 col-lg-12 text-left" >
            <select id="elegirHerramienta" name="herramienta" class="herramienta" >
				<option disabled selected value=""> -- Elija la herramienta -- </option>
				<option value="4caras">Dado de 4 caras</option>
                <option value="6caras">Dado de 6 caras</option>
                <option value="8caras">Dado de 8 caras</option>
                <option value="moneda">Moneda</option>
            </select>
        </div>
    </div>
</div>

<!-- #region  Region dado 6caras-->
<div id="ui_dado">
       
       
</div>
<!-- #endregion -->
@else

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12" >
         <h1 style="text-align:center !important; font-weight:bold !important; align-content: center;">Debe iniciar sesión o registrarse</h1>
        </div>
    </div>
</div>

@endauth
<script src="{{asset('js/herramientas.js')}}"></script>
@endif
@endsection