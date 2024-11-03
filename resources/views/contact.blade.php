@extends('master')
@section('title')
Contáctanos
@endsection
@section('content')
<section style="padding: 90px 0;background: #1A1A1A;">
    <div class="container my-5">
        <div class="row">
            <!-- Left Column: Contact Information -->
            <div class="col-lg-6 col-md-12 mb-4">
                <h2 class="text-light mb-4">¡Ponte en Contacto!</h2>
                <p class="" style="color: #a1a1a1;">
                    Si tienes dudas o simplemente quieres saludarnos, la mejor forma de contactarnos es a través de nuestro formulario.
                    Nos esforzamos en responder en menos de 48 horas, aunque a veces tardamos un poco más. ¡Gracias por tu paciencia! Leemos cada mensaje y lo dirigimos al equipo adecuado.
                    También puedes visitar nuestra página de Ayuda para respuestas a las preguntas más comunes sobre GEN.
                </p>
                <p class="" style="color: #a1a1a1;">
                    Conéctate con nosotros a través de nuestras redes sociales:
                </p>

                <!-- Social Media Icons -->
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="list-item d-flex align-items-center" style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                            <img class="envelopesimple-icon" alt="Email Icon" src="{{asset('assets/EnvelopeSimple.svg')}}" style="width: 24px; height: 24px;">
                            <div class="correogmailcom ms-2">Correo@gmail.com</div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="list-item d-flex align-items-center" style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                            <img class="envelopesimple-icon" alt="WhatsApp Icon" src="{{asset('assets/WhatsappLogo.svg')}}" style="width: 24px; height: 24px;">
                            <div class="correogmailcom ms-2">+591 986 874 365</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="list-item d-flex align-items-center" style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                            <img class="envelopesimple-icon" alt="Facebook Icon" src="{{asset('assets/FacebookLogo.svg')}}" style="width: 24px; height: 24px;">
                            <div class="correogmailcom ms-2">Facebook</div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="list-item d-flex align-items-center" style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                            <img class="atomiconredes" alt="Instagram Icon" src="{{asset('assets/Instagram.svg')}}" style="width: 24px; height: 24px;">
                            <div class="correogmailcom ms-2">Instagram</div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="list-item d-flex align-items-center" style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                            <img class="xlogo-icon" alt="LinkedIn Icon" src="{{asset('assets/Redes.svg')}}" style="width: 24px; height: 24px;">
                            <div class="correogmailcom ms-2">LinkedIn</div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="list-item d-flex align-items-center" style="border: 1px solid #2e2e2e; border-radius: 8px; padding: 16px; color: #ededed; font-family: 'Space Grotesk';">
                            <img class="envelopesimple-icon" alt="Twitter Icon" src="{{asset('assets/XLogo.svg')}}" style="width: 24px; height: 24px;">
                            <div class="correogmailcom ms-2">Twitter</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Contact Form -->
            <div class="col-lg-6 col-md-12">
                <div class="p-4" style="background-color: #000000; border: 1px solid #2E2E2E; border-radius: 10px;">
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
    <section style="padding: 20px 0;background: #1A1A1A;">
        <div class="container">
            <div class="container my-5 p-4" style="background-color: #0f1c2e; border: 1px solid #2E2E2E; border-radius: 16px;">
                <div class="row">
                    <div class="col-12 col-md-8 text-start mb-3 mb-md-0">
                        <h2 class="deseas-obtener-un text-light mb-3">¡Deseas obtener un ingreso adicional?</h2>
                        <p class="no-esperes-ms text-light" style="max-width: 600px; color: #A1A1A1;">
                            No esperes más para ser parte de este increíble proyecto. Empieza hoy mismo a transformar tu vida y la de quienes te rodean.
                        </p>
                    </div>
                    <div class="col-12 col-md-4 text-end d-flex align-items-center justify-content-end">
                        <a href="#" class="btn btn-primary btn-lg">Regístrate Aquí</a>
                    </div>
                </div>
            </div>
        </div>




    </section>
@endsection
