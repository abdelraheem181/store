<!DOCTYPE html>
<html lang="en">

<head>
      <!-- ========== Meta Tags ========== -->
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="gramentheme">
      <meta name="description" content="Bookle - Book Store WooCommerce Html Template ">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- ======== Page title ============ -->
      <title>Bookle - Book Store WooCommerce Html Template</title>
      <!--<< Favcion >>-->
      <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
      <!--<< Bootstrap min.css >>-->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <!--<< All Min Css >>-->
      <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
      <!--<< Animate.css >>-->
      <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
      <!--<< Magnific Popup.css >>-->
      <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
      <!--<< MeanMenu.css >>-->
      <link rel="stylesheet" href="{{ asset('css/meanmenu.css') }}">
      <!--<< Swiper Bundle.css >>-->
      <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
      <!--<< Nice Select.css >>-->
      <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
      <!--<< Icomoon.css >>-->
      <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
      <!--<< Main.css >>-->
      <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  </head>
<body>
      <!-- Cursor follower -->
      <div class="cursor-follower"></div>

      <!-- Preloader Start -->
      <div id="preloader" class="preloader">
          <div class="animation-preloader">
              <div class="spinner">
              </div>
              <div class="txt-loading">
                  <span data-text-preloader="B" class="letters-loading">
                      B
                  </span>
                  <span data-text-preloader="O" class="letters-loading">
                      O
                  </span>
                  <span data-text-preloader="O" class="letters-loading">
                      O
                  </span>
                  <span data-text-preloader="K" class="letters-loading">
                      K
                  </span>
                  <span data-text-preloader="L" class="letters-loading">
                      L
                  </span>
                  <span data-text-preloader="E" class="letters-loading">
                      E
                  </span>
              </div>
              <p class="text-center">Loading</p>
          </div>
          <div class="loader">
              <div class="row">
                  <div class="col-3 loader-section section-left">
                      <div class="bg"></div>
                  </div>
                  <div class="col-3 loader-section section-left">
                      <div class="bg"></div>
                  </div>
                  <div class="col-3 loader-section section-right">
                      <div class="bg"></div>
                  </div>
                  <div class="col-3 loader-section section-right">
                      <div class="bg"></div>
                  </div>
              </div>
          </div>
      </div>
  
      <!-- Back To Top Start -->
      <button id="back-top" class="back-to-top">
          <i class="fa-solid fa-chevron-up"></i>
      </button>
  
      <!-- Offcanvas Area Start -->
      <div class="fix-area">
          <div class="offcanvas__info">
              <div class="offcanvas__wrapper">
                  <div class="offcanvas__content">
                      <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                          <div class="offcanvas__logo">
                              <a href="{{ route('website.index') }}">
                                  <img src="{{ asset('img/logo/black-logo.svg') }}" alt="logo-img">
                              </a>
                          </div>
                          <div class="offcanvas__close">
                              <button>
                                  <i class="fas fa-times"></i>
                              </button>
                          </div>
                      </div>
                      <p class="text d-none d-xl-block">
                          Nullam dignissim, ante scelerisque the is euismod fermentum odio sem semper the is erat, a
                          feugiat leo urna eget eros. Duis Aenean a imperdiet risus.
                      </p>
                      <div class="mobile-menu fix mb-3"></div>
                      <div class="offcanvas__contact">
                          <h4>Contact Info</h4>
                          <ul>
                              <li class="d-flex align-items-center">
                                  <div class="offcanvas__contact-icon">
                                      <i class="fal fa-map-marker-alt"></i>
                                  </div>
                                  <div class="offcanvas__contact-text">
                                      <a target="_blank" href="index-2.html">Main Street, Melbourne, Australia</a>
                                  </div>
                              </li>
                              <li class="d-flex align-items-center">
                                  <div class="offcanvas__contact-icon mr-15">
                                      <i class="fal fa-envelope"></i>
                                  </div>
                                  <div class="offcanvas__contact-text">
                                      <a href="mailto:info@example.com"><span
                                              class="mailto:info@example.com">info@example.com</span></a>
                                  </div>
                              </li>
                              <li class="d-flex align-items-center">
                                  <div class="offcanvas__contact-icon mr-15">
                                      <i class="fal fa-clock"></i>
                                  </div>
                                  <div class="offcanvas__contact-text">
                                      <a target="_blank" href="index-2.html">Mod-friday, 09am -05pm</a>
                                  </div>
                              </li>
                              <li class="d-flex align-items-center">
                                  <div class="offcanvas__contact-icon mr-15">
                                      <i class="far fa-phone"></i>
                                  </div>
                                  <div class="offcanvas__contact-text">
                                      <a href="tel:+11002345909">+11002345909</a>
                                  </div>
                              </li>
                          </ul>
                          <div class="header-button mt-4">
                              <a href="{{ route('website.contact') }}" class="theme-btn text-center">
                                  Get A Quote <i class="fa-solid fa-arrow-right-long"></i>
                              </a>
                          </div>
                          <div class="social-icon d-flex align-items-center">
                              <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                              <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                              <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                              <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="offcanvas__overlay"></div>

      
    <div class="header-top-1">
        <div class="container">
            <div class="header-top-wrapper">
                <ul class="contact-list">
                    <li>
                        <i class="fa-regular fa-phone"></i>
                        <a href="tel:+20866660112">+966530708634</a>
                    </li>
                    <li>
                        <i class="far fa-envelope"></i>
                        <a href="mailto:info@example.com">abdelraheem181@gmail.com</a>
                    </li>
                    <li>
                        <i class="far fa-clock"></i>
                        <span>Sunday - Fri: 9 aM - 6 pM</span>
                    </li>
                </ul>
                <ul class="list">
                    <li><i class="fa-light fa-comments"></i><a href="contact.html">Live Chat</a></li>
                    <li>



                        <!-- Login and Logout -->
                        @guest 
                        <i class="fa-light fa-user"></i>
                        <button data-bs-toggle="modal" data-bs-target="#loginModal">
                            Login
                        </button>
                        @endguest

                        <!-- Login and Logout -->
                        @auth
                       <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <i class="fa-light fa-user"></i>
                        <button type="submit">
                            Logout
                        </button>
                       </form>
                        @endauth


                    </li>
                </ul>
            </div>
        </div>
    </div>
  
      <!-- Sticky Header Section start  -->
      <header class="header-2 sticky-header">
          <div class="mega-menu-wrapper">
              <div class="header-main">
                  <div class="container">
                      <div class="row">
                          <div class="col-6 col-xl-9">
                              <div class="header-left">
                                  <div class="logo">
                                      <a href="{{ route('website.index') }}" class="header-logo">
                                          <img src="{{ asset('img/logo/black-logo.svg') }}" alt="logo-img">
                                      </a>
                                  </div>
                                  <div class="mean__menu-wrapper">
                                      <div class="main-menu">
                                          <nav id="mobile-menu">
                                              <ul>
                                                   <li>
                                                      <a href="{{ route('website.index') }}">
                                                          Home
                                                          <i class="fas fa-angle-down"></i>
                                                      </a>
                                                      <ul class="submenu">
                                                          <li><a href="{{ route('website.index') }}">Home 01</a></li>
                                                          <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                                      </ul>
                                                  </li> 
                                               
                                                  {{-- <li>
                                                    <a href="{{ route('website.index') }}">Home</a>
                                                  </li> --}}

                                                  <li>
                                                      <a href="{{ route('website.shop') }}">
                                                          Shop
                                                          <i class="fas fa-angle-down"></i>
                                                      </a>
                                                      <ul class="submenu">
                                                          <li><a href="{{ route('website.shop') }}">Shop Default</a></li>
                                                          <li><a href="{{ route('website.shop-list') }}">Shop List</a></li>
                                                  
                                                          <li><a href="{{ route('website.shop-cart') }}">Shop Cart</a></li>
                                                          <li><a href="{{ route('website.wishlist') }}">Wishlist</a></li>
                                                          <li><a href="{{ route('website.checkout') }}">Checkout</a></li>
                                                      </ul>
                                                  </li>
                                                
 
                                                    <li>
                                                        <a href="{{ route('website.team') }}">Author
                                                            
                                                        </a>
                                                    </li>
                                                                 
                                            
                                               <!--   <li>
                                                      <a href="news.html">
                                                          Blog
                                                          <i class="fas fa-angle-down"></i>
                                                      </a>
                                                      <ul class="submenu">
                                                          <li><a href="news-grid.html">Blog Grid</a></li>
                                                          <li><a href="news.html">Blog List</a></li>
                                                          <li><a href="news-details.html">Blog Details</a></li>
                                                      </ul>
                                                  </li> -->
                                                  <li>
                                                      <a href="{{ route('website.contact') }}">Contact</a>
                                                  </li>
                                                  <li>
                                                    <a href="{{ route('website.about') }}">About Us</a>
                                                  </li>

 
                                               
                                                
                                              </ul>
                                          </nav>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-6 col-xl-3">
                              <div class="header-right">
                                  <div class="category-oneadjust gap-6 d-flex align-items-center">
                                      <div class="icon">
                                          <i class="fa-sharp fa-solid fa-grid-2"></i>
                                      </div>
                                      <select name="cate" class="category">
                                          <option value="1">
                                              Category
                                          </option>
                                          <option value="1">
                                              Web Design
                                          </option>
                                          <option value="1">
                                              Web Development
                                          </option>
                                          <option value="1">
                                              Graphic Design
                                          </option>
                                          <option value="1">
                                              Softwer Eng
                                          </option>
                                      </select>
                                      <form action="#" class="search-toggle-box d-md-block">
                                          <div class="input-area">
                                              <input type="text" placeholder="Author">
                                              <button class="cmn-btn">
                                                  <i class="far fa-search"></i>
                                              </button>
                                          </div>
                                      </form>
                                  </div>
                                  <div class="menu-cart">
                                      <a href="{{ route('website.wishlist') }}" class="cart-icon">
                                          <i class="fa-regular fa-heart"></i>
                                      </a>
                                      <a id="cart-icon" href="{{ route('website.shop-cart') }}" class="cart-icon">
                                          <i class="fa-regular fa-cart-shopping"></i>
                                          @if($cartCount > 0)
                                              <span class="cart-badge">{{ $cartCount }}</span>
                                          @endif
                                      </a>
                                      <div class="header-humbager ml-30">
                                          <a class="sidebar__toggle" href="javascript:void(0)">
                                              <div class="bar-icon-2">
                                                  <img src="{{ asset('img/icon/icon-13.svg') }}" alt="img">
                                              </div>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
  
  
              </div>
          </div>
      </header>
  
      <!-- Main Header Section start  -->
      <div class="header-2-section">
          <div class="container">
              <div class="header-2-wrapper">
                  <div class="header-top-logo">
                      <a href="{{ route('website.index') }}">
                          <img src="{{ asset('img/logo/black-logo.svg') }}" alt="img">
                      </a>
                  </div>
                  <div class="header-2-right">
  
                      <div class="category-oneadjust gap-6 d-flex align-items-center">
                          <div class="bd-header__category-nav p-relative">
                              <div class="bd-category__click style-2">
                                  <span><i class="icon-icon-15"></i> Categories </span>
                              </div>
                              <div class="category__items-2" style="display: none;">
                                  <div class="category-item">
                                      <nav>
                                          <ul>

                                            {{-- get all categories --}}
                                            @foreach(App\Models\Category::all() as $category)
                                              <li>
                                                  <a href="{{ route('website.shop-details', $category->id) }}">
                                                      <span>{{ $category->name }}</span>
                                                      <span>({{ App\Models\Book::where('category_id', $category->id)->count() }})</span>
                                                  </a>
                                              </li>
                                            @endforeach 

                                          </ul>
                                      </nav>
                                  </div>
                              </div>
                          </div>
                          <form action="#" class="search-toggle-box d-md-block">
                              <div class="input-area">
                                  <input type="text" placeholder="Search For books for keyword">
                                  <button class="cmn-btn">
                                      <i class="far fa-search"></i>
                                  </button>
                              </div>
                          </form>
                      </div>
                      <div class="author-icon">
                          <div class="icon">
                              <img src="{{ asset('img/icon/icon-23.svg') }}" alt="icon">
                          </div>
                          <div class="content">
                              <span>Call Us Now</span>
                              <h5>
                                  <a href="tel:+2085550112">+966530708634</a>
                              </h5>
                          </div>
                      </div>
                      <div class="menu-cart">
                          <a href="{{ route('website.wishlist') }}" class="cart-icon">
                              <i class="fa-regular fa-heart"></i>
                          </a>
                          <a href="{{ route('website.shop-cart') }}" class="cart-icon">
                              <i class="fa-regular fa-cart-shopping"></i>
                              @if($cartCount > 0)
                                  <span class="cart-badge">{{ $cartCount }}</span>
                              @endif
                          </a>
                          <div class="header-humbager ml-30">
                              <a class="sidebar__toggle" href="javascript:void(0)">
                                  <div class="bar-icon-2">
                                      <img src="{{ asset('img/icon/icon-13.svg') }}" alt="img">
                                  </div>
                              </a>
                          </div>
                          @guest
                             <button type="button" class="theme-btn rounded-1" data-bs-toggle="modal"
                              data-bs-target="#registrationModal">
                              Sign Up
                            </button>
                          @endguest
                      </div>
                  </div>
              </div>
          </div>
      </div>
  
       <!-- Login Modal -->
       <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-body">
                      <div class="close-btn">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="identityBox">
                          <div class="form-wrapper">
                              <h1 id="loginModalLabel">welcome back!</h1>
                              <form action="{{ route('login') }}" method="POST">
                                @csrf
                              <input class="inputField" type="email" name="email" placeholder="Email Address">
                              <input class="inputField" type="password" name="password" placeholder="Enter Password">
                              <div class="input-check remember-me">
                                  <div class="checkbox-wrapper">
                                      <input type="checkbox" class="form-check-input" name="save-for-next"
                                          id="saveForNext">
                                      <label for="saveForNext">Remember me</label>
                                  </div>
                                  <div class="text"> <a href="{{ route('password.request') }}">Forgot Your password?</a> </div>
                              </div>
                           
                              <div class="loginBtn">
                                  <button type="submit" class="theme-btn rounded-0"> Log in </button>
                              </div>

                              </form>

                              <div class="orting-badge">
                                  Or
                              </div>
                              <div>
                                  <a class="another-option" href="https://www.google.com/">
                                      <img src="{{ asset('img/google.png') }}" alt="google">
                                      Continue With Google
                                  </a>
                              </div>
                              <div>
                                  <a class="another-option another-option-two" href="https://www.facebook.com/">
                                      <img src="{{ asset('img/facebook.png') }}" alt="google">
                                      Continue With Facebook
                                  </a>
                              </div>
  
                              <div class="form-check-3 d-flex align-items-center from-customradio-2 mt-3">
                                  <input class="form-check-input" type="radio" name="flexRadioDefault">
                                  <label class="form-check-label">
                                      I Accept Your Terms & Conditions
                                  </label>
                              </div>
                          </div>
  
                          <div class="banner">
                              <button type="button" class="rounded-0 login-btn" data-bs-toggle="modal"
                                  data-bs-target="#loginModal">Log in</button>
                              <button type="button" class="theme-btn rounded-0 register-btn" data-bs-toggle="modal"
                                  data-bs-target="#registrationModal">Create
                                  Account</button>
                              <div class="loginBg">
                                          <img src="{{ asset('img/signUpbg.jpg') }}" alt="signUpBg">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      
      <!-- Registration Modal -->
      <div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-body">
                      <div class="close-btn">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="identityBox">
                          <div class="form-wrapper">
                              <h1 id="registrationModalLabel">Create account!</h1>
                              <form action="{{ route('register') }}" method="POST" id="registerForm" class="enhanced-register-form">
                                @csrf
                                
                                <!-- Name Field -->
                                <div class="form-group">
                                    <div class="input-wrapper">
                                        <i class="fas fa-user input-icon"></i>
                                        <input type="text" name="name" id="name" class="form-input" placeholder="Full Name" required>
                                        <div class="input-focus-line"></div>
                                    </div>
                                    <div class="error-message" id="name-error"></div>
                                </div>

                                <!-- Email Field -->
                                <div class="form-group">
                                    <div class="input-wrapper">
                                        <i class="fas fa-envelope input-icon"></i>
                                        <input type="email" name="email" id="email" class="form-input" placeholder="Email Address" required>
                                        <div class="input-focus-line"></div>
                                    </div>
                                    <div class="error-message" id="email-error"></div>
                                </div>

                                <!-- Password Field -->
                                <div class="form-group">
                                    <div class="input-wrapper">
                                        <i class="fas fa-lock input-icon"></i>
                                        <input type="password" name="password" id="password" class="form-input" placeholder="Enter Password" required minlength="8">
                                        <button type="button" class="password-toggle" id="password-toggle">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <div class="input-focus-line"></div>
                                    </div>
                                    <div class="password-strength" id="password-strength">
                                        <div class="strength-bar">
                                            <div class="strength-fill"></div>
                                        </div>
                                        <span class="strength-text">Password strength</span>
                                    </div>
                                    <div class="error-message" id="password-error"></div>
                                </div>

                                <!-- Confirm Password Field -->
                                <div class="form-group">
                                    <div class="input-wrapper">
                                        <i class="fas fa-lock input-icon"></i>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" placeholder="Confirm Password" required>
                                        <button type="button" class="password-toggle" id="confirm-password-toggle">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <div class="input-focus-line"></div>
                                    </div>
                                    <div class="error-message" id="password_confirmation-error"></div>
                                </div>

                                <!-- Terms and Conditions -->
                                <div class="form-group terms-group">
                                  <div class="checkbox-wrapper">
                                      <input type="checkbox" class="form-check-input" name="terms" id="terms" required>
                                        <label for="terms" class="terms-label">
                                            <span class="checkmark"></span>
                                            I agree to the <a href="#" target="_blank" class="terms-link">Terms and Conditions</a>
                                        </label>
                                  </div>
                                    <div class="error-message" id="terms-error"></div>
                              </div>

                                <!-- Submit Button -->
                                <div class="form-group">
                                    <button type="submit" class="theme-btn enhanced-submit-btn" id="submitBtn">
                                        <span class="btn-text">Create Account</span>
                                        <span class="btn-loading">
                                            <i class="fas fa-spinner fa-spin"></i>
                                            Creating Account...
                                        </span>
                                    </button>
                              </div>

                                <!-- Login Link -->
                                <div class="form-footer">
                                    <p>Already have an account? <a href="{{ route('login') }}" class="login-link">Sign In</a></p>
                              </div>
                              </form>

                              <div class="orting-badge">
                                  Or
                              </div>
                              <div>
                                  <a class="another-option" href="https://www.google.com/">
                                      <img src="{{ asset('img/google.png') }}" alt="google">
                                      Continue With Google
                                  </a>
                              </div>
                              <div>
                                  <a class="another-option another-option-two" href="https://www.facebook.com/">
                                      <img src="{{ asset('img/facebook.png') }}" alt="google">
                                      Continue With Facebook
                                  </a>
                              </div>
                              <div class="form-check-3 d-flex align-items-center from-customradio-2 mt-3">
                                  <input class="form-check-input" type="radio" name="flexRadioDefault">
                                  <label class="form-check-label">
                                      I Accept Your Terms & Conditions
                                  </label>
                              </div>
                          </div>
  
                          <div class="banner">
                              <button type="button" class="rounded-0 login-btn" data-bs-toggle="modal"
                                  data-bs-target="#loginModal">Log in</button>
                              <button type="button" class="theme-btn rounded-0 register-btn" data-bs-toggle="modal"
                                  data-bs-target="#registrationModal">Create
                                  Account</button>
                              <div class="signUpBg">
                                  <img src="{{ asset('img/registrationbg.jpg') }}" alt="signUpBg">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Wrapper Start -->
      @yield('content')

      <!-- Wrapper End -->

        <!-- Footer Section Start -->
    <footer class="footer-section footer-bg">
      <div class="container">
          <div class="contact-info-area">
              <div class="contact-info-items wow fadeInUp" data-wow-delay=".2s">
                  <div class="icon">
                      <i class="icon-icon-5"></i>
                  </div>
                  <div class="content">
                      <p>Call Us 7/24</p>
                      <h3>
                          <a href="tel:+2085550112">+966530708634</a>
                      </h3>
                  </div>
              </div>
              <div class="contact-info-items wow fadeInUp" data-wow-delay=".4s">
                  <div class="icon">
                      <i class="icon-icon-6"></i>
                  </div>
                  <div class="content">
                      <p>Make a Quote</p>
                      <h3>
                          <a href="mailto:example@gmail.com">abdelrahman181@gmail.com</a>
                      </h3>
                  </div>
              </div>
              <div class="contact-info-items wow fadeInUp" data-wow-delay=".6s">
                  <div class="icon">
                      <i class="icon-icon-7"></i>
                  </div>
                  <div class="content">
                      <p>Opening Hour</p>
                      <h3>
                          Sunday - Fri: 9 aM - 6 pM
                      </h3>
                  </div>
              </div>
              <div class="contact-info-items wow fadeInUp" data-wow-delay=".8s">
                  <div class="icon">
                      <i class="icon-icon-8"></i>
                  </div>
                  <div class="content">
                      <p>Location</p>
                      <h3>
                          4517 Washington ave.
                      </h3>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer-widgets-wrapper">
          <div class="plane-shape float-bob-y">
              <img src="{{ asset('img/plane-shape.png') }}" alt="img">
          </div>
          <div class="container">
              <div class="row">
                  <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                      <div class="single-footer-widget">
                          <div class="widget-head">
                              <a href="index.html">
                                          <img src="{{ asset('img/logo/white-logo.svg') }}" alt="logo-img">
                              </a>
                          </div>
                          <div class="footer-content">
                              <p>
                                  Phasellus ultricies aliquam volutpat ullamcorper laoreet neque, a lacinia curabitur
                                  lacinia mollis
                              </p>
                              <div class="social-icon d-flex align-items-center">
                                  <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                  <a href="https://x.com/"><i class="fab fa-twitter"></i></a>
                                  <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                  <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".4s">
                      <div class="single-footer-widget">
                          <div class="widget-head">
                              <h3>Costumers Support</h3>
                          </div>
                          <ul class="list-area">
                              <li>
                                  <a href="shop.html">
                                      <i class="fa-solid fa-chevrons-right"></i>
                                      Store List
                                  </a>
                              </li>
                              <li>
                                  <a href="contact.html">
                                      <i class="fa-solid fa-chevrons-right"></i>
                                      Opening Hours
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ route('website.contact') }}">
                                      <i class="fa-solid fa-chevrons-right"></i>
                                      Contact Us
                                  </a>
                              </li>
                              <li>
                                  <a href="contact.html">
                                      <i class="fa-solid fa-chevrons-right"></i>
                                      Return Policy
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".6s">
                      <div class="single-footer-widget">
                          <div class="widget-head">
                              <h3>Categories</h3>
                          </div>
                          <ul class="list-area">
                              <li>
                                  <a href="shop.html">
                                      <i class="fa-solid fa-chevrons-right"></i>
                                      Novel Books
                                  </a>
                              </li>
                              <li>
                                  <a href="shop.html">
                                      <i class="fa-solid fa-chevrons-right"></i>
                                      Poetry Books
                                  </a>
                              </li>
                              <li>
                                  <a href="contact.html">
                                      <i class="fa-solid fa-chevrons-right"></i>
                                      Political Books
                                  </a>
                              </li>
                              <li>
                                  <a href="contact.html">
                                      <i class="fa-solid fa-chevrons-right"></i>
                                      History Books
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                      <div class="single-footer-widget">
                          <div class="widget-head">
                              <h3>Newsletter</h3>
                          </div>
                          <div class="footer-content">
                              <p>Sign up to searing weekly newsletter to get the latest updates.</p>
                              <div class="footer-input">
                                  <input type="email" id="email2" placeholder="Enter Email Address">
                                  <button class="newsletter-btn" type="submit">
                                      <i class="fa-regular fa-paper-plane"></i>
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer-bottom">
          <div class="container">
              <div class="footer-wrapper d-flex align-items-center justify-content-between">
                  <p class="wow fadeInLeft" data-wow-delay=".3s">
                      © All Copyright 2024 by <a href="{{ route('website.index') }}">Bookle</a>
                  </p>
                  <ul class="brand-logo wow fadeInRight" data-wow-delay=".5s">
                      <li>
                          <a href="contact.html">
                              <img src="{{ asset('img/visa-logo.png') }}" alt="img">
                          </a>
                      </li>
                      <li>
                          <a href="contact.html">
                              <img src="{{ asset('img/mastercard.png') }}" alt="img">
                          </a>
                      </li>
                      <li>
                          <a href="contact.html">
                              <img src="{{ asset('img/payoneer.png') }}" alt="img">
                          </a>
                      </li>
                      <li>
                          <a href="contact.html">
                              <img src="{{ asset('img/affirm.png') }}" alt="img">
                          </a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </footer>

  <!--<< All JS Plugins >>-->
  <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
  <!--<< Viewport Js >>-->
  <script src="{{ asset('js/viewport.jquery.js') }}"></script>
  <!--<< Bootstrap Js >>-->
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  <!--<< Nice Select Js >>-->
  <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
  <!--<< Waypoints Js >>-->
  <script src="{{ asset('js/jquery.waypoints.js') }}"></script>
  <!--<< Counterup Js >>-->
  <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
  <!--<< Swiper Slider Js >>-->
  <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
  <!--<< MeanMenu Js >>-->
  <script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
  <!--<< Magnific Popup Js >>-->
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <!--<< Wow Animation Js >>-->
  <script src="{{ asset('js/wow.min.js') }}"></script>
  <!-- Gsap -->
  <script src="{{ asset('js/gsap.min.js') }}"></script>
  <!--<< Main.js >>-->
  <script>
    // Set authentication status for JavaScript
    window.isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
    window.currentUserId = {{ auth()->check() ? auth()->id() : 'null' }};
  </script>

  <script src="{{ asset('js/main.js') }}"></script>

 

  @stack('scripts')


  <!-- Enhanced Registration Form JavaScript -->
  <script>
  // Show session notifications with fallback
  function showSessionNotifications() {
      @if(session('success'))
          if (typeof showNotification === 'function') {
              showNotification("{{ session('success') }}", 'success');
          } else {
              // Fallback notification if showNotification is not available
              setTimeout(function() {
                  if (typeof showNotification === 'function') {
                      showNotification("{{ session('success') }}", 'success');
                  }
              }, 100);
          }
      @endif
      @if(session('error'))
          if (typeof showNotification === 'function') {
              showNotification("{{ session('error') }}", 'error');
          } else {
              // Fallback notification if showNotification is not available
              setTimeout(function() {
                  if (typeof showNotification === 'function') {
                      showNotification("{{ session('error') }}", 'error');
                  }
              }, 100);
          }
      @endif
  }

  // Try to show notifications immediately, then again after DOM is ready
  showSessionNotifications();
  
  document.addEventListener('DOMContentLoaded', function() {
      showSessionNotifications();
  
      
      // Form validation rules
      const validationRules = {
          name: {
              required: true,
              minLength: 2,
              pattern: /^[a-zA-Z\s]+$/,
              message: 'Please enter a valid name (letters and spaces only)'
          },
          email: {
              required: true,
              pattern: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
              message: 'Please enter a valid email address'
          },
          password: {
              required: true,
              minLength: 8,
              pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/,
              message: 'Password must be at least 8 characters with uppercase, lowercase, number, and special character'
          },
          password_confirmation: {
              required: true,
              match: 'password',
              message: 'Passwords do not match'
          },
          terms: {
              required: true,
              message: 'You must agree to the terms and conditions'
          }
      };

      // Password strength checker
      function checkPasswordStrength(password) {
          const strengthIndicator = document.getElementById('password-strength');
          const strengthFill = strengthIndicator.querySelector('.strength-fill');
          const strengthText = strengthIndicator.querySelector('.strength-text');
          
          let score = 0;
          let feedback = '';
          
          if (password.length >= 8) score++;
          if (/[a-z]/.test(password)) score++;
          if (/[A-Z]/.test(password)) score++;
          if (/\d/.test(password)) score++;
          if (/[@$!%*?&]/.test(password)) score++;
          
          strengthIndicator.classList.add('show');
          
          if (score < 2) {
              strengthFill.className = 'strength-fill weak';
              feedback = 'Weak';
          } else if (score < 3) {
              strengthFill.className = 'strength-fill fair';
              feedback = 'Fair';
          } else if (score < 5) {
              strengthFill.className = 'strength-fill good';
              feedback = 'Good';
          } else {
              strengthFill.className = 'strength-fill strong';
              feedback = 'Strong';
          }
          
          strengthText.textContent = `Password strength: ${feedback}`;
      }

      // Password toggle functionality
      function setupPasswordToggle(toggleId, inputId) {
          const toggle = document.getElementById(toggleId);
          const input = document.getElementById(inputId);
          
          if (toggle && input) {
              toggle.addEventListener('click', function() {
                  const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                  input.setAttribute('type', type);
                  
                  const icon = toggle.querySelector('i');
                  icon.classList.toggle('fa-eye');
                  icon.classList.toggle('fa-eye-slash');
              });
          }
      }

      // Field validation
      function validateField(fieldName, value) {
          const rule = validationRules[fieldName];
          if (!rule) return true;
          
          if (rule.required && (!value || value.trim() === '')) {
              return 'This field is required';
          }
          
          if (value && rule.minLength && value.length < rule.minLength) {
              return `Must be at least ${rule.minLength} characters`;
          }
          
          if (value && rule.pattern && !rule.pattern.test(value)) {
              return rule.message;
          }
          
          if (rule.match && value !== document.getElementById(rule.match).value) {
              return rule.message;
          }
          
          return null;
      }

      // Show/hide error message
      function showError(fieldName, message) {
          const errorElement = document.getElementById(`${fieldName}-error`);
          const inputWrapper = document.querySelector(`#${fieldName}`).closest('.input-wrapper');
          
          if (errorElement) {
              errorElement.textContent = message;
              errorElement.classList.add('show');
          }
          
          if (inputWrapper) {
              inputWrapper.classList.add('error');
              inputWrapper.classList.remove('success');
          }
      }

      function hideError(fieldName) {
          const errorElement = document.getElementById(`${fieldName}-error`);
          const inputWrapper = document.querySelector(`#${fieldName}`).closest('.input-wrapper');
          
          if (errorElement) {
              errorElement.classList.remove('show');
          }
          
          if (inputWrapper) {
              inputWrapper.classList.remove('error');
              inputWrapper.classList.add('success');
          }
      }

      // Real-time validation
      function setupFieldValidation(fieldName) {
          const field = document.getElementById(fieldName);
          if (!field) return;
          
          field.addEventListener('blur', function() {
              const value = this.value.trim();
              const error = validateField(fieldName, value);
              
              if (error) {
                  showError(fieldName, error);
              } else {
                  hideError(fieldName);
              }
          });
          
          field.addEventListener('input', function() {
              // Clear error on input
              hideError(fieldName);
              
              // Special handling for password strength
              if (fieldName === 'password') {
                  checkPasswordStrength(this.value);
              }
          });
      }

    

      // Initialize all functionality
      setupPasswordToggle('password-toggle', 'password');
      setupPasswordToggle('confirm-password-toggle', 'password_confirmation');
      
      Object.keys(validationRules).forEach(fieldName => {
          setupFieldValidation(fieldName);
      });

      // Add smooth focus transitions
      document.querySelectorAll('.form-input').forEach(input => {
          input.addEventListener('focus', function() {
              this.closest('.input-wrapper').classList.add('focused');
          });
          
          input.addEventListener('blur', function() {
              this.closest('.input-wrapper').classList.remove('focused');
          });
      });
  });
  </script>
    
</body>
</html