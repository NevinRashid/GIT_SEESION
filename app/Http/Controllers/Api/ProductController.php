<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'search' => ['nullable' ,'string']
        ]);

        $q=Product::query();
        if($request->search){
            $q->where('name','like','%'.$request->search.'%');
        }
        $products =$q->with('categories')->get();
        return response()->json(ProductResource::collection($products),200);
    }
}
