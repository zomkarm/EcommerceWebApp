<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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

//Admin Routes
Route::get('/redirect',[HomeController::class,'redirect']);

Route::get('/view_category',[CategoryController::class,'view_category']);

Route::get('/category/add_category',[CategoryController::class,'add_category']);

Route::post('/category/store',[CategoryController::class,'store']);

Route::get('/category/edit_category/{id}',[CategoryController::class,'edit_category']);

Route::put('/category/update/{id}',[CategoryController::class,'update']);

Route::get('/category/delete/{id}',[CategoryController::class,'delete']);
