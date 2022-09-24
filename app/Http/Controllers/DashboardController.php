<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = User::all()->count();
        $cart = Cart::all()->count();
        $pesanan = Pesanan::all()->count();
        return view('admin.dashboard.index', compact('user', 'cart', 'pesanan'));
    }
}
