@extends('master')
@section('title')
    {{ __('Renovación de Membresías') }}
@endsection
@section('content')
    @php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
        $memberships = \App\Models\Membership::all();
    @endphp
    <section style="padding: 40px 0; background: #000;">
        <div class="container py-5">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ session::get('success') }}</p>
                </div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">
                    <p>{{ session::get('fail') }}</p>
                </div>
            @endif

            <!-- Membership Options Section -->
            <div class="row mb-5">
                @foreach ($memberships as $membership)
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm border-light rounded"
                            style="background-color: #111; color: white; height: 100%; transition: all 0.3s ease-in-out;">
                            <div class="card-body text-center">
                                <h4 class="card-title" style="color: {{ $membership->highlight_color }}">
                                    {{ $membership->name }}</h4>
                                <p class="card-text text-light">{{ $membership->price }} Bs.</p>
                                <ul class="list-unstyled text-left" style="color: #ddd; padding-left: 0;">
                                    @foreach ($membership->benefits as $benefit)
                                        <li><i class="fas fa-check-circle"
                                                style="color: {{ $membership->highlight_color }}"></i> {{ $benefit }}
                                        </li>
                                    @endforeach
                                </ul>
                                <form action="{{ url('renew') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user_session->id }}">
                                    <input type="hidden" name="membership" value="{{ $membership->id }}">
                                    <button type="submit" class="btn btn-primary w-100">{{ __('Renovar Ahora') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
