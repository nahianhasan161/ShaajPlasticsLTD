<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\RowMetarialController;
use App\Http\Controllers\ViaController;
use App\Mail\ClientMail;
use App\Mail\OrderMail;
use App\Models\Request;
use App\Models\RowMetarial;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Artisan;
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


// !Mail Testing
/*  Route::get('/email', function () {
     $data = Request::all()->first();
    return new ClientMail($data);

}); */
/*  Route::get('/email/order', function () {
    return new OrderMail(1,1);

}); */
 /* Route::get('send-mail', function () {



    Mail::to('nahianhasan121@gmail.com')->send(new OrderMail());

    dd("Email is Sent.");
});
Route::get('/d6a498beb6922eb6d6e4575d97f5fdc2.html', function () {
    return view('welcome');
}); */
// !Mail Testing
// !test
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// !test

// !Admin
Route::group([
'prefix' => 'admin','as' => 'admin.','middleware' => ['role:admin']
],function(){
    Route::get('/dashboard', [CompanyController::class,'dashboard'])->name('dashboard');

// !Partials sidebar
    Route::get('/client', function () {
        return view('authenticated.admin.company.client');
    })->name('client');
    Route::get('/client/{client}/view', [ViaController::class,'clientBills'])->name('client.view');
    Route::get('/company', function () {
        return view('authenticated.admin.company.company');
    })->name('company');
    Route::get('/via', function () {
        return view('authenticated.admin.company.via');
    })->name('via');
    Route::get('/request', function () {
        return view('authenticated.admin.company.request');
    })->name('request');
    Route::get('/invoice', function () {
        return view('authenticated.admin.company.invoice');
    })->name('invoice');
    Route::get('/invoice/show', function () {
        return view('authenticated.admin.company.invoice');
    })->name('invoice.show');


// !End Partial Sidebar

// !Website Content
Route::group(['prefix' => 'website','as' => 'website.'],function(){

    Route::get('/about', function () {
        return view('authenticated.admin.website.about');
    })->name('about');
    Route::get('/footer', function () {
        return view('authenticated.admin.website.footer');
    })->name('footer');
    Route::get('/images', function () {
        return view('authenticated.admin.website.images');
    })->name('image');
});

// !End Website Content

    Route::get('/users', function () {
        return view('authenticated.admin.manage_user.users');
    })->name('users');

    require __DIR__.'/inventory.php';
    require __DIR__.'/order.php';
    require __DIR__.'/delivery.php';
    require __DIR__.'/bill.php';
    require __DIR__.'/account.php';

});


// !End Admin
Route::get('/userset/{id}', [RowMetarialController::class, 'show']);
Route::get('row-metarial/{id}', [RowMetarialController::class,'show']);

require __DIR__.'/auth.php';
require __DIR__.'/website.php';

