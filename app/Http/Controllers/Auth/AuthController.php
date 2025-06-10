<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email is not registered',
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role === 'Admin') {
                return redirect()->intended(route('admin.dashboard.index'))
                    ->with('success', 'Welcome, ' . Auth::user()->name . '!');
            }
        }

        return back()->withErrors([
            'password' => 'Wrong password',
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create($data);

        return redirect()->route('login')->with('success', 'Register Success');;
    }

    // public function invalidLogout()
    // {
    //     return redirect()->route('admin.destinations.index')->with('error', 'Silakan gunakan tombol logout untuk keluar');
    // }

    public function invalidLogout()
    {
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout Success');
    }
}
