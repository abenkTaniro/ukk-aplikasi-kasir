<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(){
        return view('transaksi.index',[
            'dataProduk' => Produk::all(),
            // 'detailPenjualan' => DetailPenjualan::where('penjualan_id')
        ]);
    }
    public function store(Request $request){
        // if (!Penjualan::where('pelanggan_id','1')->exists()) {
            Penjualan::create([
                'tanggal_penjualan' => date('Y/m/d'),
                'total' => $request->harga * $request->jumlah,
                'pelanggan_id' => 1,
                'status' => 'keranjang'
            ]);
            // DetailPenjualan::create([

            // ]);
            return redirect()->route('transaksi.index');
        // }
    }
}
