<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function addCart(Request $req) {
        $cart = new Cart();
        $cart->fill($req->all());
        $cart->save();
        return response()->json(['code'=> 200]);
    }

    public function getCarts() {
        $cart = Cart::all();
        return response()->json($cart);
    }

    public function removeCart($id) {
        $cart = Cart::find($id);
        $cart->delete();
        return response()->json(Cart::all());
    }

    public function seenCart($id) {
        $cart = Cart::find($id);
        $cart->update(['seen' => '1']);
        return response()->json(Cart::all());
    }
}
