@extends('master')
@section('title')
 {{ __('Estadísticas Claves') }}
@endsection
@section('content')
<style>
    .card {
  background-color: #222;
  border: none;
  color: white;
  text-align: center;
}
.genealogy-container {
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 20px 0;
}
.genealogy-row {
  display: flex;
  justify-content: center;
  align-items: center;
}
.modal-content {
  background-color: #222;
  color: white;
}
.modal-header {
  border-bottom: 1px solid #444;
}
.modal-body {
  padding: 20px;
}
.modal-footer {
  border-top: 1px solid #444;
}
.card-footer {
  font-size: 0.9rem;
  color: #aaa;
}
.btn-primary {
  background-color: #007bff;
  border: none;
}
</style>
<section style="padding: 120px; background: #000;">
    <div class="container mt-5">
        <h2 class="text-center text-light mb-4">Estadísticas Claves</h2>

        <div class="table-responsive">
            <table id="estadisticas-table" class="table table-dark table-bordered text-light text-center">
                <thead>
                    <tr>
                        <th>Recurso</th>
                        <th>Clicks</th>
                        <th>Referidos Convertidos</th>
                        <th>Método de Pago</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Banner promocional</td>
                        <td>150</td>
                        <td>10</td>
                        <td>6.7%</td>
                    </tr>
                    <tr>
                        <td>Video Promocional</td>
                        <td>200</td>
                        <td>15</td>
                        <td>7.5%</td>
                    </tr>
                    <tr>
                        <td>Plantilla Email</td>
                        <td>200</td>
                        <td>8</td>
                        <td>8.0%</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <img class="estadisticas-claves-child img-fluid mt-4" alt="Gráfico de Estadísticas Claves" src="Rectangle 146.svg" />

        <div class="text-center mt-4">
            <button class="btn btn-primary" aria-label="Descargar Informe">
                <strong>Descargar Informe</strong>
            </button>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $('#estadisticas-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],paging: false,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.5/language/es_es.json' // Spanish language support
            },

        });
    });
</script>
@endsection
