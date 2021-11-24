<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlockRequest;
use App\Http\Requests\Admin\ItemRequest;
use App\Models\Block;
use App\Models\Item;

class ItemController extends Controller
{

    public function index(){

        $block = Block::customSelect()->findOrFail($_GET['block']);

        $items = Item::customSelect()->where('block_id' , $block->id)->get();

        return view("admin.pages.items.index" , compact('items' , 'block'));
    }


    public function create(){

        $block = Block::customSelect()->findOrFail($_GET['block']);

        return view("admin.pages.items.create" , compact('block'));
    }

    public function store(ItemRequest $request){

        $block = Block::findOrFail($_GET['block']);

        Item::create([
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'text_ar' => $request->text_ar,
            'text_en' => $request->text_en,
            'icon' => $request->icon,
            'img' => $this->saveImg($request),
            'sort' => $request->sort,
            'block_id' => $block->id,
        ]);

        return back()->with('success' , __('form.response.create success'));

    }

    public function edit($id){

        $item = Item::with('block')->findOrFail($id);

        $block = $item->block()->customselect()->first();

        return view("admin.pages.items.edit" , compact('item' , 'block'));
    }

    public function update(BlockRequest $request , $id){


        $item = Item::findOrFail($id);


        $item->update([
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'text_ar' => $request->text_ar,
            'text_en' => $request->text_en,
            'icon' => $request->icon,
            'img' => $this->saveImg($request),
            'sort' => $request->sort,
        ]);

        return back()->with('success' , __('form.response.update success'));
    }


    public function destroy ($id){

        $item = Item::findOrFail($id);

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

            $img_name = time() . "." . $img->getClientOriginalExtension();
            $img->move(public_path('assets/web/images/block'), $img_name);

            return $img_name;

        }

        return  $default;
    }
}
