<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'error' => true,
                'message' => 'Email is not registered.'
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => true,
                'message' => 'Incorrect password.'
            ]);
        }

        if ($user->role !== 'User') {
            return response()->json([
                'error' => true,
                'message' => 'Account not authorized to log in.'
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'error' => false,
            'message' => 'Login successful.',
            'data' => [
                'user' => new UserResource($user),
                'accessToken' => $token,
                'tokenType' => 'Bearer'
            ]
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'error' => false,
            'message' => 'Account registered successfully.'
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'error' => false,
            'message' => 'Logout successful.'
        ]);
    }
}
