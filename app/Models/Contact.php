<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Contact extends Model
{
    use HasFactory , HasTranslations;

    public $translatable = ['name', 'message'];

    protected $fillable = [
        'name',
         'email',
          'message'
        ];
}
