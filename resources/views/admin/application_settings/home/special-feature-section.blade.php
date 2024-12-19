@extends('admin.Master')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <!-- Page content area start -->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('Home Settings') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                   <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a>{{__('Application Setting')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __(@$title) }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="card">
                        @include('admin.application_settings.home-sidebar')
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="email-inbox__area bg-style admin-special-feature-section-page">
                                <div class="item-top mb-30"><h2>{{ __(@$title) }}</h2></div>
                                <form action="{{ route('settings.updateHomeSettings') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <!-- Title Field -->
                                        <div class="custom-form-group mb-3 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                            <label for="title" class="text-lg-right text-black">{{ __('Title') }}</label>
                                            <input type="text" name="title" id="title" value="{{ old('title', $existingSettings->title) }}" class="form-control"
                                                placeholder="{{ __('Type title') }}" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Description Field -->
                                        <div class="custom-form-group mb-3 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                            <label for="description" class="text-lg-right text-black">{{ __('Description') }}</label>
                                            <textarea name="description" id="description" class="form-control" placeholder="{{ __('Type description') }}"
                                                rows="4" required>{{ old('description', $existingSettings->description) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Video Upload Field -->
                                        <div class="custom-form-group mb-3 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                            <label for="video" class="text-lg-right text-black">{{ __('Upload Video') }}</label>
                                            <input type="file" name="video" id="video" accept="video/*" class="form-control"
                                                onchange="previewVideo(this, 'videoPreview')">
                                            @if ($errors->has('video'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('video') }}</span>
                                            @endif
                                            @if ($existingSettings && $existingSettings->video)
                                                <video id="videoPreview" width="100%" height="auto" controls style="display: block; margin-top: 10px;">
                                                    <source src="{{ asset($existingSettings->video) }}" type="video/mp4">
                                                </video>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Video Thumbnail Upload Field -->
                                        <div class="custom-form-group mb-3 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                            <label for="video_thumbnail" class="text-lg-right text-black">{{ __('Upload Video Thumbnail') }}</label>
                                            <input type="file" name="video_thumbnail" id="video_thumbnail" accept="image/*" class="form-control"
                                                onchange="previewFile(this, 'thumbnailPreview')">
                                            @if ($errors->has('video_thumbnail'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('video_thumbnail') }}</span>
                                            @endif
                                            @if ($existingSettings && $existingSettings->video_thumbnail)
                                                <img id="thumbnailPreview" src="{{ asset($existingSettings->video_thumbnail) }}" alt="Thumbnail Preview"
                                                    style="width: 100px; height: auto; display: block; margin-top: 10px;">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Video Caption Field -->
                                        <div class="custom-form-group mb-3 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                                            <label for="video_caption" class="text-lg-right text-black">{{ __('Video Caption') }}</label>
                                            <input type="text" name="video_caption" id="video_caption" value="{{ old('video_caption', $existingSettings->video_caption) }}"
                                                class="form-control" placeholder="{{ __('Type caption') }}" required>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="row justify-content-end">
                                        <div class="col-md-2 text-right">
                                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page content area end -->
    <script>
        // Image Preview Function for Video Thumbnail
        function previewFile(input, previewId) {
            var file = input.files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                document.getElementById(previewId).src = reader.result;
            };
            if (file) {
                reader.readAsDataURL(file);
            }
        }

        // Video Preview Function (optional, if you want to preview video)
        function previewVideo(input, previewId) {
            var file = input.files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                document.getElementById(previewId).src = reader.result;
            };
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection


