<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MessageController;

Route::resource('products', \App\Http\Controllers\Api\V1\ProductController::class);
Route::get('paginate/products', [\App\Http\Controllers\Api\V1\ProductController::class, 'paginate']);
Route::get('categories/has-products', [\App\Http\Controllers\Api\V1\ProductController::class, 'categories']);
Route::get('categories/with-products', [\App\Http\Controllers\Api\V1\ProductController::class, 'categoriesWithProducts']);
