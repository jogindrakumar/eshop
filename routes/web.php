<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserController;

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

Route::get('/',[FrontendController::class,'index']);
Route::get('category',[FrontendController::class,'category'])->name('frontendCategory');
Route::get('category/{slug}',[FrontendController::class,'viewCategory']);
Route::get('category/{cat_slug}/{prod_slug}',[FrontendController::class,'productView']);

Auth::routes();

Route::POST('/add-to-cart',[CartController::class,'addProduct']);
Route::POST('delete-cart-item',[CartController::class,'deleteproduct']);
Route::POST('update-cart',[CartController::class,'updatecart']);

Route::middleware(['auth'])->group(function(){

    Route::get('cart',[CartController::class,'viewCart']);
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::POST('place-order',[CheckoutController::class,'placeorder']);
    Route::get('my-orders',[UserController::class,'index']);
    Route::get('view-order/{id}',[UserController::class,'view']);
   
});

Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');

//    Route::get('/dashboard','Admin\FrontendController@index');
   

//    Route::get('categories','Admin\CategoryController@index');

// Category ---------- Category ----------------
Route::get('/categories',[CategoryController::class,'index'])->name('category');
Route::get('/add-category',[CategoryController::class,'add'])->name('add-category');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::put('/category/update/{id}',[CategoryController::class,'update'])->name('update.category');
Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

//product -----------------------product ---------------------

Route::get('/product',[ProductController::class,'index'])->name('product');
Route::get('/product-add',[ProductController::class,'add'])->name('product-add');
Route::post('/store',[ProductController::class,'store'])->name('product.store');
Route::get('/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::put('/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('/delete/{id}',[ProductController::class,'delete'])->name('product.delete');

});
