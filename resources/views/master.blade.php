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

    <!-- Favicon -->
    <link rel="icon" href="{{ asset($general_setting['app_fav_icon'] ?? '') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset($general_setting['app_fav_icon'] ?? '') }}" type="image/x-icon">

    <!-- Meta -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/custom/image-preview.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/flag-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

</head>

<body>

    <style>
        /* Preloader styles */
        #preloader {
            position: fixed; /* Ensures it covers the whole screen */
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh; /* Full-screen height */
            background-color: #000; /* Set white background */
            background-image: url('{{ asset($general_setting['app_footer_payment_image'] ?? '') }}');
            background-size: contain; /* Ensures the image fits within the container */
            background-position: center; /* Centers the image */
            background-repeat: no-repeat; /* Prevents tiling */
            z-index: 9999; /* Ensures it's above other elements */
            display: flex; /* Enable flexbox for centering */
            align-items: center; /* Vertically center */
            justify-content: center; /* Horizontally center */
        }

        /* Fade-out animation */
        .fade-out {
            animation: fadeOut 1s ease-in-out;
            animation-fill-mode: forwards; /* Ensures the animation completes */
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
                visibility: hidden;
            }
        }

        /* Optional: Adjust for smaller screens */
        @media screen and (max-width: 768px) {
            #preloader {
                background-size: contain; /* Adjusts the image for smaller screens */
            }
        }

        .preloader__image {
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            -webkit-animation-name: flipInY;
            animation-name: flipInY;
            -webkit-animation-duration: 5s;
            animation-duration: 5s;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
            background-repeat: no-repeat;
            background-size: 30% 30%; /* Adjust the size of the inner image */
            background-position: center;
            width: 30%;
            height: 30%;
        }
    </style>

    <div class="preloader" id="preloader">
        <div class="preloader__image"></div>
    </div>




    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: #000; z-index: 1000;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset($general_setting['app_logo'] ?? '') }}" alt="Avatar Logo" style="width: 100px"
                    class="rounded-pill" />
            </a>

            <div class="language-buttons" style="display: flex; gap: 10px; align-items: center;">
                @foreach (appLanguages() as $app_lang)
                <a href="{{ url('admin/local/' . $app_lang->iso_code) }}" class="btn btn-language" style="border: none; background: transparent;">
                    <i class="flag-icon flag-icon-{{ $app_lang->iso_code }}"></i> {{ ucfirst($app_lang->name) }}
                </a>
            @endforeach

            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center mx-auto">
                    <!-- Navbar Links -->
                    <li
                        class="nav-item nav-item-custom-padding {{ Request::is('index') || Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link text-light" href="{{ url('index') }}">{{ __('Inicio') }}</a>
                    </li>
                    <li
                        class="nav-item nav-item-custom-padding {{ Request::is('who')  ? 'active' : '' }}">
                        <a class="nav-link text-light" href="{{ url('who') }}">{{ __('Quienes somos') }}</a>
                    </li>
                    <li
                        class="nav-item nav-item-custom-padding {{ Request::is('affiliate_company')  ? 'active' : '' }}">
                        <a class="nav-link text-light" href="{{ url('affiliate_company') }}">{{ __('Empresas afiliadas') }}</a>
                    </li>
                    {{-- <li class="nav-item nav-item-custom-padding {{ Request::is('nosotros') ? 'active' : '' }}">
                        <a class="nav-link text-light" href="{{ url('nosotros') }}">{{ __('Nosotros') }}</a>
                    </li> --}}

                        <li class="nav-item nav-item-custom-padding {{ Request::is('course') ? 'active' : '' }}">
                            <a class="nav-link text-light" href="{{ url('course') }}"> {{ __('Cursos') }}</a>
                        </li>

                    {{-- <li class="nav-item nav-item-custom-padding {{ Request::is('blog') ? 'active' : '' }}">
                        <a class="nav-link text-light" href="{{ url('blog') }}"> {{ __('Blog') }}</a>
                    </li> --}}
                    <li class="nav-item nav-item-custom-padding {{ Request::is('contact') ? 'active' : '' }}">
                        <a class="nav-link text-light" href="{{ url('contact') }}"> {{ __('Contáctanos') }}</a>
                    </li>
                    <li class="nav-item nav-item-custom-padding {{ Request::is('ayuda') ? 'active' : '' }}">
                        <a class="nav-link text-light" href="{{ url('ayuda') }}"> {{ __('¿Necesitas ayuda?') }}</a>
                    </li>

                    <!-- Conditional Links -->
                    @if (!empty($user_session))



                        <!-- Search Form -->
                        {{-- <li class="nav-item">
                            <form action="/search" method="GET" style="max-width: 300px; margin-right: 70px;">
                                <div class="input-group"
                                    style="position: relative; display: flex; align-items: center;">
                                    <input type="text" name="query" class="form-control"
                                        placeholder="Buscar con palabras claves"
                                        style="width: 100%; border-radius: 8px; border: 1px solid #333; padding-left: 40px; height: 39px; color: #8f8f8f; font-size: 16px;" />
                                    <img class="search-icon" alt="Buscar" src="{{ asset('assets/search.svg') }}"
                                        style="position: absolute; left: 12px; width: 20px;  filter: brightness(0.8);" />
                                </div>
                            </form>
                        </li> --}}

                        <!-- Profile Dropdown -->
                        <li class="nav-item dropdown" style="margin-right:90px;">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                @if (!empty($user_session->profile_photo))
                                    <img src="{{ asset('profile_photo/') }}<?php echo '/' . $user_session->profile_photo; ?>" class="personal-avatar"
                                        alt="avatar" style="width: 30px; height: 30px;">
                                @else
                                    <img src="{{ asset('149071.png') }}" alt="Profile Image"
                                        style="width: 30px; height: 30px;" />
                                @endif

                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('dashboard') }}">{{ __('Panel') }}</a></li>
                                <li><a class="dropdown-item" href="{{ url('edit_profile') }}">{{ __('Ver perfil') }}</a></li>

                                <li><a class="dropdown-item" href="{{ url('logout') }}">{{ __('Cerrar sesión') }}</a></li>
                            </ul>
                        </li>

                </ul>
            @else
                <!-- Únete ahora Button -->
                <a class="button btn btn-sm" href="{{ url('membership') }}"
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
                    <span class="button1" style="line-height: 18px;">{{ __('¡Únete ahora!') }}</span>
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
                    <span class="button1" style="line-height: 18px;">{{ __('Iniciar Sesión') }}</span>
                </a>
                @endif
            </div>
        </div>
    </nav>
    <a href="https://wa.me/59172635801" target="_blank"
    style="
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #25D366;
        color: white;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        text-decoration:none;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        font-size: 28px;
    ">
     <i class="fab fa-whatsapp"></i>
 </a>

    @yield('content')

    <!-- Footer -->
    <footer class="section-footer text-light py-4" style="background-color: #000;">
        <div class="container">
            <div class="row">
                <!-- Logo Section -->
                <div class="col-lg-2 col-md-12 text-center mb-4">
                    <div class="content-brand">
                        <img class="logoipo-icon" alt="Logo" src="<?php echo '/' . $general_setting['app_footer_payment_image'] ?? ''; ?>"
                            style="max-width: 100%; height: auto;">
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="content-redes-sociales">
                        <b class="informacin-de-contacto" style="display: block;">{{ __('Información de Contacto') }}</b>
                        <ul class="content-list-redes list-unstyled" style="margin-top: 13px;">
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">
                                <a class="contctanos text-decoration-none text-light" href="{{ url('contact') }}">{{ __('Contáctanos') }}</a>
                            </li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">GEN Bolivia</li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">{{ $general_setting['app_email'] ?? '' }}</li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">{{ $general_setting['app_location'] ?? '' }}</li>
                            <li class="list-item" style="margin-bottom: 0;">{{ $general_setting['app_contact_number'] ?? '' }}</li>
                        </ul>
                    </div>
                </div>

                <!-- Languages Section with Flags -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="content-redes-sociales">
                        <b class="informacin-de-contacto" style="display: block;">{{ __('Países') }}</b>
                        <ul class="content-list-redes list-unstyled" style="margin-top: 13px;">
                            <!-- Flags using Font Awesome icons -->
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">
                                <a href="#" class="text-decoration-none">
                                    <i class="flag-icon flag-icon-bo"></i> Bolivia
                                </a>
                            </li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">
                                <a href="#" class="text-decoration-none">
                                    <i class="flag-icon flag-icon-br"></i> Brazil
                                </a>
                            </li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">
                                <a href="#" class="text-decoration-none">
                                    <i class="flag-icon flag-icon-pe"></i> Peru
                                </a>
                            </li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">
                                <a href="#" class="text-decoration-none">
                                    <i class="flag-icon flag-icon-ar"></i> Argentina
                                </a>
                            </li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">
                                <a href="#" class="text-decoration-none">
                                    <i class="flag-icon flag-icon-py"></i> Paraguay
                                </a>
                            </li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">
                                <a href="#" class="text-decoration-none">
                                    <i class="flag-icon flag-icon-cl"></i>   Chile
                                </a>
                            </li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">
                                <a href="#" class="text-decoration-none">
                                    <i class="flag-icon flag-icon-co"></i> Colombia
                                </a>
                            </li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">
                                <a href="#" class="text-decoration-none">
                                    <i class="flag-icon flag-icon-ec"></i> Ecuador
                                </a>
                            </li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">
                                <a href="#" class="text-decoration-none">
                                    <i class="flag-icon flag-icon-mx"></i> Mexico
                                </a>
                            </li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">
                                <a href="#" class="text-decoration-none">
                                    <i class="flag-icon flag-icon-us"></i> USA
                                </a>
                            </li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">
                                <a href="#" class="text-decoration-none">
                                    <i class="flag-icon flag-icon-es"></i> Spain
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Social Media Section -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="content-redes-sociales1">
                        <b class="informacin-de-contacto" style="display: block;">{{ __('Síguenos en') }}:</b>
                        <ul class="content-list-redes list-unstyled" style="margin-top: 13px; display: flex; flex-direction: column;">
                            <li class="list-item mb-2 d-flex" style="margin-bottom: 0.5rem;">
                                <a href="{{ $general_setting['instagram_url'] ?? '' }}" target="_blank" class="d-flex align-items-center" style="text-decoration: none;">
                                    <img class="atomiconredes" alt="Instagram" src="{{ asset('assets/Instagram.svg') }}" width="30px" style="margin-right: 8px;">
                                    <span class="facebook fw-bold">Instagram</span>
                                </a>
                            </li>
                            <li class="list-item mb-2 d-flex" style="margin-bottom: 0.5rem;">
                                <a href="{{ $general_setting['facebook_url'] ?? '' }}" target="_blank" class="d-flex align-items-center" style="text-decoration: none;">
                                    <img class="facebooklogo-icon" alt="Facebook" src="{{ asset('assets/FacebookLogo.svg') }}" width="35px" style="margin-right: 8px;">
                                    <span class="facebook fw-bold">Facebook</span>
                                </a>
                            </li>
                            <li class="list-item mb-2 d-flex" style="margin-bottom: 0.5rem;">
                                <a href="{{ $general_setting['youtube_url'] ?? '' }}" target="_blank" class="d-flex align-items-center" style="text-decoration: none; color: inherit;">
                                    <i class="fab fa-youtube" style="font-size: 30px; margin-right: 8px; color: #fff;"></i>
                                    <span class="facebook fw-bold" style="color: inherit;">YouTube</span>
                                </a>
                            </li>
                            <li class="list-item d-flex" style="margin-bottom: 0;">
                                <a href="{{ $general_setting['tiktok_url'] ?? '' }}" target="_blank" class="d-flex align-items-center" style="text-decoration: none; color: inherit;">
                                    <i class="fab fa-tiktok" style="font-size: 30px; margin-right: 8px; color: #fff;"></i>
                                    <span class="facebook fw-bold" style="color: inherit;">TikTok</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Legal Information Section -->
                <div class="col-lg-2 col-md-12 mb-4">
                    <div class="content-redes-sociales2">
                        <b class="informacin-de-contacto" style="display: block;">{{ __('Legales & Derechos Reservados') }}</b>
                        <ul class="content-list-redes list-unstyled" style="margin-top: 13px; display: flex; flex-direction: column;">
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;"><a href="{{ url('workUs') }}" style="text-decoration: none;color:#fff;">{{ __('Trabaja con nosotras') }}</a></li>
                            <li class="list-item mb-2" style="margin-bottom: 0.5rem;">{{ __('Política de privacidad') }}</li>
                            <li class="list-item" style="margin-bottom: 0;"><a href="{{ url('term') }}" style="text-decoration: none;color:#fff;">{{ __('Términos de uso') }}</a></li>
                            @if (!empty($user_session))
                                <li class="list-item" style="margin-bottom: 0;"><a href="{{ route('tickets.create') }}" style="text-decoration: none;color:#fff;">{{ __('Apoyo') }}</a></li>
                            @else
                                <li class="list-item" style="margin-bottom: 0;"><a href="{{ url('Userlogin') }}" style="text-decoration: none;color:#fff;">{{ __('Apoyo') }}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Copyright Section -->
            <div class="copyright-2024-gen-todos-lo-parent d-flex flex-column flex-md-row justify-content-between align-items-center mt-4">
                <div class="d-flex justify-content-center justify-content-md-start align-items-center mtodos-de-pago mb-3 mb-md-0">
                    <div class="text-center text-md-start">{{ __('Derechos de autor') }} © {{ now()->year }} {{ __('GEN. Todos los derechos reservados.') }}</div>
                </div>

                <div class="mtodos-de-pago-parent d-flex flex-column flex-md-row align-items-center">
                    <div class="mtodos-de-pago me-3">{{ __('Métodos de pago') }}:</div>
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





    <!-- Custom JS for Video -->
    <script>
        const videoContainers = document.querySelectorAll('.video-container');
        videoContainers.forEach(container => {
            const video = container.querySelector('.embed-responsive');
            const thumbnail = container.querySelector('.thumbnail');
            const playButton = container.querySelector('.play-button');

            // Hide video initially
            video.style.display = 'none';
            playButton.addEventListener('click', () => {
                thumbnail.style.display = 'none';
                playButton.style.display = 'none';
                video.style.display = 'block';
                video.querySelector('video').play();
            });
        });
    </script>
 <script>
    // Wait for the page to fully load
    window.addEventListener('load', function () {
        const preloader = document.getElementById('preloader');
        const content = document.getElementById('content');

        // Add fade-out animation
        preloader.classList.add('fade-out');

        // Remove the preloader after the animation is complete
        preloader.addEventListener('animationend', function () {
            preloader.style.display = 'none';
            content.style.display = 'block';
        });
    });
</script>
</body>

</html>
