<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Slider::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $sliders = $query->paginate(5);

        return view('admin.sliders.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $imagePath = $request->file('image')->store('sliders', 'public');

        Slider::create([
            'name' => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider data successfully added');
    }

    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $imagePath = $slider->image;

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($imagePath);

            $imagePath = $request->file('image')->store('sliders', 'public');
        }

        $slider->update([
            'name' => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider data successfully updated');
    }

    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);

        Storage::disk('public')->delete($slider->image);

        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider data successfully deleted');
    }
}
