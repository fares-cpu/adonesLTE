<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(Request $request){
        $products = ProductResource::collection(Product::paginate(15));
        return $products;
    }
    public function show(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        return new ProductResource($product);
    }
}
