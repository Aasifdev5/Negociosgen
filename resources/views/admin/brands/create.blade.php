@extends('admin.Master')
@section('title')
    Agregar nueva marca
@endsection
@section('content')
    <!-- Page content area start -->
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- sign up page start-->
            <div class="auth-bg-video">

                <div class="authentication-box" style="width: 1080px;">
                    <div class="text-center"><img src="assets/images/endless-logo.png" alt=""></div>
                    <div class="card mt-4 p-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-vertical__item bg-style">
                                    <div class="item-top mb-30">
                                        <h2>{{ __('Agregar nueva marca') }}</h2>
                                    </div>
                                    <form id="Form" action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <!-- Name Input -->
                                        <div class="input__group mb-25">
                                            <label for="name"> {{ __('Nombre') }} </label>
                                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                                class="form-control flat-input" placeholder="{{ __('Nombre') }}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>

                                        <!-- Grand Image Input -->
                                        <div class="input__group mb-25">
                                            <label for="thumbnail"> {{ __('Grand Image') }} </label>
                                            <input type="file" name="thumbnail" id="thumbnail"
                                                class="form-control flat-input" accept="image/*" onchange="previewImage()">
                                            @if ($errors->has('thumbnail'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('thumbnail') }}</span>
                                            @endif
                                        </div>

                                        <!-- Image Preview -->
                                        <div class="input__group mb-25">
                                            <label> {{ __('Image Preview') }} </label>
                                            <div id="imagePreview" style="max-width: 100%; height: auto;">
                                                <img id="preview" src="#" alt="Image Preview" style="display: none; width: 100%; max-height: 300px; object-fit: contain;">
                                            </div>
                                        </div>

                                        <!-- Address Input -->
                                        <div class="input__group mb-25">
                                            <label for="address"> {{ __('Address') }} </label>
                                            <textarea name="address" id="address"
                                                class="form-control flat-input" placeholder="{{ __('Address') }}">{{ old('address') }}</textarea>
                                            @if ($errors->has('address'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i>
                                                    {{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
<br>
                                        <!-- Submit Button -->
                                        <div class="input__group mb-25">
                                            <button class="btn btn-primary" type="submit">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content area end -->

    <script>
        // Image preview function
        function previewImage() {
            const file = document.getElementById('thumbnail').files[0];
            const reader = new FileReader();
            const preview = document.getElementById('preview');

            if (file) {
                reader.readAsDataURL(file);
                reader.onload = function() {
                    preview.src = reader.result;
                    preview.style.display = "block";
                }
            } else {
                preview.src = "#";
                preview.style.display = "none";
            }
        }

        // Form submission via AJAX
        $('#Form').submit(function(e) {
            e.preventDefault();

            let formData = new FormData(this); // Create FormData object

            $.ajax({
                type: "POST",
                url: "{{ route('brands.store') }}",
                data: formData,
                dataType: "json",
                contentType: false, // Set contentType to false for file uploads
                processData: false, // Set processData to false to prevent jQuery from automatically transforming the data
                success: function(response) {
                    if (response.success) {
                        toastr.success("Marca creada con éxito.", "", {
                            onHidden: function() {
                                window.location.href = "{{ route('brands.index') }}";
                            }
                        });
                    } else {
                        toastr.error("No se pudo crear la marca.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    toastr.error("No se pudo crear la marca. Por favor, inténtelo de nuevo más tarde.");
                }
            });
        });
    </script>
@endsection
