<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = ['id'];

    public function detailPenjualan() : HasMany
    {
        return $this->hasMany(DetailPenjualan::class);
    }
}
