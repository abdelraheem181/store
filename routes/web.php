<?php

use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\CheckoutController;
use App\Http\Controllers\Website\ContactController;
use App\Models\Book;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\ShopCartController;
use App\Http\Controllers\Website\ShopController;
use App\Http\Controllers\Website\ShopDetailsController;
use App\Http\Controllers\Website\ShopListController;
use App\Http\Controllers\Website\DashbordController;
use App\Http\Controllers\Website\TeamController;
use App\Http\Controllers\Website\TeamDetailsController;
use App\Http\Controllers\Website\WishListController;
use App\Models\Slider;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashbordController::class, 'index'])->name('website.index');
    


// Test notification routes (remove these after testing)
Route::get('/test-success', function () {
    return redirect()->route('website.index')->with('success', 'This is a test success message!');
})->name('test.success');

Route::get('/test-error', function () {
    return redirect()->route('website.index')->with('error', 'This is a test error message!');
})->name('test.error');



// contact route
Route::get('/contact', [ContactController::class, 'index'])->name('website.contact');

// about route
Route::get('/about', [AboutController::class, 'index'])->name('website.about');

// shop route
Route::get('/shop', [ShopController::class, 'index'])->name('website.shop');

//checkout route
Route::get('/checkout', [CheckoutController::class, 'index'])->name('website.checkout')->middleware('auth');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('website.checkout.store');

//shop list route
Route::get('/shop-list', [ShopListController::class, 'index'])->name('website.shop-list');

//shop details route
Route::get('/shop-details/{id?}', [ShopDetailsController::class, 'show'])->name('website.shop-details');

//shop cart route
Route::get('/shop-cart', [ShopCartController::class, 'index'])->name('website.shop-cart');

//wishlist routes
Route::middleware('auth')->group(function () {
    Route::get('/wishlist', [WishListController::class, 'index'])->name('website.wishlist');
    Route::get('/wishlist/add/{book_id}', [WishListController::class, 'addToWishlist'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{book_id}', [WishListController::class, 'removeFromWishlist'])->name('wishlist.remove');
    Route::delete('/wishlist/clear', [WishListController::class, 'clearWishlist'])->name('wishlist.clear');
    Route::get('/wishlist/check/{book_id}', [WishListController::class, 'checkWishlistStatus'])->name('wishlist.check');
    Route::post('/wishlist/toggle/{book_id}', [WishListController::class, 'toggleWishlist'])->name('wishlist.toggle');
});

//team details route
Route::get('/team-details/{id?}', [TeamDetailsController::class, 'show'])->name('website.team-details');

//team route
Route::get('/team', [TeamController::class, 'index'])->name('website.team');

//add to cart route
Route::post('/cart/add/{book_id}', [ShopCartController::class, 'addToCart'])->name('cart.add');
Route::patch('/cart/update', [ShopCartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove', [ShopCartController::class, 'removeFromCart'])->name('cart.remove');
Route::delete('/cart/remove-session/{book_id}', [ShopCartController::class, 'removeFromSessionCart'])->name('cart.remove-session');
Route::get('/cart', [ShopCartController::class, 'cart'])->name('cart.index');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::any('/payment-callback', [CheckoutController::class, 'paymentCallback'])->name('payment.callback');



require __DIR__.'/auth.php';
