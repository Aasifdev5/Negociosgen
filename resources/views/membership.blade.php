@extends('master')
@section('title')
    {{ __('Membresías') }}
@endsection
@section('content')
    @php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
    @endphp

    <section style="padding: 40px 0; background: #1A1A1A;">
        <div class="container py-5">
            @if(Session::has('success'))
     <div class="alert alert-success">
         <p>{{session::get('success')}}</p>
     </div>
     @endif
     @if(Session::has('fail'))
     <div class="alert alert-danger">
         <p>{{session::get('fail')}}</p>
     </div>
     @endif
            <!-- Únete ahora Section -->
            <div class="text-center mb-5">
                <img src="<?php echo '/' . $general_setting['app_footer_payment_image'] ?? ''; ?>" alt="GEN Banner" class="img-fluid mb-4" width="200px" height="200px" style="max-width: 100%; border-radius: 10px;">
                <h2 class="fw-bold text-light">{{ __('Únete ahora') }}</h2>
                <p class="lead" style="color: #A1A1A1;">
                    Elige entre 4 membresías dentro de GEN. Explora los beneficios de cada una y selecciona la que mejor se adapte a tus necesidades.
                </p>
            </div>

            <!-- Membership Options Section -->
            <div class="row mb-5">
                <!-- GEN CLASSIC Member -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm border-light rounded" style="background-color: #111; color: white; height: 100%; transition: all 0.3s ease-in-out;">
                        <div class="card-body text-center">
                            <h4 class="card-title text-primary fw-bold">{{ __('Miembro GEN CLASSIC') }}</h4>
                            <p class="card-text text-light">1,000 Bs.</p>
                            <ul class="list-unstyled text-left" style="color: #ddd; padding-left: 0;">
                                <li><i class="fas fa-check-circle" style="color: #5bc0de;"></i> Acceso por un año a cursos y coaching virtual.</li>
                                <li><i class="fas fa-check-circle" style="color: #5bc0de;"></i> Acceso a formación.</li>
                                <li><i class="fas fa-check-circle" style="color: #5bc0de;"></i> Descuentos y beneficios en empresas nacionales.</li>
                                <li><i class="fas fa-check-circle" style="color: #5bc0de;"></i> Apoyo de líderes a nivel nacional.</li>
                            </ul>
                            <form action="{{ url('signup') }}" method="GET">
                                <input type="hidden" name="refer" value="{{ $refer ?? '' }}">
                                <input type="hidden" name="membership" value="GEN_CLASSIC">
                                <button type="submit" class="btn btn-primary w-100">{{ __('Únete ahora') }}</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- GEN VIP Member -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm border-light rounded" style="background-color: #111; color: white; height: 100%; transition: all 0.3s ease-in-out;">
                        <div class="card-body text-center">
                            <h4 class="card-title text-warning fw-bold">{{ __('Miembro GEN VIP') }}</h4>
                            <p class="card-text text-light">3,000 Bs.</p>
                            <ul class="list-unstyled text-left" style="color: #ddd; padding-left: 0;">
                                <li><i class="fas fa-check-circle" style="color: #f0ad4e;"></i> Acceso por un año a cursos y coaching virtual.</li>
                                <li><i class="fas fa-check-circle" style="color: #f0ad4e;"></i> Acceso a formación y eventos en vivo (incluye 1 invitado).</li>
                                <li><i class="fas fa-check-circle" style="color: #f0ad4e;"></i> Asientos reservados en las primeras filas.</li>
                                <li><i class="fas fa-check-circle" style="color: #f0ad4e;"></i> Descuentos y beneficios en empresas nacionales e internacionales.</li>
                                <li><i class="fas fa-check-circle" style="color: #f0ad4e;"></i> Tarjeta VIP GEN con beneficios adicionales.</li>
                            </ul>
                            <form action="{{ url('signup') }}" method="GET">
                                <input type="hidden" name="refer" value="{{ $refer ?? '' }}">
                                <input type="hidden" name="membership" value="GEN_VIP">
                                <button type="submit" class="btn btn-warning w-100">{{ __('Únete ahora') }}</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- GEN GOLD Member -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm border-light rounded" style="background-color: #111; color: white; height: 100%; transition: all 0.3s ease-in-out;">
                        <div class="card-body text-center">
                            <h4 class="card-title text-warning fw-bold">{{ __('Miembro GEN GOLD') }}</h4>
                            <p class="card-text text-light">5,000 Bs.</p>
                            <ul class="list-unstyled text-left" style="color: #ddd; padding-left: 0;">
                                <li><i class="fas fa-check-circle" style="color: #f39c12;"></i> Acceso por un año a cursos, coaching virtual y acceso libre a coaching en vivo (incluye 2 invitados).</li>
                                <li><i class="fas fa-check-circle" style="color: #f39c12;"></i> Acceso a formación y eventos en vivo (incluye 2 invitados).</li>
                                <li><i class="fas fa-check-circle" style="color: #f39c12;"></i> Apoyo personalizado de líderes nacionales e internacionales.</li>
                                <li><i class="fas fa-check-circle" style="color: #f39c12;"></i> Tarjeta GOLD GEN con beneficios adicionales.</li>
                            </ul>
                            <form action="{{ url('signup') }}" method="GET">
                                <input type="hidden" name="refer" value="{{ $refer ?? '' }}">
                                <input type="hidden" name="membership" value="GEN_GOLD">
                                <button type="submit" class="btn btn-warning w-100">{{ __('Únete ahora') }}</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- GEN PLATINUM Member -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm border-light rounded" style="background-color: #111; color: white; height: 100%; transition: all 0.3s ease-in-out;">
                        <div class="card-body text-center">
                            <h4 class="card-title text-success fw-bold">{{ __('Miembro GEN PLATINUM') }}</h4>
                            <p class="card-text text-light">7,000 Bs. (Válido por 2 años)</p>
                            <ul class="list-unstyled text-left" style="color: #ddd; padding-left: 0;">
                                <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Acceso por dos años a cursos, coaching virtual y coaching en vivo (incluye 3 invitados).</li>
                                <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Acceso a formación y eventos en vivo (incluye 3 invitados).</li>
                                <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Asientos reservados en las primeras filas.</li>
                                <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Descuentos y beneficios en empresas VIP nacionales e internacionales.</li>
                                <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Tarjeta PLATINUM GEN con beneficios exclusivos.</li>
                            </ul>
                            <form action="{{ url('signup') }}" method="GET">
                                <input type="hidden" name="refer" value="{{ $refer ?? '' }}">
                                <input type="hidden" name="membership" value="GEN_PLATINUM">
                                <button type="submit" class="btn btn-success w-100">{{ __('Únete ahora') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
