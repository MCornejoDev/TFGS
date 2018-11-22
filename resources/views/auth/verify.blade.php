@extends('layouts.app')

@section('content')
<style>
*{
    
    -webkit-background-size: cover  !important;
    -moz-background-size: cover  !important;
    -o-background-size: cover  !important;
    background-size: cover  !important;
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
                <div class="card-header">{{ __('Verifica tu dirección de correo electrónico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un enlace de verificación será enviado a su dirección de correo electrónico') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder, porfavor verifique su correo electrónico.') }}
                    {{ __('Si no recibiste tu enlace de verificación, pulse en ') }} <a href="{{ route('verification.resend') }}">{{ __('reenviar') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
