<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;
use App\MyDataTable\MDT_Method_Action;
use App\MyDataTable\MDT_Query;
use Illuminate\Http\Request;

class PageController extends Controller
{
    use MDT_Query, MDT_Method_Action;

    public function index()
    {

        return  $this->MDT_Query_method(// Start Query
            Page::class ,
            'admin/pages/pages/index',
            IS_TRASH, // Soft Delete
            [
                'select_trans' => ['name', 'slug' => 'SKIP', 'id' => 'SKIP', 'created_at' => 'SKIP' , 'updated_at' => 'SKIP'],
            ]

        ); // end query

    }


    public function create()
    {
        return view('admin.pages.pages.create');
    }


    public function store(PageRequest $request)
    {

        Page::create($this->columnsDB($request));

        return back()->with('success' , __('form.response.create pages'));

    }

    public function show($id){

        $page = Page::withTrashed()->findOrFail($id);

        return view('admin.pages.pages.show', compact('page'));
    }

    public function update(PageRequest $request, $id)
    {

        $page = Page::withTrashed()
            ->select('id' , 'cover')
            ->findOrFail($id);

        $page->update($this->columnsDB($request  , $page->cover));

        return back()->with('success' , __('form.response.update pages'));

    }

    public function destroy($id)
    {
        return $this->MDT_delete(Page::class , $id);
    }

    public function restore($id)
    {

        return $this->MDT_restore(Page::class , $id);
    }

    public function finalDelete($id)
    {
        return $this->MDT_finalDelete(Page::class , $id);
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
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'slug' => \Str::slug($request->slug),
            'cover' => $this->saveImg( $request , $old),
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
        ];
    }

    private function saveImg($request , $default = ''){

        $img = $request->file('cover');

        if ($img) {

            $img_name = time() . "." . $img->getClientOriginalExtension();
            $img->move(public_path('assets/web/images/pages'), $img_name);

            return $img_name;

        }

        return  $default;
    }
}
