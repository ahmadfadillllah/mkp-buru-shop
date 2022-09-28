<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan()
    {
        return view('admin.laporan.index');
    }

    public function laporanMingguan(Request $request)
    {
        $start_date = $request->startdate;
        $end_date = $request->enddate;
        $status = $request->status;
        $pembayaran = $request->pembayaran;

        if ( $start_date == null || $end_date == null || $status == null || $pembayaran == null) {
            $pesanan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')->get();

            $belumDipesan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Belum Dipesan')
            ->get()->count();

            $sudahDipesan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Sudah Dipesan')
            ->get()->count();

            $sudahDikonfirmasi = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Sudah Dikonfirmasi')
            ->get()->count();

            $dalamPerjalanan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Pesanan Dalam Perjalanan')
            ->get()->count();

            $pesananSelesai = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Pesanan Selesai')
            ->get()->count();
        } else {
            $pesanan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->where('cart.status',$status)
            ->whereBetween('pesanan.created_at',[$start_date,$end_date])
            ->get();

            $belumDipesan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Belum Dipesan')
            ->whereBetween('pesanan.created_at',[$start_date,$end_date])
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->get()->count();

            $sudahDipesan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Sudah Dipesan')
            ->whereBetween('pesanan.created_at',[$start_date,$end_date])
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->get()->count();

            $sudahDikonfirmasi = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Sudah Dikonfirmasi')
            ->whereBetween('pesanan.created_at',[$start_date,$end_date])
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->get()->count();

            $dalamPerjalanan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Pesanan Dalam Perjalanan')
            ->whereBetween('pesanan.created_at',[$start_date,$end_date])
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->get()->count();

            $pesananSelesai = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Pesanan Selesai')
            ->whereBetween('pesanan.created_at',[$start_date,$end_date])
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->get()->count();
        }

        return view('admin.laporan.mingguan.index', compact('pesanan','belumDipesan','sudahDipesan','dalamPerjalanan','sudahDikonfirmasi','pesananSelesai'));
    }
    public function laporanBulanan(Request $request)
    {
        $month = $request->month;
        $status = $request->status;
        $pembayaran = $request->pembayaran;

        if ( $month == null) {
            $pesanan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')->get();

            $belumDipesan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Belum Dipesan')
            ->get()->count();

            $sudahDipesan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Sudah Dipesan')
            ->get()->count();

            $sudahDikonfirmasi = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Sudah Dikonfirmasi')
            ->get()->count();

            $dalamPerjalanan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Pesanan Dalam Perjalanan')
            ->get()->count();

            $pesananSelesai = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Pesanan Selesai')
            ->get()->count();
        } else {
            $pesanan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->where('cart.status',$status)
            ->whereMonth('pesanan.created_at',$month)
            ->get();

            $belumDipesan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Belum Dipesan')
            ->whereMonth('pesanan.created_at',$month)
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->get()->count();

            $sudahDipesan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Sudah Dipesan')
            ->whereMonth('pesanan.created_at',$month)
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->get()->count();

            $sudahDikonfirmasi = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Sudah Dikonfirmasi')
            ->whereMonth('pesanan.created_at',$month)
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->get()->count();

            $dalamPerjalanan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Pesanan Dalam Perjalanan')
            ->whereMonth('pesanan.created_at',$month)
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->get()->count();

            $pesananSelesai = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Pesanan Selesai')
            ->whereMonth('pesanan.created_at',$month)
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->get()->count();
        }

        return view('admin.laporan.bulanan.index', compact('pesanan','belumDipesan','sudahDipesan','dalamPerjalanan','sudahDikonfirmasi','pesananSelesai'));
    }

    public function laporanTahunan(Request $request)
    {
        $year = $request->year;
        $status = $request->status;
        $pembayaran = $request->pembayaran;

        if ( $year == null) {
            $pesanan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')->get();

            $belumDipesan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Belum Dipesan')
            ->get()->count();

            $sudahDipesan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Sudah Dipesan')
            ->get()->count();

            $sudahDikonfirmasi = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Sudah Dikonfirmasi')
            ->get()->count();

            $dalamPerjalanan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Pesanan Dalam Perjalanan')
            ->get()->count();

            $pesananSelesai = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Pesanan Selesai')
            ->get()->count();
        } else {
            $pesanan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->where('cart.status',$status)
            ->whereYear('pesanan.created_at',$year)
            ->get();

            $belumDipesan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Belum Dipesan')
            ->whereYear('pesanan.created_at',$year)
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->get()->count();

            $sudahDipesan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Sudah Dipesan')
            ->whereYear('pesanan.created_at',$year)
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->get()->count();

            $sudahDikonfirmasi = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Sudah Dikonfirmasi')
            ->whereYear('pesanan.created_at',$year)
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->get()->count();

            $dalamPerjalanan = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Pesanan Dalam Perjalanan')
            ->whereYear('pesanan.created_at',$year)
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->get()->count();

            $pesananSelesai = Pesanan::join('cart', 'pesanan.cart_id', 'cart.id')
            ->join('users', 'pesanan.user_id', 'users.id')
            ->select('pesanan.id', 'users.name', 'cart.status', 'pesanan.metode_pembayaran')
            ->where('cart.status','Pesanan Selesai')
            ->whereYear('pesanan.created_at',$year)
            ->where('pesanan.metode_pembayaran',$pembayaran)
            ->get()->count();
        }

        return view('admin.laporan.tahunan.index', compact('pesanan','belumDipesan','sudahDipesan','dalamPerjalanan','sudahDikonfirmasi','pesananSelesai'));
    }

 
}
