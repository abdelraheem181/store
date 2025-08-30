<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    //use traits
    use HasFactory , HasTranslations;

    //translatable fields
    public $translatable = ['name'];

    //fillable fields
    protected $fillable = [
        'name', 
        'code',
        'currency'
    ];

    //get books for the country
    public function books()
    {
        return $this->hasMany(Book::class);
    }


}
