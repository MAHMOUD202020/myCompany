<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MessageController;

Route::get('page/home', [\App\Http\Controllers\Api\V1\HomePageController::class, 'index']);
Route::get('page/services', [\App\Http\Controllers\Api\V1\ServicePageController::class, 'index']);
Route::get('page/projects', [\App\Http\Controllers\Api\V1\ProjectsPageController::class, 'index']);
Route::get('page/projects/{id}', [\App\Http\Controllers\Api\V1\ProjectsPageController::class, 'show']);
Route::get('page/aboutUs', [\App\Http\Controllers\Api\V1\AboutUsPageController::class, 'index']);
Route::get('page/contactUs', [\App\Http\Controllers\Api\V1\ContactUsPageController::class, 'index']);
Route::get('page/posts', [\App\Http\Controllers\Api\V1\BlogPageController::class, 'index']);
Route::get('page/posts/{id}', [\App\Http\Controllers\Api\V1\BlogPageController::class, 'show']);
Route::get('popUp', [\App\Http\Controllers\Api\V1\PopUpController::class, 'index']);
