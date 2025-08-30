<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopDetailsController extends Controller
{
    //get shop details data


    //get shop details data
    public function show($id)
    {
        //get book by id
        $book = Book::find($id);
        return view('website.shop-details', compact('book'));
    }
    
    
}
