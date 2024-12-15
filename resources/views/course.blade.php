@extends('master')
@section('title')
    {{ __('Cursos') }}
@endsection
@section('content')

    <div class="container-fluid custom-bg w-100">
        <div class="container my-5">
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
            <div class="row">
                <!-- Text Column -->
                <div class="col-lg-6 col-md-12 order-2 order-md-1">
                    <h2 class="text-center text-md-start"
                        style="
                position: relative;
                font-size: 33px;
                letter-spacing: -0.02em;
                display: inline-block;
                font-family: 'Space Grotesk', sans-serif;
                font-weight: 700;
                color: #fff;">
                        {{ __('Curso nuevo para') }} <br>{{ __('habilidades de la mente') }}
                    </h2>


                    <p class="text-center text-md-start"
                        style="
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 400;
            line-height: 28px;
            color: #A1A1A1;">
                       {{ __(' Descubre nuestro nuevo curso diseñado para potenciar tus habilidades mentales. Aprende técnicas
                        innovadoras para mejorar tu concentración, memoria y creatividad. ¡Inscríbete ahora y comienza a
                        entrenar tu mente!')}}
                    </p>

                    <button class="btn btn-sm btn-primary"
                        style="
        padding: 16px 24px;
        border-radius: 6px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        font-size: 22px;
        letter-spacing: -0.02em;
        font-family: 'Space Grotesk', sans-serif;
        color: white;
        text-transform: uppercase; /* Optional: To make the text uppercase */
    ">
                        <span style="font-weight: 700;">
                            {{ __('¡Únete a GEN y comienza hoy!') }}
                        </span>
                    </button>

                </div>

                <!-- Image Column -->
                <div class="col-lg-6 col-md-12 order-1 order-md-2">
                    <img class="img-fluid rounded-3" src="{{asset('assets/image (3).png')}}" alt="Placeholder Image"
                        style="padding-top: 20px;" />
                </div>
            </div>
        </div>
    </div>


    <section style="padding: 20px 0; background: #000;">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-12 text-center text-md-start" style="padding-bottom: 10px;">
                    <h2 class="mb-4" style="color: #EDEDED; font-family: Space Grotesk; font-weight: 700;">
                        {{ __('Consejos de Éxito: Sabiduría de Empresarios y Emprendedores') }}
                    </h2>
                    <p
                        style="color: #A1A1A1; font-size: 16px; font-family: Space Grotesk; font-weight: 400; line-height: 24px;">
                        {{ __('En esta sección, recopilamos valiosos consejos y experiencias de empresarios y emprendedores
                        exitosos que han recorrido el camino del emprendimiento. Aprende de sus triunfos y fracasos para
                        aplicarlos en tu propio viaje, y descubre las claves para superar desafíos, fomentar la innovación y
                        alcanzar el éxito en tu negocio.')}}
                    </p>
                </div>




                <!-- Repeat for other columns -->
                <div class="col-lg-6 col-md-12" style="padding-bottom: 10px;">
                    <div class="video-container">
                        <div class="gradient-overlay"></div>
                        <img src="{{asset('assets/ap.png')}}" class="thumbnail" alt="Video Thumbnail" />
                        <span class="play-button"><img src="{{asset('assets/Play (1).svg')}}" alt="Play Button" /></span>
                        <div class="embed-responsive" style="display: none;">
                            <video class="embed-responsive-item" controls>
                                <source src="{{ asset('assets/Affiliate Marketing Whiteboard Video.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <h1
                        style="width: 100%; color: #EDEDED; font-size: 20px; font-family: Space Grotesk; font-weight: 700; word-wrap: break-word;">
                        {{ __('Aprende a Gestionar tu Tiempo') }}
                    </h1>
                </div>
            </div>

            <div class="row g-4 mt-4">
                @foreach ($courses as $row) <!-- Use $row to avoid conflict with $course -->
                <div class="col-lg-3 col-md-12" style="margin-bottom: 20px;">
                    <!-- Course Introduction -->
                    <div class="course-intro" style="margin-bottom: 20px;">
                        <div class="video-container">
                            <div class="gradient-overlay"></div>
                            <img src="{{ asset($row->video_thumbnail) }}" class="thumbnail" alt="Course Thumbnail" />
                            @if (!empty($user_session))
                                <span class="play-button">
                                    <img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" />
                                </span>
                            @else
                                <a href="{{ url('Userlogin') }}">
                                    <span class="play-button">
                                        <img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" />
                                    </span>
                                </a>
                            @endif
                            <div class="embed-responsive" style="display: none;">
                                <iframe class="embed-responsive-item"
                                    src="{{ $row->getEmbedUrl($row->video_link) }}"
                                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                        <h3 style="color: #EDEDED; margin-top: 10px;">{{ $row->title }}</h3>
                        <p style="color: #E0E0E0;">Coach: {{ $row->coache }}</p>
                    </div>
                </div>
            @endforeach
            </div>
            <nav class="pagination justify-content-center">

                @include('admin.pagination', ['paginator' => $courses])
            </nav>
        </div>
    </section>
@endsection
