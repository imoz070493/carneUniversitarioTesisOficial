<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Correo verificado</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f3f4f6; color: #1f2937; padding: 40px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 10px; padding: 30px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); text-align: center;">
        <h1 style="color: #16a34a; font-size: 28px; margin-bottom: 20px;">✅ ¡Correo verificado correctamente!</h1>

        <p style="font-size: 16px; color: #374151; margin-bottom: 25px;">
            Tu dirección de correo electrónico ha sido verificada exitosamente. Ya puedes acceder a todas las funcionalidades de la aplicación.
        </p>

        <a href="{{ url('/login') }}"
           style="background-color: #2563eb; color: white; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-size: 16px; display: inline-block;">
            Inicio
        </a>

        <hr style="margin: 40px 0; border: none; border-top: 1px solid #e5e7eb;">

        <p style="font-size: 13px; color: #9ca3af;">
            © {{ date('Y') }} Tu Aplicación. Todos los derechos reservados.
        </p>
    </div>
</body>
</html>