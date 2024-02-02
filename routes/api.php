<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function(){


    foreach (glob(__DIR__."/api/v1/guest/*.php") as $filename)
    {
        require_once($filename);
    }


    Route::group(['middleware' => ['auth:sanctum']], function () {

        foreach (glob(__DIR__."/api/v1/auth/*.php") as $filename)
        {
            require_once($filename);
        }

    });


});

