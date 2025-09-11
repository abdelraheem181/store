@extends('website.layout')

@section('content')

  
    <!-- Breadcumb Section Start -->
    <div class="breadcrumb-wrapper">
      <div class="book1">
            <img src="{{ asset($silder->image_path) }}" alt="book" style="width: 500px; height: 300px; object-fit: cover;">
      </div>
      <div class="book2">
          <img src="{{ asset('img/hero/book2.png') }}" alt="book" style="width: 100%; height: 100%;">
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
                          <img src="{{ asset('img/bo1.jpg') }}" alt="img">

                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="about-content">
                          <div class="section-title">
                              <h2 class="wow fadeInUp" data-wow-delay=".3s">{{ $about->title }}</h2>
                          </div>
                          <p class="mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".5s">
                              {{ $about->content}}
                          </p>
                          <a href="about.html" class="link-btn wow fadeInUp" data-wow-delay=".8s">Overview <i
                                  class="fa-regular fa-arrow-right"></i></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>




@endsection