@extends('admin.Master')

@section('title')
    Agregar Plantilla de Correo
@endsection

@section('content')

<div class="page-body" style="background: #000;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow-lg" style="background: #fff;">
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

                    <form id="vironeer-submited-form" action="{{ url('admin/mail-templates/save') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <div class="row g-3 mb-4">
                                <div class="col-lg-12">
                                    <label class="form-label">Alias</label>
                                    <input type="text" name="alias" class="form-control" placeholder="Ingrese el alias" value="{{ old('alias') }}">
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" name="name" class="form-control" placeholder="Ingrese el nombre" value="{{ old('name') }}">
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Sujeto</label>
                                    <input type="text" name="subject" class="form-control" placeholder="Ingrese el asunto" value="{{ old('subject') }}">
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Cuerpo</label>
                                    <textarea name="body" class="summernote" placeholder="Escriba el contenido aquí">{{ old('body') }}</textarea>
                                </div>
                                <div class="col-lg-12">
                                    <label class="form-label">Estado</label>
                                    <input type="checkbox" name="status" data-toggle="toggle" {{ old('status', 1) ? 'checked' : '' }}>
                                    <span class="text-muted">Activar esta opción para que la plantilla esté activa por defecto</span>
                                </div>
                            </div>
                            <div class="row g-3 mb-4">
                                <div class="col-lg-12">
                                    <label class="form-label">Códigos Cortos (JSON)</label>
                                    <textarea name="shortcodes" class="form-control" placeholder='{"name": "Nombre", "website_name": "Nombre del sitio"}'>{{ old('shortcodes') }}</textarea>

                                    <small class="text-muted">Ingrese los códigos cortos como un objeto JSON.</small>
                                </div>
                            </div>

                            <div class="alert alert-info">
                                <p class="mb-0"><strong>Códigos Cortos Disponibles:</strong></p>
                                <ul>
                                    <li><strong>{{ '{name}' }}</strong> : El nombre del destinatario</li>
                                    <li><strong>{{ '{website_name}' }}</strong> : Nombre de su sitio web</li>
                                    <li><strong>{{ '{link}' }}</strong> : Enlace correspondiente</li>
                                    <li><strong>{{ '{expiry_time}' }}</strong> : Tiempo de expiración del enlace</li>
                                </ul>
                            </div>
                            <div class="row g-2">
                                <div class="col-sm-4 text-end">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-save"></i> Guardar
                                    </button>
                                    <a href="{{ url('admin/mail-templates') }}" class="btn btn-secondary ms-2">
                                        <i class="fa fa-arrow-left"></i> Volver
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends -->
</div>

@endsection
