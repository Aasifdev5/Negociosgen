@extends('master')
@section('title')
{{ __('Libros Recomendados') }}
@endsection
@section('content')
<section style="padding: 150px 0; background: #000000;">
    <div class="container">
        <h1 style="padding-top: 5px; color: white;">{{ __('Libros Recomendados') }}</h1>

        <div class="row">
            @foreach ($audiobooks as $row)
            <div class="col-lg-2 col-md-3 col-6 mb-4">
                <a href="{{ route('showAudiobookDetails', $row->id) }}" > <img class="img-fluid"
                    style="height: auto; background: #1a1a1a; border: 1px solid #2e2e2e; padding: 10px; border-radius: 12px;"
                    src="{{ asset($row->thumbnail) }}" alt="Audio Thumbnail" /></a>

            </div>

            @endforeach
        </div>
        <nav class="pagination justify-content-center">

            @include('admin.pagination', ['paginator' => $audiobooks])
        </nav>

    </div>
</section>
@endsection
