<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Country;
use Illuminate\Http\Request;

class ShopListController extends Controller
{
    //index
    public function index()
    {
        //get all books
        $book = Book::paginate(5);

        //get all categories
        $category = Category::all();

        //get all authors
        $author = Author::all();

        //get all countries
        $country = Country::all();

        //return view
        return view('website.shop-list', compact('book', 'category', 'author', 'country'));
    }
}
