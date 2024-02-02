<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectRequest;
use App\Http\Services\CacheService;
use App\Models\Category;
use App\Models\Project;
use App\MyDataTable\MDT_Method_Action;
use App\MyDataTable\MDT_Query;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    use MDT_Query, MDT_Method_Action;

    public function __construct()
    {
        $this->middleware('haveRole:project.index')->only('index');
        $this->middleware('haveRole:project.create')->only(['create' , 'store']);
        $this->middleware('haveRole:project.update')->only('update');
        $this->middleware('haveRole:project.destroy')->only('destroy');
        $this->middleware('haveRole:project.restore')->only('restore');
        $this->middleware('haveRole:project.finalDelete')->only('finalDelete');

    }

    public function index()
    {

        return  $this->MDT_Query_method(// Start Query
            Project::class ,
            'admin/pages/projects/index',
            IS_TRASH, // Soft Delete
            [
                'select_trans' => ['name', 'sort' => 'SKIP', 'id' => 'SKIP', 'created_at' => 'SKIP' , 'updated_at' => 'SKIP'],
            ]

        ); // end query

    }


    public function create()
    {
        $categories = Category::sort()->where('type', 'projects')->get();

        return view('admin.pages.projects.create', compact('categories'));
    }


    public function store(ProjectRequest $request)
    {
        Project::create($this->columnsDB($request));

        (new CacheService())->updateCachePages();

        return back()->with('success' , __('form.response.create success'));
    }

    public function show($id){

        $categories = Category::sort()->get();

        $project = Project::withTrashed()->findOrFail($id);

        return view('admin.pages.projects.show', compact('project', 'categories'));
    }

    public function update(ProjectRequest $request, $id)
    {
        $project = Project::withTrashed()
            ->findOrFail($id);

        $project->update($this->columnsDB($request  , $project));

        (new CacheService())->updateCachePages();

        return back()->with('success' , __('form.response.update success'));
    }

    public function destroy($id)
    {
        $project = $this->MDT_delete(Project::class , $id);

        (new CacheService())->updateCachePages();

        return $project;
    }

    public function restore($id)
    {
        $project = $this->MDT_restore(Project::class , $id);

        (new CacheService())->updateCachePages();

        return $project;
    }

    public function finalDelete($id)
    {
        $project = $this->MDT_finalDelete(Project::class , $id);

        (new CacheService())->updateCachePages();

        return $project;
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

        $gallery = [];
        if ($request->file('gallery') == null){
            $gallery = $old?->gallery;
        }else{
            foreach ($request->file('gallery') as $img){
                $img_name = "golden-path_gallery_".time() . random_int(111111111, 99999999999) . "." . $img->getClientOriginalExtension();
                $img->move(public_path('assets/web/images/products'), $img_name);
                $gallery[] = asset('assets/web/images/products/') .'/'.$img_name;
            }

            $gallery = json_encode($gallery);
        }

        return [
            'sort' => $request->sort,
            'name_ar' => $request->name_ar,
            'name_en' => Str::slug($request->name_en),
            'img' => $this->saveImg('img', $request->img , $old?->img),
            'cover' => $this->saveImg('cover', $request->cover , $old?->cover),
            'gallery' => $gallery,
            'shortDescription_ar' => $request->shortDescription_ar,
            'shortDescription_en' => $request->shortDescription_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'category_id' => $request->category_id,
        ];
    }

    private function saveImg($type, $img , $default = ''){


        if ($img) {

            $img_name = "golden-path_" .$type.'_'.time() . "." . $img->getClientOriginalExtension();
            $img->move(public_path('assets/web/images/projects'), $img_name);

            return $img_name;

        }

        return  $default;
    }
}
