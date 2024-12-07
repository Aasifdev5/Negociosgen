@extends('master')
@section('title')
    {{ $audiobook->title }} - {{ __('Detalles del Audiolibro') }}
@endsection

@section('content')
    <div class="container py-5" style="margin-top: 120px; margin-bottom: 50px;">
        <h1 class="text-center text-light mb-5">{{ $audiobook->title }}</h1>

        <div class="row align-items-center">
            <!-- Audiobook Thumbnail -->
            <div class="col-lg-6 mb-4">
                <div class="thumbnail-container">
                    <img class="img-fluid shadow"
                        src="{{ asset($audiobook->thumbnail) }}"
                        alt="Audiobook Thumbnail" />
                </div>
            </div>

            <!-- Audiobook Details -->
            <div class="col-lg-6">
                <div class="details-container text-light">
                    <h2 class="mb-4">{{ $audiobook->title }}</h2>
                    <p class="mb-5">{{ $audiobook->description }}</p>

                    <!-- Audio Player -->
                    <div class="audio-player-container">
                        <audio id="audioPlayer" controls>
                            <source src="{{ asset($audiobook->audio_file_path) }}" type="audio/mp3">
                            Your browser does not support the audio element.
                        </audio>
                    </div>

                    <ul class="details-list mt-5">
                        <li class="mb-2"><strong>{{ __('Duración') }}:</strong> {{ $audiobook->duration }}</li>
                        <li><strong>{{ __('Publicado') }}:</strong> {{ $audiobook->created_at->format('d M Y') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            background: #111;
        }

        .container {
            max-width: 900px;
        }

        .thumbnail-container img {
            width: 100%;
            border-radius: 12px;
            border: 1px solid #2e2e2e;
            margin-bottom: 20px;
        }

        .details-container {
            padding: 25px;
            background: #1a1a1a;
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.5);
        }

        .details-container h2 {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .details-container p {
            color: #ddd;
            line-height: 1.8;
        }

        .details-list {
            list-style: none;
            padding: 0;
            margin: 0;
            color: #ccc;
        }

        .details-list li {
            font-size: 1rem;
            margin: 5px 0;
        }

        .audio-player-container {
            background: #222;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        #audioPlayer {
            width: 100%;
            outline: none;
            border-radius: 8px;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const audioPlayer = document.getElementById('audioPlayer');

            // Example of event listener for play/pause
            audioPlayer.addEventListener('play', function () {
                console.log('Audio is now playing.');
            });

            audioPlayer.addEventListener('pause', function () {
                console.log('Audio playback has been paused.');
            });
        });
    </script>
@endsection
