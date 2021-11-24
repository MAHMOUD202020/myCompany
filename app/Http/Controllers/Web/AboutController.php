<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index(){

        $page = Page::customSelect()
            ->where('slug' , 'about-us')
            ->firstOrFail();

        $blocks = Block::active()
            ->where('name' , 'clientsSays')
            ->orWhere('page' , 'about')
            ->with('items')
            ->customSelect()
            ->get();

        return view('web.pages.about.index')->with([
            'page' => $page,
            'blocks' => $blocks
        ]);
    }

}
