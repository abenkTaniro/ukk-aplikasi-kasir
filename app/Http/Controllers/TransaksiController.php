<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
public function __construct() {
    $this->middleware('auth');
}
    public function index(){
        $transaksi_terakhir = Penjualan::where('status', 'keranjang')->orderBy('id', 'DESC')->first();
        return view('transaksi.index',[
            'dataProduk' => Produk::all(),
            'detailPenjualan' => $transaksi_terakhir? DetailPenjualan::with(['penjualan','produk'])->where('penjualan_id',$transaksi_terakhir->id)->get():'',
        ]);
    }
    public function store(Request $request){
        $produk = Produk::find($request->produk_id);
        $transaksi = Penjualan::with(['detailPenjualan'])->where('status', 'keranjang')->first();
// ddd($transaksi->detailPenjualan);
        if ($transaksi == null) {
            Penjualan::create([
                'tanggal_penjualan' => date('Y/m/d'),
                'total' => $produk->harga,
                'pelanggan_id' => 1,
                'user_id' => Auth::user()->id,
                'status' => 'keranjang'
            ]);

            $transaksi_terakhir = Penjualan::where('status', 'keranjang')->orderBy('id', 'DESC')->first();
            DetailPenjualan::create([
                'penjualan_id' => $transaksi_terakhir->id,
                'produk_id' => $produk->id,
                'jumlah' => 1,
                'subtotal' => $produk->harga
            ]);
            return redirect()->route('transaksi.index');
        } else {
            if ($transaksi->detailPenjualan->where('produk_id', $produk->id)->count() > 0) {
                $detail_transaksi = DetailPenjualan::where('penjualan_id', $transaksi->id)->where('produk_id', $produk->id)->first();
                $detail_transaksi->update([
                    'jumlah' => $detail_transaksi->jumlah + 1,
                    'subtotal' => $produk->harga * ($detail_transaksi->jumlah + 1)
                    
                ]);
                return redirect()->route('transaksi.index');
            } else {
                DetailPenjualan::create([
                    'penjualan_id' => $transaksi->id,
                    'produk_id' => $produk->id,
                    'jumlah' => 1,
                    'subtotal' => $produk->harga
                ]);
                return redirect()->route('transaksi.index');
            }
        }

    }

    public function destroy($id){
        $detail_transaksi = DetailPenjualan::with(['penjualan'])->find($id);
        if ($detail_transaksi->penjualan->detailPenjualan->count() == 1) {
            $detail_transaksi->penjualan->delete();
            $detail_transaksi->delete();
            return redirect()->route('transaksi.index');
        } else {
            $detail_transaksi->delete();
            return redirect()->route('transaksi.index');
        }
    }
}
