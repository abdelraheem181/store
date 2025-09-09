<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'quantity',
        'total_amount',
        'payment_status',
        'payment_method',
        'payment_id',
      
    ];

       protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            if (empty($order->order_number)) {
                $order->order_number = static::generateOrderNumber();
            }
        });
    }

    /**
     * Generate unique order number
     */
    public static function generateOrderNumber(): string
    {
        do {
            $orderNumber = 'ORD-' . date('Y') . '-' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        } while (static::where('order_number', $orderNumber)->exists());

        return $orderNumber;
    }



    public function user()
    {
        // return $this->belongsTo(User::class, 'user_id', 'id');
        return $this->belongsTo(User::class);

    }


    public function orderBooks()
    {
        return $this->hasMany(OrderBook::class);
    }


 



    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope for orders by payment status
     */
    public function scopeByPaymentStatus($query, $paymentStatus)
    {
        return $query->where('payment_status', $paymentStatus);
    }

    /**
     * Scope for pending orders
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for completed orders
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'delivered');
    }

    /**
     * Check if order can be cancelled
     */
    public function canBeCancelled(): bool
    {
        return in_array($this->status, ['pending', 'confirmed']);
    }

    /**
     * Check if order is paid
     */
    public function isPaid(): bool
    {
        return $this->payment_status === 'paid';
    }

    /**
     * Get total quantity of items in order
     */
    public function getTotalQuantityAttribute(): int
    {
        return $this->books->sum('pivot.quantity');
    }

    /**
     * Get total number of unique items in order
     */
    public function getTotalItemsAttribute(): int
    {
        return $this->books->count();
    }

    /**
     * Get formatted total amount
     */
    public function getFormattedTotalAttribute(): string
    {
        return '$' . number_format($this->total_amount, 2);
    }

    /**
     * Get status badge color for UI
     */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'pending' => 'warning',
            'confirmed' => 'info',
            'processing' => 'primary',
            'shipped' => 'secondary',
            'delivered' => 'success',
            'cancelled' => 'danger',
            default => 'secondary'
        };
    }

    /**
     * Add book to order
     */
    public function addBook(Book $book, int $quantity = 1): void
    {
        $unitPrice = $book->price;
        $totalPrice = $unitPrice * $quantity;

        $this->books()->attach($book->id, [
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'total_price' => $totalPrice,
        ]);

        $this->updateTotals();
    }

    /**
     * Update book quantity in order
     */
    public function updateBookQuantity(Book $book, int $quantity): void
    {
        $unitPrice = $this->books()->where('book_id', $book->id)->first()->pivot->unit_price;
        $totalPrice = $unitPrice * $quantity;

        $this->books()->updateExistingPivot($book->id, [
            'quantity' => $quantity,
            'total_price' => $totalPrice,
        ]);

        $this->updateTotals();
    }

    /**
     * Remove book from order
     */
    public function removeBook(Book $book): void
    {
        $this->books()->detach($book->id);
        $this->updateTotals();
    }

    /**
     * Update order totals based on books
     */
    public function updateTotals(): void
    {
        $this->refresh();
        $subtotal = $this->books->sum('pivot.total_price');
        
        $this->update([
            'subtotal' => $subtotal,
            'total_amount' => $subtotal + $this->tax_amount + $this->shipping_amount - $this->discount_amount
        ]);
    }






}
