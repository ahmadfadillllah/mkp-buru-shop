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
        $ulasan = Ulasan::where('id', $request->id)
              ->update(['ulasan' => $request->ulasan]);

        if($ulasan){
            return redirect()->route('pesanan.show')->with('success', 'Ulasan telah dikirim');
        }
        return redirect()->route('pesanan.show')->with('info', 'Ulasan gagal dikirim');
    }
}
