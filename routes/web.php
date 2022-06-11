<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[FrontendController::class,'index']);

//    Route::get('/dashboard','Admin\FrontendController@index');
   
Route::get('/categories',[CategoryController::class,'index'])->name('category');
//    Route::get('categories','Admin\CategoryController@index');

Route::get('/add-category',[CategoryController::class,'add'])->name('add-category');
Route::post('/store',[CategoryController::class,'store'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
});
