<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function uploadImage(\Illuminate\Support\Facades\Request $request){
        $imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location'=> "/storage/$imgpath"]);
    }
}
