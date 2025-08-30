<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    //use traits
    use HasFactory,HasTranslations;

    //fillable fields
    protected $fillable = [
        'name', 
        'description'
    ];

    //translatable fields
    public $translatable = ['name', 'description'];

    /**
     * Get the books for the category.
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }

}
