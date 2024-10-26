@extends('master')
@section('title')
    {{ __('Cambiar Contraseña') }}
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
                        <h2 class="account__content--title mb-20">Mi perfil</h2>
                        <ul class="account__menu">
                           <li class="account__menu--list "><a href="{{ url('dashboard') }}">Panel de control</a></li>
                        <li class="account__menu--list"><a href="{{ url('address') }}">Direcciones</a></li>
                        <li class="account__menu--list"><a href="{{ url('edit_profile') }}">Editar perfil</a></li>
                        <li class="account__menu--list active"><a href="{{ url('change_password') }}">Cambiar contraseña</a></li>
                        <li class="account__menu--list"><a href="{{ url('MyOrders') }}">Pedidos</a></li>
                        <li class="account__menu--list"><a href="{{ url('wishlist') }}">Lista de deseos</a></li>
                        <li class="account__menu--list"><a href="{{ url('logout') }}">Cerrar sesión</a></li>
                        </ul>
                    </div>
                    <div class="account__wrapper">
                        <div class="account__content">
                            <h2 class="account__content--title h3 mb-20">Cambiar contraseña</h2>
                            <div class="account__table--area">
                                <form class="theme-form" action="update_password" method="post">
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
                                                <label class="col-form-label">{{ __('Nueva Contraseña') }}</label>
                                                <input class="form-control" type="password" name="new_password"
                                                    value="{{ old('new_password') }}">
                                                <span class="text-danger">
                                                    @error('new_password')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>

                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">{{ __('Confirmar Contraseña') }}</label>
                                        <input class="form-control" type="password" name="confirm_password"
                                            value="{{ old('confirm_password') }}">
                                        <span class="text-danger">
                                            @error('confirm_password')
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
