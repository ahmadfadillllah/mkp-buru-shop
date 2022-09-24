<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    //
    public function contact()
    {
        $cart = Cart::join('users', 'cart.user_id','users.id')
        ->join('produk', 'cart.produk_id','produk.id')
        ->select('cart.id', 'cart.user_id', 'cart.status' ,'produk.gambarproduk1', 'produk.namaproduk', 'produk.hargaproduk', 'cart.quantity')
        ->where('cart.status', '=', 'Belum Dipesan')->where('cart.user_id', '=', Auth::user()->id)->get();

        $item = Cart::join('produk', 'cart.produk_id','produk.id')
        ->select(DB::raw('produk.hargaproduk * cart.quantity as total_harga'))
        ->where('cart.status', '=', 'Belum Dipesan')->where('cart.user_id', '=', Auth::user()->id)->get();

        $total = $item->sum('total_harga');

        return view('home.customer.contact', compact('cart', 'total'));
    }

    public function index()
    {
        $contact = Contact::all();
        return view('admin.contact.index', compact('contact'));
    }

    public function delete($id)
    {
        $contact = Contact::find($id)->delete();

        if($contact){
            return redirect()->route('contact.index')->with('success', 'Pesan telah dihapus');
        }

        return redirect()->route('contact.index')->with('info', 'Pesan gagal dihapus');
    }

    public function contactpost(Request $request)
    {
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        if($contact){
            return redirect()->back()->with('success', 'Berhasil mengirimkan pesan');
        }
        return redirect()->back()->with('info', 'Gagal mengirimkan pesan');
    }
}
