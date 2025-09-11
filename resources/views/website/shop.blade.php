@extends('website.layout')

@section('content')

    <!-- Breadcumb Section Start -->
    <div class="breadcrumb-wrapper">
      <div class="book1">
          <img src="{{ asset($silder->image_path) }}" alt="book" style="width: 500px; height: 300px; object-fit: cover;">

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

                                <!-- loop through categories -->
                                @foreach ($category as $item)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-{{ $item->id }}-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-{{ $item->id }}" type="button" role="tab"
                                                aria-controls="pills-{{ $item->id }}" aria-selected="true">
                                                {{ $item->name }}
                                        </button>
                                </li>
                                @endforeach
                               
   
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
                                        @foreach ($book as $item) 
                                            @if ($item->sales_count > 0)
                                            <li data-value="1" class="option">
                                                {{ $item->name }}
                                            </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="product-status_sale gap-6 d-flex align-items-center">
                                <div class="nice-select category" tabindex="0">
                                    <span class="current">
                                        On Sale
                                    </span>
                                    <ul class="list">
                                        @foreach ($book as $item) 
                                                @if ($item->sales_count > 0)
                                                <li data-value="1" class="option">
                                                        {{ $item->name }}
                                                 </li>
                                                 @endif
                                         @endforeach
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
                                                    <a href="{{ route('wishlist.add' , $item->id) }}" >
                                                      
                                                        <i class="far fa-heart wishlist-icon" 
                                                           onclick="addToWishlist({{ $item->id }})" 
                                                           id="wishlist-icon-{{ $item->id }}" 
                                                           style="cursor: pointer;" 
                                                           data-book-id="{{ $item->id }}"
                                                           title="Add to Wishlist">
                                                            <span class="wishlist-badge d-none"></span>
                                                        </i>
                                               
                                                    </a>
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
                                          <form action="{{ route('cart.add', $item->id) }}" method="POST" class="enhanced-cart-form" data-book-id="{{ $item->id }}">
                                            @csrf
                                            <div class="shop-button quantity-wrapper">
                                                <label for="quantity-{{ $item->id }}" class="quantity-label">
                                                    <i class="fa-solid fa-sort-numeric-up"></i> Quantity:
                                                </label>
                                                <div class="quantity-controls">
                                                    <button type="button" class="qty-btn qty-minus" data-action="decrease">
                                                        <i class="fa-solid fa-minus"></i>
                                                    </button>
                                                    <input type="number" 
                                                           id="quantity-{{ $item->id }}" 
                                                           name="quantity" 
                                                           value="1" 
                                                           min="1" 
                                                           max="99"
                                                           class="quantity-input"
                                                           data-original-value="1">
                                                    <button type="button" class="qty-btn qty-plus" data-action="increase">
                                                        <i class="fa-solid fa-plus"></i>
                                                    </button>
                                                </div>
                                                <small class="quantity-hint">Min: 1, Max: 99</small>
                                            </div>
                                            <div class="shop-button">
                                                <button type="submit" class="theme-btn add-to-cart-btn" data-loading-text="Adding...">
                                                    <i class="fa-solid fa-basket-shopping"></i> 
                                                    <span class="btn-text">Add To Cart</span>
                                                    <span class="btn-loading d-none">
                                                        <i class="fa-solid fa-spinner fa-spin"></i> Adding...
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="form-feedback d-none">
                                                <div class="alert alert-success d-none">
                                                    <i class="fa-solid fa-check-circle"></i> Added to cart successfully!
                                                </div>
                                                <div class="alert alert-danger d-none">
                                                    <i class="fa-solid fa-exclamation-circle"></i> <span class="error-message"></span>
                                                </div>
                                            </div>
                                          </form>
        
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