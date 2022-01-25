<?php

use App\Http\Controllers\RowMetarialController;
use App\Mail\OrderMail;
use App\Models\RowMetarial;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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
    return view('components.Frontend.welcome');
});
/* Route::get('/email', function () {
    return new OrderMail();
}); */
Route::get('send-mail', function () {



    Mail::to('nahianhasan121@gmail.com')->send(new OrderMail());

    dd("Email is Sent.");
});
Route::get('/d6a498beb6922eb6d6e4575d97f5fdc2.html', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::group([
'prefix' => 'admin','as' => 'admin.','middleware' => ['role:admin']
],function(){
    Route::get('/dashboard', function () {
        return view('authenticated.admin.dashboard');
    })->name('dashboard');
    Route::get('/company', function () {
        return view('authenticated.admin.company.company');
    })->name('company');
    Route::get('/via', function () {
        return view('authenticated.admin.company.via');
    })->name('via');
    Route::get('/users', function () {
        return view('authenticated.admin.manage_user.users');
    })->name('users');
    Route::group(['prefix' => 'inventory','as' => 'inventory.'],function(){

        Route::get('products', function () {
            return view('authenticated.admin.inventory.products');
        })->name('products');
        Route::get('production', function () {
            return view('authenticated.admin.inventory.production');
        })->name('production');
        Route::get('plastic-products', function () {
            return view('authenticated.admin.inventory.plastic_products');
        })->name('plastic.products');

        Route::get('row-metarial', function () {
            return view('authenticated.admin.inventory.row_metarial');
        })->name('row_meterial');
        Route::get('row-metarial/{id}', [RowMetarialController::class,'show']);
});

    Route::group(['prefix' => 'order','as' => 'order.'],function(){
        Route::get('/all', function () {
            return view('authenticated.admin.order.orders');
        })->name('all');
    });
    Route::group(['prefix' => 'delivery','as' => 'delivery.'],function(){
        Route::get('/all', function () {
            return view('authenticated.admin.order.orders');
        })->name('all');
    });

});

Route::get('/userset/{id}', [RowMetarialController::class, 'show']);
Route::get('row-metarial/{{id}}', [RowMetarialController::class,'show']);
require __DIR__.'/auth.php';
