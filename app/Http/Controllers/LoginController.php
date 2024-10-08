<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password'); // Menggunakan 'email' sesuai dengan input form

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('dashboard')->with('success', 'Login Berhasil.');; // Ganti 'dashboard' dengan nama rute dashboard yang sesuai
        }

        // Authentication failed
        return redirect('login')->withErrors([
            'message' => 'Email atau Password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
