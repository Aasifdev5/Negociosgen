@extends('master')
@section('title')
    {{ __('Añadir dirección') }}
@endsection
@section('content')

    <main class="main__content_wrapper">

       

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
                            <h2 class="account__content--title h3 mb-20">Añadir dirección</h2>
                            <div class="account__table--area">
                                <form class="theme-form" action="{{ url('save_address') }}" method="post">
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
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user_session->id }}">
                                    <div class="row g-1">

                                            <div class="mb-3">
                                                <label class="col-form-label">{{ __('dirección') }}</label>
                                                <input class="form-control" type="text" name="address"
                                                    value="{{ old('address') }}">
                                                <span class="text-danger">
                                                    @error('address')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>

                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">{{ __('Ciudad') }}</label>
                                        <input class="form-control" type="text" name="city"
                                            value="{{ old('city') }}">
                                        <span class="text-danger">
                                            @error('city')
                                                {{ $message }}
                                            @enderror
                                        </span>

                                    </div>


                                    <div class="row g-2">
                                        <div class="col-sm-4">
                                            <button class="btn btn-primary btn-block" type="submit">{{ __('Actualizar') }}</button>
                                        </div>

                                    </div>

                                </form>
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
