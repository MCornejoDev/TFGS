@extends('layouts.app')

@section('content')
@if (Route::has('login'))
@auth
<style>
.sesion{
    background: url('../img/background4.jpg') no-repeat center center fixed !important;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    font-weight: bold !important;
}

</style>

    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{Session::get('message')}}
    </div>
    @endif
<div class="container">
    <div class="row">
        @foreach ($partidas as $partida)
        <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                <div class="card" style="width: 18rem;">
                   Partida : {{$partida->nickPartida}}
                   <?php
                    
                   ?>
                   @foreach($arrayTotal as $personaje)
                   <?php 
                   $idPersonaje= $personaje['idPersonaje'];
                   
                   $iDPartida = $partida->idPersonaje;
                  
                    if($idPersonaje == $iDPartida)
                    {

                        $raza = $personaje['raza']; 
                        $sexo = $personaje['sexo'];
                        $nombrePersonaje = $personaje['nombrePersonaje'];
                        $apodo = $personaje['apodo'];
                        $tipo = $personaje['tipo'];
                        $tipoRaza = "img/".$raza.".jpg";
                        $tipoClase = "img/".$tipo.".png";
                        $bonito2 = "Femenino";
                        if($sexo== 'M'){
                            $bonito2="Masculino";
                        }
            
                   ?> 
                    <img class="card-img-top" src="{{asset($tipoRaza)}}" alt="<?php echo $tipoRaza?>">         
                    <div class="card-body">
                             <div class="row">
                                 <div class="col-sm-7 col-md-7 col-lg-7" style="text-align:left !important;"> 
                                 Nombre : {{ $nombrePersonaje }}<br/>
                                 Raza : {{ $raza }}<br/>
                                 Apodo : {{  $apodo  }}<br/>
                                 Sexo : <?php echo $bonito2?> 
                                 </div>
                                 <div class="col-sm-5 col-md-5 col-lg-5">
                                         <label>{{ $tipo}}</label>
                                         <img class="card-img tipo" src="{{asset($tipoClase)}}" alt="<?php echo $tipoClase?>"><br/>
                                 </div>
                             </div>
                         </div>
                         <a class="button4" href="{{ route('grafica', $idPersonaje) }}">Ver la grafica</a>
                         <a class="button4" href="{{ route('mostrar', $idPersonaje) }}">Ver toda la información</a>
                         <a class="button4" href="{{ route('eliminar', $idPersonaje) }}" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                   <?php
                    }
                   ?>
                   @endforeach
                </div> <br/> 
            </div> 
        @endforeach  

        <div class="col-sm-12 col-md-12 col-lg-12 text-center paginador"> {{ $partidas->links() }}</div> 
    </div>
</div>

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