<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
        $adminNotifications = adminNotifications();
    @endphp

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="icon" href="<?php echo '/' . $general_setting['app_fav_icon'] ?? ''; ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo '/' . $general_setting['app_fav_icon'] ?? ''; ?>" type="image/x-icon">
    <title>{{ $general_setting['app_name'] ?? '' }} || @yield('title')</title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/prism.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom/image-preview.css') }}">

    <link id="bootstrap-file" rel="stylesheet" type="text/css" href="#">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('admin/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <!-- Include Toastr.js CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- Include Toastr.js JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/select2.css') }}">

    <style>
        .page-body {
            background: #000;
        }

        .card {
            background: #000;

        }

        label {
            color: #fff !important;
        }

        /* input file  */
        .personal-image {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 15px;
        }

        .personal-image input[type="file"] {
            display: none;
        }

        .personal-figure {
            position: relative;
            width: 150px;
            height: 150px;
        }

        .personal-avatar {
            cursor: pointer;
            width: 150px;
            height: 150px;
            box-sizing: border-box;
            border-radius: 100%;
            border: 2px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.2);
            transition: all ease-in-out .3s;
        }

        .personal-avatar:hover {
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.5);
        }

        .personal-figcaption {
            cursor: pointer;
            position: absolute;
            top: 0px;
            width: inherit;
            height: inherit;
            border-radius: 100%;
            opacity: .6;
            background-color: rgba(0, 0, 0, .3);
            transition: all ease-in-out .3s;
        }


        .personal-figcaption>img {
            margin-top: 32.5px;
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
        <div class="loader bg-white">
            <div class="whirly-loader"> </div>
        </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <!-- Page Header Start-->
        <div class="page-main-header" style="background: #000">
            <div class="main-header-right row">

                <!-- Sidebar Toggle for Mobile -->
                <div class="vertical-mobile-sidebar col-auto ps-3 d-none"><i class="fa fa-bars sidebar-bar"></i></div>

                <!-- Sidebar Toggle Button -->
                <div class="mobile-sidebar col-auto ps-0 d-block">
                    <div class="media-body switch-sm">
                        <label class="switch">
                            <a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a>
                        </label>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <div class="nav-right col p-0">
                    <ul class="nav-menus">

                        <!-- Home Link -->
                        <li style="width: 100%">
                            <a class="sidebar-header" href="{{ url('/') }}">
                                <i data-feather="monitor"></i><span></span>
                            </a>
                        </li>

                        <!-- Notification Dropdown -->
                        <li class="admin-notification-menu position-relative">
                            <a href="#" class="btn btn-dropdown site-language position-relative"
                                id="dropdownNotification" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="badge rounded-pill bg-danger"
                                    style="position: absolute; top: 5px; left: 75%; transform: translate(-50%, -50%);">
                                    {{ $adminNotifications ? count($adminNotifications) : 0 }}
                                </span>
                                <i data-feather="bell"></i>
                            </a>

                            <!-- Notification Dropdown Menu -->
                            <div class="dropdown-menu" aria-labelledby="dropdownNotification">
                                <ul class="dropdown-list custom-scrollbar">
                                    @isset($adminNotifications)
                                        @forelse($adminNotifications as $notification)
                                            @if ($notification->sender)
                                                <li>
                                                    <a href="{{ route('notification.url', [$notification->uuid]) }}"
                                                        class="message-user-item dropdown-item">
                                                        <div class="d-flex align-items-center">
                                                            <div class="user-img-wrap position-relative radius-50">
                                                                <img src="{{ asset($notification->sender->profile_photo ?? '149071.png') }}"
                                                                    alt="img"
                                                                    style="width: 50px; height: 50px; border-radius: 50%;">
                                                            </div>
                                                            <div class="ms-2">
                                                                <h6 class="color-heading font-14">
                                                                    {{ $notification->sender->name }}</h6>
                                                                <p class="font-13 mb-0">{{ __($notification->text) }}</p>
                                                                <div class="font-11 color-gray mt-1">
                                                                    {{ $notification->created_at->diffForHumans() }}</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endif
                                        @empty
                                            <li class="text-center">{{ __('No Data Found') }}</li>
                                        @endforelse
                                    @else
                                        <li class="text-center">{{ __('No Notifications Found') }}</li>
                                    @endisset
                                </ul>
                                @if ($adminNotifications && count($adminNotifications) > 0)
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('notification.all-read') }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="dropdown-item dropdown-footer">{{ __('Mark all as read') }}</button>
                                    </form>
                                @endif
                            </div>
                        </li>

                        <!-- Language Dropdown -->
                        <li>

                            <a href="#" class="btn btn-dropdown site-language" id="dropdownLanguage"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- Display the icon for the specific language using ISO code -->
                                <i
                                    class="flag-icon flag-icon-{{ selectedLanguage(session()->get('local'))->iso_code }}"></i>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownLanguage" style="background: #000">
                                @foreach (appLanguages() as $app_lang)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ url('admin/local/' . $app_lang->iso_code) }}">
                                            <i class="flag-icon flag-icon-{{ $app_lang->iso_code }}"></i>
                                            <span>{{ $app_lang->language }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <!-- User Profile Dropdown -->
                        <li class="onhover-dropdown">
                            <div class="media align-items-center">
                                <img class="align-self-center img-50 rounded-circle"
                                    src="{{ asset('profile_photo/' . $user_session->profile_photo) }}"
                                    alt="header-user">
                                <div class="dotted-animation">
                                    <span class="animate-circle"></span>
                                    <span class="main-circle"></span>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div p-20" style="background: #000">
                                <li><a href="{{ url('admin/edit_profile') }}" class="text-light"><i
                                            data-feather="user"></i> {{ __('Editar Perfil') }}</a></li>
                                <li><a href="{{ url('admin/change_password') }}" class="text-light"><i
                                            data-feather="lock"></i> {{ __('Cambiar Contraseña') }}</a></li>
                                <li><a href="{{ url('admin/signout') }}" class="text-light"><i
                                            data-feather="log-out"></i> {{ __('Cerrar Sesión') }}</a></li>
                            </ul>
                        </li>

                    </ul>

                    <!-- Mobile Toggle for Menu -->
                    <div class="d-lg-none mobile-toggle pull-right">
                        <i data-feather="more-horizontal"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Header Ends   -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper" style="background: #000">
            <!-- Page Sidebar Start-->
            <div class="page-sidebar" style="background: #000">
                <div class="main-header-left d-none d-lg-block">
                    <div class="logo-wrapper"><a href="{{ url('admin/dashboard') }}"><img src="<?php echo '/' . $general_setting['app_logo'] ?? ''; ?>"
                                style="width: 200px;height:60px" alt=""></a>
                    </div>
                </div>
                <div class="sidebar custom-scrollbar">
                    <div class="sidebar-user text-center">
                        <div>
                            @if (!empty($user_session->profile_photo))
                                <img src="{{ asset('profile_photo/') }}<?php echo '/' . $user_session->profile_photo; ?>" class="personal-avatar"
                                    alt="avatar">
                            @else
                                <img src="images/profile photo.png" class="personal-avatar" alt="avatar">
                            @endif
                            <div class="profile-edit"><a href="edit_profile" target="_blank"><i
                                        data-feather="edit"></i></a>
                            </div>
                        </div>
                        <h6 class="mt-3 f-14"><?php
                        echo $user_session->name;
                        ?></h6>

                    </div>
                    @if ($user_session->is_super_admin == 1)
                        <ul class="sidebar-menu">
                            <li><a class="sidebar-header" href="{{ url('admin/dashboard') }}"><i
                                        data-feather="home"></i><span> {{ __('Panel de Control') }}</span></a>

                            </li>
                            <li><a class="sidebar-header" href="{{ url('admin/earn') }}"><i
                                        data-feather="dollar-sign"></i><span> {{ __('Gestión Ganancias') }}</span></a>

                            </li>
                            <li><a class="sidebar-header" href="{{ route('events.index') }}"><i
                                        data-feather="calendar"></i><span> {{ __('Eventos') }}</span></a></li>

                         <li><a class="sidebar-header" href="{{ route('memberships.index') }}"><i data-feather="calendar"></i><span> {{ __('Gestionar Membresías') }}</span></a></li>


                            <li>
                                <a class="sidebar-header" href="#">
                                    <i data-feather="settings"></i>
                                    <span>{{ __('Application') }}<i class="fa fa-angle-right pull-right"></i></span>
                                </a>
                                <ul class="sidebar-submenu">

                                    <li class="">
                                        <a href="{{ route('settings.general_setting') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Global Settings') }}</span>
                                        </a>
                                    </li>

                                    <li class="">
                                        <a href="{{ route('settings.special-feature-section') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Home Settings') }}</span>
                                        </a>
                                    </li>

                                    <li class="">
                                        <a href="{{ route('settings.location.country.index') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Location Settings') }}</span>
                                        </a>
                                    </li>






                                    <li class="">
                                        <a href="{{ route('settings.mail-configuration') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Mail Configuration') }}</span>
                                        </a>
                                    </li>


                                    <li class="">
                                        <a href="{{ route('settings.payment_method_settings') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Payment Options') }}</span>
                                        </a>
                                    </li>





                                    <li class="">
                                        <a href="{{ route('settings.support-ticket.cms') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Support Ticket') }}</span>
                                        </a>
                                    </li>




                                </ul>
                            </li>
                            <li><a class="sidebar-header" href="{{ url('admin/withdraws') }}"><i
                                        class="icofont icofont-bank"></i><span>{{ __('Solicitudes de Retiro') }}
                                    </span></a></li>
                            <li><a class="sidebar-header" href="{{ route('audiolibros.index') }}"><i
                                        class="icofont icofont-ui-head-phone"></i><span>{{ __('Audiolibros') }}
                                    </span></a></li>
                            <li><a class="sidebar-header" href="{{ url('admin/banners') }}"><i
                                        data-feather="monitor"></i><span>{{ __('Bandera') }}
                                    </span></a></li>
                            {{-- <li><a class="sidebar-header" href="{{ url('admin/portfolios') }}"><i class="icofont icofont-briefcase"></i><span>{{ __('Portfolio') }}
                                    </span></a></li>
                                    <li><a class="sidebar-header" href="{{ url('admin/testimonials') }}"><i class="icofont icofont-award"></i><span>{{ __('Testimonials') }}
                                    </span></a></li> --}}
                            <li><a class="sidebar-header" href="{{ url('admin/qrcode') }}"><i
                                        class="fa fa-qrcode"></i> CÓDIGO QR </a></li>
                            <li>
                            <li><a class="sidebar-header" href="{{ route('news.index') }}"><i
                                        class="icofont icofont-triangle"></i> Noticias </a></li>
                            <li>
                                {{-- <li class="">
                                <a class="has-arrow sidebar-header" href="#">
                                    <i class="icofont icofont-social-blogger"></i>
                                    <span>{{ __('Administrar Blog') }}<i
                                            class="fa fa-angle-right pull-right"></i></span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a href="{{ route('blog.create') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Agregar Blog') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog.index') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Todo el Blog') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog.blog-comment-list') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Lista de Comentarios') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog.blog-category.index') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Categoría de Blog') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}

                            <li><a class="sidebar-header" href="{{ url('admin/transactions_report') }}"><i class="icofont icofont-money-bag"></i><span>{{ __('Recibir Fondos') }} </span></a>
                            </li>
                            {{-- <li><a class="sidebar-header" href="{{ url('admin/pages') }}"><i
                                        data-feather="book"></i><span>{{ __('Pages') }} </span></a> </li>
                            <li>
                                <a href="{{ url('admin/mail-templates') }}" class="sidebar-header">
                                    <i data-feather="mail"></i><span>{{ __('Plantillas de Correo') }} </span>
                                </a>
                            </li> --}}
                            <li>
                                <a class="sidebar-header" href="#">
                                    <i class="fa fa-language"></i>
                                    <span>{{ __('Administrar Idioma') }}</span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a href="{{ url('admin/language') }}" class="sidebar-header">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('  Idioma') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="sidebar-header" href="{{ url('admin/users') }}"><i
                                        data-feather="users"></i><span>{{ __('Gestión de Usuarios') }} </span></a>
                            </li>
                            {{-- <li>
                                <a class="sidebar-header" href="#">
                                    <span class="iconify" data-icon="carbon:forum"></span>
                                    <span>{{ __('Manage Forum') }} <i class="fa fa-angle-right pull-right"></i></span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a class="sidebar-header" href="{{ route('forum.category.index') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Forum Category') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                            <li>
                                <a class="sidebar-header" href="#">
                                    <span class="iconify" data-icon="ic:twotone-support-agent"></span>
                                    <span>{{ __('Support Ticket') }} <i
                                            class="fa fa-angle-right pull-right"></i></span>
                                </a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a class="sidebar-header" href="{{ route('support-ticket.index') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('All Tickets') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidebar-header" href="{{ route('support-ticket.open') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Open Ticket') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="sidebar-header" href="{{ route('brands.index') }}">
                                    <i class="fa fa-suitcase"></i>
                                    <span>{{ __('Marcas') }}</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-header" href="{{ route('curso.index') }}">
                                    <i class="fa fa-graduation-cap"></i>
                                    <span>{{ __('Curso') }}</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-header" href="{{ route('success.index') }}">
                                    <i class="fa fa-trophy"></i>
                                    <span>{{ __('Consejos para el éxito') }}</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidebar-header" href="{{ route('intro.index') }}">
                                    <i class="fa fa-video-camera"></i>
                                    <span>{{ __('Vídeo de introducción') }}</span>
                                </a>
                            </li>
                            {{-- <li><a class="sidebar-header" href="#"><i data-feather="layers"></i><span>
                                        {{ __('Gestión de cursos') }} </span><i
                                        class="fa fa-angle-right pull-right"></i></a>
                                <ul class="sidebar-submenu">
                                    <li>
                                        <a href="{{ route('category.index') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Categoría') }}</span>
                                        </a>
                                    </li>

                                     <li>

                                        <a href="{{ route('subcategory.index') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Subcategoría') }}</span>
                                        </a>
                                    </li>

                                     <li>

                                        <a href="{{ url('admin\childcategory') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Childcategoría') }}</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('gallery.index') }}">
                                            <i class="fa fa-circle"></i>
                                            <span>{{ __('Galería media') }}</span>
                                        </a>
                                    </li>



                                </ul>
                            </li> --}}

                            {{-- <li><a class="sidebar-header" href="{{ url('admin/transactions_report') }}"><i
                                        data-feather="dollar-sign"></i><span>{{ __('Solicitudes de pedido') }}
                                    </span></a>
                            </li> --}}


                        </ul>
                    @endif
                    @if ($user_session->is_super_admin == 0 and $user_session->account_type == 'shopkeeper')
                        <ul class="sidebar-menu">
                            <li><a class="sidebar-header" href="{{ url('admin/transactions_report') }}"><i
                                        data-feather="dollar-sign"></i><span>{{ __('Solicitudes de pedido') }}
                                    </span></a>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
            <!-- Page Sidebar Ends-->
            <!-- Right sidebar Start-->

            <!-- Right sidebar Ends-->

            @yield('content')

            <!-- footer start-->
            <!-- <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright 2024 © Aasif All rights reserved.</p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
              </div>
            </div>
          </div>
        </footer> -->
        </div>
    </div>
    <!-- latest jquery-->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('admin/js/feather.min.js') }}"></script>
    <script src="{{ asset('admin/js/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('admin/js/sidebar-menu.js') }}"></script>

    <!-- Plugins JS start-->
    <script src="{{ asset('admin/js/raphael.js') }}"></script>

    <script src="{{ asset('admin/js/prettify.min.js') }}"></script>
    <script src="{{ asset('admin/js/chart.min.js') }}"></script>
    <script src="{{ asset('admin/js/knob.min.js') }}"></script>
    <script src="{{ asset('admin/js/knob-chart.js') }}"></script>
    <script src="{{ asset('admin/js/prism.min.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admin/js/counter-custom.js') }}"></script>
    <script src="{{ asset('admin/js/custom-card.js') }}"></script>
    <script src="{{ asset('admin/js/owl.carousel2.js') }}"></script>
    <script src="{{ asset('admin/js/chart.custom.js') }}"></script>
    <script src="{{ asset('admin/js/clipboard.js') }}"></script>
    <script src="{{ asset('admin/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('admin/js/handlebars.js') }}"></script>

    <script src="{{ asset('admin/js/chat-menu.js') }}"></script>
    <script src="{{ asset('admin/js/height-equal.js') }}"></script>

    <script src="{{ asset('admin/js/handlebars.js') }}"></script>




    <script
        src="{{ asset('admin/js/laravel.pixelstrap.com_endless_assets_js_datatable_datatables_datatable.custom.js') }}">
    </script>
    <script src="{{ asset('admin/js/select2-custom.js') }}"></script>

    <script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/select2-custom.js') }}"></script>
    <script src="{{ asset('admin/js/select2.full.min.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('admin/js/script.js') }}"></script>


    <!-- Plugin used-->


    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Toastr JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Include Summernote CSS and JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

    <!-- Script to initialize Summernote -->
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                placeholder: 'Start typing here...',
                tabsize: 2,
                height: 400, // Set editor height
                toolbar: [ // customize toolbar options
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'table', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize Toastr with global options
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
            };
        });
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="{{ asset('admin/js/custom/image-preview.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

</body>

</html>
