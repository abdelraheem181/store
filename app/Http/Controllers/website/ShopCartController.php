<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;

class ShopCartController extends Controller
{
    //index
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('website.shop-cart', compact('cart'));
    }

    //add to cart
    public function addToCart(Request $request, $book_id)
    {
        //get book
        $book = Book::findOrFail($book_id);
        
        
        //get cart
        $cart = session()->get('cart', []);

        //check if book already exists in cart
        if(isset($cart[$book_id])) {

            // If book already exists in cart, increase quantity
            $cart[$book_id]['quantity']++;
        } else {
            // Add new book to cart
            $cart[$book_id] = [
                "name" => $book->name,
                "quantity" => $request->quantity,
                "price" => $book->price_sale ?? $book->price,
                "image" => $book->basic_image_path
            ];
        }
        
        session()->put('cart', $cart);
        
        return response()->json(['success' => 'Book added to cart successfully!', 'cartCount' => count($cart)]);
    }

    //update cart
    public function updateCart(Request $request)
    {
        //get cart
        $cart = Cart::find($request->id);
        //update cart
        $cart->quantity = $request->quantity;
        $cart->total = $cart->price * $cart->quantity;
        $cart->save();
        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    //remove from cart
    public function removeFromCart(Request $request)
    {
        $cart = Cart::find($request->id);
        $cart->delete();
        return redirect()->back()->with('success', 'Book removed from cart successfully!');
    }

    //remove from session cart
    public function removeFromSessionCart(Request $request, $book_id)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$book_id])) {
            unset($cart[$book_id]);
            session()->put('cart', $cart);
            
            return response()->json([
                'success' => 'Book removed from cart successfully!', 
                'cartCount' => count($cart)
            ]);
        }
        
        return response()->json([
            'error' => 'Book not found in cart'
        ], 404);
    }

    //cart
    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('website.shop-cart', compact('cart'));
    }
}
