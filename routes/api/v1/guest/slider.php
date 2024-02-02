<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MessageController;

Route::resource('sliders', \App\Http\Controllers\Api\V1\SliderController::class);
