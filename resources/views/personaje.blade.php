@extends('layouts.app')

@section('content')
@if (Route::has('login'))
@auth

<?php
    $nickPartida = $partidas->nickPartida;
    $idPartida = $partidas->id;
    $idPersonaje = $partidas->idPersonaje;
?>

<!--Personajes con los cambios-->
@foreach($personajesC as $personaje)
    <?php
        $minFuerza = $personaje->fuerza;
        $minDestreza = $personaje->destreza;
        $minConstitucion = $personaje->constitucion;
        $minInteligencia = $personaje->inteligencia;
        $minSabiduria = $personaje->sabiduria; 
        $minCarisma = $personaje->carisma;     
        $edad = $personaje->edad;
        $nivel = $personaje->nivel;
        $objetos = $personaje->objetos;
        $minVida = $personajes->vida;
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
@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{Session::get('message')}}
    </div>
    @endif
<div class="container-fluid">
    <div class="row estiloSombreado" >
        <div class="col-sm-4 col-md-3 col-lg-4 text-center imagenPersonaje">
            <img src="{{asset($tipoRaza)}}" alt="<?php echo $tipoRaza?>">
            <div >
                <p>
                    {{$personajes->personalidad}}
                </p>
            </div>
            <div class="row">
               <div class="col-sm-12 col-md-12 col-lg-12 ">
                    <label>Raza: {{$personajes->raza}}</label><br/>
                    <label>Apodo: {{$personajes->apodo}}</label><br/>
                    <label>Edad: <?php echo ($edad . " " . $bonito) ?></label><br/>
                    <label>Sexo: <?php echo $Sexo?></label><br/>
                    <label>Nick de la partida : {{$partidas->nickPartida}}</label>
               </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-9 col-lg-8 text-center">
            <h3>Información sobre el personaje</h3>
            
            <form method="POST" action="{{route('modificar',<?php echo $idPersonaje?>)}}">
            {!! csrf_field() !!} 
            <input type="hidden" name="idPartida" value="<?php echo $idPartida?>">
            <input type="hidden" name="nickPartida" value="<?php echo $nickPartida?>">
            <input type="hidden" name="nivel" value="<?php echo $nivel?>">
            <div class="row" >
                <div class="col-sm-4 col-md-4 col-lg-4" style="margin-bottom:5px !important;">
                    <label>Fuerza:  </label><br/>
                    <input type="number" name="fuerza" id="fuerza"  value="<?php echo $minFuerza?>" placeholder="Fuerza min (<?php echo $minFuerza ?>)" min="<?php echo $minFuerza?>">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Destreza:  </label><br/>
                    <input type="number" name="destreza" id="destreza"  value="<?php echo $minDestreza?>" placeholder="Destreza min (<?php echo $minDestreza ?>)" min="<?php echo $minDestreza?>">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Constitución:  </label><br/>
                    <input type="number" name="constitucion" id="constitucion"  value="<?php echo $minConstitucion?>" placeholder="Constitución min (<?php echo $minConstitucion?>)" min="<?php echo $minConstitucion?>">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Inteligencia:  </label><br/>
                    <input type="number" name="inteligencia" id="inteligencia"  value="<?php echo $minInteligencia?>" placeholder="Inteligencia min (<?php echo $minInteligencia ?>)" min="<?php echo $minInteligencia?>">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Sabiduría:  </label><br/>
                    <input type="number" name="sabiduria" id="sabiduria"  value="<?php echo $minSabiduria?>" placeholder="Sabiduria min (<?php echo $minSabiduria ?>)" min="<?php echo $minSabiduria?>">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Carisma:  </label><br/>
                    <input type="number" name="carisma" id="carisma"  value="<?php echo $minCarisma?>" placeholder="Carisma min (<?php echo $minCarisma?>)" min="<?php echo $minCarisma?>">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Edad:  </label><br/>
                    <input type="number" name="edad" id="edad"  value="<?php echo $edad?>" placeholder="Edad min (<?php echo $edad?>)" min="<?php echo $edad?>">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <label>Nivel:  </label><br/>
                    <input type="number" name="nivel" id="nivel" value="<?php echo $nivel?>" placeholder="Nivel min (<?php echo $nivel?>)" min="<?php echo $nivel?>">
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4" style="margin-bottom:5px !important;">
                    <label>Vida:  </label><br/>
                    <input type="number" name="vida" id="vida"  value="<?php echo $minVida?>" placeholder="Vida min (<?php echo $minVida ?>)" >
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 text-center">
                    <label>Objetos:  </label><br/>
                    <textarea name="objetos"  id="objetos" cols="28" rows="5"><?php echo $objetos?></textarea>
                </div>    
                <div class="form-group"  style="width:140px !important; margin:auto !important; float:right !important;">
                    <button class="btn btn-primary btn-block"  type="submit">Modificar</button>
                </div>
            </div>
        </div>
        </form>
        <button style="width:140px !important; margin:auto !important; float:right !important; margin-top:15px !important;" class="btn btn-primary btn-block">
            <a style=" color:white !important;" href="{{ route('mostrarTodos')}}">Volver</a>
        </button>
    </div>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>-->
    <script>
        var edad = '{{$edad}}';
        console.log( "Soy js " + edad);
    </script>
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