@extends('master')
@section('title')
{{ __('Who We Are') }}
@endsection
@section('content')
@php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
    @endphp
    <section style="padding: 20px 0;background: #1A1A1A;">
<div class="container py-5 ">
    <!-- Who We Are Section -->
    <div class="text-center pt-5 mb-5">
        <img src="<?php echo '/' . $general_setting['app_footer_payment_image'] ?? ''; ?>" alt="GEN Logo" class="img-fluid mb-3" width="200px" height="200px" style="max-width: 200px;">
        <h1 class="fw-bold text-light">Who We Are</h1>
        <p class="lead" style="color: #A1A1A1;">
            GEN, Specialized Business Group, is a company dedicated to financial education, motivation, and personal growth.
            Our commitment is to provide high-value services, helping individuals achieve their goals and transform their lives.
            With a focus on tangible results, we are here to guide you toward mental, physical, spiritual, and financial freedom.
        </p>
    </div>

    <!-- Mission Section -->
    <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="text-light fw-bold">Mission</h2>
            <p style="color: #A1A1A1;">
                In a complex world, our goal is to guide individuals out of their comfort zones, driving them toward personal growth and fostering
                positive mindset changes to grow as people, develop constructive habits, and create a free and prosperous community.
            </p>
            <p style="color: #A1A1A1;">
                We do this through courses, talks, coaching, and training. Additionally, we offer the opportunity to generate a solid income source,
                enabling individuals to achieve their goals and thrive in various areas of life. Our mission is to transform lives and inspire positive
                changes in our society.
            </p>
        </div>
    </div>

    <!-- Vision Section -->
    <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="text-light fw-bold">Vision</h2>
            <p style="color: #A1A1A1;">
                To inspire, educate, and promote societal change, improving the quality of life for countless families.
            </p>
        </div>
    </div>

    <!-- Values Section -->
    <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="text-light fw-bold">Values</h2>
            <p style="color: #A1A1A1;">
                Commitment, cooperation, motivation, and social responsibility.
            </p>
        </div>
    </div>

    <!-- Social Responsibility Section -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-6">
            <h2 class="text-light fw-bold">Social Responsibility</h2>
            <p style="color: #A1A1A1;">
                <i class="bi bi-heart-fill text-danger"></i> Part of GEN's profits will be donated quarterly to various organizations, social projects, and areas in need within our society.
            </p>
        </div>
        <div class="col-md-6 text-center">
            <i class="fas fa-users fa-5x text-primary"></i> <!-- Example font icon (Users icon) -->
        </div>

    </div>

    <!-- Call to Action -->
    <div class="text-center">
        <p class="lead" style="color: #A1A1A1;">Join us in this life-changing project, paving the way toward financial freedom and helping to build a better world.</p>
        <a href="{{ url('membership') }}" class="btn btn-primary btn-lg">Join Now</a>
    </div>
</div>
    </section>
@endsection
