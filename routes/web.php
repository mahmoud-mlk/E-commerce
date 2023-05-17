<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebsiteController;


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
