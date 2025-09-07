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
              <h1>Author</h1>
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
                          Author
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>

  <!-- Team Section Start -->
  <section class="team-section fix section-padding margin-bottom-30">
      <div class="container">
          <div class="section-title text-center">
              <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s">Featured Author</h2>
              <p class="wow fadeInUp" data-wow-delay=".5s">Interdum et malesuada fames ac ante ipsum primis in
                  faucibus. <br> Donec at nulla nulla. Duis posuere ex lacus</p>
          </div>
          <div class="array-button">
              <button class="array-prev"><i class="fal fa-arrow-left"></i></button>
              <button class="array-next"><i class="fal fa-arrow-right"></i></button>
          </div>
          <div class="swiper team-slider">
              <div class="swiper-wrapper">

                {{-- foreach loop for the author --}}
                  @foreach($author as $author)

                  <div class="swiper-slide">
                      <div class="team-box-items">
                          <div class="team-image">
                              <div class="thumb">
                                  <img " src="{{ asset('images/authors/' .$author->image_path) }}" alt="img">
                              </div>
                              {{-- <div class="shape-img">
                                  <img src="{{ asset('img/team/shape-img.png') }}" alt="img">
                              </div> --}}
                          </div>
                          <div class="team-content text-center">
                              <h6><a href="{{ route('website.team-details', $author->id) }}">{{ $author->name}}</a></h6>
                              <p>{{ $author->books_count }} Published Books</p>
                              <p>{{ $author->email }}</p>
                              <p>{{ $author->phone }}</p>
                              <p>{{ $author->country->name }}</p>
                             
                          </div>
                      </div>
                  </div>
                  @endforeach

                  {{-- <div class="swiper-slide">
                      <div class="team-box-items">
                          <div class="team-image">
                              <div class="thumb">
                                  <img src="{{ asset('img/team/02.jpg') }}" alt="img">
                              </div>
                              <div class="shape-img">
                                  <img src="{{ asset('img/team/shape-img.png') }}" alt="img">
                              </div>
                          </div>
                          <div class="team-content text-center">
                              <h6><a href="{{ route('website.team-details') }}">Shikhon Islam</a></h6>
                              <p>07 Published Books</p>
                          </div>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="team-box-items">
                          <div class="team-image">
                              <div class="thumb">
                                  <img src="{{ asset('img/team/03.jpg') }}" alt="img">
                              </div>
                              <div class="shape-img">
                                  <img src="{{ asset('img/team/shape-img.png') }}" alt="img">
                              </div>
                          </div>
                          <div class="team-content text-center">
                              <h6><a href="{{ route('website.team-details') }}">Kawser Ahmed</a></h6>
                              <p>04 Published Books</p>
                          </div>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="team-box-items">
                          <div class="team-image">
                              <div class="thumb">
                                  <img src="{{ asset('img/team/04.jpg') }}" alt="img">
                              </div>
                              <div class="shape-img">
                                  <img src="{{ asset('img/team/shape-img.png') }}" alt="img">
                              </div>
                          </div>
                          <div class="team-content text-center">
                              <h6><a href="{{ route('website.team-details') }}">Brooklyn Simmons</a></h6>
                              <p>15 Published Books</p>
                          </div>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="team-box-items">
                          <div class="team-image">
                              <div class="thumb">
                                  <img src="{{ asset('img/team/05.jpg') }}" alt="img">
                              </div>
                              <div class="shape-img">
                                  <img src="{{ asset('img/team/shape-img.png') }}" alt="img">
                              </div>
                          </div>
                          <div class="team-content text-center">
                              <h6><a href="{{ route('website.team-details') }}">Leslie Alexander</a></h6>
                              <p>05 Published Books</p>
                          </div>
                      </div>
                  </div>
                  <div class="swiper-slide">
                      <div class="team-box-items">
                          <div class="team-image">
                              <div class="thumb">
                                  <img src="{{ asset('img/team/06.jpg') }}" alt="img">
                              </div>
                              <div class="shape-img">
                                  <img src="{{ asset('img/team/shape-img.png') }}" alt="img">
                              </div>
                          </div>
                          <div class="team-content text-center">
                              <h6><a href="{{ route('website.team-details') }}">Guy Hawkins</a></h6>
                              <p>12 Published Books</p>
                          </div>
                      </div>
                  </div> --}}
              </div>
          </div>
      </div>
  </section>

  <!-- Shop Section start  -->
  {{-- <section class="shop-section section-padding fix pt-0">
      <div class="container">
          <div class="section-title-area">
              <div class="section-title wow fadeInUp" data-wow-delay=".3s">
                  <h2>Top Selling Books</h2>
              </div>
              <a href="shop.html" class="theme-btn transparent-btn wow fadeInUp" data-wow-delay=".5s">Explore More <i
                      class="fa-solid fa-arrow-right-long"></i></a>
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
  </section> --}}
@endsection