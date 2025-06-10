<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = City::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $cities = $query->paginate(5);

        return view('admin.cities.index', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50'
        ]);

        City::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.cities.index')->with('success', 'City data successfully added');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        $city = City::findOrFail($id);
        $city->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.cities.index')->with('success', 'City data successfully updated');
    }

    public function destroy(string $id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return redirect()->route('admin.cities.index')->with('success', 'City data successfully deleted');
    }
}
