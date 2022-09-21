<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    //
    public function index()
    {
        $kategoriproduk = KategoriProduk::all();
        return view('admin.kategoriproduk.index', compact('kategoriproduk'));
    }

    public function insert(Request $request)
    {
        dd($request->all());
    }
}
