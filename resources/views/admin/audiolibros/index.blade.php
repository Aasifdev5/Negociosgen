@extends('admin.Master')
@section('title')
    Audiolibros
@endsection
@section('content')
    <div class="page-body">
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card" style="background: #fff">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ session::get('success') }}</p>
                            </div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger">
                                <p>{{ session::get('fail') }}</p>
                            </div>
                        @endif
                        <div class="card-header">
                            <h1>Audiolibros</h1>
                            <button id="bulk-delete" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Eliminar seleccionados
                            </button>
                            <a href="{{ route('audiolibros.crear') }}" class="btn btn-success pull-right">
                                <i class="fas fa-plus"></i> Crear Audiolibro
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="advance-1">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>

                                            <th>Título</th>
                                            <th>Autor</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($audiobooks as $audiobook)
                                            <tr>
                                                <td><input type="checkbox" class="select-item" value="{{ $audiobook->id }}">
                                                </td>

                                                <td>{{ $audiobook->title }}</td>
                                                <td>{{ $audiobook->author }}</td>
                                                <td>
                                                    <a href="{{ route('audiolibros.edit', $audiobook->id) }}" class="btn btn-primary btn-sm">
                                                        <i class="fas fa-edit"></i> Editar
                                                    </a>

                                                    <button class="btn btn-danger btn-sm delete-btn"
                                                        data-id="{{ $audiobook->id }}">
                                                        <i class="fas fa-trash"></i> Eliminar
                                                    </button>
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

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Handle single delete with SweetAlert
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const audiobookId = this.getAttribute('data-id');

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esta acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Create the delete URL with the 'admin' prefix
                        const url = `/admin/audiolibros/eliminar/${audiobookId}`;

                        // Perform the AJAX request to delete the audiobook using DELETE method
                        fetch(url, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for security
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.message) {
                                    Swal.fire('Eliminado!', data.message, 'success');
                                    location.reload(); // Reload the page after deletion
                                } else {
                                    Swal.fire('Error',
                                        'Hubo un problema al eliminar el audiolibro',
                                        'error');
                                }
                            })
                            .catch(error => {
                                Swal.fire('Error', 'Hubo un error al procesar la solicitud',
                                    'error');
                            });
                    }
                });
            });
        });

        // Handle bulk delete
        document.getElementById('bulk-delete').addEventListener('click', function() {
            const selectedIds = [];
            document.querySelectorAll('.select-item:checked').forEach(item => {
                selectedIds.push(item.value);
            });

            if (selectedIds.length === 0) {
                Swal.fire('No se seleccionaron audiolibros', 'Por favor, selecciona al menos uno', 'warning');
                return;
            }

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción eliminará todos los audiolibros seleccionados!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Make a bulk delete request using the selected IDs
                    fetch('{{ route('audiolibros.bulk-delete') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                ids: selectedIds
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message) {
                                Swal.fire('Eliminado!', data.message, 'success');
                                location.reload(); // Reload page after deletion
                            } else {
                                Swal.fire('Error', 'Hubo un problema al eliminar los audiolibros',
                                    'error');
                            }
                        });
                }
            });
        });

        // Select/Deselect all checkboxes
        document.getElementById('select-all').addEventListener('change', function() {
            const isChecked = this.checked;
            document.querySelectorAll('.select-item').forEach(item => {
                item.checked = isChecked;
            });
        });
    </script>
@endsection
