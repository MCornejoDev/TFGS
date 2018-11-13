@extends('layouts.app')

@section('content')
<style>
*{
    background: url('../img/background3.jpg') no-repeat center center fixed ;
    -webkit-background-size:  no-repeat center center fixed  !important;
    -moz-background-size:  no-repeat center center fixed  !important;
    -o-background-size:  no-repeat center center fixed  !important;
    background-size:  no-repeat center center fixed  !important;
    font-weight: bold !important;
}
.btn-primary,.btn-primary:hover,.btn-primary:active,.btn:focus,.btn,.btn:hover,.btn:active,.btn:focus,button{
    background-color: inherit !important;
    color:black !important;
    font-weight: bold !important;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Recuperar Contraseña') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar link de recuperación de contraseña') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
