@extends('admin.Master')

@section('title', __('Inventario'))

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
                                        {{ __('Inventario') }}
                                    </div>
                                    <div class="col-lg-12">
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
                                                <a class="nav-link active" id="inventory-tab" data-toggle="tab"
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
                                                <a class="nav-link" id="seo-tab" data-toggle="tab"
                                                    href="{{ route('backend.product-seo', [$datalist['id']]) }}"
                                                    role="tab" aria-controls="seo" aria-selected="false"><i
                                                        class="fa fa-rocket"></i>
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
                                                <form action="{{ url('admin\saveInventoryData') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="RecordId"
                                                        value="@if ($datalist['id']) {{ $datalist['id'] }} @endif">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="is_stock">{{ __('Gestionar existencias') }}</label>
                                                                <select name="is_stock" id="is_stock"
                                                                    class="chosen-select form-control">
                                                                    <option value="1"
                                                                        @if ($datalist->is_stock == 1) @selected(true) @endif>
                                                                        {{ __('SÍ') }}</option>
                                                                    <option value="0"
                                                                        @if ($datalist->is_stock == 0) @selected(true) @endif>
                                                                        {{ __('NO') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label
                                                                    for="stock_status_id">{{ __('Estado del inventario') }}</label>
                                                                <select name="stock_status_id" id="stock_status_id"
                                                                    class="chosen-select form-control">
                                                                    <option value="1"
                                                                        @if ($datalist->stock_status_id == 1) @selected(true) @endif>
                                                                        {{ __('En stock') }}</option>
                                                                    <option value="0"
                                                                        @if ($datalist->stock_status_id == 0) @selected(true) @endif>
                                                                        {{ __('Agotado') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="sku">{{ __('SKU') }}</label>
                                                                <input name="sku" id="sku" type="text"
                                                                    class="form-control"
                                                                    value="{{ old('sku', $datalist->sku) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="stock_qty">{{ __('Cantidad de stock') }}</label>
                                                                <input name="stock_qty" id="stock_qty" type="number"
                                                                    class="form-control"
                                                                    value="{{ old('stock_qty', $datalist->stock_qty) }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <div class="row tabs-footer mt-15">
                                                        <div class="col-lg-12">
                                                            <button type="submit"
                                                                class="btn btn-primary">{{ __('Próximo paso') }}</button>
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
