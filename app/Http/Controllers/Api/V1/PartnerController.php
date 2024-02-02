<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\APIController;
use App\Http\Resources\V1\PartnerResource;
use App\Http\Resources\V1\ServiceCollection;
use App\Http\Resources\V1\ServiceResource;

use App\Models\Partner;
use App\Models\Service;

class PartnerController extends APIController
{
    public function index()
    {
        $partners = Partner::sort()->customSelect()->get();

        return $this->response(
            PartnerResource::collection($partners)
        );
    }


}
