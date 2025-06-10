<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Review::with('user', 'destination');

        if ($search) {
            $query->where('rating', 'like', "%{$search}%")
                ->orWhere('review', 'like', "%{$search}%")
                ->orWhereHas('user', fn($q) => $q->where('name', 'like', "%{$search}%"))
                ->orWhereHas('destination', fn($q) => $q->where('name', 'like', "%{$search}%"));
        }

        $reviews = $query->paginate(5);

        $users = User::all();
        $destinations = Destination::all();

        return view('admin.reviews.index', compact('reviews', 'users', 'destinations'));
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
