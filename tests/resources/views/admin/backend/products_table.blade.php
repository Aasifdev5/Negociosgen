<div class="table-responsive">
    <table id="advance-1" class="table table-bordered table-striped table-theme" style="width:100%;">
        <thead>
            <tr>
                <th class="text-center" style="width:3%">#</th>
                <th class="text-center" style="width:8%">{{ __('Acción') }}</th>
                <th class="text-left" style="width:21%">{{ __('Titulo del producto') }}</th>
                <th class="text-left" style="width:15%">{{ __('Categoría') }}</th>
               

                <th class="text-center" style="width:8%">{{ __('Imagen') }} </th>
                <th class="text-center" style="width:8%">{{ __('SKU') }}</th>
                
            </tr>
        </thead>
        <tbody>

            @foreach ($datalist as $row)
                @php
                    $brandName = null;
                    $storeName = null;

                    if (!empty($row->brand_id)) {
                        $brand = \App\Models\Brand::find($row->brand_id);
                        $brandName = $brand ? $brand->name : null;
                    }
                    if (!empty($row->store_id)) {
                        $store = \App\Models\User::find($row->store_id);
                        $storeName = $store ? $store->store : null;
                    }
                    if (!empty($row->category)) {
                        $category = \App\Models\Category::find($row->category);
                        $categoryName = $category ? $category->name : null;
                    }
                @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                     <td class="text-center">
                         <a href="{{ route('backend.product', [$row->id]) }}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                                                data-toggle="tooltip"> <i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete-link"
                            data-id="{{ $row->id }}" data-toggle="tooltip" title="{{ trans('remove') }}">
                            <i class="fa fa-remove"></i>
                        </a>
                        <form id="delete-form-{{ $row->id }}"
                            action="{{ route('backend.deleteProducts', $row->id) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE') <!-- Use DELETE method for RESTful deletion -->
                        </form>
                    </td>
                    <td class="text-left">
                        <a href="{{ route('backend.product', [$row->id]) }}"
                            title="{{ __('Edit') }}">{{ $row->title }}</a>
                    </td>
                    <td class="text-left"> @if (!empty($category))
                            {{ $categoryName }}
                        @endif</td>
                   
                    @if ($row->f_thumbnail != '')
                        <td class="text-center">
                            <div class="table_col_image">
                                <img src="{{ asset('product_images/' . $row->f_thumbnail) }}" width="100"
                                    height="60" />
                            </div>
                        </td>
                    @else
                        <td class="text-center">
                            <div class="table_col_image">
                                <img src="{{ asset('backend/images/album_icon.png') }}" />
                            </div>
                        </td>
                    @endif

                    @if (!empty($row->sku))
                        <td class="text-center">{{ $row->sku }}</td>
                    @else
                        <td>no está disponible ahora pero puedes agregarlo</td>
                    @endif
                   
                </tr>
            @endforeach

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.delete-link').on('click', function(e) {
                        e.preventDefault();
                        var id = $(this).data('id');
                        if (confirm('{{ trans('Are you sure you want to delete this product?') }}')) {
                            $('#delete-form-' + id).submit();
                        }
                    });
                });
            </script>

        </tbody>
    </table>
</div>
