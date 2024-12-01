@extends('master')

@section('title')
    Genealogía
@endsection

@section('content')
    <style>
        * {
            margin: 0;
            padding: 0;
        }

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

        .tree li::before,
        .tree li::after {
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

        .tree li:only-child::after,
        .tree li:only-child::before {
            display: none;
        }

        .tree li:only-child {
            padding-top: 0;
        }

        .tree li:first-child::before,
        .tree li:last-child::after {
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
            background: #000;
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

        .tree li a:hover,
        .tree li a:hover+ul li a {
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
                <div class="col-lg-3">
                    <div class="text-white p-3 rounded" style="background: #000">
                        <div class="menu-item mb-3 d-flex align-items-center">
                            <a href="{{ url('dashboard') }}" style="text-decoration: none; color: inherit;">
                                <img src="{{ asset('assets/ChartBar.svg') }}" alt="Dashboard" class="me-2" width="24" height="24">
                                <span>Dashboard</span>
                            </a>
                        </div>
                        <div class="menu-item mb-3 d-flex align-items-center">
                            <a href="{{ url('geanologìa') }}" style="text-decoration: none; color: inherit;">
                                <img src="{{ asset('assets/TreeStructure.svg') }}" alt="Genealogía" class="me-2" width="24" height="24">
                                <span>Genealogía</span>
                            </a>
                        </div>
                        <div class="menu-item mb-3 d-flex align-items-center">
                            <a href="{{ url('ganancias') }}" style="text-decoration: none; color: inherit;">
                                <img src="{{ asset('assets/Wallet.svg') }}" alt="Ganancias" class="me-2" width="24" height="24">
                                <span>Ganancias</span>
                            </a>
                        </div>
                        <div class="menu-item mb-3 d-flex align-items-center">
                            <a href="{{ url('recursos') }}" style="text-decoration: none; color: inherit;">
                                <img src="{{ asset('assets/Image.svg') }}" alt="Recursos" class="me-2" width="24" height="24">
                                <span>Recursos</span>
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

                <div class="col-lg-9">
                    <div class="tree">
                        <ul class="list-unstyled">
                            <!-- Start rendering from logged-in user -->
                            @if($user_session)
                                <li>

                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalPerson"
                                       data-member-name="{{ $user_session->name }}" data-id="{{ $user_session->id }}"
                                       data-image="{{ !empty($user_session->profile_photo) ? asset('profile_photo/'.$user_session->profile_photo) : asset('149071.png') }}"
                                       data-sales="{{ $user_session->balance }}"
                                       data-referrals="{{ \App\Models\User::where('refer', $user_session->id)->count() }}"
                                       data-level="{{ $user_session->level }}" class="p-3">
                                       @if (!empty($user_session->profile_photo))
                                       <img src="{{ asset('profile_photo/') }}<?php echo '/' . $user_session->profile_photo; ?>" class="rounded-circle img-fluid" alt="{{ $user_session->name }}">
                                       <br>
                                       <span class="badge bg-primary" style="margin-top: 10px">Nivel {{ $user_session->level }}</span> <!-- Display Level -->
                                   @else
                                   <img src="{{ asset('149071.png') }}" alt="Profile Image"
                                   style="width: 60px; height: 60px;" />
                                   <br>
                                   <span class="badge bg-primary" style="margin-top: 10px">Nivel {{ $user_session->level }}</span> <!-- Display Level -->
                                   @endif

                                        <h5 class="card-title" style="margin-top: 10px">{{ $user_session->name }}</h5>
                                        <hr>
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
                                                       data-member-name="{{ $child->name }}" data-id="{{ $child->id }}"
                                                       data-sales="{{ $child->balance }}"
                                                       data-referrals="{{ \App\Models\User::where('refer', $child->id)->count() }}"
                                                       data-level="{{ $child->level }}" class="p-3">
                                                       @if (!empty($child->profile_photo))
                                                       <img src="{{ asset('profile_photo/') }}<?php echo '/' . $child->profile_photo; ?>" class="rounded-circle img-fluid" alt="{{ $child->name }}">
                                                       <br>
                                                       <span class="badge bg-primary" style="margin-top: 10px">Nivel {{ $child->level }}</span> <!-- Display Level -->
                                                   @else
                                                   <img src="{{ asset('149071.png') }}" alt="Profile Image"
                                                   style="width: 60px; height: 60px;" />
                                                   <br>
                                                   <span class="badge bg-primary" style="margin-top: 10px">Nivel {{ $child->level }}</span> <!-- Display Level -->
                                                   @endif

                                                        <h5 class="card-title" style="margin-top: 10px">{{ $child->name }}</h5>
                                                        <hr>
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
                                                                       data-member-name="{{ $grandchild->name }}" data-id="{{ $grandchild->id }}"
                                                                       data-sales="{{ $grandchild->balance }}"
                                                                       data-referrals="{{ \App\Models\User::where('refer', $grandchild->id)->count() }}"
                                                                       data-level="{{ $grandchild->level }}" class="p-3">
                                                                       @if (!empty($grandchild->profile_photo))
                                                                       <img src="{{ asset('profile_photo/') }}<?php echo '/' . $grandchild->profile_photo; ?>" class="rounded-circle img-fluid" alt="{{ $grandchild->name }}">
                                                                       <br>
                                                                   <span class="badge bg-primary" style="margin-top: 10px">Nivel {{ $grandchild->level }}</span> <!-- Display Level -->
                                                                   @else
                                                                   <img src="{{ asset('149071.png') }}" alt="Profile Image"
                                                                   style="width: 60px; height: 60px;" />
                                                                   <br>
                                                                   <span class="badge bg-primary" style="margin-top: 10px">Nivel {{ $grandchild->level }}</span> <!-- Display Level -->
                                                                   @endif

                                                                        <h5 class="card-title" style="margin-top: 10px">{{ $grandchild->name }}</h5>
                                                                        <hr>
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
                                                                                       data-member-name="{{ $greatGrandchild->name }}" data-id="{{ $greatGrandchild->id }}"
                                                                                       data-sales="{{ $greatGrandchild->balance }}"
                                                                                       data-referrals="{{ \App\Models\User::where('refer', $greatGrandchild->id)->count() }}"
                                                                                       data-level="{{ $greatGrandchild->level }}" class="p-3">
                                                                                       @if (!empty($greatGrandchild->profile_photo))
                                                                                       <img src="{{ asset('profile_photo/') }}<?php echo '/' . $greatGrandchild->profile_photo; ?>" class="rounded-circle img-fluid" alt="{{ $greatGrandchild->name }}">
                                                                                       <br>
                                                                                   <span class="badge bg-primary" style="margin-top: 10px">Nivel {{ $greatGrandchild->level }}</span> <!-- Display Level -->
                                                                                   @else
                                                                                   <img src="{{ asset('149071.png') }}" alt="Profile Image"
                                                                                   style="width: 60px; height: 60px;" />
                                                                                   <br>
                                                                                   <span class="badge bg-primary" style="margin-top: 10px">Nivel {{ $greatGrandchild->level }}</span> <!-- Display Level -->
                                                                                   @endif

                                                                                        <h5 class="card-title" style="margin-top: 10px">{{ $greatGrandchild->name }}</h5>
                                                                                        <hr>
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
    </section>

    <div class="modal fade" id="modalPerson" tabindex="-1" aria-labelledby="modalPersonLabel" aria-hidden="true" style="">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content" style="background: #000">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="modalPersonLabel">Perfil del Miembro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
        style="filter: invert(100%); background-color: transparent; opacity: 1;"></button>

                </div>
                <div class="modal-body">
                    <!-- Member Info -->
                    <div class="d-flex flex-column align-items-center mb-4">
                        <img id="memberPhoto" class="rounded-circle mt-3" src="" alt="Member Photo" style="width: 80px; height: 80px;">
                        <div class="text-center">
                            <div class="badge bg-primary text-white" id="memberLevel">Nivel 1</div>
                            <b class="d-block mt-1 text-white" id="memberName">Luis Martínez</b>
                        </div>
                    </div>

                    <div class="row text-center mb-3 g-3">
                        <div class="col text-white"
                             style="background: #1a1a1a; border:#1a1a1a; border-radius:10px; padding:15px;margin-right: 5px;">
                            <b id="totalSales">$500</b>
                            <div>Ventas Totales</div>
                        </div>
                        <div class="col-sm-6 text-white"
                             style="background: #1a1a1a; border:#1a1a1a; border-radius:10px; padding:15px;">
                            <b id="referralsActive">50</b>
                            <div>Referidos Activos</div>
                        </div>
                    </div>


                    <!-- Sales Table -->
                    <h5 class="mt-4 text-white">Últimas ventas</h5>
                    <div class="table-responsive">
                        <table id="salesTable" class="table table-bordered table-dark">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Referido</th>
                                    <th>Nivel</th>
                                    <th>Porcentaje</th>
                                    <th>Comisión Generada</th>
                                </tr>
                            </thead>
                            <tbody id="salesDetails">
                                <tr>
                                    <td colspan="6" class="text-center">Cargando datos...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
      $(document).ready(function () {
    $('.tree a[data-bs-toggle="modal"]').on('click', function () {
        const memberId = $(this).data('id');
        const memberName = $(this).data('member-name');
        const memberSales = $(this).data('sales');
        const memberReferrals = $(this).data('referrals');
        const memberLevel = $(this).data('level');
        const memberImage = $(this).data('image');

        // Update modal with member info
        $('#memberName').text(memberName);
        $('#totalSales').text('$' + memberSales.toLocaleString());
        $('#referralsActive').text(memberReferrals);
        $('#memberLevel').text('Nivel ' + memberLevel);
        $('#memberPhoto').attr('src', memberImage);

        // Show loading message while data is being fetched
        $('#salesDetails').html('<tr><td colspan="6" class="text-center">Cargando datos...</td></tr>');

        // Make AJAX request to fetch sales data
        $.ajax({
            url: `/sales-details/${memberId}`,
            method: 'GET',
            success: function (data) {
                if (data.length > 0) {
                    const salesRows = data.map((sale, index) => {
                        const percentage = parseFloat(sale.percentage) * 100;
                        const commission = parseFloat(sale.commission).toFixed(2);
                        return `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${sale.date || 'N/A'}</td>
                                <td>${sale.user ? sale.user.name : 'N/A'}</td>
                                <td>${sale.user ? sale.user.level : 'N/A'}</td>
                                <td>${percentage.toFixed(2)}%</td>
                                <td>$${commission}</td>
                            </tr>
                        `;
                    });
                    $('#salesDetails').html(salesRows.join(''));
                } else {
                    $('#salesDetails').html('<tr><td colspan="6" class="text-center">No hay datos disponibles</td></tr>');
                }
            },
            error: function () {
                $('#salesDetails').html('<tr><td colspan="6" class="text-center">Error al cargar datos</td></tr>');
            }
        });
    });
});

    </script>

@endsection
