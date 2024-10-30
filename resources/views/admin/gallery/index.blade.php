@extends('admin.Master')
@section('title')
    Galería de Medios
@endsection

@section('content')
<div class="page-body" style="background: #000">
    <div class="card" style="background: #fff">
        @if(Session::has('success'))
        <div class="alert alert-success">
           <p>{{session::get('success')}}</p>
        </div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">
           <p>{{session::get('fail')}}</p>
        </div>
        @endif
        <div class="card-header">
            <h1 class="mb-4">Galería de Medios</h1>
        </div>
        <div class="card-body">

            <div class="d-flex justify-content-between mb-3">
                <div class="col-sm-12">
                    <a href="{{ route('gallery.create') }}" class="btn btn-primary pull-right">Agregar Medio</a>
                    <button id="bulk-delete" class="btn btn-danger" disabled>
                        <i class="fas fa-trash-alt"></i> Eliminar Seleccionados
                    </button>
                </div>
            </div>

            <div id="media-container" class="table-responsive">
                <table id="advance-1" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" id="select-all">
                            </th>
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
                                    <input type="checkbox" class="media-checkbox" value="{{ $item->id }}">
                                </td>
                                <td>
                                    <a href="{{ asset($item->thumbnail) }}" data-toggle="lightbox" data-gallery="gallery">
                                        <img src="{{ asset($item->thumbnail) }}" class="img-thumbnail" alt="{{ $item->title }}">
                                    </a>
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <a href="{{ asset($item->thumbnail) }}" target="_blank">{{ url($item->thumbnail) }}</a>
                                </td>
                                <td>
                                    <a href="{{ asset($item->thumbnail) }}" class="btn btn-primary btn-sm" target="_blank" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('gallery.delete', $item->id) }}" method="get" class="d-inline-block delete-form" style="display:inline;">
                                        @csrf

                                        <button type="button" class="btn btn-danger btn-sm delete-button" title="Eliminar">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Select all checkboxes
        $('#select-all').click(function() {
            $('.media-checkbox').prop('checked', this.checked);
            toggleBulkDeleteButton();
        });

        // Enable/disable bulk delete button based on checked checkboxes
        $('.media-checkbox').change(function() {
            toggleBulkDeleteButton();
        });

        // Function to toggle the bulk delete button
        function toggleBulkDeleteButton() {
            $('#bulk-delete').prop('disabled', $('.media-checkbox:checked').length === 0);
        }

        // Bulk delete action
        $('#bulk-delete').click(function() {
            const selectedIds = $('.media-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            if (selectedIds.length > 0) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Esta acción eliminará permanentemente los medios seleccionados!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#007bff',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Perform the bulk delete
                        $.ajax({
                            url: "{{ route('gallery.bulk.delete') }}",
                            type: 'POST',
                            data: {
                                ids: selectedIds,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    toastr.success(response.message);
                                    location.reload();
                                } else {
                                    toastr.error(response.message);
                                }
                            },
                            error: function(xhr) {
                                toastr.error('Ocurrió un error al eliminar los medios seleccionados.');
                            }
                        });
                    }
                });
            }
        });

        // Individual delete confirmation
        $('.delete-button').click(function(e) {
            e.preventDefault();
            let form = $(this).closest('form'); // Get the closest form
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción eliminará permanentemente el medio!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#007bff',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if confirmed
                }
            });
        });
    });
</script>

<style>
    .table-responsive {
        overflow-x: auto;
    }

    .table img {
        width: 100px;
        height: auto;
    }

    .table .btn {
        margin-right: 5px;
    }

    .table .btn-sm {
        padding: 0.25rem 0.5rem;
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
