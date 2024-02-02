<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\MessageController;

Route::post('sendMessage', [MessageController::class, 'sendMessage'])->middleware(['apiRequestLimit:3']);
