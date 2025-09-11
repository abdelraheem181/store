@extends('website.layout')

@section('content')

    <!-- Test Notification Section (remove after testing) -->
    {{-- @if(config('app.debug'))
    <div class="container mt-3">
        <div class="alert alert-info">
            <h5>Notification Test (Debug Mode Only)</h5>
            <p>Click these buttons to test the notification system:</p>
            <a href="{{ route('test.success') }}" class="btn btn-success me-2">Test Success Message</a>
            <a href="{{ route('test.error') }}" class="btn btn-danger">Test Error Message</a>
        </div>
    </div>
    @endif --}}

    <!-- Hero Section start  -->

    <div class="hero-section hero-2 fix">

      <div class="container">
          <div class="row">
         

              <div class="col-12 col-xl-6 col-lg-6">

                  <div class="hero-items">
                      <div class="frame-shape1 float-bob-x">
                          <img src="{{ asset('img/hero/hero2-shape1.png') }}" alt="shape-img">
                      </div>
                      <div class="frame-shape2 float-bob-y">
                          <img src="{{ asset('img/hero/hero2-shape2.png') }}" alt="shape-img">
                      </div>
                      {{-- <div class="book-image">     
                        <img src="{{ asset($slider->image_path) }}" alt="img" class="img-fluid" style="width: 500pxSS; height: 400px;">
                    </div> --}}
                      <div class="hero-content">
                          <h6 class="wow fadeInUp" data-wow-delay=".3s">Explore the books</h6>
                          <h1 class="wow fadeInUp" data-wow-delay=".5s">Expand Your Mind <br> Reading a Book </h1>
                          <p class="text-capitalize">Sed ac arcu sed felis vulputate molestie. Nullam at urna in velit
                              finibus vestibulum euismod a <br> urna. Sed quis aliquam leo. Duis iaculis lorem mauris,
                              et convallis dui efficitur</p>
                          <div class="form-clt wow fadeInUp mt-5" data-wow-delay=".9s" >
                              <a href="{{ route('website.shop') }}" class="theme-btn">
                         
                                  Shop Now <i class="fa-solid fa-arrow-right-long" ></i>
                       
                              </a>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
  
  <!-- Shop Section Start -->
  <section class="shop-section section-padding fix pt-0">
            <div class="container">
                <div class="section-title-area">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">Top Category Books</h2>
                    </div>
                    <a href="{{ route('website.shop') }}" class="theme-btn transparent-btn wow fadeInUp" data-wow-delay=".5s">Explore More <i
                            class="fa-solid fa-arrow-right-long"></i></a>
                </div>
                <div class="swiper book-slider">
                    <div class="swiper-wrapper">
                        @foreach($book as $item)
                        <div class="swiper-slide">
                            <div class="shop-box-items style-2">
                                <div class="book-thumb center">
                                    <a href="shop-details"><img src="{{ asset('images/books/' .$item->basic_image_path) }}" alt="img"></a>
                                    {{-- <ul class="post-box">
                                        <li>
                                            Hot
                                        </li>
                                        <li>
                                            -30%
                                        </li>
                                    </ul> --}}
                                    <ul class="shop-icon d-grid justify-content-center align-items-center">
                                        <li>
                                            <a href="{{ route('website.wishlist') }}"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{ route('website.shop-cart') }}" class="cart-icon">
                                                <img class="icon" src="{{ asset('img/icon/shuffle.svg') }}" alt="svg-icon">
                                                @if($cartCount > 0)
                                                    <span class="cart-badge">{{ $cartCount }}</span>
                                                @endif
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-details.html"><i class="far fa-eye"></i></a>
                                        </li>
                                    </ul>
                                    <div class="shop-button">
                                        <a href="shop-details.html" class="theme-btn"><i
                                                class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                                    </div>
                                </div>
                                <div class="shop-content">
                                    <h5> {{ $item->category->name }} </h5>
                                    <h3><a href="{{ route('website.shop-details') }}"> {{ $item->name }}  </a></h3>
                                    <ul class="price-list">
                                        <li>{{ $item->price }}</li>
                                        <li>
                                            <del>{{ $item->price }} $</del>
                                        </li>
                                    </ul>
                                    <ul class="author-post">
                                        <li class="authot-list">
                                            <span class="thumb">
                                                <img src="{{ asset('images/authors/' .$item->author->image_path) }}" alt="img" style="width: 40px; height: 40px; object-fit: cover;">
                                            </span>
                                            <span class="content">{{ $item->author->name }}</span>
                                        </li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                            3.4 (25)
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
       
                    </div>
                </div>
            </div>
 </section>
    
      <!-- Featured Books Section Start -->
  <section class="featured-books-section pt-100 pb-145 fix section-bg">
       
        <div class="container">
                <div class="section-title-area justify-content-center">
                    <div class="section-title wow fadeInUp" data-wow-delay=".3s">
                    <h2>Featured Books</h2>
                    </div>
                </div>

                <div class="swiper featured-books-slider">
                    <div class="swiper-wrapper">
                    @foreach($book as $item)
                    <div class="swiper-slide">
                            <div class="shop-box-items style-4 wow fadeInUp" data-wow-delay=".2s">
                                <div class="book-thumb center">
                                <a href="shop-details"><img src="{{ asset('images/books/' .$item->basic_image_path) }}" alt="img"></a>
                                </div>
                                <div class="shop-content">
                                <ul class="book-category">
                                        <li class="book-category-badge">Adventure</li>
                                        <li>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-regular fa-star"></i>
                                            (459)
                                        </li>
                                </ul>
                                <h3><a href="shop-details.html"> {{ $item->name }} </a></h3>
                                <ul class="author-post">
                                        <li class="authot-list">
                                            <span class="thumb">
                                            <img src="{{ asset('images/authors/' .$item->author->image_path) }}" alt="img" style="width: 40px; height: 40px; object-fit: cover;">
                                            </span>
                                            <span class="content">{{ $item->author->name }}</span>
                                        </li>
                                </ul>
                                <div class="book-availablity">
                                        <div class="details">
                                            <ul class="price-list">
                                            <li>{{ $item->price }}</li>
                                            <li>
                                                    <del>{{ $item->price }}</del>
                                            </li>
                                            </ul>
                                            <div class="progress-line">

                                            </div>
                                            <p>{{ $item->avl_qty }} Books in stock</p>
                                        </div>
                                        <div class="shop-btn">
                                            <a href="{{ route('website.shop-cart') }}">
                                            <i class="fa-regular fa-basket-shopping"></i>
                                            </a>
                                        </div>

                                </div>

                                </div>
                            </div>
                    </div>
                    @endforeach
            
                    <div class="swiper-pagination"></div>
                </div>
        </div>

 </section>

    <!-- Best Seller Section Start -->
<section class="best-seller-section section-padding fix">
            <div class="container">
                <div class="section-title-area">
                    <div class="section-title wow fadeInUp" data-wow-delay=".3s">
                        <h2>Best Sellers</h2>
                    </div>
                    <a href="{{ route('website.shop') }}" class="theme-btn transparent-btn wow fadeInUp" data-wow-delay=".5s">Explore More <i
                            class="fa-solid fa-arrow-right-long"></i></a>
                </div>
                <div class="book-shop-wrapper style-2">
                    @foreach($best_seller as $item ) 
                    <div class="shop-box-items style-3 wow fadeInUp" data-wow-delay=".2s">
                        <div class="book-thumb center">
                            <a href="shop-details"><img src="{{ asset('images/books/' .$item->basic_image_path) }}" alt="img"></a>
                        </div>
                        <div class="shop-content">
                            <ul class="book-category">
                                <li class="book-category-badge">Adventure</li>
                                <li>
                                    <i class="fa-solid fa-star"></i>
                                    3.4 (25)
                                </li>
                            </ul>
                            <h3><a href="{{ route('website.shop-details') }}"> {{ $item->name }} </a></h3>
                            <ul class="author-post">
                                <li class="authot-list">
                                    <span class="content">{{ $item->author->name }}</span>
                                </li>
                            </ul>
                            <ul class="price-list">
                                <li>{{ $item->price }}</li>
                                <li>
                                    <del>{{ $item->price }}</del>
                                </li>
                            </ul>
                            <div class="shop-button">
                                <a href="{{ route('website.shop-cart') }}" class="theme-btn"><i class="fa-solid fa-basket-shopping"></i>
                                    Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
                </div>
            </div>
</section>

  <!-- Feature Section Start -->
 <section class="feature-section fix section-padding pt-0">
        <div class="container">
            <div class="feature-wrapper">
                <div class="feature-box-items wow fadeInUp" data-wow-delay=".2s">
                    <div class="icon">
                        <i class="icon-icon-1"></i>
                    </div>
                    <div class="content">
                        <h3>Return & refund</h3>
                        <p>Money back guarantee</p>
                    </div>
                </div>
                <div class="feature-box-items wow fadeInUp" data-wow-delay=".4s">
                    <div class="icon">
                        <i class="icon-icon-2"></i>
                    </div>
                    <div class="content">
                        <h3>Secure Payment</h3>
                        <p>30% off by subscribing</p>
                    </div>
                </div>
                <div class="feature-box-items wow fadeInUp" data-wow-delay=".6s">
                    <div class="icon">
                        <i class="icon-icon-3"></i>
                    </div>
                    <div class="content">
                        <h3>Quality Support</h3>
                        <p>Always online 24/7</p>
                    </div>
                </div>
                <div class="feature-box-items wow fadeInUp" data-wow-delay=".8s">
                    <div class="icon">
                        <i class="icon-icon-4"></i>
                    </div>
                    <div class="content">
                        <h3>Daily Offers</h3>
                        <p>20% off by subscribing</p>
                    </div>
                </div>
            </div>
        </div>
  </section>

@endsection