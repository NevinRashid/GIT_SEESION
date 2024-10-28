<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{ 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $q=Order::query();
        $orders=$q->with('user','product')->get();
        return view('orders.list',compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $q=Product::query();
        $q->where('amount','>',0)->whereNull('deleted_at');
        $products=$q->get();
        return view('orders.edit',compact('order','products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order-> update([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            ]);
        return redirect()-> route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()-> route('orders.index');
    }
}
