<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Service;
use App\MyDataTable\MDT_Method_Action;
use App\MyDataTable\MDT_Query;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use MDT_Query, MDT_Method_Action;

    public function index()
    {

        return  $this->MDT_Query_method(// Start Query
            Service::class ,
            'admin/pages/services/index',
            IS_TRASH, // Soft Delete
            [
                'select_trans' => ['name', 'id' => 'SKIP', 'created_at' => 'SKIP' , 'updated_at' => 'SKIP'],
            ]

        ); // end query

    }


    public function create()
    {

        return view('admin.pages.services.create');

    }


    public function store(ServiceRequest $request)
    {

        Service::create($this->columnsDB($request));

        return back()->with('success' , __('form.response.create services'));

    }

    public function show($id){

        $service = Service::withTrashed()->findOrFail($id);

        return view('admin.pages.services.show', compact('service'));
    }

    public function update(ServiceRequest $request, $id)
    {

        $service = Service::withTrashed()
            ->select('id' , 'cover')
            ->findOrFail($id);

        $service->update($this->columnsDB($request  , $service->cover));

        return back()->with('success' , __('form.response.update services'));

    }

    public function destroy($id)
    {
        return $this->MDT_delete(Service::class , $id);
    }

    public function restore($id)
    {

        return $this->MDT_restore(Service::class , $id);
    }

    public function finalDelete($id)
    {
        return $this->MDT_finalDelete(Service::class , $id);
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
            'icon' => $request->icon,
            'cover' => $this->saveImg($request , $old),
            'shortDescription_ar' => $request->shortDescription_ar,
            'shortDescription_en' => $request->shortDescription_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en??0,
        ];
    }

    private function saveImg($request , $default = ''){

        $img = $request->file('cover');

        if ($img) {

            $img_name = time() . "." . $img->getClientOriginalExtension();
            $img->move(public_path('assets/web/images/services'), $img_name);

            return $img_name;

        }

        return  $default;
    }
}
