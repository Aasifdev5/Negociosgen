@extends('master')
@section('title')
    {{ __('Política de Privacidad de GEN, Grupo Especializado en Negocios') }}
@endsection
@section('content')

<section class="py-5" style="padding: 80px 0;background: #000;">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="fw-bold text-primary" style="margin-top: 50px">{{ __('Política de Privacidad de GEN') }}</h1>
            <p class="text-light">{{ __('Valoramos y respetamos su privacidad. Aquí explicamos cómo protegemos su información personal.') }}</p>
        </div>
        <div class="card text-light shadow-lg border-0 rounded-4" style="background: #000;">
            <div class="card-body p-4">
                <!-- Section 1 -->
                <h4 class="fw-bold text-light mb-3">
                    <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                    {{ __('1. Información que Recopilamos') }}
                </h4>
                <p>{{ __('Recopilamos diferentes tipos de información para ofrecer y mejorar nuestros servicios, incluyendo:') }}</p>
                <ul class="list-unstyled ps-3">
                    <li class="mb-2">
                        <strong>{{ __('Información personal:') }}</strong> {{ __('Nombre, dirección, correo electrónico, número de teléfono, entre otros.') }}
                    </li>
                    <li class="mb-2">
                        <strong>{{ __('Información financiera:') }}</strong> {{ __('Datos necesarios para procesar pagos o inscripciones.') }}
                    </li>
                    <li>
                        <strong>{{ __('Datos de navegación y uso:') }}</strong> {{ __('Direcciones IP, tipo de dispositivo, ubicación geográfica aproximada, entre otros.') }}
                    </li>
                </ul>

                <!-- Section 2 -->
                <h4 class="fw-bold text-light mt-4 mb-3">
                    <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                    {{ __('2. Cómo Usamos Su Información') }}
                </h4>
                <p>{{ __('Utilizamos su información para:') }}</p>
                <ul class="list-unstyled ps-3">
                    <li class="mb-2">{{ __('Brindar servicios de educación financiera, desarrollo personal y motivación.') }}</li>
                    <li class="mb-2">{{ __('Procesar inscripciones, pagos y transacciones financieras.') }}</li>
                    <li class="mb-2">{{ __('Comunicarnos sobre actualizaciones, eventos y promociones.') }}</li>
                    <li>{{ __('Analizar y mejorar nuestros servicios para una mejor experiencia del usuario.') }}</li>
                </ul>

                <!-- Section 3 -->
                <h4 class="fw-bold text-light mt-4 mb-3">
                    <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                    {{ __('3. Compartir Su Información') }}
                </h4>
                <p>{{ __('No vendemos, alquilamos ni compartimos su información personal, excepto en los siguientes casos:') }}</p>
                <ul class="list-unstyled ps-3">
                    <li class="mb-2">
                        <strong>{{ __('Proveedores de servicios:') }}</strong> {{ __('Para ayudarnos a operar nuestro negocio (procesadores de pagos, marketing, tecnología).') }}
                    </li>
                    <li class="mb-2">
                        <strong>{{ __('Cumplimiento legal:') }}</strong> {{ __('Cuando sea necesario para cumplir con leyes o procesos legales.') }}
                    </li>
                    <li>
                        <strong>{{ __('Con su consentimiento:') }}</strong> {{ __('Si usted lo autoriza expresamente.') }}
                    </li>
                </ul>

                <!-- Additional Sections -->
                @foreach([
                    ['title' => '4. Seguridad de Su Información', 'content' => 'Tomamos medidas de seguridad técnicas, administrativas y físicas para proteger su información contra accesos no autorizados.'],
                    ['title' => '5. Sus Derechos', 'content' => 'Usted puede acceder, rectificar, eliminar su información personal y retirar su consentimiento en cualquier momento.'],
                    ['title' => '6. Cookies y Tecnologías Similares', 'content' => 'Usamos cookies para personalizar su experiencia. Puede gestionar estas preferencias desde su navegador.'],
                    ['title' => '7. Retención de Datos', 'content' => 'Conservamos su información solo durante el tiempo necesario para cumplir con los fines descritos en esta política.'],
                    ['title' => '8. Enlaces a Terceros', 'content' => 'No somos responsables por las políticas de privacidad de sitios web de terceros enlazados desde nuestra página.'],
                    ['title' => '9. Actualizaciones de Esta Política', 'content' => 'Podemos actualizar esta política periódicamente y publicaremos los cambios en esta página.'],
                    ['title' => '10. Contacto', 'content' => 'Para preguntas o inquietudes, puede contactarnos en: gen@negociosgen.com o al WhatsApp: +59172635801.']
                ] as $section)
                <h4 class="fw-bold text-light mt-4 mb-3">
                    <img class="me-2" src="{{ asset('assets/CheckCircleOutline (1).svg') }}" alt="Check icon" style="width: 24px; height: 24px;">
                    {{ __($section['title']) }}
                </h4>
                <p>{{ __($section['content']) }}</p>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
