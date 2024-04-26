<?php

namespace App\Livewire;

use App\Models\Penjualan;
use App\Models\Produk;
use Livewire\Component;

class Transaksi extends Component
{
    public $produks;

    public function addCart($id){
        $produk = Produk::find($id);
    Penjualan::create([
        'tanggal_penjualan' => date('Y-m-d'),
        'total' => $produk->harga,
        'pelanggan_id' => 1,
        'status' => 'keranjang'
    ]); 
        
    }
    public function mount(){
        $this->produks = Produk::all();
    }
    public function render()
    {
        return view('livewire.transaksi');
    }
}
