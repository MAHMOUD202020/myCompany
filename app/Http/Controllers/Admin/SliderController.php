<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Slider;

class SliderController extends Controller
{

    public function index(){

        $sliders = Slider::customSelect()->sort()->get();

        return view("admin.pages.sliders.index" , compact('sliders'));
    }

    public function create(){

        return view("admin.pages.sliders.create");

    }

    public function store(SliderRequest $request){

        Slider::create($this->columnsDB($request));

        return back()->with('success' , __('form.response.create slider'));
    }

    public function edit($id){

        $slider = Slider::where('id' , $id)->firstOrFail();

        return view("admin.pages.sliders.edit" , compact('slider'));
    }

    public function update(SliderRequest $request , $id){

        $slider = Slider::where('id' , $id)->firstOrFail();

        $slider->update($this->columnsDB($request  , $slider->img , $slider->background));

        return back()->with('success' , __('form.response.update slider'));
    }

    public function destroy($id){

        $item = Slider::findOrFail($id);

        \File::delete(public_path("assets/web/images/slider/$item->img"));

        \File::delete(public_path("assets/web/images/slider/$item->background"));

        $item->delete();

        return back()->with('success' , __('form.response.delete success'));

    }


    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods Clean Code .............. ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    private function saveImg($request , $default = ''){

        $img = $request->file('img');

        if ($img) {

            $img_name = 'img_' . time() . "." . $img->getClientOriginalExtension();
            $img->move(public_path('assets/web/images/slider'), $img_name);

            return $img_name;

        }

        return  $default;
    }

    private function saveBackGround($request ,  $default = ''){

        $background = $request->file('background');

        if ($background) {

            $background_name = 'background_' . time() . "." . $background->getClientOriginalExtension();
            $background->move(public_path('assets/web/images/slider'), $background_name);

            return $background_name;
        }

        return  $default;
    }


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
           'img' => $this->saveImg($request , $img),
           'background' => $this->saveBackGround($request , $background),
        ];
    }
}
