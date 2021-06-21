<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;

class CartsController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id' => 'required'
        ],
        [
         'product_id.required' => 'Please give a product'
            ]);
        if (Auth::check()){
            $cart = Cart::where('user_id',Auth::id())
                ->where('product_id', $request->product_id)
                ->where('order_id', NULL)
                ->first();
//
//            $order = Order::where('user_id',Auth::id())
//                ->where('id', $cart->order_id)
//                ->first();

        }else{
            $cart = Cart::where('ip_address', request()->ip())
                ->where('product_id', $request->product_id)
                ->where('order_id', NULL)
                ->first();
        }


        if (!is_null($cart) ){
            $cart->increment('product_quantity');
        }else{
            $cart = new Cart();
            if (Auth::check()){
                $cart->user_id = Auth::id();
            }
            $cart->ip_address = request()->ip();
            $cart->product_id = $request->product_id;
            $cart->save();
        }


        return json_encode(['status'=> 'success', 'Message'=>'Product has Added to cart', 'totalItems'=>Cart::totalItems()]);




    }


}
