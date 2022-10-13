<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    //
    public function index(Request $request)
    {
        $ulasan = Ulasan::insert([
            'user_id' => Auth::user()->id,
            'produk_id' => $request->cart_id,
            'ulasan' => $request->ulasan
        ]);

        if($ulasan){
            return redirect()->back()->with('success', 'Ulasan telah dikirim');
        }
        return redirect()->back()->with('info', 'Ulasan gagal dikirim');
    }
}
