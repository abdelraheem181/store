<?php

use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\CheckoutController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\ShopCartController;
use App\Http\Controllers\Website\ShopController;
use App\Http\Controllers\Website\ShopDetailsController;
use App\Http\Controllers\Website\ShopListController;
use App\Http\Controllers\Website\TeamController;
use App\Http\Controllers\Website\TeamDetailsController;
use App\Http\Controllers\Website\WishListController;
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

Route::get('/', function () {
    return view('website.index');
})->name('website.index');

// contact route
Route::get('/contact', [ContactController::class, 'index'])->name('website.contact');

// about route
Route::get('/about', [AboutController::class, 'index'])->name('website.about');

// shop route
Route::get('/shop', [ShopController::class, 'index'])->name('website.shop');

//checkout route
Route::get('/checkout', [CheckoutController::class, 'index'])->name('website.checkout');

//shop list route
Route::get('/shop-list', [ShopListController::class, 'index'])->name('website.shop-list');

//shop details route
Route::get('/shop-details/{id?}', [ShopDetailsController::class, 'show'])->name('website.shop-details');

//shop cart route
Route::get('/shop-cart', [ShopCartController::class, 'index'])->name('website.shop-cart');

//wishlist route
Route::get('/wishlist', [WishListController::class, 'index'])->name('website.wishlist');

//team details route
Route::get('/team-details', [TeamDetailsController::class, 'index'])->name('website.team-details');

//team route
Route::get('/team', [TeamController::class, 'index'])->name('website.team');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
