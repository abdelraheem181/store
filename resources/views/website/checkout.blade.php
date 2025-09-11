@extends('website.layout')

@section('content')


    <!-- Breadcumb Section Start   ----------------------------------------             -->
    <div class="breadcrumb-wrapper">
      <div class="book1">
            <img src="{{ asset($silder->image_path) }}" alt="book" style="width: 500px; height: 300px; object-fit: cover;">
      </div>
      <div class="book2">
          <img src="{{ asset('img/hero/book2.png') }}" alt="book">
      </div>
      <div class="container">
          <div class="page-heading">
              <h1>Checkout</h1>
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
                          Checkout
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
@foreach ($errors->all() as $error)
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@endforeach

@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
  <!-- Checkout Section Start -->
  <section class="checkout-section fix section-padding">
    <form action="{{ route('website.checkout.store') }}" method="post">
        @csrf
      <div class="container">
          <div class="row g-5">
              <div class="col-lg-9">
  
                      <div class="checkout-single-wrapper">
                          <div class="checkout-single boxshado-single">
                              <h4>Billing Details</h4>
                              <div class="checkout-single-form">
                                  <div class="row g-4">
                                      <div class="col-lg-6">
                                          <div class="input-single">
                                              <span>First Name*</span>
                                              <input type="text" name="first_name" id="first_name" required=""
                                                  placeholder="First Name">
                                          </div>
                                      </div>
                                      <div class="col-lg-6">
                                          <div class="input-single">
                                              <span>Last Name*</span>
                                              <input type="text" name="last_name" id="last_name" required=""
                                                  placeholder="Last Name">
                                          </div>
                                      </div>
                                 
                                      <div class="col-lg-12">
                                          <div class="input-single">
                                              <span>Country*</span>
                                              <input name="country" id="country" placeholder="Country">
                                          </div>
                                      </div>
                                   
                                      <div class="col-lg-12">
                                          <div class="input-single">
                                              <span>Phone*</span>
                                              <input name="phone" id="phone" placeholder="Phone">
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="input-single">
                                              <span>Email Address*</span>
                                              <input name="email" id="email22" placeholder="Email">
                                          </div>
                                      </div>
                             
                                  </div>
                              </div>
                          </div>
                      </div>

              </div>
              <div class="col-lg-3">
                  <div class="checkout-order-area">
                      <h3>Our Order</h3>

                      <div class="product-checout-area">
                          <div class="checkout-item d-flex align-items-center justify-content-between">
                              <p>Product</p>
                              <p>Subtotal</p>
                          </div>
                          @if (session()->has('cart'))
                          @foreach (session()->get('cart') as $item)
                          <div class="checkout-item d-flex align-items-center justify-content-between">
                              <p>{{ $item['name'] }}</p>
                              <p>${{ number_format($item['price'], 2) }}</p>
                          </div>
                          @endforeach
                          @endif
                    
                          <div class="checkout-item d-flex align-items-center justify-content-between">
                              <p>Total</p>
                              <p>
                                ${{ number_format(collect(session()->get('cart'))->sum(function($item) { return $item['price'] * $item['quantity']; }), 2) }}

                              </p>
                          </div>
                          <div class="checkout-item-2">
                         
                                <span>Payment Method</span>
                                <br>
                              <div class="form-check-3 d-flex align-items-center from-customradio-2 mt-3">
                                  <input class="form-check-input" type="radio" name="payment_method"  value="cash"
                                      id="flexRadioDefault12224">
                                  <label class="form-check-label" for="flexRadioDefault12224">
                                      Cash
                                  </label>
                              </div>
                           
                              <div class="form-check-3 d-flex align-items-center from-customradio-2 mt-3">
                                  <input class="form-check-input" type="radio" name="payment_method" value="credit_card"
                                      id="flexRadioDefault12225">
                                  <label class="form-check-label" for="flexRadioDefault12225">
                                      Credit Card
                                  </label>
                              </div>
                             

                          </div>
                          <button type="submit" class="theme-btn">Pay Now</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    
    </form>
  </section>

@endsection