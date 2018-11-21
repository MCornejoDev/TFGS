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
<?php

?>
<!--Página principal después de iniciar sesión-->
<style>
.imgHome{
    margin: 0 auto !important; 
    height: 400px !important;
    width: 400px !important;
}
@media screen and (max-width: 320px) {
  .imgHome
    {
        margin: 0 auto !important; 
        height: 300px !important;
        width: 300px !important;
    }
}

@media screen and (max-width: 376px) {
  .imgHome
    {
        margin: 0 auto !important; 
        height: 280px !important;
        width: 280px !important;
    }
}
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div class="card">
                <div class="card-header text-center">Escritorio</div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        
                        <div class="container-fluid">
                            <div class="row text-center">
                                <div class="col-sm-6 col-md-offset-6 col-md-6 col-md-offset-6 col-lg-3">
                                    <a class="button4" href="{{route('crear')}}">Nueva Partida</a>
                                </div>
                                <div class="col-sm-6 col-md-offset-6 col-md-6 col-md-offset-6 col-lg-3">                  
                                    <a class="button4"  href="{{route('mostrarTodos')}}">Mostrar Partidas</a>
                                </div>
                                <div class="col-sm-6 col-md-offset-6 col-md-6 col-md-offset-6 col-lg-3">
                                    <a class="button4" href="{{route('herramientas')}}">Herramientas</a>
                                </div>
                                <div class="col-sm-6 col-md-offset-6 col-md-6 col-md-offset-6 col-lg-3">
                                    <a class="button4" href="{{route('mapas')}}">Mapas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(count($arrayTotal)>0)
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php
    for ($i=0; $i <  count($arrayTotal); $i++) { 
    if($i==0)
    {?>
     <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i?>" class="active"></li>
    <?php
    } 
    else{?>
     <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i?>"></li>   
    <?php }
    } ?>
  </ol>
  <div class="carousel-inner">
  <?php
    for ($i=0; $i < count($arrayTotal); $i++) { 
    if($i == 0)
    {?>
        <div class="carousel-item active">  
            <div class="container imgHome">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 ">
                        <a href="{{ route('mostrar', $arrayTotal[$i]['idPersonaje']) }}">
                        <img class="card-img " src="<?php echo("img/".$arrayTotal[$i]['raza'].".jpg") ?>" 
                        alt="<?php echo("img/".$arrayTotal[$i]['raza'].".jpg") ?>">
                        </a>
                    </div>
                </div>  
            </div>  
        </div>
    <?php 
    }
    else{?>
        <div class="carousel-item">    
            <div class="container imgHome">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 ">
                        <a href="{{ route('mostrar', $arrayTotal[$i]['idPersonaje']) }}">
                        <img class="card-img " src="<?php echo("img/".$arrayTotal[$i]['raza'].".jpg") ?>" 
                        alt="<?php echo("img/".$arrayTotal[$i]['raza'].".jpg") ?>">
                        <a>
                    </div>
                </div>  
            </div>
        </div> 
   <?php }
    } ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="color:black!important">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"  style="color:black!important">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endif
<br/>

@else


<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12" >
         <h1 style="text-align:center !important; font-weight:bold !important; align-content: center;">Debe iniciar sesión o registrarse</h1>
        </div>
    </div>
</div>

</div>

@endauth
@endif
@endsection
