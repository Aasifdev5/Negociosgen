@extends('master')

@section('title')
    {{ __('Ganancias') }}
@endsection

@section('content')

    <style>
        /* Custom styles */
        .navbar .nav-link {
            color: white !important;
        }

        .navbar .nav-link:hover {
            color: #0090ff !important;
        }

        .section-footer {
            background-color: #000;
        }

        .card {
            border-radius: 10px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
        }

        .table th,
        .table td {
            text-align: center;
        }

        .table th {
            background-color: #333;
        }

        .table td {
            background-color: #444;
        }
    </style>

    <section style="padding: 80px 0; background: #1a1a1a">
        <div class="container my-4">
            @if(Session::has('success'))
<div class="alert alert-success">
    <p>{{session::get('success')}}</p>
</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">
    <p>{{session::get('fail')}}</p>
</div>
@endif
            <h1 style="color: #ededed">
                Tus <span style="color: #0090ff">{{ __('Ganancias') }}</span>
            </h1>
            <div class="row">
                <!-- Sidebar Menu -->
                <div class="col-lg-3">
                    <div class="text-white p-3 rounded" style="background: #000">
                        <div class="menu-item mb-3 d-flex align-items-center">
                            <a href="{{ url('dashboard') }}" style="text-decoration: none; color: inherit;">
                                <img src="{{ asset('assets/ChartBar.svg') }}" alt="Dashboard" class="me-2" width="24"
                                    height="24">
                                <span>{{ __('Panel') }}</span>
                            </a>
                        </div>
                        <div class="menu-item mb-3 d-flex align-items-center">
                            <a href="{{ url('geanologìa') }}" style="text-decoration: none; color: inherit;">
                                <img src="{{ asset('assets/TreeStructure.svg') }}" alt="Genealogía" class="me-2"
                                    width="24" height="24">
                                <span>{{ __('Genealogía') }}</span>
                            </a>
                        </div>
                        <div class="menu-item mb-3 d-flex align-items-center">
                            <a href="{{ url('ganancias') }}" style="text-decoration: none; color: inherit;">
                                <img src="{{ asset('assets/Wallet.svg') }}" alt="Ganancias" class="me-2" width="24"
                                    height="24">
                                <span>{{ __('Ganancias') }}</span>
                            </a>
                        </div>
                        <div class="menu-item mb-3 d-flex align-items-center">
                            <a href="{{ url('recursos') }}" style="text-decoration: none; color: inherit;">
                                <img src="{{ asset('assets/Image.svg') }}" alt="Recursos" class="me-2" width="24"
                                    height="24">
                                <span>{{ __('Recursos') }}</span>
                            </a>
                        </div>
                        <div class="menu-item d-flex align-items-center">
                            <a href="{{ url('edit_profile') }}" style="text-decoration: none; color: inherit;">
                                @if (!empty($user_session->profile_photo))
                                    <img src="{{ asset('profile_photo/') }}<?php echo '/' . $user_session->profile_photo; ?>"
                                        class="rounded-circle img-fluid" alt="{{ $user_session->name }}" width="24"
                                        height="24">

                                    <span>Perfil</span>
                                @else
                                    <img src="{{ asset('149071.png') }}" alt="Perfil" class="me-2 rounded-circle"
                                        width="24" height="24">

                                    <span>Perfil</span>
                                @endif


                            </a>
                        </div>
                    </div>
                </div>


                <!-- Main Content -->
                <div class="col-lg-9">
                    <div class="row">
                        <!-- Card 1: Comisiones Pagadas -->
                        <div class="col-lg-3 col-md-6 col-12 mb-4">
                            <div class="card text-white bg-dark">
                                <div class="card-body">
                                    <h4 class="card-title">Bs
                                        {{ \App\Models\User::where('id', $user_session->id)->first()->balance }}</h4>
                                    <p class="card-text">{{ __('Comisiones Pagadas') }}</p>
                                    <a href="#" class="btn btn-outline-primary">{{ __('Ver detalles') }}</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2: Comisiones en Proceso -->
                        <div class="col-lg-3 col-md-6 col-12 mb-4">
                            <div class="card text-white bg-dark">
                                <div class="card-body">
                                    <h4 class="card-title">Bs 50</h4>
                                    <p class="card-text">{{ __('Comisiones en proceso') }}</p>
                                    <a href="#" class="btn btn-outline-primary">{{ __('Ver detalles') }}</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3: Comisiones Pendientes -->
                        <div class="col-lg-3 col-md-6 col-12 mb-4">
                            <div class="card text-white bg-dark">
                                <div class="card-body">
                                    <h4 class="card-title">Bs
                                        {{ \App\Models\User::where('id', $user_session->id)->first()->balance }}</h4>
                                    <p class="card-text">{{ __('Comisiones pendientes') }}</p>
                                    <a class="btn btn-outline-primary"
                                        href="{{ url('requestW') }}">{{ __('Solicitar pago') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sales Table -->
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
                                        <td>{{ $sale->user ? $sale->percentage * 100 . '%' : 'N/A' }}</td>
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
    </section>

    <script>
        $(document).ready(function() {
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
