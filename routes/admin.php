<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BookImageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;



//admin routes
Route::middleware('auth')
    ->as('admin.')    
    ->group(function () {
      
      //dashboard routes
      Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

      //countries routes
      Route::controller(CountryController::class)
      ->prefix('countries')
      ->name('countries.')
      ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{country}', 'show')->name('show');
        Route::get('/{country}/edit', 'edit')->name('edit');
        Route::put('/{country}', 'update')->name('update');
        Route::delete('/{country}', 'destroy')->name('destroy');
      });

      //categories routes
      Route::controller(CategoryController::class)
      ->prefix('categories')
      ->name('categories.')
      ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{category}', 'show')->name('show');
        Route::get('/{category}/edit', 'edit')->name('edit');
        Route::put('/{category}', 'update')->name('update');
        Route::delete('/{category}', 'destroy')->name('destroy');
      });

      //authors routes
      Route::controller(AuthorController::class)
      ->prefix('authors')
      ->name('authors.')
      ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{author}', 'show')->name('show');
        Route::get('/{author}/edit', 'edit')->name('edit');
        Route::put('/{author}', 'update')->name('update');
        Route::delete('/{author}', 'destroy')->name('destroy');
      });
      //books routes
      Route::controller(BookController::class)
      ->prefix('books')
      ->name('books.')
      ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{book}', 'show')->name('show');
        Route::get('/{book}/edit', 'edit')->name('edit');
        Route::put('/{book}', 'update')->name('update');
        Route::delete('/{book}', 'destroy')->name('destroy');
      });

      //orders routes
      Route::controller(OrderController::class)
      ->prefix('orders')
      ->name('orders.')
      ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{order}', 'show')->name('show');
        Route::get('/{order}/edit', 'edit')->name('edit');
        Route::put('/{order}', 'update')->name('update');
        Route::delete('/{order}', 'destroy')->name('destroy');
      });

      //users routes
      Route::controller(UserController::class)
      ->prefix('users')
      ->name('users.')
      ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{user}/edit', 'edit')->name('edit');
        Route::put('/{user}', 'update')->name('update');
        Route::delete('/{user}', 'destroy')->name('destroy');
      });

      //abouts routes
      Route::controller(AboutController::class)
      ->prefix('abouts')
      ->name('abouts.')
      ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{about}/edit', 'edit')->name('edit');
        Route::put('/{about}', 'update')->name('update');
        Route::delete('/{about}', 'destroy')->name('destroy');
      });

      //book images routes
      Route::controller(BookImageController::class)
      ->prefix('book-images')
      ->name('book-images.')
      ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{bookImage}/edit', 'edit')->name('edit');    
        Route::put('/{bookImage}', 'update')->name('update');
        Route::get('/{bookImage}', 'destroy')->name('destroy');
      });
      //sliders routes
      Route::controller(SliderController::class)
      ->prefix('sliders')
      ->name('sliders.')
      ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{slider}/edit', 'edit')->name('edit');
        Route::put('/{slider}', 'update')->name('update');
        Route::delete('/{slider}', 'destroy')->name('destroy');
      });




});

