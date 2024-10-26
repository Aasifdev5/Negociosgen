@extends('admin.Master')

@section('title', __('Variaciones'))

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
                                        {{ __('Variaciones') }}
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
                                                <a class="nav-link active" id="variations-tab" data-toggle="tab"
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
                                <br>
                                <div class="col-lg-9" style="margin-top: 25px;">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tabs-body">
                                                <!--Data Entry Form-->
                                                <form action="{{ url('admin/saveVariationsData') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="RecordId"
                                                        value="@if ($datalist['id']) {{ $datalist['id'] }} @endif">
                                                  <div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="variation_size">{{ __('Tamaño') }}</label>
            <select data-placeholder="{{ __('Selecciona el tamaño') }}"
                    name="variation_size[]" id="variation_size"
                    class="select2 form-control" multiple>
                @php
                    $sizes = \App\Models\Size::all();
                    $selectedSizes = explode(',', $datalist->variation_size);
                @endphp
                @foreach($sizes as $size)
                    <option value="{{ $size->name }}"
                        {{ in_array($size->name, $selectedSizes) ? 'selected' : '' }}>
                        {{ $size->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="variation_color">{{ __('Seleccionar el color') }}</label>
            <select data-placeholder="{{ __('Seleccionar el color') }}"
                    name="variation_color[]" id="variation_color"
                    class="select2 form-control" multiple>
                @php
                    $colors = \App\Models\Color::all();
                    $selectedColors = explode(',', $datalist->variation_color);
                @endphp
                @foreach($colors as $color)
                    <option value="{{ $color->name }}"
                        {{ in_array($color->name, $selectedColors) ? 'selected' : '' }}>
                        {{ ucfirst($color->name) }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<!-- Container for dynamically added SKU inputs -->
<div class="row">
    <div class="col-md-12">
        <div id="sku-inputs"></div>
    </div>
</div>

<!-- Container for dynamically added image upload inputs -->
<div class="row">
    <div class="col-md-12">
        <div id="color-image-inputs"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    function previewImage(input, color) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $(`#preview_${color}`).html(
                    `<img src="${e.target.result}" alt="${color} image preview" class="img-thumbnail" style="max-width: 200px;">`
                );
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function updateSkuAndImageInputs() {
        const selectedSizes = $('#variation_size').val();
        const selectedColors = $('#variation_color').val();
        const skuContainer = $('#sku-inputs');
        const imageContainer = $('#color-image-inputs');

        skuContainer.empty(); // Clear existing SKU inputs
        imageContainer.empty(); // Clear existing image inputs

        if (selectedSizes.length > 0 && selectedColors.length > 0) {
            // Both sizes and colors are selected
            selectedSizes.forEach(size => {
                selectedColors.forEach(color => {
                    const skuInputField = `
                        <div class="form-group">
                            <label for="sku_${size}_${color}">SKU for ${size} - ${color}:</label>
                            <input type="text" name="skus[${size}][${color}]" id="sku_${size}_${color}" class="form-control" placeholder="Enter SKU for ${size} - ${color}">
                        </div>
                    `;
                    skuContainer.append(skuInputField);

                    if (!imageContainer.find(`#image_${color}`).length) {
                        const imageInputField = `
                            <div class="form-group">
                                <label for="image_${color}">Upload image for ${color}:</label>
                                <input type="file" name="color_images[${color}]" id="image_${color}" class="form-control-file" onchange="previewImage(this, '${color}')">
                                <div id="preview_${color}" class="mt-2"></div>
                            </div>
                        `;
                        imageContainer.append(imageInputField);
                    }
                });
            });
        } else if (selectedSizes.length > 0 && selectedColors.length === 0) {
            // Only sizes are selected
            selectedSizes.forEach(size => {
                const skuInputField = `
                    <div class="form-group">
                        <label for="sku_${size}">SKU for ${size}:</label>
                        <input type="text" name="skus[${size}]" id="sku_${size}" class="form-control" placeholder="Enter SKU for ${size}">
                    </div>
                `;
                skuContainer.append(skuInputField);
            });
        } else if (selectedSizes.length === 0 && selectedColors.length > 0) {
            // Only colors are selected
            selectedColors.forEach(color => {
                const skuInputField = `
                    <div class="form-group">
                        <label for="sku_${color}">SKU for ${color}:</label>
                        <input type="text" name="skus[${color}]" id="sku_${color}" class="form-control" placeholder="Enter SKU for ${color}">
                    </div>
                `;
                skuContainer.append(skuInputField);

                if (!imageContainer.find(`#image_${color}`).length) {
                    const imageInputField = `
                        <div class="form-group">
                            <label for="image_${color}">Upload image for ${color}:</label>
                            <input type="file" name="color_images[${color}]" id="image_${color}" class="form-control-file" onchange="previewImage(this, '${color}')">
                            <div id="preview_${color}" class="mt-2"></div>
                        </div>
                    `;
                    imageContainer.append(imageInputField);
                }
            });
        }
    }

    // Trigger the function when sizes or colors are changed
    $('#variation_size, #variation_color').on('change', updateSkuAndImageInputs);

    // Trigger the function on page load to show inputs if sizes and colors are already selected
    updateSkuAndImageInputs();
});
</script>




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
