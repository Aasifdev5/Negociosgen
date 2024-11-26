@extends('admin.Master')
@section('title')
    Gestión Ganancias
@endsection
@section('content')
<div class="page-body">
<section style="padding: 60px 0; background: #1a1a1a;">
    <div class="container my-4">
        <!-- Dashboard Title -->
        <h1 style="color: #ededed;">
            Gestión <span style="color: #0090ff;">Ganancias</span>
        </h1>

        <!-- Summary Cards -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="p-4 card-box" style="background: #000; border: 1px solid #333; border-radius: 16px; color: #fff; text-align: center;">
                    <h4 style="color: #0090ff;">$50</h4>
                    <p>Comisiones Pagadas</p>
                    <button class="btn btn-outline-primary text-light">Ver detalles</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 card-box" style="background: #000; border: 1px solid #333; border-radius: 16px; color: #fff; text-align: center;">
                    <h4 style="color: #0090ff;">$50</h4>
                    <p>Comisiones en proceso</p>
                    <button class="btn btn-outline-primary text-light">Ver detalles</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 card-box" style="background: #000; border: 1px solid #333; border-radius: 16px; color: #fff; text-align: center;">
                    <h4 style="color: #0090ff;">$50</h4>
                    <p>Comisiones pendientes</p>
                    <button class="btn btn-outline-primary text-light">Solicitar pago</button>
                </div>
            </div>
        </div>

        <!-- Commission History Table -->
        <h4 class="mb-3" style="color: #ededed;">Historial de comisiones</h4>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="salesTable" class="table table-bordered table-dark text-light">
                <thead>
                    <tr>
                        <th>Fecha de venta</th>
                        <th>Nombre de usuario</th>
                        <th>Ganancia total</th>
                        <th>Comisión pagada</th>
                        <th>Comisión Pendiente</th>
                        <th>Procesar pago</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>15/09/24</td>
                        <td>Curso de Marketing</td>
                        <td>$10.00</td>
                        <td>$10.00</td>
                        <td>$10.00</td>
                        <td><button class="btn btn-outline-primary btn-sm text-light">Procesar pago</button></td>
                        <td><button class="btn btn-outline-secondary btn-sm text-light">...</button></td>
                    </tr>
                    <!-- Repeat similar rows as needed -->
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
    /* Custom styling for white text */
    .table-dark th, .table-dark td {
        white-space: nowrap;
        color: #ededed;
    }
    .table-dark th, .table-dark td {
        padding: 10px;
    }

    /* Custom styling for buttons */
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
