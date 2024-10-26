@extends('admin.Master')
@section('title')
Agregar banner
@endsection
@section('content')
<!-- page-wrapper Start-->
<div class="page-wrapper">
    <div class="container-fluid">
        <!-- sign up page start-->
        <div class="auth-bg-video">

            <div class="authentication-box">
                <div class="text-center"><img src="assets/images/endless-logo.png" alt=""></div>
                <div class="card mt-4 p-4">
    <h4 class="text-center">Agregar banner</h4>

    <!-- Form to create a new banner -->
    <form action="{{ route('admin.banners.store') }}" class="theme-form" method="post" enctype="multipart/form-data">
        @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{ session::get('success') }}</p>
        </div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">
            <p>{{ session::get('fail') }}</p>
        </div>
        @endif
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <label for="title1">Título 1:</label>
                <input type="text" class="form-control" name="title1" value="{{ old('title1') }}" placeholder="Colección 2024">
                <span class="text-danger">@error('title1'){{ $message }}@enderror</span>

                <label for="title2">Título 2:</label>
                <input type="text" class="form-control" name="title2" value="{{ old('title2') }}" placeholder="Ruedas">
                <span class="text-danger">@error('title2'){{ $message }}@enderror</span>

                <label for="title3">Título 3:</label>
                <input type="text" class="form-control" name="title3" value="{{ old('title3') }}" placeholder="Parte del cuerpo">
                <span class="text-danger">@error('title3'){{ $message }}@enderror</span>

 <label for="title3">Botón:</label>
                <input type="text" class="form-control" name="button" value="{{ old('button') }}" placeholder="">
                <span class="text-danger">@error('button'){{ $message }}@enderror</span>
                <label for="title3">Enlace de botón:</label>
                <input type="text" class="form-control" name="link" value="{{ old('link') }}" placeholder="">
                <span>Enlaces disponibles que puedes introducir en la entrada de enlaces
                <p>https://bikebros.net/shop</p>
                <br>
                <p>https://bikebros.net/productbyCategory/7 (Bicicleta)</p>
                <p>https://bikebros.net/productbyCategory/9 (Motocicleta)</p>
                <p>https://bikebros.net/productbyCategory/14 (Shimano)</p>
                <p>https://bikebros.net/productbyCategory/15 (Linea de carga)</p>
                </span>
                <span class="text-danger">@error('link'){{ $message }}@enderror</span>
                <label for="image">Imagen:</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <img id="preview" src="#" alt="Imagen Preview" style="display:none; width: 100%; max-width: 500px; margin-top: 10px;"/>

                <script>
                    document.getElementById('image').addEventListener('change', function(event) {
                        var reader = new FileReader();
                        reader.onload = function() {
                            var preview = document.getElementById('preview');
                            preview.src = reader.result;
                            preview.style.display = 'block';
                        }
                        reader.readAsDataURL(event.target.files[0]);
                    });
                </script>
            </div>
            <div class="col-sm-6">
                <img src="{{ asset('Screenshot (317).png') }}" width="300px">
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-primary btn-sm">Crear banner</button>
    </form>
</div>

            </div>
        </div>
    </div>

    <!-- sign up page ends-->
</div>
</div>
<!-- page-wrapper Ends-->
@endsection
