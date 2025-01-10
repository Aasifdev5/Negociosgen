@extends('admin.Master')
@section('title', 'Gestionar Membresías')

@section('content')
<div class="page-body">
    <br>

    <!-- Mensajes de éxito y error -->
    @if (Session::has('success'))
        <div class="alert alert-success">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    @if (Session::has('fail'))
        <div class="alert alert-danger">
            <p>{{ session('fail') }}</p>
        </div>
    @endif
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <h1 class="text-light">Gestionar Membresías</h1>

                <!-- Botón para agregar nueva membresía -->
                <a href="{{ route('memberships.create') }}" class="btn btn-primary mb-3 pull-right">Añadir Nueva Membresía</a>

                <!-- Tabla de membresías -->
                <table id="advance-1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-light text-center">#</th>
                            <th class="text-light">Nombre</th>
                            <th class="text-light">Precio</th>
                            <th class="text-light">Duración</th>
                            <th class="text-light">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($memberships as $membership)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $membership->name }}</td>
                                <td>{{ $membership->price }}</td>
                                <td>{{ $membership->duration }}</td>
                                <td>
                                    <!-- Botón para editar -->
                                    <a href="{{ route('memberships.edit', $membership) }}" class="btn btn-warning btn-sm">Editar</a>

                                    <!-- Formulario para eliminar membresía -->
                                    <form action="{{ route('memberships.destroy', $membership) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                    </form>
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
@endsection
