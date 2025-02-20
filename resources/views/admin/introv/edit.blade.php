@extends('admin.Master')
@section('title')
Editar Vídeo de introducción de éxito
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
                                <h2 class="text-primary">{{ __('Editar Vídeo de introducción de éxito') }}</h2>

                            </div>
                            <form id="courseForm" method="POST" enctype="multipart/form-data">
                                @csrf


                                <!-- Proveedor de Consejos de Éxito -->
                                <div class="mb-4">
                                    <label class="form-label text-dark">Proveedor de Consejos de Éxito <span class="text-danger">*</span></label>
                                    <input type="text" name="coach_name" class="form-control border-primary" value="{{ $Intro->coach_name }}" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label text-dark">Título del Vídeo de introducción <span class="text-danger">*</span></label>
                                    <input type="text" name="course_title" class="form-control border-primary" value="{{ $Intro->course_title }}" required>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-dark">Descripción del Vídeo de introducción <span class="text-danger">*</span></label>
                                    <textarea name="course_description" class="form-control border-primary" rows="4" required>{{ $Intro->course_description }}</textarea>
                                </div>
                                <!-- Video Intro del Coach -->
                                <div class="mb-4">
                                    <label class="form-label text-dark">URL del Vídeo de introducción <span class="text-danger">*</span></label>
                                    <input type="url" name="coach_video" class="form-control border-primary" value="{{ $Intro->coach_video }}" required>
                                    <small class="form-text text-muted">Sube un video introductorio del coach en formato MP4 o AVI.</small>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label text-dark">Miniatura del Video Intro <span class="text-danger">*</span></label>
                                    <input type="file" id="uploadThumbnail" name="coach_thumbnail" class="form-control border-primary" accept="image/*">

                                    <!-- Modal de Recorte -->
                                    <div id="cropModal" style="display: none;">
                                        <div style="max-width: 100%; text-align: center;">
                                            <img id="cropperImage" src="#" style="max-width: 100%;">
                                        </div>
                                        <button id="cropImageBtn" class="btn btn-success mt-3">Recortar y Guardar</button>
                                    </div>

                                    <!-- Vista previa de la imagen recortada -->
                                    <img id="coachThumbnailPreview" src="{{ asset($Intro->coach_thumbnail) }}" class="img-thumbnail mt-2" style="width: 546px; height: 333px;">
                                    <small class="form-text text-muted">Elige una imagen y recórtala antes de subir.</small>
                                </div>

                                <!-- Campo oculto para la imagen recortada (Base64) -->
                                <input type="hidden" id="coach_thumbnail_cropped" name="coach_thumbnail_cropped">

                                <!-- Botón de actualizar -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Actualizar curso
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
            url: "{{ route('intro.update', $Intro->id) }}",  // Correct route URL
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
                        window.location.href = "{{ route('intro.index') }}";
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
