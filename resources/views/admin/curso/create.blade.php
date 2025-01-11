@extends('admin.Master')
@section('title')
    Añadir nuevo curso
@endsection

@section('content')
    <div class="page-body" style="background: #f8f9fa; margin-top: 80px;">
        <br>
        <div class="container">
            <div class="card shadow-sm border-0 mt-4 p-4" style="background: #ffffff;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-vertical__item">
                                <div class="item-top mb-30">
                                    <h2 class="text-primary">{{ __('Añadir nuevo curso') }}</h2>
                                    <p class="text-muted">Completa la información del curso y sube los archivos necesarios.</p>
                                </div>
                                <form id="courseForm" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Coach Name -->
                                    <div class="mb-4">
                                        <label class="form-label text-dark">Nombre del Coach <span class="text-danger">*</span></label>
                                        <input type="text" name="coach_name" class="form-control border-primary" placeholder="Nombre del coach" required>
                                    </div>

                                    <!-- Coach Intro Video -->
                                    <div class="mb-4">
                                        <label class="form-label text-dark">Video Intro del Coach <span class="text-danger">*</span></label>
                                        <input type="file" name="coach_video" class="form-control border-primary" accept="video/*" required>
                                        <small class="form-text text-muted">Sube un video introductorio del coach en formato MP4 o AVI.</small>
                                    </div>

                                    <!-- Intro Video Thumbnail -->
                                    <div class="mb-4">
                                        <label class="form-label text-dark">Miniatura del Video Intro <span class="text-danger">*</span></label>
                                        <input type="file" name="coach_thumbnail" class="form-control border-primary" accept="image/*" onchange="previewThumbnail(this, '#coachThumbnailPreview')" required>
                                        <img id="coachThumbnailPreview" src="#" class="img-thumbnail mt-2" style="display: none; max-width: 200px; height: auto;">
                                        <small class="form-text text-muted">Elige una imagen como miniatura del video introductorio.</small>
                                    </div>

                                    <!-- Dynamic Section for Cloning -->
                                    <div id="dynamic-section">
                                        <div class="course-item mb-4 border rounded p-3 bg-light">
                                            <div class="row">
                                                <!-- Thumbnail -->
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label text-dark">Miniatura <span class="text-danger">*</span></label>
                                                    <input type="file" name="thumbnails[]" class="form-control border-primary" accept="image/*" onchange="previewThumbnail(this, '.thumbnail-preview')">
                                                    <img src="#" class="thumbnail-preview img-thumbnail mt-2" style="display: none; max-width: 100%; height: auto;">
                                                    <small class="form-text text-muted">Elige una imagen como miniatura del curso.</small>
                                                </div>

                                                <!-- Course Title -->
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label text-dark">Título del curso <span class="text-danger">*</span></label>
                                                    <input type="text" name="titles[]" class="form-control border-primary" placeholder="Título del curso" required>
                                                </div>

                                                <!-- Video URL -->
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label text-dark">Enlace de video <span class="text-danger">*</span></label>
                                                    <input type="url" name="video_urls[]" class="form-control border-primary" placeholder="youtube.com" required>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-danger btn-sm remove-course">Eliminar curso</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add More Button -->
                                    <div class="text-end mb-4">
                                        <button type="button" class="btn btn-success btn-sm" id="addMoreCourses">
                                            <i class="fa fa-plus-circle"></i> Añadir otro curso
                                        </button>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-paper-plane"></i> Publicar cursos
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and SweetAlert -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Function to clone course item
        $('#addMoreCourses').on('click', function () {
            let courseItem = $('.course-item').first().clone();
            courseItem.find('input').val('');
            courseItem.find('.thumbnail-preview').hide();
            $('#dynamic-section').append(courseItem);
        });

        // Remove course item
        $(document).on('click', '.remove-course', function () {
            $(this).closest('.course-item').remove();
        });

        // Function to preview thumbnail
        $(document).on('change', 'input[name="thumbnails[]"]', function () {
            const reader = new FileReader();
            const preview = $(this).siblings('.thumbnail-preview');

            reader.onload = function (e) {
                preview.attr('src', e.target.result).show();
            };

            if (this.files[0]) {
                reader.readAsDataURL(this.files[0]);
            } else {
                preview.hide();
            }
        });

        // AJAX Form Submission
        $('#courseForm').submit(function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: "{{ route('curso.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'Cursos publicados exitosamente.',
                        }).then(() => {
                            window.location.href = "{{ route('curso.index') }}";
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message || 'No se pudieron publicar los cursos.',
                        });
                    }
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Ocurrió un error. Por favor, inténtelo de nuevo más tarde.',
                    });
                }
            });
        });
    </script>
@endsection
