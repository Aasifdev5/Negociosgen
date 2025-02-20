@extends('admin.Master')
@section('title')
    Gestión de Ganancias
@endsection

@section('content')
<div class="page-body">
<section style="padding: 120px 0; background: #1a1a1a;">
    <div class="container my-4">
        <!-- Dashboard Title -->
        <h1 style="color: #ededed;">
            Gestión <span style="color: #0090ff;">Ganancias</span>
        </h1>

        @php
            $comisionesPagadas = \App\Models\Withdrawal::where('status', 'approved')->sum('amount');
            $comisionesPendientes = \App\Models\Withdrawal::where('status', 'pending')->sum('amount');
            $historialComisiones = \App\Models\Withdrawal::orderBy('created_at', 'desc')->get();
        @endphp

        <!-- Summary Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="p-4 card-box text-center text-white border border-secondary rounded-3" style="background: #000;">
                    <h4 style="color: #0090ff;">${{ number_format($comisionesPagadas, 2) }}</h4>
                    <p>Comisiones Pagadas</p>
                    <button class="btn btn-outline-primary text-light">Ver detalles</button>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 card-box text-center text-white border border-secondary rounded-3" style="background: #000;">
                    <h4 style="color: #0090ff;">${{ number_format($comisionesPendientes, 2) }}</h4>
                    <p>Comisiones Pendientes</p>
                    <button class="btn btn-outline-primary text-light">Solicitar Pago</button>
                </div>
            </div>
        </div>

        <!-- Commission History Table -->
        <h4 class="mb-3" style="color: #ededed;">Historial de Comisiones</h4>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="salesTable" class="table table-bordered table-dark text-light">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Monto</th>
                                <th>Estado</th>
                                <th>Fecha de Creación</th>
                                <th>Última Actualización</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($historialComisiones as $comision)
                            <tr>
                                <td>{{ $comision->id }}</td>
                                <td>{{ $comision->user_id }}</td>
                                <td>${{ number_format($comision->amount, 2) }}</td>
                                <td>
                                    @if($comision->status == 'approved')
                                        <span class="badge bg-success">Aprobado</span>
                                    @elseif($comision->status == 'pending')
                                        <span class="badge bg-warning text-dark">Pendiente</span>
                                    @else
                                        <span class="badge bg-danger">Rechazado</span>
                                    @endif
                                </td>
                                <td>{{ $comision->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>{{ $comision->updated_at->format('d/m/Y H:i:s') }}</td>

                            </tr>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

<style>
    /* Custom styling for table */
    .table-dark th, .table-dark td {
        white-space: nowrap;
        color: #ededed;
        padding: 10px;
    }

    /* Custom styling for DataTable buttons */
    .dt-buttons .btn, .dt-buttons .dt-button {
        background-color: #333;
        color: #ededed;
        border: none;
        padding: 5px 10px;
        margin: 2px;
        border-radius: 4px;
    }

    /* Button hover effect */
    .dt-buttons .btn:hover, .dt-buttons .dt-button:hover,
    .dt-buttons .btn:focus, .dt-buttons .dt-button:focus {
        background-color: #0090ff;
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
            language: {
                url: "//cdn.datatables.net/plug-ins/1.11.3/i18n/Spanish.json"
            }
        });
    });
</script>
</div>
@endsection
