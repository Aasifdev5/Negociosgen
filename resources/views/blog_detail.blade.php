@extends('master')
@section('title')
 {{ __('Blog Details') }}
@endsection
@section('content')
<style>
    .transparent-card {
                background-color: rgba(26, 26, 26, 0.7); /* Adjust the alpha value for transparency */
                border: 1px solid rgba(46, 46, 46, 0.5); /* Optional: Semi-transparent border */
            }
    .transparent-card .card-body,
            .transparent-card .card-footer {
                background-color: transparent; /* Ensure the card body and footer are transparent */
            }
            .image-parent {
                width: 100%;
                position: relative;
                border-radius: 8px;
                /* border: 1px solid #2e2e2e; */
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                justify-content: flex-start;
                padding: 24px 16px;
                gap: 16px;
                text-align: left;
                font-size: 20px;
                color: #ededed;
                font-family: 'Space Grotesk';
            } .card-footer {
    border: none; /* Remove the border */
}
   </style>
<section style="padding: 90px 0; background: #1a1a1a">
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
                Educación financiera para <br />
                principiantes
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
              Todo lo que necesitas saber" Resumen: Explicar la importancia de
              la educación financiera, qué es, y por qué es clave para
              alcanzar la estabilidad económica. Podrías abordar temas como
              presupuestos, ahorro, deuda y cómo manejar las finanzas
              personales.
            </p>

            <!-- Button -->
           <div class="col-sm-3">
              <div class="card-footer bg-transparent frame-parent" style=" border-radius: 9px;
              border: 1px solid #2e2e2e;
              box-sizing: border-box;">
                <div class="heart-parent">
                  <img class="heart-icon" src="{{asset('assets/heart.svg')}}" alt="Likes" />
                  <span class="div">12</span>
                </div>
                <div class="heart-parent">
                  <img
                    class="heart-icon"
                    src="{{asset('assets/Message square.svg')}}"
                    alt="Comments"
                  />
                  <span class="div">4</span>
                </div>
              </div>
           </div>

          </div>
          <style>
            .heart-icon {
              width: 24px;
              position: relative;
              height: 24px;
              overflow: hidden;
              flex-shrink: 0;
            }
            .div {
              position: relative;
              line-height: 150%;
            }
            .heart-parent {
              display: flex;
              flex-direction: row;
              align-items: center;
              justify-content: flex-start;
              gap: 8px;
            }
            .frame-parent {
              position: relative;

              display: flex;
              flex-direction: row;
              align-items: center;
              justify-content: flex-start;
              padding: 24px 16px;
              gap: 24px;
              font-size: 16px;
              color: #ededed;
              font-family: "Space Grotesk";
            }
          </style>
          <!-- Image Column -->
          <div class="col-lg-6 col-md-12 order-1 order-md-2">
            <img
              class="img-fluid rounded-3"
              src="{{asset('assets/blogpic.png')}}"
              alt="Placeholder Image"
              style="padding-top: 20px; width: 100%; height: auto"
            />
          </div>
        </div>
      </div>
    </div>
  </section>
  <section style="padding: 20px 0; background: #0A0A0A;">
      <div class="container my-4">
          <div class="row">
              <div class="col-lg-9 col-md-12 col-sm-12 col-12 mb-4 p-4" style="background: #000; border: 1px solid #A1A1A1; border-radius: 16px; padding-left: 15px; padding-right: 15px;">
                  <div class="text-white">
                      <div class="cmo-hacer-un-presupuesto-pers-parent mt-4">
                          <h1 class="cmo-hacer-un p-2">Cómo hacer un presupuesto personal</h1>
                          <div class="ensear-a-los-container p-3 mb-3 rounded">
                              <p class="ensear-a-los">Enseñar a los lectores a organizar sus ingresos y gastos mensuales para que sepan exactamente a dónde va su dinero y cómo pueden ahorrar.</p>
                              <ul class="qu-es-un-presupuesto-y-por-qu">
                                  <li>¿Qué es un presupuesto y por qué necesitas uno?</li>
                                  <li>Herramientas y métodos para hacer un presupuesto (hojas de cálculo, apps)</li>
                                  <li>Cómo categorizar tus gastos</li>
                                  <li>Consejos para cumplir con tu presupuesto</li>
                              </ul>
                          </div>
                          <h1 class="cmo-hacer-un p-2">Diferencia entre activos y pasivos</h1>
                          <div class="explicar-de-forma-container p-3 mb-3 rounded">
                              <p class="ensear-a-los">Explicar de forma sencilla qué son los activos y los pasivos, y por qué es fundamental entender esta diferencia para mejorar las finanzas.</p>
                              <ul class="qu-es-un-presupuesto-y-por-qu">
                                  <li>¿Qué es un activo?</li>
                                  <li>¿Qué es un pasivo?</li>
                                  <li>Ejemplos de activos y pasivos comunes</li>
                                  <li>Cómo enfocarte en adquirir más activos que pasivos</li>
                              </ul>
                          </div>
                          <h1 class="cmo-hacer-un p-2">Consejos para ahorrar</h1>
                          <div class="maneras-efectivas-de-container p-3 mb-3 rounded">
                              <p class="ensear-a-los">10 maneras efectivas de ahorrar dinero cada mes. Resumen: Proporcionar estrategias prácticas y fáciles de aplicar para ayudar a los lectores a ahorrar más dinero cada mes.</p>
                              <ul class="qu-es-un-presupuesto-y-por-qu">
                                  <li>Automatiza tus ahorros</li>
                                  <li>Reduce gastos innecesarios</li>
                                  <li>Establece metas de ahorro a corto y largo plazo</li>
                                  <li>Aprovecha las ofertas y descuentos</li>
                              </ul>
                          </div>
                      </div>

                      <div class="badges mt-4 d-flex align-items-center">
                          <img class="heart-icon me-2" alt="Me gusta" src="{{asset('assets/heart.svg')}}">
                          <div class="badges1">Me gusta</div>
                      </div>

                      <div class="textarea mt-4">
                          <label class="label text-white">Nuevo comentario</label>
                          <div class="content mt-2">
                              <textarea class="form-control" rows="5" placeholder="Escribe tu comentario" style="padding: 10px;"></textarea>
                          </div>
                      </div>

                      <div class="content1 mt-4 d-flex align-items-start">
                          <img class="frame-inner me-2" alt="Usuario 2" src="{{asset('assets/Ellipse 1.svg')}}" class="img-fluid" style="width: 40px; height: 40px;">
                          <div class="write-a-message p-2 rounded bg-light text-dark">
                              Muy bueno el contenido del blog
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-lg-3 col-md-12 col-sm-12 col-12 mb-4">
                  <div class="sidebar">
                      <div class="lo-ms-ledo-wrapper">
                          <h3 class="text-light">Lo más leído</h3>
                          <hr>
                      </div>

                      <!-- Blog Post 1 -->
                      <div class="col-lg-12 col-md-6 col-12 mb-4">
                          <div class="card h-100 image-parent h-100 transparent-card">
                              <img class="card-img-top" alt="Blog Image" src="{{asset('assets/blogpic.png')}}">
                              <div class="card-body">
                                  <b class="ttulo-del-blog">Título del Blog</b>
                                  <p class="estamos-dedicados-a">Estamos dedicados a apoyar a nuestros miembros en su camino hacia el éxito.</p>
                              </div>
                              <div class="card-footer bg-transparent frame-parent">
                                  <div class="heart-parent">
                                      <img class="heart-icon" src="{{asset('assets/heart.svg')}}" alt="Likes">
                                      <span class="div">12</span>
                                  </div>
                                  <div class="heart-parent">
                                      <img class="heart-icon" src="{{asset('assets/Message square.svg')}}" alt="Comments">
                                      <span class="div">4</span>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Blog Post 2 -->
                      <div class="col-lg-12 col-md-6 col-12 mb-4">
                          <div class="card h-100 image-parent transparent-card">
                              <img class="card-img-top" alt="Blog Image" src="{{asset('assets/blogpic.png')}}">
                              <div class="card-body">
                                  <b class="ttulo-del-blog">Título del Blog</b>
                                  <p class="estamos-dedicados-a">Estamos dedicados a apoyar a nuestros miembros en su camino hacia el éxito.</p>
                              </div>
                              <div class="card-footer bg-transparent frame-parent d-flex justify-content-between">
                                  <div class="d-flex align-items-center">
                                      <img class="facebooklogo-icon me-2" alt="" src="{{asset('assets/heart.svg')}}">
                                      <div class="facebook">12</div>
                                  </div>
                                  <div class="d-flex align-items-center">
                                      <img class="facebooklogo-icon me-2" alt="" src="{{asset('assets/Message square.svg')}}">
                                      <div class="facebook">4</div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <h1 class="text-light">Continúa leyendo:</h1>

          <div class="row">
              <!-- Blog Post 1 -->
              <div class="col-lg-4 col-12 mb-4">
                  <div class="card image-parent h-100 transparent-card">
                      <img src="{{asset('assets/blogpic.png')}}" class="image-icon card-img-top" alt="Blog Image">
                      <div class="card-body stack">
                          <h5 class="card-title fw-bold ttulo-del-blog">Título del Blog</h5>
                          <p class="card-text estamos-dedicados-a">Estamos dedicados a apoyar a nuestros miembros en su camino hacia el éxito.</p>
                      </div>
                      <div class="card-footer bg-transparent frame-parent">
                          <div class="heart-parent">
                              <img class="heart-icon" src="{{asset('assets/heart.svg')}}" alt="Likes">
                              <span class="div">12</span>
                          </div>
                          <div class="heart-parent">
                              <img class="heart-icon" src="{{asset('assets/Message square.svg')}}" alt="Comments">
                              <span class="div">4</span>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Blog Post 2 -->
              <div class="col-lg-4 col-12 mb-4">
                  <div class="card image-parent h-100 transparent-card">
                      <img src="{{asset('assets/blogpic.png')}}" class="image-icon card-img-top" alt="Blog Image">
                      <div class="card-body stack">
                          <h5 class="card-title fw-bold ttulo-del-blog">Título del Blog</h5>
                          <p class="card-text estamos-dedicados-a">Estamos dedicados a apoyar a nuestros miembros en su camino hacia el éxito.</p>
                      </div>
                      <div class="card-footer bg-transparent frame-parent">
                          <div class="heart-parent">
                              <img class="heart-icon" src="{{asset('assets/heart.svg')}}" alt="Likes">
                              <span class="div">12</span>
                          </div>
                          <div class="heart-parent">
                              <img class="heart-icon" src="{{asset('assets/Message square.svg')}}" alt="Comments">
                              <span class="div">4</span>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Blog Post 3 -->
              <div class="col-lg-4 col-12 mb-4">
                  <div class="card image-parent h-100 transparent-card">
                      <img src="{{asset('assets/blogpic.png')}}" class="image-icon card-img-top" alt="Blog Image">
                      <div class="card-body stack">
                          <h5 class="card-title fw-bold ttulo-del-blog">Título del Blog</h5>
                          <p class="card-text estamos-dedicados-a">Estamos dedicados a apoyar a nuestros miembros en su camino hacia el éxito.</p>
                      </div>
                      <div class="card-footer bg-transparent frame-parent">
                          <div class="heart-parent">
                              <img class="heart-icon" src="{{asset('assets/heart.svg')}}" alt="Likes">
                              <span class="div">12</span>
                          </div>
                          <div class="heart-parent">
                              <img class="heart-icon" src="{{asset('assets/Message square.svg')}}" alt="Comments">
                              <span class="div">4</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection
