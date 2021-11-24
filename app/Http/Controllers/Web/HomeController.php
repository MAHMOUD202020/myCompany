<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Project;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $sliders = Slider::customSelect()->get();

        $blocks = Block::active()
            ->with('items')
            ->where('page' , 'home')
            ->customSelect()
            ->get();

        $services = Service::customSelect()->get();

        $projects = Project::customSelect()->take(9)->get();

        return view('web.pages.home.index')->with([
            'sliders' => $sliders,
            'blocks' => $blocks,
            'services' => $services,
            'projects' => $projects,
        ]);
    }
}
