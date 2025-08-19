<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Verificación de correo</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9fafb; color: #333; padding: 40px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        <h2 style="color: #1f2937; margin-bottom: 20px;">¡Hola {{ $user->name }}!</h2>

        <p style="font-size: 16px; line-height: 1.5;">
            Gracias por registrarte en nuestro sistema. Para continuar, por favor verifica tu correo electrónico haciendo clic en el botón a continuación:
        </p>

        <p style="text-align: center; margin: 30px 0;">
            <a href="{{ $url }}" style="background-color: #2563eb; color: #ffffff; padding: 12px 24px; text-decoration: none; font-size: 16px; border-radius: 6px; display: inline-block;">
                Verificar correo
            </a>
        </p>

        <p style="font-size: 14px; color: #6b7280;">
            Si el botón no funciona, también puedes copiar y pegar el siguiente enlace en tu navegador:
        </p>

        <p style="word-break: break-all; font-size: 14px; color: #374151;">
            {{ $url }}
        </p>

        <p style="font-size: 14px; color: #6b7280;">
            Este enlace expirará en 60 minutos por razones de seguridad.
        </p>

        <hr style="margin: 30px 0; border: none; border-top: 1px solid #e5e7eb;">

        <p style="font-size: 13px; color: #9ca3af; text-align: center;">
            © {{ date('Y') }} Tu Aplicación. Todos los derechos reservados.
        </p>
    </div>
</body>
</html>
