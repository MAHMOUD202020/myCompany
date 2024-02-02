<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Services\CacheService;
use App\Models\Category;
use App\Models\Product;
use App\MyDataTable\MDT_Method_Action;
use App\MyDataTable\MDT_Query;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use MDT_Query, MDT_Method_Action;

    public function __construct()
    {
        $this->middleware('haveRole:product.index')->only('index');
        $this->middleware('haveRole:product.create')->only(['create' , 'store']);
        $this->middleware('haveRole:product.update')->only('update');
        $this->middleware('haveRole:product.destroy')->only('destroy');
        $this->middleware('haveRole:product.restore')->only('restore');
        $this->middleware('haveRole:product.finalDelete')->only('finalDelete');

    }

    public function index()
    {

        return  $this->MDT_Query_method(// Start Query
            Product::class ,
            'admin/pages/products/index',
            IS_TRASH, // Soft Delete
            [
                'select_trans' => ['name', 'sort' => 'SKIP', 'id' => 'SKIP', 'created_at' => 'SKIP' , 'updated_at' => 'SKIP'],
            ]

        ); // end query

    }


    public function create()
    {
        $categories = Category::sort()->where('type', 'products')->get();

        return view('admin.pages.products.create', compact('categories'));
    }


    public function store(ProductRequest $request)
    {
        Product::create($this->columnsDB($request));

        (new CacheService())->updateCachePages();

        return back()->with('success' , __('form.response.create success'));
    }

    public function show($id){

        $categories = Category::sort()->get();

        $product = Product::withTrashed()->findOrFail($id);

        return view('admin.pages.products.show', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::withTrashed()
            ->findOrFail($id);

        $product->update($this->columnsDB($request  , $product));

        (new CacheService())->updateCachePages();

        return back()->with('success' , __('form.response.update success'));
    }

    public function destroy($id)
    {
        $product = $this->MDT_delete(Product::class , $id);

        (new CacheService())->updateCachePages();

        return $product;
    }

    public function restore($id)
    {
        $product = $this->MDT_restore(Product::class , $id);

        (new CacheService())->updateCachePages();

        return $product;
    }

    public function finalDelete($id)
    {
        $product = $this->MDT_finalDelete(Product::class , $id);

        (new CacheService())->updateCachePages();

        return $product;
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
            'gallery' => $gallery,
            'is_home' => $request->is_home ? 1 : 0,
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
            $img->move(public_path('assets/web/images/products'), $img_name);

            return $img_name;
        }

        return  $default;
    }
}
