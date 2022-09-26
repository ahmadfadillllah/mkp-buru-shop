<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

        $cart = Cart::join('users', 'cart.user_id','users.id')
        ->join('produk', 'cart.produk_id','produk.id')
        ->select('cart.id', 'cart.user_id', 'cart.status' ,'produk.gambarproduk1', 'produk.namaproduk', 'produk.hargaproduk', 'cart.quantity')
        ->where('cart.status', '=', 'Belum Dipesan')->where('cart.user_id', '=', Auth::user()->id)->get();

        $item = Cart::join('produk', 'cart.produk_id','produk.id')
        ->select(DB::raw('produk.hargaproduk * cart.quantity as total_harga'))
        ->where('cart.status', '=', 'Belum Dipesan')->where('cart.user_id', '=', Auth::user()->id)->get();

        $total = $item->sum('total_harga');

        return view('home.index', compact('produk', 'kategoriproduk', 'cart', 'total'));
    }

    public function addcart(Request $request,$id)
    {
        $prod = Cart::where('produk_id',$id)->where('status','Belum Dipesan')->where('user_id',Auth::user()->id)->get()->count();
        if($prod >= 1){
            return redirect()->route('home.index')->with('info', 'Barang sudah ada dikeranjang');
        }else if ($prod == 0){
            $cart = new Cart;
            $cart->user_id = Auth::user()->id;
            $cart->produk_id = $id;
            $cart->quantity = 1;
            $cart->status = 'Belum Dipesan';
            $cart->save();
        }

        if($cart){
            return redirect()->route('home.index')->with('success', 'Berhasil masuk ke keranjang');
        }

        return redirect()->route('home.index')->with('info', 'Gagal masuk ke keranjang');
    }

    public function delete($id)
    {
        $cart = Cart::where('id', $id)->delete();

        if($cart){
            return redirect()->route('cart.index')->with('success', 'Produk telah dihapus dari keranjang');
        }
        return redirect()->route('cart.index')->with('info', 'Produk gagal dihapus dari keranjang');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function about()
    {
        return view('home.about');
    }

    public function aboutcustomer()
    {
        $cart = Cart::join('users', 'cart.user_id','users.id')
        ->join('produk', 'cart.produk_id','produk.id')
        ->select('cart.id', 'cart.user_id', 'cart.status' ,'produk.gambarproduk1', 'produk.namaproduk', 'produk.hargaproduk', 'cart.quantity')
        ->where('cart.status', '=', 'Belum Dipesan')->where('cart.user_id', '=', Auth::user()->id)->get();

        $item = Cart::join('produk', 'cart.produk_id','produk.id')
        ->select(DB::raw('produk.hargaproduk * cart.quantity as total_harga'))
        ->where('cart.status', '=', 'Belum Dipesan')->where('cart.user_id', '=', Auth::user()->id)->get();

        $total = $item->sum('total_harga');

        return view('home.customer.about', compact('cart', 'total'));
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
        $user->provinsi_id = $request->provinsi_id;
        $user->kota_id = $request->kota_id;
        $user->kecamatan_id = $request->kecamatan_id;
        $user->kelurahan_id = $request->kelurahan_id;
        $user->zipcode = $request->zipcode;
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
