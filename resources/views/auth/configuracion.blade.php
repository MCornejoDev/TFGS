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
<form action="{{route('actualizar')}}" method="POST" id="formulario" name="formulario">
{!! csrf_field() !!}  
    <div class="card-header">Datos del usuario
        <div class="card-body">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="text" name="user" placeholder="usuario" value="<?php echo($datosUsuario[0]->user) ?>" required>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="password" name="password" placeholder="Nueva Contraseña" value="" required>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="password" name="passwordR" placeholder="Repite la Contraseña" value="" required>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <button type="submit" class="btn">
                                Actualizar datos
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</form>



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
