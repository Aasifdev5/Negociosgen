@extends('master')
@section('title')
    Carrito de compras
@endsection
@section('content')
    <main class="main__content_wrapper">
        <!-- cart section start -->
        <section class="cart__section section--padding">
            <div class="container-fluid">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ session::get('success') }}</p>
                    </div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">
                        <p>{{ session::get('fail') }}</p>
                    </div>
                @endif
                <div class="cart__section--inner">
                    <form action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <h2 class="cart__title mb-30">Carrito de compras</h2>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart__table">
                                    <table class="cart__table--inner">
    <thead class="cart__table--header">
        <tr class="cart__table--header__items">
            <th class="cart__table--header__list">PRODUCTO</th>
            <th class="cart__table--header__list">PRECIO</th>
            <th class="cart__table--header__list">CANTIDAD</th>
            <th class="cart__table--header__list">Total</th>
        </tr>
    </thead>
    <tbody class="cart__table--body">
     @php
    // Aggregate the cart items by product_id and size
    $aggregatedCarts = [];
    foreach ($carts as $item) {
        $key = $item->product_id . '-' . $item->size; // Unique key for each product and size combination
        if (!isset($aggregatedCarts[$key])) {
            $aggregatedCarts[$key] = [
                'item' => $item,
                'totalQuantity' => 0,
                'totalPrice' => 0,
            ];
        }
        $aggregatedCarts[$key]['totalQuantity'] += $item->quantity;
        $aggregatedCarts[$key]['totalPrice'] += $item->price * $item->quantity;
    }
@endphp

@foreach ($aggregatedCarts as $key => $cartGroup)
    @php
        list($product_id, $size) = explode('-', $key); // Extract product_id and size from key
        $item = $cartGroup['item'];
        $totalQuantity = $cartGroup['totalQuantity'];
        $totalPrice = $cartGroup['totalPrice'];
        $product_details = \App\Models\Product::find($product_id);

        if ($product_details) {
            $vcolor = \App\Models\ProductVariations::where('sku', $product_details->sku)->first();

            // Count the number of images for the given product and color 'm'
            $productImagesCount = \App\Models\Pro_image::where('product_id', $product_id)
                                                        ->where('color', 'm')
                                                        ->count();

            // Use the count to decide how to fetch the images
            if ($productImagesCount > 1) {
                // If there are multiple images with color 'm', fetch one
                $productImages = \App\Models\Pro_image::where('product_id', $product_id)
                                                      ->where('color', 'm')
                                                      ->orderBy('id', 'asc')
                                                      ->first();
            } else {
                // Otherwise, fetch the image based on the vcolor
                $productImages = $vcolor ? \App\Models\Pro_image::where('product_id', $vcolor->product_id)
                                          ->where('color', $vcolor->color)
                                          ->orderBy('id', 'asc')
                                          ->first() : null;
            }
        } else {
            $productImages = null;
        }
    @endphp

    @if ($product_details)
        <tr class="cart__table--body__items">
            <td class="cart__table--body__list">
                <div class="cart__product d-flex align-items-center">
                    <a href="{{ route('remove.cart', $item->id) }}" class="cart__remove--btn" aria-label="remove button" type="button">
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16px" height="16px">
                            <path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z" />
                        </svg>
                    </a>
                    <div class="cart__thumbnail">
                        <a href="{{ url('product-details/' . $product_details->slug) }}">
                            @if (!empty($productImages))
                                <img class="border-radius-5" src="{{ asset($productImages->thumbnail) }}" alt="cart-product">
                            @else
                                <img class="border-radius-5" src="{{ asset('product_images/' . $product_details->f_thumbnail) }}" alt="cart-product">
                            @endif
                        </a>
                    </div>
                    <div class="cart__content">
                        <h3 class="cart__content--title h4">
                            <a href="{{ url('product-details/' . $product_details->slug) }}">
                                {{ $product_details->title }}
                                @if (!empty($size)) - {{ $size }} @endif
                                @if (!empty($item->color)) - {{ $item->color }} @endif
                            </a>
                        </h3>
                    </div>
                </div>
            </td>
            <td class="cart__table--body__list">
                <h2 class="current__price" style="color:grey;">{{ 'Bs ' . $item->price }}</h2>
            </td>
            <td class="cart__table--body__list">
                <div class="quantity__box">
                    <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                    <label>
                        <input type="number" class="quantity__number quickview__value--number" value="{{ $totalQuantity }}" data-product-id="{{ $product_id }}" />
                    </label>
                    <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                </div>
            </td>
            <td class="cart__table--body__list">
                <h2 class="cart__price end" style="color:grey;">{{ 'Bs ' . $totalPrice }}</h2>
            </td>
        </tr>
    @else
        <tr class="cart__table--body__items">
            <td colspan="4" class="cart__table--body__list">
                <div class="alert alert-danger" role="alert">
                    Product not found for cart item with ID: {{ $item->id }}
                </div>
            </td>
        </tr>
    @endif
@endforeach





        @foreach ($carts as $row)
            <input type="hidden" name="cart_products[{{ $loop->index }}][product_id]" value="{{ $row->product_id }}">
            <input type="hidden" name="cart_products[{{ $loop->index }}][quantity]" value="{{ $row->quantity }}">
            <input type="hidden" name="cart_products[{{ $loop->index }}][price]" value="{{ $row->price }}">
           
            <input type="hidden" name="cart_products[{{ $loop->index }}][size]" value="{{ $row->size }}">
           
            
             
             <input type="hidden" name="cart_products[{{ $loop->index }}][sku]" value="{{ $row->sku }}">
             
            
        @endforeach

        <table class="cart__summary--total__table">
            <tbody>
                <tr class="cart__summary--total__list">
                    <td class="cart__summary--total__title text-left">TOTAL GENERAL</td>
                    <td class="cart__summary--amount text-right">
                        @php
                            $total = \App\Models\Cart::where('user_id', Session::get('LoggedIn'))
                                ->selectRaw('SUM(price * quantity) as total')
                                ->pluck('total')
                                ->first();
                            $formattedTotal = $total ? 'Bs' . number_format($total, 2) : 'Bs 0.00';
                        @endphp
                        {{ $formattedTotal }}
                    </td>
                </tr>
            </tbody>
        </table>
    </tbody>
</table>

<div class="text-right">
    <a href="{{ route('clear.cart') }}" class="cart__summary--footer__btn primary__btn checkout pull-right">Vaciar Carrito</a>
</div>


                                    <div class="continue__shopping d-flex justify-content-between">
                                        <div class="cart__summary--footer">

                                        <ul class="d-flex justify-content-between">
 <li><button type="button" id="reloadButton" style="display: none;" class="cart__summary--footer__btn primary__btn checkout pull-right"
                                                    >ACTUALIZAR CARRITO</button></li>
                                                    <br>
                                            <li><button type="submit" class="cart__summary--footer__btn primary__btn checkout"
                                                    >Pedido</button></li>
                                        </ul>
                                    </div>
                                           <script>
   document.addEventListener('DOMContentLoaded', function() {
    const decreaseButtons = document.querySelectorAll('.decrease');
    const increaseButtons = document.querySelectorAll('.increase');
    const quantityInputs = document.querySelectorAll('.quantity__number');
    const reloadButton = document.getElementById('reloadButton');

    const updateQuantityOnServer = (productId, quantity, successCallback) => {
        const xhr = new XMLHttpRequest();
        const url = '/update-quantity'; // Replace with your actual URL
        const data = JSON.stringify({ productId, quantity });

        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    console.log('Quantity updated successfully');
                    successCallback();
                    // Show the reload button
                    reloadButton.style.display = 'block';
                } else {
                    console.error('Failed to update quantity');
                    alert('Failed to update quantity. Please try again.');
                }
            }
        };

        xhr.send(data);
    };

    decreaseButtons.forEach(button => {
        button.addEventListener('click', () => {
            const quantityInput = button.parentElement.querySelector('.quantity__number');
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateQuantityOnServer(quantityInput.dataset.productId, currentValue - 1, () => {
                    quantityInput.value = currentValue - 1; // Update the input field
                });
            }
        });
    });

    increaseButtons.forEach(button => {
        button.addEventListener('click', () => {
            const quantityInput = button.parentElement.querySelector('.quantity__number');
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
            updateQuantityOnServer(quantityInput.dataset.productId, currentValue + 1, () => {
                quantityInput.value = currentValue + 1; // Update the input field
            });
        });
    });

    quantityInputs.forEach(input => {
        input.addEventListener('change', () => {
            let currentValue = parseInt(input.value);
            if (currentValue < 1) {
                input.value = 1;
                currentValue = 1;
            }
            updateQuantityOnServer(input.dataset.productId, currentValue, () => {
                input.value = currentValue; // Ensure the input field is updated
            });
        });
    });

    // Reload button event listener
    reloadButton.addEventListener('click', () => {
        window.location.reload();
    });
});


                                        </script>

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- cart section end -->

        <!-- Start product section -->
        <section class="product__section section--padding  pt-0">
            <div class="container">
                <div class="section__heading border-bottom mb-30">
                    <h2 class="section__heading--maintitle">Nuevo <span>Productos</span></h2>
                </div>
                <div class="product__section--inner pb-15 product__swiper--activation swiper">
                    <div class="swiper-wrapper">
                        @if (!empty($latest_products))
                            @foreach ($latest_products as $row)
                                @if ($user_session->price == 'price1')
                                    @php
                                        $price = $row->price1;
                                    @endphp
                                @endif
                                @if ($user_session->price == 'price2')
                                    @php
                                        $price = $row->price2;
                                    @endphp
                                @endif
                                @if ($user_session->price == 'price3')
                                    @php
                                        $price = $row->price3;
                                    @endphp
                                @endif
                                @if ($user_session->price == 'price4')
                                    @php
                                        $price = $row->price4;
                                    @endphp
                                @endif
                                @if ($user_session->price == 'price5')
                                    @php
                                        $price = $row->price5;
                                    @endphp
                                @endif
                                 @php
                                                        $IsVariation = \App\Models\ProductVariations::where(
                                                            'product_id',
                                                            $row->id,
                                                        )
                                                            ->orderBy('id', 'asc')
                                                            ->first();
                                                        if (!empty($IsVariation)) {
                                                            $IsVariationProductDetails = \App\Models\Product::where(
                                                                'sku',
                                                                $IsVariation->sku,
                                                            )->first();
                                                        } else {
                                                            $IsVariationProductDetails = null;
                                                        }
                                                    @endphp
                                <div class="swiper-slide">
                                    <article class="product__card">
                                        <div class="product__card--thumbnail">
                                            <a class="product__card--thumbnail__link display-block"
                                                href="{{ url('product-details') }}{{ '/' . $row->slug }}">
                                                @if (!empty($IsVariation) && $IsVariationProductDetails !=null)
                                                                        <img class="product__card--thumbnail__img product__primary--img"
                                                                            src="{{ asset('product_images/' . $IsVariationProductDetails->f_thumbnail) }}"
                                                                            alt="product-img">
                                                                        <img class="product__card--thumbnail__img product__secondary--img"
                                                                            src="{{ asset('product_images/' . $IsVariationProductDetails->f_thumbnail) }}"
                                                                            alt="product-img">
                                                                    @else
                                                                        <img class="product__card--thumbnail__img product__primary--img"
                                                                            src="{{ asset('product_images/' . $row->f_thumbnail) }}"
                                                                            alt="product-img">
                                                                        <img class="product__card--thumbnail__img product__secondary--img"
                                                                            src="{{ asset('product_images/' . $row->f_thumbnail) }}"
                                                                            alt="product-img">
                                                                    @endif
                                            </a>

                                            <ul
                                                class="product__card--action d-flex align-items-center justify-content-center">

 @if (empty($IsVariation))
                                                <!--<li class="product__card--action__list">-->
                                                <!--    <a class="product__card--action__btn" title="Wishlist"-->
                                                <!--        href="{{ url('addToWishlist') }}/{{ $price }}/{{ $row->id }}">-->
                                                <!--        <svg class="product__card--action__btn--svg" width="18"-->
                                                <!--            height="18" viewBox="0 0 16 13" fill="none"-->
                                                <!--            xmlns="http://www.w3.org/2000/svg">-->
                                                <!--            <path-->
                                                <!--                d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z"-->
                                                <!--                fill="currentColor" />-->
                                                <!--        </svg>-->
                                                <!--        <span class="visually-hidden">Wishlist</span>-->
                                                <!--    </a>-->
                                                <!--</li>-->
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="product__card--content">

                                            <h3 class="product__card--title"><a
                                                    href="{{ url('product-details') }}{{ '/' . $row->slug }}">{{ $row->title }}
                                                </a></h3>
                                            <div class="product__card--price">
                                                
                                                <h2 class="current__price" style="color:grey;"> {{ 'Bs ' . $price }}</h2>
                                            </div>
                                            <div class="product__card--footer">
                                                 @if (empty($IsVariation))
                                                <!--<a class="product__card--btn primary__btn"-->
                                                <!--    href="{{ url('addToCart') }}/{{ $price }}/{{ $row->id.'/1/default' }}">-->
                                                <!--    <svg width="14" height="11" viewBox="0 0 14 11" fill="none"-->
                                                <!--        xmlns="http://www.w3.org/2000/svg">-->
                                                <!--        <path-->
                                                <!--            d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625ZM7.33082 6.4375C7.33082 6.13281 7.07301 5.875 6.76832 5.875C6.4402 5.875 6.20582 6.13281 6.20582 6.4375V8.3125C6.20582 8.64062 6.4402 8.875 6.76832 8.875C7.07301 8.875 7.33082 8.64062 7.33082 8.3125V6.4375ZM9.95582 6.4375C9.95582 6.13281 9.69801 5.875 9.39332 5.875C9.0652 5.875 8.83082 6.13281 8.83082 6.4375V8.3125C8.83082 8.64062 9.0652 8.875 9.39332 8.875C9.69801 8.875 9.95582 8.64062 9.95582 8.3125V6.4375ZM4.70582 6.4375C4.70582 6.13281 4.44801 5.875 4.14332 5.875C3.8152 5.875 3.58082 6.13281 3.58082 6.4375V8.3125C3.58082 8.64062 3.8152 8.875 4.14332 8.875C4.44801 8.875 4.70582 8.64062 4.70582 8.3125V6.4375Z"-->
                                                <!--            fill="currentColor" />-->
                                                <!--    </svg>-->
                                                <!--   Añadir al carrito-->
                                                <!--</a>-->
                                                @endif
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        @else
                            <p>no related product available now</p>
                        @endif


                    </div>
                    <div class="swiper__nav--btn swiper-button-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class=" -chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                    <div class="swiper__nav--btn swiper-button-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class=" -chevron-left">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
        <!-- End product section -->

       
    <!-- Start shipping section -->
    <section class="shipping__section">
        <div class="container">
            <div class="shipping__inner style2 d-flex">
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="{{ asset('assets/img/other/shipping1.webp') }}" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Envios a todo Bolivia</h2>
                        <p class="shipping__content--desc">Envios garantizados</p>
                    </div>
                </div>
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="{{ asset('assets/img/other/shipping2.webp') }}" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Contactanos libremente</h2>
                        <p class="shipping__content--desc">las 24 horas del dia</p>
                    </div>
                </div>
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="{{ asset('assets/img/other/shipping3.webp') }}" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Productos originales</h2>
                        <p class="shipping__content--desc">Calidad garantizada</p>
                    </div>
                </div>
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="{{ asset('assets/img/other/shipping4.webp') }}" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Pago en efectivo</h2>
                        <p class="shipping__content--desc">O deposito bancario</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shipping section -->



    </main>
@endsection