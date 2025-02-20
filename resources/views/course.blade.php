@extends('master')
@section('title')
    {{ __('Cursos') }}
@endsection
@section('content')

<section style="padding: 100px 0; background-color: #000; position: relative;">
    <div class="container">
        <div class="row">
            @foreach ($courses as $index => $row)
                @php
                    // Ensure $row->courses is always an array
                    $courseItems = is_string($row->courses) ? json_decode($row->courses, true) : $row->courses;
                    $courseItems = is_array($courseItems) ? $courseItems : [];

                    // Get video embed URL safely
                    $embedUrl = method_exists($row, 'getEmbedUrl') ? $row->getEmbedUrl($row->coach_video) : '#';
                @endphp

                @if ($index % 2 == 0)
                    <div class="col-lg-6 col-md-12 text-center text-md-start" style="padding-bottom: 10px;">
                        <h2 class="mb-4" style="color: #EDEDED; font-family: Space Grotesk; font-weight: 700;">
                            {{ $row->course_title }}
                        </h2>
                        <p style="color: #A1A1A1; font-size: 16px; font-family: Space Grotesk; font-weight: 400; line-height: 24px;">
                            {{ $row->course_description }}
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-12" style="padding-bottom: 10px;">
                        <div class="video-container">
                            <div class="gradient-overlay"></div>
                            <img src="{{ asset($row->coach_thumbnail) }}" class="thumbnail" alt="Coach Thumbnail" />
                            <span class="play-button" onclick="playVideo(this)">
                                <img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" />
                            </span>
                            <div class="embed-responsive" style="display: none;">
                                <iframe class="embed-responsive-item"
                                    src="{{ $embedUrl }}"
                                    frameborder="0"
                                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media"
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                    title="Video Player">
                                </iframe>
                            </div>
                        </div>
                        <h1 style="color: #EDEDED; font-size: 20px; font-family: Space Grotesk; font-weight: 700;">
                            {{ $row->coach_name }}
                        </h1>
                    </div>
                @else
                    <div class="col-lg-6 col-md-12" style="padding-bottom: 10px;">
                        <div class="video-container">
                            <div class="gradient-overlay"></div>
                            <img src="{{ asset($row->coach_thumbnail) }}" class="thumbnail" alt="Coach Thumbnail" />
                            <span class="play-button" onclick="playVideo(this)">
                                <img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" />
                            </span>
                            <div class="embed-responsive" style="display: none;">
                                <iframe class="embed-responsive-item"
                                    src="{{ $embedUrl }}"
                                    frameborder="0"
                                    allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media"
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                    title="Video Player">
                                </iframe>
                            </div>
                        </div>
                        <h1 style="color: #EDEDED; font-size: 20px; font-family: Space Grotesk; font-weight: 700;">
                            {{ $row->coach_name }}
                        </h1>
                    </div>
                    <div class="col-lg-6 col-md-12 text-center text-md-start" style="padding-bottom: 10px;">
                        <h2 class="mb-4" style="color: #EDEDED; font-family: Space Grotesk; font-weight: 700;">
                            {{ $row->course_title }}
                        </h2>
                        <p style="color: #A1A1A1; font-size: 16px; font-family: Space Grotesk; font-weight: 400; line-height: 24px;">
                            {{ $row->course_description }}
                        </p>
                    </div>
                @endif

                <!-- Course Videos Section -->
                <div class="row">
                    @foreach ($courseItems as $courseItem)
                        @php
                            $courseEmbedUrl = method_exists($row, 'getEmbedUrl') ? $row->getEmbedUrl($courseItem['video_url']) : '#';
                        @endphp
                        <div class="col-lg-3 col-md-6" style="margin-bottom: 20px;">
                            <div class="course-video" style="width: 100%; max-width: 265px; text-align: center;">
                                <div class="video-container" style="position: relative; width: 100%; height: 192px; overflow: hidden; display: flex; justify-content: center; align-items: center;">
                                    <div class="gradient-overlay"></div>
                                    <img src="{{ asset($courseItem['thumbnail']) }}" class="thumbnail img-fluid" alt="Course Thumbnail"
                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;" />

                                    @if (!empty($user_session))
                                        <span class="play-button" onclick="playVideo(this)">
                                            <img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" />
                                        </span>
                                    @else
                                        <a href="{{ url('Userlogin') }}">
                                            <span class="play-button">
                                                <img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" />
                                            </span>
                                        </a>
                                    @endif

                                    <div class="embed-responsive" style="display: none;">
                                        <iframe class="embed-responsive-item"
                                            src="{{ $courseEmbedUrl }}"
                                            frameborder="0"
                                            allow="autoplay; encrypted-media"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                                <h4 style="color: #EDEDED; margin-top: 10px;">{{ $courseItem['title'] }}</h4>
                                <p style="color: #E0E0E0;">Coach: {{ $row->coach_name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <script>
            function playVideo(button) {
                const videoContainer = button.closest('.video-container');
                const iframe = videoContainer.querySelector('iframe');
                const embedResponsive = videoContainer.querySelector('.embed-responsive');

                // Show the embed-responsive div
                embedResponsive.style.display = 'block';

                // Request full screen for the iframe
                if (iframe.requestFullscreen) {
                    iframe.requestFullscreen();
                } else if (iframe.mozRequestFullScreen) { // Firefox
                    iframe.mozRequestFullScreen();
                } else if (iframe.webkitRequestFullscreen) { // Chrome, Safari, and Opera
                    iframe.webkitRequestFullscreen();
                } else if (iframe.msRequestFullscreen) { // IE/Edge
                    iframe.msRequestFullscreen();
                }

                // Play the video
                iframe.src += "&autoplay=1"; // Add autoplay parameter to the iframe URL
            }
        </script>

        <nav class="pagination justify-content-center">
            @include('admin.pagination', ['paginator' => $courses])
        </nav>
    </div>
</section>

@endsection
