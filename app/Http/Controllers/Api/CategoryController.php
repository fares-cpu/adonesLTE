<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = CategoryResource::collection(Category::paginate(15));
        return $categories;
    }
    public function show(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();
        return new CategoryResource($category);
    }
}
