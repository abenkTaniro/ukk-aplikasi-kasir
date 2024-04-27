<?php

namespace App\Livewire;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Transaksi extends Component
{
    public $produks,$jumlah,$transaksi;

    public function addCart($id){
        $produk = Produk::find($id);
        $transaksi = Penjualan::where('status','keranjang')->first();
        
        if($transaksi == null){
            Penjualan::create([
                'tanggal_penjualan' => date('Y-m-d'),
                'total' => $produk->harga,
                'pelanggan_id' => 1,
                'user_id' => Auth::user()->id,
                'status' => 'keranjang'
            ]); 

            $transaksi_terakhir = Penjualan::where('status','keranjang')->orderByDesc('id')->first();
            DetailPenjualan::create([
                'penjualan_id' => $transaksi_terakhir->id,
                'produk' => $produk->id,
                'jumlah' => $this->jumlah,
                'subtotal' => $produk->harga * $this->jumlah
            ]);
        }else{

        }
        $this->transaksi = Penjualan::where('status', 'keranjang')->where('user_id', Auth::user()->id)->first();
    }
    public function mount(){
        $this->produks = Produk::all();
    }
    public function render()
    {
        return view('livewire.transaksi');
    }
}
