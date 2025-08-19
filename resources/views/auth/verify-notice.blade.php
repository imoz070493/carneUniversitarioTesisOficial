@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Verifica tu correo electrónico</h2>

    <p>Te hemos enviado un correo de verificación. Por favor antes de proceder haz clic en el enlace dentro del correo para completar tu acceso.</p>

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            Se ha reenviado el enlace de verificación a tu correo.
        </div>
    @endif
    <p>Si no haz recibido el correo. Hacer click <a href="#" onclick="event.preventDefault(); document.getElementById('resend-form').submit();">aqui</a> para reenviar el enlace.</p>

    <form id="resend-form" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        {{-- <button type="submit" class="btn btn-primary">Reenviar correo de verificación</button> --}}
    </form>
</div>
@endsection