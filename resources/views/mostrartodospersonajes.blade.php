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

img{
    width:20% !important;
    
}
</style>

<div class="container">
    <div class="row">
    @foreach ($personajesSinCambios as $personaje)
        <div class="col-sm-4 col-md-4 col-lg-4 text-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                Nombre : {{ $personaje->nombrePersonaje}}<br/>
                Raza : {{ $personaje->raza }}<br/>

            @foreach($clases as $clase)
                @if($clase->idPersonaje == $personaje->id )
                Clase : <?php
                $tipo = "img/".$clase->tipo . ".jpg";
                ?>
                    <img class="card-img" src="{{asset($tipo)}}" alt="<?php echo $clase->tipo?>"><br/>
                @endif
            @endforeach

                Apodo : {{ $personaje->apodo }}<br/>
                Edad : {{ $personaje->edad }} años<br/>
                Altura : {{ $personaje->altura}} m<br/>
                <button><a href="{{ route('mostrar',$personaje->id) }}">Modificar</a></button>
                </div>
                
            </div> <br/> 
        </div> 
       
    @endforeach
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