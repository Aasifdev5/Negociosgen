@extends('admin.Master')
@section('title')
    Editar Audiolibro
@endsection
@section('content')
    <div class="page-body">
        <br>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <!-- Title of the page -->
                    <h1 class="text-center">{{ isset($audiobook) ? 'Editar Audiolibro' : '' }}</h1>

                    <!-- Form to edit audiobook -->
                    @if (isset($audiobook))
                        <form action="{{ route('audiolibros.update', $audiobook->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="audio_id" value="{{ $audiobook->id }}">
                            <div class="mb-3">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                                    value="{{ old('title', $audiobook->title) }}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Autor</label>
                                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author"
                                    value="{{ old('author', $audiobook->author) }}">
                                @error('author')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="audio_file" class="form-label">Archivo de audio</label>
                                <input type="file" class="form-control @error('audio_file') is-invalid @enderror" id="audio_file" name="audio_file">
                                @if (isset($audiobook) && $audiobook->audio_file_path)
                                    <p>Archivo actual: {{ basename($audiobook->audio_file_path) }}</p>
                                @endif
                                @error('audio_file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Miniatura</label>
                                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail">
                                @if (isset($audiobook) && $audiobook->thumbnail)
                                    <img src="{{ asset($audiobook->thumbnail) }}" alt="Miniatura actual" width="100">
                                @endif
                                @error('thumbnail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="audiobook_url" class="form-label">URL del Audiolibro</label>
                                <input type="url" class="form-control @error('audiobook_url') is-invalid @enderror" id="audiobook_url" name="audiobook_url"
                                    value="{{ old('audiobook_url', $audiobook->audiobook_url) }}" placeholder="https://example.com/audiobook">
                                @error('audiobook_url')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </form>
                    @else
                        <p>No se encontró el audiolibro para editar.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
