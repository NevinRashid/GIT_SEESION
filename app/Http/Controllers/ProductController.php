<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $q=Product::query();
        $products=$q->with('order','categories')->get();
        $orders=Order::all();
        return view('products.list',compact('products','orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product=Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount,
                ]);
        $product->categories()->attach($request->input('categories_ids',[]));
        return redirect()->route('products.index',compact('product'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product-> update([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount,
            ]);
        $product->categories()->sync($request->input('categories_ids',[]));
        return redirect()-> route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()-> route('products.index');
    }
}
