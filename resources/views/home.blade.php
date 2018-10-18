@extends('layouts.app')

@section('content')

@if (Route::has('login'))
@auth
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-sm-offset-4 col-md-8 col-lg-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Iniciaste Sesión
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-2 col-sm-offset-2 col-md-3 col-lg-3">
                                <h1>Crear personajes</h1>
                                <button><a href="{{route('crear')}}">Crear un personaje</a></button>
                            </div>
                            <div class="col-sm-2 col-sm-offset-2 col-md-3 col-lg-3">
                                <h1>Mostrar personajes</h1>
                                <button><a href="{{route('mostrarTodos')}}">Mostrar personajes</a></button>
                            </div>
                            <div class="col-sm-2 col-sm-offset-2 col-md-3 col-lg-3">
                                <h1>Crear personajes</h1>
                            </div>
                            <div class="col-sm-2 col-sm-offset-2 col-md-3 col-lg-3">
                                <h1>Crear personajes</h1>
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
