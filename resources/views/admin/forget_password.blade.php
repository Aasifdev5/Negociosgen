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
    <title>{{ $general_setting['app_name'] ?? '' }} || Recuperar contraseña</title>
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
    <div class="page-wrapper">
        <div class="container-fluid" style="background: #0A0A0A;">
            <!-- Reset Password page start-->
            <div class="authentication-main" style="background: #0A0A0A;">
                <div class="row">
                    <div class="col-md-12 p-0">
                        <div class="auth-innerright">

                            <div class="authentication-box" style="background: #000;padding: 20px; border: 1px solid #000; border-radius: 16px;">
                                <div class="text-center"><img src="admin/images/endless-logo.png" alt=""></div>
                                <div class="card mt-4 p-4" style="background: #000">

                                    <form action="{{ url('sendResetPasswordLink') }}" method="post">
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                                        @endif
                                        @if (Session::has('fail'))
                                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                        @endif
                                        @csrf
                                        <div class="mb-3">
                                            <label for="emailRecovery" class="form-label text-light">Email</label>
                                            <input type="email" name="email" class="form-control" id="emailRecovery"
                                                placeholder="ejemplo@gmail.com" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100">Enviar</button>
                                        <div class="mt-3 text-center">
                                            <span class="text-light">Inicio de Sesión de Administrador </span>
                                            <a href="{{ url('admin/login') }}" class="text-primary">Únete aquí</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Reset Password page end-->
        </div>
    </div>
    <!-- page-wrapper Ends-->
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

</body>

</html>
