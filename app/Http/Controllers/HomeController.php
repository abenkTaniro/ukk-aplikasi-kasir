<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlahData = [
            'produk' => Produk::count(),
            'pendapatan' => Penjualan::where('tanggal_penjualan',date('Y-m-d'))->where('status','berhasil')->sum('total'),
            'transaksi' => Penjualan::where('status','berhasil')->count(),
            'kasir' => User::where('role','kasir')->count()
        ];
        return view('dashboard',[
            'jumlahData' => $jumlahData
        ]);
    }
}
