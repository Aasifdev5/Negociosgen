@extends('master')
@section('title')
    {{ __('Membresías') }}
@endsection
@section('content')
    @php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
        $memberships = \App\Models\Membership::all();
    @endphp

    <section style="padding: 40px 0; background: #000;">
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

            <!-- Únete ahora Section -->
            <div class="text-center mb-5">
                <img src="<?php echo '/' . $general_setting['app_footer_payment_image'] ?? ''; ?>" alt="GEN Banner" class="img-fluid mb-4" width="200px" height="200px" style="max-width: 100%; border-radius: 10px;">
                <h2 class="fw-bold text-light">{{ __('Únete ahora') }}</h2>
                <p class="lead" style="color: #A1A1A1;">
                    {{ __('Elige entre varias membresías dentro de GEN. Explora los beneficios de cada una y selecciona la que mejor se adapte a tus necesidades.') }}
                </p>
            </div>

            <!-- Membership Options Section -->
            <div class="row mb-5">
                @foreach($memberships as $membership)
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm border-light rounded" style="background-color: #111; color: white; height: 100%; transition: all 0.3s ease-in-out;">
                            <div class="card-body text-center">
                                <h4 class="card-title" style="color: {{ $membership->highlight_color }}">{{ $membership->name }}</h4>
                                <p class="card-text text-light">{{ $membership->price }} Bs.</p>
                                <ul class="list-unstyled text-left" style="color: #ddd; padding-left: 0;">
                                    @foreach($membership->benefits as $benefit)
                                        <li><i class="fas fa-check-circle" style="color: {{ $membership->highlight_color }}"></i> {{ $benefit }}</li>
                                    @endforeach
                                </ul>
                                <form action="{{ url('signup') }}" method="GET">
                                    <input type="hidden" name="refer" value="{{ $refer ?? '' }}">
                                    <input type="hidden" name="membership" value="{{ $membership->id }}">
                                    <button type="submit" class="btn btn-primary w-100">{{ __('Únete ahora') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
