@props(['book', 'readonly' => false])

<div class="star book-rating" 
     data-book-id="{{ $book->id }}" 
     data-current-rating="{{ $book->starRating() }}"
     data-ajax-url="{{ route('website.rating.store') }}"
     data-readonly="{{ $readonly ? 'true' : 'false' }}">
    
    {{-- Loading indicator --}}
    <div class="rating-loading" style="display: none;">
        <i class="fa-solid fa-spinner fa-spin"></i>
    </div>
    
    {{-- Stars container --}}
    <div class="stars-container">
        @for($i = 1; $i <= 5; $i++)
            <i class="fa-star star-icon {{ $i <= $book->starRating() ? 'fa-solid' : 'fa-regular' }}" 
               data-rating="{{ $i }}"
               role="{{ $readonly ? 'img' : 'button' }}"
               tabindex="{{ $readonly ? '-1' : '0' }}"
               aria-label="Rate {{ $i }} out of 5 stars"></i>
        @endfor
    </div>
    
    {{-- Rating display --}}
    <span class="rating-display">
        <span class="current-rating">{{ number_format($book->starRating(), 1) }}</span>/5
    </span>
</div>

<style>
.book-rating {
    display: flex;
    align-items: center;
    gap: 8px;
    position: relative;
}

.stars-container {
    display: flex;
    gap: 2px;
}

.star-icon {
    color: #fbbf24;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 1rem;
}

.book-rating[data-readonly="true"] .star-icon {
    cursor: default;
}

.star-icon.fa-regular {
    color: #d1d5db;
}

.star-icon:hover {
    transform: scale(1.1);
}

.book-rating[data-readonly="false"] .star-icon:hover,
.book-rating[data-readonly="false"] .star-icon.hover-active {
    color: #f59e0b !important;
}

.rating-display {
    font-size: 0.875rem;
    color: #6b7280;
    font-weight: 500;
    margin-left: 4px;
}

.rating-loading {
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    color: #6b7280;
}

.book-rating.loading .stars-container {
    opacity: 0.5;
    pointer-events: none;
}

/* Focus styles for accessibility */
.star-icon:focus {
    outline: 2px solid #3b82f6;
    outline-offset: 2px;
    border-radius: 2px;
}

/* Success animation */
@keyframes ratingSuccess {
    0% { transform: scale(1); }
    50% { transform: scale(1.1); }
    100% { transform: scale(1); }
}

.book-rating.rating-success .stars-container {
    animation: ratingSuccess 0.6s ease;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const bookRatings = document.querySelectorAll('.book-rating[data-readonly="false"]');
    
    bookRatings.forEach(rating => {
        new BookRating(rating);
    });
});

class BookRating {
    constructor(element) {
        this.element = element;
        this.stars = element.querySelectorAll('.star-icon');
        this.bookId = element.dataset.bookId;
        this.currentRating = parseInt(element.dataset.currentRating);
        this.ajaxUrl = element.dataset.ajaxUrl;
        this.ratingDisplay = element.querySelector('.current-rating');
        this.loadingIndicator = element.querySelector('.rating-loading');
        
        this.init();
    }
    
    init() {
        this.bindEvents();
    }
    
    bindEvents() {
        this.stars.forEach((star, index) => {
            const rating = index + 1;
            
            // Mouse events
            star.addEventListener('mouseenter', () => this.handleHover(rating));
            star.addEventListener('click', () => this.handleClick(rating));
            
            // Keyboard events
            star.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    this.handleClick(rating);
                }
                
                // Arrow key navigation
                if (e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
                    e.preventDefault();
                    const direction = e.key === 'ArrowLeft' ? -1 : 1;
                    const nextIndex = Math.max(0, Math.min(4, index + direction));
                    this.stars[nextIndex].focus();
                }
            });
        });
        
        // Mouse leave event
        this.element.addEventListener('mouseleave', () => this.clearHover());
    }
    
    handleHover(rating) {
        this.stars.forEach((star, index) => {
            star.classList.remove('hover-active');
            
            if (index + 1 <= rating) {
                star.classList.add('hover-active');
                star.classList.remove('fa-regular');
                star.classList.add('fa-solid');
            } else {
                star.classList.remove('fa-solid');
                star.classList.add('fa-regular');
            }
        });
    }
    
    clearHover() {
        this.stars.forEach(star => {
            star.classList.remove('hover-active');
        });
        this.updateStarDisplay(this.currentRating);
    }
    
    async handleClick(rating) {
        try {
            this.showLoading(true);
            
            // Make AJAX request
            const response = await fetch(this.ajaxUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    book_id: this.bookId,
                    rating: rating,
                    item_type: 'book'
                })
            });
            
            const data = await response.json();
            
            if (response.ok) {
                this.currentRating = data.rating || rating;
                this.updateStarDisplay(this.currentRating);
                this.updateRatingDisplay(this.currentRating);
                this.showSuccess();
                
                // Dispatch custom event
                this.element.dispatchEvent(new CustomEvent('book-rated', {
                    detail: { 
                        bookId: this.bookId, 
                        rating: this.currentRating,
                        previousRating: parseInt(this.element.dataset.currentRating)
                    }
                }));
                
                // Update data attribute
                this.element.dataset.currentRating = this.currentRating;
                
            } else {
                throw new Error(data.message || 'Rating failed');
            }
            
        } catch (error) {
            console.error('Book rating error:', error);
            this.showError(error.message);
        } finally {
            this.showLoading(false);
        }
    }
    
    updateStarDisplay(rating) {
        this.stars.forEach((star, index) => {
            if (index + 1 <= rating) {
                star.classList.remove('fa-regular');
                star.classList.add('fa-solid');
            } else {
                star.classList.remove('fa-solid');
                star.classList.add('fa-regular');
            }
        });
    }
    
    updateRatingDisplay(rating) {
        if (this.ratingDisplay) {
            this.ratingDisplay.textContent = rating.toFixed(1);
        }
    }
    
    showLoading(show) {
        if (show) {
            this.element.classList.add('loading');
            this.loadingIndicator.style.display = 'block';
        } else {
            this.element.classList.remove('loading');
            this.loadingIndicator.style.display = 'none';
        }
    }
    
    showSuccess() {
        this.element.classList.add('rating-success');
        setTimeout(() => {
            this.element.classList.remove('rating-success');
        }, 600);
    }
    
    showError(message) {
        // Show error message (customize as needed)
        const errorMsg = document.createElement('div');
        errorMsg.className = 'rating-error';
        errorMsg.textContent = message;
        errorMsg.style.cssText = `
            position: absolute;
            top: 100%;
            left: 0;
            background: #fee2e2;
            color: #dc2626;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            white-space: nowrap;
            z-index: 1000;
            margin-top: 4px;
        `;
        
        this.element.appendChild(errorMsg);
        
        setTimeout(() => {
            errorMsg.remove();
        }, 3000);
    }
}
</script>