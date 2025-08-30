<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Author extends Model
{
    use HasFactory,HasTranslations;

    //translatable fields
    public $translatable = ['name', 'description'];
    //fillable fields
    protected $fillable =
     ['name', 
     'description', 
     'email', 
     'phone', 
     'image_path', 
     'country_id', 
     'is_active',
     'slug'];

    //get country for the author
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    //get books for the author
    public function books()
    {
        return $this->hasMany(Book::class);
    }


    
}
