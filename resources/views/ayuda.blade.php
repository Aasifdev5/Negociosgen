@extends('master')
@section('title')
    {{ __('¿Necesitas ayuda?') }}
@endsection
@section('content')
    <section style="padding: 90px 0;background: #000;">

        <div class="container my-5">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ session::get('success') }}</p>
                </div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">
                    <p>{{ session::get('fail') }}</p>
                </div>
            @endif
            <h1 class="text-center" style="color: #ededed;">{{ __('¿Necesitas') }} <span
                    style="color: #0090ff;">{{ __('Ayuda?') }}</span></h1>
            <form action="{{ url('/ayuda') }}" method="GET" style="width: 100%; max-width: 600px; margin: auto;">
                <div class="input-group" style="position: relative; display: flex; align-items: center;">
                    <input type="text" name="query" class="form-control" placeholder="Buscar con palabras claves"
                        style="width: 100%; background-color: ; border-radius: 8px; border: 1px solid #333; padding-left: 40px; height: 48px; color: #8F8F8F; font-size: 16px;">
                    <img class="search-icon" alt="Buscar" src="{{ asset('assets/search.svg') }}"
                        style="position: absolute; left: 12px; width: 20px; height: 20px; filter: brightness(0.8);">
                </div>
            </form>

            <div class="container my-4">
                <style>
                    /* Additional styles for the cards */
                    .transparent-card {
                        background-color: #000;
                        /* Set background color to black */
                        border: 1px solid rgba(46, 46, 46, 0.5);
                        /* Optional: Semi-transparent border */
                    }

                    .transparent-card .card-body {
                        color: #fff;
                        /* Set text color to white */
                    }

                    .transparent-card .card-title,
                    .transparent-card .card-text {
                        color: #fff;
                        /* Ensure titles and text are white */
                    }
                </style>

                <div class="row">
                    @php
                    $currentLang = session('locale', config('app.locale'));
                @endphp

                @if ($supportQuestions->count())
                    @foreach ($supportQuestions as $question)
                        <div class="col-lg-4 col-12 mb-4">
                            <div class="card image-parent h-100 transparent-card">
                                <div class="card-body stack">
                                    <h5 class="card-title fw-bold ttulo-del-blog">
                                        {{ $question->getTranslation('question', $currentLang) ?? $question->getTranslation('question', 'en') ?? 'Question not available' }}
                                    </h5>
                                    <p class="card-text estamos-dedicados-a">
                                        {{ $question->getTranslation('answer', $currentLang) ?? $question->getTranslation('answer', 'en') ?? 'Answer not available' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach


                @else
                    <div class="alert alert-warning text-center">
                        <strong>{{ __('No se encontraron resultados para tu búsqueda.') }}</strong>
                    </div>
                @endif
                </div>

            </div>






        </div>
        <nav class="pagination justify-content-center">
            @include('admin.pagination', ['paginator' => $supportQuestions])

        </nav>
        <div class="container">
            <div class="container my-5 p-4"
                style="background-color: #0f1c2e; border: 1px solid #2E2E2E; border-radius: 16px;">
                <div class="row">
                    <div class="col-12 col-md-8 text-start mb-3 mb-md-0">
                        <h2 class="deseas-obtener-un text-light mb-3">{{ __('¡Deseas obtener un ingreso adicional?') }}
                        </h2>
                        <p class="no-esperes-ms text-light" style="max-width: 600px; color: #A1A1A1;">
                            {{ __('No esperes más para ser parte de este increíble proyecto. Empieza hoy mismo a transformar tu vida y la de quienes te rodean.') }}
                        </p>
                    </div>
                    <div class="col-12 col-md-4 text-end d-flex align-items-center justify-content-end">
                        <a href="{{ url('membership') }}" class="btn btn-primary btn-lg">{{ __('Únete ahora') }}</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
