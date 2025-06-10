<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json([
            'error' => false,
            'message' => $categories->isEmpty() ? 'No categories found.' : 'Categories retrieved successfully.',
            'data' => CategoryResource::collection($categories)
        ]);
    }
}
