<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\CartBooks;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Shop;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //dashboard index
    public function index()
    {

        $data['countries'] = Country::count();
        $data['authors'] = Author::count();
        $data['books'] = Book::count();
        $data['users'] = User::count();
        $data['orders'] = Order::count();
        $data['categories'] = Category::count();
        $data['rates'] = Rating::count();
        $data['about'] = About::count();
        $data['contacts'] = Contact::count();
        $data['sliders'] = Slider::count();
        $data['book_images'] = BookImage::count();
        $data['cart_books'] = CartBooks::count();


        return view('admin.dashboard', $data);
    }
}
