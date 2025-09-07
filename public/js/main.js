/*-----------------------------------------------------------------

Template Name: Bookle - Book Store WooCommerce Html Template 
Author:  Gramentheme
Author URI: https://themeforest.net/user/gramentheme/portfolio
Version: 1.0.0
Description: Bookle - Book Store WooCommerce Html Template  
------------------------------------------------------------------*/
/*=================================
   Index Here
==================================*/
/*
01. Mobile Menu 
02. Sidebar Toggle 
03. Body Overlay
04. Video Popup
05. Counterup
06. Wow Animation
07. Nice Select
8.  Book Slider
09. Testimonial Slider
10. Team Slider
11. Range Slider
12. Quantity
13. Back to top btn
14. Category-click
15. Gsap Animation  
*/
/*=================================
   Index End
==================================*/

(function ($) {
    "use strict";

    $(document).ready(function () {

        // 01.Mobile Menu  
        $('#mobile-menu').meanmenu({
            meanMenuContainer: '.mobile-menu',
            meanScreenWidth: "1199",
            meanExpand: ['<i class="far fa-plus"></i>'],
        });

        // 02.Sidebar Toggle 
        $(".offcanvas__close,.offcanvas__overlay").on("click", function () {
            $(".offcanvas__info").removeClass("info-open");
            $(".offcanvas__overlay").removeClass("overlay-open");
        });
        $(".sidebar__toggle").on("click", function () {
            $(".offcanvas__info").addClass("info-open");
            $(".offcanvas__overlay").addClass("overlay-open");
        });

        // 03.Body Overlay 
        $(".body-overlay").on("click", function () {
            $(".offcanvas__area").removeClass("offcanvas-opened");
            $(".df-search-area").removeClass("opened");;
            $(".body-overlay").removeClass("opened");
        });


        $(window).on('scroll', function () {
            const mainHeaderHeight = $('.header-main').outerHeight();

            if ($(window).scrollTop() > mainHeaderHeight) {
                $('.sticky-header').css('transform', 'translateY(0)');
            } else {
                $('.sticky-header').css('transform', 'translateY(-180%)');
            }
        });

        // 04.Video Popup 
        $(".img-popup").magnificPopup({
            type: "image",
            gallery: {
                enabled: true,
            },
        });

        $('.video-popup').magnificPopup({
            type: 'iframe',
            callbacks: {
            }
        });

        // 05. Counterup 
        $(".count").counterUp({
            delay: 15,
            time: 4000,
        });

        // 06.Wow Animation 
        new WOW().init();

        // 07.Nice Select 
        $('select').niceSelect();

        //  08.Book Slider 
        if ($('.hero-book-slider').length > 0) {
            const heroBookSlider = new Swiper(".hero-book-slider", {
                spaceBetween: 30,
                speed: 2000,
                loop: true,

                navigation: {
                    nextEl: ".array-prev",
                    prevEl: ".array-next",
                },
            });
        }

        if ($('.book-slider').length > 0) {
            const bookSlider = new Swiper(".book-slider", {
                spaceBetween: 30,
                speed: 2000,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    1499: {
                        slidesPerView: 5,
                    },
                    1399: {
                        slidesPerView: 4,
                    },
                    1199: {
                        slidesPerView: 3,
                    },
                    991: {
                        slidesPerView: 3,
                    },
                    767: {
                        slidesPerView: 2,
                    },
                    575: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
        }

        if ($('.featured-books-slider').length > 0) {
            const featuredBookSlider = new Swiper(".featured-books-slider", {
                spaceBetween: 30,
                speed: 2000,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                centeredSlides: true,
                breakpoints: {
                    1499: {
                        slidesPerView: 2,
                    },
                    1399: {
                        slidesPerView: 2,
                    },
                    1199: {
                        slidesPerView: 1,
                    },
                    991: {
                        slidesPerView: 1,
                    },
                    767: {
                        slidesPerView: 1,
                    },
                    575: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
        }

        if ($('.book-catagories-slider').length > 0) {
            const bookCatagoriesSlider = new Swiper(".book-catagories-slider", {
                spaceBetween: 30,
                speed: 2000,
                loop: true,
                navigation: {
                    nextEl: ".array-prev",
                    prevEl: ".array-next",
                },
                breakpoints: {
                    1399: {
                        slidesPerView: 5,
                    },
                    1199: {
                        slidesPerView: 4,
                    },
                    991: {
                        slidesPerView: 3,
                    },
                    767: {
                        slidesPerView: 2,
                    },
                    575: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
        }

        //  09.Testimonial Slider  
        if ($('.testimonial-slider').length > 0) {
            const testimonialSlider = new Swiper(".testimonial-slider", {
                centeredSlides: true,
                spaceBetween: 30,
                speed: 2000,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    1399: {
                        slidesPerView: 3,
                    },
                    1199: {
                        slidesPerView: 2,
                        centeredSlides: false,
                    },
                    991: {
                        slidesPerView: 2,
                    },
                    575: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
        }

        //  10.Team Slider  
        if ($('.team-slider').length > 0) {
            const teamSlider = new Swiper(".team-slider", {
                spaceBetween: 30,
                speed: 2500,
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".array-prev",
                    prevEl: ".array-next",
                },
                breakpoints: {
                    1399: {
                        slidesPerView: 6,
                    },
                    1199: {
                        slidesPerView: 4,
                    },
                    991: {
                        slidesPerView: 3,
                    },
                    767: {
                        slidesPerView: 2,
                    },
                    575: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
        }

        // 11.Range sliger
        function getVals() {
            let parent = this.parentNode;
            let slides = parent.getElementsByTagName("input");
            let slide1 = parseFloat(slides[0].value);
            let slide2 = parseFloat(slides[1].value);
            if (slide1 > slide2) {
                let tmp = slide2;
                slide2 = slide1;
                slide1 = tmp;
            }

            let displayElement = parent.getElementsByClassName("rangeValues")[0];
            displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
        }

        window.onload = function () {
            let sliderSections = document.getElementsByClassName("range-slider");
            for (let x = 0; x < sliderSections.length; x++) {
                let sliders = sliderSections[x].getElementsByTagName("input");
                for (let y = 0; y < sliders.length; y++) {
                    if (sliders[y].type === "range") {
                        sliders[y].oninput = getVals;
                        sliders[y].oninput();
                    }
                }
            }
        }

        progressBar: () => {
            const pline = document.querySelectorAll(".progressbar.line");
            const pcircle = document.querySelectorAll(".progressbar.semi-circle");
            pline.forEach(e => {
                const line = new ProgressBar.Line(e, {
                    strokeWidth: 6,
                    trailWidth: 6,
                    duration: 3000,
                    easing: 'easeInOut',
                    text: {
                        style: {
                            color: 'inherit',
                            position: 'absolute',
                            right: '0',
                            top: '-30px',
                            padding: 0,
                            margin: 0,
                            transform: null
                        },
                        autoStyleContainer: false
                    },
                    step: (state, line) => {
                        line.setText(Math.round(line.value() * 100) + ' %');
                    }
                });
                let value = e.getAttribute('data-value') / 100;
                new Waypoint({
                    element: e,
                    handler: function () {
                        line.animate(value);
                    },
                    offset: 'bottom-in-view',
                })
            });
            pcircle.forEach(e => {
                const circle = new ProgressBar.SemiCircle(e, {
                    strokeWidth: 6,
                    trailWidth: 6,
                    duration: 2000,
                    easing: 'easeInOut',
                    step: (state, circle) => {
                        circle.setText(Math.round(circle.value() * 100));
                    }
                });
                let value = e.getAttribute('data-value') / 100;
                new Waypoint({
                    element: e,
                    handler: function () {
                        circle.animate(value);
                    },
                    offset: 'bottom-in-view',
                })
            });
        }

        const rangeInput = document.querySelectorAll(".range-input input"),
            priceInput = document.querySelectorAll(".price-input input"),
            range = document.querySelector(".slider .progress");
        let priceGap = 1000;

        priceInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minPrice = parseInt(priceInput[0].value),
                    maxPrice = parseInt(priceInput[1].value);

                if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
                    if (e.target.className === "input-min") {
                        rangeInput[0].value = minPrice;
                        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
                    } else {
                        rangeInput[1].value = maxPrice;
                        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                    }
                }
            });
        });

        rangeInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minVal = parseInt(rangeInput[0].value),
                    maxVal = parseInt(rangeInput[1].value);

                if (maxVal - minVal < priceGap) {
                    if (e.target.className === "range-min") {
                        rangeInput[0].value = maxVal - priceGap;
                    } else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                    range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            });
        });

        //12. Quantity 
        const inputs = document.querySelectorAll('#qty, #qty2, #qty3');
        const btnminus = document.querySelectorAll('.qtyminus');
        const btnplus = document.querySelectorAll('.qtyplus');

        if (inputs.length > 0 && btnminus.length > 0 && btnplus.length > 0) {

            inputs.forEach(function (input, index) {
                const min = Number(input.getAttribute('min'));
                const max = Number(input.getAttribute('max'));
                const step = Number(input.getAttribute('step'));

                function qtyminus(e) {
                    const current = Number(input.value);
                    const newval = (current - step);
                    if (newval < min) {
                        newval = min;
                    } else if (newval > max) {
                        newval = max;
                    }
                    input.value = Number(newval);
                    e.preventDefault();
                }

                function qtyplus(e) {
                    const current = Number(input.value);
                    const newval = (current + step);
                    if (newval > max) newval = max;
                    input.value = Number(newval);
                    e.preventDefault();
                }

                btnminus[index].addEventListener('click', qtyminus);
                btnplus[index].addEventListener('click', qtyplus);
            });
        }

        // 13.Back to top btn    
        $(window).scroll(function () {
            if ($(this).scrollTop() > 20) {
                $("#back-top").addClass("show");
            } else {
                $("#back-top").removeClass("show");
            }
        });
        $("#back-top").click(function () {
            $("html, body").animate({ scrollTop: 0 }, 800);
            return false;
        });

        // 14.Category-click
        $(".bd-category__click").click(function () {
            $(this).siblings(".category__items, .category__items-2, .category__items-3, .category__items-4").slideToggle();
            $(this).toggleClass("items-open");
        });

        //  15.Gsap Animation 
        if ($('.cursor-follower').length > 0) {
            var follower = $(".cursor-follower");

            var posX = 0,
                posY = 0;

            var mouseX = 0,
                mouseY = 0;

            TweenMax.to({}, 0.016, {
                repeat: -1,
                onRepeat: function () {
                    posX += (mouseX - posX) / 9;
                    posY += (mouseY - posY) / 9;

                    TweenMax.set(follower, {
                        css: {
                            left: posX - 12,
                            top: posY - 12
                        }
                    });
                }
            });

            $(document).on("mousemove", function (e) {
                mouseX = e.clientX;
                mouseY = e.clientY;
            });
        }

        // 16. Enhanced Cart Form Functionality
        if ($('.enhanced-cart-form').length > 0) {
            // Quantity controls
            $('.enhanced-cart-form').on('click', '.qty-btn', function(e) {
                e.preventDefault();
                const form = $(this).closest('.enhanced-cart-form');
                const input = form.find('.quantity-input');
                const action = $(this).data('action');
                let currentValue = parseInt(input.val()) || 1;
                
                if (action === 'increase') {
                    currentValue = Math.min(currentValue + 1, 99);
                } else if (action === 'decrease') {
                    currentValue = Math.max(currentValue - 1, 1);
                }
                
                input.val(currentValue);
                input.attr('data-original-value', currentValue);
            });

            // Form submission with enhanced UX
            $('.enhanced-cart-form').on('submit', function(e) {
                e.preventDefault();
                const form = $(this);
                const submitBtn = form.find('.add-to-cart-btn');
                const feedback = form.find('.form-feedback');
                const successAlert = feedback.find('.alert-success');
                const errorAlert = feedback.find('.alert-danger');
                const bookId = form.data('book-id');
                
                // Hide any existing feedback
                feedback.addClass('d-none');
                successAlert.addClass('d-none');
                errorAlert.addClass('d-none');
                
                // Show loading state
                submitBtn.addClass('loading');
                
                // Get form data
                const formData = new FormData(this);
                
                // Submit via AJAX
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Hide loading state
                        submitBtn.removeClass('loading');
                        
                        // Show success message
                        successAlert.removeClass('d-none').addClass('show');
                        feedback.removeClass('d-none');
                        
                        // Reset form to original state
                        const input = form.find('.quantity-input');
                        const originalValue = input.attr('data-original-value') || '1';
                        input.val(originalValue);

                        // Update cart count badge
                        updateCartBadge(response.cartCount);
                        
                        // Hide success message after 3 seconds
                        setTimeout(function() {
                            feedback.addClass('d-none');
                        }, 3000);
                    },
                    error: function(xhr) {
                        // Hide loading state
                        submitBtn.removeClass('loading');
                        
                        // Show error message
                        let errorMessage = 'An error occurred while adding to cart.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        
                        errorAlert.find('.error-message').text(errorMessage);
                        errorAlert.removeClass('d-none').addClass('show');
                        feedback.removeClass('d-none');
                        
                        // Hide error message after 5 seconds
                        setTimeout(function() {
                            feedback.addClass('d-none');
                        }, 5000);
                    }
                });
            });

            // Input validation
            $('.enhanced-cart-form .quantity-input').on('input', function() {
                let value = parseInt($(this).val()) || 1;
                const min = parseInt($(this).attr('min')) || 1;
                const max = parseInt($(this).attr('max')) || 99;
                
                // Ensure value is within bounds
                if (value < min) value = min;
                if (value > max) value = max;
                
                $(this).val(value);
                $(this).attr('data-original-value', value);
            });

            // Prevent non-numeric input
            $('.enhanced-cart-form .quantity-input').on('keypress', function(e) {
                if (e.which < 48 || e.which > 57) {
                    e.preventDefault();
                }
            });
        }

        // Function to update cart badge
        function updateCartBadge(count) {
            const cartIcon = $('#cart-icon');
            let badge = cartIcon.find('.cart-badge');
            
            if (count > 0) {
                if (badge.length === 0) {
                    // Create badge if it doesn't exist
                    badge = $('<span class="cart-badge">' + count + '</span>');
                    cartIcon.append(badge);
                } else {
                    // Update existing badge
                    badge.text(count);
                }
            } else {
                // Remove badge if count is 0
                badge.remove();
            }
        }

      

        // Function to update wishlist badge
        function updateWishlistBadge(count) {
            const wishlistIcon = $('#wishlist-icon');
            let badge = wishlistIcon.find('.wishlist-badge');
            
            if (count > 0) {
                if (badge.length === 0) {
                    // Create badge if it doesn't exist
                    badge = $('<span class="wishlist-badge">' + count + '</span>');
                    wishlistIcon.append(badge);
                } else {
                    // Update existing badge
                    badge.text(count);
                }
            } else {
                // Remove badge if count is 0
                badge.remove();
            }
        }

        // Function to show notifications (moved to global scope)
        window.showNotification = function(message, type = 'info') {
            // Remove existing notifications
            $('.wishlist-notification').remove();
            
            const notificationClass = type === 'success' ? 'alert-success' : 
                                    type === 'error' ? 'alert-danger' : 
                                    type === 'warning' ? 'alert-warning' : 'alert-info';
            
            const iconClass = type === 'success' ? 'fa-check-circle' : 
                            type === 'error' ? 'fa-exclamation-circle' : 
                            type === 'warning' ? 'fa-exclamation-triangle' : 'fa-info-circle';
            
            const notification = $(`
                <div class="wishlist-notification alert ${notificationClass} alert-dismissible fade show" 
                     style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 300px;">
                    <i class="fas ${iconClass}"></i> ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `);
            
            $('body').append(notification);
            
            // Auto remove after 5 seconds
            setTimeout(function() {
                notification.alert('close');
            }, 5000);
        };

        // Initialize wishlist status on page load
        function initializeWishlistStatus() {
            if (window.isAuthenticated) {
                $('[id^="wishlist-icon-"]').each(function() {
                    const bookId = $(this).attr('id').replace('wishlist-icon-', '');
                    checkWishlistStatus(bookId);
                });
            }
        }

        // Function to check wishlist status for a specific book
        function checkWishlistStatus(bookId) {
            $.ajax({
                url: `/wishlist/check/${bookId}`,
                method: 'GET',
                success: function(response) {
                    if (response.success) {
                        const wishlistIcon = $(`#wishlist-icon-${bookId}`);
                        const icon = wishlistIcon.find('i');
                        
                        if (response.isInWishlist) {
                            icon.removeClass('far fa-heart').addClass('fas fa-heart');
                            wishlistIcon.addClass('in-wishlist');
                        } else {
                            icon.removeClass('fas fa-heart').addClass('far fa-heart');
                            wishlistIcon.removeClass('in-wishlist');
                        }
                        
                        // Update global wishlist count
                        updateWishlistBadge(response.wishlistCount);
                    }
                },
                error: function() {
                    // Silently fail for status checks
                }
            });
        }

        // Initialize wishlist on page load
        initializeWishlistStatus();

    }); // End Document Ready Function



    function loader() {
        $(window).on('load', function () {
            // Animate loader off screen
            $(".preloader").addClass('loaded');
            $(".preloader").delay(600).fadeOut();
        });
    }

    loader();


})(jQuery); // End jQuery

