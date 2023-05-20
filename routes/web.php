<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

     Route::get('/',[WebsiteController::class, 'index']);
     Route::get('/cat/{id}', [WebsiteController::class, 'show_cat_by_id'])->name('cat_page');
Auth::routes();

Route::get('/home', [App\Http\Controllers\WebsiteController::class, 'index'])->name('home');
Route::get('/search', [WebsiteController::class, 'search'])->name('search');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// dashbord links
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

Route::resource('Product', 'App\Http\Controllers\ProductController');

//delete product
Route::get('Product/delete/{id}',[ProductController::class, 'delete']);






Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'updateCart'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');


Route::get('purchase', [ProductController::class, 'purchase'])->name('purchase')->middleware('auth');
Route::post('checkout', [ProductController::class, 'checkout'])->name('checkout')->middleware('auth');



//category links
Route::resource('Category', 'App\Http\Controllers\CategoryController');

//delete product
Route::get('Category/delete/{id}',[CategoryController::class, 'delete']);
