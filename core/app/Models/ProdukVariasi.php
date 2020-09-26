<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;

class ProdukVariasi extends Model
{
    use Uuid;
    protected $table = 'produk_variasi';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

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
