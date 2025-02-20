<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Pago</title>
</head>
<body>
    <h2>Hola {{ $name }},</h2>

    <p>Hemos recibido su pago con los siguientes detalles:</p>

    <ul>
        <li><strong>Tipo de Membresía:</strong> {{ $membershipType }}</li>
        <li><strong>Monto:</strong> ${{ $amount }}</li>
        <li><strong>Pago con Tarjeta:</strong> {{ $cardPayment }}</li>
    </ul>

    @if($payment_receipt)
        <p>Puede ver su recibo de pago aquí:</p>
        <a href="{{ $payment_receipt }}" target="_blank">Ver Recibo</a>
    @endif

    <p>Su pago está en proceso de aprobación. Le notificaremos una vez que haya sido revisado.</p>

    <p>Gracias por su confianza.</p>

    <p>Saludos,<br>El equipo de soporte</p>
</body>
</html>
