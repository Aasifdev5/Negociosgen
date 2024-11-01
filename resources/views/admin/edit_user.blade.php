@extends('admin.Master')
@section('title')
    {{ __('Editar Tu Perfil') }}
@endsection
@section('content')
    <div class="page-wrapper" style="background: #000;">
        <div class="container" style="margin-top: 100px">
            <div class="card" style="background: #fff;">
                <div class="card-body">
                    <form action="{{ url('admin/update_user') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if (session()->has('success'))
                            <div class="alert alert-success" style="background-color: green;">
                                <p style="color: #fff;">{{ session()->get('success') }}</p>
                            </div>
                        @endif
                        @if (session()->has('fail'))
                            <div class="alert alert-danger" style="background-color: red;">
                                <p style="color: #fff;">{{ session()->get('fail') }}</p>
                            </div>
                        @endif

                        <input type="hidden" name="user_id" value="{{ $userData->id }}">

                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label text-secondary">Nombre</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                   name="first_name" id="nombre" placeholder="Nombre"
                                   value="{{ old('first_name', $userData->name) }}" aria-label="Nombre">
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label text-secondary">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" id="email" placeholder="ejemplo@gmail.com"
                                   value="{{ old('email', $userData->email) }}" aria-label="Email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Número de carnet & Fecha de Nacimiento -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="carnet" class="form-label text-secondary">Número de carnet</label>
                                <input type="text" class="form-control @error('id_number') is-invalid @enderror"
                                       name="id_number" id="carnet" placeholder="Número"
                                       value="{{ old('id_number', $userData->id_number) }}" aria-label="Número de carnet">
                                @error('id_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fechaNacimiento" class="form-label text-secondary">Fecha de Nacimiento</label>
                                <input type="date" name="birth_date"
                                       class="form-control @error('birth_date') is-invalid @enderror" id="fechaNacimiento"
                                       value="{{ old('birth_date', $userData->birth_date) }}"
                                       aria-label="Fecha de nacimiento">
                                @error('birth_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Celular -->
                        <div class="mb-3">
                            <label for="celular" class="form-label text-secondary">Celular</label>
                            <input type="text" class="form-control @error('mobile_number') is-invalid @enderror"
                                   name="mobile_number" id="celular" placeholder="+591"
                                   value="{{ old('mobile_number', $userData->mobile_number) }}" aria-label="Celular">
                            @error('mobile_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- País & Ciudad -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="pais" class="form-label text-secondary">País</label>
                                <select class="form-select text-dark @error('country') is-invalid @enderror" name="country"
                                        id="pais" aria-label="País">
                                    <option value="">Seleccionar País</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old('country', $userData->country) == $country->id ? 'selected' : '' }}>
                                            {{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="ciudad" class="form-label text-secondary">Ciudad</label>
                                <select class="form-select @error('city') is-invalid @enderror" name="city"
                                        id="ciudad" aria-label="Ciudad">
                                    <option value="">Seleccionar Ciudad</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ old('city', $userData->city) == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Profile Photo Upload -->
                        <div class="mb-3">
                            <label for="profile_photo" class="form-label text-secondary">Foto de Perfil</label>
                            <input type="file" name="profile_photo" class="form-control @error('profile_photo') is-invalid @enderror" id="profile_photo">
                            @error('profile_photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Contraseña -->
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="contrasena" class="form-label text-secondary">Contraseña</label>
                                <input type="password" name="password"
                                       class="form-control @error('password') is-invalid @enderror" id="contrasena"
                                       placeholder="Dejar en blanco si no quiere cambiar" aria-label="Contraseña">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="confirmContrasena" class="form-label text-secondary">Repetir
                                    Contraseña</label>
                                <input type="password" name="confirm_password"
                                       class="form-control @error('confirm_password') is-invalid @enderror"
                                       id="confirmContrasena" placeholder="Dejar en blanco si no quiere cambiar"
                                       aria-label="Repetir contraseña">
                                @error('confirm_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="col-sm-6 mb-3">
                            <label class="col-form-label text-secondary">Activo</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="statusYes" name="status"
                                       value="1" {{ old('status', $userData->status) == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="statusYes">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="statusNo" name="status"
                                       value="0" {{ old('status', $userData->status) == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="statusNo">No</label>
                            </div>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
