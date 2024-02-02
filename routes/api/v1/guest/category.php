<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MessageController;

Route::resource('categories', \App\Http\Controllers\Api\V1\C::class);
