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
<div class="container-fluid text-center"> 
    <div class="row ">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h1>Carrousel</h1>
            
        </div>
    </div>
</div>

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
                        
                                <button><a href="{{route('crear')}}">Nueva Partida</a></button>
                            </div>
                            <div class="col-sm-2 col-sm-offset-2 col-md-3 col-lg-3">
                                
                                <button><a href="{{route('mostrarTodos')}}">Mostrar Partidas</a></button>
                            </div>
                            <div class="col-sm-2 col-sm-offset-2 col-md-3 col-lg-3">
        
                                <button><a href="{{route('herramientas')}}">Herramientas</a></button>
                            </div>
                            <div class="col-sm-2 col-sm-offset-2 col-md-3 col-lg-3">
                    
                                <button><a href="{{route('mapas')}}">Mapas</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
