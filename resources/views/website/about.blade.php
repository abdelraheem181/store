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
              <h1>About Us</h1>
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
                          About Us
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>

  <!-- About Section Start -->
  <section class="about-section fix section-padding">
      <div class="container">
          <div class="about-wrapper">
              <div class="row g-4 align-items-center">
                  <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                      <div class="about-image">
                          <img src="{{ asset('img/about.jpg') }}" alt="img">
                          <div class="video-box">
                              <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I"
                                  class="video-btn ripple video-popup">
                                  <i class="fa-solid fa-play"></i>
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="about-content">
                          <div class="section-title">
                              <h2 class="wow fadeInUp" data-wow-delay=".3s">About the Bookle <br> Books Store</h2>
                          </div>
                          <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                              Nullam convallis ullamcorper nulla. Nam accumsan ac leo quis posuere. Nunc rutrum lorem
                              justo, at blandit mauris ullamcorper tristique. Suspendisse vel ante venenatis,
                              porttitor ligula sed, iaculis metus. Nullam non erat gravida, viverra leo ut, maximus
                              tortor. Pellentesque vitae nunc rhoncus, lacinia nulla sed, commodo lectus. Curabitur at
                              consectetur velit.
                          </p>
                          <p class="mt-3 wow fadeInUp" data-wow-delay=".7s">
                              Morbi cursus enim in consequat suscipit. Quisque id dui ante. Praesent auctor sed velit
                              ac aliquet. Morbi consectetur sem nec ipsum malesuada, ut gravida nisl molestie. Proin
                              hendrerit ullamcorper dui, quis convallis mauris cursus nec. Interdum et malesuada fames
                              ac ante ipsum primis in faucibus. Vivamus ac laoreet orci.
                          </p>
                          <a href="about.html" class="link-btn wow fadeInUp" data-wow-delay=".8s">Overview <i
                                  class="fa-regular fa-arrow-right"></i></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Cta Banner Section Start -->
  <section class="cta-banner-section fix section-padding pt-0">
      <div class="container">
          <div class="cta-banner-wrapper section-padding bg-cover"
              style="background-image: url('{{ asset('img/cta-banner.jpg') }}');">
              <div class="book-shape">
                  <img src="{{ asset('img/book-shape.png') }}" alt="shape-img">
              </div>
              <div class="girl-shape float-bob-x">
                   <img src="{{ asset('img/girl-shape-2.png') }}" alt="shape-img">
              </div>
              <div class="cta-content text-center">
                  <h2 class="text-white mb-40 wow fadeInUp" data-wow-delay=".3s">Get 25% discount in all <br> kind of
                      super Selling</h2>
                  <a href="shop.html" class="theme-btn white-bg wow fadeInUp" data-wow-delay=".5s">Shop Now <i
                          class="fa-solid fa-arrow-right-long"></i></a>
              </div>
          </div>
      </div>
  </section>


@endsection