@extends('master')
@section('title')
Bienvenida
@endsection
@section('content')
<section style="padding: 150px 0; background: #1a1a1a">
    <div class="container">
      <div
        class="container"
        style="
          background: #000;
          padding: 20px;
          border: 1px solid #000;
          border-radius: 16px;
        "
      >
        <div class="row justify-content-center">
          <div class="col-lg-6 col-12 text-center mb-4">
            <h4 class="text-light">Bienvenido a la plataforma</h4>
            <img
              class="img-fluid my-3"
              src="Rectangle 175.png"
              alt="Welcome Image"
            />
            <div class="d-grid gap-2">
              <a href="dashboardaffitiate.html" class="btn btn-primary" id="frameContainer">
                Empezar
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
