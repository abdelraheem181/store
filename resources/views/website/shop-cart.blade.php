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
              <h1>Cart</h1>
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
                          Cart
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>

  <!-- Shop Cart Section Start -->
  <div class="cart-section section-padding">
      <div class="container">
          <div class="main-cart-wrapper">
              <div class="row g-5">
                  <div class="col-xl-9">
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>Book</th>
                                      <th>Price</th>
                                      <th>Quantity</th>
                                      <th>Subtotal</th>
                                  </tr>
                              </thead>
                                                            <tbody>
                                  @forelse($cart as $book_id => $item)
                                  <tr data-book-id="{{ $book_id }}">
                                      <td>
                                          <span class="d-flex gap-5 align-items-center">
                                              <button class="remove-icon remove-cart-item" data-book-id="{{ $book_id }}" style="border: none; background: none; cursor: pointer;">
                                                  <img src="{{ asset('img/icon/icon-9.svg') }}" alt="img">
                                              </button>
                                              {{-- <span class="cart">
                                                  @if($item['image'])
                                                      <img src="{{ asset($item['image']) }}" alt="{{ $item['image'] }}" width="100" height="100">
                                                  @else
                                                      <img src="{{ asset($item['image']) }}" alt="img" width="100" height="100">
                                                  @endif
                                              </span> --}}
                                              <span class="cart-title">
                                                  {{ $item['name'] }}
                                              </span>
                                          </span>
                                      </td>
                                      <td>
                                          <span class="cart-price">${{ number_format($item['price'], 2) }}</span>
                                      </td>
                                      <td>
                                          <span class="quantity-basket">
                                              <span class="qty">
                                                  <button class="qtyminus" aria-hidden="true" data-book-id="{{ $book_id }}">−</button>
                                                  <input type="number" name="qty" id="qty-{{ $book_id }}" min="1" max="99" step="1"
                                                      value="{{ $item['quantity'] }}" data-book-id="{{ $book_id }}">
                                                  <button class="qtyplus" aria-hidden="true" data-book-id="{{ $book_id }}">+</button>
                                              </span>
                                          </span>
                                      </td>
                                      <td>
                                          <span class="subtotal-price">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                      </td>
                                  </tr>
                                  @empty
                                  <tr>
                                      <td colspan="4" class="text-center">
                                          <p>Your cart is empty</p>
                                          <a href="{{ route('website.shop') }}" class="theme-btn">Continue Shopping</a>
                                      </td>
                                  </tr>
                                  @endforelse
                              </tbody>
                          </table>
                      </div>
                      <div class="cart-wrapper-footer">
                          <form action="{{ route('website.shop-cart') }}">
                              <div class="input-area">
                                  <input type="text" name="Coupon Code" id="CouponCode" placeholder="Coupon Code">
                                  <button type="submit" class="theme-btn">
                                      Apply
                                  </button> 
                              </div>
                          </form>
                          <a href="{{ route('website.shop-cart') }}" class="theme-btn">
                              Update Cart
                          </a>
                      </div>
                  </div>
                  <div class="col-xl-3">
                      <div class="table-responsive cart-total">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>Cart Total</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>
                                          <span class="d-flex gap-5 align-items-center justify-content-between">
                                              <span class="sub-title">Subtotal:</span>
                                              <span class="sub-price">
                                                  ${{ number_format(collect($cart)->sum(function($item) { return $item['price'] * $item['quantity']; }), 2) }}
                                              </span>
                                          </span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <span class="d-flex gap-5 align-items-center  justify-content-between">
                                              <span class="sub-title">Shipping:</span>
                                              <span class="sub-text">
                                                  Free
                                              </span>
                                          </span>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <span class="d-flex gap-5 align-items-center  justify-content-between">
                                              <span class="sub-title">Total:  </span>
                                              <span class="sub-price sub-price-total">
                                                  ${{ number_format(collect($cart)->sum(function($item) { return $item['price'] * $item['quantity']; }), 2) }}
                                              </span>
                                          </span>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                              <a href="{{ route('website.checkout') }}" class="theme-btn">Proceed to checkout</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>


@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Remove cart item
    $('.remove-cart-item').on('click', function() {
        const bookId = $(this).data('book-id');
        const row = $(this).closest('tr');
        
        if (confirm('Are you sure you want to remove this item from your cart?')) {
            $.ajax({
                url: '{{ route("cart.remove-session", "") }}/' + bookId,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    row.remove();
                    updateCartBadge(response.cartCount);
                    updateCartTotals();
                    
                    // Check if cart is empty
                    if (response.cartCount === 0) {
                        location.reload(); // Reload to show empty cart message
                    }
                },
                error: function() {
                    alert('Error removing item from cart');
                }
            });
        }
    });

    // Update quantity
    $('.qtyminus, .qtyplus').on('click', function() {
        const bookId = $(this).data('book-id');
        const input = $('#qty-' + bookId);
        let currentValue = parseInt(input.val()) || 1;
        
        if ($(this).hasClass('qtyminus')) {
            currentValue = Math.max(currentValue - 1, 1);
        } else {
            currentValue = Math.min(currentValue + 1, 99);
        }
        
        input.val(currentValue);
        updateCartItem(bookId, currentValue);
    });

    // Update cart item quantity
    function updateCartItem(bookId, quantity) {
        $.ajax({
            url: '{{ route("cart.add", "") }}/' + bookId,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                quantity: quantity
            },
            success: function(response) {
                updateCartBadge(response.cartCount);
                updateCartTotals();
                location.reload(); // Reload to show updated quantities
            },
            error: function() {
                alert('Error updating cart');
            }
        });
    }

    // Update cart totals
    function updateCartTotals() {
        let subtotal = 0;
        $('.subtotal-price').each(function() {
            const price = parseFloat($(this).text().replace('$', ''));
            subtotal += price;
        });
        
        $('.sub-price').text('$' + subtotal.toFixed(2));
        $('.sub-price-total').text('$' + subtotal.toFixed(2));
    }

    // Initialize cart totals
    updateCartTotals();
});
</script>
@endpush