@extends('admin.Master')

@section('title')
    Todos los usuarios pasan tiempo
@endsection

@section('content')
<style>
    .page-body {
        padding: 20px;
    }
    .card {
        margin-bottom: 20px;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
    }
    .table th, .table td {
        padding: 10px;
        text-align: left;
        vertical-align: middle;
    }
    .table th {
        background-color: #343a40;
        color: #ffffff;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }
    .table-striped tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.1);
    }
</style>
<div class="page-body">
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Todos los usuarios pasan tiempo en la plataforma</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                   <table id="advance-1" class="table table-striped table-bordered">
   <thead class="thead-dark">
    <tr>
        <th class="text-center">Última vez visto</th>
        <th class="text-center">Nombre de usuario</th>
        
        <th class="text-center">Tiempo pasado hoy</th>
        <th class="text-center">Tiempo dedicado esta semana</th>
        <th class="text-center">Tiempo total dedicado</th>
    </tr>
</thead>
<tbody>
    @foreach($usersTimeSpent as $userData)
    <tr>
         <td class="text-center">{{ $userData['lastSeen'] }}</td>
        <td class="text-center">{{ $userData['user']->name }}</td>
       
        <td class="text-center">{{ $userData['timeSpentToday'] }}</td>
        <td class="text-center">{{ $userData['timeSpentThisWeek'] }}</td>
        <td class="text-center">{{ $userData['timeSpentTotal'] }}</td>
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

