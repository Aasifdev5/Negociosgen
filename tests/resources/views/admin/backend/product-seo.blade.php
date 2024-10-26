@extends('admin.Master')

@section('title', __('SEO'))

@section('content')
    <div class="page-body">
        <br>
        <!-- main Section -->
        <div class="main-body">
            <div class="container-fluid">

                <div class="row mt-25">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-6">
                                        {{ __('SEO') }}
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="float-right">
                                            <a href="{{ route('backend.products') }}" class="btn btn-warning pull-right"><i
                                                    class="fa fa-reply"></i> {{ __('Volver a la lista') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3" style="margin-top: 25px;">
                                    <div class="card">
                                        <div class="card-header">
                                            {{ __('Producto') }}
                                        </div>
                                        <ul class="nav flex-column nav-pills" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link " id="product-tab" data-toggle="tab"
                                                    href="{{ route('backend.product', [$datalist['id']]) }}" role="tab"
                                                    aria-controls="product" aria-selected="true"><i class="fa fa-truck"></i>
                                                    {{ __('Producto') }}</a>
                                            </li>
                                            <!--<li class="nav-item">-->
                                            <!--    <a class="nav-link" id="price-tab" data-toggle="tab"-->
                                            <!--        href="{{ route('backend.price', [$datalist['id']]) }}" role="tab"-->
                                            <!--        aria-controls="price" aria-selected="false"><i class="fa fa-money"></i>-->
                                            <!--        {{ __('Discount Manage') }}</a>-->
                                            <!--</li>-->
                                            <li class="nav-item">
                                                <a class="nav-link" id="inventory-tab" data-toggle="tab"
                                                    href="{{ route('backend.inventory', [$datalist['id']]) }}"
                                                    role="tab" aria-controls="inventory" aria-selected="false"><i
                                                        class="fa fa-balance-scale"></i> {{ __('Inventario') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="images-tab" data-toggle="tab"
                                                    href="{{ route('backend.product-images', [$datalist['id']]) }}"
                                                    role="tab" aria-controls="images" aria-selected="false"><i
                                                        class="fa fa-picture-o"></i> {{ __('Varias imágenes') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="variations-tab" data-toggle="tab"
                                                    href="{{ route('backend.variations', [$datalist['id']]) }}"
                                                    role="tab" aria-controls="variations" aria-selected="false"><i
                                                        class="fa fa-hourglass-end"></i> {{ __('Variaciones') }}</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="{{ route('backend.related-products', [$datalist['id']]) }}"><i class="fa fa-compass"></i>{{ __('Productos relacionados') }}</a></li>
                                            <li class="nav-item">
                                                <a class="nav-link active" id="seo-tab" data-toggle="tab"
                                                    href="{{ route('backend.product-seo', [$datalist['id']]) }}"
                                                    role="tab" aria-controls="seo" aria-selected="false"><i
                                                        class="fa fa-rocket"></i>
                                                    {{ __('SEO') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <br>
                                <div class="col-lg-9" style="margin-top: 25px;">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content" id="myTabContent">
                                                <!--Data Entry Form-->
                                                <form action="{{ url('admin\saveProductSEOData') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="RecordId"
                                                        value="@if ($datalist['id']) {{ $datalist['id'] }} @endif">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="og_title">{{ __('SEO Título') }}</label>
                                                                <input type="text" name="og_title" id="og_title"
                                                                    class="form-control"
                                                                    value="{{ old('og_title', $datalist->og_title) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="og_keywords">{{ __('SEO Palabras clave') }}</label>
                                                                <input type="text" name="og_keywords" id="og_keywords"
                                                                    class="form-control"
                                                                    value="{{ old('og_keywords', $datalist->og_keywords) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label
                                                                    for="og_description">{{ __('SEO Descripción') }}</label>
                                                                <textarea name="og_description" id="og_description" class="form-control" rows="2">{{ old('og_description', $datalist->og_description) }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="input__group mb-25">
                                                                <label>{{ __('Imagen ') }}</label>
                                                                <div class="upload-img-box">
                                                                    @if (!empty($datalist->og_image))
                                                                        <img
                                                                            src="{{ asset('') }}og_image/{{ $datalist->og_image }}">
                                                                    @else
                                                                        <img src="">
                                                                    @endif
                                                                    <input type="file" name="og_image" id="og_image"
                                                                        accept="image/*" onchange="previewFile(this)">
                                                                    <div class="upload-img-box-icon">
                                                                        <i class="fa fa-camera"></i>
                                                                        <p class="m-0">{{ __('Imagen OG') }}</p>
                                                                    </div>
                                                                </div>
                                                                @if ($errors->has('og_image'))
                                                                    <span class="text-danger"><i
                                                                            class="fas fa-exclamation-triangle"></i>
                                                                        {{ $errors->first('og_image') }}</span>
                                                                @endif
                                                                <p>
                                                                    <span
                                                                        class="text-black">{{ __('Tamaño Recomendado') }}:</span>
                                                                    400px x 400px
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <div class="row tabs-footer mt-15">
                                                        <div class="col-lg-12">
                                                            <button type="submit"
                                                                class="btn btn-primary">{{ __('Último paso') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!--/Data Entry Form/-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /main Section -->
    </div>



@endsection
