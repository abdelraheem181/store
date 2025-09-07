<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;

class ShopDetailsController extends Controller
{
    //get shop details data

   //index
    public function index()
    {
        //get all books
        $book = Book::paginate(5);

        //get all categories
        $categories = Category::paginate(5);

        //get all authors
        $author = Author::paginate(5);

        //get all countries
        $country = Country::paginate(5);

        return view('website.layout', compact('book', 'categories', 'author', 'country'));
    }
    //get shop details data
    public function show($id)
    {
        //get book by id
        $book = Book::find($id);
        //get book images
        $bookImages = BookImage::where('book_id', $id)->get();
        return view('website.shop-details', compact('book', 'bookImages'));
    }
    
    
}
