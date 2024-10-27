@extends('master')
@section('title')
¿Necesitas ayuda?
@endsection
@section('content')
<section style="padding: 90px 0;background: #1A1A1A;">
    <div class="container my-5">
        <h1 class="text-center" style="color: #ededed;">¿Necesitas  <span style="color: #0090ff;">Ayuda?</span></h1>
        <form action="/search" method="GET" style="width: 100%; max-width: 600px; margin: auto;">
            <div class="input-group" style="position: relative; display: flex; align-items: center;">
              <input type="text" name="query" class="form-control" placeholder="Buscar con palabras claves" style="width: 100%; background-color: ; border-radius: 8px; border: 1px solid #333; padding-left: 40px; height: 48px; color: #8F8F8F; font-size: 16px;">
              <img class="search-icon" alt="Buscar" src="{{asset('assets/search.svg')}}" style="position: absolute; left: 12px; width: 20px; height: 20px; filter: brightness(0.8);">
            </div>
          </form>

          <div class="container my-4">
            <style>
                /* Additional styles for the cards */
                .transparent-card {
                    background-color: #000; /* Set background color to black */
                    border: 1px solid rgba(46, 46, 46, 0.5); /* Optional: Semi-transparent border */
                }

                .transparent-card .card-body {
                    color: #fff; /* Set text color to white */
                }

                .transparent-card .card-title,
                .transparent-card .card-text {
                    color: #fff; /* Ensure titles and text are white */
                }
            </style>

            <div class="row">
                <!-- Blog Post 1 -->
                <div class="col-lg-4 col-12 mb-4">
                    <div class="card image-parent h-100 transparent-card">
                        <div class="card-body stack">
                            <h5 class="card-title fw-bold ttulo-del-blog">¿Qué es GEN y cómo funciona?</h5>
                            <p class="card-text estamos-dedicados-a">GEN es una plataforma que ofrece cursos especializados en marketing y coaching, junto con un sistema de afiliados multinivel que te permite ganar comisiones promoviendo nuestros productos. Para comenzar, solo tienes que registrarte, acceder a nuestros cursos y empezar a aprender o promover.</p>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 2 -->
                <div class="col-lg-4 col-12 mb-4">
                    <div class="card image-parent h-100 transparent-card">
                        <div class="card-body stack">
                            <h5 class="card-title fw-bold ttulo-del-blog">¿Cómo me registro en GEN?</h5>
                            <p class="card-text estamos-dedicados-a">Puedes registrarte directamente en nuestra página de registro completando el formulario con tus datos personales. Recibirás un correo de confirmación para activar tu cuenta.</p>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 3 -->
                <div class="col-lg-4 col-12 mb-4">
                    <div class="card image-parent h-100 transparent-card">
                        <div class="card-body stack">
                            <h5 class="card-title fw-bold ttulo-del-blog">¿Qué métodos de pago aceptan?</h5>
                            <p class="card-text estamos-dedicados-a">Aceptamos pagos con tarjeta de crédito, débito y transferencias bancarias. Además, contamos con opciones de pago mediante plataformas como PayPal y otros servicios locales en Bolivia.</p>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 4 -->
                <div class="col-lg-4 col-12 mb-4">
                    <div class="card image-parent h-100 transparent-card">
                        <div class="card-body stack">
                            <h5 class="card-title fw-bold ttulo-del-blog">¿Cómo puedo acceder a los cursos que compré?</h5>
                            <p class="card-text estamos-dedicados-a">Una vez completada tu compra, los cursos estarán disponibles en tu cuenta en la sección de "Mis Cursos". Solo inicia sesión, selecciona el curso que compraste y comienza a aprender.</p>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 5 -->
                <div class="col-lg-4 col-12 mb-4">
                    <div class="card image-parent h-100 transparent-card">
                        <div class="card-body stack">
                            <h5 class="card-title fw-bold ttulo-del-blog">¿Cómo funciona el sistema de afiliados?</h5>
                            <p class="card-text estamos-dedicados-a">El sistema de afiliados de GEN te permite ganar comisiones por referir a otros usuarios a nuestros cursos y productos. Puedes compartir tu enlace de afiliado personalizado, y cada vez que alguien realice una compra usando ese enlace, recibirás una comisión.</p>
                        </div>
                    </div>
                </div>

                <!-- Blog Post 6 -->
                <div class="col-lg-4 col-12 mb-4">
                    <div class="card image-parent h-100 transparent-card">
                        <div class="card-body stack">
                            <h5 class="card-title fw-bold ttulo-del-blog">¿Puedo solicitar un reembolso?</h5>
                            <p class="card-text estamos-dedicados-a">Sí, ofrecemos reembolsos dentro de los primeros 14 días desde la compra del curso, siempre que no hayas completado más del 20% del contenido. Para más detalles, revisa nuestros Términos y Condiciones de Reembolso.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>





    </div>
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
                    <a href="uregister.html" class="btn btn-primary btn-lg">Regístrate Aquí</a>
                </div>
            </div>
        </div>
    </div>

    </section>

@endsection