<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\Authenticate;
use App\Models\Product;
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

Route::get('/',[HomeController::class,'index']);

Route::get('/contact',[HomeController::class,'contact']);

Route::get('/blogs',[HomeController::class,'blogs']);

Route::get('/products',[HomeController::class,'products']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect']);

Route::middleware('auth')->group(function(){
    
    //Category URL Endpoints
    Route::get('/view_category',[CategoryController::class,'view_category']);

    Route::get('/category/add_category',[CategoryController::class,'add_category']);

    Route::post('/category/store',[CategoryController::class,'store']);

    Route::get('/category/edit_category/{id}',[CategoryController::class,'edit_category']);

    Route::put('/category/update/{id}',[CategoryController::class,'update']);

    Route::get('/category/delete/{id}',[CategoryController::class,'delete']);

    //Product URL Endpoints
    Route::get('/products',[ProductController::class,'index']);

    Route::get('/product',[ProductController::class,'add_product']);

    Route::post('/products',[ProductController::class,'store']);

    Route::get('/products/edit_product/{id}',[ProductController::class,'edit_product']);

    Route::put('/products/{id}',[ProductController::class,'update']);

    Route::get('/products/delete/{id}',[ProductController::class,'delete']);

    //Orders URL Endpoints
    Route::get('/orders',[OrderController::class,'index']);

});

