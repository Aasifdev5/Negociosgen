@extends('master')
@section('title')
    {{ __('Partner Companies') }}
@endsection
@section('content')
<br>

<section class="container-fluid py-5" style="background-color: #000;">
    {{-- Success and Error Messages --}}
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

    {{-- Page Heading --}}
    <div class="text-center mb-5">
        <h2 class="fw-bold text-light">{{ __('Partner Companies') }}</h2>
        <p class="lead text-light">

        </p>
    </div>
    <div class="row g-4">
        @foreach ($brands as $row)
        <div class="col-lg-4 col-md-4 col-sm-12 text-center p-3">
            <div style="border: 1px solid #2e2e2e; padding: 10px; border-radius: 12px;">
                <img class="img-fluid mb-2" src="{{ asset($row->thumbnail) }}" alt="UFC Gym Image"
                    style="max-width: 100px; height: 100px; object-fit: contain;">
                <div class="fw-bold text-light">{{ $row->name }}</div>
                <div class="" style="color: #A1A1A1;">({{ $row->address }})</div>
            </div>
        </div>

        @endforeach

    </div>

    <nav class="pagination justify-content-center">
        @include('admin.pagination', ['paginator' => $brands])

    </nav>

</section>

@endsection
