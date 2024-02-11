<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OrderController;

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

Route::get('/',[PageController::class, "index"]);
Route::get('/about',[PageController::class, "about"])->name("about");
Route::get('/contacts',[PageController::class, "contacts"])->name("contacts");

Route::get('/cart',[ProductsController::class, "cart"]);

Route::get('/search', [ProductsController::class, 'search'])->name('search');

Route::get('/catalog',[ProductsController::class, "catalog"]);
Route::get('/category/{slug}',[ProductsController::class, "category"]);
Route::get('/product/{category}/{slug}',[ProductsController::class, "product"]);

Route::post('/sendOrder',[OrderController::class, "sendOrder"]);



Route::get('/filter_get',[ProductsController::class, "filterProducts"]);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
