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
                                                <form action="{{ url('admin\saveVariationsData') }}" method="POST"
                                                    enctype="multipart/form-data">
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
                                                                    <option value="Pequeño"
                                                                        {{ in_array('Pequeño', explode(',', $datalist->variation_size)) ? 'selected' : '' }}>
                                                                        Pequeño</option>
                                                                    <option value="Mediano"
                                                                        {{ in_array('Mediano', explode(',', $datalist->variation_size)) ? 'selected' : '' }}>
                                                                        Mediano</option>
                                                                    <option value="Grande"
                                                                        {{ in_array('Grande', explode(',', $datalist->variation_size)) ? 'selected' : '' }}>
                                                                        Grande</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            @php
    // List of all available colors
    $colors = \App\Models\Color::all();

    // Existing selected colors
    $selectedColors = explode(',', $datalist->variation_color);
@endphp
                                                            <div class="form-group">
                                                                <label for="variation_color">{{ __('Seleccionar el color') }}</label>
    <select data-placeholder="{{ __('Seleccionar el color') }}"
            name="variation_color[]" id="variation_color"
            class="select2 form-control" multiple>
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

                                                    <!-- Container for dynamically added image inputs and previews -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="color-image-inputs"></div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            @php
                                                                $colors = explode(',', $datalist->variation_color);

                                                                $imagelist = \App\Models\Pro_image::where(
                                                                    'product_id',
                                                                    $datalist->id,
                                                                )
                                                                    ->whereIn('color', $colors)
                                                                    ->orderBy('id', 'desc')
                                                                    ->paginate(15);
                                                            @endphp

                                                            <div class="container">
                                                                <h1>Imágenes para {{ $datalist->title }}</h1>

                                                                @foreach ($colors as $color)
                                                                    @php
                                                                        $imagesByColor = $imagelist->filter(function (
                                                                            $image,
                                                                        ) use ($color) {
                                                                            return $image->color == $color;
                                                                        });
                                                                    @endphp

                                                                    @if ($imagesByColor->isNotEmpty())
                                                                        <h2>{{ ucfirst($color) }} Images</h2>
                                                                        <div class="row">
                                                                            @foreach ($imagesByColor as $image)
                                                                                <div class="col-md-3">
                                                                                    <div class="image-item">
                                                                                        <img src="{{ asset($image->thumbnail) }}"
                                                                                            alt="{{ $color }} image"
                                                                                            class="img-fluid">
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @else
                                                                        <p>No se encontraron imágenes para el color.
                                                                            {{ $color }}.</p>
                                                                    @endif
                                                                @endforeach

                                                                {{ $imagelist->links() }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                                                    <script>
                                                        $(document).ready(function() {
                                                            function updateColorImageInputs() {
                                                                const selectedColors = $('#variation_color').val();
                                                                const container = $('#color-image-inputs');
                                                                container.empty(); // Clear existing inputs and previews

                                                                if (selectedColors && selectedColors.length > 0) {
                                                                    selectedColors.forEach(color => {
                                                                        const inputField = `
                        <div class="form-group">
                            <label for="image_${color}">Upload image for ${color}:</label>
                            <input type="file" name="color_images[${color}]" id="image_${color}" class="form-control-file" onchange="previewImage(this, '${color}')">
                            <div id="preview_${color}" class="mt-2"></div>
                        </div>
                    `;
                                                                        container.append(inputField);
                                                                    });
                                                                }
                                                            }

                                                            $('#variation_color').on('change', updateColorImageInputs);

                                                            // Trigger the function on page load to show inputs if colors are already selected
                                                            updateColorImageInputs();
                                                        });

                                                        function previewImage(input, color) {
                                                            if (input.files && input.files[0]) {
                                                                const reader = new FileReader();
                                                                reader.onload = function(e) {
                                                                    $('#preview_' + color).html(
                                                                        `<img src="${e.target.result}" alt="Preview" class="img-thumbnail" style="max-width: 200px;">`
                                                                    );
                                                                }
                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }
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
