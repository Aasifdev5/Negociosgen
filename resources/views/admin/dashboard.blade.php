@extends('admin.Master')
@section('title')
    Panel
@endsection
@section('content')
    <section style="padding: 150px 0; background: #1a1a1a;">
        <div class="container my-4">
            <!-- Dashboard Title -->
            <h1 style="color: #ededed;">
                Dashboard de <span style="color: #0090ff;">Administrador</span>
            </h1>

            <!-- Summary Section -->
            <div class="container">
                <div class="row mb-4" style="margin-left: -10px; margin-right: -10px;">
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-4"
                        style="background: #000; color: #fff; border: 1px solid #333; border-radius: 16px; padding: 20px; text-align: center; margin-left: 5px; margin-right: 5px;">
                        <b class="display-4" style="color: #0090ff;">$500</b>
                        <br>
                        <b>Ventas Totales</b>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-4"
                        style="background: #000; color: #fff; border: 1px solid #333; border-radius: 16px; padding: 20px; text-align: center; margin-left: 5px; margin-right: 5px;">
                        <b class="display-4" style="color: #0090ff;">300</b>
                        <br>
                        <b>Distribuidores</b>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-4"
                        style="background: #000; color: #fff; border: 1px solid #333; border-radius: 16px; padding: 20px; text-align: center; margin-left: 5px; margin-right: 5px;">
                        <b class="display-4" style="color: #0090ff;">1100</b>
                        <br>
                        <b>Estudiantes</b>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-4"
                        style="background: #000; color: #fff; border: 1px solid #333; border-radius: 16px; padding: 20px; text-align: center; margin-left: 5px; margin-right: 5px;">
                        <b class="display-4" style="color: #0090ff;">100</b>
                        <br>
                        <b>Coaches</b>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <!-- Sales Table -->
                    <div class="table-responsive">
                        <table id="salesTable" class="table table-bordered table-dark text-light">
                            <thead>
                                <tr>

                                    <th>Acción</th>
                                    <th>Nombre de Usuario</th>
                                    <th>Correo Electrónico</th>
                                    <th>Dirección IP</th>
                                    <th>Estado del correo electrónico</th>


                                    <th>La fecha registrada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usersData as $i => $data)
                                    @if ($data->account_type != 'admin')
                                        <tr>

                                            <td>
                                                <a href="{{ url('admin/user/edit', $data->id) }}"
                                                    class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                                    data-toggle="tooltip" title="edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    class="btn btn-icon waves-effect waves-light btn-danger m-b-5 m-r-5 delete-btn"
                                                    data-id="{{ $data->id }}" data-toggle="tooltip" title="Eliminar">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                            <td>
                                                @if (!empty($data->profile_photo))
                                                    <img src="{{ asset('profile_photo/' . $data->profile_photo) }}"
                                                        class="rounded-circle" width="70px" height="60px" alt="avatar">
                                                @else
                                                    <img src="149071.png" width="70px" height="40">
                                                @endif
                                                {{ stripslashes($data->name) }}
                                            </td>
                                            <td>{{ $data->email }}</td>


                                            <td>{{ $data->ip_address }}</td>
                                            <td>
                                                @if ($data->status == 1)
                                                    <span class="badge badge-success">Activo</span>
                                                @else
                                                    <span class="badge badge-danger">Inactivo</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y  H:i:s') }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Required DataTables CSS and JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <style>
        /* Ensure text is white and handle table overflow */
        .table-dark th,
        .table-dark td {
            white-space: nowrap;
            color: #ededed;
        }

        /* Set padding for readability */
        .table-dark th,
        .table-dark td {
            padding: 10px;
        }

        /* Adjust badge styling */
        .badge {
            font-size: 1em;
            padding: 5px 10px;
        }

        /* Custom style for DataTables buttons */
        .dt-buttons .btn,
        .dt-buttons .dt-button {
            background-color: #333;
            /* Dark background */
            color: #ededed;
            /* White text */
            border: none;
            /* Remove border */
            padding: 5px 10px;
            margin: 2px;
            border-radius: 4px;
        }

        /* Hover and focus effect for buttons */
        .dt-buttons .btn:hover,
        .dt-buttons .dt-button:hover,
        .dt-buttons .btn:focus,
        .dt-buttons .dt-button:focus {
            background-color: #0090ff;
            /* Accent color on hover */
            color: #fff;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#salesTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excelHtml5',
                    'pdfHtml5',
                    'print'
                ],
                paging: true,
                pageLength: 5,
                responsive: true, // Enable responsiveness
                autoWidth: false, // Disable auto width to prevent overlapping
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.11.3/i18n/Spanish.json"
                }
            });
        });
    </script>
@endsection
