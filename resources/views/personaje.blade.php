@extends('layouts.app')

@section('content')
@if (Route::has('login'))
@auth
@foreach($personajesC as $personaje)
    <?php
        $minFuerza = $personaje->fuerza;
        $minDestreza = $personaje->destreza;
        $minConstitucion = $personaje->constitucion;
        $minInteligencia = $personaje->inteligencia;
        $minSabiduria = $personaje->sabiduria; 
        $minCarisma = $personaje->carisma;
    ?>
@endforeach
<?php
$Sexo = "";
    if($personajes->sexo = 'F')
    {
        $Sexo = "Femenino";
    }
    else{
        if($personajes->sexo = 'M')
        {
            $Sexo= "Masculino";
        }
    }
    $tipoRaza = "img/".$personajes->raza.".jpg";
    $bonito = "año";
    if($personaje->edad > 1){
        $bonito = "años";
    }
   
    
?>
<div class="container-fluid">
    <div class="row" >
        <div class="col-sm-4 col-md-3 col-lg-4 text-center imagenPersonaje">
            <h3>Imagen</h3>
            <img src="{{asset($tipoRaza)}}" alt="<?php echo $tipoRaza?>">
            <p>
                {{$personajes->personalidad}}
            </p>
        </div>
        <div class="col-sm-8 col-md-9 col-lg-8 text-center">
            <h3>Información sobre el personaje</h3>
            <div class="row">
               <div class="col-sm-12 col-md-12 col-lg-12">
                    <label>Raza: {{$personajes->raza}}</label>
                    <label>Apodo: {{$personajes->apodo}}</label>
                    <label>Edad: {{$personajes->edad}} <?php echo $bonito?></label>
                    <label>Sexo: <?php echo $Sexo?></label>
               </div>
            </div>
            <form method="POST" action="{{}}">
            {!! csrf_field() !!} 
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4" style="margin-bottom:5px !important;">
                    <label>Fuerza:  </label><br/>
                    <input type="number" name="fuerza" id="fuerza" placeholder="Fuerza min (<?php echo $minFuerza ?>)" min="<?php echo $minFuerza?>">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Destreza:  </label><br/>
                    <input type="number" name="destreza" id="destreza" placeholder="Destreza min (<?php echo $minDestreza ?>)" min="<?php echo $minDestreza?>">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Constitución:  </label><br/>
                    <input type="number" name="constitucion" id="constitucion" placeholder="Constitución min (<?php echo $minConstitucion?>)" min="<?php echo $minConstitucion?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Inteligencia:  </label><br/>
                    <input type="number" name="inteligencia" id="inteligencia" placeholder="Inteligencia min (<?php echo $minInteligencia ?>)" min="<?php echo $minInteligencia?>">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Sabiduría:  </label><br/>
                    <input type="number" name="sabiduria" id="sabiduria" placeholder="Sabiduria min (<?php echo $minSabiduria ?>)" min="<?php echo $minSabiduria?>">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Carisma:  </label><br/>
                    <input type="number" name="carisma" id="carisma" placeholder="Carisma min (<?php echo $minCarisma?>)" min="<?php echo $minCarisma?>">
                </div>
            </div>
            </form>
        </div>
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