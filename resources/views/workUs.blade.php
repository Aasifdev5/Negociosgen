@extends('master')

@section('title')
{{ __('Work with Us') }}
@endsection

@section('content')
@php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
    @endphp
<section style="padding: 20px 0;background: #000;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card " style="background: #000">

                    <div class="card-body">
                        <div class="text-center pt-5 mb-5">
                            <img src="<?php echo '/' . $general_setting['app_footer_payment_image'] ?? ''; ?>" alt="GEN Logo" class="img-fluid mb-3" width="200px" height="200px" style="max-width: 200px;">
                            <h1 class="fw-bold text-light">Work with Us</h1>
                            <p class="lead" style="color: #A1A1A1;">
                                GEN, Specialized Business Group, is a company dedicated to financial education, motivation, and personal growth.
                                Our commitment is to provide high-value services, helping individuals achieve their goals and transform their lives.
                                With a focus on tangible results, we are here to guide you toward mental, physical, spiritual, and financial freedom.
                            </p>
                        </div>
                        <p class="lead  text-center" style="color: #A1A1A1;">
                            <strong>{{ __('Explore career opportunities and unlock potential with GEN!') }}</strong>
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="text-light">{{ __('What We Offer') }}</h3>
                                <ul style="color: #A1A1A1;">
                                    <li>Multi-level marketing opportunities</li>
                                    <li>Comprehensive training and development programs</li>
                                    <li>Networking benefits with industry professionals</li>
                                    <li>Flexible working hours and remote options</li>
                                    <li>Attractive compensation and rewards</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h3 class="text-light">{{ __('How to Get Started') }}</h3>
                                <p style="color: #A1A1A1;">To join our network and take advantage of these incredible opportunities, follow these simple steps:</p>
                                <ol style="color: #A1A1A1;">
                                    <li>Fill out the application form</li>
                                    <li>Attend our introductory session</li>
                                    <li>Start your journey with GEN!</li>
                                </ol>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ url('membership') }}" class="btn btn-primary btn-lg">{{ __('Únete ahora') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add some custom styling to enhance the design -->
    <style>
        .card-header {
            border-bottom: 2px solid #fff;
        }

        .card-body {
            font-size: 1.1rem;
        }

        .card-body ul, .card-body ol {
            font-size: 1rem;
            margin-left: 20px;
        }

        .btn-lg {
            padding: 15px 30px;
            font-size: 1.2rem;
        }

        .lead {
            font-size: 1.25rem;
        }
    </style>
</section>
@endsection
