@extends('admin.Master')
@section('title')
    Panel
@endsection
@section('content')
    <div class="page-body">
        @if ($user_session->is_super_admin == 1)
            <div class="container-fluid">
                <div class="page-header">
                    
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 xl-100">
                        <div class="row">

                                <div class="col-sm-2">
                                    <div class="card">
                                        <div class="card-body ecommerce-icons text-center"><i
                                                data-feather="dollar-sign"></i>
                                            <div><span>Ganancia total</span></div>
                                            <h4 class="font-primary mb-0 counter">
                                                @php
    $total_earning = \App\Models\Payment::sum('amount');
   $total_orders = \App\Models\Order::count();
    $currentMonth = date('m');
    $currentYear = date('Y');
    
    $current_month_orders = \App\Models\Order::whereMonth('created_at', $currentMonth)
                     ->whereYear('created_at', $currentYear)
                     ->count();
    $current_month_earning = \App\Models\Payment::
                        whereMonth('created_at', $currentMonth)
                        ->whereYear('created_at', $currentYear)
                        ->sum('amount');
                        $today = date('Y-m-d');
                        $today_orders = \App\Models\Order::whereDate('created_at', $today)->count();
    $today_earning = \App\Models\Payment::
                        whereDate('created_at', $today)
                        ->sum('amount');
                        $total_users = \App\Models\User::where('is_super_admin', 0)->count();
                        $products = \App\Models\Product::whereNotIn('sku', function($query) {
        $query->select('sku')
              ->from('product_variations');
    })->count();
@endphp

@if (!empty($total_earning))
    {{ $total_earning }}
@endif

                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-2">
                                    <div class="card">
                                        <div class="card-body ecommerce-icons text-center"><i
                                                data-feather="dollar-sign"></i>
                                            <div><span>hoy ganando</span></div>
                                            <h4 class="font-primary mb-0 counter">
                                                
                                                @if (!empty($current_month_earning))
                                                    {{ $current_month_earning }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-2">
                                    <div class="card">
                                        <div class="card-body ecommerce-icons text-center"><i
                                                data-feather="dollar-sign"></i>
                                            <div><span>Ganancias de este mes</span></div>
                                            <h4 class="font-primary mb-0 counter">
                                                
                                                @if (!empty($today_earning))
                                                    {{ $today_earning }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card">
                                        <div class="card-body ecommerce-icons text-center"><i class="fa fa-product-hunt"></i>
                                            <div><span>Total Productos </span></div>
                                            <h4 class="font-primary mb-0 counter">
                                                @if (!empty($products))
                                                    {{ $products}}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card">
                                        <div class="card-body ecommerce-icons text-center"><i class="fa fa-shopping-bag"></i>
                                            <div><span> Total Pedidos</span></div>
                                            <h4 class="font-primary mb-0 counter">
                                                @if (!empty($total_orders))
                                                    {{ $total_orders }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card">
                                        <div class="card-body ecommerce-icons text-center"><i class="fa fa-shopping-bag"></i>
                                            <div><span> Pedidos del mes actual</span></div>
                                            <h4 class="font-primary mb-0 counter">
                                                @if (!empty($current_month_orders))
                                                    {{ $current_month_orders }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card">
                                        <div class="card-body ecommerce-icons text-center"><i class="fa fa-shopping-bag"></i>
                                            <div><span> pedidos de hoy</span></div>
                                            <h4 class="font-primary mb-0 counter">
                                                @if (!empty($today_orders))
                                                    {{ $today_orders }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card">
                                        <div class="card-body ecommerce-icons text-center"><i data-feather="users"></i>
                                            <div><span>Total de Usuarios</span></div>
                                            <h4 class="font-primary mb-0 counter">
                                                @if (!empty($total_users))
                                                    {{ $total_users }}
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>



                        </div>
                    </div>
                   

                     <div class="col-xl-12 xl-100">
                       <div class="card">
    <div class="card-header">
        <h5>Cuadro</h5>
        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li><i class="icofont icofont-simple-left"></i></li>
                <li><i class="view-html fa fa-code"></i></li>
                <li><i class="icofont icofont-maximize full-card"></i></li>
                <li><i class="icofont icofont-minus minimize-card"></i></li>
                <li><i class="icofont icofont-refresh reload-card"></i></li>
                <li><i class="icofont icofont-error close-card"></i></li>
            </ul>
        </div>
    </div>
    <div class="card-body charts-box">
        <div>
            <select id="period-select" class="form-control select2">
                <option value="week">Semana</option>
                <option value="month">Mes</option>
                <option value="year">Año</option>
            </select>
        </div>
        <div id="updating-data-morris-chart"></div>
        <div class="code-box-copy">
            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script>
    $(document).ready(function() {
        let chart = null; // Initialize chart variable

        function fetchData(type) {
            $.ajax({
                url: `/payments/data?type=${type}`,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    updateChart(data); // Update chart with fetched data
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                }
            });
        }

        function updateChart(data) {
            // Destroy previous chart instance if exists
            if (chart) {
                chart.options.data = [];
                chart.redraw();
                $('#updating-data-morris-chart').empty();
            }

            // Check if data is empty or invalid
            if (!data || !data.labels2 || !data.data2) {
                console.error('Invalid or empty data received:', data);
                return;
            }

            // Create new Morris chart instance based on selected period
            chart = new Morris.Line({
                element: 'updating-data-morris-chart',
                data: data.data2.map((value, index) => ({
                    period: data.labels2[index],
                    earnings: value
                })),
                xkey: 'period',
                ykeys: ['earnings'],
                labels: ['Earnings'],
                lineColors: ['#75c3ff'],
                hideHover: 'auto',
                resize: true,
                parseTime: false
            });
        }

        // Event listener for period select change
        $('#period-select').on('change', function() {
            const selectedPeriod = this.value;
            fetchData(selectedPeriod); // Fetch data based on selected period
        });

        // Initial fetch and chart load with default period (e.g., 'week')
        fetchData('week');
    });
</script>

                    </div>
                    <div class="col-xl-12 xl-100">
                        <div class="card">
                            <div class="card-header">
                                <h5>NUEVOS USUARIOS</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="icofont icofont-simple-left"></i></li>
                                        <li><i class="view-html fa fa-code"></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive sellers">
                                    <table class="table table-bordernone">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Correo electrónico</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usersData as $row)
                                                @if ($row->account_type != 'admin')
                                                    <tr>
                                                        <td>
                                                            <div class="d-inline-block align-middle">


                                                                <div class="d-inline-block">
                                                                    <p>{{ $row->name }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>{{ $row->email }}</p>
                                                        </td>

                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1"
                                        title="Copy"><i class="icofont icofont-copy-alt"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>




                        </div>
                      </div>



                </div>
            </div>
        @endif

    </div>

@endsection
