<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Models\Project;
use App\MyDataTable\MDT_Method_Action;
use App\MyDataTable\MDT_Query;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use MDT_Query, MDT_Method_Action;

    public function index()
    {

        return  $this->MDT_Query_method(// Start Query
            Project::class ,
            'admin/pages/projects/index',
            IS_TRASH, // Soft Delete
            [
                'select_trans' => ['name', 'id' => 'SKIP', 'created_at' => 'SKIP' , 'updated_at' => 'SKIP'],
            ]

        ); // end query

    }


    public function create()
    {
        return view('admin.pages.projects.create');
    }


    public function store(ProjectRequest $request)
    {

        Project::create($this->columnsDB($request));

        return back()->with('success' , __('form.response.create projects'));

    }

    public function show($id){

        $project = Project::withTrashed()->findOrFail($id);

        return view('admin.pages.projects.show', compact('project'));
    }

    public function update(ProjectRequest $request, $id)
    {

        $project = Project::withTrashed()
            ->select('id' , 'cover', 'img')
            ->findOrFail($id);

        $project->update($this->columnsDB($request  , $project->cover));

        return back()->with('success' , __('form.response.update projects'));

    }

    public function destroy($id)
    {
        return $this->MDT_delete(Project::class , $id);
    }

    public function restore($id)
    {

        return $this->MDT_restore(Project::class , $id);
    }

    public function finalDelete($id)
    {
        return $this->MDT_finalDelete(Project::class , $id);
    }


    public function uploadImage(Request $request){

        $fileName=$request->file('file')->getClientOriginalName();
        $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location'=>"/storage/$path"]);

        /*$imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);*/

    }



    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods Clean Code .............. ////
    ////                                               ////
    ///////////////////////////////////////////////////////

    private function columnsDB($request , $old = null){

        return [
            'sort' => $request->sort,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'category_ar' => $request->category_ar,
            'category_en' => $request->category_en,
            'img' => $this->saveImg('img', $request , $old),
            'cover' => $this->saveImg('cover', $request , $old),
            'shortDescription_ar' => $request->shortDescription_ar,
            'shortDescription_en' => $request->shortDescription_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en??0,
        ];
    }

    private function saveImg($type, $request , $default = ''){

        $img = $request->file($type);

        if ($img) {

            $img_name = $type.'_'.time() . "." . $img->getClientOriginalExtension();
            $img->move(public_path('assets/web/images/projects'), $img_name);

            return $img_name;

        }

        return  $default;
    }
}
