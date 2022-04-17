<?php

use App\Http\Controllers\RequestController;
use App\Http\Controllers\CategoryController;

use Illuminate\Support\Facades\Route;

// !FrontENd
Route::get('/',[RequestController::class,'welcome'])->name('welcome');

// !products
Route::get('/products', [CategoryController::class,'show'])->name('products');
Route::get('/products/{category:slug}', [CategoryController::class,'products']);
Route::get('/products/search/{term}', [CategoryController::class,'search']);
// !productsENd
Route::get('/services',[RequestController::class,'services'])->name('services');

Route::get('/about', [RequestController::class,'about'])->name('about');

Route::get('/contacts',[RequestController::class,'contacts'])->name('contacts');

Route::get('/user/login',[RequestController::class,'login'])->name('user.login');

// !FrontENd
