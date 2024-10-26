@extends('admin.Master')
@section('title')
    {{ $title }}
@endsection
@section('content')
<div class="page-body">
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Tracked Screen Times of Each Product</h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="advance-1" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>URL</th>
                                <!--<th>User Name</th>-->
                                <th>Time Spent (minutes)</th>
                                {{-- <th>Recorded At</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trackedTimes as $index => $time)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $time->product->title ?? 'Unknown Product' }}</td> <!-- Handle if product name is not available -->
                                <td>{{ $time->url }}</td>
                                <!--<td>{{ $time->user->name ?? 'Unknown User' }}</td> <!-- Handle if user name is not available -->
                                <td>{{ $time->total_time_spent / 60000 }}</td> <!-- Convert milliseconds to minutes -->
                                {{-- <td>
                                    @if ($time->created_at)
                                        {{ $time->created_at->format('F j, Y') }}
                                    @else
                                        Unknown Time
                                    @endif
                                </td> --}}
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


