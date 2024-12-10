@extends('master')
@section('title')
{{ __('Affiliated Companies') }}
@endsection
@section('content')
<section style="padding: 20px 0;background: #1A1A1A;">
<div class="container py-5">
    <!-- Affiliated Companies Section -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-light">Affiliated Companies</h2>
        <p class="lead" style="color: #A1A1A1;">
            To receive discounts or benefits from GEN-affiliated companies, open the GEN website, log into the members' area, and show the company representative that your account is active (if you do not yet have your GEN card). Don’t forget to bring an ID to confirm your details.
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
                        <img class="img-fluid mb-2" src="{{ asset($row->thumbnail) }}" alt="UFC Gym Image"
                            style="max-width: 100px; height: 100px; object-fit: contain;">
                        <div class="fw-bold text-light">{{ $row->name }}</div>
                        <div class="" style="color: #A1A1A1;">({{ $row->address }})</div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </section>

    <!-- Call to Action Button -->
    <div class="text-center">
        <a href="{{ url('membership') }}" class="btn btn-primary btn-lg">Join Now</a>
    </div>
</div>
</section>
@endsection
