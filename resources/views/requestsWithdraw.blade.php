@extends('master')

@section('title')
    {{ __('solicitud de retiro') }}
@endsection

@section('content')
<section style="padding: 105px 0; background: #000;">
    <div class="container">
        <!-- Success Message -->
        @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p> <!-- Fixed capitalization of `Session` -->
        </div>
        @endif

        <!-- Error Message -->
        @if(Session::has('fail'))
        <div class="alert alert-danger">
            <p>{{ Session::get('fail') }}</p> <!-- Fixed capitalization of `Session` -->
        </div>
        @endif

        <div class="row">
            <!-- Left Section: Payment Method -->
            <div class="col-lg-6 mb-4">
                <div class="container" style="background: #000; padding: 20px; border: 1px solid #000; border-radius: 16px;">
                    <div class="mb-4">
                        <h2 class="text-light">{{ __('solicitud de retiro') }}</h2>
                        <h2 class="text-light text-right">{{ __('Comisión disponible') }} {{ \App\Models\User::where('id', $user_session->id)->first()->balance }}</h2>
                        <!-- QR Code Section -->
                        <div class="">
                            <form action="{{ route('requestWithdrawal') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user_session->id }}">

                                <div class="mb-3">
                                    <label for="amount" class="text-light form-label">{{ __('Monto') }}</label>
                                    <input type="text" class="form-control" id="amount" name="amount">
                                </div>

                                <button class="btn btn-primary btn-sm pull-right" type="submit">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
