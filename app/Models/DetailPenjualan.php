<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $table = 'detail_penjualans';
    
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = ['id'];

    public function penjualan() : BelongsTo
    {
        return $this->belongsTo(Penjualan::class);
    }
    public function produk() : BelongsTo
    {
        return $this->belongsTo(Produk::class);
    }
}
