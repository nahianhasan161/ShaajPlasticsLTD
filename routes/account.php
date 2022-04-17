<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CategoryController;

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'account','as' => 'account.'],function(){
    Route::get('/history',[AccountController::class,'history'])->name('history');

});
