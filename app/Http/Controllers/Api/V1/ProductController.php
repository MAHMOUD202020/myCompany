<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\APIController;
use App\Http\Resources\V1\CategoryResource;
use App\Http\Resources\V1\ProductCollection;
use App\Http\Resources\V1\productResource;
use App\Models\Category;
use App\Models\Product;

class ProductController extends APIController
{
    public function index()
    {
        $products = Product::with('category')->customSelect()->sort()->get();

        return $this->response(
            ProductCollection::collection($products)
        );
    }

    public function paginate()
    {
        $projects = Product::with('category')->customSelect()->sort()->paginate();
        return $this->response(
            ProductCollection::collection($projects)->response()->getData()
        );
    }

    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if ($product == null)
            return $this->error('', 'Not Found');

        return $this->response(
            productResource::make($product)
        );
    }

    public function categories(){

        $categories = Category::query()->has('products')->get();

        return $this->response(
            CategoryResource::collection($categories)
        );
    }

    public function categoriesWithProducts(){

        $categories = Category::query()->has('products')->with('products', fn($q) => $q->customSelect() )->get();

        return $this->response(
            CategoryResource::collection($categories)
        );
    }


}
