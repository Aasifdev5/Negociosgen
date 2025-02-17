@extends('master')
@section('title')
{{ __('Quiénes Somos') }}
@endsection
@section('content')
@php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
    @endphp


    <section style="padding: 20px 0;background: #000;">
<div class="container py-5 ">
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
    <!-- Who We Are Section -->
    <div class="text-center pt-5 mb-5">
        <img src="<?php echo '/' . $general_setting['app_footer_payment_image'] ?? ''; ?>" alt="GEN Logo" class="img-fluid mb-3" width="200px" height="200px" style="max-width: 200px;">
        <h1 class="fw-bold text-light">{{ __('Quiénes Somos') }}</h1>
        <p class="lead" style="color: #A1A1A1;">
            {{ __('GEN, Grupo Empresarial Especializado, es una empresa dedicada a la educación financiera, motivación y crecimiento personal. Nuestro compromiso es ofrecer servicios de alto valor, ayudando a las personas a alcanzar sus metas y transformar sus vidas.Con un enfoque en resultados tangibles, estamos aquí para guiarte hacia la libertad mental, física, espiritual y financiera.') }}
        </p>
    </div>

    <!-- Mission Section -->
    <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="text-light fw-bold">{{ __('Misión') }}</h2>
            <p style="color: #A1A1A1;">
                {{ __('En un mundo complejo, nuestro objetivo es guiar a las personas fuera de su zona de confort, impulsándolas hacia el crecimiento personal y fomentando cambios de mentalidad positiva para crecer como personas, desarrollar hábitos constructivos y crear una comunidad libre y próspera.') }}
            </p>
            <p style="color: #A1A1A1;">
                {{ __('Lo hacemos a través de cursos, conferencias, coaching y entrenamientos. Además, ofrecemos la oportunidad de generar una fuente de ingresos sólida, permitiendo que las personas logren sus metas y prosperen en diversas áreas de la vida. Nuestra misión es transformar vidas e inspirar cambios positivos en nuestra sociedad.') }}
            </p>
        </div>
    </div>

    <!-- Vision Section -->
    <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="text-light fw-bold">{{ __('Visión') }}</h2>
            <p style="color: #A1A1A1;">
                {{ __('Inspirar, educar y promover el cambio social, mejorando la calidad de vida de innumerables familias.') }}
            </p>
        </div>
    </div>

    <!-- Values Section -->
    <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="text-light fw-bold">{{ __('Valores') }}</h2>
            <p style="color: #A1A1A1;">
                {{ __('Compromiso, cooperación, motivación y responsabilidad social.') }}
            </p>
        </div>
    </div>

    <!-- Social Responsibility Section -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-6">
            <h2 class="text-light fw-bold">{{ __('Responsabilidad Social') }}</h2>
            <p style="color: #A1A1A1;">
                <i class="bi bi-heart-fill text-danger"></i> {{ __('Parte de las ganancias de GEN se donarán trimestralmente a diversas organizaciones, proyectos sociales y áreas necesitadas dentro de nuestra sociedad.') }}
            </p>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset('assets/WhatsApp Image 2025-01-18 at 13.39.00.jpeg') }}" alt="WhatsApp Image 2025-01-18" class="img-fluid">
        </div>


    </div>

    <!-- Call to Action -->
    <div class="text-center">
        <p class="lead" style="color: #A1A1A1;">{{ __('Únete a este proyecto transformador de vida, abriendo el camino hacia la libertad financiera y ayudando a construir un mundo mejor.') }}</p>
        <a href="{{ url('membership') }}" class="btn btn-primary btn-lg">{{ __('Únete ahora') }}</a>
    </div>
</div>
    </section>
@endsection
