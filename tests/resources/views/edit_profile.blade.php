@extends('master')
@section('title')
     {{ __('Editar perfil') }}
@endsection
@section('content')
<main class="main__content_wrapper">

   

    <!-- my account section start -->
    <section class="my__account--section section--padding">
        <div class="container">

            <div class="my__account--section__inner border-radius-10 d-flex">
                <div class="account__left--sidebar">
                    <h2 class="account__content--title mb-20">Mi perfil</h2>
                    <ul class="account__menu">
                        <li class="account__menu--list "><a href="{{ url('dashboard') }}">Panel de control</a></li>
                        <li class="account__menu--list"><a href="{{ url('address') }}">Direcciones</a></li>
                        <li class="account__menu--list active"><a href="{{ url('edit_profile') }}">Editar perfil</a></li>
                        <li class="account__menu--list"><a href="{{ url('change_password') }}">Cambiar contraseña</a></li>
                        <li class="account__menu--list"><a href="{{ url('MyOrders') }}">Pedidos</a></li>
                        <li class="account__menu--list"><a href="{{ url('wishlist') }}">Lista de deseos</a></li>
                        <li class="account__menu--list"><a href="{{ url('logout') }}">Cerrar sesión</a></li>
                    </ul>
                </div>
                <div class="account__wrapper">
                    <div class="account__content">
                        <h2 class="account__content--title h3 mb-20">Editar perfil</h2>
                        <div class="account__table--area">
                            <form action="{{ url('update_profile') }}" method="post" enctype="multipart/form-data">
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
                                <input type="hidden" name="user_id" value="{{ $user_session->id }}">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $user_session->name) }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Número de teléfono móvil</label>
                                    <input type="text" class="form-control" name="mobile_number"
                                        value="{{ $user_session->mobile_number }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo electrónico</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email', $user_session->email) }}">
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="mb-2">

                                        <div class="personal-image">
                                            <label class="label">
                                                <input type="file" name="profile_photo" id="profilePhotoInput"
                                                    onchange="previewImage(this)" />
                                                <figure class="personal-figure">
                                                    @if (!empty($user_session->profile_photo))
                                                        <img src="{{ asset('profile_photo/') }}<?php echo '/' . $user_session->profile_photo; ?>"
                                                            class="personal-avatar rounded-circle" width="100px" height="100px"
                                                            alt="avatar" id="profileImagePreview">
                                                    @else
                                                        <img src="images/profile photo.png" class="personal-avatar" alt="avatar"
                                                            id="profileImagePreview">
                                                    @endif


                                                </figure>
                                            </label>
                                            <p>PNG, JPG, JPEG</p>
                                        </div>
                                        <!-- ... (rest of your form code) ... -->


                                        <script>
                                            function previewImage(input) {
                                                var preview = document.getElementById('profileImagePreview');
                                                var file = input.files[0];
                                                var reader = new FileReader();

                                                reader.onloadend = function() {
                                                    preview.src = reader.result;
                                                }

                                                if (file) {
                                                    reader.readAsDataURL(file);
                                                } else {
                                                    preview.src = "images/profile photo.png"; // Default image when no file selected
                                                }
                                            }
                                        </script>
                                        <span class="text-danger">
                                            @error('profile_photo')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>

                                <!-- Add other fields as needed -->

                                <button type="submit" class="btn btn-primary">Actualización del perfil</button>
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
