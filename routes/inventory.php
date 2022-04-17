<?php


use App\Http\Controllers\RowMetarialController;

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'inventory','as' => 'inventory.'],function(){

    Route::get('products', function () {
        return view('authenticated.admin.inventory.products');
    })->name('products');

    /* Route::get('production/{id}',  ['as' => 'factory_production', 'uses' => 'RowMetarialController@createProduction'] ); */
    Route::get('production/{id}',  ['as' => 'factory_production_history', 'uses' => 'RowMetarialController@showProduction']);
    Route::get('production/{id}/create',  ['as' => 'factory_production', 'uses' => 'RowMetarialController@createProduction']);
    Route::get('product/category', function () {
        return view('authenticated.admin.inventory.category');
    })->name('product.category');

    Route::get('plastic-products', function () {
        return view('authenticated.admin.inventory.plastic_products');
    })->name('plastic.products');

    Route::get('factory', function () {
        return view('authenticated.admin.inventory.factory');
    })->name('factory');
    Route::get('factory/{id}',  ['as' => 'factory_meterial', 'uses' => 'RowMetarialController@createMeterial']);

    /* Route::get('/novanoticia', ['as' => 'route_name', 'uses' => 'HomeController@getNovaNoticia']); */
   /*  Route::get('row-metarial', function () {
        return view('authenticated.admin.inventory.row_metarial');
    })->name('row_meterial'); */
    Route::get('row-metarial/{id}',  ['as' => 'row-metarial', 'uses' => 'RowMetarialController@history']);
    /* Route::get('row-metarial/{id}', [RowMetarialController::class,'show']); */
});
