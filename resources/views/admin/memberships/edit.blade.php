@extends('admin.Master')
@section('title', 'Editar Membresía')

@section('content')
<div class="page-body">
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <h1 class="mb-4">Editar Membresía</h1>

                <!-- Formulario para editar -->
                <form action="{{ route('memberships.update', $membership) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Campo Nombre -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $membership->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Campo Precio -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio</label>
                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ old('price', $membership->price) }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Campo Duración -->
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duración</label>
                        <input type="text" name="duration" class="form-control @error('duration') is-invalid @enderror" id="duration" value="{{ old('duration', $membership->duration) }}">
                        @error('duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Campo Beneficios (with dynamic input) -->
                    <div class="mb-3">
                        <label for="benefits" class="form-label">Beneficios</label>
                        <div id="benefits-container">
                            <div class="benefit-input">
                                <input type="text" name="benefits[]" class="form-control @error('benefits') is-invalid @enderror" value="{{ old('benefits.0', $membership->benefits[0] ?? '') }}">
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary mt-2" id="add-benefit">Añadir beneficio</button>
                        <small class="text-muted">Escribe cada beneficio en un campo y haz clic en "Añadir beneficio" para agregar más.</small>
                        @error('benefits')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Campo Color Destacado -->
                    <div class="mb-3">
                        <label for="highlight_color" class="form-label">Color Destacado</label>
                        <input type="color" name="highlight_color" class="form-control @error('highlight_color') is-invalid @enderror" id="highlight_color" value="{{ old('highlight_color', $membership->highlight_color) }}">
                        @error('highlight_color')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Botones de acción -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="{{ route('memberships.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('add-benefit').addEventListener('click', function() {
        var benefitsContainer = document.getElementById('benefits-container');
        var benefitInput = document.createElement('div');
        benefitInput.classList.add('benefit-input');
        benefitInput.innerHTML = '<input type="text" name="benefits[]" class="form-control mt-2">';
        benefitsContainer.appendChild(benefitInput);
    });
</script>

@endsection
