<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return response()->json([
            'error' => false,
            'message' => 'Successfully displayed user',
            'data' => new UserResource($user)
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:100',
            'current_password' => 'nullable|string|min:8',
            'new_password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = Auth::user();

        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json(['message' => 'Incorrect current password.'], 400);
            }

            $user->password = Hash::make($request->new_password);
        }

        $imagePath = $user->image;

        if ($request->hasFile('image')) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            $user->image = $request->file('image')->store('users', 'public');
        }

        if ($request->filled('name')) {
            $user->name = $validated['name'];
        }

        /** @var User $user */
        $user->save();

        return response()->json([
            'error' => false,
            'message' => 'User updated successfully',
            'data' => new UserResource($user)
        ]);
    }
}
