<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeController;
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
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome2');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function () { 
    
    Route::get('/user_management', [App\Http\Controllers\HomeController::class, 'user_management'])->name('user_management');
    Route::get('/change_role/{userid}/{roleid}/', [App\Http\Controllers\HomeController::class, 'change_role'])->name('change_role');


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::match(['GET', 'POST'], '/category', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
    //Route::match(['GET', 'POST'], 'register', 'App\Http\Controllers\HomeController@category')->name('category');
    Route::get('/category/{id}', [App\Http\Controllers\HomeController::class, 'category_detail'])->name('category_detail');
    Route::match(['GET', 'POST'], '/register/company', [App\Http\Controllers\HomeController::class, 'register_company'])->name('register_company');

    Route::get('/company_detail/{id}', [App\Http\Controllers\HomeController::class, 'company_detail'])->name('company_detail');
    Route::match(['GET', 'POST'], '/add/prodct/{companyid}', [App\Http\Controllers\HomeController::class, 'add_prodct'])->name('add_prodct');
    //Route::match(['GET', 'POST'], '/my/payments', [App\Http\Controllers\HomeController::class, 'payment'])->name('payment');

    // Route::get('/stripe-payment', [StripeController::class, 'handleGet']);
    // Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');

    Route::match(['GET', 'POST'], '/stripe-payment', [App\Http\Controllers\HomeController::class, 'payment'])->name('stripe.payment');
    Route::get('/product/gallery', [App\Http\Controllers\HomeController::class, 'product_gallery'])->name('product_gallery');
    
    Route::get('/delete/product/{productid}', [App\Http\Controllers\HomeController::class, 'delete_product'])->name('delete_product');
    Route::match(['GET', 'POST'], '/vote', [App\Http\Controllers\HomeController::class, 'vote'])->name('vote');
    Route::post('/comment', [App\Http\Controllers\HomeController::class, 'save_comment'])->name('save_comment');

    Route::get('/winner-list', [App\Http\Controllers\HomeController::class, 'winner'])->name('winner');
    
    
});