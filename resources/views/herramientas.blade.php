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
				<option value="6D">6D </option>
                <option value="18D">18D </option>
                <option value="30D">30D</option>
                <option value="60D">60D</option>
                <option value="moneda">Moneda</option>
            </select>
        </div>
    </div>
</div>

<!-- #region  Region herramientas-->
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