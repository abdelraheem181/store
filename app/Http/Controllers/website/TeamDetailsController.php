<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Country;
use App\Models\Rating;
use App\Models\Slider;
use Illuminate\Http\Request;

class TeamDetailsController extends Controller
{
    public function show($id)
    {
        //get author by id
        $author = Author::findOrFail($id);

        //get books by author id
        $book = Book::where('author_id', $id)->get();

        //silder
        $silder = Slider::first();

        //books count
        $books_count = Book::where('author_id', $id)->count();
        // $reviews_count = Rating::where('author_id', $id)->count();

        //reviews count
        // $reviews_count = Review::where('author_id', $id)->count();

        //get reviews by author id
     

  

        return view('website.team-details', compact('author', 'book', 'books_count', 'silder'));
    }
}
