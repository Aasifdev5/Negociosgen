@extends('admin.Master')

@section('title', __('Varias imágenes'))

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
                                        {{ __('Varias imágenes') }}
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
                                                <a class="nav-link active" id="images-tab" data-toggle="tab"
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
                                            <div class="tabs-body">
                                                <!--Data Entry Form-->
                                                <form action="{{ url('admin\saveProductImagesData') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="RecordId"
                                                        value="@if ($datalist['id']) {{ $datalist['id'] }} @endif">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <style>
                                                                .upload-img-gallery {
                                                                    display: flex;
                                                                    flex-wrap: wrap;
                                                                    /* Wrap images to fit in a row */
                                                                    margin: 0 -5px;
                                                                    /* Remove horizontal spacing between images */
                                                                }

                                                                .upload-img-gallery img {
                                                                    width: 120px;
                                                                    /* Adjust image width as needed */
                                                                    height: 120px;
                                                                    /* Adjust image height as needed */
                                                                    margin: 5px;
                                                                    border: 1px solid #ddd;
                                                                    object-fit: cover;
                                                                    /* Maintain aspect ratio and crop if necessary */
                                                                }

                                                                .upload-img-gallery img.removable {
                                                                    cursor: pointer;
                                                                    /* Change cursor to indicate removability */
                                                                }

                                                                #upload-button {
                                                                    /* Style the button as needed (e.g., border, background color) */
                                                                    display: flex;
                                                                    align-items: center;
                                                                    padding: 5px 10px;
                                                                    cursor: pointer;
                                                                }

                                                                #upload-button i {
                                                                    margin-right: 5px;
                                                                }
                                                            </style>

                                                            <div class="input__group mb-25">
                                                                <label for="og_images">{{ __('Imagen ') }}</label>
                                                                <div class="upload-img-box-container">
                                                                    <button type="button" id="upload-button">
                                                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                                                        <span>{{ __('Seleccionar imágenes') }}</span>
                                                                    </button>
                                                                    <input type="file" name="product_images[]" id="og_images"
                                                                        multiple accept="image/*" hidden
                                                                        onchange="previewMultipleFiles(this)">
                                                                    <div class="upload-img-gallery"></div>
                                                                </div>
                                                                @if ($errors->has('og_images'))
                                                                    <span class="text-danger"><i
                                                                            class="fas fa-exclamation-triangle"></i>
                                                                        {{ $errors->first('og_images') }}</span>
                                                                @endif
                                                                <p>
                                                                    <span
                                                                        class="text-black">{{ __('Tamaño Recomendado') }}:</span>
                                                                    400px x 400px
                                                                </p>
                                                            </div>
                                                            <script>
                                                                function previewMultipleFiles(input) {
                                                                    const previewContainer = document.querySelector('.upload-img-gallery');
                                                                    previewContainer.innerHTML = ''; // Clear existing previews before adding new ones

                                                                    const files = input.files;
                                                                    const maxCount = 15; // Adjust as needed

                                                                    for (let i = 0; i < Math.min(files.length, maxCount); i++) {
                                                                        const file = files[i];
                                                                        const reader = new FileReader();

                                                                        reader.onload = function(event) {
                                                                            const img = document.createElement('img');
                                                                            img.src = event.target.result;
                                                                            img.classList.add('uploaded-img', 'removable'); // Add classes for styling and removal

                                                                            img.addEventListener('click', function() {
                                                                                this.parentElement.removeChild(this); // Remove image on click
                                                                                const fileList = input.files;
                                                                                const newFileList = Array.from(fileList) // Convert to array to modify
                                                                                    .filter(f => f.name !== this.src.split('/').pop()); // Filter out removed image
                                                                                input.files = new Blob([new File([], 'newFileList.txt', {
                                                                                    type: 'text/plain'
                                                                                })], {
                                                                                    type: 'text/plain'
                                                                                }); // Reset file list (trick to trigger change event)
                                                                                input.files = newFileList; // Assign filtered list back to input
                                                                            });

                                                                            previewContainer.appendChild(img);
                                                                        };

                                                                        reader.readAsDataURL(file);
                                                                    }

                                                                    if (files.length > maxCount) {
                                                                        alert('You can only upload a maximum of ' + maxCount + ' images.');
                                                                    }
                                                                }

                                                                // Trigger file input on button click (accessibility improvement)
                                                                document.getElementById('upload-button').addEventListener('click', function() {
                                                                    document.getElementById('og_images').click();
                                                                });
                                                            </script>

                                                        </div>
                                                        <div class="col-md-4"></div>
                                                    </div>

                                                    <br>
                                                    <div class="row mt-15">
                                                        <div class="col-lg-12">
                                                            <button type="submit"
                                                                class="btn btn-primary">{{ __('Próximo paso') }}</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!--/Data Entry Form/-->
<br>
                                                <!--Image list-->
                                                <div id="tp_datalist">
                                                    <div class="col-sm-12">
                                                        @php
                                                            $imagelist = \App\Models\Pro_image::where('product_id', $datalist->id)->orderBy('id', 'desc')->paginate(15);
                                                        @endphp

                                                        <div class="row">
                                                            @if(count($imagelist) > 0)
                                                            @foreach($imagelist as $row)
                                                            <div class="col-md-4 col-sm-6 mb-4">
                                                                <div class="card">
                                                                    <img src="{{ asset($row->thumbnail) }}" class="card-img-top" alt="Image">
                                                                    <div class="card-body">
                                                                        <a onClick="onDelete({{ $row->id }})" class="media-image-remove btn btn-danger btn-sm" href="javascript:void(0);">
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
                                                        {{ $imagelist->links() }}
                                                    </div>

                                                </div>
                                                <!--/Image list/-->
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

    <script>
        function onDelete(id) {
            if (!confirm('¿Estás seguro de que deseas eliminar esta imagen?')) {
                return;
            }

            $.ajax({
                type: "POST",
                url: "{{ route('backend.deleteProductImages') }}",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.msgType === 'success') {
                        toastr.success(response.msg);
                        location.reload(); // Reload the page to reflect changes
                    } else {
                        toastr.error(response.msg);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    toastr.error("No se pudo eliminar la imagen. Por favor, inténtelo de nuevo más tarde.");
                }
            });
        }
    </script>

@endsection
