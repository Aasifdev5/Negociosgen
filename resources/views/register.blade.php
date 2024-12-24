@extends('master')
@section('title')
    {{ __('Registrarse') }}
@endsection
@section('content')
    <section style="padding: 90px 0; background: #000;">
        <div class="container">
            <div class="container" style="background: #000;padding: 20px; border: 1px solid #000; border-radius: 16px;">
                <div class="crear-cuenta-wrapper text-center my-4">
                    <h2 class="text-light">{{ __('Crear cuenta') }}</h2>
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
                    <input type="hidden" name="refer" value="{{ $refer ?? '' }}">
                    <input type="hidden" name="membershipType" value="{{ $membershipType ?? '' }}">
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label text-light">{{ __('Nombre completo') }}</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="nombre" placeholder="Nombre" value="{{ old('first_name') }}">
                            @error('first_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fechaNacimiento" class="form-label text-light">{{ __('Fecha de Nacimiento') }}</label>
                            <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" id="fechaNacimiento" value="{{ old('birth_date') }}">
                            @error('birth_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label text-light">{{ __('Correo electrónico') }}</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="ejemplo@gmail.com" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="celular" class="form-label text-light">{{ __('Celular') }}</label>
                            <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" id="celular" placeholder="+591" value="{{ old('mobile_number') }}">
                            @error('mobile_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>





                    <div class="row mb-3">
                        <div class="col-md-12 mb-3">
                            <label for="pais" class="form-label text-light">{{ __('País') }}</label>
                            <select class="form-select @error('country') is-invalid @enderror" name="country" id="pais">
                                <option value="">Seleccionar País</option>
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}" {{ old('country') == $country->id ? 'selected' : '' }}>{{ $country->country_name }}</option>
                            @endforeach
                            </select>
                            @error('country')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="direccion" class="form-label text-light">{{ __('Dirección') }}</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="direccion" placeholder="Dirección" value="{{ old('address') }}">
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ciudad" class="form-label text-light">{{ __('Ciudad') }}</label>
                            <select class="form-select @error('city') is-invalid @enderror" name="city" id="ciudad">
                                <option value="">Seleccionar {{ __('Ciudad') }}</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @error('city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <label for="contrasena" class="form-label text-light">{{ __('Contraseña') }}</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="contrasena" placeholder="xxxxxxxxxxxxx">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="confirmContrasena" class="form-label text-light">{{ __('Repetir Contraseña') }}</label>
                            <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirmContrasena" placeholder="xxxxxxxxxxxxx">
                            @error('confirm_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input @error('terms') is-invalid @enderror" name="terms" type="checkbox" id="terms">
                        <label class="form-check-label" for="terms">
                            {{ __('Acepto los') }} <a href="#" class="text-decoration-none">{{ __('Términos y condiciones') }}</a>
                        </label>
                        @error('terms')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid mb-3">
                        <button class="btn btn-primary">Continuar</button>
                    </div>
                </form>



                <div class="text-center">
                    <span>{{ __('¿Ya tienes una cuenta?') }} <a href="{{ url('Userlogin') }}" class="text-decoration-none">{{ __('Inicia sesión ahora') }}</a></span>
                </div>
            </div>
        </div>



    </section>
@endsection
