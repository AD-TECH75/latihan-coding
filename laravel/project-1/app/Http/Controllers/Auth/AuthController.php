<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        // 1. validate input
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        // 2. save user
        $user = user::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        // 3. automatic login after register
        Auth::Login($user);

        // 4. redirect to login if success
        return redirect()->route('welcome');
    }
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        // 1. validate input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Attempt login (for safe)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // 3. redirect to login if success
            return redirect()->route('welcome');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah'
        ])->onlyInput('email');
    }
}
