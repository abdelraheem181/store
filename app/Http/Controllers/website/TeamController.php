<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
             //get all authors
             $author = Author::all();

             //get all books
             $book = Book::all();
     
             //get all categories
             $category = Category::all();

             //silder
             $silder = Slider::first();
      
             return view('website.team', compact('author', 'book', 'category', 'silder'));
    }
}
