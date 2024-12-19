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
        <h2 class="fw-bold">Tarjetas GEN</h2>
        <p class="lead text-muted">
            Elige entre las tarjetas GEN CLASSIC, VIP, GOLD o PLATINUM con beneficios únicos.
        </p>

    </div>

    <!-- Sección de Opciones de Tarjetas -->
    <div class="row">
        <!-- Tarjeta GEN CLASSIC -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                <div class="card-body text-center">
                    <h4 class="card-title text-primary fw-bold">GEN CLASSIC</h4>
                    <p class="card-text">Acceso de un año a cursos, coaching virtual y más.</p>
                    <a href="{{ url('payment_link_for_gen_classic') }}" class="btn btn-primary w-100">Enlace de Pago</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta GEN VIP -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                <div class="card-body text-center">
                    <h4 class="card-title text-warning fw-bold">GEN VIP</h4>
                    <p class="card-text">Acceso a cursos, eventos en vivo y beneficios exclusivos.</p>
                    <a href="{{ url('payment_link_for_gen_vip') }}" class="btn btn-warning w-100">Enlace de Pago</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta GEN GOLD -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                <div class="card-body text-center">
                    <h4 class="card-title text-warning fw-bold">GEN GOLD</h4>
                    <p class="card-text">Acceso de un año a cursos, coaching virtual y coaching en vivo.</p>
                    <a href="{{ url('payment_link_for_gen_gold') }}" class="btn btn-warning w-100">Enlace de Pago</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta GEN PLATINUM -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                <div class="card-body text-center">
                    <h4 class="card-title text-success fw-bold">GEN PLATINUM</h4>
                    <p class="card-text">Acceso de dos años a cursos, coaching virtual, coaching en vivo y más.</p>
                    <a href="{{ url('payment_link_for_gen_platinum') }}" class="btn btn-success w-100">Enlace de Pago</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
