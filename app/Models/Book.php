<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Book extends Model
{
    use HasFactory ,HasTranslations;

    //translatable fields
    public $translatable = ['name', 'description'];

    //fillable fields
    protected $fillable = [
        'category_id',
         'author_id', 
         'country_id',
          'name', 
          'description',
           'price', 
           'published_date',
            'pages', 
            'isbn', 
            'language', 
            'format', 
            'weight', 
            'tags', 
            'publish_year',
            'basic_image_path',
            'avl_qty'
        ];

    /**
     * Get the category for the book.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function images()
    {
        return $this->hasMany(BookImage::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'book_order')
                    ->withPivot(['quantity', 'unit_price', 'total_price'])
                    ->withTimestamps();
    }
    
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_book')
                    ->withPivot(['quantity', 'price', 'total'])
                    ->withTimestamps();
    }   

    public function orderBooks()
    {
        return $this->hasMany(OrderBook::class);
    }

    public function cartBooks()
    {
        return $this->hasMany(CartBooks::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function wishlistUsers()
    {
        return $this->belongsToMany(User::class, 'wishlists')
                    ->withTimestamps();
    }
}
