<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'status' => 'success',
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = Category::create([
            'category_name' => $request->category_name,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Category created successfully',
            'category' => $category,
        ]);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Category updated successfully',
            'category' => $category,
        ]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Category deleted successfully',
            'category' => $category,
        ]);
    }
}



