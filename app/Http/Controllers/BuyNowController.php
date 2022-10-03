<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Laravolt\Indonesia\Models\City;
use App\Models\Pesanan;

class BuyNowController extends Controller
{
    //
    public function index($id)
    {

        $cart = Cart::join('users', 'cart.user_id','users.id')
        ->join('produk', 'cart.produk_id','produk.id')
        ->select('cart.id', 'cart.user_id', 'cart.status' ,'produk.gambarproduk1', 'produk.namaproduk', 'produk.hargaproduk', 'cart.quantity')
        ->where('cart.status', '=', 'Belum Dipesan')->where('cart.user_id', '=', Auth::user()->id)->get();

        $produk = Produk::where('id', $id)->first();

        $cartById = Cart::join('users', 'cart.user_id','users.id')
        ->join('produk', 'cart.produk_id','produk.id')
        ->select('cart.id as cart_id','produk.gambarproduk1', 'produk.namaproduk', 'produk.hargaproduk', 'cart.quantity')
        ->where('cart.user_id', '=', Auth::user()->id)->where('status','Belum Dipesan')->get()->pluck('cart_id');

        $item = Produk::select('hargaproduk')->first();

        $ongkir = City::where('name', Auth::user()->kota->name)->select('ongkir')->first();

        $total = $item->hargaproduk;
        $grand_total = $total + $ongkir->ongkir;

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-5aQABsAA0KihdYoBHSk1kgPy';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $grand_total,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->nohp,
            ),
        );

        $token = \Midtrans\Snap::getSnapToken($params);

        return view('home.buy-now.index', compact('cart', 'produk', 'total', 'grand_total', 'ongkir', 'token', 'cartById'));
    }

    public function cod(Request $request)
    {
        try {

            Pesanan::insert([
                'cart_id' => $request->cart_id,
                'user_id' => Auth::user()->id,
                'metode_pembayaran' => 'COD'
            ]);
            return redirect()->route('home.index')->with('success', 'Produk Sudah Dipesan');
        } catch (\Throwable $th) {
            return redirect()->route('home.index')->with('info', 'Produk Gagal Dipesan');
        }
    }

    public function transfer(Request $request)
    {
        try {
            foreach($request->idcart as $key=>$value){
                $cart = Cart::find($request->idcart[$key]);
                $cart->status = 'Sudah Dipesan';
                Pesanan::insert([
                    'cart_id' => $request->cart_id[$key],
                    'user_id' => $request->user_id[$key],
                    'metode_pembayaran' => 'TRANSFER'
                ]);
                $cart->save();
            }

            return json_encode([
                'status' => 'success',
                'kode' => 200,
                'dataCart' => $cart
            ]);
        } catch (\Throwable $th) {
            return json_encode([
                'status' => 'success',
                'kode' => 500,
                'message' => $cart
            ]);
        }
    }
}
