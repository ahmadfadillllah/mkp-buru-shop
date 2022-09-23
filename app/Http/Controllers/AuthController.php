<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

            return redirect()->route('home.index')->with('success', 'Selamat Datang');
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

        $request->validate([
            'email' => ['required', 'email'],
            'name' => ['required'],
            'nohp' => ['required', 'max:13'],
            'alamat' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->alamat = $request->alamat;
        $user->password = Hash::make($request->password);
        $user->role = 'penjual';
        $user->avatar = 'user.png';

        $user->save();

        if($user)
        {
            return redirect()->route('login')->with('success', 'Anda berhasil registrasi, silahkan login');
        }

        return redirect()->route('register')->with('info', 'Anda gagal registrasi, silahkan masukkan data kembali');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('homepage')->with('success', 'Anda telah logout');
    }
}
