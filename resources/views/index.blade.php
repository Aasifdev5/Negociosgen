@extends('master')
@section('title')
{{ __('Inicio') }}
@endsection
@section('content')

<div class="container-fluid custom-bg w-100">
    <div class="container my-5">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <p>{{ session::get('success') }}</p>
            </div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger">
                <p>{{ session::get('fail') }}</p>
            </div>
        @endif
        <div class="row">
            <!-- Text Column -->
            <div class="col-lg-6 col-md-12 order-2 order-md-1">
                <!-- Pill -->
                <div class="mb-3 d-flex justify-content-md-start justify-content-center order-1 mt-md-0 mt-3">
                    <div class="badge text-dark rounded-pill d-inline-flex align-items-center p-2"
                        style="font-size: 10px; font-family: 'Inter', sans-serif; font-weight: 600;background-color: #0ac7b4;">
                        {{ __('Próximo lanzamiento') }}
                    </div>
                </div>



                <!-- Heading -->
                <h2 class="text-center text-lg-start">
                    <span
                        style="color: #0090FF; font-size: 33px; letter-spacing: -0.02em; display: inline-block; font-family: 'Space Grotesk', sans-serif; font-weight: 700;">
                        {{ __('Libertad financiera y') }} <br> {{ __('crecimiento personal') }} <br>
                    </span>
                    <span
                        style="color: #fff; font-size: 33px; letter-spacing: -0.02em; display: inline-block; font-family: 'Space Grotesk', sans-serif; font-weight: 700;">
                        {{ __('a solo un clic') }}
                    </span>
                </h2>



                <!-- Paragraph -->
                <p class="text-center text-md-start" style="
                    font-family: 'Space Grotesk', sans-serif;
                    font-weight: 400;
                    line-height: 28px;
                    color: #A1A1A1;">
                    {{ __('Únete a nuestro equipo de afiliados, toma nuestros cursos de desarrollo personal y genera ingresos promoviendo conocimiento y transformación.') }}
                </p>

                <!-- Button -->
                <div class="text-center text-lg-start mb-3">
                    <a href="{{ url('membership') }}" class="btn btn-sm btn-primary" style="
    padding: 16px 24px;
    border-radius: 6px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    font-size: 22px;
    letter-spacing: -0.02em;
    font-family: 'Space Grotesk', sans-serif;
    font-weight: 700;
    color: white;
    text-transform: uppercase;">
                        {{ __('Únete ahora') }}
                    </a>
                </div>


            </div>

            <!-- Image Column -->
            <div class="col-lg-6 col-md-12 order-1 order-md-2">
                <div class="video-container">
                    <div class="gradient-overlay"></div>
                    <img src="{{ asset('assets/genfot1.jpg') }}" class="thumbnail" alt="Video Thumbnail" />
                    <span class="play-button"><img src="{{ asset('assets/Play (1).svg') }}" onclick="playVideo(this)" alt="Play Button" /></span>

                    <div class="embed-responsive" style="display: none;">
                        <div style="padding:75% 0 0 0;position:relative;">
                            <iframe
                                src="https://player.vimeo.com/video/1059405483?h=e811b06ef4&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                                frameborder="0"
                                allow="fullscreen; picture-in-picture; clipboard-write; encrypted-media"
                                style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                title="Presentacion GEN oficial"></iframe>
                        </div>
                        <script src="https://player.vimeo.com/api/player.js"></script>
                    </div>
                </div>

            </div>

        </div>


    </div>
</div>
<div class="container-fluid" style="background: #000000; position: relative; padding: 30px 0;margin-top: -10px;">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Title and Description -->
            <div class="col-lg-6 text-center mb-4 mb-lg-0">
                <h1 class="text-light font-weight-bold"
                    style="font-size: 32px; font-family: 'Space Grotesk', sans-serif;">
                    {{ __('Beneficios') }}
                </h1>
                <p class="text-light"
                    style="color: white; font-size: 16px; font-family: 'Space Grotesk', sans-serif; line-height: 24px; max-width: 600px; margin: 0 auto;">
                    {{ __('Además de poder acceder a los cursos y coaching con coaches a nivel mundial, tendrás una oportunidad única de generar ingresos adicionales a través de nuestro sistema de marketing multinivel, y poder disfrutar de descuentos en una amplia variedad de empresas afiliadas a nivel nacional e internacional.') }}
                </p>
            </div>

            <!-- Icons and Benefits Section -->
            <div class="col-lg-10">
                <div class="row justify-content-center">
                    <!-- Benefit 1: Oportunidades de generar ingresos -->
                    <div class="col-6 col-md-3 text-center mb-4">
                        <div class="rounded"
                            style="background: #000000; border: 1px solid #2e2e2e; border-radius: 16px; padding: 30px; position: relative;">
                            <img class="mb-3" style="width: 80px; height: 58px;" src="{{ asset('assets/b1.png') }}"
                                alt="Oportunidades de generar ingresos" />
                            <p class="text-light"
                                style="font-size: 16px; font-family: 'Space Grotesk', sans-serif; line-height: 24px;">
                                {{ __('Oportunidades de generar ingresos') }}
                            </p>
                        </div>
                    </div>

                    <!-- Benefit 2: Desarrollo Personal -->
                    <div class="col-6 col-md-3 text-center mb-4">
                        <div class="rounded"
                            style="background: #000000; border: 1px solid #2e2e2e; border-radius: 16px; padding: 30px; position: relative;">
                            <img class="mb-3" style="width: 80px; height: 80px;" src="{{ asset('assets/b3.png') }}"
                                alt="Desarrollo Personal" />
                            <p class="text-light"
                                style="font-size: 16px; font-family: 'Space Grotesk', sans-serif; line-height: 24px;">
                                {{ __('Desarrollo Personal') }}
                            </p>
                        </div>
                    </div>

                    <!-- Benefit 3: Descuentos en empresas afiliadas -->
                    <div class="col-6 col-md-3 text-center mb-4">
                        <div class="rounded"
                            style="background: #000000; border: 1px solid #2e2e2e; border-radius: 16px; padding: 30px; position: relative;">
                            <img class="mb-3" style="width: 80px; height: 58px;"
                                src="{{ asset('assets/FireShot_Capture_084_-_Compra_en_línea_-_Iconos_gratis_de_comercio_-_www.flaticon.es-removebg-preview.png') }}"
                                alt="Descuentos en empresas afiliadas" />
                            <p class="text-light"
                                style="font-size: 16px; font-family: 'Space Grotesk', sans-serif; line-height: 24px;">
                                {{ __('Descuentos en empresas afiliadas') }}
                            </p>
                        </div>
                    </div>

                    <!-- Benefit 4: Educación Financiera -->
                    <div class="col-6 col-md-3 text-center mb-4">
                        <div class="rounded"
                            style="background: #000000; border: 1px solid #2e2e2e; border-radius: 16px; padding: 30px; position: relative;">
                            <img class="mb-3" style="width: 80px; height: 58px;" src="{{ asset('assets/b4.png') }}"
                                alt="Educación Financiera" />
                            <p class="text-light"
                                style="font-size: 16px; font-family: 'Space Grotesk', sans-serif; line-height: 24px;">
                                {{ __('Educación') }}<br />{{ __('Financiera') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="container-fluid custom-bg w-100" style="padding: 50px 0; background: #000;">
    <div class="container my-5">
        <!-- Title -->
        <h2 class="text-center mb-5"
            style="color: #fff; font-family: 'Space Grotesk', sans-serif; font-size: 36px; font-weight: 700;">
            GEN: {{ __('Generando Valor') }}
        </h2>

        <div class="row align-items-center">
            <!-- Image Column -->
            <div class="col-lg-6 col-md-12 text-center">
                <img class="img-fluid rounded-3" src="{{ asset('assets/UpscaleImage_1_20241027_mano--texto.jpg') }}"
                    alt="Imagen de Mano Abierta" style="width: 100%; max-width: 500px; height: auto;" />
            </div>

            <!-- Text Column -->
            <div class="col-lg-6 col-md-12">
                <ul style="list-style: none; padding: 0;">
                    <!-- List Items -->
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Propósito de Vida') }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Crecimiento Personal') }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Educación Financiera') }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Emprendimiento') }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Salud y Calidad de Vida') }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Familia y Sociedad') }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Espiritualidad') }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Autoimagen') }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Autoconocimiento') }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Inteligencia Emocional') }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Marca Personal') }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Motivación') }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Mentalidad') }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Mindfulness') }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Ley de la Atracción') }}</span>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                            style="width: 24px; height: 24px;" />
                        <span
                            style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Educación Financiera para Niños y Adolescentes') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section style="padding: 20px 0; background-color: #000;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 order-2 order-md-1" style="padding-bottom: 10px;">
                <div class="video-container">
                    <div class="gradient-overlay"></div>
                    <img src="{{ asset('assets/WhatsApp Image 2025-01-18 at 22.37.23.jpeg') }}" class="thumbnail"
                        alt="Video Thumbnail" />
                    <span class="play-button" onclick="playVideo(this)">
                        <img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" />
                    </span>

                    <div class="embed-responsive" style="display: none;">
                        <div style="padding:177.78% 0 0 0;">
                            <iframe
                                src="https://player.vimeo.com/video/1048085044?h=f51662363d&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                                frameborder="0"
                                allow="fullscreen; picture-in-picture; clipboard-write; encrypted-media"
                                style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                title="VIDEO JAVI GEN"></iframe>
                        </div>
                        <script src="https://player.vimeo.com/api/player.js"></script>
                    </div>
                </div>
                <h1
                    style="width: 100%; color: #EDEDED; font-size: 16px; font-family: Space Grotesk; font-weight: 700; word-wrap: break-word;padding-top: 5px;">
                </h1>
            </div>

            <div class="col-lg-6 col-md-12 order-1 order-md-2" style="padding-bottom: 10px;">
                <h1 class="text-center text-md-start"
                    style="width: 100%; color: #EDEDED; font-size: 32px; font-family: Space Grotesk; font-weight: 700; word-wrap: break-word;">
                    {{ __('Desarrolla tus Habilidades: Coaching y Entrenamiento para lograr tu libertad, no sólo financiera.') }}
                </h1>
                <p class="text-center text-md-start"
                    style="width: 100%; color: #A1A1A1; font-size: 16px; font-family: 'Space Grotesk', sans-serif; font-weight: 400; line-height: 24px; word-wrap: break-word;">
                    {{ __('Nuestra sección de Coaching y Cursos está diseñada para empoderarte como persona y como emprendedor a través de programas de formación práctica. Aprende de expertos en marketing, desarrollo personal, finanzas e inteligencia emocional, entre otros, y transforma tus conocimientos en oportunidades de éxito. Únase a nuestra comunidad y comience su viaje hacia el crecimiento hoy. Juntos podemos construir un mundo mejor') }}
                </p>
                <a href="{{ url('membership') }}" class="btn btn-primary btn-lg">{{ __('Únete ahora') }}</a>
            </div>
        </div>
    </div>
</section>

<section style="padding: 20px 0; background-color: #000; position: relative;">
    <div class="container">
        <!-- View All Button -->
        <div class="view-all-btn" style="position: absolute; top: -30px; right: 20px;">
            <a href="{{ url('course') }}" class="btn btn-primary">{{ __('Ver Todos') }}</a>
        </div>

        <div class="row">
            @foreach ($course as $row)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <!-- Coach Intro Section -->
                    <div class="course-intro" style="margin-bottom: 30px; max-width: 265px; text-align: center;">
                        <div class="video-container"
                            style="position: relative; width: 100%; height: 184px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                            <div class="gradient-overlay"></div>
                            <!-- Coach Intro Video Thumbnail -->
                            <img src="{{ asset($row->coach_thumbnail) }}" class="thumbnail img-fluid" alt="Coach Thumbnail"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;" />
                            <!-- Play Button for Intro Video -->
                            <span class="play-button" onclick="playVideo(this)">
                                <img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" />
                            </span>
                            <!-- Video Embed (hidden initially) -->
                            <div class="embed-responsive" style="display: none;">
                                @php
                                    $embedUrl = $row->getEmbedUrl($row->coach_video);
                                @endphp

                                <iframe class="embed-responsive-item" src="{{ $embedUrl }}" frameborder="0"
                                    allow="fullscreen; picture-in-picture; clipboard-write; encrypted-media"
                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                    title="Video Player">
                                </iframe>

                                <script src="https://player.vimeo.com/api/player.js"></script>
                            </div>
                        </div>
                        <h1 class="mt-3 text-center" style="color: #EDEDED;">
                            {{ $row->coach_name }}
                        </h1>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section style="padding: 20px 0; background: #000;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 text-center text-md-start" style="padding-bottom: 10px;">
                <h2 class="mb-4" style="color: #EDEDED; font-family: Space Grotesk; font-weight: 700;">
                    {{ __('Consejos para el éxito: sabiduría de empresarios y emprendedores') }}
                </h2>
                <p
                    style="color: #A1A1A1; font-size: 16px; font-family: Space Grotesk; font-weight: 400; line-height: 24px;">
                    {{ __('En esta sección hemos recopilado valiosos consejos y experiencias de empresarios y dueños de negocios exitosos que han emprendido el camino del emprendimiento. Aprende de sus triunfos y fracasos para aplicarlos a tu propio recorrido y descubrir las claves para superar retos, fomentar la innovación y alcanzar el éxito en tu negocio.') }}
                </p>
            </div>

            <div class="col-lg-6 col-md-12" style="padding-bottom: 10px;">
                <div class="video-container">
                    <div class="gradient-overlay"></div>
                    <img src="{{ asset('assets/WhatsApp Image 2025-02-06 at 23.04.17.jpeg') }}" class="thumbnail"
                        alt="Video Thumbnail" />
                    <span class="play-button" onclick="playVideo(this)">
                        <img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" />
                    </span>
                    <div class="embed-responsive" style="display: none;">
                        <div style="padding:75% 0 0 0;position:relative;">
                            <iframe
                                src="https://player.vimeo.com/video/1053709659?h=edef3ed92f&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                                frameborder="0"
                                allow="fullscreen; picture-in-picture; clipboard-write; encrypted-media"
                                style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                title="Presentacion GEN oficial"></iframe>
                        </div>
                        <script src="https://player.vimeo.com/api/player.js"></script>
                    </div>
                </div>
                <h1
                    style="width: 100%; color: #EDEDED; font-size: 20px; font-family: Space Grotesk; font-weight: 700; word-wrap: break-word;">
                </h1>
            </div>
        </div>

        <!-- View All Button -->
        <div class="view-all-btn" style="position: absolute; top: -30px; right: 20px;">
            <a href="{{ url('course') }}" class="btn btn-primary">{{ __('Ver Todos') }}</a>
        </div>

        <div class="row">
            @foreach ($SuccessTipss as $row)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <!-- Coach Intro Section -->
                    <div class="course-intro" style="margin-bottom: 30px; max-width: 265px; text-align: center;">
                        <div class="video-container"
                            style="position: relative; width: 100%; height: 184px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                            <div class="gradient-overlay"></div>
                            <!-- Coach Intro Video Thumbnail -->
                            <img src="{{ asset($row->coach_thumbnail) }}" class="thumbnail img-fluid" alt="Coach Thumbnail"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;" />
                            <!-- Play Button for Intro Video -->
                            <span class="play-button" onclick="playVideo(this)">
                                <img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" />
                            </span>
                            <!-- Video Embed (hidden initially) -->
                            <div class="embed-responsive" style="display: none;">
                                @php
                                    $embedUrl = $row->getEmbedUrl($row->coach_video);
                                @endphp

                                <iframe class="embed-responsive-item" src="{{ $embedUrl }}" frameborder="0"
                                    allow="fullscreen; picture-in-picture; clipboard-write; encrypted-media"
                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                    title="Video Player">
                                </iframe>

                                <script src="https://player.vimeo.com/api/player.js"></script>
                            </div>
                        </div>
                        <h1 class="mt-3 text-center" style="color: #EDEDED;">
                            {{ $row->coach_name }}
                        </h1>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    function playVideo(button) {
        const videoContainer = button.closest('.video-container');
        const iframe = videoContainer.querySelector('iframe');
        const embedResponsive = videoContainer.querySelector('.embed-responsive');

        // Show the embed-responsive div
        embedResponsive.style.display = 'block';

        // Request full screen for the iframe
        if (iframe.requestFullscreen) {
            iframe.requestFullscreen();
        } else if (iframe.mozRequestFullScreen) { // Firefox
            iframe.mozRequestFullScreen();
        } else if (iframe.webkitRequestFullscreen) { // Chrome, Safari, and Opera
            iframe.webkitRequestFullscreen();
        } else if (iframe.msRequestFullscreen) { // IE/Edge
            iframe.msRequestFullscreen();
        }

        // Play the video using Vimeo Player API
        const player = new Vimeo.Player(iframe);
        player.play().then(() => {
            console.log('Video is playing');
        }).catch((error) => {
            console.error('Error playing video:', error);
        });
    }
</script>


<section style="padding: 20px 0; background: #000000; position: relative;">
    <div class="container">
        <h1 class="text-light">{{ __('Libros que todo emprendedor debería leer') }}:</h1>
        <ul style="list-style: none; padding: 0;">
            <!-- List Items -->
            <li class="mb-3 d-flex align-items-start">
                <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                    style="width: 24px; height: 24px;" />
                <span
                    style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Padre rico, padre pobre (Robert Kiyosaki)') }}</span>
            </li>
            <li class="mb-3 d-flex align-items-start">
                <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                    style="width: 24px; height: 24px;" />
                <span
                    style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('El inversor inteligente (Benjamin Graham)') }}</span>
            </li>
            <li class="mb-3 d-flex align-items-start">
                <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                    style="width: 24px; height: 24px;" />
                <span
                    style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Secretos de una mente millonaria (T. Harv Eker)') }}</span>
            </li>
            <li class="mb-3 d-flex align-items-start">
                <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                    style="width: 24px; height: 24px;" />
                <span
                    style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Piense y hágase rico (Napoleon Hill)') }}</span>
            </li>
            <li class="mb-3 d-flex align-items-start">
                <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                    style="width: 24px; height: 24px;" />
                <span
                    style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('El millonario de la puerta de al lado (Thomas J. Stanley y William D. Danko)') }}</span>
            </li>
            <li class="mb-3 d-flex align-items-start">
                <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                    style="width: 24px; height: 24px;" />
                <span
                    style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Finanzas para niños (Natalia de Santiago)') }}</span>
            </li>
            <li class="mb-3 d-flex align-items-start">
                <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                    style="width: 24px; height: 24px;" />
                <span
                    style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('El hombre mas Rico de Babilonia – George S. Clason') }}</span>
            </li>
            <li class="mb-3 d-flex align-items-start">
                <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                    style="width: 24px; height: 24px;" />
                <span
                    style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('El Poder del Hábito – Charles Duhigg') }}</span>
            </li>
            <li class="mb-3 d-flex align-items-start">
                <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Icono de Check"
                    style="width: 24px; height: 24px;" />
                <span
                    style="color: #fff; font-family: 'Space Grotesk', sans-serif;">{{ __('Independência Financiera – Robert T. Kiyosaki') }}</span>
            </li>

        </ul>
        <!-- View All Button -->
        <div class="view-all-btn" style="position: absolute; top: 10px; right: 20px;">
            <a href="{{ route('audiobook') }}" class="btn btn-primary">{{ __('Ver todo') }}</a>
        </div>

        <h1 style="padding-top: 5px; color: white;">{{ __('Audiobooks y podcasts de crecimiento') }}</h1>

        <div class="row">
            @foreach ($audiobook as $row)
                <div class="col-lg-6 col-md-6 col-12 mb-4">
                    <div style="background: #000; padding: 15px; border: 1px solid #2e2e2e; border-radius: 8px;">
                        <!-- Audiobook Title -->
                        <h3 style="color: white; font-size: 18px; margin-bottom: 10px;">
                            <a href="{{ $row->audiobook_url }}" style="color: #00aced; text-decoration: none;">
                                {{ $row->title }}
                            </a>
                        </h3>

                        <!-- Audiobook Description -->
                        <p style="color: #ccc; font-size: 14px; margin-bottom: 10px;">
                            {{ $row->author }}
                        </p>

                        <!-- Link to More Details -->
                        <a href="{{ $row->audiobook_url }}" class="btn btn-sm btn-secondary">
                            {{ __('Más información') }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<section style="padding: 60px 0; background: #121212; position: relative;">
    <div class="container">
        <!-- Section Header -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 class="text-light fw-bold">{{ __('Noticias') }}</h1>
            <a href="{{ url('news') }}" class="btn btn-outline-light btn-lg px-4">{{ __('Ver todo') }}</a>
        </div>

        <div class="row">
            @forelse ($latest_posts as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card border-0 shadow-lg rounded overflow-hidden h-100 d-flex flex-column">
                        <a href="{{ url('newsDetails/' . $item->id) }}"
                            class="text-decoration-none d-flex flex-column h-100">
                            <!-- Thumbnail Image -->
                            <div class="news-thumbnail" style="height: 250px; overflow: hidden;">
                                <img src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}"
                                    class="card-img-top transition"
                                    style="object-fit: cover; width: 100%; height: 100%; filter: brightness(85%);">
                            </div>

                            <!-- Card Content -->
                            <div class="card-body bg-dark text-light p-4 flex-grow-1 d-flex flex-column">
                                <h5 class="card-title mb-3 fw-bold">{{ $item->title }}</h5>

                                <!-- Ensure content doesn't break HTML -->
                                <p class="card-text mb-3 opacity-75 flex-grow-1">
                                    {!! Str::limit(strip_tags($item->content), 150) !!}
                                </p>

                                <span class="text-primary fw-bold">Leer más
                                    <i class="fa fa-arrow-right"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>

            @empty
                <div class="alert alert-warning text-center w-100">
                    <strong>{{ __('No se encontraron publicaciones de blog.') }}</strong>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CSS Styles for Equal Height & Better Design -->
<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 15px 30px rgba(255, 255, 255, 0.1);
    }

    .news-thumbnail img {
        transition: transform 0.3s ease, filter 0.3s ease;
    }

    .news-thumbnail:hover img {
        transform: scale(1.1);
        filter: brightness(100%);
    }
</style>





<section style="padding: 20px 0; background: #000;">
    <div class="container">
        <div class="row">
            <!-- Column 1: Text Content -->
            <div class="col-lg-6 col-md-12 order-2 order-md-1 text-center text-md-start" style="padding-bottom: 10px;">
                <h2 class="mb-4" style="color: #EDEDED; font-family: Space Grotesk; font-weight: 700;">
                    {{ __('Consigue tu tarjeta GEN') }}
                </h2>


                <!-- List of Features -->
                <div class="mb-3 d-flex align-items-start">
                    <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon"
                        style="width: 24px; height: 24px;">
                    <div class="text-light">
                        {{ __('Las tarjetas GEN ofrecen descuentos y beneficios en decenas de comercios y empresas a nivel nacional e internacional.') }}
                    </div>
                </div>

                <div class="mb-3 d-flex align-items-start">
                    <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon"
                        style="width: 24px; height: 24px;">
                    <div class="text-light">{{ __('No es necesario ser miembro de GEN para comprar su tarjeta.') }}</div>
                </div>

                <div class="mb-4 d-flex align-items-start">
                    <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon"
                        style="width: 24px; height: 24px;">
                    <div class="text-light">
                        {{ __('Y si tienes, por ejemplo, una tarjeta Clásica, puedes subir de nivel pagando la diferencia de valor de la tarjeta deseada.') }}
                    </div>
                </div>
                <!--<div class="mb-4 d-flex align-items-start">-->
                <!--    <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon"-->
                <!--        style="width: 24px; height: 24px;">-->
                <!--    <div class="text-light">-->
                <!--        {{ __('Premios e incentivos para miembros que hagan crecer su red de asociados.') }}</div>-->
                <!--</div>-->

                <!-- Join Button -->
                <div>
                    <!--<a href="{{ url('membership') }}"-->
                    <!--    class="btn btn-primary btn-lg fw-bold">{{ __('Únete ahora') }}</a>-->
                </div>
            </div>

            <!-- Column 2: Video/Image Content -->
            <div class="col-lg-6 col-md-12 order-1 order-md-2" style="padding-bottom: 10px;">
                <div class="video-container">
                    <div class="gradient-overlay"></div>
                    <img src="{{ asset('assets/WhatsApp Image 2025-01-18 at 13.31.56.jpeg') }}" class="thumbnail"
                        alt="Video Thumbnail" />
                    <span class="play-button"><img src="{{ asset('assets/Play (1).svg') }}" onclick="playVideo(this)" alt="Play Button" /></span>

                    <div class="embed-responsive" style="display: none;">
                        <div style="padding:75% 0 0 0;position:relative;">
                            <iframe
                                src="https://player.vimeo.com/video/1059406126?h=9167535ce4&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                                frameborder="0"
                                allow="fullscreen; picture-in-picture; clipboard-write; encrypted-media"
                                style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                title="Presentacion GEN oficial"></iframe>
                        </div>
                        <script src="https://player.vimeo.com/api/player.js"></script>
                    </div>
                </div>

            </div>
        </div>




    </div>
</section>
<section style="background-color: #000;">
    <section class="container py-5" style="background-color: #000;">

        <div class="text-center mb-5">
            <h2 class="fw-bold text-light">{{ __('Tarjetas GEN') }}</h2>
            <p class="lead text-light">
                {{ __('Elige entre las tarjetas GEN CLASSIC, VIP, GOLD o PLATINUM con beneficios únicos.') }}
            </p>

        </div>

        <div class="row">
            <!-- Tarjeta GEN CLASSIC -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                    <div class="card-body text-center">
                        <h4 class="card-title text-primary fw-bold">{{ __('GEN CLASSIC') }}</h4>
                        <p class="card-text">{{ __('Descuentos y Beneficios en Negocios a nivel nacional e internacional') }} <br>100 Bs
                        </p>
                        <a href="{{ url('CardRegister') }}?price=100&title=GEN+CLASSIC"
                            class="btn btn-primary w-100">{{ __('Enlace de Pago') }}</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta GEN VIP -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                    <div class="card-body text-center">
                        <h4 class="card-title text-danger fw-bold">{{ __('GEN VIP') }}</h4>
                        <p class="card-text">{{ __('Descuentos y Beneficios en Negocios a nivel nacional e internacional') }}
                            <br>200 Bs</p>
                        <a href="{{ url('CardRegister') }}?price=200&title=GEN+VIP"
                            class="btn btn-danger w-100">{{ __('Enlace de Pago') }}</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta GEN GOLD -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                    <div class="card-body text-center">
                        <h4 class="card-title text-warning fw-bold">{{ __('GEN GOLD') }}</h4>
                        <p class="card-text">{{ __('Descuentos y Beneficios en Negocios a nivel nacional e internacional') }}
                            <br>300 Bs</p>
                        <a href="{{ url('CardRegister') }}?price=300&title=GEN+GOLD"
                            class="btn btn-warning w-100">{{ __('Enlace de Pago') }}</a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta GEN PLATINUM -->
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                    <div class="card-body text-center">
                        <h4 class="card-title text-success fw-bold">{{ __('GEN PLATINIUM') }}</h4>
                        <p class="card-text">
                            {{ __('Descuentos y Beneficios en Negocios a nivel nacional e internacional') }} <br>400
                            Bs</p>
                        <a href="{{ url('CardRegister') }}?price=400&title=GEN+PLATINIUM"
                            class="btn btn-success w-100">{{ __('Enlace de Pago') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</section>
<section style="padding: 20px 0;background: #000;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 style="padding-top: 5px;color: #ffff;">{{ __('Empresas aliadas') }}</h1>
            <a href="{{ url('affiliate_company') }}" class="btn btn-primary btn-sm pull-right">{{ __('Ver más') }}</a>
        </div>


        <p style="color: #A1A1A1;">
            {{ __('También disfrutarás de descuentos en una amplia variedad de negocios asociados a nivel nacional e internacional.') }}
        </p>
        <div class="row g-4">
            @foreach ($brands as $row)
                <div class="col-lg-4 col-md-4 col-sm-12 text-center p-3">
                    <div style="border: 1px solid #2e2e2e; padding: 10px; border-radius: 12px;">
                        <img class="img-fluid mb-2" src="{{ asset($row->thumbnail) }}" alt="UFC Gym Image"
                            style="max-width: 100px; height: 100px; object-fit: contain;">
                        <div class="fw-bold text-light">{{ $row->name }}</div>
                        <div class="" style="color: #A1A1A1;">({{ $row->address }})</div>
                    </div>
                </div>
            @endforeach

        </div>





    </div>
</section>
<section style="padding: 20px 0;background-color: #000000;">
    <div class="container my-5">
        <h1 class="text-center text-light mb-4">{{ __('Preguntas Frecuentes (FAQ)') }}</h1>
       @php
                $currentLang = session('locale', config('app.locale'));
            @endphp
        @if ($supportQuestions->count())
        @foreach ($supportQuestions as $question)
            <!-- FAQ Item -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="d-flex align-items-center" data-bs-toggle="collapse"
                         data-bs-target="#faq{{ $question->id }}" aria-expanded="false"
                         aria-controls="faq{{ $question->id }}">
                        <div class="flex-grow-1">
                            <b class="fw-bold faq-title">
                                {{ $question->getTranslation('question', $currentLang) ?? 'Question not available' }}
                            </b>
                        </div>
                        <img class="faq-icon ms-auto" src="{{ asset('assets/PlusOutline.svg') }}" alt="Plus Icon"
                             style="filter: brightness(0) invert(1);">
                    </div>
                    <div class="collapse" id="faq{{ $question->id }}">
                        <p class="mt-2 faq-content">
                            {{ $question->getTranslation('answer', $currentLang) ?? 'Answer not available' }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-warning text-center">
            <strong>{{ __('No se encontraron resultados para tu búsqueda.') }}</strong>
        </div>
    @endif
    </div>
</section>
<!-- Sección de Ingreso Adicional -->
<section style="padding: 40px 0; background: #000;">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="text-light fw-bold">{{ __('Ingreso Adicional') }}</h2>
            <p class="lead text-light" style="color: #A1A1A1;">
                {{ __('Descubre cómo puedes generar ingresos adicionales a través de nuestra plataforma, además de varios otros beneficios.¡Únete hoy y comienza a ganar!') }}
            </p>
        </div>

        <!-- Fila para los Iconos de Font Awesome -->
        <div class="row justify-content-center">
            <img src="{{ asset('assets/WhatsApp Image 2025-01-18 at 13.36.34.jpeg') }}" alt="WhatsApp Image 2025-01-18"
                class="img-fluid">
        </div>

    </div>
</section>

<section style="padding: 20px 0;background: #000;">
    <div class="container">
        <div class="container my-5 p-4"
            style="background-color: #0f1c2e; border: 1px solid #2E2E2E; border-radius: 16px;">
            <div class="row">
                <div class="col-12 col-md-8 text-start mb-3 mb-md-0">
                    <h2 class="deseas-obtener-un text-light mb-3">{{ __('¡Deseas obtener un ingreso adicional?') }}
                    </h2>
                    <p class="no-esperes-ms text-light" style="max-width: 600px; color: #A1A1A1;">
                        {{ __(' No esperes más para ser parte de este increíble proyecto. Empieza hoy mismo a transformar tu vida y la de quienes te rodean.') }}
                    </p>
                </div>
                <div class="col-12 col-md-4 text-end d-flex align-items-center justify-content-end">
                    <a href="{{ url('membership') }}" class="btn btn-primary btn-lg">{{ __('Únete ahora') }}</a>
                </div>
            </div>
        </div>
    </div>




</section>
@php
    $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();

@endphp
<section style="padding: 20px 0;background: #000;">
    <div class="container my-5">
        <div class="row">
            <!-- Left Column: Contact Information -->
            <div class="col-lg-6 col-md-12 mb-4">
                <h2 class="text-light mb-4">{{ __('¡Ponte en Contacto!') }}</h2>
                <p class="" style="color: #a1a1a1;">
                    {{ __('Si tienes dudas o simplemente quieres saludarnos, la mejor forma de contactarnos es a través de  nuestro formulario. Nos esforzamos en responder en menos de 48 horas, aunque a veces tardamos un poco más. ¡Gracias por tu paciencia! Leemos cada mensaje y lo dirigimos al equipo adecuado.También puedes visitar nuestra página de Ayuda para respuestas a las preguntas más comunes sobre GEN.') }}
                </p>
                <p class="" style="color: #a1a1a1;">
                    {{ __('Conéctate con nosotros a través de nuestras redes sociales') }}:
                </p>

                <!-- Social Media Icons -->
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="list-item d-flex align-items-center"
                            style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                            <img class="envelopesimple-icon" alt="Email Icon"
                                src="{{ asset('assets/EnvelopeSimple.svg') }}" style="width: 24px; height: 24px;">
                            <div class="correogmailcom ms-2">{{ $general_setting['app_email'] ?? '' }}</div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="list-item d-flex align-items-center"
                            style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                            <img class="envelopesimple-icon" alt="WhatsApp Icon"
                                src="{{ asset('assets/WhatsappLogo.svg') }}" style="width: 24px; height: 24px;">
                            <div class="correogmailcom ms-2">
                                <!-- WhatsApp Icon and Link -->
                                <a href="https://wa.me/59172635801" target="_blank"
                                    style="color: inherit; text-decoration: none; display: flex; align-items: center;">
                                    <span> WhatsApp</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="list-item d-flex align-items-center"
                            style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                            <a href="{{ $general_setting['facebook_url'] ?? '' }}" target="_blank"
                                class="d-flex align-items-center" style="text-decoration: none;">
                                <img class="facebooklogo-icon" alt="Facebook"
                                    src="{{ asset('assets/FacebookLogo.svg') }}" width="35px"
                                    style="margin-right: 8px;">
                                <span class="facebook fw-bold">Facebook</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="list-item d-flex align-items-center"
                            style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                            <a href="{{ $general_setting['instagram_url'] ?? '' }}" target="_blank"
                                class="d-flex align-items-center" style="text-decoration: none;">
                                <img class="atomiconredes" alt="Instagram" src="{{ asset('assets/Instagram.svg') }}"
                                    width="30px" style="margin-right: 8px;">
                                <span class="facebook fw-bold">Instagram</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="list-item d-flex align-items-center"
                            style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                            <a href="{{ $general_setting['youtube_url'] ?? '' }}" target="_blank"
                                class="d-flex align-items-center" style="text-decoration: none; color: inherit;">
                                <i class="fab fa-youtube" style="font-size: 30px; margin-right: 8px; color: #fff;"></i>
                                <span class="facebook fw-bold" style="color: inherit;">YouTube</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="list-item d-flex align-items-center"
                            style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                            <a href="{{ $general_setting['tiktok_url'] ?? '' }}" target="_blank"
                                class="d-flex align-items-center" style="text-decoration: none; color: inherit;">
                                <i class="fab fa-tiktok" style="font-size: 30px; margin-right: 8px; color: #fff;"></i>
                                <span class="facebook fw-bold" style="color: inherit;">TikTok</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Contact Form -->
            <div class="col-lg-6 col-md-12">
                <div class="p-4" style="background-color: #000000; border: 1px solid #2E2E2E; border-radius: 10px;">
                    <h4 class="text-light mb-3">{{ __('Contacta con nosotros') }}</h4>
                    @if (Session::has('flash_message'))
                        <div class="alert alert-success">
                            {{ Session::get('flash_message') }}
                        </div>
                    @endif
                    @if (Session::has('error_flash_message'))
                        <div class="alert alert-danger">
                            {{ Session::get('error_flash_message') }}
                        </div>
                    @endif
                    {!! Form::open(['url' => 'contact_send', 'class' => 'row', 'id' => 'contact_form', 'role' => 'form']) !!}
                    <div class="mb-3">
                        <label for="nombre" class="form-label text-light">{{ __('Nombre') }}</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="nombre" placeholder="Título" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-light">{{ __('Correo electrónico') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" placeholder="ejemplo@gmail.com" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label text-light">{{ __('Número de celular') }}</label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone"
                            id="telefono" placeholder="+591" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="text-light">{{ __('Ciudad') }}</label>
                        <input type="text" name="city" id="city"
                            class="form-control @error('city') is-invalid @enderror" placeholder="Ciudad"
                            value="{{ old('city') }}">
                        @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class=" mb-3">
                        <label class="text-light">{{ __('Asunto') }}</label>
                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Asunto">
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label text-light">{{ __('Descripción') }}</label>
                        <textarea class="form-control" name="message" id="descripcion" rows="3"
                            placeholder="Escribe la descripción opcional"></textarea>
                    </div>
                    <button type="submit" class="btn btn-sm" style="width: 100%;
                            position: relative;
                            border-radius: 6px;
                            background-color: #0090ff;
                            padding: 16px 24px;
                            box-sizing: border-box;
                            text-align: center;
                            font-size: 16px;
                            color: #ededed;
                            font-family: 'Space Grotesk';
                            border: none;
                            transition: background-color 0.3s;">
                        Enviar
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


</section>
@endsection
