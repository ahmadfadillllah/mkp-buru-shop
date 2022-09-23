<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    //
    public function homepage()
    {
        $produk = Produk::join('users', 'users.id', 'produk.user_id')
        ->select(
        'produk.id',
        'produk.user_id',
        'users.name',
        'produk.kategoriproduk',
        'produk.namaproduk',
        'produk.hargaproduk',
        'produk.stokproduk',
        'produk.deskripsiproduk',
        'produk.gambarproduk1',
        'produk.gambarproduk2',
        'produk.gambarproduk3',
        'produk.gambarproduk4',
        )->get();
        $kategoriproduk = KategoriProduk::all();

        return view('home.homepage', compact('produk', 'kategoriproduk'));
    }

    public function index()
    {
        $produk = Produk::join('users', 'users.id', 'produk.user_id')
        ->select(
        'produk.id',
        'produk.user_id',
        'users.name',
        'produk.kategoriproduk',
        'produk.namaproduk',
        'produk.hargaproduk',
        'produk.stokproduk',
        'produk.deskripsiproduk',
        'produk.gambarproduk1',
        'produk.gambarproduk2',
        'produk.gambarproduk3',
        'produk.gambarproduk4',
        )->get();
        $kategoriproduk = KategoriProduk::all();

        return view('home.index', compact('produk', 'kategoriproduk'));
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function about()
    {
        return view('home.about');
    }

    public function logincustomer()
    {
        return view('home.auth.login');
    }
    public function registercustomer()
    {
        return view('home.auth.register');
    }

    public function logincustomerpost(Request $request)
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

    public function registercustomerpost(Request $request)
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
        $user->role = 'customer';
        $user->avatar = 'user.png';

        $user->save();

        if($user)
        {
            return redirect()->route('logincustomer')->with('success', 'Anda berhasil registrasi, silahkan login');
        }

        return redirect()->route('registercustomer')->with('info', 'Anda gagal registrasi, silahkan masukkan data kembali');
    }
}
