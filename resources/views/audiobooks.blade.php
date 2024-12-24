@extends('master')
@section('title')
{{ __('Libros Recomendados') }}
@endsection
@section('content')

<section style="padding: 150px 0; background: #000000;">
    <div class="container">
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
        <h1 style="padding-top: 5px; color: white;">{{ __('Libros Recomendados') }}</h1>

        <div class="row">
            @foreach ($audiobooks as $row)
            <div class="col-lg-6 col-md-6 col-12 mb-4">
                <div style="background: #000; padding: 15px; border: 1px solid #2e2e2e; border-radius: 8px;">
                    <!-- Audiobook Title -->
                    <h3 style="color: white; font-size: 18px; margin-bottom: 10px;">
                        <a href="{{ route('showAudiobookDetails', $row->id) }}" style="color: #00aced; text-decoration: none;">
                            {{ $row->title }}
                        </a>
                    </h3>

                    <!-- Audiobook Description -->
                    <p style="color: #ccc; font-size: 14px; margin-bottom: 10px;">
                        {{ $row->author }}
                    </p>

                    <!-- Link to More Details -->
                    <a href="{{ route('showAudiobookDetails', $row->id) }}" class="btn btn-sm btn-secondary">
                        {{ __('Más información') }}
                    </a>
                </div>
            </div>
        @endforeach
        </div>
        <nav class="pagination justify-content-center">

            @include('admin.pagination', ['paginator' => $audiobooks])
        </nav>

    </div>
</section>
@endsection
