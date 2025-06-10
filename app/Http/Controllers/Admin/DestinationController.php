<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Destination::with('city', 'category');

        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhereHas('city', fn($q) => $q->where('name', 'like', "%{$search}%"))
                ->orWhereHas('category', fn($q) => $q->where('name', 'like', "%{$search}%"));
        }

        $destinations = $query->paginate(5);

        $cities = City::orderBy('name', 'asc')->get();
        $categories = Category::all();

        return view('admin.destinations.index', compact('destinations', 'cities', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string',
            'latitude' => 'required|numeric|min:-90|max:90',
            'longitude' => 'required|numeric|min:-180|max:180',
            'city_id' => 'required|exists:cities,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        Destination::create([
            'name' => $request->name,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'city_id' => $request->city_id,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.destinations.index')->with('success', 'Destination data successfully added');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'description' => 'required|string',
            'latitude' => 'required|numeric|min:-90|max:90',
            'longitude' => 'required|numeric|min:-180|max:180',
            'city_id' => 'required|exists:cities,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $destination = Destination::findOrFail($id);

        $destination->update([
            'name' => $request->name,
            'description' => $request->description,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'city_id' => $request->city_id,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.destinations.index')->with('success', 'Destination data successfully updated');
    }

    public function destroy(string $id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return redirect()->route('admin.destinations.index')->with('success', 'Destination data successfully deleted');
    }
}
