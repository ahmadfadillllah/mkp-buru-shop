<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function contact()
    {
        return view('home.customer.contact');
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
