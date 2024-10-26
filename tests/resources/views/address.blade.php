@extends('master')
@section('title')
    Address
@endsection
@section('content')
<main class="main__content_wrapper">
    @if(Session::has('success'))
    <div class="alert alert-success" style="background-color: green;">
        <p style="color: #fff;">{{session::get('success')}}</p>
    </div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger" style="background-color: red;">
        <p style="color: #fff;">{{session::get('fail')}}</p>
    </div>
    @endif
    

    <!-- my account section start -->
    <section class="my__account--section section--padding">
        <div class="container">
            <div class="my__account--section__inner border-radius-10 d-flex">
                <div class="account__left--sidebar">
                    <h2 class="account__content--title h3 mb-20">Mi perfil</h2>
                    <ul class="account__menu">
                        <li class="account__menu--list "><a href="{{ url('dashboard') }}">Panel de control</a></li>
                        <li class="account__menu--list active"><a href="{{ url('address') }}">Direcciones</a></li>
                        <li class="account__menu--list"><a href="{{ url('edit_profile') }}">Editar perfil</a></li>
                        <li class="account__menu--list"><a href="{{ url('change_password') }}">Cambiar contraseña</a></li>
                        <li class="account__menu--list"><a href="{{ url('MyOrders') }}">Pedidos</a></li>
                        <li class="account__menu--list"><a href="{{ url('wishlist') }}">Lista de deseos</a></li>
                        <li class="account__menu--list"><a href="{{ url('logout') }}">Cerrar sesión</a></li>
                    </ul>
                </div>
                <div class="account__wrapper">
                    <div class="account__content">
                        <h2 class="account__content--title h3 mb-20">Direcciones</h2>
                        <a class="new__address--btn primary__btn mb-25" href="{{ url('add_address') }}">Agregar una nueva dirección</a>
                        <div class="account__details two">
                            <h3 class="account__details--title h4">Predeterminado</h3>
                            <p class="account__details--desc">@if ($user_session)
                                {{ $user_session->address }}
                            @endif </p>
                            
                        </div>
                        <div class="account__details--footer d-flex">
                            <a class="account__details--footer__btn" href="button">Editar</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account section end -->
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
@endsection
