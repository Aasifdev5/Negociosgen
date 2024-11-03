@extends('master')

@section('title')
    Blog
@endsection

@section('content')
    <section style="padding: 90px 0; background: #1A1A1A;">
        <div class="container my-5">
            <h1 class="text-center" style="color: #ededed;">El blog de <span style="color: #0090ff;">GEN</span></h1>

            <form action="/search" method="GET" style="width: 100%; max-width: 600px; margin: auto;">
                <div class="input-group" style="position: relative; display: flex; align-items: center;">
                    <input type="text" name="query" class="form-control" placeholder="Buscar con palabras claves"
                        style="width: 100%; background-color: ; border-radius: 8px; border: 1px solid #333; padding-left: 40px; height: 48px; color: #8F8F8F; font-size: 16px;">
                    <img class="search-icon" alt="Buscar" src="{{ asset('assets/search.svg') }}"
                        style="position: absolute; left: 12px; width: 20px; height: 20px; filter: brightness(0.8);">
                </div>
            </form>

            <style>
                /* Responsive design */
                form {
                    width: 100%;
                }
a{
    text-decoration: none;
}
                .form-control {
                    transition: border-color 0.3s ease, box-shadow 0.3s ease;
                }

                /* On focus */
                .form-control:focus {
                    border-color: #4a90e2;
                    outline: none;
                    box-shadow: 0 0 8px rgba(74, 144, 226, 0.8);
                }

                /* Blog Card Styles */
                .image-parent {
                    width: 100%; /* Ensures the card takes full width of the column */
                    position: relative;
                    border-radius: 8px;
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-start;
                    margin-bottom: 24px; /* Space between cards */
                    background-color: rgba(26, 26, 26, 0.7);
                    border: 1px solid rgba(46, 46, 46, 0.5);
                    padding: 16px; /* Add padding inside the card */
                }

                .image-icon {
                    border-radius: 8px;
                    width: 100%; /* Full width of the card */
                    height: 200px; /* Fixed height to maintain aspect ratio */
                    object-fit: cover; /* Ensures images cover the area without distortion */
                }

                .transparent-card .card-body,
                .transparent-card .card-footer {
                    background-color: transparent; /* Ensure the card body and footer are transparent */
                }

                .card-footer {
                    border: none; /* Remove the border */
                }

                /* Additional styles as previously defined */
                .pagination .page-link {
                    color: #000; /* Default link color */
                }

                .pagination .page-item .active .page-link {
                    background-color: #0090FF; /* Active page background color */
                    color: #000; /* Active page text color */
                }

                .pagination .page-link:hover {
                    background-color: rgba(0, 144, 255, 0.1); /* Optional: Light hover effect */
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
                    background-color: rgba(26, 26, 26, 0.7); /* Adjust the alpha value for transparency */
                    border: 1px solid rgba(46, 46, 46, 0.5); /* Optional: Semi-transparent border */
                }
            </style>

            <div class="container my-4">
                <div class="row">
                    <!-- Blog Posts -->
                    @forelse ($blogs as $row)
                        <div class="col-lg-4 col-12 mb-4">
                            <div class="card image-parent h-100 transparent-card">
                                <a href="{{ url('blog_detail/' . $row->slug) }}">
                                    <img src="{{ asset($row->image) }}" class="image-icon card-img-top" alt="Blog Image">
                                </a>

                                <div class="card-body stack">
                                    <a href="{{ url('blog_detail/' . $row->slug) }}">
                                        <h5 class="card-title fw-bold ttulo-del-blog text-white">{{ $row->title }}</h5>
                                    </a>
                                    <p class="card-text estamos-dedicados-a">{!! $row->short_description !!}</p>
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

                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    {{ $blogs->links('pagination::bootstrap-4') }} <!-- Laravel pagination links -->
                </nav>
            </div>
        </div>
    </section>
@endsection
