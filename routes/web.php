<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


Route::resource('products','ProductController');
Route::get('/findSubCategory',[CategoryController::class,'findSub']);
//Route::post('upload',[ProductController::class,'uploadImage'])->name('upload');

Route::resource('categories','CategoryController');
Route::post('categories',[CategoryController::class,'save'])->name('categories.save');

// Auth::routes();