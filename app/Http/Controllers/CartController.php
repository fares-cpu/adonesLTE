<?php

namespace App\Http\Controllers;

use Cookie;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    public function makeCart(Request $request)
    {
        $cart = new Cart;
        $cart->user_id = $request->user()->id;
        $cart->save();
        session()->put("cart_id", $cart->id);

    }
    public function addToCart(Request $request)
    {
        if(!session()->has("cart_id")) $this->makeCart($request);
        $cart_id = session()->get("cart_id");
        $request->validate([
            'product_id' => 'integer|required',
            'quantity' =>'integer|required',
        ]);
        $cart_item = new CartItem;
        $cart_item->cart_id = $cart_id;
        $cart_item->product_id = $request->product_id;
        $cart_item->quantity = $request->quantity;
        $cart_item->save();
        return redirect()->back();
    }


    public function show(Request $request)
    {
        if(!session()->has('cart_id')){
            $this->makeCart($request);
        }
        $cart_id = session()->get('cart_id');
        $cart = Cart::find($cart_id);
        return view('cart.show', compact('cart'));
    }

}
