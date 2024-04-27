<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualans';
    
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $guarded = ['id'];

    
    public function detailPenjualan() : HasMany
    {
        return $this->hasMany(DetailPenjualan::class);
    }
    public function pelanggan() : BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
