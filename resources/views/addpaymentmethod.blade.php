@extends('master')
@section('title')
    {{ __('Formulario de Registro') }}
@endsection
@section('content')
<section style="padding: 90px 0; background: #1a1a1a">
    <div class="container">
        @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{ session::get('success') }}</p>
        </div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">
            <p>{{ session::get('fail') }}</p>
        </div>
        @endif
        <div class="row">
            <!-- Left Section: Payment Method -->
            <div class="col-lg-6 mb-4">
                <div class="container" style="background: #000; padding: 20px; border: 1px solid #000; border-radius: 16px;">
                    <div class="mb-4">
                        <h2 class="text-light">Métodos de Pago</h2>

                        <!-- Toggle Buttons -->
                        <div class="mb-3 d-grid gap-2 my-3 text-center">
                            <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#qrCodeSection" aria-expanded="false" aria-controls="qrCodeSection">
                                QR CODE
                            </button>
                            <button class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#creditCardSection" aria-expanded="false" aria-controls="creditCardSection">
                                Credit Card
                            </button>
                        </div>

                        <!-- PayPal Button -->
                        <div class="d-grid gap-2 my-3">
                            <button class="btn btn-secondary">PayPal</button>
                        </div>

                        <!-- QR Code Section -->
                        <div class="collapse multi-collapse" id="qrCodeSection" data-bs-parent="#paymentMethods">
                            <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user_session->id }}">
                                <div class="mb-3">
                                    <label for="amount" class="text-light form-label">Monto</label>
                                    <input type="text" class="form-control" id="amount" name="amount">
                                </div>
                                <div class="payment__history mb-4">
                                    <h3 class="text-light payment__history--title">Código QR</h3>
                                    <ul class="payment__history--inner d-flex">
                                        <img class="img-radius img-70 align-top m-r-15" src="{{ asset('qrcode/' . $qrcode->qrcode_path) }}" height="70px" alt="">
                                    </ul>
                                    @if (!empty($qrcode))
                                        <a href="{{ asset('qrcode/' . $qrcode->qrcode_path) }}" class="btn btn-block btn-primary" download="qr_code.png">
                                            <i class="fa fa-download"></i> Descargar Código QR
                                        </a>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="payment_receipt" class="text-light form-label">Recibo de Pago</label>
                                    <input type="file" class="form-control" id="payment_receipt" name="payment_receipt" accept="image/*">
                                </div>
                                <button class="btn btn-primary btn-sm pull-right" type="submit">Enviar</button>
                            </form>
                        </div>

                        <!-- Credit Card Section -->
                        <div class="collapse multi-collapse" id="creditCardSection" data-bs-parent="#paymentMethods">
                            <form>
                                <div class="mb-3">
                                    <label for="cardNumber" class="form-label text-light">Número de tarjeta</label>
                                    <input type="text" class="form-control" id="cardNumber" placeholder="_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _">
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="firstName" class="form-label text-light">Nombre</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="Nombre">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lastName" class="form-label text-light">Apellido</label>
                                        <input type="text" class="form-control" id="lastName" placeholder="Apellido">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="expiration" class="form-label text-light">Expiración</label>
                                        <input type="text" class="form-control" id="expiration" placeholder="_ _ / _ _">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="securityCode" class="form-label text-light">Código de seguridad</label>
                                        <input type="text" class="form-control" id="securityCode" placeholder="_ _ _">
                                    </div>
                                </div>
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="terms">
                                    <label class="form-check-label text-light" for="terms">
                                        Acepto los <a href="#" class="text-decoration-none">Términos y condiciones</a>
                                    </label>
                                </div>
                                <button class="btn btn-primary" type="submit">Pagar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section: Membresía anual -->
            <div class="col-lg-6 mb-4">
                <div class="container" style="background: #000; padding: 20px; border: 1px solid #000; border-radius: 16px;">
                    <h1 class="text-left text-light">Membresía anual</h1>
                    <div class="row">
                        <div class="col text-light">
                            <b>Total a Pagar:</b>
                        </div>
                        <div class="col text-light text-end">
                            <b>1.000 Bs</b>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-2">
                            <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check" />
                            <div style="color: #EDEDED;">
                                Acceso ilimitado a todos los cursos, entrenamientos y materiales digitales.
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check" />
                            <div style="color: #EDEDED;">
                                Comisiones por las personas que inscribas en tu red hasta el séptimo nivel.
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check" />
                            <div style="color: #EDEDED;">
                                Oportunidad de mejorar tus finanzas, crecer personalmente y contribuir a causas sociales.
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check" />
                            <div style="color: #EDEDED;">
                                Participación en eventos exclusivos para expandir tu red de contactos.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
