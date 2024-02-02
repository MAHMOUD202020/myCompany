<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\APIController;
use App\Http\Resources\V1\CategoryResource;
use App\Http\Resources\V1\ProjectCollection;
use App\Http\Resources\V1\projectResource;

use App\Models\Category;
use App\Models\Project;

class ProjectController extends APIController
{
    public function index()
    {
        $projects = Project::with('category')->customSelect()->sort()->get();

        return $this->response(
            ProjectCollection::collection($projects)
        );
    }
    public function paginate()
    {
        $projects = Project::with('category')->customSelect()->sort()->paginate();
        return $this->response(
            ProjectCollection::collection($projects)->response()->getData()
        );
    }

    public function show($id)
    {
        $project = Project::with('category')->find($id);

        if ($project == null)
            return $this->error('', 'Not Found');

        return $this->response(
            projectResource::make($project)
        );
    }

    public function categories(){

        $categories = Category::query()->has('projects')->get();

        return $this->response(
            CategoryResource::collection($categories)
        );
    }

    public function categoriesWithProjects(){

        $categories = Category::query()->has('projects')->with('projects', fn($q) => $q->customSelect() )->get();

        return $this->response(
            CategoryResource::collection($categories)
        );
    }


}
