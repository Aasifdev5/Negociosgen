@extends('master')

@section('title', __('Panel de afiliados'))

@section('content')
<section class="py-5 bg-dark" >
    <div class="container" style="margin-top: 50px">
        <h1 class="text-light mb-4">
            {{ __('Panel') }} <span class="text-primary">{{ __('Afiliados') }}</span>
        </h1>
        <style>
            /* DataTable button styles */
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
        <div class="row">
            <!-- Side Menu -->
            <div class="col-lg-3">
                <div class="text-white p-3 rounded" style="background: #000">
                    <div class="menu-item mb-3 d-flex align-items-center">
                        <a href="{{ url('dashboard') }}" style="text-decoration: none; color: inherit;">
                            <img src="{{ asset('assets/ChartBar.svg') }}" alt="Dashboard" class="me-2" width="24" height="24">
                            <span>{{ __('Panel') }}</span>
                        </a>
                    </div>
                    <div class="menu-item mb-3 d-flex align-items-center">
                        <a href="{{ url('geanologìa') }}" style="text-decoration: none; color: inherit;">
                            <img src="{{ asset('assets/TreeStructure.svg') }}" alt="Genealogía" class="me-2" width="24" height="24">
                            <span>{{ __('Genealogía') }}</span>
                        </a>
                    </div>
                    <div class="menu-item mb-3 d-flex align-items-center">
                        <a href="{{ url('ganancias') }}" style="text-decoration: none; color: inherit;">
                            <img src="{{ asset('assets/Wallet.svg') }}" alt="Ganancias" class="me-2" width="24" height="24">
                            <span>{{ __('Ganancias') }}</span>
                        </a>
                    </div>
                    <div class="menu-item mb-3 d-flex align-items-center">
                        <a href="{{ url('recursos') }}" style="text-decoration: none; color: inherit;">
                            <img src="{{ asset('assets/Image.svg') }}" alt="Recursos" class="me-2" width="24" height="24">
                            <span>{{ __('Recursos') }}</span>
                        </a>
                    </div>
                    <div class="menu-item d-flex align-items-center">
                        <a href="{{ url('edit_profile') }}" style="text-decoration: none; color: inherit;">
                            @if (!empty($user_session->profile_photo))
                            <img src="{{ asset('profile_photo/') }}<?php echo '/' . $user_session->profile_photo; ?>" class="rounded-circle img-fluid" alt="{{ $user_session->name }}" width="24" height="24">

                            <span>Perfil</span>
                        @else
                        <img src="{{ asset('149071.png') }}" alt="Perfil" class="me-2 rounded-circle" width="24" height="24">

                        <span>Perfil</span>
                        @endif


                        </a>
                    </div>
                </div>
            </div>


            <!-- Main Content -->
            <div class="col-lg-9">
                <!-- Sales Summary -->
                <h4 class="text-light mb-3">{{ __('Resumen de Ventas') }}</h4>
                <div class="row">
                    <div class="col-lg-4 mb-3">
                        <div class="card  text-white p-4" style="background: #000">
                            <h3>Bs 500</h3>
                            <p class="mb-0">{{ __('Ventas Totales') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="card  text-white p-4" style="background: #000">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h3>Bs {{ \App\Models\User::where('id', $user_session->id)->first()->balance }}</h3>
                                <a href="{{ url('requestW') }}" class="btn btn-primary btn-sm">{{ __('Retirar Comisión') }}</a>
                            </div>
                            <p class="mb-0">{{ __('Comisiones Generadas') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <div class="card  text-white p-4" style="background: #000">
                            <h3>{{ \App\Models\User::where('refer', $user_session->id)->count() }}</h3>
                            <p class="mb-0">{{ __('Número de Referidos Activos') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="row">
                    <div class="col-lg-6" style="background: #000">
                        <h5 class="text-light mb-3">{{ __('Ventas por Mes') }}</h5>
                        <div id="barChart" class="p-3 rounded" style="height: 350px;"></div>
                    </div>
                    <div class="col-lg-6" style="background: #000">
                        <h5 class="text-light mb-3">{{ __('Distribución de Comisiones por Nivel') }}</h5>
                        <div id="apexPieChart" class="p-3 rounded" style="height: 350px;"></div>
                    </div>
                </div>


                <!-- Resources Section -->
                <div class="card  text-white p-4 mt-5" style="background: #000">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>{{ __('Accede a nuestros recursos para') }} <span class="text-primary">{{ __('aumentar tus ganancias') }}</span></h4>
                        <a href="{{ url('recursos') }}" class="btn btn-primary">{{ __('Ver Recursos') }}</a>
                    </div>
                </div>

                <!-- Sales Table -->
                <div class="card mt-5" style="background: #000">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="salesTable" class="table table-bordered table-dark">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Fecha') }}</th>
                                        <th>{{ __('Referido') }}</th>
                                        <th>{{ __('Nivel') }}</th>
                                        <th>{{ __('Porcentaje') }}</th>
                                        <th>{{ __('Comisión Generada') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sales as $index => $sale)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $sale->date }}</td>
                                            <td>{{ $sale->user ? $sale->user->name : 'N/A' }}</td>
                                            <td>{{ $sale->user ? $sale->user->level : 'N/A' }}</td>
                                            <td>{{ $sale->user ? ($sale->percentage * 100) . '%' : 'N/A' }}</td>
                                            <td>Bs{{ number_format($sale->commission, 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">{{ __('No hay datos disponibles') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  fetch('{{ route('getDashboardData') }}')
    .then(response => response.json())
    .then(data => {
        // Update the bar chart with monthly sales data
        new ApexCharts(document.querySelector("#barChart"), {
            chart: { type: 'bar', height: 350 },
            series: [{
                name: 'Ventas',
                data: Object.values(data.monthlySales).map(amount => parseFloat(amount))
            }],
            xaxis: {
                categories: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]
            },
            colors: ['#0090ff'],
        }).render();

        // Update the pie chart with commission by level
        // Group commissions by level and sum them
        const commissionByLevel = data.commissionByLevel.reduce((acc, item) => {
            // Convert commission to a number and add to the corresponding level
            if (acc[item.level]) {
                acc[item.level] += parseFloat(item.commission);
            } else {
                acc[item.level] = parseFloat(item.commission);
            }
            return acc;
        }, {});

        // Extract the levels and their summed commissions for the pie chart
        const levels = Object.keys(commissionByLevel);
        const commissions = Object.values(commissionByLevel);

        new ApexCharts(document.querySelector("#apexPieChart"), {
            chart: { type: 'pie', height: 350 },
            labels: levels, // Use levels as the labels
            series: commissions, // Use commissions as the values
            colors: ['#0ac7b4', '#0090ff', '#ffbc00', '#ff6b6b'], // Adjust colors as needed
        }).render();
    })
    .catch(error => console.error('Error fetching data:', error));



    // DataTable
    $(document).ready(function () {
        $('#salesTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['excelHtml5', 'pdfHtml5', 'print'],
            language: { url: "//cdn.datatables.net/plug-ins/1.11.3/i18n/Spanish.json" },
        });
    });
</script>
@endsection
