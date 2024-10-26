@extends('master')
@section('title')
    {{ __('Iniciar Sesión') }}
@endsection
@section('content')
    <section style="padding: 110px 0; background: #1a1a1a;">
        <div class="container">
            <div class="container" style="background: #000;padding: 20px; border: 1px solid #000; border-radius: 16px;">


                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <h2 class="text-center text-light mb-4">Iniciar Sesión</h2>
                        <form action="{{ url('login') }}" method="POST">
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
                                <label for="email" class="form-label text-light text-light">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="ejemplo@gmail.com"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label text-light">Contraseña</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="xxxxxxxxxxxxx" required>
                                    <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                                        <i id="toggleIcon" class="fas fa-eye text-secondary"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3 text-end">
                                <a href="{{ url('forget_password') }}" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                            <div class="mt-3 text-center">
                                <span class="text-light">¿Aún no eres afiliado? </span>
                                <a href="{{ url('signup') }}" class="text-primary">Únete aquí</a>
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
