@extends('admin.Master')

@section('title', __('Productos relacionados'))

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
                                        {{ __('Productos relacionados') }}
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
                                                <a class="nav-link " id="inventory-tab" data-toggle="tab"
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
                                            <li class="nav-item"><a class="nav-link active"
                                                    href="{{ route('backend.related-products', [$datalist['id']]) }}"><i
                                                        class="fa fa-compass"></i>{{ __('Productos relacionados') }}</a></li>
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
                                                <!-- resources/views/admin/backend/related_products_table.blade.php -->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="search_term">Buscar Productos:</label>
                                                        <input type="text" class="form-control" id="search_term"
                                                            placeholder="Introduzca el título del producto">
                                                    </div>
                                                    <div id="search_results"></div>
                                                </div>

                                                <input type="hidden" id="product_id" value="{{ $datalist['id'] }}">

                                                <div class="col-md-6">
                                                    <h4>Productos seleccionados</h4>
                                                    <ul id="selected_products">

                                                    </ul>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Producto relacionado elegido</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-sm-12">
                                                    @php
                                                        $relateddatalist = DB::table('products')
                                                            ->join('related_products', 'products.id', '=', 'related_products.related_item_id')
                                                            ->select('related_products.id as related_id', 'products.title', 'products.f_thumbnail')
                                                            ->where('related_products.product_id', $datalist->id)
                                                            ->orderBy('related_products.id', 'desc')
                                                            ->paginate(15);
                                                    @endphp

                                                    <div class="row">
                                                        @if(count($relateddatalist) > 0)
                                                        @foreach($relateddatalist as $product)
                                                        <div class="col-md-4 col-sm-6 mb-2"> <!-- Reduced margin-bottom -->
                                                            <div class="card h-100">
                                                                <img src="{{ asset('f_thumbnail/' . $product->f_thumbnail) }}" class="card-img-top" alt="Image" style="height: 150px; object-fit: cover;"> <!-- Reduced image size -->
                                                                <div class="card-body p-2"> <!-- Reduced padding -->
                                                                    <h6 class="card-title">{{ $product->title }}</h6> <!-- Reduced heading size -->
                                                                    <p class="card-text small">ID: {{ $product->related_id }}</p> <!-- Smaller text size -->
                                                                    <a onClick="deleteRelatedProduct({{ $product->related_id }})" class="btn btn-danger btn-sm" href="javascript:void(0);">
                                                                        <i class="fa fa-remove"></i> {{ __('Borrar') }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                        @else
                                                            <div class="col-sm-12">
                                                                <h5 class="text-center">{{ __('Datos no disponibles') }}</h5>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <!-- Pagination if needed -->
                                                    {{ $relateddatalist->links() }}
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
        </div>



        <!-- /main Section -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
    // Add CSRF token to all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Function to handle delete action
    window.deleteRelatedProduct = function(relatedId) {
        if (confirm('Are you sure you want to delete this related product?')) {
            $.ajax({
                url: "{{ route('backend.deleteRelatedProduct') }}",
                method: 'POST',
                data: { id: relatedId },
                dataType: 'json',
                success: function(response) {
                    if (response.msgType === 'success') {
                        toastr.success(response.msg);
                        location.reload(); // Reload the page to see the changes
                    } else {
                        toastr.error(response.msg);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    toastr.error('Failed to delete related product.');
                }
            });
        }
    };
});

        $(document).ready(function() {
            // Add CSRF token to all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#search_term').keyup(function() {
                const searchTerm = $(this).val();

                if (searchTerm.length >= 2) {
                    $.ajax({
                        url: "{{ route('backend.getRelatedProductTableData') }}", // Replace with your actual route
                        data: {
                            search: searchTerm
                        },
                        dataType: 'json',
                        success: function(response) {
                            $('#search_results').empty(); // Clear previous results
                            if (response.length > 0) {
                                $.each(response, function(index, product) {
                                    const result = `<div class="card mb-3">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="{{ asset('f_thumbnail') }}/${product.f_thumbnail}" alt="${product.title}" class="img-fluid">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">${product.title}</h5>
                      <p class="card-text">ID: ${product.id}</p>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input product-checkbox" data-id="${product.id}" data-title="${product.title}" id="product_${product.id}">
                        <label class="form-check-label" for="product_${product.id}">Select</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>`;
                                    $('#search_results').append(result);
                                });
                            } else {
                                $('#search_results').append('<p>No products found.</p>');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            $('#search_results').empty().append(
                                '<p>Error fetching products.</p>');
                        }
                    });
                } else {
                    $('#search_results').empty(); // Clear results if search term is less than 2 characters
                }
            });

            $(document).on('click', '.product-checkbox', function() {
                const productId = $(this).data('id');
                const productTitle = $(this).data('title');
                const isChecked = $(this).is(':checked');

                if (isChecked) {
                    // Add product to selected list visually
                    const selectedItem =
                        `<li data-id="${productId}">${productTitle} (ID: ${productId})</li>`;
                    $('#selected_products').append(selectedItem);

                    // Save product to database (AJAX request)
                    saveProduct(productId);
                } else {
                    // Remove product from selected list visually
                    $('#selected_products li[data-id="' + productId + '"]').remove();

                    // Optionally remove product from database (AJAX request)
                    // This part depends on your application logic (e.g., removing related product from database)
                }
            });

            function saveProduct(productId) {
                const product_id = $('#product_id').val(); // Assuming this is the current product ID
                const selectedIds = [];

                // Collect all selected product IDs into an array
                $('#selected_products li').each(function() {
                    const id = $(this).data('id');
                    selectedIds.push(id);
                });

                // AJAX request to save Productos relacionados
                $.ajax({
                    url: "{{ route('backend.saveRelatedProductsData') }}", // Replace with your actual route
                    method: 'POST',
                    data: {
                        product_id: product_id,
                        related_item_id: selectedIds
                    }, // Pass array of related_item_ids
                    dataType: 'json',
                    success: function(response) {
                        if (response.msgType === 'success') {
                            toastr.success(response.msg);
                            location.reload();
                        } else {
                            toastr.error(response.msg);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        toastr.error('Failed to save related product.');
                    }
                });
            }
        });
    </script>
@endsection
