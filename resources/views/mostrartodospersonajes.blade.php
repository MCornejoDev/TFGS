@extends('layouts.app')

@section('content')
@if (Route::has('login'))
@auth

<style>

button.close{
    display:none !important;
}

button.btn.btn-default{
    border-radius: 30px !important;
}

button.btn.btn-primary{
    border-radius: 30px !important;
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
                <div class="card" style="width: 18rem;margin:auto !important;">
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
                        $tipoClase = "img/".$tipo."2.png";
                        $bonito2 = "Femenino";
                        if($sexo== 'M'){
                            $bonito2="Masculino";
                        }
            
                   ?> 
                    <img class="card-img-top" src="{{asset($tipoRaza)}}" alt="<?php echo $tipoRaza?>">         
                    <div class="card-body">
                             <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 text-center"> 
                                Nombre : {{ $nombrePersonaje }}<br/>
                                Raza : {{ $raza }}<br/>
                                Apodo : {{  $apodo  }}<br/>
                                Sexo : <?php echo $bonito2?> 
                                </div>
                             </div>
                             <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                <label>Clase : {{ $tipo}}</label><br/>     
                                    <img class="card-img tipo" src="{{asset($tipoClase)}}" alt="<?php echo $tipoClase?>"><br/>
                                </div>
                             </div>
                         </div>
                         <a class="button4" href="{{ route('grafica', $idPersonaje) }}">Ver historial</a>
                         <a class="button4" href="{{ route('mostrar', $idPersonaje) }}">Ver toda la información</a>
                         <a class="button4" onclick="seguro()">Eliminar</a>
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
<script>
function seguro()
{
    bootbox.confirm({
    title: "¿Quieres eliminar el personaje?",
    message: "Esto no será reversible",
    buttons: {
        cancel: {
            label: '<i class="fa fa-times"></i> Cancelar'
        },
        confirm: {
            label: '<i class="fa fa-check"></i> Confirmar'
        }
    },
    callback: function (result) 
        {
            if(result == true)
            {
                location.href = '{{ route("eliminar", $idPersonaje) }}';
            }
        }
    });
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
@include('layouts.js2')
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