@extends('master')
@section('title')
    {{ __('Tarjetas GEN') }}
@endsection
@section('content')
<br>

<section class="container py-5" style="background-color: #f8f9fa;">
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
    <div class="text-center mb-5">
        <h2 class="fw-bold">{{ __('Tarjetas GEN') }}</h2>
        <p class="lead text-muted">
            {{ __('Elige entre las tarjetas GEN CLASSIC, VIP, GOLD o PLATINUM con beneficios únicos.') }}
        </p>

    </div>

    <!-- Sección de Opciones de Tarjetas -->
    <div class="row">
        <!-- Tarjeta GEN CLASSIC -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                <div class="card-body text-center">
                    <h4 class="card-title text-primary fw-bold">{{ __('GEN CLÁSICO') }}</h4>
                    <p class="card-text">{{ __('Acceso de un año a cursos, coaching virtual y más.') }} <br>100 Bs</p>
                    <a href="{{ url('CardRegister') }}?price=100&title=GEN+CLÁSICO&userId={{ $user_session->id }}" class="btn btn-primary w-100">{{ __('Enlace de Pago') }}</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta GEN VIP -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                <div class="card-body text-center">
                    <h4 class="card-title text-danger fw-bold">{{ __('GEN VIP') }}</h4>
                    <p class="card-text">{{ __('Acceso a cursos, eventos en vivo y beneficios exclusivos.') }} <br>300 Bs</p>
                    <a href="{{ url('CardRegister') }}?price=300&title=GEN+VIP&userId={{ $user_session->id }}" class="btn btn-danger w-100">{{ __('Enlace de Pago') }}</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta GEN GOLD -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                <div class="card-body text-center">
                    <h4 class="card-title text-warning fw-bold">{{ __('ORO GEN') }}</h4>
                    <p class="card-text">{{ __('Acceso de un año a cursos, coaching virtual y coaching en vivo.') }} <br>500 Bs</p>
                    <a href="{{ url('CardRegister') }}?price=500&title=ORO+GEN&userId={{ $user_session->id }}" class="btn btn-warning w-100">{{ __('Enlace de Pago') }}</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta GEN PLATINUM -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                <div class="card-body text-center">
                    <h4 class="card-title text-success fw-bold">{{ __('GEN PLATINO') }}</h4>
                    <p class="card-text">{{ __('Acceso de dos años a cursos, coaching virtual, coaching en vivo y más.') }} <br>700 Bs</p>
                    <a href="{{ url('CardRegister') }}?price=700&title=GEN+PLATINO&userId={{ $user_session->id }}" class="btn btn-success w-100">{{ __('Enlace de Pago') }}</a>
                </div>
            </div>
        </div>
    </div>


</section>

@endsection
