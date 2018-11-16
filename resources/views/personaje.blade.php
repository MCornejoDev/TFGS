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
        $minVida = $personaje->vida;
        
    ?>
@endforeach
<?php

$Sexo = "";

    if($personajes->sexo == 'F')
    {
        $Sexo = "Femenino";
       
    }
    else{
        if($personajes->sexo == 'M')
        {
            $Sexo= "Masculino";
          
        }
    }
    $tipoRaza = "img/".$personajes->raza.".jpg";
    $bonito = "año";
    if($personajes->edad > 1){
        $bonito = "años";
    }
   
    
?>
<style>
button
{
    background-color: #2a5483;
	color:#fff;
	border-top:0px solid #fff;
	border-right:0px  solid #fff;
	border-bottom:0px  solid #cecece;
	border-left:0px  solid #cecece;
	cursor:pointer;
	font-weight:bold;
	padding:0.2em 0;
	outline:none !important;
}
/*a{
    position: relative;
    left: 15px;
}*/
input[type="number"].nivel
{
    text-align:center;  
    
}
input[type="number"]{
    width:50px !important;
}
input[type="number"]#vida{
    width:100px !important;
}
@media screen and (max-width: 426px) 
{
    input[type="number"]
    {
        text-align:center;
        
    }
}

button.buttonPadding{
    padding:0px !important;
}

</style>
@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{Session::get('message')}}
    </div>
    @endif
<form method="POST" action="{{route('modificar',<?php echo $idPersonaje?>)}}" class="estiloSombreado">
    {!! csrf_field() !!}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 col-md-3 col-lg-4 text-center imagenPersonaje" >
                <label>Nick de la partida : {{$partidas->nickPartida}}</label><br/>
                <img src="{{asset($tipoRaza)}}" alt="<?php echo $tipoRaza?>">
                <p>{{$personajes->personalidad}}</p>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label>Raza: {{$personajes->raza}} ||</label>
                        <label>Apodo: {{$personajes->apodo}}</label><br/>
                        <label>Edad:  </label>
                        <input class="nivel" type="number" name="edad" id="edad"  value="<?php echo $edad?>" placeholder="Edad min (<?php echo $edad?>)" min="<?php echo $edad?>"  max="110"> || </label>
                        <label>Sexo: <?php echo $Sexo?></label><br/>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-9 col-lg-8 text-center">
                <h3>Información sobre el personaje</h3>
                <input type="hidden" name="idPartida" value="<?php echo $idPartida?>">
                <input type="hidden" name="nickPartida" value="<?php echo $nickPartida?>">
                <input type="hidden" name="nivel" value="<?php echo $nivel?>">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6" style="margin-bottom:5px !important;">
                            <label>Fuerza min (<?php echo $minFuerza ?>) :  </label>
                            <input type="number" name="fuerza" id="fuerza"  value="<?php echo $minFuerza?>" min="<?php echo $minFuerza?>"> 
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label>Destreza min (<?php echo $minDestreza ?>) :  </label>
                            <input type="number" name="destreza" id="destreza"  value="<?php echo $minDestreza?>" min="<?php echo $minDestreza?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label>Constitución min (<?php echo $minConstitucion?>) :  </label>
                            <input type="number" name="constitucion" id="constitucion"  value="<?php echo $minConstitucion?>" min="<?php echo $minConstitucion?>">
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label>Inteligencia min (<?php echo $minInteligencia ?>) :  </label>
                            <input type="number" name="inteligencia" id="inteligencia"  value="<?php echo $minInteligencia?>"  min="<?php echo $minInteligencia?>">
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label>Sabiduria min (<?php echo $minSabiduria ?>) :  </label>
                            <input type="number" name="sabiduria" id="sabiduria"  value="<?php echo $minSabiduria?>" min="<?php echo $minSabiduria?>">
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label>Carisma min (<?php echo $minCarisma?>):  </label>
                            <input type="number" name="carisma" id="carisma"  value="<?php echo $minCarisma?>" min="<?php echo $minCarisma?>">
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6" style="margin-bottom:5px !important;">
                            <label>Vida min (<?php echo $minVida ?>) :  </label>
                            <input type="number" name="vida" id="vida"  value="<?php echo $minVida?>"  >
                        </div>  
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label>Nivel min (<?php echo $nivel?>) :  </label>
                            <input class="nivel" type="number" name="nivel" id="nivel" value="<?php echo $nivel?>" min="<?php echo $nivel?>" max="100">
                        </div>  
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6" >
                            <p>Habilidad 1 : {{$personajes->habilidad1}} </p>
                            <p>Habilidad 2 : {{$personajes->habilidad2}} </p>
                            <p>Habilidad 3 : {{$personajes->habilidad3}} </p>
                            <p>Habilidad 4 : {{$personajes->habilidad4}} </p>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 text-center">
                            <label>Objetos:  </label><br/>
                            <textarea name="objetos"  id="objetos" cols="25" rows="5"><?php echo $objetos?></textarea>
                        </div>    
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <div class="container-fluid" style="display:inline-block!important;">
        <a class="button4" href="{{ route('mostrarTodos')}}">Volver</a>
        <div style="float:right !important;"  >
            <a class="button4"><button class="buttonPadding" type="submit">Modificar</button></a>
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