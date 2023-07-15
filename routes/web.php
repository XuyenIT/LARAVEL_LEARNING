<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/category', [CategoryController::class, 'index'])
->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])
->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])
->name('category.store');
Route::get('/category/product/{id}', [CategoryController::class, 'allProductByCategory'])
->name('category.product');
Route::get('/product', [ProductController::class, 'index'])
->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])
->name('product.create');
Route::post('/product', [ProductController::class, 'store'])
->name('product.store');
Route::get('/product/delete/{id}', [ProductController::class, 'delete'])
->name('product.delete');
Route::get('/product/edit/{product}', [ProductController::class, 'edit'])
->name('product.edit');
Route::put('/product/{product}', [ProductController::class, 'update'])
->name('product.update');
