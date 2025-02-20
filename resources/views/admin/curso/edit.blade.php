@extends('admin.Master')
@section('title')
Editar curso
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
                                <h2 class="text-primary">{{ __('Editar curso') }}</h2>
                                <p class="text-muted">Actualiza la información del curso y los archivos necesarios.</p>
                            </div>
                            <form id="courseForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- No need for @method('PUT') -->

                                <!-- Coach Name -->
                                <div class="mb-4">
                                    <label class="form-label text-dark">Nombre del Coach <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="coach_name" class="form-control border-primary"
                                        value="{{ $course->coach_name }}" placeholder="Nombre del coach" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label text-dark">Título del Curso <span class="text-danger">*</span></label>
                                    <input type="text" name="course_title" class="form-control border-primary" value="{{ $course->course_title }}" placeholder="Título del curso" required>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-dark">Descripción del Curso <span class="text-danger">*</span></label>
                                    <textarea name="course_description" class="form-control border-primary" placeholder="Describe brevemente el curso" rows="4" required>{{ $course->course_description }}</textarea>
                                </div>

                                <!-- Coach Intro Video -->
                                <div class="mb-4">
                                    <label class="form-label text-dark">Video Intro del Coach <span
                                            class="text-danger">*</span></label>
                                            <input type="url" name="coach_video" value="{{ $course->coach_video }}" class="form-control border-primary"
                                            >
                                        @if ($course->coach_video && $course->coach_video)
                                        <iframe class="embed-responsive-item"
                                               src="{{ $course->getEmbedUrl($course->coach_video) }}"
                                               frameborder="0" allow="autoplay; encrypted-media"  width="300px" height="300px" allowfullscreen>
                                           </iframe>

                                       @endif
                                </div>

                                <!-- Intro Video Thumbnail -->
                                <div class="mb-4">
                                    <label class="form-label text-dark">Miniatura del Video Intro <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="coach_thumbnail" class="form-control border-primary"
                                        accept="image/*" onchange="previewThumbnail(this)">
                                    <img id="coachThumbnailPreview" src="{{ asset($course->coach_thumbnail) }}"
                                        class="img-thumbnail mt-2" style="max-width: 200px; height: auto;">
                                    <small class="form-text text-muted">Elige una imagen como miniatura del video
                                        introductorio. Deja vacío para mantener la actual.</small>
                                </div>

                                <!-- Cropping Modal -->
                                <div id="cropModal" style="display: none;">
                                    <div>
                                        <h5>Crop the image</h5>
                                        <img id="cropperImage" src="" alt="Image to crop">
                                        <button type="button" id="cropImageBtn">Crop & Save</button>
                                        <button type="button" onclick="closeCropModal()">Close</button>
                                    </div>
                                </div>

                                <!-- Dynamic Section for Editing -->
                               <div id="dynamic-section">
    @if (!empty($course->items) && is_iterable($course->items) && count($course->items) > 0)
        @foreach ($course->items as $item)
            <div class="course-item mb-4 border rounded p-3 bg-light">
                <div class="row">
                    <!-- Thumbnail -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label text-dark">Miniatura <span class="text-danger">*</span></label>
                        <input type="file" name="thumbnails[]" class="form-control border-primary" accept="image/*"
                            onchange="previewThumbnail(this, '#thumbnailPreview{{ $loop->index }}')">
                        <img id="thumbnailPreview{{ $loop->index }}" src="{{ asset($item->thumbnail) }}"
                            class="thumbnail-preview img-thumbnail mt-2" style="max-width: 100%; height: auto;">
                        <small class="form-text text-muted">Elige una imagen como miniatura del curso. Deja vacío para mantener la actual.</small>
                    </div>

                    <!-- Course Title -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label text-dark">Título del curso <span class="text-danger">*</span></label>
                        <input type="text" name="titles[]" class="form-control border-primary" value="{{ $item->title }}"
                            placeholder="Título del curso" required>
                    </div>

                    <!-- Course Description -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label text-dark">Descripción del curso <span class="text-danger">*</span></label>
                        <textarea name="descriptions[]" class="form-control border-primary"
                            placeholder="Breve descripción del curso" rows="2" required>{{ $item->description }}</textarea>
                    </div>

                    <!-- Video URL -->
                    <div class="col-md-3 mb-3">
                        <label class="form-label text-dark">Enlace de video <span class="text-danger">*</span></label>
                        <input type="url" name="video_urls[]" class="form-control border-primary"
                            value="{{ $item->video_url }}" placeholder="youtube.com" required>
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-danger btn-sm remove-course">Eliminar curso</button>
                </div>
            </div>
        @endforeach
    @else
        <!-- Show an empty form if there are no items -->
        <div class="course-item mb-4 border rounded p-3 bg-light">
            <div class="row">
                <!-- Thumbnail -->
                <div class="col-md-3 mb-3">
                    <label class="form-label text-dark">Miniatura <span class="text-danger">*</span></label>
                    <input type="file" name="thumbnails[]" class="form-control border-primary" accept="image/*"
                        onchange="previewThumbnail(this, '#thumbnailPreview0')">
                    <img id="thumbnailPreview0" src=""
                        class="thumbnail-preview img-thumbnail mt-2" style="max-width: 100%; height: auto; display: none;">
                    <small class="form-text text-muted">Elige una imagen como miniatura del curso.</small>
                </div>

                <!-- Course Title -->
                <div class="col-md-3 mb-3">
                    <label class="form-label text-dark">Título del curso <span class="text-danger">*</span></label>
                    <input type="text" name="titles[]" class="form-control border-primary"
                        placeholder="Título del curso" required>
                </div>

                <!-- Course Description -->
                <div class="col-md-3 mb-3">
                    <label class="form-label text-dark">Descripción del curso <span class="text-danger">*</span></label>
                    <textarea name="descriptions[]" class="form-control border-primary"
                        placeholder="Breve descripción del curso" rows="2" required></textarea>
                </div>

                <!-- Video URL -->
                <div class="col-md-3 mb-3">
                    <label class="form-label text-dark">Enlace de video <span class="text-danger">*</span></label>
                    <input type="url" name="video_urls[]" class="form-control border-primary"
                        placeholder="youtube.com" required>
                </div>
            </div>
        </div>
    @endif
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
                                        <i class="fa fa-paper-plane"></i> Actualizar cursos
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
    let cropper;

    // Function to show the preview of the selected image
    function previewThumbnail(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('coachThumbnailPreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    // When user selects an image to crop
    document.querySelector("input[name='coach_thumbnail']").addEventListener("change", function (event) {
        const files = event.target.files;
        if (files && files.length > 0) {
            const reader = new FileReader();
            reader.onload = function (e) {
                // Show cropping modal
                document.getElementById("cropModal").style.display = "block";
                document.getElementById("cropperImage").src = e.target.result;

                // Destroy old cropper instance if it exists
                if (cropper) {
                    cropper.destroy();
                }

                // Initialize Cropper
                cropper = new Cropper(document.getElementById("cropperImage"), {
                    aspectRatio: 546 / 333, // Fixed Aspect Ratio
                    viewMode: 1,
                    autoCropArea: 1
                });
            };
            reader.readAsDataURL(files[0]);
        }
    });

    // When user clicks "Crop & Save"
    document.getElementById("cropImageBtn").addEventListener("click", function () {
        const canvas = cropper.getCroppedCanvas({
            width: 546,
            height: 333
        });

        if (canvas) {
            // Convert cropped image to Data URL and show preview
            const croppedImage = canvas.toDataURL("image/jpeg");
            document.getElementById("coachThumbnailPreview").src = croppedImage;

            // Hide cropping modal
            closeCropModal();
        }
    });

    // Close the crop modal
    function closeCropModal() {
        document.getElementById("cropModal").style.display = "none";
    }
</script>
<script>
    // Function to clone course item
    $('#addMoreCourses').on('click', function () {
        let courseItem = $('.course-item').first().clone();

        // Clear input values and reset textarea
        courseItem.find('input, textarea').val('');
        courseItem.find('.thumbnail-preview').hide(); // Hide thumbnail preview

        $('#dynamic-section').append(courseItem);
    });

    // Remove course item
    $(document).on('click', '.remove-course', function () {
        $(this).closest('.course-item').remove();
    });

    // Function to preview thumbnail
    function previewThumbnail(input, previewSelector) {
        const reader = new FileReader();
        const preview = $(previewSelector);

        reader.onload = function (e) {
            preview.attr('src', e.target.result).show();
        };

        if (input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.hide();
        }
    }

    // AJAX Form Submission
    $('#courseForm').submit(function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        // Check if the cropper has a cropped image to send
        const croppedImage = document.getElementById("coachThumbnailPreview").src;
        if (croppedImage && croppedImage.startsWith("data:image/jpeg;base64")) {
            // Create a new Blob to send the cropped image
            formData.append('coach_thumbnail_cropped', croppedImage);
        }
        $.ajax({
            type: "POST",  // Using POST
            url: "{{ route('curso.update', $course->id) }}",  // Correct route URL
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Cursos actualizados exitosamente.',
                    }).then(() => {
                        window.location.href = "{{ route('curso.index') }}";
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message || 'No se pudieron actualizar los cursos.',
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
