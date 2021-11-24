<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlockRequest;
use App\Models\Block;

class BlockController extends Controller
{

    public function index(){

        $blocks = Block::orderBy('page' , 'desc')
            ->customSelect()
            ->get();

        return view("admin.pages.block.index" , compact('blocks'));
    }


    public function edit($id){

        $block = Block::findOrFail($id);

        return view("admin.pages.block.edit" , compact('block'));
    }

    public function update(BlockRequest $request , $id){


        $block = Block::findOrFail($id);


        $block->update([
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'text_ar' => $request->text_ar,
            'text_en' => $request->text_en,
            'img' => $this->saveImg($request , $block->img),
        ]);

        return back()->with('success' , __('form.response.update success'));
    }


    public function toggleView($id){

        $block = Block::find($id);

        $block->is_active ? $block->is_active = 0 : $block->is_active = 1;

        $block->save();

        return back();
    }

    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods Clean Code .............. ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    private function saveImg($request , $default = ''){

        $img = $request->file('img');

        if ($img) {

            $img_name =  time() . "." . $img->getClientOriginalExtension();
            $img->move(public_path('assets/web/images/block'), $img_name);

            return $img_name;

        }

        return  $default;
    }

}
