@extends('admin.Master')
@section('title')
    Editar curso
@endsection

@section('content')
    <!-- Page content area start -->
    <div class="page-wrapper" style="background: #000; margin-top: 80px;">
        <div class="container">
            <div class="card mt-4 p-4" style="background: #fff;">
                <div class="text-center">
                    <img src="assets/images/endless-logo.png" alt="">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-vertical__item bg-style">
                                <div class="item-top mb-30">
                                    <h2>{{ __('Editar curso') }}</h2>
                                </div>
                                <form id="courseForm" method="POST" enctype="multipart/form-data">
                                    @csrf


                                    <div class="upload-img-box mb-25">
                                        <img id="preview" src="{{ asset($course->video_thumbnail) }}" alt="Image Preview" class="img-fluid preview-img" style="max-height: 350px; max-width: 350px; object-fit: contain;">
                                        <input type="file" id="imageUpload" name="video_thumbnail" accept="image/*" onchange="previewImage(event)" style="display: none;">
                                        <div class="upload-img-box-icon" onclick="document.getElementById('imageUpload').click();">
                                            <i class="fa fa-camera"></i>
                                            <p class="m-0">{{ __('Imagen') }}</p>
                                        </div>
                                    </div>

                                    <!-- JavaScript for Image Preview -->
                                    <script>
                                        function previewImage(event) {
                                            const preview = document.getElementById('preview');
                                            const file = event.target.files[0];
                                            const reader = new FileReader();

                                            reader.onload = function(e) {
                                                preview.src = e.target.result;
                                                preview.style.display = 'block'; // Show the preview
                                            };

                                            if (file) {
                                                reader.readAsDataURL(file);
                                            } else {
                                                preview.src = "{{ asset($course->image_path) }}"; // Keep the original image
                                                preview.style.display = 'block'; // Show original if no new file
                                            }
                                        }
                                    </script>

                                    <!-- Course Title -->
                                    <div class="mb-3">
                                        <label for="courseTitle" class="form-label">Título del curso</label>
                                        <input type="text" class="form-control" id="courseTitle" name="title" placeholder="Título" value="{{ old('title', $course->title) }}" required>
                                        <span class="text-danger" id="titleError"></span>
                                    </div>

                                    <!-- Course Description -->
                                    <div class="mb-3">
                                        <label for="courseDescription" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="courseDescription" name="description" placeholder="Escribe la descripción del curso">{{ old('description', $course->description) }}</textarea>
                                        <span class="text-danger" id="descriptionError"></span>
                                    </div>

                                    <!-- Course Price -->
                                    <div class="mb-3">
                                        <label for="coursePrice" class="form-label">Precio</label>
                                        <input type="number" class="form-control" id="coursePrice" name="price" placeholder="$0.00" value="{{ old('price', $course->price) }}" required>
                                        <span class="text-danger" id="priceError"></span>
                                    </div>

                                    <!-- Course Category -->
                                    <div class="mb-3">
                                        <label for="courseCategory" class="form-label">Categoría</label>
                                        <select class="form-select" id="courseCategory" name="category" required>
                                            <option value="">Seleccione una categoría</option>
                                            @foreach ($categories as $row)
                                                <option value="{{ $row->id }}" {{ old('category', $course->category) == $row->id ? 'selected' : '' }}>
                                                    {{ $row->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="categoryError"></span>
                                    </div>

                                    <!-- Video Link -->
                                    <div class="mb-3">
                                        <label for="videoLink" class="form-label">Enlace de video</label>
                                        <input type="url" class="form-control" id="videoLink" name="video_link" placeholder="youtube.com" value="{{ old('video_link', $course->video_link) }}" required>
                                        <span class="text-danger" id="videoLinkError"></span>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Actualizar curso</button>
                                </form>

                                <!-- Include jQuery and SweetAlert -->
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                <script>
                                    $(document).ready(function() {
                                        $('#courseForm').submit(function(e) {
                                            e.preventDefault();

                                            // Clear previous error messages
                                            $('.text-danger').text('');

                                            let formData = new FormData(this);

                                            $.ajax({
                                                type: "POST",
                                                url: "{{ route('curso.update', $course->uuid) }}", // Update URL
                                                data: formData,
                                                contentType: false,
                                                processData: false,
                                                success: function(response) {
                                                    if (response.success) {
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Éxito',
                                                            text: 'Curso actualizado exitosamente.',
                                                        }).then(() => {
                                                            window.location.href = "{{ route('curso.index') }}";
                                                        });
                                                    } else {
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: response.message || 'No se pudo actualizar el curso.',
                                                        });
                                                    }
                                                },
                                                error: function(xhr) {
                                                    let errors = xhr.responseJSON.errors;
                                                    if (errors) {
                                                        // Display validation errors
                                                        if (errors.title) $('#titleError').text(errors.title[0]);
                                                        if (errors.description) $('#descriptionError').text(errors.description[0]);
                                                        if (errors.price) $('#priceError').text(errors.price[0]);
                                                        if (errors.category) $('#categoryError').text(errors.category[0]);
                                                        if (errors.video_link) $('#videoLinkError').text(errors.video_link[0]);
                                                    } else {
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: 'Ocurrió un error. Por favor, inténtelo de nuevo más tarde.',
                                                        });
                                                    }
                                                }
                                            });
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content area end -->
@endsection
