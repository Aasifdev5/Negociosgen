@extends('master')
@section('title')
    {{ __('Iniciar Sesión') }}
@endsection
@section('content')
    <section style="padding: 170px 0; background: #000;">
        <div class="container">
            <div class="container" style="background: #000;padding: 20px; border: 1px solid #000; border-radius: 16px;">


                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <h2 class="text-center text-light mb-4">{{ __('Iniciar Sesión') }}</h2>
                        <form action="{{ url('log') }}" method="POST">
                            @if (Session::has('success'))
                                <div class="alert alert-success" style="background-color: green;">
                                    <p style="color: #fff;">{{ session::get('success') }}</p>
                                </div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger" style="background-color: red;">
                                    <p style="color: #fff;">{{ session::get('fail') }}</p>
                                </div>
                            @endif
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label text-light">{{ __('Correo electrónico') }}</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="ejemplo@gmail.com" required value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label text-light">{{ __('Contraseña') }}</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="contrasena" placeholder="xxxxxxxxxxxxx">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">{{ __('Iniciar Sesión') }}</button>
                            <div class="mt-3 text-center">
                                <span class="text-light">{{ __('¿Aún no eres afiliado?') }} </span>
                                <a href="{{ url('membership') }}" class="text-primary">{{ __('Únete ahora') }}</a>
                            </div>
                        </form>

                    </div>
                </div>
                <br>
<div class="row">
    <h1 class="text-light">Accede a estos cursos y muchos más:</h1>
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
                                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media"
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
        </div>



    </section>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const toggleIcon = document.getElementById("toggleIcon");

            // Toggle the password input type
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>
@endsection
