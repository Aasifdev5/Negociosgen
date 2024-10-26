@extends('admin.Master')
@section('title', 'Importación de productos')

@section('content')
<div class="page-body">
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                  @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                <div class="card">
                    <div class="card-header">{{ __('Importación de productos') }}
                        <div class="col-lg-12">
                            <div class="float-right">
                                <a href="{{ route('backend.products') }}" class="btn btn-warning pull-right"><i
                                        class="fa fa-reply"></i> {{ __('Volver a la lista') }}</a>
                                        <a href="{{ route('download.sample.file') }}" class="btn btn-success pull-left">
                                            {{ __('Descargue el archivo de muestra para comprender qué se utilizará en el encabezado o en la primera fila del ARCHIVO EXCEL.') }}
                                        </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="file">Elija el archivo para importar:</label>
                                <input type="file" name="file" class="form-control-file" id="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </div>

                            <button type="submit" class="btn btn-primary">Importar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
