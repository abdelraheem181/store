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
              <h1>Shop List</h1>
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
                          Shop List
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
              <div class="row g-4">
                  <div class="col-xl-12">
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
                              <div class="icon active">
                                  <a href="shop-list.html"><i class="fas fa-list"></i></a>
                              </div>
                              <div class="icon-2">
                                  <a href="shop.html"><i class="fa-sharp fa-regular fa-grid-2"></i></a>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-12 wow fadeInUp" data-wow-delay=".3s">

                            @foreach ($book as $item)
                              <div class="shop-list-items">
                                  <div class="shop-list-thumb">
                                      <img src="{{ asset('images/books/' .$item->basic_image_path) }}" alt="img" style="width: 300pxSS; height: 300px;"> 
                                      {{-- <img src="{{ asset('images/books/' .$item->basic_image_path) }}" alt="img"> --}}
                                  </div>
                                  <div class="shop-list-content">
                                      <h3><a href="{{ route('website.shop-details' , $item->id) }}">{{ $item->name }}</a></h3>
                                      <h5>{{ $item->price }} $</h5> 
                    
                                      <div class="star">
                                          <i class="fa-solid fa-star"></i>
                                          <i class="fa-solid fa-star"></i>
                                          <i class="fa-solid fa-star"></i>
                                          <i class="fa-solid fa-star"></i>
                                          <i class="fa-regular fa-star"></i>
                                      </div>
                                      <p>
                                         {{ $item->description }}
                                      </p>
                               
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
                                          
                                          <ul class="shop-icon d-flex justify-content-center align-items-center">
                                              <li>
                                                @if(auth()->user()->isInWishlist($item->id) )
                                                  <a href="{{ route('wishlist.add' , $item->id) }}">
                                                    <i class="far fa-heart"
                                                        onclick="addToWishlist({{ $item->id }})" 
                                                        id="wishlist-icon-{{ $item->id }}" 
                                                        style="cursor: pointer;" 
                                                        data-book-id="{{ $item->id }}"
                                                        title="Add to Wishlist">
                                                            <span class="wishlist-badge d-none"></span>
                                                    </i>
                                                </a>
                                                @else
                                                <a href="{{ route('wishlist.add' , $item->id) }}">
                                                    <i class="far fa-heart"
                                                        onclick="addToWishlist({{ $item->id }})" 
                                                        id="wishlist-icon-{{ $item->id }}" 
                                                        style="cursor: pointer;" 
                                                        data-book-id="{{ $item->id }}"
                                                        title="Add to Wishlist">
                                                            <span class="wishlist-badge d-none"></span>
                                                    </i>
                                                </a>
                                                @endif
                                              </li>
                                              <li>
                                                  <a href="{{ route('website.shop-cart' , $item->id) }}">
                                                      <img class="icon" src="{{ asset('img/icon/shuffle.svg') }}"
                                                          alt="svg-icon">
                                                  </a>
                                              </li>
                                              <li>
                                                  <a href="{{ route('website.shop-details' , $item->id) }}"><i class="far fa-eye"></i></a>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                            @endforeach
                 
                          </div>
                      </div>
                      <div class="page-nav-wrap text-center">
                          <ul>
                              <li><a class="previous" href="{{ route('website.shop-list') }}">Previous</a></li>
                              <li><a class="page-numbers" href="{{ route('website.shop-list') }}">1</a></li>
                              <li><a class="page-numbers" href="{{ route('website.shop-list') }}">2</a></li>
                              <li><a class="page-numbers" href="{{ route('website.shop-list') }}">3</a></li>
                              <li><a class="page-numbers" href="{{ route('website.shop-list') }}">...</a></li>
                              <li><a class="next" href="{{ route('website.shop-list') }}">Next</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>


@endsection