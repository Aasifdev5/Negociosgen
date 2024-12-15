@extends('master')
@section('title')
    {{ __('Memberships') }}
@endsection
@section('content')
    @php
        $general_setting = \App\Models\Setting::pluck('option_value', 'option_key')->toArray();
    @endphp

    <section style="padding: 40px 0; background: #1A1A1A;">
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
            <!-- Join Now Section -->
            <div class="text-center mb-5">
                <img src="<?php echo '/' . $general_setting['app_footer_payment_image'] ?? ''; ?>" alt="GEN Banner" class="img-fluid mb-4" width="200px" height="200px" style="max-width: 100%; border-radius: 10px;">
                <h2 class="fw-bold text-light">Join Now</h2>
                <p class="lead" style="color: #A1A1A1;">
                    Choose from 4 memberships within GEN. Explore the benefits of each and select the one that best suits your needs.
                </p>
            </div>

            <!-- Membership Options Section -->
            <div class="row mb-5">
                <!-- GEN CLASSIC Member -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm border-light rounded" style="background-color: #111; color: white; height: 100%; transition: all 0.3s ease-in-out;">
                        <div class="card-body text-center">
                            <h4 class="card-title text-primary fw-bold">GEN CLASSIC Member</h4>
                            <p class="card-text text-light">1,000 Bs.</p>
                            <ul class="list-unstyled text-left" style="color: #ddd; padding-left: 0;">
                                <li><i class="fas fa-check-circle" style="color: #5bc0de;"></i> One-year access to courses and virtual coaching.</li>
                                <li><i class="fas fa-check-circle" style="color: #5bc0de;"></i> Access to training.</li>
                                <li><i class="fas fa-check-circle" style="color: #5bc0de;"></i> Discounts and benefits at national companies.</li>
                                <li><i class="fas fa-check-circle" style="color: #5bc0de;"></i> Support from leaders nationwide.</li>
                            </ul>
                            <form action="{{ url('signup') }}" method="GET">
                                <input type="hidden" name="refer" value="{{ $refer ?? '' }}">
                                <input type="hidden" name="membership" value="GEN_CLASSIC">
                                <button type="submit" class="btn btn-primary w-100">Join Now</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- GEN VIP Member -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm border-light rounded" style="background-color: #111; color: white; height: 100%; transition: all 0.3s ease-in-out;">
                        <div class="card-body text-center">
                            <h4 class="card-title text-warning fw-bold">GEN VIP Member</h4>
                            <p class="card-text text-light">3,000 Bs.</p>
                            <ul class="list-unstyled text-left" style="color: #ddd; padding-left: 0;">
                                <li><i class="fas fa-check-circle" style="color: #f0ad4e;"></i> One-year access to courses and virtual coaching.</li>
                                <li><i class="fas fa-check-circle" style="color: #f0ad4e;"></i> Access to training and live events (includes 1 guest).</li>
                                <li><i class="fas fa-check-circle" style="color: #f0ad4e;"></i> Reserved seating in front rows.</li>
                                <li><i class="fas fa-check-circle" style="color: #f0ad4e;"></i> Discounts and benefits at national and international companies.</li>
                                <li><i class="fas fa-check-circle" style="color: #f0ad4e;"></i> VIP GEN Membership Card with added benefits.</li>
                            </ul>
                            <form action="{{ url('signup') }}" method="GET">
                                <input type="hidden" name="refer" value="{{ $refer ?? '' }}">
                                <input type="hidden" name="membership" value="GEN_VIP">
                                <button type="submit" class="btn btn-warning w-100">Join Now</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- GEN GOLD Member -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm border-light rounded" style="background-color: #111; color: white; height: 100%; transition: all 0.3s ease-in-out;">
                        <div class="card-body text-center">
                            <h4 class="card-title text-warning fw-bold">GEN GOLD Member</h4>
                            <p class="card-text text-light">5,000 Bs.</p>
                            <ul class="list-unstyled text-left" style="color: #ddd; padding-left: 0;">
                                <li><i class="fas fa-check-circle" style="color: #f39c12;"></i> One-year access to courses, virtual coaching, and free access to live coaching (includes 2 guests).</li>
                                <li><i class="fas fa-check-circle" style="color: #f39c12;"></i> Access to training and live events (includes 2 guests).</li>
                                <li><i class="fas fa-check-circle" style="color: #f39c12;"></i> Personalized support from leaders nationwide and internationally.</li>
                                <li><i class="fas fa-check-circle" style="color: #f39c12;"></i> GOLD GEN Membership Card with additional benefits.</li>
                            </ul>
                            <form action="{{ url('signup') }}" method="GET">
                                <input type="hidden" name="refer" value="{{ $refer ?? '' }}">
                                <input type="hidden" name="membership" value="GEN_GOLD">
                                <button type="submit" class="btn btn-warning w-100">Join Now</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- GEN PLATINUM Member -->
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm border-light rounded" style="background-color: #111; color: white; height: 100%; transition: all 0.3s ease-in-out;">
                        <div class="card-body text-center">
                            <h4 class="card-title text-success fw-bold">GEN PLATINUM Member</h4>
                            <p class="card-text text-light">7,000 Bs. (Valid for 2 years)</p>
                            <ul class="list-unstyled text-left" style="color: #ddd; padding-left: 0;">
                                <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Two-year access to courses, virtual coaching, and free live coaching (includes 3 guests).</li>
                                <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Access to training and live events (includes 3 guests).</li>
                                <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Reserved seating in front rows.</li>
                                <li><i class="fas fa-check-circle" style="color: #28a745;"></i> Discounts and benefits at VIP companies nationwide and internationally.</li>
                                <li><i class="fas fa-check-circle" style="color: #28a745;"></i> PLATINUM GEN Membership Card with exclusive benefits.</li>
                            </ul>
                            <form action="{{ url('signup') }}" method="GET">
                                <input type="hidden" name="refer" value="{{ $refer ?? '' }}">
                                <input type="hidden" name="membership" value="GEN_PLATINUM">
                                <button type="submit" class="btn btn-success w-100">Join Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
