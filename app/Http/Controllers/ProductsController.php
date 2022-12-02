<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $products = Product::all();
        return response()->json([
            'status' => 'success',
            'products' => $products,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string|max:255',
        ]);

        $product = Product::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'product_image' => $request->product_image,
            'category_id' => $request->category_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully',
            'product' => $product,
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'product' => $product,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string|max:255',
        ]);

        $product = Product::findOrFail($id);
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->product_image = $request->product_image;
        $product->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Product updated successfully',
            'product' => $product,
        ]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully',
            'product' => $product,
        ]);
    }
}


