@extends('layouts.app')

@section('content')

@if (Route::has('login'))
@auth
@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{Session::get('message')}}
    </div>
@endif

<!--Página principal después de iniciar sesión-->

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-sm-offset-4 col-md-8 col-lg-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Iniciaste Sesión
                        <div class="container-fluid">
                            <div class="row text-center">
                                <div class="col-sm-2 col-sm-offset-2 col-md-3 col-lg-3">
                                    <a class="button4" href="{{route('crear')}}">Nueva Partida</a>
                                </div>
                                <div class="col-sm-2 col-sm-offset-2 col-md-3 col-lg-3">                  
                                    <a class="button4"  href="{{route('mostrarTodos')}}">Mostrar Partidas</a>
                                </div>
                                <div class="col-sm-2 col-sm-offset-2 col-md-3 col-lg-3">
                                    <a class="button4" href="{{route('herramientas')}}">Herramientas</a>
                                </div>
                                <div class="col-sm-2 col-sm-offset-2 col-md-3 col-lg-3">
                                    <a class="button4" href="{{route('mapas')}}">Mapas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src=".../800x400?auto=yes&bg=777&fg=555&text=First slide" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src=".../800x400?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src=".../800x400?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>-->

<br/>

@else
<style>

</style>

<div style="" >
    <h1 style="text-align:center !important; font-weight:bold !important; align-content: center;">Debe iniciar sesión o registrarse</h1>
</div>
</div>

@endauth
@endif
@endsection
