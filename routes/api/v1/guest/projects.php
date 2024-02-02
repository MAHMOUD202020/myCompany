<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MessageController;

Route::resource('projects', \App\Http\Controllers\Api\V1\ProjectController::class);
Route::get('paginate/projects', [\App\Http\Controllers\Api\V1\ProjectController::class, 'paginate']);
Route::get('categories/has-projects', [\App\Http\Controllers\Api\V1\ProjectController::class, 'categories']);
Route::get('categories/with-projects', [\App\Http\Controllers\Api\V1\ProjectController::class, 'categoriesWithProjects']);
