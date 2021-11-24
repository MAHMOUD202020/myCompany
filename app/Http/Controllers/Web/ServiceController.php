<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index(){

        $page = Page::customSelect()
            ->where('slug' , 'services')
            ->firstOrFail();

        $services = Service::customSelect()->get();

        $blocks = Block::active()
            ->customSelect()
            ->where('name' , 'services')
            ->get();

        return view('web.pages.services.index')->with([
            'services' => $services,
            'blocks' => $blocks,
            'page' => $page
        ]);
    }

    public function show($id){

        $service = Service::findOrFail($id);

        $lang = app()->getLocale();

        return view('web.pages.services.show' , compact('service' , 'lang'));
    }
}
