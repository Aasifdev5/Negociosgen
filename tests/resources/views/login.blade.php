<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $general_setting = getApplicationsettings();
        $category = getCategory();
        $adminNotifications = userNotifications();

    @endphp
    <title> {{ $general_setting->site_name }} || Login </title>
    <!-- favicons Icons -->

    <meta name="description" content="{{ $general_setting->site_description }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('admin/css/custom/image-preview.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('site_favicon/') }}<?php echo '/' . $general_setting->site_favicon; ?>">

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/glightbox.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500&amp;display=swap"
        rel="stylesheet">

    <!-- Plugin css -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        .authentication-box {
    width: 460px;
    z-index: 2;
    margin: 0 auto;
}
    </style>
</head>

<body>






<main class="main__content_wrapper">



    <!-- Start login section  -->
    <div class="login__section section--padding">
        <div class="container-fluid p-0">
            <div class="text-center">
                <h1 style="font-weight: 100;"><a href="{{ url('/') }}"><img src="{{ asset('logos bikebros.png') }}" width="300"  alt=""></a></h1>
            </div>
            <form action="{{ url('log') }}" method="post" >
                @if (Session::has('success'))
                            <div class="alert alert-success" style="background-color: green;">
                                <p style="color: #fff;">{{ session::get('success') }}</p>
                            </div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger" style="background-color: red;">
                                <p style="color: #fff;">{{ session::get('fail') }}</p>
                            </div>
                        @endif
                        @csrf
                    <div class="authentication-box">

                <div class="card mt-4 login__section--inner">

                        <div class="col-sm-12">
                            <div class="card-body">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title mb-10">Iniciar sesión</h2>
                                    <p class="account__login--header__desc">Inicia sesión si eres un cliente recurrente.</p>
                                </div>
                                <div class="account__login--inner">
                                    <label>
                                        <input class="account__login--input" placeholder="Email Addres" name="email" type="email">
                                        <span class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                    <label>
                                        <input class="account__login--input" placeholder="Password" name="password" type="password">
                                        <span class="text-danger" style="color:red;">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </label>
                                    <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                        <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label" for="check1">
                                               Recuérdame</label>
                                        </div>
                                        <button class="account__login--forgot"  type="submit">¿Olvidaste tu contraseña?</button>
                                    </div>
                                    <button class="account__login--btn primary__btn" type="submit">Iniciar sesión</button>


                                </div>
                            </div>
                        </div>


                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- End login section  -->

    <!-- Start shipping section -->
    <section class="shipping__section">
        <div class="container">
            <div class="shipping__inner style2 d-flex">
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping1.webp" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Envíamos tus compras</h2>
                        <p class="shipping__content--desc">La mejor gestiòn de envìo</p>
                    </div>
                </div>
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping2.webp" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Soporte 24/7</h2>
                        <p class="shipping__content--desc">Contáctanos las 24 horas del día</p>
                    </div>
                </div>
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping3.webp" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Sólo lo mejor</h2>
                        <p class="shipping__content--desc">La mejor calidad garantizada</p>
                    </div>
                </div>
                <div class="shipping__items style2 d-flex align-items-center">
                    <div class="shipping__icon">
                        <img src="assets/img/other/shipping4.webp" alt="icon-img">
                    </div>
                    <div class="shipping__content">
                        <h2 class="shipping__content--title h3">Pago seguro</h2>
                        <p class="shipping__content--desc">Compra con seguridad y confianza</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shipping section -->

</main>


