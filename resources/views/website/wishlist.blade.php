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
              <h1>Wishlist</h1>
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
                          Wishlist
                      </li>
                  </ul>
              </div>
          </div>
      </div>
  </div>

  <!-- Wishlist Section Start -->
  <div class="cart-section section-padding">
      <div class="container">
          <div class="main-cart-wrapper">
              <div class="row">
                  <div class="col-12">
                      @if(session('success'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                              {{ session('success') }}
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                          </div>
                      @endif

                      @if($wishlistBooksCount > 0)
                          <div class="d-flex justify-content-between align-items-center mb-4">
                              <h3>My Wishlist ({{ $wishlistBooksCount }} items)</h3>
                              <button type="button" class="btn btn-outline-danger" onclick="clearWishlist()">
                                  <i class="fa fa-trash"></i> Clear Wishlist
                              </button>
                          </div>

                          <div class="table-responsive">
                              <table class="table table-hover wishlist-table">
                                  <thead class="table-dark">
                                      <tr>
                                          <th>Product</th>
                                          <th>Author</th>
                                          <th>Price</th>
                                          <th>Stock Status</th>
                                          <th>Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($wishlistBooks as $wishlistBook)
                                      <tr id="wishlist-row-{{ $wishlistBook->id }}">
                                          <td>
                                              <div class="d-flex align-items-center gap-3">
                                                  <div class="product-image">
                                                      <img src="{{ asset('images/books/'. $wishlistBook->basic_image_path) }}" 
                                                           alt="{{ $wishlistBook->name }}" 
                                                           class="img-fluid rounded" 
                                                           style="width: 80px; height: 100px; object-fit: cover;">
                                                  </div>
                                                  <div class="product-details">
                                                      <h6 class="mb-1 fw-bold">{{ $wishlistBook->name }}</h6>
                                                      <small class="text-muted">{{ $wishlistBook->category->name ?? 'No Category' }}</small>
                                                      @if($wishlistBook->isbn)
                                                          <br><small class="text-muted">ISBN: {{ $wishlistBook->isbn }}</small>
                                                      @endif
                                                  </div>
                                              </div>
                                          </td>
                                          <td>
                                              <span class="author-name">{{ $wishlistBook->author->name ?? 'Unknown Author' }}</span>
                                          </td>
                                          <td>
                                              <span class="price fw-bold text-primary">${{ number_format($wishlistBook->price, 2) }}</span>
                                          </td>
                                          <td>
                                              @if($wishlistBook->avl_qty > 0)
                                                  <span class="badge bg-success">
                                                      <i class="fa fa-check-circle"></i> In Stock ({{ $wishlistBook->avl_qty }})
                                                  </span>
                                              @else
                                                  <span class="badge bg-danger">
                                                      <i class="fa fa-times-circle"></i> Out of Stock
                                                  </span>
                                              @endif
                                          </td>
                                          <td>
                                              <div class="btn-group" role="group">
                                                  <a href="{{ route('website.shop-details', $wishlistBook->id) }}" 
                                                     class="btn btn-sm btn-outline-primary" 
                                                     title="View Details">
                                                      <i class="fa fa-eye"></i>
                                                  </a>
                                                  @if($wishlistBook->avl_qty > 0)
                                                      <button type="button" 
                                                              class="btn btn-sm btn-outline-success add-to-cart-btn" 
                                                              data-book-id="{{ $wishlistBook->id }}"
                                                              title="Add to Cart">
                                                          <i class="fa fa-shopping-cart"></i>
                                                      </button>
                                                  @endif
                                                  <button type="button" 
                                                          class="btn btn-sm btn-outline-danger remove-from-wishlist-btn" 
                                                          data-book-id="{{ $wishlistBook->id }}"
                                                          title="Remove from Wishlist">
                                                      <i class="fa fa-heart-broken"></i>
                                                  </button>
                                              </div>
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>

                          <div class="row mt-4">
                              <div class="col-md-6">
                                  <a href="{{ route('website.shop') }}" class="btn btn-outline-secondary">
                                      <i class="fa fa-arrow-left"></i> Continue Shopping
                                  </a>
                              </div>
                              <div class="col-md-6 text-end">
                                  <a href="{{ route('website.shop-cart') }}" class="btn btn-primary">
                                      <i class="fa fa-shopping-cart"></i> View Cart
                                  </a>
                              </div>
                          </div>
                      @else
                          <div class="text-center py-5">
                              <div class="empty-wishlist">
                                  <i class="fa fa-heart-o fa-5x text-muted mb-4"></i>
                                  <h4>Your wishlist is empty</h4>
                                  <p class="text-muted mb-4">Start adding books to your wishlist to save them for later!</p>
                                  <a href="{{ route('website.shop') }}" class="btn btn-primary">
                                      <i class="fa fa-shopping-bag"></i> Browse Books
                                  </a>
                              </div>
                          </div>
                      @endif
                  </div>
              </div>
          </div>
      </div>
  </div>


@endsection

@push('styles')
<style>
.wishlist-table {
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    border-radius: 10px;
    overflow: hidden;
}

.wishlist-table thead th {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    padding: 15px;
}

.wishlist-table tbody tr {
    transition: all 0.3s ease;
    border-bottom: 1px solid #f0f0f0;
}

.wishlist-table tbody tr:hover {
    background-color: #f8f9fa;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.product-image img {
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.product-image img:hover {
    transform: scale(1.05);
}

.btn-group .btn {
    border-radius: 6px;
    margin: 0 2px;
    transition: all 0.3s ease;
}

.btn-group .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.empty-wishlist {
    padding: 60px 20px;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    border-radius: 15px;
    margin: 20px 0;
}

.empty-wishlist i {
    color: #ddd;
    animation: heartbeat 2s infinite;
}

@keyframes heartbeat {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

.badge {
    font-size: 0.8em;
    padding: 8px 12px;
    border-radius: 20px;
}

.price {
    font-size: 1.2em;
    font-weight: bold;
}

.author-name {
    font-style: italic;
    color: #666;
}

.alert {
    border-radius: 10px;
    border: none;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.table-responsive {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

@media (max-width: 768px) {
    .wishlist-table {
        font-size: 0.9em;
    }
    
    .product-image img {
        width: 60px !important;
        height: 75px !important;
    }
    
    .btn-group .btn {
        padding: 4px 8px;
        font-size: 0.8em;
    }
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Remove from wishlist functionality
    $('.remove-from-wishlist-btn').on('click', function() {
        const bookId = $(this).data('book-id');
        const row = $(`#wishlist-row-${bookId}`);
        
        if (confirm('Are you sure you want to remove this book from your wishlist?')) {
            $.ajax({
                url: `/wishlist/remove/${bookId}`,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        row.fadeOut(300, function() {
                            $(this).remove();
                            updateWishlistCount();
                            showNotification(response.message, 'success');
                        });
                    } else {
                        showNotification(response.message, 'error');
                    }
                },
                error: function() {
                    showNotification('An error occurred. Please try again.', 'error');
                }
            });
        }
    });

    // Add to cart functionality
    $('.add-to-cart-btn').on('click', function() {
        const bookId = $(this).data('book-id');
        const button = $(this);
        
        button.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
        
        $.ajax({
            url: `/cart/add/${bookId}`,
            type: 'POST',
            data: {
                quantity: 1,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    showNotification(response.message, 'success');
                    button.html('<i class="fa fa-check"></i> Added!').removeClass('btn-outline-success').addClass('btn-success');
                    setTimeout(() => {
                        button.html('<i class="fa fa-shopping-cart"></i>').removeClass('btn-success').addClass('btn-outline-success').prop('disabled', false);
                    }, 2000);
                } else {
                    showNotification(response.message, 'error');
                    button.prop('disabled', false).html('<i class="fa fa-shopping-cart"></i>');
                }
            },
            error: function() {
                showNotification('An error occurred. Please try again.', 'error');
                button.prop('disabled', false).html('<i class="fa fa-shopping-cart"></i>');
            }
        });
    });
});

// Clear wishlist functionality
function clearWishlist() {
    if (confirm('Are you sure you want to clear your entire wishlist? This action cannot be undone.')) {
        $.ajax({
            url: '/wishlist/clear',
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function() {
                location.reload();
            },
            error: function() {
                showNotification('An error occurred. Please try again.', 'error');
            }
        });
    }
}

// Update wishlist count
function updateWishlistCount() {
    const remainingRows = $('tbody tr').length;
    if (remainingRows === 0) {
        location.reload();
    } else {
        $('h3').text(`My Wishlist (${remainingRows} items)`);
    }
}

// showNotification function is now globally available from main.js
</script>
@endpush