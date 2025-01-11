@extends('admin.Master')

@section('title')
    Cursos
@endsection

@section('content')
    <div class="page-body" style="background: #000">
        <!-- Page content area start -->
        <div class="page-content">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">
                        <p>{{ session('fail') }}</p>
                    </div>
                @endif
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="background: #fff">
                            <div class="card-header">
                                <h2>{{ __('Lista de cursos') }}</h2>
                                <a href="{{ route('curso.create') }}" class="btn btn-success btn-sm pull-right">
                                    <i class="fa fa-plus"></i> {{ __('Añadir curso') }}
                                </a>
                            </div>
                            <div class="card-body">
                                <button id="bulk-delete" class="btn btn-danger mb-3" disabled>
                                    <i class="fas fa-trash-alt"></i> Eliminar Seleccionados
                                </button>
                                <div class="table-responsive">
                                    <table id="advance-1" class="row-border data-table-filter table-style">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="select-all"></th>
                                                <th>Fecha de creación</th>

                                                <th>Coache</th>

                                                <th>Portada</th>
                                                <th>Estado</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courses as $course)
                                                <tr class="removable-item">
                                                    <td><input type="checkbox" class="course-checkbox" value="{{ $course->id }}"></td>
                                                    <td>{{ $course->created_at->format('d/m/Y') }}</td>

                                                    <td>{{ $course->coach_name }}</td>

                                                    <td><img src="{{ asset($course->coach_thumbnail) }}" alt="Portada" class="img-thumbnail" style="width: 50px;"></td>
                                                    <td><span class="badge bg-success">Activo</span></td>
                                                    <td>
                                                        <div class="action__buttons">
                                                            <a href="{{ route('curso.edit', [$course->id]) }}" title="Editar" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" title="Eliminar" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete-course" data-toggle="tooltip" data-url="{{ route('curso.delete', $course->id) }}">
                                                                <i class="fa fa-remove"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content area end -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Select all checkboxes
            $('#select-all').click(function() {
                $('.course-checkbox').prop('checked', this.checked);
                toggleBulkDeleteButton();
            });

            // Enable/disable bulk delete button based on selected checkboxes
            $('.course-checkbox').change(function() {
                toggleBulkDeleteButton();
            });

            // Function to toggle the bulk delete button
            function toggleBulkDeleteButton() {
                $('#bulk-delete').prop('disabled', $('.course-checkbox:checked').length === 0);
            }

            // Bulk delete action
            $('#bulk-delete').click(function() {
                const selectedIds = $('.course-checkbox:checked').map(function() {
                    return $(this).val();
                }).get();

                if (selectedIds.length > 0) {
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡Esta acción eliminará permanentemente los cursos seleccionados!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#dc3545',
                        cancelButtonColor: '#007bff',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('curso.bulk.delete') }}",
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
                                    toastr.error('Ocurrió un error al eliminar los cursos seleccionados.');
                                }
                            });
                        }
                    });
                }
            });

            // Individual delete confirmation with SweetAlert
            $('.delete-course').click(function(e) {
                e.preventDefault();

                let deleteUrl = $(this).data('url');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Esta acción eliminará permanentemente este curso!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#007bff',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "GET",
                            url: deleteUrl,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.success) {
                                    toastr.success("Curso eliminado correctamente.", "", {
                                        onHidden: function() {
                                            window.location.reload();
                                        }
                                    });
                                } else {
                                    toastr.error("No se pudo eliminar el curso.");
                                }
                            },
                            error: function(xhr) {
                                toastr.error("No se pudo eliminar el curso. Por favor, inténtelo de nuevo más tarde.");
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
