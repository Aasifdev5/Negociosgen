@extends('admin.Master')
@section('title')
    Categorías
@endsection
@section('content')
    <div class="page-body">
        <!-- Page content area start -->
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb__content">
                            <div class="breadcrumb__content__left">
                                <div class="breadcrumb__title">
                                    <h2>{{ __('Categorías') }}</h2>
                                </div>
                            </div>
                            <div class="breadcrumb__content__right">
                                <nav aria-label="breadcrumb">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a
                                                href="{{ url('admin/dashboard') }}">{{ __('Panel') }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ __('Categorías') }}</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h2>{{ __('Lista de categoría') }}</h2>
                                <a href="{{ route('category.create') }}" class="btn btn-success btn-sm pull-right"> <i
                                        class="fa fa-plus"></i> {{ __('añadir categoría') }} </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="advance-1" class="row-border data-table-filter table-style">
                                        <thead>
                                            <tr>
                                                <th>{{ __('categoria ID') }}</th>
                                                <th>{{ __('Nombre') }}</th>
                                                <th>{{ __('Función') }}</th>

                                                <th>{{ __('Acción') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr class="removable-item">
                                                    <td>
                                                        {{$category->id}}
                                                    </td>
                                                    <td>
                                                        {{ $category->name }}
                                                    </td>
                                                    <td>
                                                        @if ($category->is_feature == 'yes')
                                                            <span class="status active">{{ __('Sí') }}</span>
                                                        @else
                                                            <span class="status blocked">{{ __('No') }}</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <div class="action__buttons">
                                                            <a href="{{ route('category.edit', [$category->uuid]) }}"
                                                                title="Edit"
                                                                class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5"
                                                                data-toggle="tooltip"> <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" title="Delete"
                                                                class="btn btn-icon waves-effect waves-light btn-danger m-b-5 delete-category"
                                                                data-toggle="tooltip" title="{{ trans('remove') }}"
                                                                data-url="{{ route('category.delete', $category->uuid) }}">
                                                                <i class="fa fa-remove"></i>
                                                            </a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="mt-3">
                                        {{ $categories->links() }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Page content area end -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '.delete-category', function(e) {
            e.preventDefault(); // Prevent default form submission

            let deleteUrl = $(this).data('url'); // Get the deletion URL

            if (confirm('{{ trans('do you want to delete') }}')) { // Confirmation prompt with translation
                $.ajax({
                    type: "GET", // Specify DELETE method for deletion
                    url: deleteUrl,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF protection
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            toastr.success("Categoría eliminada correctamente.", "", {
                                onHidden: function() {
                                    window.location
                                .reload(); // Reload the page after success
                                }
                            });
                        } else {
                            toastr.error("No se pudo eliminar la categoría.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Log errors to console for debugging
                        toastr.error("No se pudo eliminar la categoría. Por favor, inténtelo de nuevo más tarde.");
                    }
                });
            }
        });
    </script>
@endsection
