<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
        $category = getCategory();
        $adminNotifications = userNotifications();

    @endphp
    <title> {{ $general_setting['app_name'] ?? '' }} || @yield('title') </title>
    <!-- favicons Icons -->
    <link rel="icon" href="<?php echo '/' . $general_setting['app_fav_icon'] ?? ''; ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo '/' . $general_setting['app_fav_icon'] ?? ''; ?>" type="image/x-icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('admin/css/custom/image-preview.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: rgb(0, 0, 0) !important; position: fixed; top: 0; width: 100%; z-index: 1000;">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/') }}">
            <img
              src="<?php echo '/' . $general_setting['app_logo'] ?? ''; ?>"
              alt="Avatar Logo"
              style="width: 100px"
              class="rounded-pill"
            />
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
            style="border-color: white;"
          >
            <span class="navbar-toggler-icon" style="
            background-image: url('data:image/svg+xml;charset=UTF8,%3Csvg viewBox=%270 0 30 30%27 xmlns=%27http://www.w3.org/2000/svg%27 fill=%27white%27%3E%3Cpath stroke=%27rgba(255, 255, 255, 1)%27 stroke-width=%272%27 stroke-linecap=%27round%27 stroke-miterlimit=%2710%27 d=%27M4 7h22M4 15h22M4 23h22%27/%3E%3C/svg%3E');
            "></span> <!-- Toggler icon in white -->
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center mx-auto">
                <li class="nav-item nav-item-custom-padding {{ Request::is('index') || Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link nav-item-custom" aria-current="page" href="{{ url('index') }}" style="color: white;">
                        Inicio
                    </a>
                </li>

                <li class="nav-item nav-item-custom-padding {{ Request::is('nosotros') ? 'active' : '' }}">
                    <a class="nav-link nav-item-custom" href="{{ url('nosotros') }}" style="color: white;">
                        Nosotros
                    </a>
                </li>
                <li class="nav-item nav-item-custom-padding {{ Request::is('course') ? 'active' : '' }}">
                    <a class="nav-link nav-item-custom" href="{{ url('course') }}" style="color: white;">
                        Cursos
                    </a>
                </li>
                <li class="nav-item nav-item-custom-padding {{ Request::is('blog') ? 'active' : '' }}">
                    <a class="nav-link nav-item-custom" href="{{ url('blog') }}" style="color: white;">
                        Blog
                    </a>
                </li>
                <li class="nav-item nav-item-custom-padding {{ Request::is('contact') ? 'active' : '' }}">
                    <a class="nav-link nav-item-custom" href="{{ url('contact') }}" style="color: white;">
                        Contáctanos
                    </a>
                </li>
                <li class="nav-item nav-item-custom-padding {{ Request::is('ayuda') ? 'active' : '' }}">
                    <a class="nav-link nav-item-custom" href="{{ url('ayuda') }}" style="color: white;">
                        ¿Necesitas ayuda?
                    </a>
                </li>

            </ul>



            <!-- Join Now Button -->
            <a class="button btn btn-sm" href="{{ url('signup') }}"
               style="
                 position: relative;
                 border-radius: 6px;
                 border: 1px solid #0090ff;
                 box-sizing: border-box;
                 display: flex;
                 align-items: center;
                 padding: 10px 16px;
                 text-align: left;
                 font-size: 16px;
                 color: #fff;
                 background-color: #0090ff;
                 font-family: 'Space Grotesk', sans-serif;
                 margin-right: 20px;
                 ">
              <span class="button1" style="line-height: 18px;">¡Únete ahora!</span>
            </a>
      <br>
            <!-- Login Button -->
            <a class="button btn btn-sm" href="{{ url('Userlogin') }}"
            style="
            position: relative;
            border-radius: 6px;
            border: 1px solid #0090ff;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            padding: 10px 16px;
            text-align: left;
            font-size: 16px;
            color: #0090ff;
            font-family: 'Space Grotesk', sans-serif;
            margin-right: 20px;
            ">
              <span class="button1" style="line-height: 18px;">Iniciar Sesión</span>
            </a>
          </div>
        </div>
      </nav>
      @yield('content')
    <footer class="section-footer text-light py-4" style="background-color: #0A0A0A;">
        <div class="container">
            <div class="row">
                <!-- Logo Section -->
                <div class="col-lg-3 col-md-12 text-center mb-4">
                    <div class="content-brand">
                        <img class="logoipo-icon" alt="Logo" src="<?php echo '/' . $general_setting['app_footer_payment_image'] ?? ''; ?>" style="max-width: 100%; height: auto;">
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="content-redes-sociales">
                        <b class="informacin-de-contacto" style="display: block;">Información de Contacto</b>
                        <ul class="content-list-redes list-unstyled" style="margin-top: 13px;">
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">
                                <a class="contctanos text-decoration-none text-light">Contáctanos</a>
                            </li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">GEN Bolivia</li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">NIT: XXXXXX</li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">Calle X, Número X, Barrio X Santa Cruz, Bolivia</li>
                            <li class="list-item" style="margin-bottom: 0;">+591 XXXX XXXX</li>
                        </ul>
                    </div>
                </div>

                <!-- Social Media Section -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="content-redes-sociales1">
                        <b class="informacin-de-contacto" style="display: block;">Síguenos en:</b>
                        <ul class="content-list-redes list-unstyled" style="margin-top: 13px; display: flex; flex-direction: column;">
                            <li class="list-item mb-2 d-flex " style="margin-bottom: 0.5rem;">
                                <img class="facebooklogo-icon" alt="Facebook" src="{{ asset('assets/FacebookLogo.svg') }}" width="35px" style="margin-right: 8px;">
                                <span class="facebook fw-bold">Facebook</span>
                            </li>
                            <li class="list-item mb-2 d-flex " style="margin-bottom: 0.5rem;">
                                <img class="atomiconredes" alt="Instagram" src="{{ asset('assets/Instagram.svg') }}" width="30px" style="margin-right: 8px;">
                                <span class="facebook fw-bold">Instagram</span>
                            </li>
                            <li class="list-item mb-2 d-flex " style="margin-bottom: 0.5rem;">
                                <img class="facebooklogo-icon" alt="LinkedIn" src="{{ asset('assets/Redes.svg') }}" width="30px" style="margin-right: 8px;">
                                <span class="facebook fw-bold">LinkedIn</span>
                            </li>
                            <li class="list-item d-flex " style="margin-bottom: 0;">
                                <img class="facebooklogo-icon" alt="Twitter" src="{{ asset('assets/XLogo.svg') }}" width="30px" style="margin-right: 8px;">
                                <span class="facebook fw-bold">Twitter</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Legal Information Section -->
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="content-redes-sociales2">
                        <b class="informacin-de-contacto" style="display: block;">Legales & Derechos Reservados</b>
                        <ul class="content-list-redes list-unstyled" style="margin-top: 13px; display: flex; flex-direction: column;">
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">Mapa del sitio web</li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">Política de privacidad</li>
                            <li class="list-item" style="margin-bottom: 0;"><a href="{{ url('term') }}" style="text-decoration: none;color:#fff;">Términos de uso</a></li>
                        </ul>
                    </div>
                </div>
            </div>


            <!-- Copyright Section -->
            <div class="copyright-2024-gen-todos-lo-parent d-flex flex-column flex-md-row justify-content-between align-items-center mt-4">
                <div class="d-flex justify-content-center justify-content-md-start align-items-center mtodos-de-pago mb-3 mb-md-0">
                    <div class="text-center text-md-start">Copyright © 2024 GEN. Todos los derechos reservados.</div>
                </div>

                <div class="mtodos-de-pago-parent d-flex flex-column flex-md-row align-items-center">
                    <div class="mtodos-de-pago me-3">Métodos de pago:</div>
                    <div class="d-flex flex-wrap">
                        <img class="mastercard-icon me-2" alt="MasterCard" src="{{ asset('assets/mastercard-Icon.svg') }}" style="max-width: 40px; height: auto;">
                        <img class="visa-icon me-2" alt="Visa" src="{{ asset('assets/visa-Icon.svg') }}" style="max-width: 40px; height: auto;">
                        <img class="visa-icon me-2" alt="American Express" src="{{ asset('assets/american-express-Icon.svg') }}" style="max-width: 40px; height: auto;">
                        <img class="mastercard-icon me-2" alt="PayPal" src="{{ asset('assets/paypal-Icon.svg') }}" style="max-width: 40px; height: auto;">
                        <img class="visa-icon me-2" alt="Google Pay" src="{{ asset('assets/G.svg') }}" style="max-width: 40px; height: auto;">
                        <img class="mastercard-icon" alt="Diners Club" src="{{ asset('assets/qrcode.svg') }}" style="max-width: 40px; height: auto;">
                    </div>
                </div>

            </div>

        </div>
    </footer>

    <script>
        const videoContainers = document.querySelectorAll('.video-container');

        videoContainers.forEach(container => {
            const video = container.querySelector('.embed-responsive');
            const thumbnail = container.querySelector('.thumbnail');
            const playButton = container.querySelector('.play-button');

            // Hide the video element by default
            video.style.display = 'none';

            playButton.addEventListener('click', () => {
                thumbnail.style.display = 'none'; // Hide thumbnail
                playButton.style.display = 'none'; // Hide play button
                video.style.display = 'block'; // Show video
                video.querySelector('video').play(); // Start playing video
            });
        });
    </script>

</body>

</html>
