@extends('master')
@section('title')
Blog
@endsection
@section('content')
<section style="padding: 90px 0;background: #1A1A1A;">
    <div class="container my-5">
        <h1 class="text-center" style="color: #ededed;">El blog de <span style="color: #0090ff;">GEN</span></h1>
        <form action="/search" method="GET" style="width: 100%; max-width: 600px; margin: auto;">
            <div class="input-group" style="position: relative; display: flex; align-items: center;">
              <input type="text" name="query" class="form-control" placeholder="Buscar con palabras claves" style="width: 100%; background-color: ; border-radius: 8px; border: 1px solid #333; padding-left: 40px; height: 48px; color: #8F8F8F; font-size: 16px;">
              <img class="search-icon" alt="Buscar" src="{{asset('assets/search.svg')}}" style="position: absolute; left: 12px; width: 20px; height: 20px; filter: brightness(0.8);">
            </div>
          </form>

          <style>
            /* Responsive design */
            form {
              width: 100%;
            }

            .form-control {
              transition: border-color 0.3s ease, box-shadow 0.3s ease;
            }

            /* On focus */
            .form-control:focus {
              border-color: #4a90e2;
              outline: none;
              box-shadow: 0 0 8px rgba(74, 144, 226, 0.8);
            }

            /* Hover effect for the input */
            .form-control:hover {
              border-color: #4a4a4a;
            }

            /* Mobile adjustments */
            @media (max-width: 768px) {
              .form-control {
                font-size: 14px;
                height: 40px;
                padding-left: 36px;
              }
              .search-icon {
                width: 18px;
                height: 18px;
              }
            }
          </style>




          <div class="container my-4">
            <div class="row">
                <!-- Blog Post 1 -->
                <div class="col-lg-4 col-12 mb-4">
                    <div class="card image-parent h-100 transparent-card">
                        <a href="{{ url('blog_detail/1') }}"><img src="{{asset('assets/blogpic.png')}}" class="image-icon card-img-top" alt="Blog Image"></a>
                        <div class="card-body stack">
                           <a href="{{ url('blog_detail/1') }}"><h5 class="card-title fw-bold ttulo-del-blog">Título del Blog</h5></a>
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

                <!-- Blog Post 4 -->
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
                <!-- Blog Post 4 -->
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
                <!-- Blog Post 4 -->
                <div class="col-lg-4 col-12 mb-4">
                    <div class="card image-parent h-100 transparent-card">
                        <img src="{{asset('assets/blogpic.png')}}" class="image-icon card-img-top" alt="Blog Image">
                        <div class="card-body stack">
                            <h5 class="card-title fw-bold ttulo-del-blog">Título del Blog</h5>
                            <p class="card-text estamos-dedicados-a">Estamos dedicados a apoyar a nuestros miembros en su camino hacia el éxito.</p>
                        </div>
                        <div class="card-footer  bg-transparent frame-parent">
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

           <!-- Pagination -->
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center">
    <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
    <li class="page-item"><a class="page-link active" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
</ul>
</nav>
        </div>

        <!-- CSS Styles -->
        <style>
            .card-footer {
border: none; /* Remove the border */
}

             .pagination .page-link {
    color: #000; /* Default link color */
}

.pagination .page-item .active .page-link {
    background-color: #0090FF; /* Active page background color */
    color: #000; /* Active page text color */
}

.pagination .page-link:hover {
    background-color: rgba(0, 144, 255, 0.1); /* Optional: Light hover effect */
}
        .image-icon {
            align-self: stretch;
            position: relative;
            border-radius: 12px;
            max-width: 100%;
            overflow: hidden;
            height: 199px;
            flex-shrink: 0;
            object-fit: cover;
        }
        .educacin-financiera-para {
            align-self: stretch;
            position: relative;
        }
        .estamos-dedicados-a {
            align-self: stretch;
            position: relative;
            font-size: 16px;
            line-height: 24px;

            color: #a1a1a1;
        }
        .stack {
            align-self: stretch;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            padding: 0px 8px;
            gap: 8px;
        }
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
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            gap: 24px;
            font-size: 16px;
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
        }
        .transparent-card {
            background-color: rgba(26, 26, 26, 0.7); /* Adjust the alpha value for transparency */
            border: 1px solid rgba(46, 46, 46, 0.5); /* Optional: Semi-transparent border */
        }
        .transparent-card .card-body,
        .transparent-card .card-footer {
            background-color: transparent; /* Ensure the card body and footer are transparent */
        }
        </style>



    </div>


    </section>
@endsection
