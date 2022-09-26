<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Models\Cart;

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
