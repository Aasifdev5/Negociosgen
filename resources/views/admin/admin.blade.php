<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
    @endphp
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="<?php echo '/' . $general_setting['app_fav_icon'] ?? ''; ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo '/' . $general_setting['app_fav_icon'] ?? ''; ?>" type="image/x-icon">
    <title>{{ $general_setting['app_name'] ?? '' }} || Inicio de Sesión de Administrador</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/feather-icon.css') }}">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.css') }}">
    <link id="bootstrap-file" rel="stylesheet" type="text/css" href="#">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('admin/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/responsive.css') }}">
</head>

<body>
    <!-- Loader starts-->

    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper" style="background: #0A0A0A;">
        <div class="container-fluid p-0" style="background: #0A0A0A;">
            <!-- login page with video background start-->
            <div class="auth-bg-video" style="background: #0A0A0A;">

                <div class="authentication-box" style="background: #000;padding: 20px; border: 1px solid #000; border-radius: 16px;">
                    <div class="text-center">
                        <h1 style="font-weight: 100;"><a href="{{ url('/') }}"><img src="<?php echo '/' . $general_setting['app_footer_payment_image'] ?? ''; ?>" width="200px" height="200px"  alt="300px"></a></h1>
                    </div>
                    <div class="card mt-4" style="background: #000">
                        <div class="card-body">
                            <div class="text-center">
                                <h4 style="color: #EDEDED">Inicio de Sesión de Administrador</h4>
                                <h6>Ingresa tu nombre de usuario y contraseña </h6>
                            </div>
                            <form class="theme-form" action="{{ url('admin/log') }}" method="post">
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

                                <div class="mb-3">
                                    <label class="col-form-label pt-0">Correo Electrónico</label>
                                    <input class="form-control" type="email" name="email">
                                    <p class="text-danger" style="color: red">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Contraseña</label>
                                    <input class="form-control" type="password" name="pass">
                                    <p class="text-danger">
                                        @error('pass')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                                <div class="mb-3 text-end">
                                    <a href="forget_password" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
                                </div>
                                <div class="form-row mt-3">
                                    <button class="btn btn-primary w-100"  type="submit">Iniciar Sesión</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- login page with video background end-->
        </div>

    </div>
    <!-- latest jquery-->
    <script src="{{ asset('admin/js/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('admin/js/feather.min.js') }}"></script>
    <script src="{{ asset('admin/js/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('admin/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('admin/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('admin/js/script.js') }}"></script>
    <!-- Plugin used-->

</body>

</html>
