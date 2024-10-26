@extends('admin.Master')
@section('title')
Editar banner
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
                    <h4 class="text-center">Editar banner</h4>

                    <!-- Form to edit an existing banner -->
                    <form action="{{ route('admin.banners.update', $banner->id) }}" class="theme-form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="title1">Título 1:</label>
                                <input type="text" class="form-control" name="title1" value="{{ old('title1', $banner->title1) }}">
                                <span class="text-danger">@error('title1'){{ $message }}@enderror</span>

                                <label for="title2">Título 2:</label>
                                <input type="text" class="form-control" name="title2" value="{{ old('title2', $banner->title2) }}">
                                <span class="text-danger">@error('title2'){{ $message }}@enderror</span>

                                <label for="title3">Título 3:</label>
                                <input type="text" class="form-control" name="title3" value="{{ old('title3', $banner->title3) }}">
                                <span class="text-danger">@error('title3'){{ $message }}@enderror</span>


 <label for="title3">Botón:</label>
                <input type="text" class="form-control" name="button" value="{{ old('button',$banner->button) }}" placeholder="">
                <span class="text-danger">@error('button'){{ $message }}@enderror</span>
                <label for="title3">Enlace de botón:</label>
                <input type="text" class="form-control" name="link" value="{{ old('link',$banner->link) }}" placeholder="">

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

                                    // Set preview if there's an existing image
                                    window.onload = function() {
                                        var preview = document.getElementById('preview');
                                        var existingImage = "{{ asset($banner->image) }}";
                                        preview.src = existingImage;
                                        preview.style.display = 'block';
                                    }
                                </script>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('Screenshot (317).png') }}" width="300px">
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Actualizar banner</button>
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
