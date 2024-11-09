@extends('master')
@section('title')
    {{ $title }}
@endsection
@section('meta')
    @php
        $metaData = getMeta('forum');
    @endphp

    <meta name="description" content="{{ $metaData['meta_description'] }}">
    <meta name="keywords" content="{{ $metaData['meta_keyword'] }}">

    <!-- Open Graph meta tags for social sharing -->
    <meta property="og:type" content="Learning">
    <meta property="og:title" content="{{ $metaData['meta_title'] }}">
    <meta property="og:description" content="{{ $metaData['meta_description'] }}">
    <meta property="og:image" content="{{ $metaData['og_image'] }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ get_option('app_name') }}">

    <!-- Twitter Card meta tags for Twitter sharing -->
    <meta name="twitter:card" content="Learning">
    <meta name="twitter:title" content="{{ $metaData['meta_title'] }}">
    <meta name="twitter:description" content="{{ $metaData['meta_description'] }}">
    <meta name="twitter:image" content="{{ $metaData['og_image'] }}">
@endsection
@section('content')
<div class="">

    <!-- Page Header Start -->
    <header class="page-banner-header gradient-bg position-relative py-5" style="background: #000;">
        <div class="section-overlay">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="page-banner-content text-white">
                            <h3 class="page-banner-heading">{{ __('Forum') }}</h3>
                            <div class="forum-banner-search-ask d-flex align-items-center mt-4">
                                <div class="input-group">
                                    <input class="form-control border-0 bg-transparent searchForumBar" type="search" placeholder="{{ __('Type to search for solutions...') }}">
                                    <button class="btn btn-outline-light"><i class="bi bi-search"></i></button>
                                </div>
                                <p class="mx-3">{{ __('or') }}</p>
                                <a href="{{ route('forum.askQuestion') }}" class="btn btn-primary">{{ __('Ask a Question') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 text-center">
                        <img src="{{ asset('frontend/assets/img/forum-banner-right-img.png') }}" alt="Forum" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Page Header End -->

    <!-- Forum Categories Start -->
    <section class="forum-categories-area py-5" style="background: #000;">
        <div class="container">
            <h3 class="section-title text-white">{{ __('Forum Categories') }}</h3>
            <div class="row">
                @foreach ($forumCategories as $forumCategory)
                    <div class="col-md-4 mb-4">
                        <div class="card bg-dark text-white">
                            <a href="{{ route('forum.forumCategoryPosts', $forumCategory->uuid) }}">
                                <img src="{{ getImageFile($forumCategory->logo) }}" class="card-img-top" alt="Category">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $forumCategory->title }}</h5>
                                <p class="card-text">{{ Str::limit($forumCategory->subtitle, 70) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Forum Categories End -->

    <!-- Forum Stats Start -->
    <section class="forum-stats bg-dark text-white py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3">
                    <h6>{{ __('Categories') }}</h6>
                    <p>{{ count($forumCategories) }}</p>
                </div>
                <div class="col-md-3">
                    <h6>{{ __('Post Topic') }}</h6>
                    <p>{{ $totalForumPost }}</p>
                </div>
                <div class="col-md-3">
                    <h6>{{ __('Answers') }}</h6>
                    <p>{{ $totalForumAnswer }}</p>
                </div>
                <div class="col-md-3">
                    <h6>{{ __('Members') }}</h6>
                    <p>{{ $totalMember }}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Forum Stats End -->

    <!-- Recent Discussions Start -->
    <section class="forum-discussions py-5" style="background: #000;">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <h3 class="text-white mb-4">{{ __('Recent Discussions') }}</h3>
                    <div class="forum-filter-box mb-4">
                        <select class="form-select forumCategory">
                            <option value="">{{ __('All Categories') }}</option>
                            @foreach ($forumCategories as $forumCategory)
                                <option value="{{ $forumCategory->id }}">{{ $forumCategory->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="forum-discussions-wrap appendForumCategoryPosts">
                        @include('forum.partial.render-forum-posts')
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="forum-sidebar bg-dark text-white p-4 rounded">
                        <a href="{{ route('forum.askQuestion') }}" class="btn btn-primary w-100 mb-4">{{ __('Ask a Question') }}</a>
                        <h5>{{ __('Top Contributors') }}</h5>
                        <ul class="list-group list-group-flush">
                            @foreach ($topContributors as $topContributor)
                                <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ getImageFile($topContributor->image_path) }}" alt="Contributor" class="rounded-circle me-2" style="width: 40px;">
                                        <span>{{ $topContributor->name ?? '' }}</span>
                                    </div>
                                    <span>{{ $topContributor->totalComments }} <i class="bi bi-star-fill text-warning"></i></span>
                                </li>
                            @endforeach
                            <li class="text-center mt-3">
                                <a href="{{ route('forum.forumLeaderboard') }}" class="text-light">{{ __('View All') }} <i class="bi bi-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Recent Discussions End -->

    <!-- Blog Articles Start -->
    @if (count($blogs) >= 1)
    <section class="community-blog-articles py-5 bg-light">
        <div class="container">
            <h3 class="text-center mb-5">{{ __('Community Blog Articles') }}</h3>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="{{ route('blog_detail', $blog->slug) }}">
                                <img src="{{ getImageFile($blog->image) }}" class="card-img-top" alt="Blog Image">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::limit($blog->title, 50) }}</h5>
                                <p class="card-text">{!! Str::limit($blog->details, 200) !!}</p>
                                <a href="{{ route('blog_detail', $blog->slug) }}" class="btn btn-link text-decoration-none">{{ __('Read More') }} <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('blog') }}" class="btn btn-primary">{{ __('All Blogs') }} <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </section>
    @endif
    <!-- Blog Articles End -->

</div>

<input type="hidden" class="renderForumCategoryPostsRoute" value="{{ route('forum.renderForumCategoryPosts') }}">
<input type="hidden" class="searchForumRoute" value="{{ route('forum.search-forum.list') }}">

<script>
    'use strict'
    $(document).on('change', '.forumCategory', function() {
        var forum_category_id = this.value;
        $.get($('.renderForumCategoryPostsRoute').val(), { forum_category_id: forum_category_id }, function(response) {
            $('.appendForumCategoryPosts').html(response);
        });
    });

    $(document).keyup('.searchForumBar', function() {
        var title = $('.searchForumBar').val();
        var searchForumRoute = $('.searchForumRoute').val();
        if (title) {
            $('.searchForumBox').toggleClass('d-none', false).toggleClass('d-block', true);
        } else {
            $('.searchForumBox').toggleClass('d-none', true).toggleClass('d-block', false);
        }
        $.get(searchForumRoute, { title: title }, function(response) {
            $('.searchForumBox').html(response);
        });
    });
</script>
@endsection
