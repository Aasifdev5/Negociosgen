@extends('admin.Master')
@section('title')
    Agregar tendero
@endsection
@section('content')
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- sign up page start-->
            <div class="auth-bg-video">
                <video id="bgvid" poster="{{ asset('admin/images/coming-soon-bg.jpg') }}" playsinline="" autoplay=""
                    muted="" loop="">
                    <source src="{{ asset('admin/video/auth-bg.mp4') }}" type="video/mp4">
                </video>
                <div class="col-sm-8">
                    <div class="text-center"><img src="assets/images/endless-logo.png" alt=""></div>
                    <div class="card mt-4 p-4">
                        <h4 class="text-center">Agregar tendero</h4>

                        <form class="theme-form" action="{{ url('admin/save_shopkeeper') }}" method="post" enctype="multipart/form-data">
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    <p>{{ session::get('success') }}</p>
                                </div>
                            @endif
                            @if (Session::has('fail'))
                                <div class="alert alert-danger">
                                    <p>{{ session::get('fail') }}</p>
                                </div>
                            @endif
                            @csrf

                            <div class="row g-1">
                                <div class="col-md-12">
                                    <div class="mb-2">

                                        <div class="personal-image">
                                            <label class="label">
                                                <input type="file" name="profile_photo" id="profilePhotoInput"
                                                    onchange="previewImage(this)" />
                                                <figure class="personal-figure">

                                                    <img src="149071.png" class="personal-avatar" alt="avatar"
                                                        id="profileImagePreview">


                                                </figure>
                                            </label>
                                            <p>PNG, JPG, JPEG</p>
                                        </div>
                                        <!-- ... (rest of your form code) ... -->


                                        <script>
                                            function previewImage(input) {
                                                var preview = document.getElementById('profileImagePreview');
                                                var file = input.files[0];
                                                var reader = new FileReader();

                                                reader.onloadend = function() {
                                                    preview.src = reader.result;
                                                }

                                                if (file) {
                                                    reader.readAsDataURL(file);
                                                } else {
                                                    preview.src = "149071.png"; // Default image when no file selected
                                                }
                                            }
                                        </script>
                                        <span class="text-danger">
                                            @error('profile_photo')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-form-label">Nombre completo</label>
                                    <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                                        placeholder="John">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>




                                <div class="col-sm-6">
                                    <label class="col-form-label">Correo electrónico</label>
                                    <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                                <div class="col-sm-6">
                                    <label class="col-form-label">Contraseña</label>
                                    <input class="form-control" type="password" name="password"
                                        value="{{ old('password') }}">
                                    <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>

                                </div>
                                
                               
                                <div class="col-sm-6">
                                    <label class="col-form-label">Activo</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="statusYes" name="status"
                                            value="1" >
                                        <label class="form-check-label" for="statusYes">Sí </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="statusNo" name="status"
                                            value="0" >
                                        <label class="form-check-label" for="statusNo">No</label>
                                    </div>

                                    <span class="text-danger">
                                        @error('status')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                                <div class="row g-2">
                                    <div class="col-sm-4">
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                    </div>

                                </div>
                            </div>
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
