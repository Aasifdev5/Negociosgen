@extends('master')
@section('title')
Bienvenida
@endsection
@section('content')
<section style="padding: 180px 0; background: #1a1a1a">
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
            <h4 class="text-light">@if ($user_session)
                {{ $user_session->name }}
            @endif Bienvenido a la plataforma</h4>
            <img
              class="img-fluid my-3"
              src="{{ asset('assets/Rectangle 175.png') }}"
              alt="Welcome Image"
            />
            <div class="d-grid gap-2">
              <a href="{{ url('dashboard') }}" class="btn btn-primary" id="frameContainer">
                Empezar
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
