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
              <h1>Shop Default</h1>
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
                          Shop Default
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>

  <!-- Shop Section Start -->
  <section class="shop-section fix section-padding">
<div class="container">
    <div class="shop-default-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="woocommerce-notices-wrapper wow fadeInUp" data-wow-delay=".3s">
                    <p>Showing 1-3 Of 34 Results </p>
                    <div class="form-clt">
                        <div class="nice-select" tabindex="0">
                            <span class="current">
                                Default Sorting
                            </span>
                            <ul class="list">
                                <li data-value="1" class="option selected focus">
                                    Default sorting
                                </li>
                                <li data-value="1" class="option">
                                    Sort by popularity
                                </li>
                                <li data-value="1" class="option">
                                    Sort by average rating
                                </li>
                                <li data-value="1" class="option">
                                    Sort by latest
                                </li>
                            </ul>
                        </div>
                        <div class="icon">
                            <a href="shop-list.html"><i class="fas fa-list"></i></a>
                        </div>
                        <div class="icon-2 active">
                            <a href="shop.html"><i class="fa-sharp fa-regular fa-grid-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 order-2 order-md-1 wow fadeInUp" data-wow-delay=".3s">
                <div class="main-sidebar">
                    <div class="single-sidebar-widget">
                        <div class="wid-title">
                            <h5>Search</h5>
                        </div>
                        <form action="#" class="search-toggle-box">
                            <div class="input-area search-container">
                                <input class="search-input" type="text" placeholder="Search here">
                                <button class="cmn-btn search-icon">
                                    <i class="far fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="single-sidebar-widget">
                        <div class="wid-title">
                            <h5>Categories</h5>
                        </div>
                        <div class="categories-list">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-arts-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-arts" type="button" role="tab"
                                        aria-controls="pills-arts" aria-selected="true">Arts &
                                        Photography</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-Biographies-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-Biographies" type="button" role="tab"
                                        aria-controls="pills-Biographies" aria-selected="false">Biographies &
                                        Memoirs</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-ChristianBooks-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-ChristianBooks" type="button" role="tab"
                                        aria-controls="pills-ChristianBooks" aria-selected="false">Christian
                                        Books & Bibles</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-ResearchPublishing-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-ResearchPublishing"
                                        type="button" role="tab" aria-controls="pills-ResearchPublishing"
                                        aria-selected="false">Research & Publishing Guides</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-SportsOutdoors-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-SportsOutdoors" type="button" role="tab"
                                        aria-controls="pills-SportsOutdoors" aria-selected="false">Sports &
                                        Outdoors</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-FoodDrink-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-FoodDrink" type="button" role="tab"
                                        aria-controls="pills-FoodDrink" aria-selected="false">Food &
                                        Drink</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="single-sidebar-widget">
                        <div class="wid-title">
                            <h5>Product Status</h5>
                        </div>
                        <div class="product-status">
                            <div class="product-status_stock  gap-6 d-flex align-items-center">
                                <div class="nice-select category" tabindex="0"><span class="current">
                                        In Stock
                                    </span>
                                    <ul class="list">
                                        <li data-value="1" class="option selected">
                                            In Stock
                                        </li>
                                        <li data-value="1" class="option">
                                            Castle In The Sky
                                        </li>
                                        <li data-value="1" class="option">
                                            The Hidden Mystery Behind
                                        </li>
                                        <li data-value="1" class="option">
                                            Flovely And Unicom Erna
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-status_sale gap-6 d-flex align-items-center">
                                <div class="nice-select category" tabindex="0">
                                    <span class="current">
                                        On Sale
                                    </span>
                                    <ul class="list">
                                        <li data-value="1" class="option selected">
                                            On Sale
                                        </li>
                                        <li data-value="1" class="option">
                                            Flovely And Unicom Erna
                                        </li>
                                        <li data-value="1" class="option">
                                            Castle In The Sky
                                        </li>
                                        <li data-value="1" class="option">
                                            How Deal With Very Bad BOOK
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
  


                
<div class="col-xl-9 col-lg-8 order-1 order-md-2">
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-arts" role="tabpanel"
                            aria-labelledby="pills-arts-tab" tabindex="0">
            <div class="row">
                        @foreach ($book as $item)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                                <div class="shop-box-items">
                                        <div class="book-thumb center">
                                            <a href="{{ route('website.shop-details' , $item->id) }}"><img src="{{ asset('images/books/' .$item->basic_image_path) }}" alt="img"></a>
                                            <ul class="shop-icon d-grid justify-content-center align-items-center">
                                                <li>
                                                    <a href="{{ route('website.shop-details' , $item->id) }}"><i class="far fa-heart"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('website.shop-details' , $item->id) }}">
                                                        <img class="icon" src="{{ asset('images/books/' .$item->basic_image_path) }}"
                                                            alt="svg-icon">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('website.shop-details' , $item->id) }}"><i class="far fa-eye"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="shop-content">
                                            <h3><a href="{{ route('website.shop-details' , $item->id) }}">{{ $item->name }}</a></h3>
                                            <ul class="price-list">
                                                <li>
                                                    {{ $item->price }} $
                                                    <del>{{ $item->price }}</del>
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-star"></i>
                                                    {{ $item->rating }} ({{ $item->rating_count }})
                                                </li>
                                            </ul>
                                            <div class="shop-button">
                                                <a href="{{ route('website.shop-details' , $item->id) }}" class="theme-btn"><i
                                                        class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endforeach
                        <div class="page-nav-wrap text-center">
                        <ul>
                            <li><a class="previous" href="{{ route('website.shop') }}">Previous</a></li>
                            <li><a class="page-numbers" href="{{ route('website.shop') }}">1</a></li>
                            <li><a class="page-numbers" href="{{ route('website.shop') }}">2</a></li>
                            <li><a class="page-numbers" href="{{ route('website.shop') }}">3</a></li>
                            <li><a class="page-numbers" href="{{ route('website.shop') }}">...</a></li>
                            <li><a class="next" href="{{ route('website.shop') }}">Next</a></li>
                        </ul>
                        </div>
            

            
            </div>
        </div>
    </div>
</div>


  </section>

@endsection