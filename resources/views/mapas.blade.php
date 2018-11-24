@extends('layouts.app')

@section('content')

@if (Route::has('login'))
@auth

<div class="container text-center estiloSombreado">
    <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Extensión</th>
              <th scope="col">Enlace</th>
            </tr>
          </thead>
          <tbody>
          @foreach($mapas as $mapeado)
            <tr>
              <th scope="row">{{$mapeado->id}}</th>
              <td>{{$mapeado->nombre}}</td>
              <td>{{$mapeado->extension}}</td>
              <td><button>{{$mapeado->enlace}}</button></td>
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
