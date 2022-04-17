<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'bill.'],function(){
    Route::get('order/{order}/bill/create',[BillController::class,'create'])->name('create');
    Route::get('order/{order}/bill/{bills}/edit',[BillController::class,'edit'])->name('edit');
    Route::get('order/{order}/bill/{bill}/invoice/',[BillController::class,'invoice'])->name('invoice');
    Route::get('order/{order}/all',[BillController::class,'all'])->name('all');
});
