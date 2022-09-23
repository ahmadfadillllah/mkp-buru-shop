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

        // dd($request->all());
        $request->validate([
            'namakategori' => ['required'],
            'deskripsikategori' => ['required'],
            'gambarkategori' => ['required', 'mimes:png,jpg,jpeg'],
        ],
        [
            'namakategori.required' => 'nama Kategori harus diisi',
            'deskripsikategori.required' => 'nama Kategori harus diisi',
            'gambarkategori.required' => 'nama Kategori harus diisi',
            'gambarkategori.mimes' => 'Format gambar harus png, jpg atau jpeg',
        ]);

        $date = date('Ymd His gis');
        $kategori = new KategoriProduk;
        $kategori->namakategori = $request->namakategori;
        $kategori->deskripsikategori = $request->deskripsikategori;

        if($request->hasFile('gambarkategori')){
            $request->file('gambarkategori')->move('admin/template/assets/images/kategoriproduk/', $date.$request->file('gambarkategori')->getClientOriginalName());
            $kategori->gambarkategori = $date.$request->file('gambarkategori')->getClientOriginalName();
            $kategori->save();

            return redirect()->back()->with('success', 'Kategori produk telah ditambahkan');
        }

        return redirect()->back()->with('info', 'Kategori produk gagal ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namakategori' => ['required'],
            'deskripsikategori' => ['required'],
            'gambarkategori' => ['required', 'mimes:png,jpg,jpeg'],
        ],
        [
            'namakategori.required' => 'nama Kategori harus diisi',
            'deskripsikategori.required' => 'nama Kategori harus diisi',
            'gambarkategori.required' => 'nama Kategori harus diisi',
            'gambarkategori.mimes' => 'Format gambar harus png, jpg atau jpeg',
        ]);

        $date = date('Ymd His gis');
        $kategori = KategoriProduk::find($id);
        $kategori->namakategori = $request->namakategori;
        $kategori->deskripsikategori = $request->deskripsikategori;

        if($request->hasFile('gambarkategori')){
            $request->file('gambarkategori')->move('admin/template/assets/images/kategoriproduk/', $date.$request->file('gambarkategori')->getClientOriginalName());
            $kategori->gambarkategori = $date.$request->file('gambarkategori')->getClientOriginalName();
            $kategori->save();

            return redirect()->back()->with('success', 'Kategori produk telah diupdate');
        }

        return redirect()->back()->with('info', 'Kategori produk gagal diupdate');
    }
}
