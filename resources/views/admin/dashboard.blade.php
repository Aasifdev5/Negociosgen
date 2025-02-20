@extends('admin.Master')
@section('title')
    Panel
@endsection
@section('content')
    <div class="page-body">

        <section style="padding: 50px 0; background: #1a1a1a;">
            <div class="container my-4">
                <!-- Dashboard Title -->
                <h1 style="color: #ededed;">
                    Dashboard de <span style="color: #0090ff;">Administrador</span>
                </h1>
                @php
                    $totalMembers = \App\Models\User::where('is_super_admin', 0)->where('account_type', 'affiliate')->count();
                    $totalCardTakers = \App\Models\User::where('is_super_admin', 0)->where('account_type', 'CardTaker')->count();
                    $totalGenMembers = \App\Models\User::where('is_super_admin', 0)->count();
                    $introVideo = \App\Models\Intro::count();
                    $tipsVideo = \App\Models\SuccessTips::count();
                    $course = \App\Models\Course::count();
                    $comisionesPagadas = \App\Models\Withdrawal::where('status', 'approved')->sum('amount');
                    $comisionesPendientes = \App\Models\Withdrawal::where('status', 'pending')->sum('amount');
                @endphp

                <div class="container">
                    <div class="row justify-content-center text-center">
                        @php
                            $stats = [
                                ['icon' => 'users', 'count' => $totalMembers, 'label' => 'Total de Members'],
                                ['icon' => 'id-card', 'count' => $totalCardTakers, 'label' => 'Total de Gen Card Takers'],
                                ['icon' => 'user-friends', 'count' => $totalGenMembers, 'label' => 'Total de Gen Members y Card Takers'],
                                ['icon' => 'video', 'count' => $introVideo, 'label' => 'Videos Introductorios'],
                                ['icon' => 'lightbulb', 'count' => $tipsVideo, 'label' => 'Videos de Éxito'],
                                ['icon' => 'book-open', 'count' => $course, 'label' => 'Cursos'],
                                ['icon' => 'dollar-sign', 'count' => '$' . number_format($comisionesPagadas, 2), 'label' => 'Comisiones Pagadas'],
                                ['icon' => 'hourglass-half', 'count' => '$' . number_format($comisionesPendientes, 2), 'label' => 'Comisiones Pendientes']
                            ];
                        @endphp

                        @foreach($stats as $stat)
                            <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
                                <div class="d-flex flex-column justify-content-between h-100 p-4 text-white border border-secondary rounded-3"
                                    style="background: #000">
                                    <i class="fas fa-{{ $stat['icon'] }} fa-3x text-primary"></i>
                                    <h3 class="mt-2 text-primary">{{ $stat['count'] }}</h3>
                                    <p><b>{{ $stat['label'] }}</b></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <!-- Sales Table -->
                        <div class="table-responsive">
                            <table id="salesTable" class="table table-bordered table-dark text-light">
                                <thead>
                                    <tr>


                                        <th>Nombre de Usuario</th>
                                        <th>Correo Electrónico</th>
                                        <th>Dirección IP</th>
                                        <th>La fecha registrada</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usersData as $i => $data)
                                        @if ($data->account_type != 'admin')
                                            <tr>


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
            $(document).ready(function () {
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


    </div>

@endsection
