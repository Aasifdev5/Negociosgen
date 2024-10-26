@extends('admin.Master')
@section('title')
    Galería de Medios
@endsection
@section('content')
<div class="page-body">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="container">
        <h1 class="mb-4">Galería de Medios</h1>
        <div class="d-flex justify-content-between mb-3">
            <div>
                <a href="{{ route('gallery.create') }}" class="btn btn-primary">Agregar Medio</a>
            </div>
            
        </div>

        

        <div id="media-container" class="table-responsive">
            <table id="advance-1" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>URL</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($media as $item)
                        <tr>
                            <td>
                                <a href="{{ asset( $item->thumbnail) }}" data-toggle="lightbox" data-gallery="gallery">
                                    <img src="{{ asset( $item->thumbnail) }}" class="img-thumbnail" alt="{{ $item->title }}" style="width: 100px; height: auto;">
                                </a>
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>
                                <a href="{{ asset( $item->thumbnail) }}" target="_blank">{{ url( $item->thumbnail) }}</a>
                            </td>
                            <td>
                                <a href="{{ asset( $item->thumbnail) }}" class="btn btn-primary btn-sm" target="_blank">Ver</a>
                                <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('gallery.delete', $item->id) }}" method="get" class="d-inline-block" style="display:inline;">
                                    @csrf
                                    
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-4">
            {{ $media->links() }}
        </div>
    </div>
        </div>
        </div>
    
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bs5-lightbox/1.11.0/index.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#search-input').on('input', function() {
            let query = $(this).val().toLowerCase();
            $('table tbody tr').each(function() {
                let title = $(this).find('td:eq(1)').text().toLowerCase();
                let url = $(this).find('td:eq(2) a').text().toLowerCase();
                if (title.includes(query) || url.includes(query)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        $('.btn-danger').click(function(e) {
            e.preventDefault(); // Prevenir el envío del formulario por defecto
            let form = $(this).closest('form'); // Obtener el formulario más cercano
            if (confirm('¿Estás seguro de que quieres eliminar este elemento?')) { // Confirmación de eliminación
                form.submit(); // Enviar el formulario
            }
        });
    });
</script>

<style>
    .table-responsive {
        overflow-x: auto; /* Hacer que la tabla sea desplazable en vista móvil */
    }

    .table img {
        width: 100px; /* Tamaño fijo para las imágenes en la tabla */
        height: auto;
    }

    .table .btn {
        margin-right: 5px; /* Espacio entre los botones */
    }

    .table .btn-sm {
        padding: 0.25rem 0.5rem; /* Tamaño pequeño para los botones */
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.2rem;
    }

    .table .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .table .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .table .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>
@endsection
