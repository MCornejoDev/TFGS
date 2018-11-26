@extends('layouts.app')

@section('content')
<style>
@media screen and (max-width:426px){
  #desaparecer{
    display:none !important;
  }
}
</style>
@if (Route::has('login'))
@auth

<div class="container text-center estiloSombreado">
    <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th id="desaparecer" scope="col">Extensión</th>
              <th scope="col">Enlace</th>
            </tr>
          </thead>
          <tbody>
          @foreach($mapas as $mapeado)
          <?php
              $nombre = $mapeado->nombre; 
              $enlace = "img/" . $mapeado->enlace;
              ?>
            <tr>
              <td>{{$mapeado->nombre}}</td>
              <td id="desaparecer">{{$mapeado->extension}}</td>
              <td><a class="button4" href="{{asset($enlace)}}" download="<?php echo $nombre;?>">{{$mapeado->nombre}}</a></td>
            </tr>
          @endforeach
          </tbody>
        </table>
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
