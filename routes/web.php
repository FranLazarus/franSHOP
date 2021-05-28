<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('back.products_add');
});

Route::resource('products','ProductController');
Route::get('/products',[ProductController::class,'index'])->name('products.list');
Route::get('/findSubCategory',[CategoryController::class,'findSub']);

Route::post('upload',[ProductController::class,'uploadImage'])->name('upload');

// Auth::routes();