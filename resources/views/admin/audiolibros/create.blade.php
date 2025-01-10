@extends('admin.Master')
@section('title')
Crear Audiolibro
@endsection
@section('content')
<div class="page-body">
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center text-white">Crear Audiolibro</h1>
                <form action="{{ route('audiolibros.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
                        @error('author')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="audio_file" class="form-label">Archivo de audio</label>
                        <input type="file" class="form-control" id="audio_file" name="audio_file">
                        @error('audio_file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Miniatura</label>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                        @error('thumbnail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="audiobook_url" class="form-label">URL del Audiolibro</label>
                        <input type="url" class="form-control" id="audiobook_url" name="audiobook_url" value="{{ old('audiobook_url') }}" placeholder="https://example.com/audiobook">
                        @error('audiobook_url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
