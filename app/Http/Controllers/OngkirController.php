<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\District;
use Illuminate\Support\Str;
use Laravolt\Indonesia\Models\City;

class OngkirController extends Controller
{
    //
    public function index()
    {
        $kota = City::all();
        return view('admin.ongkir.index', compact('kota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ongkir' => ['required'],
        ]);

        $ongkir = Str::of($request->ongkir)->replace('Rp', '');
        $harga_ongkir = Str::of($ongkir)->replace('.', '');
        $ongkir = City::find($id);
        $ongkir->ongkir = $harga_ongkir;

        $ongkir->save();
        if($ongkir){
            return redirect()->back()->with('success', 'Ongkos Kirim telah diupdate');
        }

        return redirect()->back()->with('info', 'Ongkos Kirim gagal diupdate');
    }
}
