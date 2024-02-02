<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MessageController;

Route::resource('partners', \App\Http\Controllers\Api\V1\PartnerController::class);
