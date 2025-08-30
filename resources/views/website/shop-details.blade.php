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
              <h1>Shop Details</h1>
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
                          Shop Details
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>

  <!-- Shop Details Section Start -->
  <section class="shop-details-section fix section-padding">
      <div class="container">
          <div class="shop-details-wrapper">
              <div class="row g-4">
                  <div class="col-lg-3">
                      <div class="shop-details-image">
                          <div class="tab-content">
                            <div id="thumb1" class="tab-pane fade show active">
                                <div class="shop-details-thumb">
                                    <img src="{{ asset('images/books/' .$book->basic_image_path)  }}" alt="img" width="315">
                                </div>
                            </div>
                    
                          </div>
                 
              
                          <ul class="nav">
                                @foreach ($book->images as $image )
                                <li class="nav-item">
                                    <a href="#thumb1" data-bs-toggle="tab" class="nav-link active">
                                        <img src="{{ asset($image->image_path) }}" alt="img" width="74">
                                    </a>
                                </li> 
                                @endforeach
                          </ul>
                      </div>
                  
                  </div>
                  <div class="col-lg-7">
                      <div class="shop-details-content">
                          <div class="title-wrapper">
                              <h2>{{ $book->getTranslation('name', 'en') }}</h2>
                              <h5>Stock availability.</h5>
                          </div>
                          <div class="star">
                                    <a href="{{ route('website.shop-details') }}"> <i class="fas fa-star"></i></a>
                              <a href="{{ route('website.shop-details') }}"><i class="fas fa-star"></i></a>
                              <a href="{{ route('website.shop-details') }}"> <i class="fas fa-star"></i></a>
                              <a href="{{ route('website.shop-details') }}"><i class="fa-regular fa-star"></i></a>
                              <span>(1 Customer Reviews)</span>
                          </div>
                          <p>
                           {{ $book->description }}
                          </p>
                          <div class="price-list">
                              <h3>{{ $book->price }} $</h3>
                          </div>
                          <div class="cart-wrapper">
                              <div class="quantity-basket">
                                  <p class="qty">
                                      <button class="qtyminus" aria-hidden="true">−</button>
                                      <input type="number" name="qty" id="qty2" min="1" max="10" step="1" value="1">
                                      <button class="qtyplus" aria-hidden="true">+</button>
                                  </p>
                              </div> 
                              <button type="button"  class="theme-btn style-2" data-bs-toggle="modal" data-bs-target="#readMoreModal">
                                  Read A little
                                </button>
                                <!-- Read More Modal -->
                              <div class="modal fade" id="readMoreModal" tabindex="-1" aria-labelledby="readMoreModalLabel" aria-hidden="true">
                                  <div class="modal-dialog"> 
                                      <div class="modal-content">
                                          <div class="modal-body" style="background-image: url(assets/img/popupBg.png);"> 
                                              <div class="close-btn">
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                      aria-label="Close"></button>
                                              </div>
                                              <div class="readMoreBox"> 
                                                  <div class="content">
                                                      <h3 id="readMoreModalLabel">The Role Of Book</h3>
                                                      <p>
                                                          Educating the Public <br>
                                                          Political books play a crucial role in educating the public about political theories, historical events, policies, and the workings of governments. They provide readers with insights into complex political concepts and the historical context behind current events, helping to foster a more informed citizenry. <br><br>

                                                          Shaping Public Opinion <br>
                                                          Authors of political books often aim to influence public opinion by presenting arguments and perspectives on various issues. These books can sway readers' views, either reinforcing their existing beliefs or challenging them to consider alternative viewpoints. This influence can extend to political debates and discussions in the public sphere. <br><br>

                                                          Documenting History <br>
                                                          Political books serve as valuable records of historical events and political movements. They document the thoughts, actions, and decisions of political leaders and activists, providing future generations with a detailed account of significant periods and events. This historical documentation is essential for understanding the evolution of political systems and ideologies.

                                                      </p>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <a href="{{ route('website.shop-details') }}" class="theme-btn"><i
                                      class="fa-solid fa-basket-shopping"></i> Add To Cart</a>
                              <div class="icon-box">
                                  <a href="{{ route('website.shop-details') }}" class="icon">
                                      <i class="far fa-heart"></i>
                                  </a>
                                  <a href="{{ route('website.shop-details') }}" class="icon-2">
                                      <img src="{{ asset('img/icon/shuffle.svg') }}" alt="svg-icon">
                                  </a>
                              </div>
                          </div>
                          <div class="category-box">
                              <div class="category-list">
                                  <ul>
                                      <li>
                                          <span>SKU:</span> {{ $book->isbn }}
                                      </li>
                                      <li>
                                          <span>Category:</span> {{ $book->category->name }}
                                      </li>
                                  </ul>
                                  <ul>
                                      <li>
                                          <span>Tags:</span> {{ $book->tags }}
                                      </li>
                                      <li>
                                          <span>Format:</span> {{ $book->format }}
                                      </li>
                                  </ul>
                                  <ul>
                                      <li>
                                          <span>Total page:</span> {{ $book->pages }}
                                      </li>
                                      <li>
                                          <span>Language:</span> {{ $book->language }}
                                      </li>
                                  </ul>
                                  <ul>
                                      <li>
                                          <span>Publish Years:</span> {{ $book->publish_year }}
                                      </li>
                                      <li>
                                          <span>Century:</span> {{ $book->country->name }}
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="box-check">
                              <div class="check-list">
                                  <ul>
                                      <li>
                                          <i class="fa-solid fa-check"></i>
                                          Free shipping orders from $150
                                      </li>
                                      <li>
                                          <i class="fa-solid fa-check"></i>
                                          30 days exchange & return
                                      </li>
                                  </ul>
                                  <ul>
                                      <li>
                                          <i class="fa-solid fa-check"></i>
                                          Mamaya Flash Discount: Starting at 30% Off
                                      </li>
                                      <li>
                                          <i class="fa-solid fa-check"></i>
                                          Safe & Secure online shopping
                                      </li>
                                  </ul>
                              </div>
                          </div>
                          <div class="social-icon">
                              <h6>Also Available On:</h6>
                              <a href="https://www.customer.io/"><img src="{{ asset('img/cutomerio.png') }}" alt="cutomer.io"></a>
                              <a href="https://www.amazon.com/"><img src="{{ asset('img/amazon.png') }}" alt="amazon"></a>
                              <a href="https://www.dropbox.com/"><img src="{{ asset('img/dropbox.png') }}" alt="dropbox"></a>
                          </div>
                      </div>
                  </div>
              </div>
  
              <div class="single-tab section-padding pb-0">
                  <ul class="nav mb-5" role="tablist">
                      <li class="nav-item" role="presentation">
                          <a href="#description" data-bs-toggle="tab" class="nav-link ps-0 active"
                              aria-selected="true" role="tab">
                              <h6>Description</h6>
                          </a>
                      </li>
                      <li class="nav-item" role="presentation">
                          <a href="#additional" data-bs-toggle="tab" class="nav-link" aria-selected="false"
                              tabindex="-1" role="tab">
                              <h6>Additional Information </h6>
                          </a>
                      </li>
                      <li class="nav-item" role="presentation">
                          <a href="#review" data-bs-toggle="tab" class="nav-link" aria-selected="false" tabindex="-1"
                              role="tab">
                              <h6>reviews (3)</h6>
                          </a>
                      </li>
                  </ul>
                  <div class="tab-content">
                      <div id="description" class="tab-pane fade show active" role="tabpanel">
                          <div class="description-items">
                              <p>
                                {{ $book->description }}
                              </p>
                          </div>
                      </div>
                      <div id="additional" class="tab-pane fade" role="tabpanel">
                          <div class="table-responsive">
                              <table class="table table-bordered">
                                  <tbody>
                                      <tr>
                                          <td class="text-1">Availability</td>
                                          <td class="text-2">Available</td>
                                      </tr>
                                      <tr>
                                          <td class="text-1">Categories</td>
                                          <td class="text-2"> {{ $book->category->name }}</td>
                                      </tr>
                                      <tr>
                                          <td class="text-1">Publish Date</td>
                                          <td class="text-2"> {{ $book->publish_year }}</td>
                                      </tr>
                                      <tr>
                                          <td class="text-1">Total Page</td>
                                          <td class="text-2">{{ $book->pages }}</td>
                                      </tr>
                                      <tr>
                                          <td class="text-1">Format</td>
                                          <td class="text-2">{{ $book->format }}</td>
                                      </tr>
                                      <tr>
                                          <td class="text-1">Country</td>
                                          <td class="text-2">{{ $book->country->name }}</td>
                                      </tr>
                                      <tr>
                                          <td class="text-1">Language</td>
                                          <td class="text-2">{{ $book->language }}</td>
                                      </tr>
                                      <tr>
                                          <td class="text-1">Dimensions</td>
                                          <td class="text-2">30 × 32 × 46 Inches</td>
                                      </tr>
                                      <tr>
                                          <td class="text-1">Weight</td>
                                          <td class="text-2">{{ $book->weight }}</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                      <div id="review" class="tab-pane fade" role="tabpanel">
                          <div class="review-items">
                              <div class="review-wrap-area d-flex gap-4">
                                  <div class="review-thumb">
                                      <img src="{{ asset('img/shop-details/review.png') }}" alt="img">
                                  </div>
                                  <div class="review-content">
                                      <div
                                          class="head-area d-flex flex-wrap gap-2 align-items-center justify-content-between">
                                          <div class="cont">
                                              <h5><a href="{{ route('website.shop-details') }}">Leslie Alexander</a></h5>
                                              <span>February 10, 2024 at 2:37 pm</span>
                                          </div>
                                          <div class="star">
                                              <i class="fa-solid fa-star"></i>
                                              <i class="fa-solid fa-star"></i>
                                              <i class="fa-solid fa-star"></i>
                                              <i class="fa-solid fa-star"></i>
                                              <i class="fa-regular fa-star"></i>
                                          </div>
                                      </div>
                                      <p class="mt-30 mb-4">
                                          Neque porro est qui dolorem ipsum quia quaed inventor veritatis et quasi
                                          architecto var sed efficitur turpis gilla sed sit amet finibus eros. Lorem
                                          Ipsum is <br> simply dummy
                                      </p>
                                  </div>
                              </div>
                              <div class="review-title mt-5 py-15 mb-30">
                                  <h4>Your Rating*</h4>
                                  <div class="rate-now d-flex align-items-center">
                                      <p>Your Rating*</p>
                                      <div class="star">
                                          <i class="fa-light fa-star"></i>
                                          <i class="fa-light fa-star"></i>
                                          <i class="fa-light fa-star"></i>
                                          <i class="fa-light fa-star"></i>
                                          <i class="fa-light fa-star"></i>
                                      </div>
                                  </div>
                              </div>
                              <div class="review-form">
                                  <form action="#" id="contact-form" method="POST">
                                      <div class="row g-4">
                                          <div class="col-lg-6">
                                              <div class="form-clt">
                                                  <span>Your Name*</span>
                                                  <input type="text" name="name" id="name" placeholder="Your Name">
                                              </div>
                                          </div>
                                          <div class="col-lg-6">
                                              <div class="form-clt">
                                                  <span>Your Email*</span>
                                                  <input type="text" name="email" id="email" placeholder="Your Email">
                                              </div>
                                          </div>
                                          <div class="col-lg-12 wow fadeInUp animated" data-wow-delay=".8">
                                              <div class="form-clt">
                                                  <span>Message*</span>
                                                  <textarea name="message" id="message"
                                                      placeholder="Write Message"></textarea>
                                              </div>
                                          </div>
                                          <div class="col-lg-12 wow fadeInUp animated" data-wow-delay=".9">
                                              <div class="form-check d-flex gap-2 from-customradio">
                                                  <input type="checkbox" class="form-check-input"
                                                      name="flexRadioDefault" id="flexRadioDefault12">
                                                  <label class="form-check-label" for="flexRadioDefault12">
                                                      i accept your terms & conditions
                                                  </label>
                                              </div>
                                              <button type="submit" class="theme-btn">
                                                  Submit now
                                              </button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <!-- Top Ratting Book Section Start -->
  <section class="top-ratting-book-section fix section-padding pt-0">
      <div class="container">
          <div class="section-title text-center">
              <h2 class="mb-3 wow fadeInUp" data-wow-delay=".3s">Related Products</h2>
              <p class="wow fadeInUp" data-wow-delay=".5s">
                  Interdum et malesuada fames ac ante ipsum primis in faucibus. <br> Donec at nulla nulla. Duis
                  posuere ex lacus
              </p>
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

                                          <img class="icon" src="assets/img/icon/shuffle.svg" alt="svg-icon">
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