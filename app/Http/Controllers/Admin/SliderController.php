<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Http\Services\CacheService;
use App\Models\Slider;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('haveRole:slider.index')->only('index');
        $this->middleware('haveRole:slider.create')->only(['create' , 'store']);
        $this->middleware('haveRole:slider.update')->only('update');
        $this->middleware('haveRole:slider.destroy')->only('destroy');
        $this->middleware('haveRole:slider.trash')->only('trash');
        $this->middleware('haveRole:slider.restore')->only('restore');
        $this->middleware('haveRole:slider.finalDelete')->only('finalDelete');
    }


    public function index(){

        $sliders = Slider::customSelect()->sort()->get();

        return view("admin.pages.sliders.index" , compact('sliders'));
    }

    public function create(){

        return view("admin.pages.sliders.create");

    }

    public function store(SliderRequest $request){

        Slider::create($this->columnsDB($request));

        (new CacheService())->updateCachePages();

        return back()->with('success' , __('form.response.create slider'));
    }

    public function edit($id){

        $slider = Slider::where('id' , $id)->firstOrFail();

        return view("admin.pages.sliders.edit" , compact('slider'));
    }

    public function update(SliderRequest $request , $id){

        $slider = Slider::where('id' , $id)->firstOrFail();

        $slider->update($this->columnsDB($request  , $slider->img , $slider->background));

        (new CacheService())->updateCachePages();

        return back()->with('success' , __('form.response.update slider'));
    }

    public function destroy($id){

        $item = Slider::findOrFail($id);

        \File::delete(public_path("assets/web/images/slider/$item->img"));

        \File::delete(public_path("assets/web/images/slider/$item->background"));

        $item->delete();

        (new CacheService())->updateCachePages();

        return back()->with('success' , __('form.response.delete success'));

    }


    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods Clean Code .............. ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    private function columnsDB($request , $img = null , $background = null){
       return [
           'title_ar' => $request->title_ar,
           'title_en' => $request->title_en,
           'text_ar' => $request->text_ar,
           'text_en' => $request->text_en,
           'btn_text_ar' => $request->btn_text_ar,
           'btn_text_en' => $request->btn_text_en,
           'url' => $request->url,
           'sort' => $request->sort,
           'img' => $this->saveImg($request->img , $img),
           'background' => $this->saveImg($request->background , $img),
        ];
    }

    private function saveImg($img , $default = ''){

        if ($img) {

            try {

                $img_name = "golden-path_" . Str::random().time() . "." . $img->getClientOriginalExtension();
                $img->move(public_path('assets/web/images/slider'), $img_name);

                return $img_name;
            }
            catch (\Exception $e){
                dd($e);
            }

        }

        (new CacheService())->updateCachePages();

        return  $default;

    }

}
