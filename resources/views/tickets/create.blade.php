@extends('master')
@section('title')
{{ __('Crear Ticket') }}
@endsection

@section('content')
<section style="padding: 90px 0; background: #1a1a1a">
    <div class="container">
        <h3 class="text-white">{{ __('Crear Nuevo Ticket') }}</h3>

        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf

            <!-- Name Field -->
            <div class="form-group">
                <label class="text-white" for="name">{{ __('Tu Nombre') }}</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label class="text-white" for="email">{{ __('Tu Correo Electrónico') }}</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <!-- Subject Field -->
            <div class="form-group">
                <label class="text-white" for="subject">{{ __('Asunto') }}</label>
                <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject') }}" required>
            </div>

            <!-- Status Field (Open/Closed) -->
            <div class="form-group">
                <label class="text-white" for="status">{{ __('Estado') }}</label>
                <select id="status" name="status" class="form-control">
                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>{{ __('Abierto') }}</option>
                    <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>{{ __('Cerrado') }}</option>
                </select>
            </div>

            <!-- Department Dropdown (Optional) -->
            <div class="form-group">
                <label class="text-white" for="department_id">{{ __('Departamento') }}</label>
                <select id="department_id" name="department_id" class="form-control">
                    <option value="">{{ __('Seleccionar Departamento') }}</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Related Service Dropdown (Optional) -->
            <div class="form-group">
                <label class="text-white" for="related_service_id">{{ __('Servicio Relacionado') }}</label>
                <select id="related_service_id" name="related_service_id" class="form-control">
                    <option value="">{{ __('Seleccionar Servicio') }}</option>
                    @foreach($relatedServices as $service)
                        <option value="{{ $service->id }}" {{ old('related_service_id') == $service->id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Priority Dropdown (Optional) -->
            <div class="form-group">
                <label class="text-white" for="priority_id">{{ __('Prioridad') }}</label>
                <select id="priority_id" name="priority_id" class="form-control">
                    <option value="">{{ __('Seleccionar Prioridad') }}</option>
                    @foreach($priorities as $priority)
                        <option value="{{ $priority->id }}" {{ old('priority_id') == $priority->id ? 'selected' : '' }}>
                            {{ $priority->name }}
                        </option>
                    @endforeach
                </select>
            </div>
<br>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">{{ __('Crear Ticket') }}</button>
        </form>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '¡Éxito!',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif
@endsection
