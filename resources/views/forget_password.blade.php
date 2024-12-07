@extends('master')
@section('title')
    {{ __('Recuperar contraseña') }}
@endsection
@section('content')

    <section style="padding: 150px 0; background: #1a1a1a;">
        <div class="container">
            <div class="container" style="background: #000;padding: 20px; border: 1px solid #000; border-radius: 16px;">


                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <h2 class="text-center mb-4 text-light">{{ __('Recuperar contraseña') }}</h2>
                            <form action="{{ url('sendResetPasswordLink') }}" method="post">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                @if (Session::has('fail'))
                                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                @endif
                                @csrf
                                <div class="mb-3">
                                    <label for="emailRecovery" class="form-label text-light">{{ __('Correo electrónico') }}</label>
                                    <input type="email" name="email" class="form-control" id="emailRecovery"
                                        placeholder="ejemplo@gmail.com" required>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Enviar</button>
                                <div class="mt-3 text-center">
                                    <span class="text-light">{{ __('¿Aún no eres afiliado?') }} </span>
                                    <a href="{{ url('Userlogin') }}" class="text-primary">Únete aquí</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>



    </section>
@endsection
