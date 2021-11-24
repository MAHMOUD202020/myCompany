<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Page;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index(){

        $page = Page::customSelect()
            ->where('slug' , 'our-work')
            ->firstOrFail();

        $projects = Project::customSelect()->paginate(12);

        $block = Block::active()
            ->customSelect()
            ->where('name' , 'projects')
            ->first();

        return view('web.pages.projects.index')->with([
            'projects' => $projects,
            'block' => $block,
            'page' => $page
        ]);
    }

    public function show($id){

        $project = Project::findOrFail($id);

        $lang = app()->getLocale();

        return view('web.pages.projects.show' , compact('project' , 'lang'));
    }
}
