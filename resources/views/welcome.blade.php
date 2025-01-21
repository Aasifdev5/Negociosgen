@extends('master')
@section('title')
{{ __('Bienvenida') }}
@endsection
@section('content')

<section style="padding: 80px 0; background: #000;">
    <div class="container">
        <!-- Success and Fail Messages -->
        @if(Session::has('success'))
        <div class="alert alert-success text-center">
            <p>{{ Session::get('success') }}</p>
        </div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger text-center">
            <p>{{ Session::get('fail') }}</p>
        </div>
        @endif

        <!-- Welcome and Benefits Section -->
        <div class="card text-light p-4 border-0 rounded-4 " style=" background: #000;">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12 text-center mb-4">
                    <h4 class="text-light">
                        @if ($user_session)
                            {{ $user_session->name }},
                        @endif
                        {{ __('Bienvenido a la plataforma') }}
                    </h4>
                    <img
              class="img-fluid my-3"
              src="{{ asset('assets/Rectangle 175.png') }}"
              alt="Welcome Image"
            />
            <div class="d-grid gap-2 mt-4">
                        <a href="{{ url('dashboard') }}" class="btn btn-primary btn-lg">
                            {{ __('Empezar') }}
                        </a>
                    </div>
                    <br>
                    <h2 class="text-center mb-4">{{ __('Beneficios de Ser Miembro de GEN') }}</h2>

                    <div class="row gy-4">
                        @foreach([
                            ['title' => 'Educación Financiera Avanzada', 'description' => 'Aprende sobre educación financiera y profundiza tus conocimientos para tomar mejores decisiones económicas.'],
                            ['title' => 'Desarrollo Personal Integral', 'description' => 'Mejora a nivel intelectual, espiritual y humano, alcanzando un crecimiento integral.'],
                            ['title' => 'Incremento de Ingresos', 'description' => 'Mejora tu economía generando ingresos extra de manera sostenible.'],
                            ['title' => 'Premios por Logros', 'description' => 'Gana fabulosos premios al cumplir metas en la construcción de tu red de referidos.'],
                            ['title' => 'Emprendimiento Propio', 'description' => 'Emprende y construye tu propio negocio al dedicarte a expandir tu red.'],
                            ['title' => 'Impacto Positivo en tu Entorno', 'description' => 'Ayuda a amigos, familiares y conocidos a mejorar su economía y su calidad de vida.'],
                            ['title' => 'Educación Financiera para tus Hijos', 'description' => 'Enseña a tus hijos sobre finanzas para que logren libertad económica en el futuro.'],
                            ['title' => 'Formación Continua', 'description' => 'Participa en entrenamientos, charlas y cursos con estrategias para mejorar tu vida personal y económica.'],
                            ['title' => 'Eventos Exclusivos', 'description' => 'Accede a eventos mensuales locales, eventos semestrales nacionales y eventos anuales internacionales.'],
                            ['title' => 'Planificación de tu Libertad Financiera', 'description' => 'Empieza a trazar tu camino hacia la independencia económica.'],
                            ['title' => 'Ingresos Mientras Viajas', 'description' => 'Gana dinero trabajando desde cualquier lugar del mundo.'],
                            ['title' => 'Apoyo a Obras Sociales', 'description' => 'Contribuye indirectamente a causas sociales que benefician a niños, ancianos, enfermos, sectores vulnerables y animales.'],
                            ['title' => 'Descuentos Exclusivos', 'description' => 'Obtén descuentos en diversas empresas asociadas con GEN a nivel nacional.'],
                        ] as $benefit)
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm h-100 text-light" style=" background: #000;">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">
                                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon"
                                            style="width: 24px; height: 24px;">
                                        {{ $benefit['title'] }}
                                    </h5>
                                    <p class="card-text text-white">{{ $benefit['description'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                    <br>
                    <img src="{{ asset('assets/WhatsApp Image 2025-01-18 at 13.51.34.jpeg') }}" alt="WhatsApp Image 2025-01-18 at 13.51.34.jpeg" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
