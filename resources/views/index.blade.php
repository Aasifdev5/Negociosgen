@extends('master')
@section('title')
    Inicio
@endsection
@section('content')
    <div class="container-fluid custom-bg w-100">
        <div class="container my-5">
            <div class="row">
                <!-- Text Column -->
                <div class="col-lg-6 col-md-12 order-2 order-md-1">
                    <!-- Pill -->
                    <div class="mb-3 d-flex justify-content-md-start justify-content-center order-1 mt-md-0 mt-3">
                        <div class="badge text-dark rounded-pill d-inline-flex align-items-center p-2"
                            style="font-size: 10px; font-family: 'Inter', sans-serif; font-weight: 600;background-color: #0ac7b4;">
                            Próximo lanzamiento
                        </div>
                    </div>



                    <!-- Heading -->
                    <h2 class="text-center text-lg-start">
                        <span
                            style="color: #0090FF; font-size: 33px; letter-spacing: -0.02em; display: inline-block; font-family: 'Space Grotesk', sans-serif; font-weight: 700;">
                            Libertad financiera y <br> crecimiento personal <br>
                        </span>
                        <span
                            style="color: #fff; font-size: 33px; letter-spacing: -0.02em; display: inline-block; font-family: 'Space Grotesk', sans-serif; font-weight: 700;">
                            a solo un clic
                        </span>
                    </h2>



                    <!-- Paragraph -->
                    <p class="text-center text-md-start"
                        style="
                    font-family: 'Space Grotesk', sans-serif;
                    font-weight: 400;
                    line-height: 28px;
                    color: #A1A1A1;">
                        Únete a nuestro equipo de afiliados, toma nuestros cursos de desarrollo personal y genera ingresos
                        promoviendo conocimiento y transformación.
                    </p>

                    <!-- Button -->
                    <div class="text-center text-lg-start mb-3">
                        <a href="{{ url('signup') }}" class="btn btn-sm btn-primary"
                            style="
    padding: 16px 24px;
    border-radius: 6px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    font-size: 22px;
    letter-spacing: -0.02em;
    font-family: 'Space Grotesk', sans-serif;
    font-weight: 700;
    color: white;
    text-transform: uppercase;">
                            ¡Únete ahora!
                        </a>
                    </div>


                </div>

                <!-- Image Column -->
                <div class="col-lg-6 col-md-12 order-1 order-md-2">
                    <div class="video-container">
                        <div class="gradient-overlay"></div>
                        <img src="{{ asset('assets/h.png') }}" class="thumbnail" alt="Video Thumbnail" />
                        <span class="play-button"><img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" /></span>
                        <div class="embed-responsive" style="display: none;">
                            <video class="embed-responsive-item" controls>
                                <source src="{{ asset('assets/VIDEO GEN PÁGINA WEB.MP4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>
    <div class="container-fluid" style="background: #000000; position: relative; padding: 30px 0;margin-top: -10px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-2 text-center mb-4 mb-lg-0">
                    <h1 class="text-light font-weight-bold"
                        style="font-size: 32px; font-family: 'Space Grotesk', sans-serif;">Beneficios</h1>
                    <p class="text-light"
                        style="color: white; font-size: 16px; font-family: 'Space Grotesk', sans-serif; line-height: 24px; max-width: 600px;">
                        Te ofrecemos una oportunidad única de generar ingresos adicionales a través de nuestro sistema de
                        marketing multinivel.
                    </p>
                </div>

                <div class="col-lg-10">
                    <div class="row justify-content-center">
                        <div class="col-6 col-md-3 text-center mb-4">
                            <div class="rounded"
                                style="background: #000000; border: 1px solid #2e2e2e; border-radius: 16px; padding: 20px; position: relative;">
                                <img class="mb-2" style="width: 80px; height: 58px;" src="{{ asset('assets/b1.png') }}"
                                    alt="Libertad Financiera" />
                                <p class="text-light"
                                    style="font-size: 16px; font-family: 'Space Grotesk', sans-serif; line-height: 24px;">
                                    Libertad<br />financiera</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-3 text-center mb-4">
                            <div class="rounded"
                                style="background: #000000; border: 1px solid #2e2e2e; border-radius: 16px; padding: 20px; position: relative;">
                                <img class="mb-2" style="width: 80px; height: 80px;" src="{{ asset('assets/b3.png') }}"
                                    alt="Crecimiento" />
                                <p class="text-light"
                                    style="font-size: 16px; font-family: 'Space Grotesk', sans-serif; line-height: 24px;">
                                    Crecimiento</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-3 text-center mb-4">
                            <div class="rounded"
                                style="background: #000000; border: 1px solid #2e2e2e; border-radius: 16px; padding: 20px; position: relative;">
                                <img class="mb-2" style="width: 80px; height: 80px;" src="{{ asset('assets/b3.png') }}"
                                    alt="Motivación" />
                                <p class="text-light"
                                    style="font-size: 16px; font-family: 'Space Grotesk', sans-serif; line-height: 24px;">
                                    Motivación</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-3 text-center mb-4">
                            <div class="rounded"
                                style="background: #000000; border: 1px solid #2e2e2e; border-radius: 16px; padding: 20px; position: relative;">
                                <img class="mb-2" style="width: 80px; height: 58px;" src="{{ asset('assets/b4.png') }}"
                                    alt="Educación Financiera" />
                                <p class="text-light"
                                    style="font-size: 16px; font-family: 'Space Grotesk', sans-serif; line-height: 24px;">
                                    Educación<br />Financiera</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
    <section style="padding: 20px 0; background-color: #0A0A0A;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 order-2 order-md-1" style="padding-bottom: 10px;">
                    <div class="video-container">
                        <div class="gradient-overlay"></div>
                        <img src="{{ asset('assets/image (6).png') }}" class="thumbnail" alt="Video Thumbnail" />
                        <span class="play-button"><img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" /></span>
                        <div class="embed-responsive" style="display: none;">
                            <video class="embed-responsive-item" controls>
                                <source src="{{ asset('assets/Affiliate Marketing Whiteboard Video.mp4') }}"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <h1
                        style="width: 100%; color: #EDEDED; font-size: 16px; font-family: Space Grotesk; font-weight: 700; word-wrap: break-word;padding-top: 5px;">
                        Transformación Personal para Emprendedores
                    </h1>
                </div>

                <div class="col-lg-6 col-md-12 order-1 order-md-2" style="padding-bottom: 10px;">

                    <h1 class="text-center text-md-start"
                        style="width: 100%; color: #EDEDED; font-size: 32px; font-family: Space Grotesk; font-weight: 700; word-wrap: break-word;">
                        Desarrolla Tus Habilidades: Coaching y Formación para Emprendedores
                    </h1>

                    <p class="text-center text-md-start"
                        style="width: 100%; color: #A1A1A1; font-size: 16px; font-family: 'Space Grotesk', sans-serif; font-weight: 400; line-height: 24px; word-wrap: break-word;">
                        Nuestra sección de Coaching y Cursos está diseñada para empoderar a emprendedores a través de
                        programas prácticos de formación. Aprende de expertos en marketing, desarrollo personal e
                        inteligencia emocional, y transforma tus conocimientos en oportunidades de éxito. Únete a nuestra
                        comunidad y comienza tu viaje hacia el crecimiento hoy mismo.
                    </p>
                </div>



            </div>
        </div>
    </section>


    <section style="padding: 20px 0; background-color: #0A0A0A; position: relative;">
        <div class="container">
            <!-- View All Button -->
            <div class="view-all-btn" style="position: absolute; top: 10px; right: 20px;">
                <a href="{{ url('course') }}" class="btn btn-primary">{{ __('Ver Todos') }}</a>
            </div>

            <div class="row">
                @foreach ($course as $row)
                    <div class="col-lg-3 col-md-6 col-6" style="padding-bottom: 10px;">
                        <div class="video-container">
                            <div class="gradient-overlay"></div>
                            <img src="{{ asset($row->video_thumbnail) }}" class="thumbnail" alt="Video Thumbnail" />
                            @if (!empty($user_session))
                            <span class="play-button"><img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" /></span>
                            @else
                                <a href="{{ url('Userlogin') }}"><span class="play-button"><img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" /></span></a>
                            @endif

                            <div class="embed-responsive" style="display: none;">
                                <iframe class="embed-responsive-item" src="{{ $row->getEmbedUrl($row->video_link) }}"
                                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                        <h4 style="color: #EDEDED;">{{ $row->title }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section style="padding: 20px 0; background: #000000; position: relative;">
        <div class="container">
            <!-- View All Button -->
            <div class="view-all-btn" style="position: absolute; top: 10px; right: 20px;">
                <a href="{{ route('audiobook') }}" class="btn btn-primary">{{ __('Ver Todos') }}</a>
            </div>

            <h1 style="padding-top: 5px; color: white;">Libros Recomendados</h1>

            <div class="row">
                @foreach ($audiobook as $row)
                    <div class="col-lg-2 col-md-3 col-6 mb-4">
                        <a href="{{ route('showAudiobookDetails', $row->id) }}">
                            <img class="img-fluid"
                                style="height: auto; background: #1a1a1a; border: 1px solid #2e2e2e; padding: 10px; border-radius: 12px;"
                                src="{{ asset($row->thumbnail) }}" alt="Audio Thumbnail" />
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>




    <section style="padding: 20px 0; background: #1A1A1A;">
        <div class="container">
            <div class="row">
                <!-- Column 1: Text Content -->
                <div class="col-lg-6 col-md-12 order-2 order-md-1 text-center text-md-start"
                    style="padding-bottom: 10px;">
                    <h2 class="mb-4" style="color: #EDEDED; font-family: Space Grotesk; font-weight: 700;">
                        Aprovecha las Oportunidades de Crecimiento
                    </h2>
                    <p
                        style="color: #A1A1A1; font-size: 16px; font-family: Space Grotesk; font-weight: 400; line-height: 24px;">
                        Como miembro activo, tendrás acceso a cursos y entrenamientos exclusivos, además de la oportunidad
                        de generar ingresos recomendando nuestra plataforma. Participa en eventos con coaches líderes y
                        disfruta de descuentos en empresas afiliadas.
                    </p>

                    <!-- List of Features -->
                    <div class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon"
                            style="width: 24px; height: 24px;">
                        <div class="text-light">Acceso ilimitado a todos los cursos y coaching.</div>
                    </div>

                    <div class="mb-3 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon"
                            style="width: 24px; height: 24px;">
                        <div class="text-light">Descuentos exclusivos en negocios asociados.</div>
                    </div>

                    <div class="mb-4 d-flex align-items-start">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon"
                            style="width: 24px; height: 24px;">
                        <div class="text-light">Genera ingresos compartiendo nuestro sistema con tu red.</div>
                    </div>

                    <!-- Join Button -->
                    <div>
                        <a href="{{ url('signup') }}" class="btn btn-primary btn-lg fw-bold">¡Únete ahora!</a>
                    </div>
                </div>

                <!-- Column 2: Video/Image Content -->
                <div class="col-lg-6 col-md-12 order-1 order-md-2" style="padding-bottom: 10px;">
                    <div class="video-container">
                        <div class="gradient-overlay"></div>
                        <img src="{{ asset('assets/image 49.png') }}" class="thumbnail" alt="Video Thumbnail" />
                    </div>
                </div>
            </div>




        </div>
    </section>
    <section style="padding: 20px 0;background: #1A1A1A;">
        <div class="container">
            <h1 style="padding-top: 5px;color: #ffff;">Nuestros Aliados</h1>
            <p style="color: #A1A1A1;">También disfrutarás de descuentos en una amplia variedad de negocios asociados a
                nivel nacional e internacional.</p>
            <div class="row g-4">
                <!-- UFC Gym Section -->
                <div class="col-lg-4 col-md-4 col-sm-12 text-center p-3">
                    <div style="border: 1px solid #2e2e2e; padding: 10px; border-radius: 12px;">
                        <img class="img-fluid mb-2" src="{{ asset('assets/image 53.png') }}" alt="UFC Gym Image"
                            style="max-width: 100px; height: 100px; object-fit: contain;">
                        <div class="fw-bold text-light">Gimnasio UFC 15%</div>
                        <div class="" style="color: #A1A1A1;">(rua augusta 453, São Paulo, Brasil)</div>
                    </div>
                </div>

                <!-- Cine Center Section -->
                <div class="col-lg-4 col-md-4 col-sm-12 text-center p-3">
                    <div style="border: 1px solid #2e2e2e; padding: 10px; border-radius: 12px;">
                        <img class="img-fluid mb-2" src="{{ asset('assets/image 52.png') }}" alt="Cine Center Image"
                            style="max-width: 100px; height: 100px; object-fit: contain;">
                        <div class="fw-bold text-light">Cine center 5%</div>
                        <div class="" style="color: #A1A1A1;">(Calle warnes 34, Santa Cruz, Bolivia)</div>
                    </div>
                </div>
            </div>





        </div>
    </section>
    <section style="padding: 20px 0;background-color: #000000;">
        <div class="container my-5">
            <h1 class="text-center text-light mb-4">Preguntas Frecuentes (FAQ)</h1>

            <!-- FAQ Item 1 -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#faq1"
                        aria-expanded="false" aria-controls="faq1">
                        <div class="flex-grow-1">
                            <b class="fw-bold faq-title">¿Cómo me registro en la plataforma?</b>
                        </div>
                        <img class="faq-icon ms-auto" src="{{ asset('assets/PlusOutline.svg') }}" alt="Plus Icon"
                            style="filter: brightness(0) invert(1);">
                    </div>
                    <div class="collapse" id="faq1">
                        <p class="mt-2 faq-content">Para registrarte, simplemente haz clic en el botón "Registrarse" en la
                            parte superior de la página. Completa los campos con tu información personal y sigue los pasos
                            para activar tu cuenta.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#faq2"
                        aria-expanded="false" aria-controls="faq2">
                        <div class="flex-grow-1">
                            <b class="fw-bold faq-title">¿Qué beneficios obtengo al ser miembro?</b>
                        </div>
                        <img class="faq-icon ms-auto" src="{{ asset('assets/PlusOutline.svg') }}" alt="Plus Icon"
                            style="filter: brightness(0) invert(1);">
                    </div>
                    <div class="collapse" id="faq2">
                        <p class="mt-2 faq-content">Como miembro, tendrás acceso ilimitado a todos nuestros cursos de
                            desarrollo personal, coaching, entrenamientos y seminarios. Además, podrás generar ingresos
                            extra a través de nuestro sistema de afiliados multinivel y disfrutar de descuentos en diversas
                            empresas asociadas.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#faq3"
                        aria-expanded="false" aria-controls="faq3">
                        <div class="flex-grow-1">
                            <b class="fw-bold faq-title">¿Cómo puedo acceder a los cursos y coaching?</b>
                        </div>
                        <img class="faq-icon ms-auto" src="{{ asset('assets/PlusOutline.svg') }}" alt="Plus Icon"
                            style="filter: brightness(0) invert(1);">
                    </div>
                    <div class="collapse" id="faq3">
                        <p class="mt-2 faq-content">Una vez que te hayas registrado y activado tu membresía, podrás acceder
                            a todos los cursos y sesiones de coaching directamente desde tu panel de usuario. Los videos
                            estarán disponibles para ver en cualquier momento.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#faq4"
                        aria-expanded="false" aria-controls="faq4">
                        <div class="flex-grow-1">
                            <b class="fw-bold faq-title">¿Qué es el sistema de afiliados multinivel?</b>
                        </div>
                        <img class="faq-icon ms-auto" src="{{ asset('assets/PlusOutline.svg') }}" alt="Plus Icon"
                            style="filter: brightness(0) invert(1);">
                    </div>
                    <div class="collapse" id="faq4">
                        <p class="mt-2 faq-content">Nuestro sistema de afiliados multinivel te permite ganar comisiones
                            recomendando nuestra plataforma a otras personas. A medida que tus referidos se registran y
                            compran membresías, podrás recibir ganancias en varios niveles de profundidad.</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="d-flex align-items-center" data-bs-toggle="collapse" data-bs-target="#faq5"
                        aria-expanded="false" aria-controls="faq5">
                        <div class="flex-grow-1">
                            <b class="fw-bold faq-title">¿Cómo puedo generar ingresos extra?</b>
                        </div>
                        <img class="faq-icon ms-auto" src="{{ asset('assets/PlusOutline.svg') }}" alt="Plus Icon"
                            style="filter: brightness(0) invert(1);">
                    </div>
                    <div class="collapse" id="faq5">
                        <p class="mt-2 faq-content">Puedes generar ingresos extra recomendando la plataforma a otros a
                            través del sistema de marketing multinivel. Además, tendrás acceso a herramientas exclusivas que
                            te ayudarán a promover nuestro contenido y crecer tu red de contactos.</p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section style="padding: 20px 0;background: #212020;">
        <div class="container">
            <div class="container my-5 p-4"
                style="background-color: #0f1c2e; border: 1px solid #2E2E2E; border-radius: 16px;">
                <div class="row">
                    <div class="col-12 col-md-8 text-start mb-3 mb-md-0">
                        <h2 class="deseas-obtener-un text-light mb-3">¡Deseas obtener un ingreso adicional?</h2>
                        <p class="no-esperes-ms text-light" style="max-width: 600px; color: #A1A1A1;">
                            No esperes más para ser parte de este increíble proyecto. Empieza hoy mismo a transformar tu
                            vida y la de quienes te rodean.
                        </p>
                    </div>
                    <div class="col-12 col-md-4 text-end d-flex align-items-center justify-content-end">
                        <a href="{{ url('signup') }}" class="btn btn-primary btn-lg">Regístrate Aquí</a>
                    </div>
                </div>
            </div>
        </div>




    </section>
    <section style="padding: 20px 0;background: #1A1A1A;">
        <div class="container my-5">
            <div class="row">
                <!-- Left Column: Contact Information -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <h2 class="text-light mb-4">¡Ponte en Contacto!</h2>
                    <p class="" style="color: #a1a1a1;">
                        Si tienes dudas o simplemente quieres saludarnos, la mejor forma de contactarnos es a través de
                        nuestro formulario.
                        Nos esforzamos en responder en menos de 48 horas, aunque a veces tardamos un poco más. ¡Gracias por
                        tu paciencia! Leemos cada mensaje y lo dirigimos al equipo adecuado.
                        También puedes visitar nuestra página de Ayuda para respuestas a las preguntas más comunes sobre
                        GEN.
                    </p>
                    <p class="" style="color: #a1a1a1;">
                        Conéctate con nosotros a través de nuestras redes sociales:
                    </p>

                    <!-- Social Media Icons -->
                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <div class="list-item d-flex align-items-center"
                                style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                                <img class="envelopesimple-icon" alt="Email Icon"
                                    src="{{ asset('assets/EnvelopeSimple.svg') }}" style="width: 24px; height: 24px;">
                                <div class="correogmailcom ms-2">Correo@gmail.com</div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="list-item d-flex align-items-center"
                                style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                                <img class="envelopesimple-icon" alt="WhatsApp Icon"
                                    src="{{ asset('assets/WhatsappLogo.svg') }}" style="width: 24px; height: 24px;">
                                <div class="correogmailcom ms-2">+591 986 874 365</div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <div class="list-item d-flex align-items-center"
                                style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                                <img class="envelopesimple-icon" alt="Facebook Icon"
                                    src="{{ asset('assets/FacebookLogo.svg') }}" style="width: 24px; height: 24px;">
                                <div class="correogmailcom ms-2">Facebook</div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="list-item d-flex align-items-center"
                                style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                                <img class="atomiconredes" alt="Instagram Icon"
                                    src="{{ asset('assets/Instagram.svg') }}" style="width: 24px; height: 24px;">
                                <div class="correogmailcom ms-2">Instagram</div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6 mb-3">
                            <div class="list-item d-flex align-items-center"
                                style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                                <img class="xlogo-icon" alt="LinkedIn Icon" src="{{ asset('assets/Redes.svg') }}"
                                    style="width: 24px; height: 24px;">
                                <div class="correogmailcom ms-2">LinkedIn</div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="list-item d-flex align-items-center"
                                style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                                <img class="envelopesimple-icon" alt="Twitter Icon"
                                    src="{{ asset('assets/XLogo.svg') }}" style="width: 24px; height: 24px;">
                                <div class="correogmailcom ms-2">Twitter</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Contact Form -->
                <div class="col-lg-6 col-md-12">
                    <div class="p-4"
                        style="background-color: #000000; border: 1px solid #2E2E2E; border-radius: 10px;">
                        <h4 class="text-light mb-3">Contacta con nosotros</h4>
                        @if (Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
                        @if (Session::has('error_flash_message'))
                            <div class="alert alert-danger">
                                {{ Session::get('error_flash_message') }}
                            </div>
                        @endif
                        {!! Form::open(['url' => 'contact_send', 'class' => 'row', 'id' => 'contact_form', 'role' => 'form']) !!}
                        <div class="mb-3">
                            <label for="nombre" class="form-label text-light">Nombre</label>
                            <input type="text" name="name" class="form-control" id="nombre"
                                placeholder="Título">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-light">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="ejemplo@gmail.com">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label text-light">Número de celular</label>
                            <input type="tel" class="form-control" name="phone" id="telefono"
                                placeholder="+591">
                        </div>

                        <div class=" mb-3">
                            <label class="text-light">Asunto</label>
                            <input type="text" name="subject" id="subject" class="form-control"
                                placeholder="Asunto">
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label text-light">Descripción</label>
                            <textarea class="form-control" name="message" id="descripcion" rows="3"
                                placeholder="Escribe la descripción opcional"></textarea>
                        </div>
                        <button type="submit" class="btn btn-sm"
                            style="width: 100%;
                            position: relative;
                            border-radius: 6px;
                            background-color: #0090ff;
                            padding: 16px 24px;
                            box-sizing: border-box;
                            text-align: center;
                            font-size: 16px;
                            color: #ededed;
                            font-family: 'Space Grotesk';
                            border: none;
                            transition: background-color 0.3s;">
                            Enviar
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
