<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PartnerRequest;
use App\Http\Services\CacheService;
use App\Models\Partner;
use App\MyDataTable\MDT_Method_Action;
use App\MyDataTable\MDT_Query;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PartnerController extends Controller
{

    use MDT_Query , MDT_Method_Action;

    protected $lang;

    public function __construct()
    {
        $this->lang = app()->getLocale();

        $this->middleware('haveRole:partner.index')->only('index');
        $this->middleware('haveRole:partner.create')->only(['create' , 'store']);
        $this->middleware('haveRole:partner.update')->only('update');
        $this->middleware('haveRole:partner.destroy')->only('destroy');
        $this->middleware('haveRole:partner.restore')->only('restore');
        $this->middleware('haveRole:partner.finalDelete')->only('finalDelete');

    }

    public function index()
    {

        return  $this->MDT_Query_method(// Start Query
            Partner::class ,
            'admin/pages/partners/index',
            IS_TRASH, // Soft Delete
            [ // Other Options
//                'condition' => ['where' , 'parent_id' , '!=' , 0],
            ]

        ); // end query

    }


    public function create()
    {

        return view('admin.pages.partners.create')->with([
            'lang' => $this->lang
        ]);

    }


    public function store(PartnerRequest $request)
    {
        Partner::create($this->columnsDB($request));

        (new CacheService())->updateCachePages();

        return back()->with('success' , __('form.response.create success'));
    }


    public function update(PartnerRequest $request, $id)
    {

        $partner = Partner::findOrFail($id);

        $partner->update($this->columnsDB($request , $partner->img));

        (new CacheService())->updateCachePages();

        return response([
            'status' => 'success' ,
            'message' => __('form.response.update success'),
            'url' => [
                'img' => asset("assets/web/images/partners/$partner->img")
            ]
        ]);
    }

    public function destroy($id)
    {
        return $this->MDT_delete(Partner::class , $id);
    }

    public function restore($id)
    {

        return $this->MDT_restore(Partner::class , $id);
    }

    public function finalDelete($id)
    {
        return $this->MDT_finalDelete(Partner::class , $id);
    }


    public function sortShow(){

        $partners = Partner::sort()->get();


        return view('admin.pages.partners.sort')->with([
            'partners' => $partners,
            'lang'     => $this->lang,
        ]);

    }

    public function sortSave(){
        $sort = 0;

        foreach (\request('partner_id') as $partner_id):

            Partner::where('id' , $partner_id)->update([
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

            $imgName = time().'_'.Str::slug($request->name).".png";
            $img->move(public_path('assets/web/images/partners') , $imgName);
        }

        return [
            'name_ar'   => $request->name_ar,
            'name_en'   => $request->name_en,
            'url'   => $request->url,
            'sort'   => $request->sort,
            'parent_id'   => $request->parent_id,
            'icon' => $imgName ?? $oldImage
        ];
    }


}
