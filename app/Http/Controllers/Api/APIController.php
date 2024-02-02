<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class APIController extends Controller
{
    public function response($data = null, $message = "Success" , $statusCode = 200){
        return response()->json([
            'status' => 'success',
            "message" => $message,
            "data" => $data
        ],$statusCode);
    }

    public function error($data = null , $message = "Success" , $statusCode = 200){
        return response()->json([
            'status' => 'error',
            "message" => $message,
            "data" => $data
        ],$statusCode);
    }
}
