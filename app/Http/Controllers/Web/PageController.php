<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Page;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($slug){

        $page = Page::where('slug' , $slug)->firstOrFail();

        $lang = app()->getLocale();

        return view('web.pages.page.index' , compact('page' , 'lang'));
    }
}
