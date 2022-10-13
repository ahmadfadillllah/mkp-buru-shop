<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    //
    public function index()
    {
        $pesanan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
        ->join('users', 'pesanan.user_id', 'users.id')
        ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')->get();
        return view('admin.pesanan.index', compact('pesanan'));
    }

    public function show()
    {
        $cart = Cart::join('users', 'cart.user_id','users.id')
        ->join('produk', 'cart.produk_id','produk.id')
        ->select('cart.id', 'cart.user_id', 'cart.status' ,'produk.gambarproduk1', 'produk.namaproduk', 'produk.hargaproduk', 'cart.quantity')
        ->where('cart.status', '!=', 'Belum dipesan')->where('cart.user_id', '=', Auth::user()->id)->get();

        $item = Cart::join('produk', 'cart.produk_id','produk.id')
        ->select(DB::raw('produk.hargaproduk * cart.quantity as total_harga'))
        ->where('cart.status', '=', 'Belum Dipesan')->where('cart.user_id', '=', Auth::user()->id)->get();

        $total = $item->sum('total_harga');

        $pesanan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
        ->join('users', 'pesanan.user_id', 'users.id')
        ->join('produk', 'pesanan.user_id', 'produk.id')
        ->where('pesanan.user_id', Auth::user()->id)->get();

        // dd($pesanan);
        return view('home.pesanan.index', compact('cart', 'total', 'pesanan'));
    }

    public function konfirmasiPesanan(Request $request)
    {
        $cart = Cart::findOrFail($request->idPesanan);
        $cart->status = 'Pesanan Dikonfirmasi';
        $cart->save();

        return back()->with("success", "Status Pesanan Diperbarui");

    }

     public function perjalanan(Request $request)
    {
        $cart = Cart::findOrFail($request->idPesanan);
        $cart->status = 'Pesanan Dalam Perjalanan';
        $cart->save();

        return back()->with("success", "Status Pesanan Diperbarui");

    }

     public function pesananSelesai(Request $request)
    {
        $cart = Cart::findOrFail($request->idPesanan);
        $cart->status = 'Pesanan Selesai';
        $cart->save();

        return back()->with("success", "Status Pesanan Diperbarui");

    }
}
