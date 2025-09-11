<?php

namespace App\Http\Controllers\website;

use App\Models\Slider;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class DashbordController extends Controller
{

    public function index()
    {
        //silder
        $book = Book::get()->take(10);
        $best_seller = Book::orderBy('sales_count', 'desc')->take(3)->get();

        return view('website.index', compact('book', 'best_seller'));
    }
}
