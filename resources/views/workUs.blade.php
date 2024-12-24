@extends('master')

@section('title')
{{ __('Trabaja con Nosotros') }}
@endsection

@section('content')
@php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
@endphp
<section style="padding: 20px 0;background: #000;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card " style="background: #000">

                    <div class="card-body">
                        <div class="text-center pt-5 mb-5">
                            <img src="<?php echo '/' . $general_setting['app_footer_payment_image'] ?? ''; ?>" alt="GEN Logo" class="img-fluid mb-3" width="200px" height="200px" style="max-width: 200px;">
                            <h1 class="fw-bold text-light">{{ __('Trabaja con Nosotros') }}</h1>
                            <p class="lead" style="color: #A1A1A1;">
                                {{ __('GEN, Grupo Empresarial Especializado, es una compañía dedicada a la educación financiera, motivación y crecimiento personal.Nuestro compromiso es ofrecer servicios de alto valor, ayudando a las personas a alcanzar sus metas y transformar sus vidas. Con un enfoque en resultados tangibles, estamos aquí para guiarte hacia la libertad mental, física, espiritual y financiera.') }}
                            </p>
                        </div>
                        <p class="lead text-center" style="color: #A1A1A1;">
                            <strong>{{ __('¡Explora oportunidades de carrera y desbloquea tu potencial con GEN!') }}</strong>
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="text-light">{{ __('Lo que Ofrecemos') }}</h3>
                                <ul style="color: #A1A1A1;">
                                    <li>{{ __('Oportunidades de marketing multinivel') }}</li>
                                    <li>{{ __('Programas de capacitación y desarrollo integral') }}</li>
                                    <li>{{ __('Beneficios de networking con profesionales de la industria') }}</li>
                                    <li>{{ __('Horarios flexibles y opciones remotas') }}</li>
                                    <li>{{ __('Compensaciones y recompensas atractivas') }}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h3 class="text-light">{{ __('Cómo Comenzar') }}</h3>
                                <p style="color: #A1A1A1;">{{ __('Para unirte a nuestra red y aprovechar estas increíbles oportunidades, sigue estos sencillos pasos:') }}</p>
                                <ol style="color: #A1A1A1;">
                                    <li>{{ __('Completa el formulario de solicitud') }}</li>
                                    <li>{{ __('Asiste a nuestra sesión introductoria') }}</li>
                                    <li>{{ __('¡Empieza tu viaje con GEN!') }}</li>
                                </ol>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ url('membership') }}" class="btn btn-primary btn-lg">{{ __('Únete ahora') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Añadir algo de estilo personalizado para mejorar el diseño -->
    <style>
        .card-header {
            border-bottom: 2px solid #fff;
        }

        .card-body {
            font-size: 1.1rem;
        }

        .card-body ul, .card-body ol {
            font-size: 1rem;
            margin-left: 20px;
        }

        .btn-lg {
            padding: 15px 30px;
            font-size: 1.2rem;
        }

        .lead {
            font-size: 1.25rem;
        }
    </style>
</section>
@endsection
