@extends("admin.Master")

@section('title')
    Solicitudes de Retiro
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
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="alert alert-danger">
                            <p>{{ Session::get('fail') }}</p>
                        </div>
                    @endif
                    <div class="card-header">
                        <h5>Lista de Solicitudes de Retiro</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="advance-1">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Usuario</th>
                                        <th>Monto</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requestWithdrawal as $withdrawal)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $withdrawal->user->name }}</td>
                                        <td>${{ number_format($withdrawal->amount, 2) }}</td>
                                        <td>
                                            @if ($withdrawal->status === 'approved')
                                            <span class="badge bg-success">Aprobado</span>
                                            @elseif ($withdrawal->status === 'rejected')
                                            <span class="badge bg-danger">Rechazado</span>
                                            @else
                                            <span class="badge bg-warning text-dark">Pendiente</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($withdrawal->status === 'pending')
                                            <form action="{{ route('withdrawals.update', $withdrawal->id) }}" method="POST" class="approve-form d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit" class="btn btn-success btn-sm approve-btn">
                                                    <i class="fa fa-check"></i> Aprobar
                                                </button>
                                            </form>
                                            <form action="{{ route('withdrawals.update', $withdrawal->id) }}" method="POST" class="reject-form d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="btn btn-danger btn-sm reject-btn">
                                                    <i class="fa fa-times"></i> Rechazar
                                                </button>
                                            </form>
                                            @else
                                            <button class="btn btn-secondary btn-sm" disabled>
                                                <i class="fa fa-ban"></i> Acción no disponible
                                            </button>
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
            <!-- Fin de DOM / jQuery -->
        </div>
    </div>
    <!-- Fin de Container-fluid -->
</div>

<!-- Integración de SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Confirmación para aprobar
    document.querySelectorAll('.approve-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault(); // Prevenir el envío del formulario
            const form = this.closest('form');
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Quieres aprobar esta solicitud de retiro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, aprobar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Confirmación para rechazar
    document.querySelectorAll('.reject-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault(); // Prevenir el envío del formulario
            const form = this.closest('form');
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Quieres rechazar esta solicitud de retiro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, rechazar'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
