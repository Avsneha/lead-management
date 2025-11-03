<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('leads.index');
        }
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login.form');
    }

    public function showRegisterForm() {
    return view('auth.register');
}

public function register(Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
        'role' => 'required|in:admin,user'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    // Automatically log in the user after registration
    auth()->login($user);

     // Reload the user to ensure fresh data
    $user = auth()->user()->fresh();

    return redirect()->route('dashboard');
}
}
