@extends('master')

@section('title')
Genealogía
@endsection

@section('content')
<style>
    * { margin: 0; padding: 0; }

    .tree ul {
        padding-top: 20px;
        position: relative;
        transition: all 0.5s;
    }

    .tree li {
        float: left;
        text-align: center;
        list-style-type: none;
        position: relative;
        padding: 20px 5px 0 5px;
        transition: all 0.5s;
    }

    .tree li::before, .tree li::after {
        content: '';
        position: absolute;
        top: 0;
        right: 50%;
        border-top: 1px solid #ccc;
        width: 50%;
        height: 20px;
    }

    .tree li::after {
        right: auto;
        left: 50%;
        border-left: 1px solid #ccc;
    }

    .tree li:only-child::after, .tree li:only-child::before {
        display: none;
    }

    .tree li:only-child { padding-top: 0; }

    .tree li:first-child::before, .tree li:last-child::after {
        border: 0 none;
    }

    .tree li:last-child::before {
        border-right: 1px solid #ccc;
        border-radius: 0 5px 0 0;
    }

    .tree li:first-child::after {
        border-radius: 5px 0 0 0;
    }

    .tree ul ul::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        border-left: 1px solid #ccc;
        width: 0;
        height: 20px;
    }

    .tree li a {
        border: 1px solid #ccc;
        padding: 5px 10px;
        text-decoration: none;
        color: #fff;
        font-family: arial, verdana, tahoma;
        font-size: 11px;
        display: inline-block;
        border-radius: 5px;
        transition: all 0.5s;
    }

    .tree li a:hover, .tree li a:hover+ul li a {
        background: #c8e4f8;
        color: #000;
        border: 1px solid #94a0b4;
    }

    .tree li a:hover+ul li::after,
    .tree li a:hover+ul li::before,
    .tree li a:hover+ul::before,
    .tree li a:hover+ul ul::before {
        border-color: #94a0b4;
    }
</style>

<section style="padding: 80px 0; background: #1a1a1a">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tree">
                    <ul class="list-unstyled">
                        <!-- Start rendering from logged-in user -->
                        @if($user_session)
                            <li>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerson"
                                   data-member-name="{{ $user_session->name }}"
                                   data-sales="{{ $user_session->balance }}"
                                   data-referrals="{{ \App\Models\User::where('refer', $user_session->id)->count() }}"
                                   class="p-3">
                                   @if (!empty($user_session->profile_photo))
                                   <img src="{{ asset('profile_photo/') }}<?php echo '/' . $user_session->profile_photo; ?>" class="rounded-circle img-fluid" alt="{{ $user_session->name }}">
                               @else
                               <img src="{{ asset('149071.png') }}" alt="Profile Image"
                               style="width: 30px; height: 30px;" />
                               @endif

                                    <h5 class="card-title">{{ $user_session->name }}</h5>
                                    <p class="card-text d-flex justify-content-between">
                                        <span class="me-3">Referidos: {{ \App\Models\User::where('refer', $user_session->id)->count() }}</span>

                                        <span>Ventas: ${{ $user_session->balance }}</span>
                                    </p>
                                </a>

                                <!-- Render children (referrals) of the logged-in user -->
                                @if(count($user_session->children) > 0)
                                    <ul class="list-unstyled">
                                        @foreach($user_session->children as $child)
                                            <li>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerson"
                                                   data-member-name="{{ $child->name }}"
                                                   data-sales="{{ $child->balance }}"
                                                   data-referrals="{{ \App\Models\User::where('refer', $child->id)->count() }}"
                                                   class="p-3">
                                                   @if (!empty($child->profile_photo))
                                                   <img src="{{ asset('profile_photo/') }}<?php echo '/' . $child->profile_photo; ?>" class="rounded-circle img-fluid" alt="{{ $child->name }}">
                                               @else
                                               <img src="{{ asset('149071.png') }}" alt="Profile Image"
                                               style="width: 30px; height: 30px;" />
                                               @endif

                                                    <h5 class="card-title">{{ $child->name }}</h5>
                                                    <p class="card-text d-flex justify-content-between">
                                                        <span class="me-3">Referidos: {{ \App\Models\User::where('refer', $child->id)->count() }}</span>
                                                        <span>Ventas: ${{ $child->balance }}</span>
                                                    </p>
                                                </a>

                                                <!-- Recursively render the children's children (grandchildren, etc.) -->
                                                @if(count($child->children) > 0)
                                                    <ul class="list-unstyled">
                                                        @foreach($child->children as $grandchild)
                                                            <li>
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerson"
                                                                   data-member-name="{{ $grandchild->name }}"
                                                                   data-sales="{{ $grandchild->balance }}"
                                                                   data-referrals="{{ \App\Models\User::where('refer', $grandchild->id)->count() }}"
                                                                   class="p-3">
                                                                   @if (!empty($grandchild->profile_photo))
                                                                   <img src="{{ asset('profile_photo/') }}<?php echo '/' . $grandchild->profile_photo; ?>" class="rounded-circle img-fluid" alt="{{ $grandchild->name }}">
                                                               @else
                                                               <img src="{{ asset('149071.png') }}" alt="Profile Image"
                                                               style="width: 30px; height: 30px;" />
                                                               @endif

                                                                    <h5 class="card-title">{{ $grandchild->name }}</h5>
                                                                    <p class="card-text d-flex justify-content-between">
                                                                        <span class="me-3">Referidos: {{ \App\Models\User::where('refer', $grandchild->id)->count() }}</span>
                                                                        <span>Ventas: ${{ $grandchild->balance }}</span>
                                                                    </p>
                                                                </a>

                                                                <!-- Check for further descendants (great-grandchildren, etc.) -->
                                                                @if(count($grandchild->children) > 0)
                                                                    <ul class="list-unstyled">
                                                                        @foreach($grandchild->children as $greatGrandchild)
                                                                            <li>
                                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerson"
                                                                                   data-member-name="{{ $greatGrandchild->name }}"
                                                                                   data-sales="{{ $greatGrandchild->balance }}"
                                                                                   data-referrals="{{ \App\Models\User::where('refer', $greatGrandchild->id)->count() }}"
                                                                                   class="p-3">
                                                                                   @if (!empty($greatGrandchild->profile_photo))
                                                                                   <img src="{{ asset('profile_photo/') }}<?php echo '/' . $greatGrandchild->profile_photo; ?>" class="rounded-circle img-fluid" alt="{{ $greatGrandchild->name }}">
                                                                               @else
                                                                               <img src="{{ asset('149071.png') }}" alt="Profile Image"
                                                                               style="width: 30px; height: 30px;" />
                                                                               @endif

                                                                                    <h5 class="card-title">{{ $greatGrandchild->name }}</h5>
                                                                                    <p class="card-text d-flex justify-content-between">
                                                                                        <span class="me-3">Referidos: {{ \App\Models\User::where('refer', $greatGrandchild->id)->count() }}</span>
                                                                                        <span>Ventas: ${{ $greatGrandchild->balance }}</span>
                                                                                    </p>
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalPerson" tabindex="-1" aria-labelledby="modalPersonLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header border-bottom border-secondary">
                    <h5 class="modal-title" id="modalPersonLabel">Detalles de Miembro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column align-items-center mb-4">
                        <img class="rounded-circle mt-3" src="Ellipse 1 (1).svg" alt="Member Photo" style="width: 80px; height: 80px;">
                        <div class="text-center">
                            <div class="badge bg-primary text-white">Nivel 1</div>
                            <b class="d-block mt-1" id="memberName">Luis Martínez</b>
                        </div>
                    </div>
                    <div class="row text-center mb-3">
                        <div class="col">
                            <b id="totalSales">$500</b>
                            <div>Ventas Totales</div>
                        </div>
                        <div class="col">
                            <b id="referralsActive">50</b>
                            <div>Referidos Activos</div>
                        </div>
                    </div>
                    <h5 class="mt-4">Últimas ventas</h5>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Fecha de Venta</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad Vendida</th>
                                    <th scope="col">Precio Unitario</th>
                                    <th scope="col">Total de Venta</th>
                                    <th scope="col">Comisión Generada</th>
                                </tr>
                            </thead>
                            <tbody id="salesDetails">
                                <!-- Dynamic sales data will go here -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer border-top border-secondary justify-content-center">
                    <button class="btn btn-primary">Enviar mensaje</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('.tree a[data-bs-toggle="modal"]').on('click', function () {
            var memberName = $(this).data('member-name');
            var memberSales = $(this).data('sales');
            var memberReferrals = $(this).data('referrals');

            $('#memberName').text(memberName);
            $('#totalSales').text('$' + memberSales);
            $('#referralsActive').text(memberReferrals);

            // You can also dynamically load the sales details from a database if needed
            var salesDetails = '<tr><td>15/09/24</td><td>Curso de Marketing</td><td>1</td><td>$50.00</td><td>$50.00</td><td>$10.00</td></tr>';
            $('#salesDetails').html(salesDetails);
        });
    });
</script>
@endsection
