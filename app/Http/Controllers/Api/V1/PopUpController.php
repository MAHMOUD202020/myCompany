<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BlockResource;
use App\Models\Block;

class PopUpController extends Controller
{
    public function index(){
        if (cache('popUp') == null){
            cache()->forever('popUp', BlockResource::make(Block::customSelect()->where('name', 'popup')->first()));
        }

        return cache('popUp');
    }
}
