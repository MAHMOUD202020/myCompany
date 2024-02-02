<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\APIController;
use App\Http\Resources\V1\SliderResource;
use App\Models\Slider;

class SliderController extends APIController
{
    public function index()
    {
        $sliders = Slider::sort()->get();

        return $this->response(
            SliderResource::collection($sliders)
        );
    }

}
