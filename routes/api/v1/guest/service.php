<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MessageController;

Route::resource('services', \App\Http\Controllers\Api\V1\ServiceController::class);
