@extends('master')
@section('title')
 {{ __('Verificación de Cuenta') }}
@endsection
@section('content')
<section style="padding: 150px 0; background: #1a1a1a;">
    <div class="container">
        <div class="container" style="background: #000;padding: 20px; border: 1px solid #000; border-radius: 16px;">
            <div class="text-center my-4">
                <h3 class="text-light">Revisa tu correo electrónico para obtener un código</h3>
                <p class="text-light">Por favor ingresa el código que enviamos a ejemplo@gmail.com para ayudarnos a proteger tu cuenta.</p>
              </div>

              <div class="d-flex justify-content-center mb-4">
                <input type="text" class="form-control text-center mx-1" maxlength="1" style="width: 50px;" aria-label="OTP digit 1">
                <input type="text" class="form-control text-center mx-1" maxlength="1" style="width: 50px;" aria-label="OTP digit 2">
                <input type="text" class="form-control text-center mx-1" maxlength="1" style="width: 50px;" aria-label="OTP digit 3">
                <input type="text" class="form-control text-center mx-1" maxlength="1" style="width: 50px;" aria-label="OTP digit 4">
                <input type="text" class="form-control text-center mx-1" maxlength="1" style="width: 50px;" aria-label="OTP digit 5">
                <input type="text" class="form-control text-center mx-1" maxlength="1" style="width: 50px;" aria-label="OTP digit 6">
              </div>


              <div class="d-grid gap-2 mb-3">
                <a class="btn btn-primary" href="welcome.html" id="buttonContainer">Continuar</a>
              </div>

              <div class="text-center">
                <div class="mb-2">
                  <a href="#" class="text-decoration-none">Reenviar código</a>
                </div>
                <div>
                  <a href="#" class="text-decoration-none">Prueba de otra manera</a>
                </div>

        </div>
      </div>



</section>

@endsection
