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
            <h1>Payment Success</h1>
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
                        Payment Success
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Success Message Section Start -->
<section class="success-section fix section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="success-content text-center">
                    <!-- Success Icon -->
                    <div class="success-icon mb-4">
                        <div class="success-checkmark">
                            <div class="check-icon">
                                <span class="icon-line line-tip"></span>
                                <span class="icon-line line-long"></span>
                                <div class="icon-circle"></div>
                                <div class="icon-fix"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Success Message -->
                    <div class="success-message">
                        <h2 class="success-title mb-3">Payment Successful!</h2>
                        <p class="success-text mb-4">
                            Thank you for your purchase! Your payment has been processed successfully and your order is being prepared.
                        </p>
                        
                        @if(session('success'))
                            <div class="alert alert-success mb-4">
                                <i class="fa fa-check-circle me-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Order Information -->
                        @if(isset($order))
                        <div class="order-details mt-4">
                            <div class="order-info-card">
                                <h4 class="order-info-title mb-3">
                                    <i class="fa fa-receipt me-2"></i>
                                    Order Details
                                </h4>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <span class="info-label">Order Number:</span>
                                            <span class="info-value">{{ $order->order_number }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <span class="info-label">Order Date:</span>
                                            <span class="info-value">{{ $order->created_at->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <span class="info-label">Total Amount:</span>
                                            <span class="info-value amount">${{ number_format($order->total_amount, 2) }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <span class="info-label">Payment Status:</span>
                                            <span class="info-value status-paid">
                                                <i class="fa fa-check-circle me-1"></i>
                                                Paid
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="success-actions mt-5">
                            <div class="row g-3 justify-content-center">
                                <div class="col-auto">
                                    <a href="{{ route('website.index') }}" class="theme-btn">
                                        <i class="fa fa-home me-2"></i>
                                        Continue Shopping
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('website.shop') }}" class="theme-btn theme-btn-outline">
                                        <i class="fa fa-shopping-bag me-2"></i>
                                        Browse Books
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information -->
                        <div class="additional-info mt-5">
                            <div class="info-box">
                                <h5 class="info-box-title">
                                    <i class="fa fa-info-circle me-2"></i>
                                    What's Next?
                                </h5>
                                <ul class="info-list">
                                    <li>
                                        <i class="fa fa-check me-2"></i>
                                        You will receive an email confirmation shortly
                                    </li>
                                    <li>
                                        <i class="fa fa-check me-2"></i>
                                        Your order is being processed and will be shipped soon
                                    </li>
                                    <li>
                                        <i class="fa fa-check me-2"></i>
                                        You can track your order status in your account
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

<!-- Custom Styles for Success Page -->
<style>
.success-section {
    background: #f8f9fa;
    min-height: 60vh;
    display: flex;
    align-items: center;
}

.success-content {
    background: white;
    padding: 3rem;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.success-checkmark {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: block;
    stroke-width: 2;
    stroke: #4CAF50;
    stroke-miterlimit: 10;
    margin: 0 auto;
    box-shadow: inset 0px 0px 0px #4CAF50;
    animation: fill 0.4s ease-in-out 0.4s forwards, scale 0.3s ease-in-out 0.9s both;
}

.check-icon {
    width: 56px;
    height: 56px;
    position: relative;
    border-radius: 50%;
    box-sizing: content-box;
    border: 4px solid #4CAF50;
}

.check-icon::before {
    top: 3px;
    left: -2px;
    width: 30px;
    transform-origin: 100% 50%;
    border-radius: 100px 0 0 100px;
}

.check-icon::after {
    top: 0;
    left: 30px;
    width: 60px;
    transform-origin: 0 50%;
    border-radius: 0 100px 100px 0;
    animation: rotate-circle 4.25s ease-in;
}

.check-icon::before,
.check-icon::after {
    content: '';
    height: 100px;
    position: absolute;
    background: #4CAF50;
    transform: rotate(-45deg);
}

.icon-line {
    height: 5px;
    background-color: #4CAF50;
    display: block;
    border-radius: 2px;
    position: absolute;
    z-index: 10;
    animation: icon-line-tip 0.75s;
}

.icon-line.line-tip {
    top: 46px;
    left: 14px;
    width: 25px;
    transform: rotate(45deg);
    animation: icon-line-tip 0.75s;
}

.icon-line.line-long {
    top: 38px;
    right: 8px;
    width: 47px;
    transform: rotate(-45deg);
    animation: icon-line-long 0.75s;
}

.icon-circle {
    top: -4px;
    left: -4px;
    z-index: 10;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 4px solid #4CAF50;
    background: #4CAF50;
    position: absolute;
}

.icon-fix {
    top: 8px;
    width: 5px;
    left: 26px;
    z-index: 1;
    height: 85px;
    position: absolute;
    transform: rotate(-45deg);
    background: white;
}

@keyframes icon-line-tip {
    0% { width: 0; left: 1px; top: 19px; }
    54% { width: 0; left: 1px; top: 19px; }
    70% { width: 65px; left: -8px; top: 37px; }
    84% { width: 17px; left: 21px; top: 48px; }
    100% { width: 25px; left: 14px; top: 45px; }
}

@keyframes icon-line-long {
    0% { width: 0; right: 46px; top: 54px; }
    65% { width: 0; right: 46px; top: 54px; }
    84% { width: 55px; right: 0px; top: 35px; }
    100% { width: 47px; right: 8px; top: 38px; }
}

@keyframes rotate-circle {
    0% { transform: rotate(-45deg); }
    5% { transform: rotate(-45deg); }
    12% { transform: rotate(-405deg); }
    100% { transform: rotate(-405deg); }
}

@keyframes fill {
    0% { box-shadow: inset 0px 0px 0px 0px #4CAF50; }
    100% { box-shadow: inset 0px 0px 0px 30px #4CAF50; }
}

@keyframes scale {
    0%, 100% { transform: none; }
    50% { transform: scale3d(1.1, 1.1, 1); }
}

.success-title {
    color: #2c3e50;
    font-weight: 700;
    font-size: 2.5rem;
}

.success-text {
    color: #6c757d;
    font-size: 1.1rem;
    line-height: 1.6;
}

.order-info-card {
    background: #f8f9fa;
    padding: 2rem;
    border-radius: 10px;
    border-left: 4px solid #4CAF50;
}

.order-info-title {
    color: #2c3e50;
    font-weight: 600;
    margin-bottom: 1.5rem;
}

.info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid #e9ecef;
}

.info-item:last-child {
    border-bottom: none;
}

.info-label {
    font-weight: 600;
    color: #495057;
}

.info-value {
    color: #2c3e50;
    font-weight: 500;
}

.info-value.amount {
    font-size: 1.2rem;
    font-weight: 700;
    color: #4CAF50;
}

.info-value.status-paid {
    color: #4CAF50;
    font-weight: 600;
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

.info-box {
    background: #e3f2fd;
    padding: 1.5rem;
    border-radius: 10px;
    border-left: 4px solid #2196F3;
}

.info-box-title {
    color: #1976d2;
    font-weight: 600;
    margin-bottom: 1rem;
}

.info-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.info-list li {
    padding: 0.5rem 0;
    color: #424242;
}

.info-list li i {
    color: #4CAF50;
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    padding: 1rem;
    border-radius: 5px;
    border: 1px solid transparent;
}

@media (max-width: 768px) {
    .success-content {
        padding: 2rem 1.5rem;
    }
    
    .success-title {
        font-size: 2rem;
    }
    
    .order-info-card {
        padding: 1.5rem;
    }
    
    .info-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
}
</style>

@endsection
