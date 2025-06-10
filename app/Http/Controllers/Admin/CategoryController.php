<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Category::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $categories = $query->paginate(5);

        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $imagepath = $request->file('image')->store('categories', 'public');

        Category::create([
            'name' => $request->name,
            'image' => $imagepath,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category data successfully added');
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $imagePath = $category->image;

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($imagePath);

            $imagePath = $request->file('image')->store('categories', 'public');
        }

        $category->update([
            'name' => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category data successfully updated');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        Storage::disk('public')->delete($category->image);

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category data successfully deleted');
    }
}
