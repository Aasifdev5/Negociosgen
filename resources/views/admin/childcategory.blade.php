@extends('admin.Master')
@section('title')
     Childcategoría
@endsection
@section('content')
    <div class="page-body">
        <br>
        <!-- Page content area start -->
        <div class="page-content">
            <div class="container-fluid">
               
                <div class="row">
                    <div class="col-md-12">
                        <div class="card customers__area bg-style mb-30">
                            <div class="card-header item-title d-flex justify-content-between">
                                <h2>{{ __('Childcategoría') }}</h2>
                                  <a href="{{ route('subcategory.create') }}" class="btn btn-success btn-sm"> <i
                                        class="fa fa-plus"></i> {{ __('Agregar Childcategoría') }} </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="advance-1" class="table table-striped table-bordered">
                                       <thead>
    <tr>
       
        <th>ID de Childcategoría</th>
        <th>Childcategoría</th>
        <th>ID de subcategoría</th>
        <th>{{ __('Subcategoría') }}</th>
        <th>categoria ID</th>
        <th>{{ __('Categoría') }}</th>
        <th>{{ __('Acción') }}</th>
    </tr>
</thead>
<tbody>
    @php
        // Fetch all categories
        $categories = \App\Models\Category::select('id', 'name', 'image')->get();
    @endphp

    @foreach ($categories as $parentCategory)
        @php
            // Fetch subcategories based on the parent category ID
            $subcategories = \App\Models\Subcategory::where('parent_category_id', $parentCategory->id)
                                                    ->where(function($query) {
                                                        $query->where('category_id', 0)
                                                              ->orWhere('category_id', '!=', 0);
                                                    })
                                                    ->get();
        @endphp

        @foreach ($subcategories as $subcategory)
            @php
                // Fetch child categories for the current subcategory
                $childcategories = \App\Models\Subcategory::where('parent_category_id', $parentCategory->id)
                                                          ->where('category_id', $subcategory->id)
                                                          ->get();
            @endphp

            @foreach ($childcategories as $index => $childcategory)
                <tr class="removable-item">
                    
                    <td>{{ $childcategory->id }}</td> <!-- Child category ID -->
                    <td>{{ $childcategory->name }}</td> <!-- Child category name -->
                    <td>{{ $subcategory->id }}</td> <!-- Subcategory ID -->
                    <td>{{ $subcategory->name }}</td> <!-- Subcategory name -->
                    <td>{{ $parentCategory->id }}</td> <!-- Parent category ID -->
                    <td>{{ $parentCategory->name }}</td> <!-- Parent category name -->
                     <td>
                    <div class="action__buttons">
                        <a href="{{ route('subcategory.edit', [$childcategory->uuid]) }}"
                           title="Edit"
                           class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                           data-toggle="tooltip"> 
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="javascript:void(0);"
                           class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete-subcategory"
                           data-toggle="tooltip" title="{{ trans('remove') }}"
                           data-url="{{ route('subcategory.delete', [$childcategory->uuid]) }}">
                            <i class="fa fa-remove"></i>
                        </a>
                    </div>
                </td>
                </tr>
            @endforeach
        @endforeach
    @endforeach
</tbody>


                                    </table>
                                   
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Page content area end -->
    </div>
   
@endsection
