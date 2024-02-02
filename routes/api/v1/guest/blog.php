<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MessageController;

Route::resource('blogs', \App\Http\Controllers\Api\V1\BlogController::class);
Route::get('categories/blogs', [\App\Http\Controllers\Api\V1\BlogController::class, 'categories']);
