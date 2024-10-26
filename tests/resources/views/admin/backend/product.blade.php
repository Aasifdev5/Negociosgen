@extends('admin.Master')

@section('title', __('Producto'))

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
                                        {{ __('Producto') }}
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="float-right">
                                            <a href="{{ route('backend.products') }}" class="btn btn-warning pull-right"><i
                                                    class="fa fa-reply"></i> {{ __('Volver a la lista') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-25">
                                <div class="col-lg-3" style="margin-top: 25px;">
                                    <div class="card">
                                        <div class="card-header">
                                            {{ __('Producto') }}
                                        </div>
                                        <ul class="nav flex-column nav-pills" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="product-tab" data-toggle="tab"
                                                    href="{{ route('backend.product', [$datalist['id']]) }}" role="tab"
                                                    aria-controls="product" aria-selected="true"><i class="fa fa-truck"></i>
                                                    {{ __('Producto') }}</a>
                                            </li>
                                            <!--<li class="nav-item">-->
                                            <!--    <a class="nav-link" id="price-tab" data-toggle="tab"-->
                                            <!--        href="{{ route('backend.price', [$datalist['id']]) }}" role="tab" aria-controls="price"-->
                                            <!--        aria-selected="false"><i class="fa fa-money"></i>-->
                                            <!--        {{ __('Discount Manage') }}</a>-->
                                            <!--</li>-->
                                            <li class="nav-item">
                                                <a class="nav-link" id="inventory-tab" data-toggle="tab"
                                                    href="{{ route('backend.inventory', [$datalist['id']]) }}" role="tab"
                                                    aria-controls="inventory" aria-selected="false"><i
                                                        class="fa fa-balance-scale"></i> {{ __('Inventario') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="images-tab" data-toggle="tab"
                                                    href="{{ route('backend.product-images', [$datalist['id']]) }}" role="tab"
                                                    aria-controls="images" aria-selected="false"><i
                                                        class="fa fa-picture-o"></i> {{ __('Varias imágenes') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="variations-tab" data-toggle="tab"
                                                    href="{{ route('backend.variations', [$datalist['id']]) }}" role="tab"
                                                    aria-controls="variations" aria-selected="false"><i
                                                        class="fa fa-hourglass-end"></i> {{ __('Variaciones') }}</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="{{ route('backend.related-products', [$datalist['id']]) }}"><i class="fa fa-compass"></i>{{ __('Productos relacionados') }}</a></li>
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
                                            <div class="tab-content" id="myTabContent">
                                                <!--Data Entry Form-->
                                                <form action="{{ url('admin\saveProductsData') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="RecordId"
                                                        value="@if ($datalist['id']) {{ $datalist['id'] }} @endif">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="product_name">{{ __('Titulo del producto') }}<span
                                                                        class="red">*</span></label>
                                                                <input type="text" name="title" id="product_name"
                                                                    class="form-control parsley-validated"
                                                                    data-required="true" value="{{ old('title',$datalist->title) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label for="slug">{{ __('Slug') }}<span
                                                                        class="red">*</span></label>
                                                                <input type="text" name="slug" id="slug"
                                                                    class="form-control parsley-validated"
                                                                    data-required="true" value="{{ old('title',$datalist->slug) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label
                                                                    for="short_desc">{{ __('Breve descripción') }}</label>
                                                                <textarea name="short_desc" id="short_desc" class="form-control " rows="4">{{ old('title',$datalist->short_desc) }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group tpeditor">
                                                                <label
                                                                    for="description">{{ __('Contenido del producto') }}</label>
                                                                <textarea name="description" id="description" class="form-control" rows="7">{{ old('title',$datalist->description) }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
    <label class="col-form-label">Categoría</label>
    <select name="categories" id="categories" class="select2 form-control">
        <option value="">Selecciona una categoría</option>
         @php
            $categories = \App\Models\Category::all();
        @endphp
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @if ($datalist->category == $category->id) selected @endif>{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div class="col-sm-4">
    <div class="form-group">
        <label for="subcategory_id">Subcategoría<span class="red">*</span></label>
        <select name="subcategory_id" id="subcategory_id" class="select2 chosen-select form-control">
            <option value="0">No Subcategoría</option>
            @foreach($subcategorylist as $subcategory)
                <option value="{{ $subcategory->id }}" @if ($datalist->subcategory_id == $subcategory->id) selected @endif>{{ $subcategory->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-sm-4">
    <div class="form-group">
        <label for="childcategory">Categoría infantil<span class="red">*</span></label>
        <select name="childcategory" id="childcategory" class="select2 chosen-select form-control">
            <option value="0">No categoría infantil</option>
            @foreach($childcategory as $childcategory)
                <option value="{{ $childcategory->id }}" @if ($datalist->childcategory == $childcategory->id) selected @endif>{{ $childcategory->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   $(document).ready(function() {
       var baseUrl = "https://bikebros.net";
       
        // Function to fetch subcategories based on selected category
        $('#categories').change(function() {
            var categoryId = $(this).val();
            if (categoryId) {
                 var url = baseUrl + '/admin/get-subcategories/' + categoryId;
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        updateSubcategories(data);
                    }
                });
            } else {
                resetSubcategories();
            }
            resetChildcategories();
        });

        // Function to fetch child categories based on selected subcategory
        $('#subcategory_id').change(function() {
            var subcategoryId = $(this).val();
            if (subcategoryId) {
                 var url = baseUrl + '/admin/get-childcategories/' + subcategoryId;
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        updateChildcategories(data);
                    }
                });
            } else {
                resetChildcategories();
            }
        });

        // Function to update subcategory select options
        function updateSubcategories(data) {
            $('#subcategory_id').empty().append('<option value="0">No Subcategoría</option>');
            $.each(data, function(key, value) {
                var selected = (value.id == {{ $datalist->subcategory_id }}) ? 'selected' : '';
                $('#subcategory_id').append('<option value="' + value.id + '" ' + selected + '>' + value.name + '</option>');
            });
            $('#subcategory_id').trigger('change');
        }

        // Function to reset subcategory select
        function resetSubcategories() {
            $('#subcategory_id').empty().append('<option value="0">No Subcategoría</option>');
        }

        // Function to update child category select options
        function updateChildcategories(data) {
            $('#childcategory').empty().append('<option value="0">No categoría infantil</option>');
            $.each(data, function(key, value) {
                var selected = (value.id == {{ $datalist->childcategory }}) ? 'selected' : '';
                $('#childcategory').append('<option value="' + value.id + '" ' + selected + '>' + value.name + '</option>');
            });
        }

        // Function to reset child category select
        function resetChildcategories() {
            $('#childcategory').empty().append('<option value="0">No categoría infantil</option>');
        }

        // Initialize selects based on pre-existing data
        if ($('#categories').val()) {
            $('#categories').trigger('change');
        }
    });
</script>







                                                        <br>
                                                        <div class="col-lg-12">
                                                            <div class="input__group mb-25">
                                                                <label>{{ __('Imagen ') }}</label>
                                                                <div class="upload-img-box">
                                                                    @if (!empty($datalist->f_thumbnail))
                                                                    <img src="{{ asset('') }}product_images/{{ $datalist->f_thumbnail }}">
                                                                    @else
                                                                    <img src="">
                                                                    @endif

                                                                    <input type="file" name="f_thumbnail" id="og_image"
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
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="brand_id">{{ __('Marca') }}<span
                                                                        class="red">*</span></label>
                                                                <select name="brand_id" id="brand_id"
                                                                    class="select2 chosen-select form-control">
                                                                    <option value="0">No Marca</option>
                                                                    @foreach ($brandlist as $row)
                                                                        <option value="{{ $row->id }}" @if ($datalist->brand_id==$row->id)
                                                                            @selected(true)
                                                                        @endif>
                                                                            {{ $row->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>




                                                    <div class="row">
                                                        <!--<div class="col-lg-6">-->
                                                        <!--    <div class="form-group">-->
                                                        <!--        <label for="tax_id">{{ __('Impuesto') }}<span-->
                                                        <!--                class="red">*</span></label>-->
                                                        <!--        <select name="tax_id" id="tax_id"-->
                                                        <!--            class="chosen-select form-control">-->
                                                        <!--            @foreach ($taxlist as $row)-->
                                                        <!--                <option value="{{ $row->id }}">-->
                                                        <!--                    {{ $row->title.' - '.$row->percentage.'%' }}-->
                                                        <!--                </option>-->
                                                        <!--            @endforeach-->
                                                        <!--        </select>-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="sale_price">{{ __('Precio de venta 1') }}<span
                                                                        class="red">*</span></label>
                                                                <input name="price1" id="sale_price" type="text"
                                                                    class="form-control parsley-validated"
                                                                    data-required="true" value="{{ old('price1',$datalist->price1) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="sale_price">{{ __('Precio de venta 2') }}<span
                                                                        class="red">*</span></label>
                                                                <input name="price2" id="sale_price" type="text"
                                                                    class="form-control parsley-validated"
                                                                    data-required="true" value="{{ old('price2',$datalist->price2) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="sale_price">{{ __('Precio de venta 3') }}<span
                                                                        class="red">*</span></label>
                                                                <input name="price3" id="sale_price" type="text"
                                                                    class="form-control parsley-validated"
                                                                    data-required="true" value="{{ old('price3',$datalist->price3) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="sale_price">{{ __('Precio de venta 4') }}<span
                                                                        class="red">*</span></label>
                                                                <input name="price4" id="sale_price" type="text"
                                                                    class="form-control parsley-validated"
                                                                    data-required="true" value="{{ old('price4',$datalist->price4) }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="sale_price">{{ __('Precio de venta 5') }}<span
                                                                        class="red">*</span></label>
                                                                <input name="price5" id="sale_price" type="text"
                                                                    class="form-control parsley-validated"
                                                                    data-required="true" value="{{ old('price5',$datalist->price5) }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label class="col-form-label">Estado</label>
                                                            <br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="statusYes" name="is_publish" value="1"
                                                                    {{ $datalist->is_publish == '1' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="statusYes">Sí</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="statusNo" name="is_publish" value="0"
                                                                    {{ $datalist->is_publish == '0' ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="statusNo">No</label>
                                                            </div>

                                                            <span class="text-danger">
                                                                @error('is_publish')
                                                                    {{ $message }}
                                                                @enderror
                                                            </span>
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
