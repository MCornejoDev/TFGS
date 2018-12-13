@extends('layouts.app')

@section('content')
<style>
input,div{
    color:black !important;
    font-weight:bold !important; 
}
.button2{
    background: none;
    border: none;
    margin-top: 20px;
    outline:none !important;
}
button:disabled,input:disabled{
    background: none !important;
    border: none !important;
    padding-left:0px !important;
    padding-right:0px !important;
    color:black !important;
}

button:disabled>a{
    background-color:grey !important;
}

#botonActivar{
    background: none !important;
    border: none !important;
    padding-left:0px !important;
    padding-right:0px !important;
    color:black !important;
}

button.close{
    display:none !important;
}
button.btn.btn-default{
    border-radius: 30px !important;
}

button.btn.btn-primary{
    border-radius: 30px !important;
}

@media screen and (max-width:426px) {
    #email{
        text-align: center;
    }
  }

@media screen and (max-width:1025px) {
    #email{
        text-align: center;
    }
  }


@media screen and (max-width:426px) and (orientation:landscape){
    #email{
        text-align: center;
    }
  }

@media screen and (max-width:1025px) and (orientation:landscape){
    #email{
        text-align: center;
    }
  }



/*Estilos de los inputs desahabilitados*/
</style>

@if (Route::has('login'))
@auth
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Datos del usuario
                    <hr>
                    <div class="card-body">
                    <form action="{{route('actualizar')}}" method="POST" id="formulario" name="formulario">
                    {!! csrf_field() !!}
                        <div class="form-group row">
                            <label for="text" class="col-sm-4 col-form-label text-md-right">{{ __('Usuario') }}</label>
                            <div class="col-md-6">
                                <input id="user" type="text" class="form-control" name="user" value="<?php echo($datosUsuario[0]->user)?>" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                             <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Nueva Contraseña" minlength="6" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Repite contraseña') }}</label>
                             <div class="col-md-6">
                                <input id="passwordR" type="password" class="form-control" name="passwordR" placeholder="Repite la Contraseña" minlength="6" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                             <div class="col-md-6">
                                <input type="text" class="form-control" id="email"  value="<?php echo($datosUsuario[0]->email)?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                                <button class="button2" type="submit">
                                       <a class="button4">Actualizar datos</a>
                                </button>
                            </div> 
                        </div>    
                        </form> 
                        
                        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                            Borrar usuario : <input type="checkbox" name="borrarUsuario" id="borrarUsuario">
                            <button disabled id="botonActivar"><a class="button4" onclick="seguro()">Eliminar usuario</a></button> 
                        </div>                   

                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>    

<script>

function seguro()
{
    bootbox.confirm({
    title: "¿Quieres eliminar la cuenta?",
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
                location.href = '{{route("eliminarCuenta")}}';
            }
        }
    });
}
$('input[type="checkbox"]').on('change', function(e){
    if (this.checked) {
        $('#botonActivar').removeAttr("disabled");
    } else {
        $('#botonActivar').attr("disabled","disabled");
    }
});

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

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
