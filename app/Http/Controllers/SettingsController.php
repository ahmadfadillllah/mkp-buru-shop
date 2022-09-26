<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SettingsController extends Controller
{
    //
    public function index()
    {
        return view('admin.settings.index');
    }

    public function changepassword(Request $request)
    {
        $request->validate([
            'passwordsekarang' => ['required','min:8'],
            'passwordbaru' => ['required','min:8'],
        ]);

        if (Hash::check($request->passwordsekarang, Auth::user()->password)) {
            $password = User::where('id', Auth::user()->id)->update(['password' => Hash::make($request->passwordbaru)]);

            if($password){
                return redirect()->route('settings.index')->with('success', 'Password telah diubah!');
            }
        }

        if($request->passwordsekarang != Auth::user()->password){
            return redirect()->route('settings.index')->with('success', 'Password lama salah!');
        }
    }

    public function changeavatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'mimes:png,jpg,jpeg'],
        ],
        [
            'avatar.required' => 'Avatar harus diisi',
            'avatar.mimes' => 'Format gambar harus png, jpg atau jpeg',
        ]);

        $date = date('Ymd His gis');
        $avatar = User::find(Auth::user()->id);

        if($request->hasFile('avatar')){
            $request->file('avatar')->move('admin/template/assets/images/', $date.$request->file('avatar')->getClientOriginalName());
            $avatar->avatar = $date.$request->file('avatar')->getClientOriginalName();
            $avatar->save();

            return redirect()->back()->with('success', 'Avatar telah diupdate');
        }

        return redirect()->back()->with('info', 'Avatar gagal diupdate');
    }

    public function changeprofile(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'nohp' => ['required'],
            'alamat' => ['required'],
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->nohp = $request->nohp;
        $user->alamat = $request->alamat;
        $user->provinsi_id = $request->provinsi_id;
        $user->kota_id = $request->kota_id;
        $user->kecamatan_id = $request->kecamatan_id;
        $user->kelurahan_id = $request->kelurahan_id;
        $user->zipcode = $request->zipcode;
        $user->save();

        if($user){
            return redirect()->back()->with('success', 'Profile telah diupdate');
        }

        return redirect()->back()->with('info', 'Profile gagal diupdate');
    }
}
