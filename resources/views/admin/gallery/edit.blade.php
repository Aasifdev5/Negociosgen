@extends('admin.Master')

@section('title')
    Editar Medio
@endsection

@section('content')
<div class="page-body" style="background: #000; padding: 20px;">
    <div class="container">
        <div class="card" style="background: #fff; border-radius: 10px;">
            <div class="card-body">
                <h1 class="text-center mb-4">Editar Medio</h1>

                <form id="Form" action="{{ route('gallery.update', $media->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title" class="font-weight-bold">Título</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $media->title }}" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="thumbnail" class="font-weight-bold">Miniatura</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                        <small class="form-text text-muted">Elige una nueva imagen para la miniatura (opcional).</small>
                    </div>

                    <div class="form-group mt-3">
                        <label class="font-weight-bold">Vista Previa de la Imagen</label>
                        <div class="text-center">
                            <img id="thumbnail-preview" src="{{ asset($media->thumbnail) }}" alt="Vista Previa de la Imagen" class="img-fluid" style="max-width: 200px; display: {{ $media->thumbnail ? 'block' : 'none' }};">
                        </div>
                    </div>

                    <br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Actualizar Medio</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#thumbnail').change(function(event) {
            let reader = new FileReader();
            reader.onload = function() {
                $('#thumbnail-preview').attr('src', reader.result).show();
            };
            reader.readAsDataURL(event.target.files[0]);
        });

        $('#Form').submit(function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: "{{ route('gallery.update', $media->id) }}",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        toastr.success("Medio actualizado con éxito.", "", {
                            onHidden: function() {
                                window.location.href = "{{ route('gallery.index') }}";
                            }
                        });
                    } else {
                        toastr.error("No se pudo actualizar el medio.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    let errors = xhr.responseJSON.errors;
                    for (let key in errors) {
                        toastr.error(errors[key][0]);
                    }
                    toastr.error("No se pudo actualizar el medio. Por favor, inténtelo de nuevo más tarde.");
                }
            });
        });
    });
</script>

@endsection
