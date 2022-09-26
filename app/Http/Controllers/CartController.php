<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index()
    {
        
        $cart = Cart::join('users', 'cart.user_id','users.id')
        ->join('produk', 'cart.produk_id','produk.id')
        ->select('cart.id', 'cart.user_id', 'cart.status' ,'produk.gambarproduk1', 'produk.namaproduk', 'produk.hargaproduk', 'cart.quantity')
        ->where('cart.status', '=', 'Belum Dipesan')->where('cart.user_id', '=', Auth::user()->id)->get();

        if($cart->isEmpty()){
            return redirect()->route('home.index')->with('info', 'Keranjang Masih Kosong');
        }

        $item = Cart::join('produk', 'cart.produk_id','produk.id')
        ->select(DB::raw('produk.hargaproduk * cart.quantity as total_harga'))
        ->where('cart.status', '=', 'Belum Dipesan')->where('cart.user_id', '=', Auth::user()->id)->get();

        $total = $item->sum('total_harga');

        return view('home.cart.index', compact('cart', 'total'));
    }

    public function update(Request $request)
    {
        try {
            foreach($request->id as $key=>$value){
                $cart = Cart::find($request->id[$key]);
                $cart->quantity = $request->quantity[$key];
                $cart->save();
            }
            return redirect()->route('cart.index')->with('success', 'Berhasil update keranjang');
        } catch (\Throwable $th) {
            return redirect()->route('cart.index')->with(['info' => $th->getMessage()]);
        }
    }
}
