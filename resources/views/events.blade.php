@extends('master')
@section('title')
    {{ __('Eventos') }}
@endsection
@section('content')
    <br>

    <section class="container-fluid py-5" style="background-color: #000;">
        {{-- Success and Error Messages --}}
        @if (Session::has('success'))
            <div class="alert alert-success">
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger">
                <p>{{ Session::get('fail') }}</p>
            </div>
        @endif

        {{-- Page Heading --}}
        <div class="text-center mb-5">
            <h2 class="fw-bold text-light">{{ __('Eventos') }}</h2>
            <p class="lead text-light">
                {{ __('Manténgase actualizado con los últimos eventos organizados por GEN.') }}
            </p>
        </div>

        {{-- Events Listing --}}
        <div class="row justify-content-center">
            @forelse($events as $event)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">

                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text text-muted d-flex align-items-center">
                                <!-- Date -->
                                <span class="mr-3">
                                    <i class="fas fa-calendar-alt text-primary"></i>
                                    {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}
                                </span>

                                <!-- Time -->
                                <span class="mr-3">
                                    &nbsp<i class="fas fa-clock text-warning"></i>
                                    {{ $event->time }}
                                </span>

                                <!-- Location -->
                                <span class="text-primary">
                                    &nbsp <i class="fas fa-map-marker-alt"></i>
                                    {{ $event->location }}
                                </span>
                            </p>

                            <!-- Add some styling for spacing and alignment -->
                            <style>
                                .card-text {
                                    font-size: 1rem;
                                }

                                .card-text i {
                                    margin-right: 8px;
                                }

                                .card-text .text-muted {
                                    font-size: 0.875rem;
                                }

                                .card-text .text-primary {
                                    font-weight: bold;
                                }
                            </style>


                            <p class="card-text">
                                {!! Str::limit($event->description, 100) !!}
                            </p>
                            <a href="{{ $event->link }}" class="btn btn-primary">
                                {{ __('Únase a Meet Now') }}
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-light">
                    <p>{{ __('No events found.') }}</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if ($events->hasPages())
            <nav class="pagination justify-content-center">
                @include('admin.pagination', ['paginator' => $events])
            </nav>
        @endif

    </section>
@endsection
