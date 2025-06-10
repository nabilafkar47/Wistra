<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\DestinationImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DestinationImageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = DestinationImage::with('destination');

        if ($search) {
            $query->WhereHas('destination', fn($q) => $q->where('name', 'like', "%{$search}%"));
        }

        $destination_images = $query->paginate(5);

        $destinations = Destination::orderBy('name', 'asc')->get();

        return view('admin.destination-photos.index', compact('destination_images', 'destinations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagepath = $request->file('image')->store('destination-photos', 'public');

        DestinationImage::create([
            'destination_id' => $request->destination_id,
            'image' => $imagepath,
        ]);

        return redirect()->route('admin.destination-photos.index')->with('success', 'Destination Image data successfully added');
    }

    public function update(Request $request, string $id)
    {
        $destination_image = DestinationImage::findOrFail($id);

        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $destination_image->image;

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($imagePath);

            $imagePath = $request->file('image')->store('destination-photos', 'public');
        }

        $destination_image->update([
            'destination_id' => $request->destination_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.destination-photos.index')->with('success', 'Destination Image data successfully updated');
    }

    public function destroy(string $id)
    {
        $destination_image = DestinationImage::findOrFail($id);

        Storage::disk('public')->delete($destination_image->image);

        $destination_image->delete();

        return redirect()->route('admin.destination-photos.index')->with('success', 'Destination Image data successfully deleted');
    }
}
