@extends('admin.Master')
@section('title')
    Agregar Medio
@endsection
@section('content')
<div class="page-body">
    <br>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Agregar Medio</h1>
                <form id="Form" action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Miniatura</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <img id="thumbnail-preview" src="" alt="Vista Previa de la Imagen" style="max-width: 200px; display: none;">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Agregar Medio</button>
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
                url: "{{ route('gallery.store') }}",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        toastr.success("Medio agregado con éxito.", "", {
                            onHidden: function() {
                                window.location.href = "{{ route('gallery.index') }}";
                            }
                        });
                    } else {
                        toastr.error("No se pudo agregar el medio.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    let errors = xhr.responseJSON.errors;
                    for (let key in errors) {
                        toastr.error(errors[key][0]);
                    }
                    toastr.error("No se pudo agregar el medio. Por favor, inténtelo de nuevo más tarde.");
                }
            });
        });
    });
</script>
@endsection
