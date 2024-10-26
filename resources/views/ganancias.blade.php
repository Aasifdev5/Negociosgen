@extends('master')
@section('title')
    {{ __('Ganancias') }}
@endsection
@section('content')
<style>
    /* You can add any custom styles here or keep them in styles.css */
    .navbar .nav-link {
        color: white !important;
    }
    .navbar .nav-link:hover {
        color: #0090ff !important;
    }
    .section-footer {
        background-color: #0a0a0a;
    }
</style>
<section style="padding: 80px 0; background: #1a1a1a">
    <div class="container my-4">
        <h1 style="color: #ededed">
            Tus <span style="color: #0090ff">Ganancias</span>
        </h1>

        <div class="row mb-4">
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card text-white bg-dark">
                    <div class="card-body">
                        <h4 class="card-title">$ 50</h4>
                        <p class="card-text">Comisiones Pagadas</p>
                        <a href="#" class="btn btn-outline-primary">Ver detalles</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card text-white bg-dark">
                    <div class="card-body">
                        <h4 class="card-title">$ 50</h4>
                        <p class="card-text">Comisiones en proceso</p>
                        <a href="#" class="btn btn-outline-primary">Ver detalles</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="card text-white bg-dark">
                    <div class="card-body">
                        <h4 class="card-title">$ 50</h4>
                        <p class="card-text">Comisiones pendientes</p>
                        <a class="btn btn-outline-primary" href="Transferir Fondos.html">Solicitar pago</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table id="salesTable" class="table table-bordered text-light table-dark">
                <thead>
                    <tr>
                        <th>Fecha de Venta</th>
                        <th>Venta Asociada</th>
                        <th>Monto de la comisión</th>
                        <th>Método de pago</th>
                        <th>Fecha de pago</th>
                        <th>Nivel de
                            Referido</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>15/09/24</td>
                        <td>Curso de Marketing</td>
                        <td>$10.00</td>
                        <td>Transferencia
                            Bancaria</td>
                        <td>15/09/24</td>
                        <td>Nivel 1</td>
                        <td><span class="badge bg-success">...</span></td>
                    </tr>
                    <!-- Repeat for more rows as necessary -->
                </tbody>
            </table>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $('#salesTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],
            paging: false, // Disable pagination for all entries view
        });
    });
</script>
@endsection
