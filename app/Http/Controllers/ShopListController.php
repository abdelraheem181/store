<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopListController extends Controller
{
    public function index()
    {
        return view('website.shop-list');
    }
}
