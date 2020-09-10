<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukFoto extends Model
{
    protected $table = 'produk_foto';
    protected $fillable = [
        'produk_id', 'path', 'is_utama'
    ];

    public function produk()
    {
        return $this->belongsTo('Modules\Produk\Entities\Produk');
    }
}
