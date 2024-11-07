@extends('admin.Master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <!-- Área de contenido de la página inicio -->
    <div class="page-body" style="background: #000">
        <br>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card customers__area bg-style mb-30" style="background: #fff">
                        <div class="card-header item-title d-flex justify-content-between">
                            <h2>{{ __(@$title) }}</h2>
                        </div>
                        <div class="card-body">
                            <!-- Mensaje flash para éxito o error -->
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table id="customers-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all" /></th>
                                            <th>{{ __('Nombre') }}</th>
                                            <th>{{ __('Correo Electrónico') }}</th>
                                            <th>{{ __('Asunto') }}</th>
                                            <th>{{ __('Prioridad') }}</th>
                                            <th>{{ __('Estado') }}</th>
                                            <th>{{ __('Acción') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tickets as $ticket)
                                            <tr class="removable-item">
                                                <td><input type="checkbox" class="select-checkbox" data-id="{{ $ticket->id }}" /></td>
                                                <td>{{ $ticket->name }}</td>
                                                <td>{{ $ticket->email }}</td>
                                                <td>{{ $ticket->subject }}</td>
                                                <td>{{ @$ticket->priority->name }}</td>
                                                <td>
                                                    <span id="hidden_id" style="display: none">{{ $ticket->id }}</span>
                                                    <select name="status" class="status label-inline font-weight-bolder mb-1 badge badge-info">
                                                        <option value="1" @if ($ticket->status == 1) selected @endif>{{ __('Abierto') }}</option>
                                                        <option value="2" @if ($ticket->status == 2) selected @endif>{{ __('Cerrado') }}</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="action__buttons">
                                                        <a href="{{ route('support-ticket.admin.show', $ticket->uuid) }}" class="btn-action mr-1" title="Ver detalles del ticket">
                                                            <i class="fas fa-eye" style="font-size: 18px;"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-url="{{ route('support-ticket.admin.delete', [$ticket->uuid]) }}" class="btn-action delete" title="Eliminar">
                                                            <i class="fas fa-trash" style="font-size: 18px;"></i>
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
    <!-- Fin área de contenido de la página -->

    <!-- Bibliotecas y scripts de JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('admin/js/custom/image-preview.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <style>
        /* Asegurar que el texto sea blanco y manejar el desbordamiento de la tabla */
        .table-dark th,
        .table-dark td {
            white-space: nowrap;
            color: #ededed;
        }

        /* Establecer relleno para mejorar la legibilidad */
        .table-dark th,
        .table-dark td {
            padding: 10px;
        }

        /* Ajustar el estilo de las insignias */
        .badge {
            font-size: 1em;
            padding: 5px 10px;
        }

        /* Estilo personalizado para los botones de DataTables */
        .dt-buttons .btn,
        .dt-buttons .dt-button {
            background-color: #333;
            color: #ededed;
            border: none;
            padding: 5px 10px;
            margin: 2px;
            border-radius: 4px;
        }

        /* Efecto de hover y enfoque para los botones */
        .dt-buttons .btn:hover,
        .dt-buttons .dt-button:hover,
        .dt-buttons .btn:focus,
        .dt-buttons .dt-button:focus {
            background-color: #0090ff;
            color: #fff;
        }
    </style>

    <script>
        'use strict'

        // Inicializar DataTable con opciones de exportación
        $(document).ready(function() {
            $('#customers-table').DataTable({
                dom: 'Bfrtip',
                buttons: ['excel', 'pdf', 'print']
            });
        });

        // Seleccionar/Deseleccionar todas las casillas de verificación
        $('#select-all').change(function() {
            var isChecked = $(this).prop('checked');
            $('.select-checkbox').prop('checked', isChecked);
            toggleBulkDeleteButton();
        });

        // Activar/desactivar el botón de eliminar en masa según las casillas de verificación seleccionadas
        $('.select-checkbox').change(function() {
            toggleBulkDeleteButton();
        });

        function toggleBulkDeleteButton() {
            var selected = $('.select-checkbox:checked').length;
            if (selected > 0) {
                $('#bulk-delete').prop('disabled', false);
            } else {
                $('#bulk-delete').prop('disabled', true);
            }
        }

        // Eliminar en masa los elementos seleccionados
        $('#bulk-delete').click(function() {
            var ids = [];
            $('.select-checkbox:checked').each(function() {
                ids.push($(this).data('id'));
            });

            Swal.fire({
                title: "{{ __('¿Está seguro de eliminar los tickets seleccionados?') }}",
                text: "{{ __('¡No podrás revertir esto!') }}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "{{ __('¡Sí, eliminar!') }}",
                cancelButtonText: "{{ __('No, cancelar!') }}",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('support-ticket.bulkDelete') }}",
                        data: {
                            "ids": ids,
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            toastr.success('', "{{ __('Los tickets han sido eliminados.') }}");
                            location.reload();
                        },
                        error: function() {
                            alert("¡Error!");
                        },
                    });
                }
            });
        });

        // Funcionalidad de cambio de estado
        $(".status").change(function() {
            var id = $(this).closest('tr').find('#hidden_id').html();
            var status_value = $(this).closest('tr').find('.status option:selected').val();

            Swal.fire({
                title: "{{ __('¿Está seguro de cambiar el estado?') }}",
                text: "{{ __('¡No podrás revertir esto!') }}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "{{ __('¡Sí, cambiarlo!') }}",
                cancelButtonText: "{{ __('No, cancelar!') }}",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('support-ticket.changeTicketStatus') }}",
                        data: {
                            "status": status_value,
                            "id": id,
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            toastr.success('', "{{ __('El estado ha sido actualizado') }}");
                        },
                        error: function() {
                            alert("¡Error!");
                        },
                    });
                }
            });
        });
    </script>

@endsection
