@extends('master')

@section('title')
    {{ __('¡Gracias por tu compra!') }}
@endsection

@section('content')
<section style="padding: 20px 0; background: #000000; position: relative;">
<div class="thank-you-container">
    <h1 class="thank-you-title text-light">🎉 ¡Gracias por tu compra! 🎉</h1>
    <p class="thank-you-message text-light">
        Tu pedido ha sido procesado con éxito. Pronto recibirás más detalles en tu correo electrónico y WhatsApp.
    </p>
    <a href="https://prueba.negociosgen.com/" class="cta-button">📚 Ir a educación financiera</a>
</div>
</section>
<style>
    .thank-you-container {
        text-align: center;
        padding: 50px;

        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 50px auto;
    }
    .thank-you-title {
        font-size: 2rem;
        color: #2c3e50;
    }
    .thank-you-message {
        font-size: 1.2rem;
        margin: 20px 0;
        color: #34495e;
    }
    .cta-button {
        display: inline-block;
        padding: 12px 25px;
        background-color: #27ae60;
        color: #fff;
        text-decoration: none;
        font-size: 1rem;
        font-weight: bold;
        border-radius: 5px;
        transition: background 0.3s ease;
    }
    .cta-button:hover {
        background-color: #219150;
    }
</style>
@endsection
