@extends('layouts.app')

@section('content')

@if (Route::has('login'))
@auth

<style>
#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;
}

input {
  padding: 5px;
  display:inline-block !important;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 25px;
  width: 25px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 100%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #dfb351;
}
.hijos
{
  margin-top:10px !important;
  margin-bottom:10px !important;
}

@media screen and (max-width: 320px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:50% !important;
    }
}

@media screen and (min-width: 375px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:42% !important;
    }
}

@media screen and (min-width: 424px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:37% !important;
    }
}

@media screen and (min-width: 427px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:28% !important;
    }
}

@media screen and (min-width: 768px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:21% !important;
    }
}

@media screen and (min-width: 1023px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:16% !important;
    }
}

@media screen and (min-width: 1439px) {
  .hijosv2
    {
      max-width: 100% !important;
      width:12% !important;
    }
}



</style>

<form method="POST" action="{{route('registrar')}}">
    {!! csrf_field() !!}  
   <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center; margin-top:5px !important; margin-bottom:10px !important;">
    <span class="step">1</span>
    <span class="step">2</span>
    <span class="step">3</span>
    <span class="step">4</span>
    <span class="step">5</span>
  </div>
  <div class="container tab">
  <h1>Datos del personaje</h1>
    <div class="row">
      <div class="col-sm-12 text-center">
          <select name="raza" class="hijos" style="padding:5px !important; ">
            <option disabled selected value> -- Eliga una raza -- </option>
            <option value="Humanos">Humanos</option>
            <option value="Elfos">Elfos</option>
            <option value="SemiElfos">SemiElfos</option>
            <option value="Orcos">Orcos</option>
            <option value="SemiOrcos">SemiOrcos</option>
            <option value="Enanos">Enanos</option>
            <option value="Gnomos">Gnomos</option>
            <option value="Medianos">Medianos</option>
          </select>
      </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
          <input class="hijos" type="text" placeholder="Nombre del personaje"  name="nombrePersonaje">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
          <input class="hijos" type="text" placeholder="Apodo del personaje"  name="apodo">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
          <input class="hijos" type="text" placeholder="Altura del personaje"  name="altura">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
          <input class="hijos" type="number" placeholder="Edad" name="edad" min="1" max="110">
          <input class="hijos hijosv2" type="number" placeholder="Peso" name="peso" min="1" max="110">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
          <input type="radio" name="sexo" value="masculino"> Masculino<br>
          <input type="radio" name="sexo" value="femenino"> Femenino<br>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
          <textarea class="hijos" name="personalidad" placeholder="Personalidad" id="personalidad" cols="28" rows="5"></textarea>
        </div>
    </div>
        <!-- <p><input placeholder="Last name..." oninput="this.className = ''" name="lname"></p>
        
    <div class="form-group" style="width:200px !important; margin:auto !important;padding-bottom: 15px;" >
        <button class="btn btn-primary btn-block"  type="submit">Crear personaje</button>
    </div>
         -->
  </div>
  <div class="container tab">
  <h1>Nivel y habilidades</h1>
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 text-center">
        <input class="hijos" type="number" placeholder="Nivel" name="nivel" min="0" max="100">
      </div>
    </div>
  </div>
  <div class="tab">Contact Info:
    <p><input placeholder="E-mail..." oninput="this.className = ''" name="email"></p>
    <p><input placeholder="Phone..." oninput="this.className = ''" name="phone"></p>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Atras</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Siguiente</button>
    </div>
  </div>
</form>
<script src="{{asset('js/propio.js')}}"></script>
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
