<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use File;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(15);
        return view("product.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("product.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            "name"=> "string|required",
            "price"=> "decimal:0,2|required",
            "description" => "string",
            "off" =>"numeric|digits:2",
            "image1"=> "image|required",
            "image2" => "required|image",
            "image3" => "required|image",
            "image4"=> "required|image",
            "category" =>["required", Rule::in(Category::pluck("id")->toArray())]
        ]);


        $product = new Product;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->description = $request->description;
        $product->off = $request->off;
        $product->image1 = $request->file("image1")->store("public");
        $product->image2 = $request->file("image2")->store("public");
        $product->image3 = $request->file("image3")->store("public");
        $product->image4 = $request->file("image4")->store("public");
        $product->save();
        return redirect()->route("product.create")->with("success","successfully created a product!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Product::where('slug','=' , $slug)->first();
        return view("product.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $product = Product::where("slug","=" , $slug)->first();
        $categories = Category::all();
        return view("product.edit", compact("product", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate([
                "name"=> "string|required",
                "price"=> "decimal:2|required",
                "description" =>"string",
                "off" =>"decimal:2",
                "category" =>["required", Rule::in(Category::pluck("id")->toArray())]
        ]);


        $product = Product::where("slug", "=", $slug)->first();
        if (!$product) return redirect()->back()->with('error', 'Product not found.');
        $product->name = $request->name;
        $product->price = $request->price;
        $product->off = $request->off;
        $product->category_id = $request->category;
        // $product->image1 = $request->file("image1")->store("public");
        // $product->image2 = $request->file("image2")->store("public");
        // $product->image3 = $request->file("image3")->store("public");
        // $product->image4 = $request->file("image4")->store("public");
        $product->save();
        return redirect()->route("product.show", $product->slug)->with("success","edited product successfully!")->withoutFragment();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $product = Product::where('slug', '=', $slug)->first();
        $product->delete();
        return redirect()->route("product.index")->with("success","deleted product successfully!");
    }

}
