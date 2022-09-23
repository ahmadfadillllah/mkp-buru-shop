<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    //
    public function index()
    {
        $kategoriproduk = KategoriProduk::all();
        $produk = Produk::all()->where('user_id', Auth::user()->id);
        return view('admin.produk.index', compact('produk', 'kategoriproduk'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'kategoriproduk' => ['required'],
            'namaproduk' => ['required'],
            'hargaproduk' => ['required'],
            'stokproduk' => ['required'],
            'deskripsiproduk' => ['required'],
            'gambarproduk1' => ['required', 'mimes:png,jpg,jpeg'],
            'gambarproduk2' => ['mimes:png,jpg,jpeg'],
            'gambarproduk3' => ['mimes:png,jpg,jpeg'],
            'gambarproduk4' => ['mimes:png,jpg,jpeg'],
        ],
        [
            'kategoriproduk.required' => 'Kategori produk harus diisi',
            'namaproduk.required' => 'Nama produk harus diisi',
            'hargaproduk.required' => 'Harga produk harus diisi',
            'stokproduk.required' => 'Stok produk harus diisi',
            'deskripsiproduk.required' => 'Deskripsi produk harus diisi',
            'gambarproduk1.required' => 'Gambar produk 1 harus diisi',
            'gambarproduk1.mimes' => 'Format gambar harus png, jpg atau jpeg',
            'gambarproduk2.mimes' => 'Format gambar harus png, jpg atau jpeg',
            'gambarproduk3.mimes' => 'Format gambar harus png, jpg atau jpeg',
            'gambarproduk4.mimes' => 'Format gambar harus png, jpg atau jpeg',
        ]);

        $hargaproduk = Str::of($request->hargaproduk)->replace('Rp', '');
        $harga_produk = Str::of($hargaproduk)->replace('.', '');
        $date = date('Ymd His gis');

        $produk = new Produk;

        $produk->user_id = Auth::user()->id;
        $produk->kategoriproduk = $request->kategoriproduk;
        $produk->namaproduk = $request->namaproduk;
        $produk->hargaproduk = $harga_produk;
        $produk->stokproduk = $request->stokproduk;
        $produk->deskripsiproduk = $request->deskripsiproduk;

        if($request->hasFile('gambarproduk1') or $request->hasFile('gambarproduk2') or $request->hasFile('gambarproduk123') or $request->hasFile('gambarproduk124')){
            $request->file('gambarproduk1')->move('admin/template/assets/images/', $date.$request->file('gambarproduk1')->getClientOriginalName());
            $request->file('gambarproduk2')->move('admin/template/assets/images/', $date.$request->file('gambarproduk2')->getClientOriginalName());
            $request->file('gambarproduk3')->move('admin/template/assets/images/', $date.$request->file('gambarproduk3')->getClientOriginalName());
            $request->file('gambarproduk4')->move('admin/template/assets/images/', $date.$request->file('gambarproduk4')->getClientOriginalName());

            $produk->gambarproduk1 = $date.$request->file('gambarproduk1')->getClientOriginalName();
            $produk->gambarproduk2 = $date.$request->file('gambarproduk2')->getClientOriginalName();
            $produk->gambarproduk3 = $date.$request->file('gambarproduk3')->getClientOriginalName();
            $produk->gambarproduk4 = $date.$request->file('gambarproduk4')->getClientOriginalName();
            $produk->save();

            return redirect()->back()->with('success', 'Produk telah ditambahkan');
        }

        return redirect()->back()->with('info', 'Produk gagal ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hargaproduk' => ['required'],
            'stokproduk' => ['required'],
            'deskripsiproduk' => ['required'],
        ],
        [
            'hargaproduk.required' => 'Harga produk harus diisi',
            'stokproduk.required' => 'Stok produk harus diisi',
            'deskripsiproduk.required' => 'Deskripsi produk harus diisi',
        ]);

        $hargaproduk = Str::of($request->hargaproduk)->replace('Rp', '');
        $harga_produk = Str::of($hargaproduk)->replace('.', '');

        $produk = Produk::find($id);
        $produk->hargaproduk = $harga_produk;
        $produk->stokproduk = $request->stokproduk;
        $produk->deskripsiproduk = $request->deskripsiproduk;
        $produk->save();

        return redirect()->back()->with('success', 'Produk telah diupdate');

        return redirect()->back()->with('info', 'Produk gagal diupdate');
    }

    public function delete($id)
    {
        $produk = Produk::find($id)->delete();

        if($produk){
            return redirect()->route('produk.index')->with('success', 'Produk telah dihapus');
        }

        return redirect()->route('produk.index')->with('info', 'Produk gagal dihapus');
    }
}
