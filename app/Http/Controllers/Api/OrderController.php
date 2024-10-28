<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function place_order(Request $request){
        $request->validate([
            'product_name' => ['string','required']
        ]);
        $q=Product::query();
        $q->where('name','like',$request->product_name);
        $product=$q->get()->first();

        $product_id=$product->id;
        $user_id=Auth::user()->id;
        if($product->amount>0){
            $order=Order::create([
                    'product_id' => $product_id,
                    'user_id'    => $user_id,
                    ]);
            $product->update([
                    'amount' => $product->amount -1
                    ]);
        return response()->json(["message"=>"The order is been requsted"],201);
        }

        return response()->json(["message"=>"Sorry there are not enough amount from this product "],406);
    }
}
