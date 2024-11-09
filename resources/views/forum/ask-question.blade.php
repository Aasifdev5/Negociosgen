@extends('master')

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

        <!-- Ask a question area start -->
        <section class="ask-a-question-area section-b-space py-5" style="background: #000;">
            <div class="container" style="padding:50px">
                <div class="row">
                    <div class="card" style="">
                        <form action="{{ route('forum.question.store') }}" method="post" class="ask-question-form radius-4 p-4 bg-light">
                            @csrf
                            <h4 class=" mb-4">{{ __('Ask a Question') }}</h4>
                            <div class="form-group mb-3">
                                <label class="form-label ">{{ __('Topic Title') }}</label>
                                <input type="text" name="title" class="form-control" placeholder="{{ __('Enter your topic title') }}" required>
                                @error('title')
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label ">{{ __('Forum Category') }}</label>
                                <select name="forum_category_id" class="form-select" required>
                                    <option value="">{{ __('Select a Category') }}</option>
                                    @foreach($forumCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('forum_category_id')
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label ">{{ __('Description') }}</label>
                                <textarea name="description" id="summernote" class="form-control" required></textarea>
                                @error('description')
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Publish Question') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Ask a question area end -->

        @if(count($blogs) >= 1)
            <!-- Forum community blog articles Area Start -->
            <section class="community-blog-articles-area section-t-space section-b-85-space bg-page py-5">
                <div class="container">
                    <div class="text-center mb-5">
                        <h3 class="section-heading">{{ __('Community Blog Articles') }}</h3>
                    </div>
                    <div class="row g-4">
                        @foreach($blogs as $blog)
                            <div class="col-md-6">
                                <div class="card shadow-sm">
                                    <img src="{{ getImageFile($blog->image) }}" class="card-img-top" alt="Blog Image">
                                    <div class="card-body">
                                        <span class="badge bg-secondary">{{ __(@$blog->category->name) }}</span>
                                        <h5 class="card-title mt-2"><a href="{{ route('blog_detail', $blog->slug) }}">{{ Str::limit($blog->title, 50) }}</a></h5>
                                        <p class="card-text small text-muted">{{ $blog->user->name }} / {{ $blog->created_at->format('j M, Y') }}</p>
                                        <p class="card-text">{!! Str::limit(strip_tags($blog->details), 150) !!}</p>
                                        <a href="{{ route('blog_detail', $blog->slug) }}" class="btn btn-link text-primary">{{ __('Read More') }} <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12 text-center">
                            <a href="{{ route('blog') }}" class="btn btn-primary">{{ __('All Blogs') }} <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Forum community blog articles Area End -->
        @endif
    </div>
@endsection
