@extends('master')

@section('title')
    {{ __('Detalles de la Noticia') }}
@endsection

@section('content')

    <!-- Main Content Section -->
    <section style="padding: 160px 0 40px 0; background: #000;">
        <div class="container">
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

            <div class="row">
                <!-- Main News Content -->
                <div class="col-lg-8 col-md-12 col-sm-12 col-12 mb-4">
                    <div class="card p-4 text-light" style="background-color: #222; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                        <!-- News Title -->
                        <h2 class="text-white mb-3" style="font-size: 2rem; font-weight: bold;">{{ $news->title }}</h2>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <!-- Author and Date -->
                            @if ($news->author)
                                <p class="text-light" style="font-style: italic; font-size: 1rem;">
                                    {{ __('Publicado por: ') }}<span class="font-weight-bold">{{ $news->author }}</span>
                                </p>
                            @endif
                            @if ($news->created_at)
                                <p class="text-light" style="font-size: 1rem;">
                                    <i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($news->created_at)->format('d M Y, h:i A') }}
                                </p>
                            @endif
                        </div>
                        <hr class="text-light mb-4">

                        <!-- News Thumbnail -->
                        @if ($news->thumbnail)
                            <img class="img-fluid mb-3 rounded" src="{{ asset($news->thumbnail) }}" alt="Thumbnail" style="max-width: 100%; height: auto; border-radius: 10px;">
                        @endif

                        <!-- Content Type: Check if 'file_path' is Image, Audio, or Video -->
                        @if ($news->file_path)
                            @php
                                $fileType = pathinfo($news->file_path, PATHINFO_EXTENSION);
                            @endphp

                            <!-- Image File -->
                            @if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif']))
                                <div class="mb-4">
                                    <img src="{{ asset($news->file_path) }}" alt="News Image" class="img-fluid rounded" style="max-width: 100%; height: auto;">
                                </div>
                            @endif

                            <!-- Audio File -->
                            @if (in_array($fileType, ['mp3', 'wav']))
                                <div class="mb-4">
                                    <audio controls style="width: 100%; background-color: #000; border-radius: 5px;">
                                        <source src="{{ asset($news->file_path) }}" type="audio/{{ $fileType }}">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            @endif

                            <!-- Video File -->
                            @if (in_array($fileType, ['mp4', 'avi', 'mov']))
                                <div class="mb-4">
                                    <video controls width="100%" style="max-height: 400px; border-radius: 10px;">
                                        <source src="{{ asset($news->file_path) }}" type="video/{{ $fileType }}">
                                        Your browser does not support the video element.
                                    </video>
                                </div>
                            @endif
                        @endif

                        <!-- News Content -->
                        <div class="content mb-4" style="line-height: 1.7; font-size: 1.1rem;">
                            {!! $news->content !!}
                        </div>

                    </div>
                </div>

                <!-- Sidebar: Most Read Articles -->
                <div class="col-lg-4 col-md-12 col-sm-12 col-12 mb-4">
                    <div class="sidebar">
                        <div class="lo-ms-ledo-wrapper">
                            <h3 class="text-light" style="font-size: 1.5rem; font-weight: bold;">{{ __('Lo más leído') }}</h3>
                            <hr class="text-light mb-3">
                        </div>
                        @forelse ($latest_posts as $item)
                            <div class="card mb-3" style="border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                                <a href="{{ url('newsDetails/' . $item->id) }}" class="text-white">
                                    <img class="card-img-top" src="{{ asset($item->thumbnail) }}" alt="{{ $item->title }}" style="height: 180px; object-fit: cover; border-radius: 10px;">
                                    <div class="card-body bg-dark text-light" style="border-radius: 0 0 10px 10px;">
                                        <h5 class="card-title" style="font-size: 1.1rem; font-weight: bold;">{{ $item->title }}</h5>
                                        <p class="card-text" style="font-size: 0.9rem; font-weight: 300; line-height: 1.5;">{!! Str::limit($item->content, 100) !!}</p>
                                        <span class="text-light" style="font-size: 0.9rem;">Leer más</span>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="alert alert-warning text-center">
                                <strong>{{ __('No se encontraron publicaciones de blog.') }}</strong>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
