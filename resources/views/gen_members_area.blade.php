@extends('master')
@section('title')
    {{ __('Área de Miembros GEN') }}
@endsection
@section('content')
<br>

<section class="container-fluid py-5" style="background-color: #000;">
    {{-- Mensajes de Éxito y Error --}}
    @if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger">
        <p>{{ Session::get('fail') }}</p>
    </div>
    @endif

    {{-- Título de la Página --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold text-light">{{ __('Área de Miembros GEN') }}</h2>
        <p class="lead text-light">
            {{ __('¡Bienvenido al Área de Miembros GEN! Aquí puedes acceder a beneficios y recursos exclusivos.') }}
        </p>
    </div>

    {{-- Sección de Beneficios --}}
    <div class="row mb-5">
        <div class="col-md-6 mx-auto">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <i class="fas fa-graduation-cap me-2 text-primary"></i>
                    {{ __('Cursos de educación financiera y recursos de desarrollo personal.') }}
                </li>
                <li class="list-group-item">
                    <i class="fas fa-calendar-alt me-2 text-success"></i>
                    {{ __('Eventos mensuales, nacionales e internacionales.') }}
                </li>
                <li class="list-group-item">
                    <i class="fas fa-percent me-2 text-warning"></i>
                    {{ __('Descuentos en empresas asociadas a GEN.') }}
                </li>
            </ul>
        </div>
    </div>

    {{-- Botones de Acción --}}
    <div class="text-center">
        <a href="{{ url('course') }}" class="btn btn-primary me-2">
            <i class="fas fa-book-open me-1"></i> {{ __('Acceder a Cursos') }}
        </a>
        <a href="{{ url('affiliate_company') }}" class="btn btn-secondary me-2">
            <i class="fas fa-handshake me-1"></i> {{ __('Ver Empresas Asociadas') }}
        </a>
        <a href="{{ url('events') }}" class="btn btn-success">
            <i class="fas fa-calendar me-1"></i> {{ __('Explorar Eventos') }}
        </a>
    </div>
</section>

@endsection
