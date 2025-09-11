<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Slider;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function index()
    {
        // Get all wishlist books for the authenticated user
        $wishlistBooks = auth()->user()->wishlistBooks()->with(['author', 'category'])->get();

        // Get wishlist books count
        $wishlistBooksCount = $wishlistBooks->count();

        //silder
        $silder = Slider::first();

        return view('website.wishlist', compact('wishlistBooks', 'wishlistBooksCount', 'silder'));
    }

    public function addToWishlist(Request $request, $book_id)
    {
        try {
            $book = Book::findOrFail($book_id);
            
            // Check if book is already in wishlist
            $existingWishlist = Wishlist::where('user_id', auth()->id())
                                       ->where('book_id', $book_id)
                                       ->first();

            if ($existingWishlist) {
        
                return back()->with('error', 'Book is already in your wishlist!');
            }

            // Add to wishlist
            Wishlist::create([
                'user_id' => auth()->id(),
                'book_id' => $book_id
            ]);

            // Get updated wishlist count
            $wishlistCount = auth()->user()->wishlists()->count();

        } catch (\Exception $e) {
       
            back()->with('error', 'An error occurred while adding to wishlist!');
        }

        return back()->with('success', 'Book added to wishlist successfully!');
    }

    public function removeFromWishlist(Request $request, $book_id)
    {
        try {
            $wishlist = Wishlist::where('user_id', auth()->id())
                               ->where('book_id', $book_id)
                               ->first();

            if ($wishlist) {
                $wishlist->delete();
                
                // Get updated wishlist count
                $wishlist = auth()->user()->wishlists()->count();
                
                return back()->with('success', 'Book removed from wishlist successfully!');
            }

         

                return back()->with('success', 'Book removed from wishlist successfully!');
          
        } catch (\Exception $e) {
       

            return back()->with('success', 'Book removed from wishlist successfully!');
        }

        return back()->with('success', 'Book removed from wishlist successfully!');
    }

    public function clearWishlist()
    {
        try {
            Wishlist::where('user_id', auth()->id())->delete();
            
            return back()->with('success', 'Wishlist cleared successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while clearing wishlist!');
        }

        return back()->with('success', 'Wishlist cleared successfully!');
        }

    public function checkWishlistStatus($book_id)
    {
        try {
            $isInWishlist = auth()->user()->isInWishlist($book_id);
            $wishlistCount = auth()->user()->wishlists()->count();
            
          
            return back()->with('success', 'Wishlist updated successfully!');

        } 
        catch (\Exception $e) {
        
            return back()->with('error', 'An error occurred while checking wishlist status!');
        }
    }

    public function toggleWishlist(Request $request, $book_id)
    {
        $message = '';
        $isInWishlist = auth()->user()->isInWishlist($book_id);
        
        if ($isInWishlist) {
            // Remove from wishlist
            $wishlist = Wishlist::where('user_id', auth()->id())
                            ->where('book_id', $book_id)
                            ->first();
            if ($wishlist) {
                $wishlist->delete();
            }
            $isInWishlist = false;
            $message = 'Book removed from wishlist successfully!';
        } else {
            // Add to wishlist
            Wishlist::create([
                'user_id' => auth()->id(),
                'book_id' => $book_id
            ]);
            $isInWishlist = true;
            $message = 'Book added to wishlist successfully!';
        }
        

        return back()->with('success', $message);
    }   
}
