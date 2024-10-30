@extends('admin.Master')
@section('title')
    Plantillas de Correo
@endsection
@section('content')

<div class="page-body" style="background: #000">
    <br>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
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
                <div class="card" style="background: #fff">
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
                        <h5>LISTA DE PLANTILLAS DE CORREO</h5>
                        <a class="btn btn-pill btn-primary btn-air-primary pull-right"
                           href="{{ url('admin/mail-templates/add') }}"
                           data-toggle="tooltip"
                           title=""
                           role="button"
                           data-bs-original-title="btn btn-primary">
                            Agregar Plantillas de Correo
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="advance-1">
                                <thead>
                                    <tr>
                                        <th class="tb-w-2x">#</th>
                                        <th class="tb-w-3x">Nombre</th>
                                        <th class="tb-w-7x">Asunto</th>
                                        <th class="tb-w-3x">Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mailTemplates as $mailTemplate)
                                        <tr class="item">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>

                                                <a href="{{ url('admin/mail-templates/edit', $mailTemplate->id) }}" class="text-dark d-inline">
                                                    <i data-feather="mail" ></i> {{ $mailTemplate->name }}
                                                </a>
                                            </td>
                                            <td>{{ $mailTemplate->subject }}</td>
                                            <td>
                                                @if ($mailTemplate->status)
                                                    <span class="badge bg-success">Activo</span>
                                                @else
                                                    <span class="badge bg-danger">Desactivado</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-sm rounded-3"
                                                            data-bs-toggle="dropdown"
                                                            aria-expanded="true">
                                                        <i class="fa fa-ellipsis-v fa-sm text-muted"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-sm-end"
                                                        data-popper-placement="bottom-end">
                                                        <li>
                                                            <a class="dropdown-item"
                                                               href="{{ url('admin/mail-templates/edit', $mailTemplate->id) }}">
                                                                <i class="fa fa-edit me-2"></i>Editar
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DOM / jQuery Ends -->
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

@endsection
