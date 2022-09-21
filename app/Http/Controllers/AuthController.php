<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }

    public function loginpost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard.index')->with('success', 'Selamat Datang');
        }

        return back()->withErrors([
            'email' => 'Email tidak ditemukan',
            'password' => 'Password salah',
        ])->onlyInput('email', 'password');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerpost(Request $request)
    {
        dd($request->all());
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout');
    }
}
