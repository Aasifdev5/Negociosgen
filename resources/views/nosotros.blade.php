@extends('master')
@section('title')
    {{ __('Nosotros') }}
@endsection
@section('content')
<div class="container-fluid custom-bg w-100">
    <div class="container my-5">
        @if(Session::has('success'))
<div class="alert alert-success">
    <p>{{session::get('success')}}</p>
</div>
@endif
@if(Session::has('fail'))
<div class="alert alert-danger">
    <p>{{session::get('fail')}}</p>
</div>
@endif
      <div class="row">
        <!-- Text Column -->
        <div class="col-lg-6 col-md-12 order-2 order-md-1">
          <!-- Heading -->
          <h2 class="text-center text-lg-start">
            <span
              style="
                color: #fff;
                font-size: 33px;
                letter-spacing: -0.02em;
                display: inline-block;
                font-family: 'Space Grotesk', sans-serif;
                font-weight: 700;
              "
            >
              {{ __('Transforma tu vida') }} <span style="color: #0090ff">{{ __('con') }}</span>
              <br />
            </span>
            <span
              style="
                color: #0090ff;
                font-size: 33px;
                letter-spacing: -0.02em;
                display: inline-block;
                font-family: 'Space Grotesk', sans-serif;
                font-weight: 700;
              "
            >
              {{ __('educación financiera y') }} <br />
              {{ __('crecimiento personal') }}
            </span>
          </h2>

          <!-- Paragraph -->
          <p
            class="text-center text-md-start"
            style="
              font-family: 'Space Grotesk', sans-serif;
              font-weight: 400;
              line-height: 28px;
              color: #a1a1a1;
            "
          >
            {{ __('En GEN, Grupo Especializado en Negocios, te ofrecemos las
            herramientas para alcanzar la libertad financiera y mejorar en
            todas las áreas de tu vida. A través de cursos, coaching y
            oportunidades de ingresos, te guiamos para que tomes el control de
            tu futuro y el de tu familia.')}}
          </p>

          <!-- Button -->
          <div class="text-center text-lg-start mb-3">
            <a href="{{ url('membership') }}"
              class="btn btn-sm btn-primary"
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
                text-transform: uppercase;
              "
            >
              {{ __('Únete ahora') }}
            </a>
          </div>
        </div>

        <!-- Image Column -->
        <div class="col-lg-6 col-md-12 order-1 order-md-2">
          <img
            class="img-fluid rounded-3"
            src="{{asset('assets/noso.png')}}"
            alt="Placeholder Image"
            style="padding-top: 20px; width: 100%; height: auto"
          />
        </div>
      </div>
    </div>
  </div>

  <section style="padding: 20px 0; background-color: #0a0a0a">
    <div class="container">
      <div class="row">
        <div
          class="col-lg-4 col-md-12 order-2 order-md-1"
          style="padding-bottom: 10px"
        >
          <img
            src="{{asset('assets/image 54.png')}}"
            class="img-fluid"
            alt="Transformación Personal"
          />
        </div>

        <div
          class="col-lg-8 col-md-12 order-1 order-md-2"
          style="padding-bottom: 10px"
        >
          <h1
            class="text-center text-md-start"
            style="
              width: 100%;
              color: #ededed;
              font-size: 32px;
              font-family: 'Space Grotesk';
              font-weight: 700;
              word-wrap: break-word;
            "
          >
            {{ __('¿QUIÉNES SOMOS?') }}
          </h1>
          <p
            class="text-center text-md-start"
            style="
              width: 100%;
              color: #a1a1a1;
              font-size: 16px;
              font-family: 'Space Grotesk', sans-serif;
              font-weight: 400;
              line-height: 24px;
              word-wrap: break-word;
            "
          >
            {{ __('En GEN (Grupo Especializado en Negocios), nos dedicamos a la
            educación financiera, el desarrollo personal y el emprendimiento.
            Nuestro compromiso es ofrecer servicios de alto valor, ayudando a
            las personas a alcanzar sus metas y transformar sus vidas. A
            través de un enfoque claro y orientado a resultados, guiamos a
            nuestros miembros hacia la libertad financiera y un crecimiento
            personal y profesional sostenido.')}}
          </p>
        </div>
      </div>

      <div class="row my-4 text-center text-md-start">
        <div class="col-lg-12 mb-4">
          <h1
            class="text-light font-weight-bold"
            style="font-size: 32px; font-family: 'Space Grotesk', sans-serif"
          >
            {{ __('Nuestra Misión') }}
          </h1>
          <p
            class="text-light"
            style="
              color: white;
              font-size: 16px;
              font-family: 'Space Grotesk', sans-serif;
              line-height: 24px;
              max-width: 600px;
            "
          >
            {{ __('Nuestra misión es transformar vidas, empoderar a las personas para
            que superen sus límites y alcancen la libertad financiera. Lo
            hacemos a través de')}}:
          </p>
        </div>

        <div class="col-lg-12">
          <div class="row justify-content-center">
            <!-- Card 1 -->
            <div class="col-12 col-sm-6 col-md-4 text-center mb-5">
              <div style="padding: 30px">
                <img
                  class="mb-3"
                  style="width: 80px; height: 58px"
                  src="{{asset('assets/online-money_15268822 2.png')}}"
                  alt="Libertad Financiera"
                />
                <h5
                  class="text-light"
                  style="
                    font-family: 'Space Grotesk', sans-serif;
                    font-size: 18px;
                    line-height: 24px;
                  "
                >
                  {{ __('Libertad financiera') }}
                </h5>
                <p class="text-light" style="font-size: 14px">
                  {{ __('En áreas clave como finanzas, emprendimiento y desarrollo
                  personal.')}}
                </p>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-12 col-sm-6 col-md-4 text-center mb-5">
              <div style="padding: 30px">
                <img
                  class="mb-3"
                  style="width: 80px; height: 80px"
                  src="{{asset('assets/online-money_15268822 3.jpg')}}"
                  alt="Crecimiento"
                />
                <h5
                  class="text-light"
                  style="
                    font-family: 'Space Grotesk', sans-serif;
                    font-size: 18px;
                    line-height: 24px;
                  "
                >
                  {{ __('Crecimiento') }}
                </h5>
                <p class="text-light" style="font-size: 14px">
                  {{ __('Para que nuestros miembros se inspiren y logren sus objetivos.') }}
                </p>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="col-12 col-sm-6 col-md-4 text-center mb-5">
              <div style="padding: 30px">
                <img
                  class="mb-3"
                  style="width: 80px; height: 80px"
                  src="{{asset('assets/online-money_15268822 4.png')}}"
                  alt="Motivación"
                />
                <h5
                  class="text-light"
                  style="
                    font-family: 'Space Grotesk', sans-serif;
                    font-size: 18px;
                    line-height: 24px;
                  "
                >
                  {{ __('Motivación') }}
                </h5>
                <p class="text-light" style="font-size: 14px">
                    {{ __('Oportunidades de generación de ingresos mediante nuestro sistema de marketing multinivel.') }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section style="padding: 20px 0; background: #1a1a1a">
    <div class="container">
      <div class="row my-4 text-center text-md-start">
        <div class="col-12 mb-4">
          <h1
            class="text-light font-weight-bold"
            style="font-size: 32px; font-family: 'Space Grotesk', sans-serif"
          >
            {{ __('Nuestra Visión') }}
          </h1>
          <p
            class="text-light"
            style="
              color: white;
              font-size: 16px;
              font-family: 'Space Grotesk', sans-serif;
              line-height: 24px;
              max-width: 100%;
              margin: auto;
            "
          >
            {{ __('Ser un referente global en la educación financiera y el crecimiento personal. Inspiramos, educamos y promovemos cambios sociales, ayudando a mejorar la calidad de vida de las personas en todo el mundo.') }}
          </p>
          <p
            class="text-light"
            style="
              color: white;
              font-size: 16px;
              font-family: 'Space Grotesk', sans-serif;
              line-height: 24px;
              max-width: 100%;
              margin: auto;
            "
          >
            {{ __('Parte de la ganancia de GEN será donada trimestralmente para diferentes organizaciones, obras sociales, proyectos y áreas necesitadas de nuestra sociedad.') }}
          </p>
        </div>

        <div class="col-12">
          <img
            class="img-fluid creame-una-imagene-de-caridad"
            style="
              width: 100%;
              height: 236px;
              object-fit: cover;
              border-radius: 12px;
              overflow: hidden;
            "
            alt="Imagen representativa de caridad, donación y ayuda a los más necesitados"
            src="{{asset('assets/Creame una imagene de caridad, donaciòn y contribuciòn con el màs necesitado.png')}}"
          />
        </div>
      </div>
    </div>
  </section>

  <section style="padding: 60px 0; background: #000">
    <div class="container">
      <h1
        style="
          padding-bottom: 30px;
          color: #fff;
          font-size: 36px;
          font-family: 'Space Grotesk', sans-serif;
        "
      >
        {{ __('Nuestros Valores') }}
      </h1>

      <div class="row">
        <div class="col-lg-12">
          <div class="row justify-content-center">
            <!-- Card 1 -->
            <div class="col-12 col-sm-6 col-md-3 text-center mb-5">
              <div
                style="
                  padding: 30px;
                  border-radius: 10px;
                  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                  transition: transform 0.3s ease;
                "
              >
                <img
                  class="mb-3"
                  style="width: 80px; height: 58px"
                  src="{{asset('assets/online-money_15268822 5.png')}}"
                  alt="Libertad Financiera"
                />
                <h5
                  class="text-light"
                  style="
                    font-family: 'Space Grotesk', sans-serif;
                    font-size: 18px;
                    line-height: 24px;
                  "
                >
                  {{ __('Compromiso') }}
                </h5>
                <p class="text-light" style="font-size: 14px">
                  {{ __('Estamos dedicados a apoyar a nuestros miembros en su camino hacia el éxito.') }}
                </p>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="col-12 col-sm-6 col-md-3 text-center mb-5">
              <div
                style="
                  padding: 30px;
                  border-radius: 10px;
                  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                  transition: transform 0.3s ease;
                "
              >
                <img
                  class="mb-3"
                  style="width: 80px; height: 80px"
                  src="{{asset('assets/online-money_15268822 6.png')}}"
                  alt="Crecimiento"
                />
                <h5
                  class="text-light"
                  style="
                    font-family: 'Space Grotesk', sans-serif;
                    font-size: 18px;
                    line-height: 24px;
                  "
                >
                  {{ __('Cooperación') }}
                </h5>
                <p class="text-light" style="font-size: 14px">
                  {{ __('Fomentamos el trabajo en equipo y la colaboración entre nuestra comunidad.') }}
                </p>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="col-12 col-sm-6 col-md-3 text-center mb-5">
              <div
                style="
                  padding: 30px;
                  border-radius: 10px;
                  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                  transition: transform 0.3s ease;
                "
              >
                <img
                  class="mb-3"
                  style="width: 80px; height: 80px"
                  src="{{asset('assets/online-money_15268822 7.png')}}"
                  alt="Motivación"
                />
                <h5
                  class="text-light"
                  style="
                    font-family: 'Space Grotesk', sans-serif;
                    font-size: 18px;
                    line-height: 24px;
                  "
                >
                  {{ __('Motivación') }}
                </h5>
                <p class="text-light" style="font-size: 14px">
                  {{ __('Inspiramos a las personas a tomar acción y avanzar hacia sus sueños.') }}
                </p>
              </div>
            </div>

            <!-- Card 4 -->
            <div class="col-12 col-sm-6 col-md-3 text-center mb-5">
              <div
                style="
                  padding: 30px;
                  border-radius: 10px;
                  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                  transition: transform 0.3s ease;
                "
              >
                <img
                  class="mb-3"
                  style="width: 80px; height: 80px"
                  src="{{asset('assets/online-money_15268822 8.png')}}"
                  alt="Responsabilidad Social"
                />
                <h5
                  class="text-light"
                  style="
                    font-family: 'Space Grotesk', sans-serif;
                    font-size: 18px;
                    line-height: 24px;
                  "
                >
                  {{ __('Responsabilidad Social') }}
                </h5>
                <p class="text-light" style="font-size: 14px">
                  {{ __('Parte de nuestras ganancias se donan a causas sociales y organizaciones que necesitan apoyo.') }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="container-fluid custom-bg w-100">
    <div class="container my-5">
      <div class="row">
        <!-- Text Column -->
        <div class="col-lg-6 col-md-12 order-2 order-md-1">
          <!-- Heading -->
          <h2 class="text-center text-lg-start">
            <span
              style="
                color: #fff;
                font-size: 33px;
                letter-spacing: -0.02em;
                display: inline-block;
                font-family: 'Space Grotesk', sans-serif;
                font-weight: 700;
              "
            >
              {{ __('Áreas de Enfoque') }}
            </span>
          </h2>

          <!-- Paragraph -->
          <p
            class="text-center text-md-start"
            style="
              font-family: 'Space Grotesk', sans-serif;
              font-weight: 400;
              line-height: 28px;
              color: #a1a1a1;
            "
          >
            {{ __('En GEN, abarcamos una amplia gama de temas esenciales para el crecimiento integral de nuestros miembros') }}:
          </p>
          <!-- List of Features -->
          <div class="mb-3 d-flex align-items-start">
            <img
              class="me-2"
              src="{{asset('assets/CheckCircleOutline (1).svg')}}"
              alt="Check icon"
              style="width: 24px; height: 24px"
            />
            <div class="text-light">
              {{ __('Educación financiera para adultos y niños.') }}
            </div>
          </div>

          <div class="mb-3 d-flex align-items-start">
            <img
              class="me-2"
              src="{{asset('assets/CheckCircleOutline (1).svg')}}"
              alt="Check icon"
              style="width: 24px; height: 24px"
            />
            <div class="text-light">{{ __('Motivación y crecimiento personal.') }}</div>
          </div>

          <div class="mb-4 d-flex align-items-start">
            <img
              class="me-2"
              src="{{asset('assets/CheckCircleOutline (1).svg')}}"
              alt="Check icon"
              style="width: 24px; height: 24px"
            />
            <div class="text-light">
              {{ __('Emprendimiento y oportunidades de ingresos.') }}
            </div>
          </div>
          <div class="mb-3 d-flex align-items-start">
            <img
              class="me-2"
              src="{{asset('assets/CheckCircleOutline (1).svg')}}"
              alt="Check icon"
              style="width: 24px; height: 24px"
            />
            <div class="text-light">
              {{ __('Estilo de vida saludable y bienestar.') }}
            </div>
          </div>

          <div class="mb-3 d-flex align-items-start">
            <img
              class="me-2"
              src="{{asset('assets/CheckCircleOutline (1).svg')}}"
              alt="Check icon"
              style="width: 24px; height: 24px"
            />
            <div class="text-light">
              {{ __('Autoconocimiento y desarrollo espiritual.') }}
            </div>
          </div>

          <div class="mb-4 d-flex align-items-start">
            <img
              class="me-2"
              src="{{asset('assets/CheckCircleOutline (1).svg')}}"
              alt="Check icon"
              style="width: 24px; height: 24px"
            />
            <div class="text-light">
              {{ __('Familia, hijos y relaciones de pareja.') }}
            </div>
          </div>
          <div class="mb-3 d-flex align-items-start">
            <img
              class="me-2"
              src="{{asset('assets/CheckCircleOutline (1).svg')}}"
              alt="Check icon"
              style="width: 24px; height: 24px"
            />
            <div class="text-light">{{ __('Inteligencia emocional.') }}</div>
          </div>

          <div class="mb-4 d-flex align-items-start">
            <img
              class="me-2"
              src="{{asset('assets/CheckCircleOutline (1).svg')}}"
              alt="Check icon"
              style="width: 24px; height: 24px"
            />
            <div class="text-light">{{ __('Estudiar y vivir en el exterior.') }}</div>
          </div>
          <!-- Button -->
          <div class="text-center text-lg-start mb-3">
            <a href="{{ url('membership') }}"
              class="btn btn-sm btn-primary"
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
                text-transform: uppercase;
              "
            >
              {{ __('Únete ahora') }}
            </a>
          </div>
        </div>

        <!-- Image Column -->
        <div class="col-lg-6 col-md-12 order-1 order-md-2">
          <img
            class="img-fluid rounded-3"
            src="{{asset('assets/UpscaleImage_1_20241027_mano--texto.jpg')}}"
            alt="Placeholder Image"
            style="padding-top: 20px; width: 100%; height: auto"
          />
        </div>
      </div>
    </div>
  </div>

  <section style="padding: 20px 0; background-color: #000000">
    <div class="container my-5">
      <h1 class="text-light mb-4">{{ __('Oportunidades con GEN') }}</h1>
      <p style="color: #a1a1a1">
        {{ __('Sabemos que uno de los mayores desafíos en la vida es la falta de estabilidad económica, lo que nos puede llevar a descuidar nuestros sueños, la familia e incluso nuestra salud. GEN te ofrece una  solución: puedes generar ingresos adicionales o convertir este emprendimiento en tu fuente principal de ingresos, alcanzando tus metas a corto, mediano y largo plazo.') }}
      </p>

      <div class="col-lg-12 col-md-12 order-1 order-md-2 mb-5">
        <img
          class="img-fluid rounded-3"
          src="{{asset('assets/image 55.png')}}"
          alt="Placeholder Image"
          style="padding-top: 20px; width: 100%; height: auto"
        />
      </div>
      <div class="container">
        <p
          style="
            padding-bottom: 30px;
            color: #fff;
            font-size: 36px;
            font-family: 'Space Grotesk', sans-serif;
          "
        >
          {{ __('Con nuestro sistema de marketing multinivel, puedes') }}:
        </p>

        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="row justify-content-center">
              <!-- Card 1 -->
              <div class="col-12 col-sm-6 col-md-3 text-center mb-5">
                <div
                  style="
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                    transition: transform 0.3s ease;
                  "
                >
                  <img
                    class="mb-3"
                    style="width: 80px; height: 58px"
                    src="{{asset('assets/online-money_15268822 9.png')}}"
                    alt="Libertad Financiera"
                  />
                  <h5
                    class="text-light"
                    style="
                      font-family: 'Space Grotesk', sans-serif;
                      font-size: 18px;
                      line-height: 24px;
                    "
                  >
                    {{ ('Compromiso') }}
                  </h5>
                  <p class="text-light" style="font-size: 14px">
                    {{ __('Estamos dedicados a apoyar a nuestros miembros en su camino hacia el éxito.') }}
                  </p>
                </div>
              </div>

              <!-- Card 2 -->
              <div class="col-12 col-sm-6 col-md-3 text-center mb-5">
                <div
                  style="
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                    transition: transform 0.3s ease;
                  "
                >
                  <img
                    class="mb-3"
                    style="width: 80px; height: 80px"
                    src="{{asset('assets/online-money_15268822 10.png')}}"
                    alt="Crecimiento"
                  />
                  <h5
                    class="text-light"
                    style="
                      font-family: 'Space Grotesk', sans-serif;
                      font-size: 18px;
                      line-height: 24px;
                    "
                  >
                    {{ ('Cooperación') }}
                  </h5>
                  <p class="text-light" style="font-size: 14px">
                    {{ __('Fomentamos el trabajo en equipo y la colaboración entre nuestra comunidad.') }}
                  </p>
                </div>
              </div>

              <!-- Card 3 -->
              <div class="col-12 col-sm-6 col-md-3 text-center mb-5">
                <div
                  style="
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                    transition: transform 0.3s ease;
                  "
                >
                  <img
                    class="mb-3"
                    style="width: 80px; height: 80px"
                    src="{{asset('assets/online-money_15268822 11.png')}}"
                    alt="Motivación"
                  />
                  <h5
                    class="text-light"
                    style="
                      font-family: 'Space Grotesk', sans-serif;
                      font-size: 18px;
                      line-height: 24px;
                    "
                  >
                    {{ __('Motivación') }}
                  </h5>
                  <p class="text-light" style="font-size: 14px">
                    {{ __('Inspiramos a las personas a tomar acción y avanzar hacia sus sueños.') }}
                  </p>
                </div>
              </div>

              <!-- Card 4 -->
              <div class="col-12 col-sm-6 col-md-3 text-center mb-5">
                <div
                  style="
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                    transition: transform 0.3s ease;
                  "
                >
                  <img
                    class="mb-3"
                    style="width: 80px; height: 80px"
                    src="{{asset('assets/online-money_15268822 12.png')}}"
                    alt="Responsabilidad Social"
                  />
                  <h5
                    class="text-light"
                    style="
                      font-family: 'Space Grotesk', sans-serif;
                      font-size: 18px;
                      line-height: 24px;
                    "
                  >
                    {{ __('Responsabilidad Social') }}
                  </h5>
                  <p class="text-light" style="font-size: 14px">
                    {{ __('Parte de nuestras ganancias se donan a causas sociales y organizaciones que necesitan apoyo.') }}
                  </p>
                </div>
              </div>
              <!-- Card 1 -->
              <div class="col-12 col-sm-6 col-md-3 text-center mb-5">
                <div
                  style="
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                    transition: transform 0.3s ease;
                  "
                >
                  <img
                    class="mb-3"
                    style="width: 80px; height: 58px"
                    src="{{asset('assets/online-money_15268822 13.png')}}"
                    alt="Libertad Financiera"
                  />
                  <h5
                    class="text-light"
                    style="
                      font-family: 'Space Grotesk', sans-serif;
                      font-size: 18px;
                      line-height: 24px;
                    "
                  >
                    {{ __('Compromiso') }}
                  </h5>
                  <p class="text-light" style="font-size: 14px">
                    {{ __('Estamos dedicados a apoyar a nuestros miembros en su camino hacia el éxito.') }}
                  </p>
                </div>
              </div>

              <!-- Card 2 -->
              <div class="col-12 col-sm-6 col-md-3 text-center mb-5">
                <div
                  style="
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                    transition: transform 0.3s ease;
                  "
                >
                  <img
                    class="mb-3"
                    style="width: 80px; height: 80px"
                    src="{{asset('assets/online-money_15268822 14.png')}}"
                    alt="Crecimiento"
                  />
                  <h5
                    class="text-light"
                    style="
                      font-family: 'Space Grotesk', sans-serif;
                      font-size: 18px;
                      line-height: 24px;
                    "
                  >
                    {{ __('Cooperación') }}
                  </h5>
                  <p class="text-light" style="font-size: 14px">
                    {{ __('Fomentamos el trabajo en equipo y la colaboración entre nuestra comunidad.') }}
                  </p>
                </div>
              </div>

              <!-- Card 3 -->
              <div class="col-12 col-sm-6 col-md-3 text-center mb-5">
                <div
                  style="
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                    transition: transform 0.3s ease;
                  "
                >
                  <img
                    class="mb-3"
                    style="width: 80px; height: 80px"
                    src="{{asset('assets/online-money_15268822 15.png')}}"
                    alt="Motivación"
                  />
                  <h5
                    class="text-light"
                    style="
                      font-family: 'Space Grotesk', sans-serif;
                      font-size: 18px;
                      line-height: 24px;
                    "
                  >
                    {{ __('Motivación') }}
                  </h5>
                  <p class="text-light" style="font-size: 14px">
                    {{ __('Inspiramos a las personas a tomar acción y avanzar hacia sus sueños.') }}
                  </p>
                </div>
              </div>

              <!-- Card 4 -->
              <div class="col-12 col-sm-6 col-md-3 text-center mb-5">
                <div
                  style="
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
                    transition: transform 0.3s ease;
                  "
                >
                  <img
                    class="mb-3"
                    style="width: 80px; height: 80px"
                    src="{{asset('assets/online-money_15268822 16.png')}}"
                    alt="Responsabilidad Social"
                  />
                  <h5
                    class="text-light"
                    style="
                      font-family: 'Space Grotesk', sans-serif;
                      font-size: 18px;
                      line-height: 24px;
                    "
                  >
                    {{ __('Responsabilidad Social') }}
                  </h5>
                  <p class="text-light" style="font-size: 14px">
                    {{ __('Parte de nuestras ganancias se donan a causas sociales y organizaciones que necesitan apoyo.') }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        <div class="container py-5" style="background: #1A1A1A;border: 1px solid #1A1A1A;border-radius: 16px;">
          <div class="row align-items-center">
            <!-- Image on the left -->
            <div class="col-lg-6 col-md-12 text-center mb-4 mb-lg-0">
              <img
                class="img-fluid"
                alt="Business Opportunity"
                src="{{asset('assets/image asd(6).png')}}"
              />
            </div>

            <!-- Text content on the right -->
            <div class="col-lg-6 col-md-12">
              <h3 class="text-light font-weight-bold mb-3">
                {{ __('Plan de Negocios GEN') }}
              </h3>
              <p class="text-light">
                {{ __('Invita a tus conocidos, familiares, amigos y compañeros de trabajo a descubrir esta increíble oportunidad de negocios.Comparte sobre este proyecto que busca educar, motivar y generar cambios positivos en las personas, además de ofrecer fuentes de ingreso que pueden transformar vidas. Al unirte a nuestra comunidad, podrás') }}:
              </p>

              <!-- Item 1 -->
              <div class="d-flex align-items-center mb-3">
                <img
                  class="mr-2"
                  alt=""
                  src="{{asset('assets/CheckCircleOutline (1).svg')}}"
                  style="width: 24px; height: 24px"
                />
                <p class="mb-0 text-light">
                  {{ __('Acceso ilimitado a todos los cursos, entrenamientos y materiales digitales.') }}
                </p>
              </div>

              <!-- Item 2 -->
              <div class="d-flex align-items-center mb-3">
                <img
                  class="mr-2"
                  alt=""
                  src="{{asset('assets/CheckCircleOutline (1).svg')}}"
                  style="width: 24px; height: 24px"
                />
                <p class="mb-0 text-light">
                  {{ __('Comisiones por las personas que inscribas en tu red hasta el séptimo nivel.') }}
                </p>
              </div>

              <!-- Item 3 -->
              <div class="d-flex align-items-center mb-3">
                <img
                  class="mr-2"
                  alt=""
                  src="{{asset('assets/CheckCircleOutline (1).svg')}}"
                  style="width: 24px; height: 24px"
                />
                <p class="mb-0 text-light">
                  {{ __('Oportunidad de mejorar tus finanzas, crecer personalmente y contribuir a causas sociales.') }}
                </p>
              </div>

              <!-- Button -->
              <div class="text-center text-lg-left mt-4">
                <a href="{{ url('membership') }}" class="btn btn-primary btn-lg"
                  >{{ __('Únete ahora') }}</a
                >
              </div>
            </div>
          </div>
        </div>
      <h1 class="text-light text-center font-weight-bold mb-3">{{ __('Ganancias Potenciales') }}</h1>
      <p style="color: #A1A1A1;">{{ __('GEN distribuye el 40% de sus ingresos entre sus miembros activos, basándose en la estructura de red que construyas. Así es como funcionan las comisiones') }}:</p>
      <div class="container py-5">
          <!-- Header Row -->
          <div class="row text-center text-light font-weight-bold mb-3">
              <div class="col-6 col-md-3">{{ __('Nivel') }}</div>
              <div class="col-6 col-md-2">% {{ __('Comisión') }}</div>
              <div class="col-6 col-md-3">{{ __('Personas') }}</div>
              <div class="col-6 col-md-4">{{ __('Monto Total') }}</div>
          </div>

          <hr class="bg-light">

          <!-- Row 1 -->
          <div class="row text-center text-light mb-3">
              <div class="col-6 col-md-3">1er {{ __('Nivel') }}</div>
              <div class="col-6 col-md-2">30%</div>
              <div class="col-6 col-md-3">3 {{ __('Personas') }}</div>
              <div class="col-6 col-md-4">Bs. 900 + Bs. 100 Bono</div>
          </div>
          <hr class="bg-light">
          <!-- Row 2 -->
          <div class="row text-center text-light mb-3">
              <div class="col-6 col-md-3">2do {{ __('Nivel') }}</div>
              <div class="col-6 col-md-2">3%</div>
              <div class="col-6 col-md-3">9 {{ __('Personas') }}</div>
              <div class="col-6 col-md-4">Bs. 270</div>
          </div>
          <hr class="bg-light">
          <!-- Row 3 -->
          <div class="row text-center text-light mb-3">
              <div class="col-6 col-md-3">3er {{ __('Nivel') }}</div>
              <div class="col-6 col-md-2">2%</div>
              <div class="col-6 col-md-3">27 {{ __('Personas') }}</div>
              <div class="col-6 col-md-4">Bs. 540</div>
          </div>
          <hr class="bg-light">
          <!-- Row 4 -->
          <div class="row text-center text-light mb-3">
              <div class="col-6 col-md-3">4to {{ __('Nivel') }}</div>
              <div class="col-6 col-md-2">2%</div>
              <div class="col-6 col-md-3">81 {{ __('Personas') }}</div>
              <div class="col-6 col-md-4">Bs. 1,620</div>
          </div>
          <hr class="bg-light">
          <!-- Row 5 -->
          <div class="row text-center text-light mb-3">
              <div class="col-6 col-md-3">5to {{ __('Nivel') }}</div>
              <div class="col-6 col-md-2">1%</div>
              <div class="col-6 col-md-3">243 {{ __('Personas') }}</div>
              <div class="col-6 col-md-4">Bs. 2,430</div>
          </div>
          <hr class="bg-light">
          <!-- Row 6 -->
          <div class="row text-center text-light mb-3">
              <div class="col-6 col-md-3">6to {{ __('Nivel') }}</div>
              <div class="col-6 col-md-2">1%</div>
              <div class="col-6 col-md-3">729 {{ __('Personas') }}</div>
              <div class="col-6 col-md-4">Bs. 7,290</div>
          </div>
          <hr class="bg-light">
          <!-- Row 7 -->
          <div class="row text-center text-light mb-3">
              <div class="col-6 col-md-3">7mo {{ __('Nivel') }}</div>
              <div class="col-6 col-md-2">1%</div>
              <div class="col-6 col-md-3">2,187 {{ __('Personas') }}</div>
              <div class="col-6 col-md-4">Bs. 21,870</div>
          </div>
      </div>
      <div class="container py-5 text-center" style="background: #0f1c2e;border: 1px solid #1a1a1a;border-radius: 16px;">
          <!-- Title -->
          <div class="row justify-content-center">
              <div class="col-12">
                  <h2 class="font-weight-bold text-light">{{ __('Únete a GEN') }}</h2>
              </div>
          </div>

          <!-- Description -->
          <div class="row justify-content-center mt-3">
              <div class="col-12 col-md-8">
                  <p class="text-light">{{ __('No esperes más para ser parte de este increíble proyecto. Empieza hoy mismo a transformar tu vida y la de quienes te rodean. Inscríbete, construye tu red y logra la libertad financiera que siempre has deseado.') }}</p>
              </div>
          </div>

          <!-- Button -->
          <div class="row justify-content-center mt-3">
              <div class="col-auto">
                  <a href="{{ url('membership') }}" class="btn btn-sm btn-primary">{{ __('Únete ahora') }}</a>
              </div>
          </div>
      </div>


    </div>
  </section>
@endsection
