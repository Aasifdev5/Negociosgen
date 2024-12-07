@extends('master')
@section('title')
    {{ __('Lista de deseos') }}
@endsection
@section('content')
    <style>
        .transparent-card {
            background-color: rgba(26, 26, 26, 0.7);
            /* Adjust the alpha value for transparency */
            border: 1px solid rgba(46, 46, 46, 0.5);
            /* Optional: Semi-transparent border */
        }

        .transparent-card .card-body,
        .transparent-card .card-footer {
            background-color: transparent;
            /* Ensure the card body and footer are transparent */
            color: #ededed;
        }

        .nav-link.active {
            background-color: white;
            color: black;
            /* Optional: Change the text color for better contrast */
        }
    </style>
    <section style="padding: 90px 0; background: #1a1a1a;">
        <h1 class="text-center" style="color: #ededed;">
            Términos de <span style="color: #0090ff;">Uso</span>
        </h1>
        <div class="container my-5">

            <div class="row">
                <!-- Left Sidebar -->
                <div class="col-lg-3 col-md-4 col-12 sidebar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="collapse" href="#collapseIntro" aria-expanded="true"
                                aria-controls="collapseIntro">{{ __('Introducción') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" data-bs-toggle="collapse" href="#collapseConditions"
                                aria-controls="collapseConditions">{{ __('Condiciones de Uso') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" data-bs-toggle="collapse" href="#collapseUsage"
                                aria-controls="collapseUsage">{{ __('Uso del Sitio Web') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" data-bs-toggle="collapse" href="#collapseRegistration"
                                aria-controls="collapseRegistration">{{ __('Registro y Acceso') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" data-bs-toggle="collapse" href="#collapseIntellectual"
                                aria-controls="collapseIntellectual">{{ __('Propiedad Intelectual') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" data-bs-toggle="collapse" href="#collapseLinks"
                                aria-controls="collapseLinks">{{ __('Enlaces a Otros Sitios Web') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" data-bs-toggle="collapse" href="#collapseLiability"
                                aria-controls="collapseLiability">{{ __('Limitación de Responsabilidad') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" data-bs-toggle="collapse" href="#collapseModifications"
                                aria-controls="collapseModifications">{{ __('Modificaciones al Sitio') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" data-bs-toggle="collapse" href="#collapseLaw"
                                aria-controls="collapseLaw">{{ __('Ley Aplicable y Jurisdicción') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" data-bs-toggle="collapse" href="#collapseGeneral"
                                aria-controls="collapseGeneral">{{ __('Disposiciones Generales') }}</a>
                        </li>
                    </ul>
                </div>

                <!-- Right Content Area -->
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="accordion" id="termsAccordion">
                        <!-- Introducción Section -->
                        <div class="card mb-2 transparent-card">
                            <div class="card-header" id="headingIntro">
                                <h2 class="mb-0">
                                    <button class="btn btn-link text-light" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseIntro" aria-expanded="true" aria-controls="collapseIntro">
                                        {{ __('Introducción') }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseIntro" class="collapse show" aria-labelledby="headingIntro"
                                data-bs-parent="#termsAccordion">
                                <div class="card-body">
                                    <div class="bienvenido-al-sitio-web-de-gen-wrapper">
                                        <div class="bienvenido-al-sitio-container">
                                            <span>{{ __('Bienvenido al sitio web de GEN') }} (</span>
                                            <a class="wwwnegociosgencom" href="http://www.negociosgen.com"
                                                target="_blank">www.negociosgen.com</a>
                                            <span>). {{ __('Al acceder y utilizar este sitio, usted acepta cumplir y estar sujeto a  los siguientes términos de uso. Si no está de acuerdo con estos términos, le   pedimos que no utilice nuestro sitio. Estos términos pueden ser actualizados  periódicamente, y la versión más reciente estará disponible en esta  página') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Condiciones de Uso Section -->
                        <div class="card mb-2 transparent-card">
                            <div class="card-header" id="headingConditions">
                                <h2 class="mb-0">
                                    <button class="btn btn-link text-light collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseConditions" aria-expanded="false"
                                        aria-controls="collapseConditions">
                                        {{ __('Condiciones de Uso') }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseConditions" class="collapse" aria-labelledby="headingConditions"
                                data-bs-parent="#termsAccordion">
                                <div class="card-body">
                                    <p>{{ __('El uso de este sitio web está sujeto a las condiciones de uso descritas a continuación. Le recomendamos que revise estas condiciones periódicamente, ya que cualquier modificación entrará en vigor inmediatamente después de su publicación en el sitio. Su uso continuo del sitio implica que acepta estas modificaciones.') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Uso del Sitio Web Section -->
                        <div class="card mb-2 transparent-card">
                            <div class="card-header" id="headingUsage">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed text-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseUsage" aria-expanded="false"
                                        aria-controls="collapseUsage">
                                        {{ __('Uso del Sitio Web') }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseUsage" class="collapse" aria-labelledby="headingUsage"
                                data-bs-parent="#termsAccordion">
                                <div class="card-body">
                                    <p>{{ __('Este sitio web está diseñado exclusivamente para residentes de Bolivia. El contenido del sitio se proporciona con el propósito de informar sobre los productos y oportunidades de negocio de GEN. Usted se compromete a utilizar el sitio únicamente para fines lícitos y de acuerdo con estas condiciones de uso.') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Registro y Acceso Section -->
                        <div class="card mb-2 transparent-card">
                            <div class="card-header" id="headingRegistration">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed text-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseRegistration"
                                        aria-expanded="false" aria-controls="collapseRegistration">
                                        {{ __('Registro y Acceso') }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseRegistration" class="collapse" aria-labelledby="headingRegistration"
                                data-bs-parent="#termsAccordion">
                                <div class="card-body">
                                    <p>{{ __('Para acceder a ciertas partes del sitio, es posible que deba registrarse y crear una cuenta. Usted es responsable de mantener la confidencialidad de su contraseña y de todas las actividades realizadas bajo su cuenta. Si sospecha de un uso no autorizado de su cuenta, debe notificarnos de inmediato.') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Propiedad Intelectual Section -->
                        <div class="card mb-2 transparent-card">
                            <div class="card-header" id="headingIntellectual">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed text-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseIntellectual"
                                        aria-expanded="false" aria-controls="collapseIntellectual">
                                        {{ __('Propiedad Intelectual') }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseIntellectual" class="collapse" aria-labelledby="headingIntellectual"
                                data-bs-parent="#termsAccordion">
                                <div class="card-body">
                                    <p>{{ __('Todos los derechos de propiedad intelectual sobre el contenido del sitio, incluidos pero no limitados a textos, gráficos, logotipos, imágenes y software, son propiedad de GEN o de sus licenciantes. No está permitido reproducir, distribuir, modificar o utilizar los materiales del sitio sin el consentimiento previo por escrito de GEN.') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Enlaces a Otros Sitios Web Section -->
                        <div class="card mb-2 transparent-card">
                            <div class="card-header" id="headingLinks">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed text-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseLinks" aria-expanded="false"
                                        aria-controls="collapseLinks">
                                        {{ __('Enlaces a Otros Sitios Web') }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseLinks" class="collapse" aria-labelledby="headingLinks"
                                data-bs-parent="#termsAccordion">
                                <div class="card-body">
                                    <p>{{ __('Este sitio puede contener enlaces a otros sitios web. GEN no se hace responsable del contenido de esos sitios, ni de las políticas de privacidad de los mismos. La inclusión de cualquier enlace no implica respaldo por parte de GEN de dichos sitios.') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Limitación de Responsabilidad Section -->
                        <div class="card mb-2 transparent-card">
                            <div class="card-header" id="headingLiability">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed text-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseLiability"
                                        aria-expanded="false" aria-controls="collapseLiability">
                                        {{ __('Limitación de Responsabilidad') }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseLiability" class="collapse" aria-labelledby="headingLiability"
                                data-bs-parent="#termsAccordion">
                                <div class="card-body">
                                    <p>{{ __('GEN no será responsable de ningún daño directo, indirecto, incidental o consecuente que resulte del uso o la incapacidad de uso del sitio. Esto incluye, pero no se limita a, la pérdida de beneficios, datos o uso de dinero.') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Modificaciones al Sitio Section -->
                        <div class="card mb-2 transparent-card">
                            <div class="card-header" id="headingModifications">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed text-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseModifications"
                                        aria-expanded="false" aria-controls="collapseModifications">
                                        {{ __('Modificaciones al Sitio') }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseModifications" class="collapse" aria-labelledby="headingModifications"
                                data-bs-parent="#termsAccordion">
                                <div class="card-body">
                                    <p>{{ __('GEN se reserva el derecho de modificar o descontinuar el sitio o cualquier parte del mismo en cualquier momento y sin previo aviso. No seremos responsables ante usted ni ante terceros por cualquier modificación o descontinuación del sitio.') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Ley Aplicable y Jurisdicción Section -->
                        <div class="card mb-2 transparent-card">
                            <div class="card-header" id="headingLaw">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed text-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseLaw" aria-expanded="false"
                                        aria-controls="collapseLaw">
                                        {{ __('Ley Aplicable y Jurisdicción') }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseLaw" class="collapse" aria-labelledby="headingLaw"
                                data-bs-parent="#termsAccordion">
                                <div class="card-body">
                                    <p>{{ __('Estos términos de uso se regirán e interpretarán de acuerdo con las leyes del Estado Plurinacional de Bolivia. Cualquier disputa que surja en relación con estos términos será resuelta por los tribunales competentes de Bolivia.') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Disposiciones Generales Section -->
                        <div class="card mb-2 transparent-card">
                            <div class="card-header" id="headingGeneral">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed text-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseGeneral" aria-expanded="false"
                                        aria-controls="collapseGeneral">
                                        {{ __('Disposiciones Generales') }}
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseGeneral" class="collapse" aria-labelledby="headingGeneral"
                                data-bs-parent="#termsAccordion">
                                <div class="card-body">
                                    <p>{{ __('Si alguna disposición de estos términos se considera inválida o inaplicable, dicha disposición se interpretará de manera consistente con la ley aplicable, y las disposiciones restantes permanecerán en pleno vigor y efecto.') }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            // Remove active class and text-light from all nav-links when one is clicked
            $('.nav-link').on('click', function() {
                $('.nav-link').removeClass('active'); // Remove the 'active' class from all links
                $(this).addClass('active'); // Add 'active' class to the clicked link
                $('.nav-link').not(this).addClass('text-light'); // Add text-light class to other links
                $(this).removeClass('text-light'); // Remove text-light from the clicked link
            });
        });
    </script>
@endsection
