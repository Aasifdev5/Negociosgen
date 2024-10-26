@extends('master')
@section('title')
    {{ __('Registrarse') }}
@endsection
@section('content')
    <section style="padding: 90px 0; background: #1a1a1a;">
        <div class="container">
            <div class="container" style="background: #000;padding: 20px; border: 1px solid #000; border-radius: 16px;">
                <div class="crear-cuenta-wrapper text-center my-4">
                    <h2 class="text-light">Crear cuenta</h2>
                </div>
                <form action="{{ url('reg') }}" method="post">
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
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label text-light">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido" class="form-label text-light">Apellido</label>
                            <input type="text" class="form-control" id="apellido" placeholder="Apellido">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12 mb-3">
                            <label for="email" class="form-label text-light">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="ejemplo@gmail.com">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="carnet" class="form-label text-light">Número de carnet</label>
                            <input type="text" class="form-control" id="carnet" placeholder="Número">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fechaNacimiento" class="form-label text-light">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fechaNacimiento">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12 mb-3">
                            <label for="celular" class="form-label text-light">Celular</label>
                            <input type="text" class="form-control" id="celular" placeholder="+591">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12 mb-3">
                            <label for="pais" class="form-label text-light">País</label>
                            <select class="form-select" id="pais">
                                <option>Seleccionar País</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="direccion" class="form-label text-light">Dirección</label>
                            <input type="text" class="form-control" id="direccion" placeholder="Dirección">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ciudad" class="form-label text-light">Ciudad</label>
                            <select class="form-select" id="ciudad">
                                <option>Seleccionar Ciudad</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="contrasena" class="form-label text-light">Contraseña</label>
                            <input type="password" class="form-control" id="contrasena" placeholder="xxxxxxxxxxxxx">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="confirmContrasena" class="form-label text-light">Repetir Contraseña</label>
                            <input type="password" class="form-control" id="confirmContrasena" placeholder="xxxxxxxxxxxxx">
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="terms">
                        <label class="form-check-label" for="terms">
                            Acepto los <a href="#" class="text-decoration-none">Términos y condiciones</a>
                        </label>
                    </div>

                    <div class="d-grid mb-3">
                        <button class="btn btn-primary">Continuar</button>
                    </div>
                </form>


                <div class="text-center">
                    <span>¿Ya tienes una cuenta? <a href="{{ url('Userlogin') }}" class="text-decoration-none">Inicia sesión
                            ahora</a></span>
                </div>
            </div>
        </div>



    </section>
@endsection
