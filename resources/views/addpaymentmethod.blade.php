@extends('master')
@section('title')
{{ __('Pagar ahora') }}
@endsection
@section('content')
<section style="padding: 90px 0; background: #000">
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success">
                <p class="text-dark">{{ session::get('success') }}</p>
            </div>
        @endif

        @if(Session::has('fail'))
            <div class="alert alert-danger">
                <p class="text-dark">{{ session::get('fail') }}</p>
            </div>
        @endif

        @php
            $membership = \App\Models\Membership::where('name', $user_session->membershipType)->first();
            $countryModel = \App\Models\Country::where('id', $user_session->country)->first();

            $amount = $membership ? $membership->price : 0;
            $country = $countryModel ? $countryModel->country_name : 'N/A';
        @endphp

        @if($amount == 0 || $country == 'N/A')
            <div class="alert alert-warning">
                {{ __('Información de membresía o país no encontrada. Por favor, contacte con soporte.') }}
            </div>
        @else
        <div class="row">
            <!-- Left Section: Payment Method -->
            <div class="col-lg-6 mb-4">
                <div class="container"
                    style="background: #000; padding: 20px; border: 1px solid #000; border-radius: 16px;">
                    <div class="mb-4">
                        <h4 class="text-light">{{ __('Membresía seleccionada') }}:
                            {{ $user_session->membershipType }}
                            <div class="col text-light text-end">
                                <b>Bs {{ $amount }} </b>
                            </div>
                        </h4>
                        <p class="text-light">{{ __('Métodos de Pago') }}</p>

                        <!-- Payment Options Based on Country -->
                        <div class="mb-3 d-grid gap-2 my-3 text-center">
                            @if($country == 'Bolivia')
                                <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#qrCodeSection"
                                    aria-expanded="false" aria-controls="qrCodeSection">
                                    {{ __('CÓDIGO QR') }}
                                </button>
                            @elseif($country == 'Brazil')
                                <button class="btn btn-success" data-bs-toggle="collapse" data-bs-target="#mercadoPagoSection"
                                    aria-expanded="false" aria-controls="mercadoPagoSection">
                                    {{ __('MercadoPago') }}
                                </button>
                                <button class="btn btn-warning" data-bs-toggle="collapse" data-bs-target="#payoneerSection"
                                    aria-expanded="false" aria-controls="payoneerSection">
                                    {{ __('Payoneer') }}
                                </button>
                            @endif
                        </div>

                        <!-- Payment Forms -->
                        <div id="paymentMethods">
                            <!-- QR Code Payment (Bolivia) -->
                            @if($country == 'Bolivia')
                                <div class="collapse multi-collapse" id="qrCodeSection" data-bs-parent="#paymentMethods">
                                    <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user_session->id }}">
                                        <input type="hidden" name="membershipType" value="{{ $user_session->membershipType ?? '' }}">

                                        <!-- Amount Field -->
                                        <div class="mb-3">
                                            <label for="amount" class="text-light form-label">{{ __('Monto a depositar') }}</label>
                                            <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" required pattern="^\d+(\.\d{1,2})?$">
                                            @error('amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">Ingrese un monto válido (Ej: 100.00).</small>
                                        </div>

                                        <div class="payment__history mb-4">
                                            <h3 class="text-light">{{ __('CÓDIGO QR') }}</h3>
                                            <ul class="payment__history--inner d-flex">
                                                @if (!empty($qrcode))
                                                    <img class="img-radius img-70 align-top m-r-15" src="{{ asset('qrcode/' . $qrcode->qrcode_path) }}" height="70px" alt="">
                                                    <a href="{{ asset('qrcode/' . $qrcode->qrcode_path) }}" class="btn btn-block btn-primary" download="qr_code.png">
                                                        <i class="fa fa-download"></i> {{ __('Descargar Código QR') }}
                                                    </a>
                                                @endif
                                            </ul>
                                        </div>

                                        <div class="mb-3">
                                            <label for="payment_receipt" class="text-light form-label">{{ __('Recibo de Pago') }}</label>
                                            <input type="file" class="form-control @error('payment_receipt') is-invalid @enderror" id="payment_receipt" name="payment_receipt" accept="image/*">
                                            @error('payment_receipt')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button class="btn btn-primary btn-sm pull-right" type="submit">{{ __('Enviar') }}</button>
                                    </form>
                                </div>
                            @endif

                            <!-- MercadoPago Payment (Brazil) -->
                            @if($country == 'Brazil')
                                <div class="collapse multi-collapse" id="mercadoPagoSection" data-bs-parent="#paymentMethods">
                                    <p class="text-light">Pague usando MercadoPago.</p>
                                    <a href="https://www.mercadopago.com.br" class="btn btn-success">Ir a MercadoPago</a>
                                </div>

                                <!-- Payoneer Payment (Brazil) -->
                                <div class="collapse multi-collapse" id="payoneerSection" data-bs-parent="#paymentMethods">
                                    <p class="text-light">Pague usando Payoneer.</p>
                                    <a href="https://www.payoneer.com/" class="btn btn-warning">Ir a Payoneer</a>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            <!-- Right Section: Membership Benefits -->
            <div class="col-lg-6 mb-4">
                <div class="container"
                    style="background: #000; padding: 20px; border: 1px solid #000; border-radius: 16px;">
                    <h1 class="text-left text-light">{{ __('Membresía anual') }}</h1>
                    <div class="row">
                        <div class="col text-light">
                            <b>{{ __('Total a Pagar') }}:</b>
                        </div>
                        <div class="col text-light text-end">
                            <b>Bs {{ $amount }} </b>
                        </div>
                    </div>
                    <div class="mb-4">
                        @foreach([
                            __('Acceso ilimitado a todos los cursos, entrenamientos y materiales digitales.'),
                            __('Comisiones por las personas que inscribas en tu red hasta el séptimo nivel.'),
                            __('Oportunidad de mejorar tus finanzas, crecer personalmente y contribuir a causas sociales.'),
                            __('Participación en eventos exclusivos para expandir tu red de contactos.')
                        ] as $benefit)
                            <div class="d-flex align-items-center mb-2">
                                <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check" />
                                <div style="color: #EDEDED;">{{ $benefit }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
