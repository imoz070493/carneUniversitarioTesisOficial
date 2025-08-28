@component('mail::message')
# Hola {{ $user->name ?? '' }}

Recibimos una solicitud para restablecer tu contraseña en nuestra plataforma.

@component('mail::button', ['url' => $url])
Restablecer Contraseña
@endcomponent

Este enlace caduca en **60 minutos**.

Si no solicitaste este cambio, ignora este correo.

Gracias,  
El equipo de soporte 🚀
@endcomponent