@extends('master')
@section('title')
{{ __('Formulario de Registro') }}
@endsection
@section('content')
<section style="padding: 90px 0; background: #1a1a1a">
    <div class="container">
        <div class="row">
          <!-- Left Section: Payment Method -->
          <div class="col-lg-6 mb-4">
            <div
              class="container"
              style="
                background: #000;
                padding: 20px;
                border: 1px solid #000;
                border-radius: 16px;
              "
            >
              <!-- Add Payment Method Section (Left-Aligned by Default) -->
              <div class="mb-4">
                <h2 class="text-light">Agregar Método de Pago</h2>

                <!-- PayPal Button -->
                <div class="d-grid gap-2 my-3">
                  <button class="btn btn-secondary">PayPal</button>
                </div>

                <!-- Credit Card Form -->
                <div class="mb-3">
                  <label for="cardNumber" class="form-label text-light">Número de tarjeta</label>
                  <input
                    type="text"
                    class="form-control"
                    id="cardNumber"
                    placeholder="_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _"
                  />
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="firstName" class="form-label text-light">Nombre</label>
                    <input
                      type="text"
                      class="form-control"
                      id="firstName"
                      placeholder="Nombre"
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="lastName" class="form-label text-light">Apellido</label>
                    <input
                      type="text"
                      class="form-control"
                      id="lastName"
                      placeholder="Apellido"
                    />
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="expiration" class="form-label text-light">Expiración</label>
                    <input
                      type="text"
                      class="form-control"
                      id="expiration"
                      placeholder="_ _ / _ _"
                    />
                  </div>
                  <div class="col-md-6">
                    <label for="securityCode" class="form-label text-light"
                      >Código de seguridad</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="securityCode"
                      placeholder="_ _ _"
                    />
                  </div>
                </div>

                <!-- Terms and Conditions Checkbox -->
                <div class="form-check mb-4">
                  <input class="form-check-input" type="checkbox" id="terms" />
                  <label class="form-check-label" for="terms">
                    Acepto los
                    <a href="#" class="text-decoration-none">Términos y condiciones</a>
                  </label>
                </div>

                <!-- Submit Button -->
                <div class="d-grid gap-2">
                  <button class="btn btn-primary" type="submit">Pagar</button>
                </div>

                <!-- Register Option -->
                <div class="text-center mt-4">
                  <span
                    >¿No tienes cuenta?
                    <a href="#" class="text-decoration-none">Regístrate ahora</a></span
                  >
                </div>
              </div>
            </div>
          </div>

          <!-- Right Section: Total Payment and Benefits -->
          <div class="col-lg-6 mb-4">
            <div
              class="container"
              style="
                background: #000;
                padding: 20px;
                border: 1px solid #000;
                border-radius: 16px;
              "
            >
              <!-- Total Payment Section (Right-Aligned) -->
              <div class="mb-4">
                <h1 class="text-left text-light">Membresía anual</h1>
                <div class="row">
                  <div class="col text-light">
                    <b>Total a Pagar:</b>
                  </div>
                  <div class="col text-light text-end">
                    <b>1.000 Bs</b>
                  </div>
                </div>
              </div>


              <!-- Payment Benefits Section (Left-Aligned by Default) -->
              <div class="mb-4">
                <div class="d-flex align-items-center mb-2">
                  <img class="me-2" src="CheckCircleOutline (1).svg" alt="Check" />
                  <div style="color: #EDEDED;">
                    Acceso ilimitado a todos los cursos, entrenamientos y materiales
                    digitales.
                  </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                  <img class="me-2" src="CheckCircleOutline (1).svg" alt="Check" />
                  <div style="color: #EDEDED;">
                    Comisiones por las personas que inscribas en tu red hasta el
                    séptimo nivel.
                  </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                  <img class="me-2" src="CheckCircleOutline (1).svg" alt="Check" />
                  <div style="color: #EDEDED;">
                    Oportunidad de mejorar tus finanzas, crecer personalmente y
                    contribuir a causas sociales.
                  </div>
                </div>
                <div class="d-flex align-items-center mb-2">
                  <img class="me-2" src="CheckCircleOutline (1).svg" alt="Check" />
                  <div style="color: #EDEDED;">
                    Participación en eventos exclusivos para expandir tu red de
                    contactos.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

</section>
@endsection
