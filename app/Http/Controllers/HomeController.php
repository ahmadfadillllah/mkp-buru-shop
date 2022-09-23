<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    //
    public function homepage()
    {
        $produk = Produk::join('users', 'produk.user_id', 'users.id')->get();
        $kategoriproduk = KategoriProduk::all();

        return view('home.index', compact('produk', 'kategoriproduk'));
    }
}
