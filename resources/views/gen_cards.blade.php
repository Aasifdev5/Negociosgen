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
                    <p class="card-text">{{ __('Acceso de un año a cursos, coaching virtual y más.') }}</p>

                </div>
            </div>
        </div>

        <!-- Tarjeta GEN VIP -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                <div class="card-body text-center">
                    <h4 class="card-title text-warning fw-bold">GEN VIP</h4>
                    <p class="card-text">{{ __('Acceso a cursos, eventos en vivo y beneficios exclusivos.') }}</p>

                </div>
            </div>
        </div>

        <!-- Tarjeta GEN GOLD -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                <div class="card-body text-center">
                    <h4 class="card-title text-warning fw-bold">{{ __('ORO GEN') }}</h4>
                    <p class="card-text">{{ __('Acceso de un año a cursos, coaching virtual y coaching en vivo.') }}</p>

                </div>
            </div>
        </div>

        <!-- Tarjeta GEN PLATINUM -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                <div class="card-body text-center">
                    <h4 class="card-title text-success fw-bold">{{ __('GEN PLATINO') }}</h4>
                    <p class="card-text">{{ __('Acceso de dos años a cursos, coaching virtual, coaching en vivo y más.') }}</p>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
