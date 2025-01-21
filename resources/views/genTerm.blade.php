@extends('master')
@section('title')
    {{ __('Condiciones de Uso del Sitio Web de GEN') }}
@endsection
@section('content')

<section class="py-5" style="background: #000;">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="fw-bold text-primary" style="margin-top: 50px">{{ __('Condiciones de Uso del Sitio Web de GEN') }}</h1>
            <p class="text-light">{{ __('Explora las condiciones que rigen el uso de nuestro sitio web para garantizar una experiencia transparente y segura.') }}</p>
        </div>
        <div class="card shadow-lg border-0 rounded-4" style="background: #000;">
            <div class="card-body p-4">
                <!-- Introduction -->
                <h4 class="fw-bold text-light mb-3">
                    <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                    {{ __('Acceso y Uso del Sitio Web') }}
                </h4>
                <p class="text-light">{{ __('El acceso y uso del sitio web www.negociosgen.com y los servicios ofrecidos están sujetos a estas condiciones de uso. Estas condiciones pueden ser actualizadas periódicamente.') }}</p>
                <p class="text-light">{{ __('Recomendamos revisar regularmente estas condiciones para estar al tanto de los cambios.') }}</p>

                <!-- Key Sections -->
                <h4 class="fw-bold text-light mt-4 mb-3">
                    <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                    {{ __('Uso Exclusivo en Bolivia') }}
                </h4>
                <p class="text-light">{{ __('La página web de GEN está destinada exclusivamente para su uso desde Bolivia y está sujeta a la legislación boliviana.') }}</p>

                <!-- Clickable Sections -->
                <h4 class="fw-bold text-light mt-4 mb-3">
                    <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                    {{ __('Secciones Principales') }}
                </h4>
                <ul class="list-unstyled ps-3">
                    <li><a href="#passwordProtected" class="text-decoration-none text-light">{{ __('1. Partes de la página web protegidas por contraseña') }}</a></li>
                    <li><a href="#privacyPolicy" class="text-decoration-none text-light">{{ __('2. Declaración y Políticas de Privacidad de GEN') }}</a></li>
                    <li><a href="#copyright" class="text-decoration-none text-light">{{ __('3. Copyright y uso de materiales en la página web') }}</a></li>
                    <li><a href="#externalLinks" class="text-decoration-none text-light">{{ __('4. Enlaces a otras páginas web') }}</a></li>
                    <li><a href="#linksToGen" class="text-decoration-none text-light">{{ __('5. Enlaces desde otras páginas web a GEN') }}</a></li>
                    <li><a href="#limitations" class="text-decoration-none text-light">{{ __('6. Limitación de responsabilidad y exclusión de garantías') }}</a></li>
                    <li><a href="#termination" class="text-decoration-none text-light">{{ __('7. Restricción o bloqueo del acceso') }}</a></li>
                    <li><a href="#clauseInvalidation" class="text-decoration-none text-light">{{ __('8. Anulación de cláusulas') }}</a></li>
                    <li><a href="#jurisdiction" class="text-decoration-none text-light">{{ __('9. Elección de ley, jurisdicción y foro') }}</a></li>
                </ul>

                <!-- Detailed Sections -->
                <div id="passwordProtected" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('1. Partes de la página web protegidas por contraseña') }}
                    </h4>
                    <p class="text-light">{{ __('Estas secciones están destinadas exclusivamente a los miembros de GEN en Bolivia. Las contraseñas deben mantenerse confidenciales.') }}</p>
                </div>

                <div id="privacyPolicy" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('2. Declaración y Políticas de Privacidad de GEN') }}
                    </h4>
                    <p class="text-light">{{ __('Consulte nuestras políticas para comprender cómo manejamos su información personal.') }}</p>
                </div>

                <div id="copyright" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('3. Copyright y uso de materiales en la página web') }}
                    </h4>
                    <p class="text-light">{{ __('El contenido del sitio está protegido por derechos de autor. Para usos autorizados, contacte a GEN.') }}</p>
                </div>

                <div id="externalLinks" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('4. Enlaces a otras páginas web') }}
                    </h4>
                    <p class="text-light">{{ __('No somos responsables del contenido ni de las prácticas de privacidad de sitios web externos enlazados.') }}</p>
                </div>

                <div id="linksToGen" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('5. Enlaces desde otras páginas web a GEN') }}
                    </h4>
                    <p class="text-light">{{ __('Se requiere autorización previa para establecer enlaces a nuestro sitio web.') }}</p>
                </div>

                <div id="limitations" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('6. Limitación de responsabilidad y exclusión de garantías') }}
                    </h4>
                    <p class="text-light">{{ __('No garantizamos el funcionamiento ininterrumpido del sitio y no somos responsables de daños derivados de su uso.') }}</p>
                </div>

                <div id="termination" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('7. Restricción o bloqueo del acceso') }}
                    </h4>
                    <p class="text-light">{{ __('GEN puede restringir o suspender el acceso al sitio sin previo aviso.') }}</p>
                </div>

                <div id="clauseInvalidation" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('8. Anulación de cláusulas') }}
                    </h4>
                    <p class="text-light">{{ __('Si alguna cláusula resulta inválida, las restantes continuarán en pleno efecto.') }}</p>
                </div>

                <div id="jurisdiction" class="mt-5">
                    <h4 class="fw-bold text-light mb-3">
                        <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                        {{ __('9. Elección de ley, jurisdicción y foro') }}
                    </h4>
                    <p class="text-light">{{ __('Estas condiciones se rigen por la legislación de Bolivia.') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
