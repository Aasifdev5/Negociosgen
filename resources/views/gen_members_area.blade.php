@extends('master')
@section('title')
    {{ __('GEN Members Area') }}
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
        <h2 class="fw-bold text-light">{{ __('GEN Members Area') }}</h2>
        <p class="lead text-light">
            {{ __('Welcome to the GEN Members Area! Here you can access exclusive benefits and resources.') }}
        </p>
    </div>

    {{-- Benefits Section --}}
    <div class="row mb-5">
        <div class="col-md-6 mx-auto">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <i class="fas fa-graduation-cap me-2 text-primary"></i>
                    {{ __('Financial education courses and personal development resources.') }}
                </li>
                <li class="list-group-item">
                    <i class="fas fa-calendar-alt me-2 text-success"></i>
                    {{ __('Monthly, national, and international events.') }}
                </li>
                <li class="list-group-item">
                    <i class="fas fa-percent me-2 text-warning"></i>
                    {{ __('Discounts at GEN partner companies.') }}
                </li>
            </ul>
        </div>
    </div>

    {{-- Action Buttons --}}
    <div class="text-center">
        <a href="{{ url('course') }}" class="btn btn-primary me-2">
            <i class="fas fa-book-open me-1"></i> {{ __('Access Courses') }}
        </a>
        <a href="{{ url('partners') }}" class="btn btn-secondary me-2">
            <i class="fas fa-handshake me-1"></i> {{ __('View Partner Companies') }}
        </a>
        <a href="{{ url('events') }}" class="btn btn-success">
            <i class="fas fa-calendar me-1"></i> {{ __('Explore Events') }}
        </a>
    </div>
</section>

@endsection
