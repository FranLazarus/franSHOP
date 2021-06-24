<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeveloperController;


Route::resource('products','ProductController');
//Route::post('upload',[ProductController::class,'uploadImage'])->name('upload');


Route::get('/findSubCategory',[CategoryController::class,'findSub']);

Route::get('categories',[CategoryController::class,'index'])->name('categories.index');
Route::post('categories',[CategoryController::class,'save'])->name('categories.save');
Route::get('categories/store',[CategoryController::class,'store'])->name('categories.store');
Route::get('categories/update',[CategoryController::class,'update'])->name('categories.update');
Route::get('categories/destroy/{id}',[CategoryController::class,'destroy'])->name('categories.destroy');

Route::get('developer',[DeveloperController::class,'showinfo']);

// Auth::routes();