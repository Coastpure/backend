<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::controller(ProductsController::class)->group(function () {
    Route::get('products', 'index');
    Route::post('products', 'store');
    Route::get('products/{id}', 'show');
    Route::put('products/{id}', 'update');
    Route::delete('products/{id}', 'destroy');
}); 

Route::controller(CategoryController::class)->group(function () {
    Route::get('categories', 'index');
    Route::post('categories', 'store');
    Route::get('categories/{id}', 'show');
    Route::put('categories/{id}', 'update');
    Route::delete('categories/{id}', 'destroy');
});