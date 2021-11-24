<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\NewsletterRequest;
use App\Models\Block;
use App\Models\Newsletter;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{


    public function save(NewsletterRequest $request){

        Newsletter::updateOrCreate([
            'email' =>$request->email
        ]);

        return response( ['status' => 'success']);
    }

}
