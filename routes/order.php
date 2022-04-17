<?php

use App\Http\Controllers\RequestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'order','as' => 'order.'],function(){
    Route::get('/create', function () {
        return view('authenticated.admin.order.create');
    })->name('create');
    Route::get('/edit/{id}',['as' => 'edit', 'uses' => 'OrderController@edit']);
    Route::get('/invoice/{id}',['as' => 'invoice', 'uses' => 'OrderController@invoice']);
    Route::get('/all', function () {
        return view('authenticated.admin.order.orders');
    })->name('all');
});
