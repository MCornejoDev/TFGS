@extends('layouts.app')

@section('content')
<style>
*{
    background: url('../img/background3.jpg') no-repeat center center fixed !important;
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
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
