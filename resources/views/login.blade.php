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
                                <label for="contrasena" class="form-label text-light">Contraseña</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="contrasena" placeholder="xxxxxxxxxxxxx">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                            <div class="mt-3 text-center">
                                <span class="text-light">{{ __('¿Aún no eres afiliado?') }} </span>
                                <a href="{{ url('membership') }}" class="text-primary">{{ __('Únete ahora') }}</a>
                            </div>
                        </form>

                    </div>
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
