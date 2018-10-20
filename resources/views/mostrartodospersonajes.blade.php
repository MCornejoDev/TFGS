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

<div class="container">
    <div class="row">
    @foreach ($personajesSinCambios as $personaje)
        <div class="col-sm-12 col-md-6 col-lg-4 text-center">
            <div class="card" style="width: 18rem;">
                <!--Para elegir foto de la raza y poner bonito años-->
                <?php  
                    $tipoRaza = "img/".$personaje->raza.".jpg";
                    $bonito = "año";
                    if($personaje->edad > 1){
                        $bonito = "años";
                    }
                    $bonito2 = "Femenino";
                    if($personaje->sexo == 'M'){
                        $bonito2="Masculino";
                    }
                ?>

                <img class="card-img-top" src="{{asset($tipoRaza)}}" alt="<?php echo $tipoRaza?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8 col-md-8 col-lg-8 " style="text-align:left !important;">
                            Nombre : {{ $personaje->nombrePersonaje}}<br/>
                            Raza : {{ $personaje->raza }}<br/>
                            Apodo : {{ $personaje->apodo }}<br/>
                            Edad : {{ $personaje->edad }} <?php echo $bonito?><br/>
                            Altura : {{ $personaje->altura}} m<br/>
                            Sexo : <?php echo $bonito2?> 
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4">
                            <!--@foreach($clases as $clase)
                                @if($clase->idPersonaje == $personaje->id )
                                   <?php $tipo = "img/".$clase->tipo . ".png";?>
                                    <img class="card-img tipo" src="{{asset($tipo)}}" alt="<?php echo $clase->tipo?>"><br/>
                                @endif
                            @endforeach-->
                            </div>
                        </div>
                    </div>
                    <button><a href="{{ route('mostrar',$personaje->id) }}">Ver toda la información</a></button>
                    <button><a href="{{ route('mostrar',$personaje->id) }}">Eliminar</a></button>
            </div> <br/> 
        </div> 
        
    @endforeach
     <div class="col-sm-12 col-md-12 col-lg-12 text-center paginador"> {{ $personajesSinCambios->links() }}</div>    
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