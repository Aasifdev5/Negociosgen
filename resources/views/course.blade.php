@extends('master')
@section('title')
    {{ __('Cursos') }}
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
                        {{ __('Descubre nuestro nuevo curso diseñado para potenciar tus habilidades mentales. Aprende técnicas innovadoras para mejorar tu concentración, memoria y creatividad. ¡Inscríbete ahora y comienza a entrenar tu mente!') }}
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
                    <img class="img-fluid rounded-3" src="{{ asset('assets/image (3).png') }}" alt="Placeholder Image"
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
                        {{ $success_tips->title }}
                    </h2>
                    <p
                        style="color: #A1A1A1; font-size: 16px; font-family: Space Grotesk; font-weight: 400; line-height: 24px;">
                        {{ $success_tips->description }}
                    </p>
                </div>




                <!-- Repeat for other columns -->
                <div class="col-lg-6 col-md-12" style="padding-bottom: 10px;">
                    <div class="video-container">
                        <div class="gradient-overlay"></div>
                        <img src="{{ asset($success_tips->video_thumbnail) }}" class="thumbnail" alt="Video Thumbnail" />
                        <span class="play-button"><img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" /></span>
                        <div class="embed-responsive" style="display: none;">
                            <video class="embed-responsive-item" controls>
                                <source src="{{ asset($success_tips->video) }}"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <h1
                        style="width: 100%; color: #EDEDED; font-size: 20px; font-family: Space Grotesk; font-weight: 700; word-wrap: break-word;">
                        {{ $success_tips->video_caption }}
                    </h1>
                </div>
            </div>

            <div class="row">
                @foreach ($courses as $row)
                    <div class="col-12">
                        <!-- Coach Intro Section -->
                        <div class="course-intro" style="margin-bottom: 30px;">
                            <div class="video-container" style="position: relative;">
                                <div class="gradient-overlay"></div>
                                <!-- Coach Intro Video Thumbnail -->
                                <img src="{{ asset($row->coach_thumbnail) }}" class="thumbnail img-fluid" alt="Coach Thumbnail" />
                                <!-- Play Button for Intro Video -->
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
                                <!-- Video Embed (hidden initially) -->
                                <div class="embed-responsive" style="display: none;">
                                    <video class="embed-responsive-item" controls>
                                        <source src="{{ asset($row->coach_video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                                </div>
                            </div>
                            <h3 class="mt-3" style="color: #EDEDED;">{{ $row->coach_name }}</h3>
                            <p style="color: #E0E0E0;">Coach</p>
                        </div>

                        <!-- Course Videos Section -->
                        <div class="row">
                            @foreach ($row->courses as $courseItem)
                            <div class="col-lg-3 col-md-6" style="margin-bottom: 20px;">
                                <div class="course-video">
                                    <div class="video-container">
                                        <div class="gradient-overlay"></div>
                                        <!-- Video Thumbnail -->
                                        <img src="{{ asset($courseItem['thumbnail']) }}" class="thumbnail img-fluid" alt="Course Thumbnail" />
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
                                        <!-- Video Embed (hidden initially) -->
                                        <div class="embed-responsive" style="display: none;">
                                            <iframe class="embed-responsive-item"
                                                src="{{ $row->getEmbedUrl($courseItem['video_url']) }}"
                                                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                    <h4 style="color: #EDEDED; margin-top: 10px;">{{ $courseItem['title'] }}</h4>
                                    <p style="color: #E0E0E0;">Coach: {{ $row->coach_name }}</p>
                                </div>
                            </div>
                        @endforeach

                        </div>
                    </div>
                @endforeach
            </div>
            <nav class="pagination justify-content-center">

                @include('admin.pagination', ['paginator' => $courses])
            </nav>
        </div>
    </section>
    <section style="padding: 20px 0; background-color: #000;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 order-2 order-md-1" style="padding-bottom: 10px;">
                    <div class="video-container">
                        <div class="gradient-overlay"></div>
                        <img src="{{ asset($develop_skills->video_thumbnail) }}" class="thumbnail" alt="Video Thumbnail" />
                        <span class="play-button"><img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" /></span>
                        <div class="embed-responsive" style="display: none;">
                            <video class="embed-responsive-item" controls>
                                <source src="{{ asset($develop_skills->video) }}"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <h1
                        style="width: 100%; color: #EDEDED; font-size: 16px; font-family: Space Grotesk; font-weight: 700; word-wrap: break-word;padding-top: 5px;">
                        {{ $develop_skills->video_caption }}
                    </h1>
                </div>

                <div class="col-lg-6 col-md-12 order-1 order-md-2" style="padding-bottom: 10px;">

                    <h1 class="text-center text-md-start"
                        style="width: 100%; color: #EDEDED; font-size: 32px; font-family: Space Grotesk; font-weight: 700; word-wrap: break-word;">
                        {{ $develop_skills->title }}
                    </h1>

                    <p class="text-center text-md-start"
                        style="width: 100%; color: #A1A1A1; font-size: 16px; font-family: 'Space Grotesk', sans-serif; font-weight: 400; line-height: 24px; word-wrap: break-word;">
                        {{ $develop_skills->description }}
                    </p>
                    <a href="{{ url('membership') }}" class="btn btn-primary btn-lg">{{ __('Únete ahora') }}</a>
                </div>



            </div>
            <h1 class="text-white">Consejos de éxito</h1>
        </div>
    </section>


    <section style="padding: 20px 0; background-color: #000; position: relative;">
        <div class="container">


            <div class="row">
                @foreach ($courses as $row)
                    <div class="col-12">
                        <!-- Coach Intro Section -->
                        <div class="course-intro" style="margin-bottom: 30px;">
                            <div class="video-container" style="position: relative;">
                                <div class="gradient-overlay"></div>
                                <!-- Coach Intro Video Thumbnail -->
                                <img src="{{ asset($row->coach_thumbnail) }}" class="thumbnail img-fluid" alt="Coach Thumbnail" />
                                <!-- Play Button for Intro Video -->
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
                                <!-- Video Embed (hidden initially) -->
                                <div class="embed-responsive" style="display: none;">
                                    <video class="embed-responsive-item" controls>
                                        <source src="{{ asset($row->coach_video) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                                </div>
                            </div>
                            <h3 class="mt-3" style="color: #EDEDED;">{{ $row->coach_name }}</h3>
                            <p style="color: #E0E0E0;">Coach</p>
                        </div>

                        <!-- Course Videos Section -->
                        <div class="row">
                            @foreach ($row->courses as $courseItem)
                            <div class="col-lg-3 col-md-6" style="margin-bottom: 20px;">
                                <div class="course-video">
                                    <div class="video-container">
                                        <div class="gradient-overlay"></div>
                                        <!-- Video Thumbnail -->
                                        <img src="{{ asset($courseItem['thumbnail']) }}" class="thumbnail img-fluid" alt="Course Thumbnail" />
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
                                        <!-- Video Embed (hidden initially) -->
                                        <div class="embed-responsive" style="display: none;">
                                            <iframe class="embed-responsive-item"
                                                src="{{ $row->getEmbedUrl($courseItem['video_url']) }}"
                                                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                                            </iframe>
                                        </div>
                                    </div>
                                    <h4 style="color: #EDEDED; margin-top: 10px;">{{ $courseItem['title'] }}</h4>
                                    <p style="color: #E0E0E0;">Coach: {{ $row->coach_name }}</p>
                                </div>
                            </div>
                        @endforeach

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
