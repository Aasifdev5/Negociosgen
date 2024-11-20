@extends('master')
@section('title')
Recursos
@endsection
@section('content')
<section style="padding: 80px 0; background: #1a1a1a">
    <div class="container mt-5">
        <!-- Title Section -->
        <h1 class="text-center text-light mb-4">Elige tu recurso y <span class="text-primary">Aumenta tus Ganancias</span></h1>

        <div class="row mb-4">
            <div class="col-sm-3 mb-3">

                <form action="/search" method="GET" style="">
                    <div class="input-group" style="position: relative; display: flex; align-items: center;">
                      <input type="text" name="query" class="form-control" placeholder="Buscar con palabras claves" style="width: 100%; background-color: ; border-radius: 8px; border: 1px solid #333; padding-left: 40px; height: 39px; color: #8F8F8F; font-size: 16px;">
                      <img class="search-icon" alt="Buscar" src="{{ asset('assets/search.svg') }}" style="position: absolute; left: 12px; width: 20px; height: 20px; filter: brightness(0.8);">
                    </div>
                  </form>
            </div>
            <div class="col-sm-3 mb-3">
                <select name="filter" class="form-select" aria-label="Filtrar">
                    <option value="" selected>Todos</option>
                    <option value="option1">Opción 1</option>
                    <option value="option2">Opción 2</option>
                    <option value="option3">Opción 3</option>
                </select>
            </div>
            <div class="col-sm-6 text-end mb-3">
                <button type="button" class="btn btn-sm btn-primary">Ver Estadísticas</button>
            </div>
        </div>

        <h1 class="text-light mb-3">Banners</h1>
        <!-- Banners Section -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <img src="{{ asset('assets/banner(6).png') }}" class="img-fluid" alt="Banner 1" data-bs-toggle="modal" data-bs-target="#bannerModal" onclick="setModalContent('banner(6).png')">
            </div>
            <div class="col-md-3 mb-3">
                <img src="{{ asset('assets/banner(7).png') }}" class="img-fluid" alt="Banner 2" data-bs-toggle="modal" data-bs-target="#bannerModal" onclick="setModalContent('banner(7).png')">
            </div>
            <div class="col-md-3 mb-3">
                <img src="{{ asset('assets/banner(8).png') }}" class="img-fluid" alt="Banner 3" data-bs-toggle="modal" data-bs-target="#bannerModal" onclick="setModalContent('banner(8).png')">
            </div>
            <div class="col-md-3 mb-3">
                <img src="{{ asset('assets/banner(9).png') }}" class="img-fluid" alt="Banner 4" data-bs-toggle="modal" data-bs-target="#bannerModal" onclick="setModalContent('banner(9).png')">
            </div>
        </div>
  <div class="container mt-4 d-flex justify-content-between align-items-start"
             style="background: #2E2E2E; border: 1px solid #2E2E2E; border-radius: 16px; padding: 16px;">
            <div class="col-sm-8 me-3">
                <h3 class="text-light">Enlace para referidos</h3>
                <input type="text" id="referralLink" class="form-control bg-dark text-white"
               value="https://prueba.negociosgen.com/signup?{{ $user_session->id }}" readonly>
        <button id="copyButton" class="btn btn-outline-primary mt-2"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Copiado!">
            Copiar enlace
        </button>
            </div>
            <div class="col-sm-4 mt-3">
                <img src="{{ asset('assets/barimage 24.png') }}" class="img-fluid" alt="QR Code">
            </div>
        </div>
       <!-- Referrals Section -->

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

<script>
    // Initialize Bootstrap tooltip
    const tooltipTrigger = document.querySelector('#copyButton');
    const tooltip = new bootstrap.Tooltip(tooltipTrigger);

    function copyToClipboard() {
        const referralLink = document.querySelector('#referralLink');
        if (referralLink) {
            navigator.clipboard.writeText(referralLink.value)
                .then(() => {
                    // Show the tooltip manually
                    tooltip.show();

                    // Hide the tooltip after 2 seconds
                    setTimeout(() => {
                        tooltip.hide();
                    }, 2000);
                })
                .catch(err => console.error("Error al copiar el enlace", err));
        }
    }

    // Attach the copy function to the button
    tooltipTrigger.addEventListener('click', copyToClipboard);
</script>

        <!-- Post Section (Working Carousel) -->
        <div class="resource-section mt-4">
            <h5 class="text-light">Post</h5>
            <div id="postCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-12 col-md-3 mb-3">
                                <img src="{{ asset('assets/post(10).png') }}" class="d-block w-100" alt="Post 1">
                            </div>
                            <div class="col-12 col-md-3 mb-3">
                                <img src="{{ asset('assets/post(11).png') }}" class="d-block w-100" alt="Post 2">
                            </div>
                            <div class="col-12 col-md-3 mb-3">
                                <img src="{{ asset('assets/post12.png') }}" class="d-block w-100" alt="Post 3">
                            </div>
                            <div class="col-12 col-md-3 mb-3">
                                <img src="{{ asset('assets/post13.png') }}" class="d-block w-100" alt="Post 4">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-12 col-md-3 mb-3">
                                <img src="{{ asset('assets/post(11).png') }}" class="d-block w-100" alt="Post 5">
                            </div>
                            <div class="col-12 col-md-3 mb-3">
                                <img src="{{ asset('assets/post13.png') }}" class="d-block w-100" alt="Post 6">
                            </div>
                            <div class="col-12 col-md-3 mb-3">
                                <img src="{{ asset('assets/post12.png') }}" class="d-block w-100" alt="Post 7">
                            </div>
                            <div class="col-12 col-md-3 mb-3">
                                <img src="{{ asset('assets/post(10).png') }}" class="d-block w-100" alt="Post 8">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#postCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#postCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Mailing Section (New Carousel) -->
        <div class="resource-section mt-4">
            <h5 class="text-light">Mailing</h5>
            <div id="mailingCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 mb-3">
                                <div class="card">
                                    <img src="{{ asset('assets/mail(14).png') }}" class="card-img-top" alt="Mailing 1">
                                    <div class="card-body">
                                        <h5 class="card-title">Email Marketing</h5>
                                        <p class="card-text">Maximize your reach with effective email marketing tactics.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3">
                                <div class="card">
                                    <img src="{{ asset('assets/mail(15).png') }}" class="card-img-top" alt="Mailing 2">
                                    <div class="card-body">
                                        <h5 class="card-title">Social Media Marketing</h5>
                                        <p class="card-text">Leverage social media for your marketing campaigns.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 mb-3">
                                <div class="card">
                                    <img src="{{ asset('assets/mail(15).png') }}" class="card-img-top" alt="Mailing 3">
                                    <div class="card-body">
                                        <h5 class="card-title">Newsletter Campaigns</h5>
                                        <p class="card-text">Engage your audience with well-designed newsletters.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mb-3">
                                <div class="card">
                                    <img src="{{ asset('assets/mail(14).png') }}" class="card-img-top" alt="Mailing 4">
                                    <div class="card-body">
                                        <h5 class="card-title">Automated Emails</h5>
                                        <p class="card-text">Automate your email marketing for better efficiency.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#mailingCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mailingCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Videos Tutoriales Section -->
        <div class="resource-section">
            <h5 class="text-light">Videos Tutoriales</h5>
            <div class="container">
              <div class="row">
                  <div class="col-lg-3 col-md-6 col-6" style="padding-bottom: 10px;">
                      <div class="video-container">
                          <div class="gradient-overlay"></div>
                          <img src="v1.png" class="thumbnail" alt="Video Thumbnail" />
                          <span class="play-button"><img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" /></span>
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
                          <img src="v2.png" class="thumbnail" alt="Video Thumbnail" />
                          <span class="play-button"><img src="{{ asset('assets/') }}Play (1).svg" alt="Play Button" /></span>
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
                          <img src="v3.png" class="thumbnail" alt="Video Thumbnail" />
                          <span class="play-button"><img src="{{ asset('assets/') }}Play (1).svg" alt="Play Button" /></span>
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
                          <img src="v4.png" class="thumbnail" alt="Video Thumbnail" />
                          <span class="play-button"><img src="{{ asset('assets/Play (1).svg') }}" alt="Play Button" /></span>
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
          </div>

          <!-- Articulos Tutoriales Section -->
          <div class="resource-section">
            <h5 class="text-light">Artículos Tutoriales</h5>
            <div class="row">
              <!-- Blog Post 1 -->
              <div class="col-lg-4 col-12 mb-4">
                  <div class="card image-parent h-100 transparent-card">
                      <a href="blogdetail.html"><img src="{{ asset('assets/blogpic.png') }}" class="image-icon card-img-top" alt="Blog Image"></a>
                      <div class="card-body stack">
                         <a href="blogdetail.html"><h5 class="card-title fw-bold ttulo-del-blog">Card title</h5></a>
                          <p class="card-text estamos-dedicados-a">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer</p>
                      </div>
                      <div class="card-footer bg-transparent frame-parent">
                         Last updated 3 mins ago
                      </div>
                  </div>
              </div>

              <!-- Blog Post 2 -->
              <div class="col-lg-4 col-12 mb-4">
                  <div class="card image-parent h-100 transparent-card">
                      <img src="{{ asset('assets/blogpic.png') }}" class="image-icon card-img-top" alt="Blog Image">
                      <div class="card-body stack">
                          <h5 class="card-title fw-bold ttulo-del-blog">Card title</h5>
                          <p class="card-text estamos-dedicados-a">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer</p>
                      </div>
                      <div class="card-footer bg-transparent frame-parent">
                         Last updated 3 mins ago
                      </div>
                  </div>
              </div>

              <!-- Blog Post 3 -->
              <div class="col-lg-4 col-12 mb-4">
                  <div class="card image-parent h-100 transparent-card">
                      <img src="{{ asset('assets/blogpic.png') }}" class="image-icon card-img-top" alt="Blog Image">
                      <div class="card-body stack">
                          <h5 class="card-title fw-bold ttulo-del-blog">Card title</h5>
                          <p class="card-text estamos-dedicados-a">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer</p>
                      </div>
                      <div class="card-footer bg-transparent frame-parent">
                         Last updated 3 mins ago
                      </div>
                  </div>
              </div>


          </div>
          </div>
    </div>
</section>



    <div class="modal fade" id="bannerModal" tabindex="-1" aria-labelledby="bannerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #0A0A0A; color: #ededed;">
                <div class="modal-header" style="border: none;">
                    <h5 class="modal-title banner-de-marketing text-light" id="bannerModalLabel">Banner de Marketing</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="" id="modalImage" class="image-icon" alt="Banner">
                    <div class="button-parent mt-3 d-flex justify-content-center gap-3">
                        <button class="btn btn-outline-primary button1">
                            <b>Compartir</b>
                        </button>
                        <button class="btn btn-primary button1">
                            <b>Descargar</b>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
