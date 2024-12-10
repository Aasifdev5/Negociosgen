@extends('master')
@section('title')
    {{ __('GEN Cards') }}
@endsection
@section('content')
<br>
<section class="container py-5" style="background-color: #f8f9fa;">
    <div class="text-center mb-5">
        <h2 class="fw-bold">GEN Cards</h2>
        <p class="lead text-muted">
            Choose from GEN CLASSIC, VIP, GOLD, or PLATINUM cards with unique benefits.
        </p>

    </div>

    <!-- Card Options Section -->
    <div class="row">
        <!-- GEN CLASSIC Card -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                <div class="card-body text-center">
                    <h4 class="card-title text-primary fw-bold">GEN CLASSIC</h4>
                    <p class="card-text">One-year access to courses, virtual coaching, and more.</p>
                    <a href="{{ url('payment_link_for_gen_classic') }}" class="btn btn-primary w-100">Payment Link</a>
                </div>
            </div>
        </div>

        <!-- GEN VIP Card -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                <div class="card-body text-center">
                    <h4 class="card-title text-warning fw-bold">GEN VIP</h4>
                    <p class="card-text">Access to courses, live events, and exclusive benefits.</p>
                    <a href="{{ url('payment_link_for_gen_vip') }}" class="btn btn-warning w-100">Payment Link</a>
                </div>
            </div>
        </div>

        <!-- GEN GOLD Card -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                <div class="card-body text-center">
                    <h4 class="card-title text-warning fw-bold">GEN GOLD</h4>
                    <p class="card-text">One-year access to courses, virtual coaching, and live coaching.</p>
                    <a href="{{ url('payment_link_for_gen_gold') }}" class="btn btn-warning w-100">Payment Link</a>
                </div>
            </div>
        </div>

        <!-- GEN PLATINUM Card -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-light rounded" style="background-color: #000; color: white;">
                <div class="card-body text-center">
                    <h4 class="card-title text-success fw-bold">GEN PLATINUM</h4>
                    <p class="card-text">Two-year access to courses, virtual coaching, live coaching, and more.</p>
                    <a href="{{ url('payment_link_for_gen_platinum') }}" class="btn btn-success w-100">Payment Link</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
