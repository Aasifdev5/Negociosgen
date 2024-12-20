<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @php
      $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
  @endphp
  <link rel="icon" href="<?php echo '/' . $general_setting['app_fav_icon'] ?? ''; ?>" type="image/x-icon">
  <link rel="shortcut icon" href="<?php echo '/' . $general_setting['app_fav_icon'] ?? ''; ?>" type="image/x-icon">
  <title>{{ $general_setting['app_name'] ?? '' }} || Reset Password</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/fontawesome.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/icofont.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/flag-icon.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/feather-icon.css') }}">

  <!-- Bootstrap and Custom CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/color-1.css') }}" media="screen">
  <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/responsive.css') }}">

  <style>
    body {
      background-color: #000;
      color: #EDEDED;
    }
    .auth-bg-video {
      background: #000;
    }
    .authentication-box {
      background: #000;
      padding: 20px;
      border: 1px solid #000;
      border-radius: 16px;
    }
    .card {
      background-color: #000;
    }
    .form-control {
      background-color: #222;
      color: #EDEDED;
      border: 1px solid #444;
    }
    .form-control::placeholder {
      color: #888;
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
    .text-danger {
      color: red !important;
    }
    .alert {
      color: #FFF;
      text-align: center;
      padding: 10px;
      border-radius: 5px;
    }
    .alert-success {
      background-color: green;
    }
    .alert-danger {
      background-color: red;
    }
  </style>
</head>

<body>
  <div class="page-wrapper">
    <div class="container-fluid p-0">
      <div class="auth-bg-video">
        <div class="authentication-box">
            <div class="text-center">
              <h1 style="font-weight: 100;">
                <a href="{{ url('/') }}"><img src="<?php echo '/' . $general_setting['app_footer_payment_image'] ?? ''; ?>" width="200" height="200" alt="Logo de la App"></a>
              </h1>
            </div>
            <div class="card mt-4">
              <div class="card-body">
                <div class="text-center">
                  <h4 style="color: #EDEDED;">Restablecer Contraseña</h4>
                  <h6>Ingresa tu nueva contraseña a continuación</h6>
                </div>
                <form class="theme-form" action="{{ url('ResetPassword') }}" method="post">
                  @if(Session::has('success'))
                    <div class="alert alert-success">{{ session::get('success') }}</div>
                  @endif
                  @if(Session::has('fail'))
                    <div class="alert alert-danger">{{ session::get('fail') }}</div>
                  @endif
                  @csrf
                  <input type="hidden" name="email" value="{{$email}}">
                  <div class="mb-3">
                    <label class="col-form-label">Nueva Contraseña</label>
                    <input type="password" class="form-control" name="new_password" placeholder="Ingresa nueva contraseña">
                    <p class="text-danger">@error('new_password'){{ $message }}@enderror</p>
                  </div>
                  <div class="mb-3">
                    <label class="col-form-label">Confirmar Nueva Contraseña</label>
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirma nueva contraseña">
                    <p class="text-danger">@error('confirm_password'){{ $message }}@enderror</p>
                  </div>
                  <div class="form-row mt-3">
                    <button class="btn btn-primary w-100" type="submit">Restablecer Contraseña</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('admin/js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/js/feather.min.js') }}"></script>
  <script src="{{ asset('admin/js/feather-icon.js') }}"></script>
  <script src="{{ asset('admin/js/sidebar-menu.js') }}"></script>
  <script src="{{ asset('admin/js/config.js') }}"></script>
  <script src="{{ asset('admin/js/script.js') }}"></script>
</body>

</html>
