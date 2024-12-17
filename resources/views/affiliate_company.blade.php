@extends('master')
@section('title')
{{ __('Empresas Afiliadas') }}
@endsection
@section('content')
<section style="padding: 20px 0;background: #1A1A1A;">

<div class="container py-5">
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
    <!-- Empresas Afiliadas Section -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-light">{{ __('Empresas Afiliadas') }}</h2>
        <p class="lead" style="color: #A1A1A1;">
            Para recibir descuentos o beneficios de las empresas afiliadas a GEN, abre el sitio web de GEN, ingresa al área de miembros y muestra al representante de la empresa que tu cuenta está activa (si aún no tienes tu tarjeta GEN). No olvides llevar una identificación para confirmar tus datos.
        </p>
    </div>

    <section style="padding: 20px 0;background: #1A1A1A;">
        <div class="container">
            <h1 style="padding-top: 5px;color: #ffff;">{{ __('Nuestros Aliados') }}</h1>
            <p style="color: #A1A1A1;">{{ __('También disfrutarás de descuentos en una amplia variedad de negocios asociados a nivel nacional e internacional.') }}</p>
            <div class="row g-4">
                @foreach ($brands as $row)
                <div class="col-lg-4 col-md-4 col-sm-12 text-center p-3">
                    <div style="border: 1px solid #2e2e2e; padding: 10px; border-radius: 12px;">
                        <img class="img-fluid mb-2" src="{{ asset($row->thumbnail) }}" alt="Imagen de UFC Gym"
                            style="max-width: 100px; height: 100px; object-fit: contain;">
                        <div class="fw-bold text-light">{{ $row->name }}</div>
                        <div class="" style="color: #A1A1A1;">({{ $row->address }})</div>
                    </div>
                </div>

                @endforeach

            </div>
            <nav class="pagination justify-content-center">
                @include('admin.pagination', ['paginator' => $brands])

            </nav>
        </div>
    </section>

    <!-- Call to Action Button -->
    <div class="text-center">
        <a href="{{ url('membership') }}" class="btn btn-primary btn-lg">{{ __('Únete ahora') }}</a>
    </div>
</div>
</section>
@endsection
