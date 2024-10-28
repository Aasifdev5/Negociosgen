@extends('master')
@section('title')
 {{ __('Verificación de Cuenta') }}
@endsection
@section('content')
<section style="padding: 150px 0; background: #1a1a1a;">
    <div class="container">
        <div class="container" style="background: #000; padding: 20px; border: 1px solid #000; border-radius: 16px;">
            <div class="text-center my-4">
                <h3 class="text-light">Revisa tu correo electrónico para obtener un código</h3>
                <p class="text-light">Por favor ingresa el código que enviamos a <strong>{{ Session::get('email') }}</strong> para ayudarnos a proteger tu cuenta.</p>
            </div>

            <form action="{{ route('verify.otp.submit') }}" method="POST" class="text-center">
                @csrf
                <div class="d-flex justify-content-center mb-4">
                    @for ($i = 1; $i <= 6; $i++)
                        <input type="text" name="otp_digit{{ $i }}" class="form-control text-center mx-1" maxlength="1" style="width: 50px;" aria-label="OTP digit {{ $i }}" onkeyup="moveFocus(event, {{ $i }})" required>
                    @endfor
                </div>

                <div class="d-grid gap-2 mb-3">
                    <button type="submit" class="btn btn-primary">Continuar</button>
                </div>
            </form>


            <div class="text-center">
                <div class="mb-2">
                    <form action="{{ route('otp.resend') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-link text-decoration-none">Reenviar código</button>
                    </form>
                </div>

                <div>
                    <a href="{{ url('alternative.method') }}" class="text-decoration-none">Prueba de otra manera</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function moveFocus(event, index) {
        const inputs = document.querySelectorAll('input[name^="otp_digit"]');
        if (event.key >= 0 && event.key <= 9) {
            // Move to the next input if a digit is entered
            if (index < inputs.length) {
                inputs[index].focus();
            }
        } else if (event.key === 'Backspace' && index > 1) {
            // Move to the previous input if Backspace is pressed
            inputs[index - 2].focus();
        }
    }
</script>
@endsection
