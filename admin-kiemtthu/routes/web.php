<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\InvoiceDetailController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\User\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserOutsiteController;
use App\Http\Controllers\User\ProductOutSideController;
use App\Models\Product;

// admin
Route::group(['prefix'=>'admin'], function(){
    Route::resource('account', AccountController::class);
    Route::resource('cart', CartController::class);
    Route::resource('invoice', InvoiceController::class);
    Route::resource('invoice_detail', InvoiceDetailController::class);
    Route::resource('product', ProductController::class);
    Route::resource('product_type', ProductTypeController::class);
});


// user
Route::get('/login', [HomeController::class , 'login']);
Route::post('/login', [HomeController::class , 'postLogin']);
Route::get('/logout', [HomeController::class , 'logout']);
Route::post('/register', [HomeController::class , 'register']);

Route::group(['middleware' => 'AuthUserMiddleware'], function () {
    Route::get('/', [HomeController::class , 'home']);
    //user
    Route::get('/detail-user', [UserOutsiteController::class , 'showDetailInfoUser']);
    Route::post('/detail-user', [UserOutsiteController::class , 'postDetailInfoUser']);

    //product
    Route::get('/product/{id}', [ProductOutSideController::class , 'detailProduct']);
    Route::get('/list-product', [HomeController::class , 'listProduct']);

    //search
    Route::get('/search', [ProductOutSideController::class , 'search']);

    //cart
    Route::get('/cart', [HomeController::class , 'cart']);

    //
    Route::get('/detail', [HomeController::class , 'detail']);

    // more
    Route::get('/contact', [HomeController::class , 'contact']);
});




