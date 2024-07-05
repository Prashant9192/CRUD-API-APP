<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|max:191',
            'description'=>'required|max:191',
            'price'=>'required|max:191',
            'qty'=>'required|max:191'
        ]);


        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();
        return response()->json(['message' => 'Product added successfully'], 200);
    }

    public function index(){
        $products = Product::all();
        return response()->json(['products' =>$products] , 200);

    }
    public function show($id){
        $product = Product::find($id);
        if ($product) {
            return response()->json(['product' =>$product] , 200);
        } else {
            return response()->json(['message' =>'No Product Found !'] , 404);
        }

    }
}
