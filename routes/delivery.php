<?php

use App\Http\Controllers\RequestController;
use App\Http\Controllers\CategoryController;

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'delivery','as' => 'delivery.'],function(){
    Route::get('/create', function () {
        return view('authenticated.admin.delivery.create');
    })->name('create');
    Route::get('/all/{id}','DeliveryController@deliveries')->name('all');
    Route::get('/invoice/{id}','DeliveryController@invoice')->name('invoice');
});
