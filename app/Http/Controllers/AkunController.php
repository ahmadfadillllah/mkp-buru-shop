<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    //
    public function index()
    {
        $akun = User::all()->where('role', '!=' ,'admin');

        return view('admin.akun.index', compact('akun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'nohp' => ['required'],
            'alamat' => ['required'],
        ]);

        $akun = User::find($id);
        $akun->name = $request->name;
        $akun->nohp = $request->nohp;
        $akun->alamat = $request->alamat;
        $akun->save();

        if($akun){
            return redirect()->back()->with('success', 'Akun telah diupdate');
        }
        return redirect()->back()->with('info', 'Akun gagal diupdate');
    }

    public function changepassword(Request $request, $id)
    {
        $request->validate([
            'passwordbaru' => ['required', 'min:8'],
        ]);

        $akun = User::find($id);
        $akun->password = $request->passwordbaru;
        $akun->save();

        if($akun){
            return redirect()->back()->with('success', 'Password telah diupdate');
        }
        return redirect()->back()->with('info', 'Password gagal diupdate');
    }
}
