@extends('admin.Master')

@section('title')
    Editar Plantilla de Correo
@endsection

@section('content')

<div class="page-body" style="background: #000;">
    <div class="container-fluid">
        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Éxito!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(Session::has('fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>¡Error!</strong> {{ session('fail') }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form id="vironeer-submited-form" action="{{ url('admin/mail-templates/update', $mailTemplate->id) }}" method="POST">
            @csrf
            <div class="card shadow-lg" style="background: #fff;">
                <div class="card-header bg-lg-3 text-white">Editar Plantilla</div>
                <div class="card-body">
                    <div class="row g-3 mb-4">
                        <div class="col-lg-6">
                            <label class="form-label">Alias</label>
                            <input type="text" name="alias" class="form-control" value="{{ old('alias', $mailTemplate->alias) }}" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $mailTemplate->name) }}" required>
                        </div>
                        <div class="{{ $mailTemplate->isDefault() ? 'col-lg-12' : 'col-lg-8' }}">
                            <label class="form-label">Sujeto</label>
                            <input type="text" name="subject" class="form-control" value="{{ old('subject', $mailTemplate->subject) }}" required>
                        </div>
                        @if (!$mailTemplate->isDefault())
                            <div class="col-lg-4">
                                <label class="form-label">Estado</label>
                                <input type="checkbox" name="status" data-toggle="toggle" {{ $mailTemplate->status ? 'checked' : '' }}>
                                <span class="text-muted">Activar esta opción para que la plantilla esté activa por defecto</span>
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cuerpo</label>
                        <textarea name="body" class="summernote">{{ old('body', $mailTemplate->body) }}</textarea>
                    </div>
                    <div class="alert alert-secondary mb-0">
                        <p class="mb-0"><strong>Códigos Cortos Disponibles</strong></p>
                        <ul>

                        </ul>
                    </div>
                    <br>
                    <div class="row g-2">
                        <div class="col-sm-4">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-save"></i> Actualizar
                            </button>
                            <a href="{{ url('admin/mail-templates') }}" class="btn btn-secondary ms-2">
                                <i class="fa fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Container-fluid Ends -->
@endsection
