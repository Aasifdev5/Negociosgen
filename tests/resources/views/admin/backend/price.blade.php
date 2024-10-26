@extends('admin.Master')

@section('title', __('Discount Manage'))

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
                                        {{ __('Discount Manage') }}
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="float-right">
                                            <a href="{{ route('backend.products') }}" class="btn btn-warning pull-right"><i
                                                    class="fa fa-reply"></i> {{ __('Back to List') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3" style="margin-top: 25px;">
                                    <div class="card">
                                        <div class="card-header">
                                            {{ __('Product') }}
                                        </div>
                                        <ul class="nav flex-column nav-pills" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link " id="product-tab" data-toggle="tab"
                                                    href="{{ route('backend.product', [$datalist['id']]) }}" role="tab"
                                                    aria-controls="product" aria-selected="true"><i class="fa fa-truck"></i>
                                                    {{ __('Product') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" id="price-tab" data-toggle="tab"
                                                    href="{{ route('backend.price', [$datalist['id']]) }}" role="tab" aria-controls="price"
                                                    aria-selected="false"><i class="fa fa-money"></i>
                                                    {{ __('Discount Manage') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="inventory-tab" data-toggle="tab"
                                                    href="{{ route('backend.inventory', [$datalist['id']]) }}" role="tab"
                                                    aria-controls="inventory" aria-selected="false"><i
                                                        class="fa fa-balance-scale"></i> {{ __('Inventory') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="images-tab" data-toggle="tab"
                                                    href="{{ route('backend.product-images', [$datalist['id']]) }}" role="tab"
                                                    aria-controls="images" aria-selected="false"><i
                                                        class="fa fa-picture-o"></i> {{ __('Multiple Images') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="variations-tab" data-toggle="tab"
                                                    href="{{ route('backend.variations', [$datalist['id']]) }}" role="tab"
                                                    aria-controls="variations" aria-selected="false"><i
                                                        class="fa fa-hourglass-end"></i> {{ __('Variations') }}</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="{{ route('backend.related-products', [$datalist['id']]) }}"><i class="fa fa-compass"></i>{{ __('Related Products') }}</a></li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="seo-tab" data-toggle="tab"
                                                    href="{{ route('backend.product-seo', [$datalist['id']]) }}" role="tab"
                                                    aria-controls="seo" aria-selected="false"><i class="fa fa-rocket"></i>
                                                    {{ __('SEO') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-9" style="margin-top: 25px;">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tabs-body">
                                                <!--Data Entry Form-->
                                                <form action="{{ url('admin\savePriceData') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="RecordId" value="@if ($datalist['id']) {{ $datalist['id'] }} @endif">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="cost_price">{{ __('Cost Price') }}</label>
                                                                <input name="cost_price" id="cost_price" type="text"
                                                                    class="form-control" value="{{ old('cost_price',$datalist->cost_price) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="sale_price">{{ __('Sale Price') }}<span
                                                                        class="red">*</span></label>
                                                                <input name="sale_price" id="sale_price" type="text"
                                                                    class="form-control parsley-validated"
                                                                    data-required="true" value="{{ old('sale_price',$datalist->sale_price) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="old_price">{{ __('Old Price') }}</label>
                                                                <input name="old_price" id="old_price" type="text"
                                                                    class="form-control" value="{{ old('old_price',$datalist->old_price) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="end_date">{{ __('End Date') }}</label>
                                                                <input name="end_date" id="end_date" type="date"
                                                                    class="form-control" placeholder="yyyy-mm-dd" value="{{ old('end_date',$datalist->end_date) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <label for="is_discount">{{ __('Discount') }}</label>
                                                                <select name="is_discount" id="is_discount"
                                                                    class="chosen-select form-control">
                                                                    <option value="1" @if ($datalist->is_discount==1)
                                                                        @selected(true)
                                                                    @endif>{{ __('YES') }}</option>
                                                                    <option value="0" @if ($datalist->is_discount==0)
                                                                        @selected(true)
                                                                    @endif>{{ __('NO') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4"></div>
                                                    </div>
                                                    <br>
                                                    <div class="row ">
                                                        <div class="col-lg-12">
                                                            <button type="submit"
                                                                class="btn btn-primary">{{ __('Next Step') }}</button>
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
