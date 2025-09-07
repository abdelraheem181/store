@extends('website.layout')

@section('content')

    <!-- Breadcumb Section Start -->
    <div class="breadcrumb-wrapper">
      <div class="book1">
          <img src="{{ asset('img/hero/book1.png') }}" alt="book">
      </div>
      <div class="book2">
          <img src="{{ asset('img/hero/book2.png') }}" alt="book">
      </div>
      <div class="container">
          <div class="page-heading">
              <h1>Author Profile</h1>
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
                          Author Profile
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>

  <!-- Team Details Section Start -->
  <section class="team-details-section fix section-padding">

    {{-- foreach loop for the author --}}
 
      <div class="container">
          <div class="team-details-wrapper">
              <div class="team-details-items">
                  <div class="details-image wow fadeInUp" data-wow-delay=".3s">
                      <img src="{{ asset('images/authors/' .$author->image_path) }}" alt="img">
                  </div>
                  <div class="details-content wow fadeInUp" data-wow-delay=".5s">
                      <h3>Author: {{ $author->name }}</h3>
                      <span>{{ $author->country->name }}</span>
                      <div class="social-icon d-flex align-items-center">
                          <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                          <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                          <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                          <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                      </div>
                  </div>
              </div>
              <p class="wow fadeInUp" data-wow-delay=".7s">
                  {{ $author->description }}
              </p>
              <div class="details-counter-area">
                  <div class="counter-items wow fadeInUp" data-wow-delay=".3s">
                      <h2><span class="count">{{ $books_count }}</span>+</h2>
                      <p>Books</p>
                  </div>
                  <div class="counter-items wow fadeInUp" data-wow-delay=".5s">
                      <h2><span class="count">3</span>+</h2>
                      <p>Seles</p>
                  </div>
                  <div class="counter-items wow fadeInUp" data-wow-delay=".7s">
                      <h2><span class="count">5</span>+</h2>
                      <p>Review</p>
                  </div>
              </div>
          </div>
      </div>
  
  </section>

  <!-- Shop Section Start -->
  <section class="shop-section section-padding fix pt-0">
      <div class="container">
          <div class="section-title wow fadeInUp" data-wow-delay=".3s">
              <h2>Books By {{ $author->name }}</h2>
          </div>
          <div class="swiper book-slider">
              <div class="swiper-wrapper">
                  <div class="swiper-slide">
                      <div class="shop-box-items style-2">
                          <div class="book-thumb center">
                                    <a href="{{ route('website.shop-details') }}"><img src="{{ asset('img/book/01.png') }}" alt="img"></a>
                              <ul class="post-box">
                                  <li>
                                      Hot
                                  </li>
                                  <li>
                                      -30%
                                  </li>
                              </ul>
                              <ul class="shop-icon d-grid justify-content-center align-items-center">
                                  <li>
                                      <a href="{{ route('website.shop-cart') }}"><i class="far fa-heart"></i></a>
                                  </li>
                              </ul>
                              <ul class="shop-icon d-grid justify-content-center align-items-center">
                                  <li>
                                      <a href="{{ route('website.shop-cart') }}"><i class="far fa-heart"></i></a>
                                  </li>
                                  <li>
                                      <a href="{{ route('website.shop-cart') }}">

                                          <img class="icon" src="{{ asset('img/icon/shuffle.svg') }}" alt="svg-icon">
                                      </a>
                                  </li>
                                  <li>
                                      <a href="{{ route('website.shop-details') }}"><i class="far fa-eye"></i></a>
                                  </li>
                              </ul>
                          </div>
                          <div class="shop-content">
                              <h5> Design Low Book </h5>
                              <h3><a href="{{ route('website.shop-details') }}">Simple Things You To <br> Save BOOK</a></h3>
                              <ul class="price-list">
                                  <li>$30.00</li>
                                  <li>
                                      <del>$39.99</del>
                                  </li>
                              </ul>
                              <ul class="author-post">
                                  <li class="authot-list">
                                      <span class="thumb">
                                          <img src="{{ asset('img/testimonial/client-1.png') }}" alt="img">
                                      </span>
                                      <span class="content">Wilson</span>
                                  </li>

                                  <li class="star">
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-regular fa-star"></i>
                                  </li>
                              </ul>
                          </div>
                          <div class="shop-button">
                              <a href="{{ route('website.shop-details') }}" class="theme-btn"><i
                                      class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                          </div>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="shop-box-items style-2">
                          <div class="book-thumb center">
                              <a href="{{ route('website.shop-details') }}"><img src="{{ asset('img/book/02.png') }}" alt="img"></a>
                              <ul class="shop-icon d-grid justify-content-center align-items-center">
                                  <li>
                                      <a href="{{ route('website.shop-cart') }}"><i class="far fa-heart"></i></a>
                                  </li>
                                  <li>
                                      <a href="{{ route('website.shop-cart') }}">

                                          <img class="icon" src="{{ asset('img/icon/shuffle.svg') }}" alt="svg-icon">
                                      </a>
                                  </li>
                                  <li>
                                      <a href="{{ route('website.shop-details') }}"><i class="far fa-eye"></i></a>
                                  </li>
                              </ul>
                          </div>
                          <div class="shop-content">
                              <h5> Design Low Book </h5>
                              <h3><a href="{{ route('website.shop-details') }}">How Deal With Very <br> Bad BOOK</a></h3>
                              <ul class="price-list">
                                  <li>$30.00</li>
                                  <li>
                                      <del>$39.99</del>
                                  </li>
                              </ul>
                              <ul class="author-post">
                                  <li class="authot-list">
                                      <span class="thumb">
                                                <img src="{{ asset('img/testimonial/client-2.png') }}" alt="img">
                                      </span>
                                      <span class="content">Alexander</span>
                                  </li>

                                  <li class="star">
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-regular fa-star"></i>
                                  </li>
                              </ul>
                          </div>
                          <div class="shop-button">
                              <a href="{{ route('website.shop-details') }}" class="theme-btn"><i
                                      class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                          </div>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="shop-box-items style-2">
                          <div class="book-thumb center">
                              <a href="{{ route('website.shop-details') }}"><img src="{{ asset('img/book/03.png') }}" alt="img"></a>
                              <ul class="shop-icon d-grid justify-content-center align-items-center">
                                  <li>
                                      <a href="{{ route('website.shop-cart') }}"><i class="far fa-heart"></i></a>
                                  </li>
                                  <li>
                                      <a href="{{ route('website.shop-cart') }}">

                                          <img class="icon" src="{{ asset('img/icon/shuffle.svg') }}" alt="svg-icon">
                                      </a>
                                  </li>
                                  <li>
                                      <a href="{{ route('website.shop-details') }}"><i class="far fa-eye"></i></a>
                                  </li>
                              </ul>
                          </div>
                          <div class="shop-content">
                              <h5> Design Low Book </h5>
                              <h3><a href="{{ route('website.shop-details') }}">Qple GPad With Retina <br> Sisplay</a></h3>
                              <ul class="price-list">
                                  <li>$30.00</li>
                                  <li>
                                      <del>$39.99</del>
                                  </li>
                              </ul>
                              <ul class="author-post">
                                  <li class="authot-list">
                                      <span class="thumb">
                                          <img src="{{ asset('img/testimonial/client-3.png') }}" alt="img">
                                      </span>
                                      <span class="content">Esther</span>
                                  </li>

                                  <li class="star">
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-regular fa-star"></i>
                                  </li>
                              </ul>
                          </div>
                          <div class="shop-button">
                              <a href="{{ route('website.shop-details') }}" class="theme-btn"><i
                                      class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                          </div>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="shop-box-items style-2">
                          <div class="book-thumb center">
                              <a href="{{ route('website.shop-details') }}"><img src="{{ asset('img/book/04.png') }}" alt="img"></a>
                              <ul class="post-box">
                                  <li>
                                      Hot
                                  </li>
                              </ul>
                              <ul class="shop-icon d-grid justify-content-center align-items-center">
                                  <li>
                                      <a href="{{ route('website.shop-cart') }}"><i class="far fa-heart"></i></a>
                                  </li>
                                  <li>
                                      <a href="{{ route('website.shop-cart') }}">

                                          <img class="icon" src="{{ asset('img/icon/shuffle.svg') }}" alt="svg-icon">
                                      </a>
                                  </li>
                                  <li>
                                          <a href="{{ route('website.shop-details') }}"><i class="far fa-eye"></i></a>
                                  </li>
                              </ul>
                          </div>
                          <div class="shop-content">
                              <h5> Design Low Book </h5>
                              <h3><a href="{{ route('website.shop-details') }}">Qple GPad With Retina <br> Sisplay</a></h3>
                              <ul class="price-list">
                                  <li>$30.00</li>
                                  <li>
                                      <del>$39.99</del>
                                  </li>
                              </ul>
                              <ul class="author-post">
                                  <li class="authot-list">
                                      <span class="thumb">
                                          <img src="{{ asset('img/testimonial/client-4.png') }}" alt="img">
                                      </span>
                                      <span class="content">Hawkins</span>
                                  </li>

                                  <li class="star">
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-regular fa-star"></i>
                                  </li>
                              </ul>
                          </div>
                          <div class="shop-button">
                                          <a href="{{ route('website.shop-details') }}" class="theme-btn"><i
                                      class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                          </div>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="shop-box-items style-2">
                          <div class="book-thumb center">
                              <a href="{{ route('website.shop-details') }}"><img src="{{ asset('img/book/05.png') }}" alt="img"></a>
                              <ul class="shop-icon d-grid justify-content-center align-items-center">
                                  <li>
                                      <a href="{{ route('website.shop-cart') }}"><i class="far fa-heart"></i></a>
                                  </li>
                                  <li>
                                      <a href="{{ route('website.shop-cart') }}">

                                          <img class="icon" src="{{ asset('img/icon/shuffle.svg') }}" alt="svg-icon">
                                      </a>
                                  </li>
                                  <li>
                                      <a href="{{ route('website.shop-details') }}"><i class="far fa-eye"></i></a>
                                  </li>
                              </ul>
                          </div>
                          <div class="shop-content">
                              <h5> Design Low Book </h5>
                              <h3><a href="{{ route('website.shop-details') }}">Simple Things You To <br> Save BOOK</a></h3>
                              <ul class="price-list">
                                  <li>$30.00</li>
                                  <li>
                                      <del>$39.99</del>
                                  </li>
                              </ul>
                              <ul class="author-post">
                                  <li class="authot-list">
                                      <span class="thumb">
                                          <img src="{{ asset('img/testimonial/client-5.png') }}" alt="img">
                                      </span>
                                      <span class="content">(Author) Albert</span>
                                  </li>

                                  <li class="star">
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-solid fa-star"></i>
                                      <i class="fa-regular fa-star"></i>
                                  </li>
                              </ul>
                          </div>
                          <div class="shop-button">
                                    <a href="{{ route('website.shop-details') }}" class="theme-btn"><i
                                      class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

@endsection