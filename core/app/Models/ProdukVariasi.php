<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukVariasi extends Model
{
    protected $table = 'produk_variasi';
    protected $fillable = [
        'variant', 'sku', 'harga', 'stok', 'produk_id',
    ];

    public function produk()
    {
        return $this->hasOne('App\Models\Produk', 'id', 'produk_id');
    }

    // public function setHargaAttribute($value)
    // {
    //     return "Rp" .number_format($value,0,',','.');
    // }

}
