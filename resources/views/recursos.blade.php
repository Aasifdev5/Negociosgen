@extends('master')
@section('title')
    {{ __('Recursos') }}
@endsection
@section('content')
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
    <section style="padding: 80px 0; background: #000">
        <div class="container mt-5">
            <!-- Title Section -->
            <h1 class="text-center text-light mb-4">{{ __('Elige tu recurso y ') }}<span
                    class="text-primary">{{ __('Aumenta tus Ganancias') }}</span>
            </h1>

            <div class="row mb-4">
                <div class="col-sm-3 mb-3">

                    <form action="{{ url('/recursos') }}" method="GET" style="">
                        <div class="input-group" style="position: relative; display: flex; align-items: center;">
                            <input type="text" name="query" class="form-control"
                                placeholder="Buscar con palabras claves"
                                style="width: 100%; background-color: ; border-radius: 8px; border: 1px solid #333; padding-left: 40px; height: 39px; color: #8F8F8F; font-size: 16px;">
                            <img class="search-icon" alt="Buscar" src="{{ asset('assets/search.svg') }}"
                                style="position: absolute; left: 12px; width: 20px; height: 20px; filter: brightness(0.8);">
                        </div>
                    </form>
                </div>

                <div class="col-sm-12 text-end mb-3">
                    <button type="button" class="btn btn-sm btn-primary pull-right">{{ __('Ver Estadísticas') }}</button>
                </div>
            </div>

            <h1 class="text-light mb-3">{{ __('Banderas') }}</h1>
            <!-- Banners Section -->
            <div class="row mb-4">
                @foreach ($banners as $row)
                    <div class="col-md-3 mb-3">
                        <img src="{{ asset($row->image) }}" class="img-fluid" alt="{{ $row->name }}"
                            data-bs-toggle="modal" data-bs-target="#bannerModal"
                            onclick="setModalContent('{{ asset($row->image) }}', '{{ $row->name }}')">
                    </div>
                @endforeach



            </div>
            <nav class="pagination justify-content-center">
                @include('admin.pagination', ['paginator' => $banners])

            </nav>
            <div class="container mt-4 d-flex justify-content-between align-items-start"
                style="background: #2E2E2E; border: 1px solid #2E2E2E; border-radius: 16px; padding: 16px;">
                <div class="col-sm-8 me-3">
                    <h3 class="text-light">{{ __('Enlace para referidos') }}</h3>
                    <input type="text" id="referralLink" class="form-control bg-dark text-white"
                        value="https://prueba.negociosgen.com/membership?{{ $user_session->id }}" readonly>
                    <button id="copyButton" class="btn btn-outline-primary mt-2" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Copiado!">
                        {{ __('Copiar enlace') }}
                    </button>
                </div>
                <div class="col-sm-4 mt-3">
                    <img src="{{ asset('assets/barimage 24.png') }}" class="img-fluid" alt="QR Code">
                </div>
            </div>
            <!-- Referrals Section -->


            <script>
                // Initialize Bootstrap tooltip
                const tooltipTrigger = document.querySelector('#copyButton');
                const tooltip = new bootstrap.Tooltip(tooltipTrigger);

                function copyToClipboard() {
                    const referralLink = document.querySelector('#referralLink');
                    if (referralLink) {
                        navigator.clipboard.writeText(referralLink.value)
                            .then(() => {
                                // Show the tooltip manually
                                tooltip.show();

                                // Hide the tooltip after 2 seconds
                                setTimeout(() => {
                                    tooltip.hide();
                                }, 2000);
                            })
                            .catch(err => console.error("Error al copiar el enlace", err));
                    }
                }

                // Attach the copy function to the button
                tooltipTrigger.addEventListener('click', copyToClipboard);
            </script>




            <!-- Videos Tutoriales Section -->
            <div class="resource-section">
                <h5 class="text-light">{{ __('Videos Tutoriales') }}</h5>
                <div class="container">
                    <!-- View All Button -->
                    <div class="col-sm-12 text-end mb-3">
                        <a href="{{ url('course') }}" class="btn btn-primary pull-right">{{ __('Ver Todos') }}</a>
                    </div>

                    <div class="row">
                        @foreach ($course as $row)
                            <div class="col-lg-3 col-md-6 col-6" style="padding-bottom: 10px;">
                                <div class="video-container">
                                    <div class="gradient-overlay"></div>
                                    <img src="{{ asset($row->video_thumbnail) }}" class="thumbnail"
                                        alt="Video Thumbnail" />
                                    @if (!empty($user_session))
                                        <span class="play-button"><img src="{{ asset('assets/Play (1).svg') }}"
                                                alt="Play Button" /></span>
                                    @else
                                        <a href="{{ url('Userlogin') }}"><span class="play-button"><img
                                                    src="{{ asset('assets/Play (1).svg') }}"
                                                    alt="Play Button" /></span></a>
                                    @endif

                                    <div class="embed-responsive" style="display: none;">
                                        <iframe class="embed-responsive-item"
                                            src="{{ $row->getEmbedUrl($row->video_link) }}" frameborder="0"
                                            allow="autoplay; encrypted-media" allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                                <h4 style="color: #EDEDED;">{{ $row->title }}</h4>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <style>
                a {
                    text-decoration: none;
                }


                /* Blog Card Styles */
                .image-parent {
                    width: 100%;
                    /* Ensures the card takes full width of the column */
                    position: relative;
                    border-radius: 8px;
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-start;
                    margin-bottom: 24px;
                    /* Space between cards */
                    background-color: rgba(26, 26, 26, 0.7);
                    border: 1px solid rgba(46, 46, 46, 0.5);
                    padding: 16px;
                    /* Add padding inside the card */
                }

                .image-icon {
                    border-radius: 8px;
                    width: 100%;
                    /* Full width of the card */
                    height: 200px;
                    /* Fixed height to maintain aspect ratio */
                    object-fit: cover;
                    /* Ensures images cover the area without distortion */
                }

                .transparent-card .card-body,
                .transparent-card .card-footer {
                    background-color: transparent;
                    /* Ensure the card body and footer are transparent */
                }

                .card-footer {
                    border: none;
                    /* Remove the border */
                }


                .estamos-dedicados-a {
                    align-self: stretch;
                    position: relative;
                    font-size: 16px;
                    line-height: 24px;
                    color: #a1a1a1;
                }

                .stack {
                    align-self: stretch;
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                    justify-content: flex-start;
                    padding: 0px 8px;
                    gap: 8px;
                }

                .heart-icon {
                    width: 24px;
                    position: relative;
                    height: 24px;
                    overflow: hidden;
                    flex-shrink: 0;
                }

                .div {
                    position: relative;
                    line-height: 150%;
                }

                .heart-parent {
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    justify-content: flex-start;
                    gap: 8px;
                }

                .frame-parent {
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    justify-content: flex-start;
                    gap: 24px;
                    font-size: 16px;
                }

                .transparent-card {
                    background-color: rgba(26, 26, 26, 0.7);
                    /* Adjust the alpha value for transparency */
                    border: 1px solid rgba(46, 46, 46, 0.5);
                    /* Optional: Semi-transparent border */
                }
            </style>
            <!-- Articulos Tutoriales Section -->
            <div class="resource-section">
                <h5 class="text-light">{{ __('Artículos Tutoriales') }}</h5>
                <div class="row">
                    <div class="col-sm-12 text-end mb-3">
                        <a href="{{ url('blog') }}" class="btn btn-primary pull-right">{{ __('Ver Todos') }}</a>
                    </div>
                    <!-- Blog Posts -->
                    @forelse ($blogs as $row)
                        <div class="col-lg-3 col-12 mb-4">
                            <div class="card image-parent h-100 transparent-card">
                                <a href="{{ url('blog_detail/' . $row->slug) }}">
                                    <img src="{{ asset($row->image) }}" class="image-icon card-img-top" alt="Blog Image">
                                </a>

                                <div class="card-body text-white stack">
                                    <a href="{{ url('blog_detail/' . $row->slug) }}">
                                        <h5 class="card-title fw-bold ttulo-del-blog text-white">{{ $row->title }}</h5>
                                    </a>
                                    <p class="card-text text-white estamos-dedicados-a">{!! $row->short_description !!}</p>
                                </div>
                                <div class="card-footer bg-transparent frame-parent">
                                    <div class="heart-parent">
                                        <img class="heart-icon" src="{{ asset('assets/heart.svg') }}" alt="Likes">
                                        <span class="div text-light">{{ $row->like_count ?? 0 }}</span>
                                        <!-- Assuming you have a 'likes_count' field -->
                                    </div>
                                    <div class="heart-parent">
                                        <img class="heart-icon" src="{{ asset('assets/Message square.svg') }}"
                                            alt="Comments">
                                        <span class="div text-light">@php
                                            $commentCount = \App\Models\BlogComment::where('blog_id', $row->id)
                                                ->where('status', '1')
                                                ->count();
                                        @endphp
                                            {{ $commentCount ?? 0 }}</span>
                                        <!-- Assuming you have a 'comments_count' field -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning text-center">
                                <strong>{{ __('No blog posts found.') }}</strong>
                            </div>
                        </div>
                    @endforelse


                </div>
            </div>
        </div>
    </section>



    <div class="modal fade" id="bannerModal" tabindex="-1" aria-labelledby="bannerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #000; color: #ededed;">
                <div class="modal-header" style="border: none;">
                    <h5 class="modal-title banner-de-marketing text-light" id="bannerModalLabel"></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="" id="modalImage" class="img-fluid image-icon mb-3" alt="Banner">
                    <div class="button-parent mt-3 d-flex justify-content-center gap-3">
                        <button class="btn btn-outline-primary button1" onclick="shareBanner()">
                            <b>Compartir</b>
                        </button>
                        <a id="downloadLink" href="#" download class="btn btn-primary button1">
                            <b>Descargar</b>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setModalContent(imageUrl, title) {
            // Set modal image and title
            document.getElementById('modalImage').src = imageUrl;
            document.getElementById('bannerModalLabel').textContent = title;

            // Set download link
            const downloadLink = document.getElementById('downloadLink');
            downloadLink.href = imageUrl;
        }

        function shareBanner() {
            if (navigator.share) {
                const imageUrl = document.getElementById('modalImage').src;
                navigator.share({
                    title: document.getElementById('bannerModalLabel').textContent,
                    url: imageUrl
                }).catch((error) => console.error('Error sharing:', error));
            } else {
                alert('Sharing is not supported in this browser.');
            }
        }
    </script>
@endsection
