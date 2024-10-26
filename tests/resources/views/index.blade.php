@extends('master')
@section('title')
    Inicio
@endsection
@section('content')
    <main class="main__content_wrapper">
        <!-- Start slider section -->
        <section class="hero__slider--section">
            <div class="container">
                <div class="hero__slider--inner hero__slider--ml hero__slider--activation swiper">
                    <div class="hero__slider--wrapper swiper-wrapper">
                        <div class="swiper-slide ">
                            <div class="hero__slider--items home1-slider1-bg">
                                <div class="slider__content">
                                    <span class="slider__subtitle text__secondary">2024 Collections</span>
                                    <h2 class="slider__maintitle h1">Wheelss <br> <span
                                            class="slider__maintitle--inner__text">Body Part</span></h2>
                                    <span class="slider__price--text text__secondary">415.00/BS</span>
                                    <a class="primary__btn slider__btn" href="{{ url('shop') }}">
                                        Shop now
                                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58745 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178V3.6178Z"
                                                fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="hero__slider--layer">
                                    <img class="slider__layer--img " src="assets/img/slider/home1-slider1-layer.webp"
                                        alt="slider-img">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide ">
                            <div class="hero__slider--items home1-slider1-bg">
                                <div class="slider__content">
                                    <span class="slider__subtitle text__secondary">2024 Collections</span>
                                    <h2 class="slider__maintitle h1">Wheelss <br> <span
                                            class="slider__maintitle--inner__text">Body Part</span></h2>
                                    <span class="slider__price--text text__secondary">415.00/BS</span>
                                    <a class="primary__btn slider__btn" href="{{ url('shop') }}">
                                        Shop now
                                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58745 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178V3.6178Z"
                                                fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="hero__slider--layer">
                                    <img class="slider__layer--img " src="assets/img/slider/home1-slider2-layer.webp"
                                        alt="slider-img">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide ">
                            <div class="hero__slider--items home1-slider1-bg">
                                <div class="slider__content">
                                    <span class="slider__subtitle text__secondary">2024 Collections</span>
                                    <h2 class="slider__maintitle h1">Wheelss <br> <span
                                            class="slider__maintitle--inner__text">Body Part</span></h2>
                                    <span class="slider__price--text text__secondary">415.00/BS</span>
                                    <a class="primary__btn slider__btn" href="{{ url('shop') }}">
                                        Shop now
                                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58745 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178V3.6178Z"
                                                fill="currentColor" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="hero__slider--layer">
                                    <img class="slider__layer--img " src="assets/img/slider/home1-slider3-layer.webp"
                                        alt="slider-img">
                                </div>
                            </div>
                        </div>
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
        <!-- End slider section -->

        <!-- Start categories section -->
        <section class="categories__section section--padding">
            <div class="container">
                <div class="row mb--n25">
                    @php
                        $userCategories = !empty($user_session->categories)
                            ? explode(',', $user_session->categories)
                            : [];
                        $categories = \App\Models\Category::whereIn('id', $userCategories)->select('id', 'name','slug','image')->get();
                    @endphp
                    @foreach ($categories as $parentCategory)
                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 mb-25">
                            <div class="categories__card text-center">
                                <a class="categories__card--link" href="{{ url('productbyCategory') }}/{{ $parentCategory->id }}">
                                    <span class="categories__icon">
                                        
                                        <img   src="{{ asset($parentCategory->image) }}" >
                                    </span>
                                    <h2 class="categories__title">{{$parentCategory->name}}</h2>
                                    <span class="categories__subtitle"> @php
                                       $countItem = \App\Models\Product::where('category', $parentCategory->id)
    ->whereNotIn('sku', function($query) {
        $query->select('sku')
              ->from('product_variations');
    })
    ->count();

                                    @endphp
                                        ({{ $countItem }} Items)
                                    </span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End categories section -->




       

        <!-- Start product section -->
        <section class="product__section section--padding  pt-0">
            <div class="container">
                <div class="section__heading section__heading--flex border-bottom d-flex justify-content-between mb-30">
                    <h2 class="section__heading--maintitle">PRODUCTOS POPULARES</h2>
                    <ul class="nav tab__btn--wrapper" role="tablist">
                        <li class="tab__btn--item" role="presentation">
                            <button class="tab__btn--link active" data-bs-toggle="tab" data-bs-target="#recent"
                                type="button" role="tab" aria-selected="true"> Lo más reciente
                            </button>
                        </li>

                    </ul>
                </div>
                <div class="product__section--inner">
                    <div class="row row-md-reverse">
                        <div class="col-lg-3">
                            <div class="sidebar__category">
                                <div class="choose__category--content">
                                    <h2 class="choose__category--title">ELEGÍ UNA CATEGORÍA</h2>
                                    <ul class="choose__category--menu">
                                        @php
                                        $userCategories = !empty($user_session->categories) ? explode(',', $user_session->categories) : [];
        $categories = \App\Models\Category::whereIn('id', $userCategories)->select('id', 'name')->get();
                                       @endphp
                                         @foreach ($categories as $parentCategory)
                                        <li class="choose__category--menu__list">
                                            <svg class="choose__category--menu__icon" width="7" height="12"
                                                viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M7 6.00003L1.26232 12L0 10.68L4.47539 6L0 1.32002L1.26232 0L7 6.00003Z"
                                                    fill="currentColor" />
                                            </svg>
                                            <a class="choose__category--menu__link" href="{{ url('productbyCategory') }}/{{ $parentCategory->id }}">{{$parentCategory->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content" id="nav-tabContent">
                                <div id="recent" class="tab-pane fade show active" role="tabpanel">
                                    <div class="product__wrapper">
                                        <div class="row mb--n30">
                                             @foreach ($products as $row)
                                            @if ($user_session->price == "price1")
                                                @php
                                                    $price = $row->price1;
                                                @endphp
                                            @elseif ($user_session->price == "price2")
                                                @php
                                                    $price = $row->price2;
                                                @endphp
                                            @elseif ($user_session->price == "price3")
                                                @php
                                                    $price = $row->price3;
                                                @endphp
                                            @elseif ($user_session->price == "price4")
                                                @php
                                                    $price = $row->price4;
                                                @endphp
                                            @elseif ($user_session->price == "price5")
                                                @php
                                                    $price = $row->price5;
                                                @endphp
                                            @endif
                                            @php
                                            $IsVariation = \App\Models\ProductVariations::where('product_id', $row->id) ->orderBy('id', 'asc')->first();
            if(!empty($IsVariation)){
                $IsVariationProductDetails  = \App\Models\Product::where('sku', $IsVariation->sku)->first();
            }else{
                $IsVariationProductDetails = '';
            }
                                            @endphp
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-6 custom-col mb-30">
                                                <article class="product__card">
                                                    <div class="product__card--thumbnail">
                                                        <a class="product__card--thumbnail__link display-block" href="{{ url('product-details') }}/{{ $row->slug }}" data-product-id="{{ $row->id }}">

                                                            @if(!empty($IsVariation))
                                                            <img class="product__card--thumbnail__img product__primary--img" src="{{ asset('product_images/' .$IsVariationProductDetails->f_thumbnail) }}" alt="product-img">
                                                            <img class="product__card--thumbnail__img product__secondary--img" src="{{ asset('product_images/' .$IsVariationProductDetails->f_thumbnail) }}" alt="product-img">
                                                            @else
                                                            <img class="product__card--thumbnail__img product__primary--img" src="{{ asset('product_images/' . $row->f_thumbnail) }}" alt="product-img">
                                                            <img class="product__card--thumbnail__img product__secondary--img" src="{{ asset('product_images/' . $row->f_thumbnail) }}" alt="product-img">
                                                            @endif
                                                        </a>

                                                        <ul class="product__card--action d-flex align-items-center justify-content-center">
                                                             @if(empty($IsVariation))
                                                           <li class="product__card--action__list">
                                                                <a class="product__card--action__btn" title="Wishlist" href="{{ url('addToWishlist') }}/{{ $price }}/{{ $row->id }}">
                                                                    <svg class="product__card--action__btn--svg" width="18" height="18" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z" fill="currentColor"/>
                                                                    </svg>
                                                                    <span class="visually-hidden">Wishlist</span>
                                                                </a>
                                                            </li>
                                                            @endif

                                                        </ul>
                                                    </div>
                                                    <div class="product__card--content">
                                                        <h3 class="product__card--title"><a href="{{ url('product-details') }}/{{ $row->slug }}" data-product-id="{{ $row->id }}">{{ $row->title }}</a></h3>
                                                        <div class="product__card--price">
                                                            <span class="current__price">{{ 'BS '.$price }}</span>
                                                            {{-- <span class="old__price"> $362.00</span> --}}
                                                        </div>
                                                        <div class="product__card--footer">
                                                             @if(empty($IsVariation))
                                                            <a class="product__card--btn primary__btn" href="{{ url('addToCart') }}/{{ $price }}/{{ $row->id.'/1' }}">
                                                                <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625ZM7.33082 6.4375C7.33082 6.13281 7.07301 5.875 6.76832 5.875C6.4402 5.875 6.20582 6.13281 6.20582 6.4375V8.3125C6.20582 8.64062 6.4402 8.875 6.76832 8.875C7.07301 8.875 7.33082 8.64062 7.33082 8.3125V6.4375ZM9.95582 6.4375C9.95582 6.13281 9.69801 5.875 9.39332 5.875C9.0652 5.875 8.83082 6.13281 8.83082 6.4375V8.3125C8.83082 8.64062 9.0652 8.875 9.39332 8.875C9.69801 8.875 9.95582 8.64062 9.95582 8.3125V6.4375ZM4.70582 6.4375C4.70582 6.13281 4.44801 5.875 4.14332 5.875C3.8152 5.875 3.58082 6.13281 3.58082 6.4375V8.3125C3.58082 8.64062 3.8152 8.875 4.14332 8.875C4.44801 8.875 4.70582 8.64062 4.70582 8.3125V6.4375Z" fill="currentColor"/>
                                                                </svg>
                                                                Añadir al carrito
                                                            </a>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        @endforeach

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End product section -->





    </main>
@endsection
