@extends('website.layout')

@section('content')

<!-- Breadcumb Section Start   ----------------------------------------             -->
<div class="breadcrumb-wrapper">
    <div class="book1">
        <img src="{{ asset('img/hero/book1.png') }}" alt="book">
    </div>
    <div class="book2">
        <img src="{{ asset('img/hero/book2.png') }}" alt="book">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1>Payment Failed</h1>
            <div class="page-header">
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".3s">
                    <li>
                        <a href="{{ route('website.index') }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li>
                        Payment Failed
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Failed Payment Section Start -->
<section class="failed-section fix section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="failed-content text-center">
                    <!-- Failed Icon -->
                    <div class="failed-icon mb-4">
                        <div class="failed-xmark">
                            <div class="x-icon">
                                <span class="x-line x-line-left"></span>
                                <span class="x-line x-line-right"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Failed Message -->
                    <div class="failed-message">
                        <h2 class="failed-title mb-3">Payment Failed</h2>
                        <p class="failed-text mb-4">
                            We're sorry, but your payment could not be processed at this time. Please try again or contact support if the problem persists.
                        </p>
                        
                        @if(session('error'))
                            <div class="alert alert-danger mb-4">
                                <i class="fa fa-exclamation-triangle me-2"></i>
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="failed-actions mt-5">
                            <div class="row g-3 justify-content-center">
                                <div class="col-auto">
                                    <a href="{{ route('website.checkout') }}" class="theme-btn">
                                        <i class="fa fa-credit-card me-2"></i>
                                        Try Again
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('website.shop-cart') }}" class="theme-btn theme-btn-outline">
                                        <i class="fa fa-shopping-cart me-2"></i>
                                        Review Cart
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('website.index') }}" class="theme-btn theme-btn-secondary">
                                        <i class="fa fa-home me-2"></i>
                                        Continue Shopping
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Help Information -->
                        <div class="help-info mt-5">
                            <div class="help-box">
                                <h5 class="help-box-title">
                                    <i class="fa fa-question-circle me-2"></i>
                                    Need Help?
                                </h5>
                                <ul class="help-list">
                                    <li>
                                        <i class="fa fa-check me-2"></i>
                                        Check your payment method details
                                    </li>
                                    <li>
                                        <i class="fa fa-check me-2"></i>
                                        Ensure you have sufficient funds
                                    </li>
                                    <li>
                                        <i class="fa fa-check me-2"></i>
                                        Contact your bank if the issue persists
                                    </li>
                                    <li>
                                        <i class="fa fa-check me-2"></i>
                                        Try a different payment method
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom Styles for Failed Payment Page -->
<style>
.failed-section {
    background: #f8f9fa;
    min-height: 60vh;
    display: flex;
    align-items: center;
}

.failed-content {
    background: white;
    padding: 3rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.failed-xmark {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: block;
    stroke-width: 2;
    stroke: #dc3545;
    stroke-miterlimit: 10;
    margin: 0 auto;
    box-shadow: inset 0px 0px 0px #dc3545;
    animation: fill 0.4s ease-in-out 0.4s forwards, scale 0.3s ease-in-out 0.9s both;
}

.x-icon {
    width: 56px;
    height: 56px;
    position: relative;
    border-radius: 50%;
    box-sizing: content-box;
    border: 4px solid #dc3545;
}

.x-line {
    height: 5px;
    background-color: #dc3545;
    display: block;
    border-radius: 2px;
    position: absolute;
    z-index: 10;
    animation: x-line 0.75s;
}

.x-line-left {
    top: 46px;
    left: 14px;
    width: 25px;
    transform: rotate(45deg);
}

.x-line-right {
    top: 46px;
    right: 14px;
    width: 25px;
    transform: rotate(-45deg);
}

@keyframes x-line {
    0% { width: 0; }
    100% { width: 25px; }
}

@keyframes fill {
    0% { box-shadow: inset 0px 0px 0px 0px #dc3545; }
    100% { box-shadow: inset 0px 0px 0px 30px #dc3545; }
}

@keyframes scale {
    0%, 100% { transform: none; }
    50% { transform: scale3d(1.1, 1.1, 1); }
}

.failed-title {
    color: #dc3545;
    font-weight: 700;
    font-size: 2.5rem;
}

.failed-text {
    color: #6c757d;
    font-size: 1.1rem;
    line-height: 1.6;
}

.theme-btn-outline {
    background: transparent;
    border: 2px solid #007bff;
    color: #007bff;
    padding: 12px 30px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
}

.theme-btn-outline:hover {
    background: #007bff;
    color: white;
    text-decoration: none;
}

.theme-btn-secondary {
    background: #6c757d;
    color: white;
    padding: 12px 30px;
    border-radius: 5px;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
}

.theme-btn-secondary:hover {
    background: #5a6268;
    color: white;
    text-decoration: none;
}

.help-box {
    background: #fff3cd;
    padding: 1.5rem;
    border-radius: 10px;
    border-left: 4px solid #ffc107;
}

.help-box-title {
    color: #856404;
    font-weight: 600;
    margin-bottom: 1rem;
}

.help-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.help-list li {
    padding: 0.5rem 0;
    color: #856404;
}

.help-list li i {
    color: #ffc107;
}

.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
    padding: 1rem;
    border-radius: 5px;
    border: 1px solid transparent;
}

@media (max-width: 768px) {
    .failed-content {
        padding: 2rem 1.5rem;
    }
    
    .failed-title {
        font-size: 2rem;
    }
}
</style>

@endsection
