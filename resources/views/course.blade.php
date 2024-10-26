@extends('master')
@section('title')
    Cursos
@endsection
@section('content')
    <div class="container-fluid custom-bg w-100">
        <div class="container my-5">
            <div class="row">
                <!-- Text Column -->
                <div class="col-lg-6 col-md-12 order-2 order-md-1">
                    <h2 class="text-center text-md-start"
                        style="
                position: relative;
                font-size: 33px;
                letter-spacing: -0.02em;
                display: inline-block;
                font-family: 'Space Grotesk', sans-serif;
                font-weight: 700;
                color: #fff;">
                        Curso nuevo para <br>habilidades de la mente
                    </h2>


                    <p class="text-center text-md-start"
                        style="
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 400;
            line-height: 28px;
            color: #A1A1A1;">
                        Descubre nuestro nuevo curso diseñado para potenciar tus habilidades mentales. Aprende técnicas
                        innovadoras para mejorar tu concentración, memoria y creatividad. ¡Inscríbete ahora y comienza a
                        entrenar tu mente!
                    </p>

                    <button class="btn btn-sm btn-primary"
                        style="
        padding: 16px 24px;
        border-radius: 6px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        font-size: 22px;
        letter-spacing: -0.02em;
        font-family: 'Space Grotesk', sans-serif;
        color: white;
        text-transform: uppercase; /* Optional: To make the text uppercase */
    ">
                        <span style="font-weight: 700;">
                            ¡Únete a GEN y comienza hoy!
                        </span>
                    </button>

                </div>

                <!-- Image Column -->
                <div class="col-lg-6 col-md-12 order-1 order-md-2">
                    <img class="img-fluid rounded-3" src="{{asset('assets/image (3).png')}}" alt="Placeholder Image"
                        style="padding-top: 20px;" />
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
                        <img src="{{asset('assets/image (6).png')}}" class="thumbnail" alt="Video Thumbnail" />
                        <span class="play-button"><img src="{{asset('assets/Play (1).svg')}}" alt="Play Button" /></span>
                        <div class="embed-responsive" style="display: none;">
                            <video class="embed-responsive-item" controls>
                                <source src="{{ asset('assets/Affiliate Marketing Whiteboard Video.mp4') }}" type="video/mp4">
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


    <section style="padding: 20px 0; background-color: #0A0A0A;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-6" style="padding-bottom: 10px;">
                    <div class="video-container">
                        <div class="gradient-overlay"></div>
                        <img src="{{asset('assets/v1.png')}}" class="thumbnail" alt="Video Thumbnail" />
                        <span class="play-button"><img src="{{asset('assets/Play (1).svg')}}" alt="Play Button" /></span>
                        <div class="embed-responsive" style="display: none;">
                            <video class="embed-responsive-item" controls>
                                <source src="{{ asset('assets/Affiliate Marketing Whiteboard Video.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <h4 style="color: #EDEDED;">Inteligencia Emocional en el Liderazgo</h4>
                </div>

                <div class="col-lg-3 col-md-6 col-6" style="padding-bottom: 10px;">
                    <div class="video-container">
                        <div class="gradient-overlay"></div>
                        <img src="{{asset('assets/v2.png')}}" class="thumbnail" alt="Video Thumbnail" />
                        <span class="play-button"><img src="{{asset('assets/Play (1).svg')}}" alt="Play Button" /></span>
                        <div class="embed-responsive" style="display: none;">
                            <video class="embed-responsive-item" controls>
                                <source src="{{ asset('assets/Affiliate Marketing Whiteboard Video.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <h4 style="color: #EDEDED;">Inteligencia Emocional en el Liderazgo</h4>
                </div>

                <div class="col-lg-3 col-md-6 col-6" style="padding-bottom: 10px;">
                    <div class="video-container">
                        <div class="gradient-overlay"></div>
                        <img src="{{asset('assets/v3.png')}}" class="thumbnail" alt="Video Thumbnail" />
                        <span class="play-button"><img src="{{asset('assets/Play (1).svg')}}" alt="Play Button" /></span>
                        <div class="embed-responsive" style="display: none;">
                            <video class="embed-responsive-item" controls>
                                <source src="{{ asset('assets/Affiliate Marketing Whiteboard Video.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <h4 style="color: #EDEDED;">Negocios Multinivel: Claves para el Éxito</h4>
                </div>

                <div class="col-lg-3 col-md-6 col-6" style="padding-bottom: 10px;">
                    <div class="video-container">
                        <div class="gradient-overlay"></div>
                        <img src="{{asset('assets/v4.png')}}" class="thumbnail" alt="Video Thumbnail" />
                        <span class="play-button"><img src="{{asset('assets/Play (1).svg')}}" alt="Play Button" /></span>
                        <div class="embed-responsive" style="display: none;">
                            <video class="embed-responsive-item" controls>
                                <source src="{{ asset('assets/Affiliate Marketing Whiteboard Video.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <h4 style="color: #EDEDED;">Finanzas para Emprendedores</h4>
                </div>
            </div>
        </div>
    </section>

    <section style="padding: 20px 0; background: #1A1A1A;">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-12 text-center text-md-start" style="padding-bottom: 10px;">
                    <h2 class="mb-4" style="color: #EDEDED; font-family: Space Grotesk; font-weight: 700;">
                        Consejos de Éxito: Sabiduría de Empresarios y Emprendedores
                    </h2>
                    <p
                        style="color: #A1A1A1; font-size: 16px; font-family: Space Grotesk; font-weight: 400; line-height: 24px;">
                        En esta sección, recopilamos valiosos consejos y experiencias de empresarios y emprendedores
                        exitosos que han recorrido el camino del emprendimiento. Aprende de sus triunfos y fracasos para
                        aplicarlos en tu propio viaje, y descubre las claves para superar desafíos, fomentar la innovación y
                        alcanzar el éxito en tu negocio.
                    </p>
                </div>




                <!-- Repeat for other columns -->
                <div class="col-lg-6 col-md-12" style="padding-bottom: 10px;">
                    <div class="video-container">
                        <div class="gradient-overlay"></div>
                        <img src="{{asset('assets/ap.png')}}" class="thumbnail" alt="Video Thumbnail" />
                        <span class="play-button"><img src="{{asset('assets/Play (1).svg')}}" alt="Play Button" /></span>
                        <div class="embed-responsive" style="display: none;">
                            <video class="embed-responsive-item" controls>
                                <source src="{{ asset('assets/Affiliate Marketing Whiteboard Video.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <h1
                        style="width: 100%; color: #EDEDED; font-size: 20px; font-family: Space Grotesk; font-weight: 700; word-wrap: break-word;">
                        Aprende a Gestionar tu Tiempo
                    </h1>
                </div>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="video-container">
                        <div class="gradient-overlay"></div>
                        <img src="{{asset('assets/ap1.png')}}" class="thumbnail" alt="Video Thumbnail" />
                        <span class="play-button"><img src="{{asset('assets/Play (1).svg')}}" alt="Play Button" /></span>
                        <div class="embed-responsive">
                            <video class="embed-responsive-item" controls>
                                <source src="{{ asset('assets/Affiliate Marketing Whiteboard Video.mp4') }}" type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                            </video>
                        </div>
                    </div>
                    <h4 style="color: #EDEDED; font-family: Space Grotesk; font-weight: 700;">La Importancia de Definir tu
                        Propósito</h4>
                </div>

                <div class="col-lg-3 col-md-6 col-6">
                    <div class="video-container">
                        <div class="gradient-overlay"></div>
                        <img src="{{asset('assets/ap2.png')}}" class="thumbnail" alt="Video Thumbnail" />
                        <span class="play-button"><img src="{{asset('assets/Play (1).svg')}}" alt="Play Button" /></span>
                        <div class="embed-responsive">
                            <video class="embed-responsive-item" controls>
                                <source src="{{ asset('assets/Affiliate Marketing Whiteboard Video.mp4') }}" type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                            </video>
                        </div>
                    </div>
                    <h4 style="color: #EDEDED; font-family: Space Grotesk; font-weight: 700;">Adaptabilidad: Clave para el
                        Éxito</h4>
                </div>

                <div class="col-lg-3 col-md-6 col-6">
                    <div class="video-container">
                        <div class="gradient-overlay"></div>
                        <img src="{{asset('assets/ap3.png')}}" class="thumbnail" alt="Video Thumbnail" />
                        <span class="play-button"><img src="{{asset('assets/Play (1).svg')}}" alt="Play Button" /></span>
                        <div class="embed-responsive">
                            <video class="embed-responsive-item" controls>
                                <source src="{{ asset('assets/Affiliate Marketing Whiteboard Video.mp4') }}" type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                            </video>
                        </div>
                    </div>
                    <h4 style="color: #EDEDED; font-family: Space Grotesk; font-weight: 700;">Construye una Red de
                        Contactos Sólida</h4>
                </div>

                <div class="col-lg-3 col-md-6 col-6">
                    <div class="video-container">
                        <div class="gradient-overlay"></div>
                        <img src="{{asset('assets/ap4.png')}}" class="thumbnail" alt="Video Thumbnail" />
                        <span class="play-button"><img src="{{asset('assets/Play (1).svg')}}" alt="Play Button" /></span>
                        <div class="embed-responsive">
                            <video class="embed-responsive-item" controls>
                                <source src="{{ asset('assets/Affiliate Marketing Whiteboard Video.mp4') }}" type="video/mp4">
                                Tu navegador no soporta el elemento de video.
                            </video>
                        </div>
                    </div>
                    <h4 style="color: #EDEDED; font-family: Space Grotesk; font-weight: 700;">La Perseverancia es
                        Fundamental</h4>
                </div>
            </div>

        </div>
    </section>
@endsection
