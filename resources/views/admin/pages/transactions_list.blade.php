@extends("admin.Master")
@section('title')
Transacciones
@endsection
@section("content")

<div class="page-body">
<br>
    <!-- Inicio de Container-fluid -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ session::get('success') }}</p>
                    </div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        <p>{{ session::get('fail') }}</p>
                    </div>
                    @endif
                    <div class="card-header">
                        <h5> Lista de Transacciones</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th class="text-light text-center">#</th>
                                        <th class="text-light">Nombre</th>
                                        <th class="text-light">Monto</th>
                                        <th class="text-light">Fecha de Pago</th>

                                        <th class="text-light">Recibo</th>
                                        <th class="text-light">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    @foreach($transaction as $i => $transaction_data)
                                    @php
                                    $timestamp = strtotime($transaction_data->created_at);
                                    $formattedDate = date('d-m-Y', $timestamp);
                                    @endphp
                                    <tr>
                                        <td class="text-center">{{ $count++ }}</td>
                                        <td><a href="#" data-toggle="tooltip" title="Historial del Usuario">{{ \App\Models\User::getUserFullname($transaction_data->user_id) }}</a></td>
                                        <td>{{ $transaction_data->amount }}</td>
                                        <td>{{ $formattedDate }}</td>

                                        <td>
                                            @if ($transaction_data->payment_receipt)
                                                <a href="{{ asset($transaction_data->payment_receipt) }}" target="_blank">
                                                    <img src="{{ asset($transaction_data->payment_receipt) }}" alt="Recibo de Pago" style="max-width: 100px;">
                                                </a>
                                            @else
                                                No se subió recibo
                                            @endif
                                        </td>
                                        <td>
                                            @if ($transaction_data->accepted)
                                                Aceptado
                                            @else
                                                Pendiente
                                                <a href="{{ route('accept', ['id' => $transaction_data->id]) }}" class="btn btn-sm btn-success">Aceptar</a>
                                            @endif
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
    <!-- Fin de Container-fluid -->
</div>
@endsection
