@extends('master')
@section('title')
 {{ __('Dashboard de Afiliados') }}
@endsection
@section('content')

<section style="padding: 80px 0; background: #1a1a1a">
    <div class="container my-4">
      <h1 style="color: #ededed">
        Dashboard de <span style="color: #0090ff">Afiliados</span>
      </h1>

      <h4 class="resumen-de-ventas text-light">Resumen de Ventas</h4>

      <div class="row mb-4">
        <div class="col-lg-3 col-md-6 col-12 mb-4" style="background: #000; color: #fff; border: 1px solid #000; border-radius: 16px; padding: 20px; margin-right: 15px;">
          <b class="b display-4">$ 500</b>
          <br />
          <b class="ventas-totales">Ventas Totales</b>
        </div>
        <div class="col-lg-3 col-md-6 col-12 mb-4" style="background: #000; color: #fff; border: 1px solid #000; border-radius: 16px; padding: 20px; margin-right: 15px;">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <b class="b display-4">$ 50</b>
            <a class="btn btn-sm btn-primary text-light" href="Transferir Fondos.html">Retirar Comisión</a>
          </div>
          <b class="ventas-totales">Comisiones Generadas</b>
        </div>
        <div class="col-lg-3 col-md-6 col-12 mb-4" style="background: #000; color: #fff; border: 1px solid #000; border-radius: 16px; padding: 20px;">
          <b class="b2 display-4">100</b><br />
          <b class="ventas-totales">Número de Referidos Activos</b>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-lg-6">
          <h5 class="ventas-por-mes text-light">Ventas por Mes</h5>
          <div id="barChart" class="text-white p-3" style="height: 350px;"></div>
        </div>

        <div class="col-lg-6">
          <h5 class="ventas-por-mes text-light">Distribución de Comisiones por Producto</h5>
          <div id="apexPieChart" class="bg-dark text-white p-3" style="height: 350px;"></div>
        </div>
      </div>

      <section style="padding: 20px 0; background: #1a1a1a">
        <div class="container">
          <div class="container my-5 p-4" style="background-color: #000; border: 1px solid #2e2e2e; border-radius: 16px;">
            <div class="row">
              <div class="col-12 col-md-8 text-start mb-3 mb-md-0">
                <h4 class="deseas-obtener-un text-light mb-3">
                  Accede a nuestros recursos para <span style="color: #0090ff">aumentar tus ganancias</span>
                </h4>
              </div>
              <div class="col-12 col-md-4 text-end d-flex align-items-center justify-content-end">
                <a href="{{ url('recursos') }}" class="btn btn-primary btn-lg text-light">Ver Recursos</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="card">
          <div class="card-body">
              <div class="table-responsive">
                  <table id="salesTable" class="table table-bordered text-light table-dark">
                      <thead>
                          <tr>
                              <th>Fecha de Venta</th>
                              <th>Producto</th>
                              <th>Cantidad Vendida</th>
                              <th>Precio Unitario</th>
                              <th>Comisión Generada</th>
                              <th>Total de Venta</th>
                              <th>Estado de Pago</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>15/09/24</td>
                              <td>Curso de Marketing</td>
                              <td>1</td>
                              <td>$50.00</td>
                              <td>$10.00</td>
                              <td>$60.00</td>
                              <td><span class="badge bg-success">Pagado</span></td>
                          </tr>
                          <!-- Repeat for more rows as necessary -->
                      </tbody>
                  </table>
              </div>
          </div>
      </div>

    </div>
</section>

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

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Initialize the bar chart using ApexCharts
    var optionsBar = {
        chart: {
            type: 'bar',
            height: 350,
        },
        series: [{
            name: 'Ventas',
            data: [56, 64, 76, 78, 70, 37],
        }],
        xaxis: {
            categories: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio"],
        },
        colors: ['#0090ff'],
    };

    var barChart = new ApexCharts(document.querySelector("#barChart"), optionsBar);
    barChart.render();

    // Initialize the pie chart using ApexCharts
    var optionsPie = {
        chart: {
            type: 'pie',
            height: 350,
        },
        labels: ['Figma', 'Sketch'],
        series: [80, 41],
        colors: ['#0ac7b4', '#0090ff'],
        dataLabels: {
            enabled: true,
            formatter: function (val, opts) {
                const total = opts.w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                const percentage = (val / total * 100).toFixed(2);
                return `${val} (${percentage}%)`;
            },
            style: {
                colors: ['#fff']
            }
        },
        tooltip: {
            enabled: false,
        }
    };

    var pieChart = new ApexCharts(document.querySelector("#apexPieChart"), optionsPie);
    pieChart.render();
</script>


<script>
    $(document).ready(function () {
        $('#salesTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excelHtml5', 'pdfHtml5', 'print'
            ],
            paging: false,
            language: {
                url: "//cdn.datatables.net/plug-ins/1.11.3/i18n/Spanish.json"
            }
        });
    });
</script>
@endsection
