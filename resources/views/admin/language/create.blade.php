@extends('admin.Master')
@section('title')
{{ $title }}
@endsection
@section('content')
<div class="page-body" style="background: #000">
    <br>
<!-- Page content area start -->
<div class="card" style="background: #fff">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb__content">
                    <div class="breadcrumb__content__left">
                        <div class="breadcrumb__title">
                            <h2>{{__('Add Language')}}</h2>
                        </div>
                    </div>
                    <div class="breadcrumb__content__right">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('admin\dashboard')}}">{{__('Dashboard')}}</a></li>
                                <li class="breadcrumb-item"><a href="{{url('admin\language')}}">{{__('Language Settings')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('Add Language')}}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="item-top mb-30">
                        <h2>{{__('Add Language')}}</h2>
                    </div>
                    <form action="{{route('language.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input__group mb-25">
                            <label for="language"> {{__('Name')}} </label>
                            <div>
                                <input type="text" name="language" id="language" value="{{old('language')}}" class="form-control flat-input" placeholder=" {{__('Name')}} ">
                                @if ($errors->has('language '))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('language') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="input__group mb-25">
                            <label for="iso_code"> {{__('ISO Code')}} </label>
                            <div>
                                <input type="text" name="iso_code" id="iso_code" value="{{old('iso_code')}}" class="form-control flat-input" placeholder=" {{__('ISO Code')}} ">
                                @if ($errors->has('iso_code'))
                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('iso_code') }}</span>
                                @endif
                                <div class="mt-5">
                                    <span class="status blocked">Note: You can't update it.</span>
                                </div>
                                <div class="mt-3">
                                    <a href="https://en.wikipedia.org/wiki/ISO_3166-1#Current_codes" target="_blank"><b><i class="fa fa-list mr-1"></i> {{ __('ISO Code List') }}</b></a>
                                </div>

                            </div>
                        </div>


                        <div class="input__group mb-25">
                            <label for="flag" class="col-lg-3 text-lg-right text-black"> {{__('Flag')}} </label>
                            <div class="col-lg-3">
                                <div class="upload-img-box">
                                    <img src="{{ getImageFile('uploads/default/no-image-found.png') }}">
                                    <input type="file" name="flag" id="flag" accept="image/*" onchange="previewFile(this)">

                                </div>
                            </div>
                        </div>

                        <div class="custom-form-group mb-3 row">
                            <label for="rtl" class="col-lg-1 text-lg-right text-secondary"> {{ __('RTL Support') }}</label>
                            <div class="col-lg-1">
                                <input type="checkbox" name="rtl" value="1" id="rtl">
                            </div>
                        </div>

                        <div class="input__group">
                            <div class="input__button ">
                                <button type="submit" class="btn btn-primary btn-sm">{{__('Save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content area end -->
</div>

@endsection

