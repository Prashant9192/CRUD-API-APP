<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // insert product function
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|max:191',
            'qty' => 'required|max:191',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->save();
        return response()->json(['message' => 'Product added successfully'], 200);
    }

    // show all products function
    public function index()
    {
        $products = Product::all();
        return response()->json(['products' => $products], 200);

    }

    // show only one product function
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json(['product' => $product], 200);
        } else {
            return response()->json(['message' => 'No Product Found !'], 404);
        }

    }


    // update product function
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|max:191',
            'qty' => 'required|max:191',
        ]);

        $product = Product::find($id);
        if ($product) {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->qty = $request->qty;
            $product->update();
            return response()->json(['message' => 'Product updated successfully'], 200);
        } else {
            return response()->json(['message' => 'No Product Found !'], 404);
        }

    }

    // delete product function
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['message' => ' Product Deleted Successfully'], 200);
        } else {
            return response()->json(['message' => 'No Product Found'], 404);
        }
    }
}
