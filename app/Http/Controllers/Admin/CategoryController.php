<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\MyDataTable\MDT_Method_Action;
use App\MyDataTable\MDT_Query;
use Illuminate\Http\Request;
use Psy\Util\Str;

class CategoryController extends Controller
{

    use MDT_Query , MDT_Method_Action;

    protected $lang;

    public function __construct()
    {
        $this->lang = app()->getLocale();

        $this->middleware('haveRole:category.index')->only('index');
        $this->middleware('haveRole:category.create')->only(['create' , 'store']);
        $this->middleware('haveRole:category.update')->only('update');
        $this->middleware('haveRole:category.destroy')->only('destroy');
        $this->middleware('haveRole:category.restore')->only('restore');
        $this->middleware('haveRole:category.finalDelete')->only('finalDelete');

    }

    public function index()
    {

        return  $this->MDT_Query_method(// Start Query
            Category::class ,
            'admin/pages/categories/index',
            IS_TRASH, // Soft Delete
            [ // Other Options
//                'condition' => ['where' , 'parent_id' , '!=' , 0],
            ]

        ); // end query

    }


    public function create()
    {
        return view('admin.pages.categories.create')->with([
            'lang' => $this->lang
        ]);
    }


    public function store(CategoryRequest $request)
    {

        Category::create($this->columnsDB($request));

        return back()->with('success' , __('form.response.create category'));

    }


    public function update(CategoryRequest $request, $id)
    {

        $category = Category::withTrashed()
            ->findOrFail($id);

        $category->update($this->columnsDB($request , $category->img));

        return response([
            'status' => 'success' ,
            'message' => __('form.response.update category'),
            'url' => [
                'img' => asset("assets/web/images/categories/$category->img")
            ]
        ]);
    }

    public function destroy($id)
    {
        return $this->MDT_delete(Category::class , $id);
    }

    public function restore($id)
    {

        return $this->MDT_restore(Category::class , $id);
    }

    public function finalDelete($id)
    {
        return $this->MDT_finalDelete(Category::class , $id);
    }


    public function sortShow(){

        $categories = Category::sort()->get();


        return view('admin.pages.categories.sort')->with([
            'categories' => $categories,
            'lang'     => $this->lang,
        ]);

    }

    public function sortSave(){
        $sort = 0;

        foreach (\request('category_id') as $category_id):

            Category::where('id' , $category_id)->update([
                'sort' => $sort
            ]);

            $sort++;
        endforeach;

        return back();
    }



      ///////////////////////////////////////////////////////
     ////                                               ////
    //// ..........  Methods Clean Code .............. ////
   ////                                               ////
  ///////////////////////////////////////////////////////


    public function columnsDB($request , $oldImage = 'default.svg'){

        $imgName = null;

        $img = $request->file('icon');

        if ($img) {

            $imgName = $request->name_en.".svg";
            $img->move(public_path('assets/web/images/categories') , $imgName);
        }

        return [
            'type'   => $request->type,
            'name_ar'   => $request->name_ar,
            'name_en'   => $request->name_en,
            'slug' => \Illuminate\Support\Str::slug($request->name_en)
        ];
    }


}
