@extends('master')
@section('title')
    {{ __('Términos y Condiciones') }}
@endsection
@section('content')

<section class="py-5" style="background: #000;">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="fw-bold text-primary" style="margin-top: 50px">{{ __('Términos y Condiciones de Uso del Sitio Web de GEN') }}</h1>
            <p class="text-light">{{ __('Lea cuidadosamente los términos que rigen el uso de nuestra plataforma y servicios.') }}</p>
        </div>
        <div class="card shadow-lg border-0 rounded-4" style="background: #000;">
            <div class="card-body p-4">
                <!-- Introduction -->
                <h4 class="fw-bold text-light mb-3">
                    <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                    {{ __('1. Aceptación de los Términos') }}
                </h4>
                <p class="text-light">{{ __('Al acceder y utilizar el sitio web de GEN, usted acepta cumplir con los presentes Términos y Condiciones. Si no está de acuerdo, le solicitamos que no utilice nuestra plataforma.') }}</p>

                <!-- Key Sections -->
                <h4 class="fw-bold text-light mt-4 mb-3">
                    <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                    {{ __('2. Descripción del Servicio') }}
                </h4>
                <p class="text-light">{{ __('GEN ofrece servicios educativos en áreas como educación financiera, desarrollo personal y motivación. Nuestros usuarios tienen acceso a cursos, charlas, coaching y eventos exclusivos.') }}</p>

                <!-- Section List -->
                <h4 class="fw-bold text-light mt-4 mb-3">
                    <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                    {{ __('Secciones Destacadas') }}
                </h4>
                <ul class="list-unstyled ps-3">
                    <li><a href="#userAccount" class="text-decoration-none text-light">{{ __('3. Registro y Cuenta de Usuario') }}</a></li>
                    <li><a href="#acceptableUse" class="text-decoration-none text-light">{{ __('4. Uso Aceptable') }}</a></li>
                    <li><a href="#intellectualProperty" class="text-decoration-none text-light">{{ __('5. Propiedad Intelectual') }}</a></li>
                    <li><a href="#mlmParticipation" class="text-decoration-none text-light">{{ __('6. Participación en el Programa de Marketing Multinivel') }}</a></li>
                    <li><a href="#liability" class="text-decoration-none text-light">{{ __('7. Exención de Responsabilidad') }}</a></li>
                    <li><a href="#thirdPartyLinks" class="text-decoration-none text-light">{{ __('8. Enlaces a Terceros') }}</a></li>
                    <li><a href="#termsChanges" class="text-decoration-none text-light">{{ __('9. Modificaciones de los Términos') }}</a></li>
                    <li><a href="#legalJurisdiction" class="text-decoration-none text-light">{{ __('10. Ley Aplicable y Jurisdicción') }}</a></li>
                    <li><a href="#contact" class="text-decoration-none text-light">{{ __('11. Contacto') }}</a></li>
                </ul>

                <!-- Detailed Sections -->
                <div id="userAccount" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('3. Registro y Cuenta de Usuario') }}
                    </h4>
                    <p class="text-light">{{ __('Para utilizar ciertos servicios, debe registrarse y crear una cuenta, siendo responsable de proporcionar datos actualizados, mantener sus credenciales seguras y reportar accesos no autorizados.') }}</p>
                </div>

                <div id="acceptableUse" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('4. Uso Aceptable') }}
                    </h4>
                    <p class="text-light">{{ __('El uso de nuestro sitio debe ser legal, ético y autorizado, sin distribuir contenido malicioso o infringir derechos de terceros.') }}</p>
                </div>

                <div id="intellectualProperty" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('5. Propiedad Intelectual') }}
                    </h4>
                    <p class="text-light">{{ __('Todo contenido en este sitio es propiedad de GEN o sus licenciantes. No está permitido reproducir, modificar o explotar el contenido sin autorización previa.') }}</p>
                </div>

                <div id="mlmParticipation" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('6. Participación en el Programa de Marketing Multinivel') }}
                    </h4>
                    <p class="text-light">{{ __('Los miembros activos tienen acceso a materiales exclusivos y comisiones por referidos. La participación está sujeta a nuestras políticas, que pueden ser actualizadas.') }}</p>
                </div>

                <div id="liability" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('7. Exención de Responsabilidad') }}
                    </h4>
                    <p class="text-light">{{ __('GEN no garantiza resultados específicos, ya que el éxito depende del esfuerzo individual de cada usuario.') }}</p>
                </div>

                <div id="thirdPartyLinks" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('8. Enlaces a Terceros') }}
                    </h4>
                    <p class="text-light">{{ __('GEN no se hace responsable por el contenido ni prácticas de sitios externos enlazados. Recomendamos revisar sus términos antes de interactuar con ellos.') }}</p>
                </div>

                <div id="termsChanges" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('9. Modificaciones de los Términos') }}
                    </h4>
                    <p class="text-light">{{ __('GEN puede actualizar estos términos en cualquier momento. Los cambios se publicarán en esta página y el uso continuado implica su aceptación.') }}</p>
                </div>

                <div id="legalJurisdiction" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('10. Ley Aplicable y Jurisdicción') }}
                    </h4>
                    <p class="text-light">{{ __('Estos términos están regidos por las leyes aplicables en el país de operación de GEN.') }}</p>
                </div>

                <div id="contact" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('11. Contacto') }}
                    </h4>
                    <p class="text-light">{{ __('Si tiene preguntas, contáctenos a través de nuestro correo o formulario en el sitio web.') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
